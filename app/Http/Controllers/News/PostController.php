<?php

namespace App\Http\Controllers\News;

use App\Models\tag;
use App\Models\post;
use App\Models\User;
use App\Models\comment;
use App\Models\category;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewsNotification;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

  if (auth()->user()->hasRole('user'))
  {
    $users = User::all();
    $tags = tag::all();
    $news = post::with(['tags', 'image','category'])->paginate(5);
    $category = category::with(['posts', 'image'])->get();
    return view('News.news', compact('category', 'news', 'tags', 'users'));
  }
  {
    $request = request();
    $users = User::all();
    $tags = tag::all();
    $category = category::with(['posts', 'image'])->get();
    $news =post::Filter($request->query())->with(['tags', 'image'])->paginate(5);
    return view('News.news_admin', compact('category', 'news', 'tags', 'users'));

  }

}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     use ImageTrait;
    public function store(PostRequest $request)
    {
        // Insert The News In Database
        $news = new Post();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->category_id = $request->category;
        $news->user_id = auth::user()->id;
        $news->date_to_publish = $request->Due_date;
        $news->status = $request->status;

        if ($request->status == 'publish') {
            $news->status = 'publish';
        } else {
            $news->status = 'unpublish';
        }
        $news->save();
        $fox = 'news';

        // Upload and associate the image
        $this->uploadImage($request, $news,$fox);

        // To insert all of the tags selected...
        $news->tags()->attach($request->tag_id);

        $users = User::where('id','!=',Auth::guard('web')->user()->id)->get();
        $user_create = Auth::guard('web')->user()->name;
        Notification::send($users, new NewsNotification($news->id,$user_create,$news->title));

        session()->flash('Add','The news has been added successfully');
        return redirect('/News');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(PostRequest $request)
    {
        //Update The News
        $news = post::findOrFail($request->id);
        $news->title = $request->title;
        $news->content = $request->content;
        $news->category_id = $request->category_id;
           // update pivot table
        if (isset($request->tag_id)) {
            $news->tags()->sync($request->tag_id);
        }
        else {
            $news->tags()->sync(array());
        }
        $news->date_to_publish = $request->Due_date;
        $news->status = $request->status;
        $fox = 'news';
        // Update and associate the image
        if($request->hasFile('image')) {
        $this->updateImage($request, $news,$fox);
        }
        $news->save();
        session()->flash('edit','The News has been added successfully');
        return redirect('/News');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //Delete The News
        $id = $request->id;
        post::findOrFail($id)->delete();
        session()->flash('delete','The News has been successfully deleted');
        return redirect('/News');
    }

    // Search In multi models....News|Tags|Category
    public function Filter_Classes(Request $request)
    {

     $tagName = $request->search; // Specify the tag name to search for

     $posts = Post::whereHas('tags', function ($query) use ($tagName) {
     $query->where('tag_name', $tagName);
     })->get();

        return view('Search.search',compact('posts'));

    }


    public function show_Notification($id) {
        $getId = DB::table('notifications')->where('data->news_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$getId)->update(['read_at'=>now()]);
        return redirect('/News');
    }

    public function Markread()
    {
        $user = User::find(Auth::guard('web')->user()->id);

        foreach($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return redirect('/News');
    }

    public function add_comment(Request $request) {

        comment::create([
            'body'=>$request->body,
            'post_id'=>$request->id
        ]);

           session()->flash('Add','The comment has been added successfully');
        return redirect('/home');

    }

}
