<?php

namespace App\Traits;

use App\Models\image;
use Illuminate\Support\Facades\Storage;

trait ImageTrait
{
    // To Store The Image
     public function uploadImage($request, $model,$fox)
    {
        if ($request->hasFile('image')) {
            $image = new image();
            $image->imageable_id = $model->id;
            $img = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs($fox, $img, 'ali');
            $image->url = $path;
            $model->image()->save($image);
        } else {
            return response()->json(['error' => 'Please upload an image']);
        }
    }
    // To Update The Image
    public function updateImage($request, $model,$fox)
    {
        $image = image::where('imageable_id', $model->id)
            ->where('imageable_type', get_class($model))
            ->first();
        $file_location = $image->url;
        $relative_path = str_replace('images/', '', $file_location);
        $parsed_url = parse_url($relative_path);
        $relative_path_new = ltrim($parsed_url['path'], '/');
        if (Storage::disk('ali')->exists($relative_path_new)) {
        // File exists
        Storage::disk('ali')->delete($relative_path_new);
        }
        $img = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs($fox, $img, 'ali');
        $image->url = $path;
        $model->image()->save($image);
    }
}

