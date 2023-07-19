<?php

namespace App\Http\Controllers\CardsNews;

use App\Models\category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


class CardsNewsController extends Controller
{
    public function show_POLITICS() {

    $category = category::with(['posts','image'])
    ->where('cate_name','POLITICS')
    ->first();

    return view('CardsNews.newsPolitics',compact(['category']));

    }

    public function show_SPORTS() {

        $category = category::with(['posts','image'])
        ->where('cate_name','SPORTS')
        ->first();

        return view('CardsNews.newsSPORTS',compact('category'));
    }

    public function show_BUSINESS() {
        $category = category::with(['posts','image'])
        ->where('cate_name','BUSINESS')
        ->first();

        return view('CardsNews.newsBUSINESS',compact('category'));
    }

    public function show_TECHNOLOGY() {
        $category = category::with(['posts','image'])
        ->where('cate_name','TECHNOLOGY')
        ->first();

        return view('CardsNews.newsTECHNOLOGY',compact('category'));
    }

    public function show_HEALTH() {
        $category = category::with(['posts','image'])
        ->where('cate_name','HEALTH')
        ->first();

        return view('CardsNews.newsHEALTH',compact('category'));
    }

    public function show_ENTERTAINMENT() {
        $category = category::with(['posts','image'])
        ->where('cate_name','ENTERTAINMENT')
        ->first();

        return view('CardsNews.newsENTERTAINMENT',compact('category'));
    }

    public function show_Science() {
        $category = category::with(['posts','image'])
        ->where('cate_name','SCIENCE')
        ->first();

        return view('CardsNews.newsScience',compact('category'));
    }


    public function show_Education() {
        $category = category::with(['posts','image'])
        ->where('cate_name','EDUCATION')
        ->first();

        return view('CardsNews.newsEducation',compact('category'));
    }

    public function show_BREAKING() {
        //   $response = Http::get('https://newsapi.org/v2/everything?q=Apple&from=2023-07-18&sortBy=popularity&apiKey=31c8f36c28de47669af9c49f8d1bb879')->json();

        //   return $response->a;


          $category = category::with(['posts','image'])
          ->where('cate_name','BREAKING')
          ->first();

        return view('CardsNews.newsBREAKING',compact('category'));
    }

     public function show_Environment() {
          $category = category::with(['posts','image'])
          ->where('cate_name','ENVIRONMENT')
          ->first();
        return view('CardsNews.newsENVIRONMENT',compact('category'));
    }

}
