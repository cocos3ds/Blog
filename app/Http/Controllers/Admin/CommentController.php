<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index(){
        return view('admin/comment/index')->withComment(\App\Comment::with('article')->get());
    }

    public function destroy($id){
         \App\Comment::find($id)->delete();
         return redirect()->back()->withErrors('删除成功');
    }

    public function edit($id){
        return view('admin/comment/edit')->withComment(\App\Comment::find($id));
    }

    public function update($id,Request $request){
        $this->validate($request,['nickname'=>'required','email'=>'required','website'=>'required','ccontent'=>'required']);
        $comment = \App\Comment::find($id);

        $comment->nickname = $request->nickname;
        $comment->email = $request->email;
        $comment->website = $request->website;
        $comment->content = $request->ccontent;

        if($comment->save()){
            return redirect('admin/comment');
        }else{
            return redirect()->back()->withInput()->withErrors('修改失败');
        }

    }

}
