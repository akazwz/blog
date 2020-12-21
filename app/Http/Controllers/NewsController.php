<?php

namespace App\Http\Controllers;

use App\Models\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function addNews(Request $request)
    {
        $params = $request->post('params');
        $title = $params['title'];
        $content = $params['content'];
        $pic = $params['pic'];
        $code = 0;
        $news = new News();
        $news->title = $title;
        $news->content = $content;
        $news->pic = $pic;
        $flag = $news->save();
        if ($flag){
            $msg = '发布成功';
            $code = 200;
        }
        else{
            $msg = '发布失败';
        }
        return response()->json(['msg'=>$msg,'code'=>$code]);
    }

    public function getNewsById(Request $request)
    {
        $id = $request->get('id');
        $news = News::query()->find($id);
        return response()->json($news);
    }

    public function getAllNews()
    {
        $news = News::all();
        return response()->json($news);
    }
}
