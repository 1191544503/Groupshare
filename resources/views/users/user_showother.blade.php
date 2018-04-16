@extends('layouts.default')
@section('title','用户信息')
@section('content')
    <div class="container">
        <div class="row">
            @include('shared._message')
            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            name：{{ $user->name }}
                        </div>
                        <hr>
                        <div align="center" style="margin-bottom: 10px">
                            <img src="{{$user->avatar}}" width="140px">
                        </div>
                        <hr>
                        <div>
                            个人简介：{{$user->introduction}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-3 hidden-sm hidden-xs author-info">
                <div class="panel panel-default">
                    <div class="panel-body">ta在本组上传的资源</div>
                    @include('resources.resource_list')
                </div>
            </div>

        </div>
    </div>
@endsection