@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">修改文章</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>更新失败</strong> 输入不符合要求<br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form action="{{ url('admin/article/'.$article->id) }}" method="POST">
                            {!! csrf_field() !!}
                            {{ method_field('PUT') }}
                            <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题"
                                   value="{{old('title')==true?old('title'):$article->title}}">
                            <br>
                            <textarea name="body" rows="10" class="form-control" required="required"
                                      placeholder="请输入内容">{{old('body')==true?old('body'):$article->body}}</textarea>
                            <br>
                            <button class="btn btn-lg btn-info">提交</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection