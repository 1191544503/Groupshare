@extends('layouts.default')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/resource_body.css') }}">
@stop
@section('title', $resource->name)
@section('content')
    <div class="simditor-body">
    <div class="container">
    <div class="row">

        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        作者：{{ $resource->user->name }}
                    </div>
                    <hr>
                    <div align="center" style="margin-bottom: 10px">
                        <img src="{{$resource->user->avatar}}" width="140px">
                    </div>
                        <div align="text-center">
                            @if(!empty($resource->url))
                            附件：<a href="{{$resource->url}}">点击下载</a>
                            @endif
                        </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 topic-content">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1 class="text-center">
                        {{ $resource->name }}
                    </h1>

                    <div class="article-meta text-center">
                        {{ $resource->created_at}}⋅
                    </div>

                    <div class="topic-body">
                        {!! $resource->introduce !!}
                    </div>

                    <div class="operate">
                        @can('edit',$resource)
                        <hr>
                        <a href="{{route('resources.edit',$resource->id)}}" class="btn btn-default btn-xs pull-left" role="button">
                             编辑
                        </a>
                        @endcan
                        @can('destroy',$resource)
                        <form action="{{ route('resources.destroy', $resource->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-default btn-xs pull-left" style="margin-left: 6px;">
                                删除
                            </button>
                        </form>
                        @endcan
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@stop