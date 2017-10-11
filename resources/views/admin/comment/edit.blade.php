@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">编辑评论</div>

                <div class="panel-body">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <strong>修改失败</strong>输入不符合要求<br><br>
                            {!! implode('<br>',$errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{url('admin/comment/'.$comment->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="input-group">
                            <span class="input-group-addon" >用户名:</span>
                            <input type="text" class="form-control" aria-describedby="basic-addon1"
                                   name="nickname" value="{{$comment->nickname}}" required>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">邮箱:</span>
                            <input type="text" class="form-control" aria-describedby="basic-addon2"
                                   name="email" value="{{$comment->email}}" required>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">个人主页:</span>
                            <input type="text" class="form-control" aria-describedby="basic-addon3"
                                   name="website" value="{{$comment->website}}">
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">评论内容:</span>
                            <input type="text" class="form-control" aria-describedby="basic-addon4"
                                   name="ccontent" value="{{$comment->content}}" required>
                        </div>
                        <br/>
                        <button type="submit" class="btn btn-success">提交修改</button>
                    </form>
                </div>
            </div>

        </div>
    </div>



@endsection()