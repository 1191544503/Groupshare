@extends('layouts.default')
@section('title','创建小组')
@section('content')
    <div class="container">
        <div class="panel panel-default col-md-10 col-md-offset-1">
            <div class="panel-heading">
                <h4>
                    创建小组
                </h4>
            </div>
            <div class="panel-body">
                <form action="{{route('team.store')}}" method="POST" accept-charset="UTF-8"
                      enctype="multipart/form-data">
                    @include('shared.error')
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="name-field">小组名称</label>
                        <input class="form-control" type="text" name="name" id="name-field" value="" />
                    </div>
                    <div class="form-group">
                        <label for="introduction-field">小组简介</label>
                        <textarea name="describe" id="introduction-field" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="avatar-label">小组头像</label>
                        <input type="file" name="photo">
                    </div>
                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection