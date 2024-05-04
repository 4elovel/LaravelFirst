<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\News;
use Illuminate\Http\Request;

class commentsController extends Controller
{
    public function addNewComment(Request $request,$id)
    {
        $news = News::find($id);

        if (!$news) {
            abort(404, 'Новина не знайдена');
        }
        $commentText = $request->input('comment');
        $comment = new Comments();
        $comment->news_id = $news->id;
        $comment->comment = $commentText;
        $comment->user_id = session('user_id');
        $comment->save();
        return redirect("/main");
    }
}
