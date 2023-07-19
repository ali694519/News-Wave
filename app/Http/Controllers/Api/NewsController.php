<?php

namespace App\Http\Controllers\Api;

use App\Models\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function showNews() {

        $news = post::with(['category','tags'])->get();

        return response()->json([
            'data'=>$news,
        ],status:200);
    }
}
