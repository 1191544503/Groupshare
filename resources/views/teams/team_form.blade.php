@extends('layouts.default')
@section('title','修改小组信息')
@section('content')
    <div class="container">
        <div class="panel panel-default col-md-10 col-md-offset-1">
            <div class="panel-heading">
                <h4>
                    编辑小组资料
                </h4>
            </div>
            <div class="panel-body">
                <form action="{{route('team.update',$team->id)}}" method="POST" accept-charset="UTF-8"
                      enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="name-field">小组名称</label>
                        <input class="form-control" type="text" name="name" id="name-field" value="{{$team->name}}" />
                    </div>
                    <div class="form-group">
                        <label for="introduction-field">小组简介</label>
                        <textarea name="describe" id="introduction-field" class="form-control" rows="3">{{$team->describe}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="avatar-label">小组头像</label>
                        <input type="file" name="photo">

                        @if($team->photo)
                            <br>
                            <img class="thumbnail img-responsive" src="{{ $team->photo }}" width="200" />
                        @endif
                    </div>
                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection