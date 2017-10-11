@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">评论管理</div>
                @if(count($errors)>0)
                    <div class="panel-body">
                        <div class="alert alert-danger">
                            {!! implode('<br>',$errors->all()) !!}
                        </div>
                    </div>
                @endif

                <table class="table">
                    <tr><th>Content</th><th>User</th><th>Page</th><th>编辑</th><th>删除</th></tr>
                    @foreach($comment as $c)
                        <tr>
                            <td>{{$c->content}}</td>
                            <td>{{$c->nickname}}<br/>{{$c->email}}</td>
                            <td><a href="{{ url('article/'.$c->article->id) }}">{{$c->article->title}}</a></td>
                            <td><a href="{{url('admin/comment/'.$c->id.'/edit')}}"><button type="button" class="btn btn-success">编辑</button></a></td>
                            <td>
                                <form action="{{url('admin/comment/'.$c->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger">删除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>

@endsection()