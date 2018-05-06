@extends('layouts.default')
@section('title','小组信息')
@section('content')
    <div class="container">
        <div class="row">
            @include('shared._message')

            <div class="col-md-3">
                <div class="panel panel-default">
                    {{--<div class="panel-heading">小组信息</div>--}}
                    <div class=" team-side">
                    <div align="center" style="margin-bottom: 10px">
                        <img src="{{$team->photo}}" width="140px">
                    </div>
                        <hr style="margin: 10px 0;">
                     名称：{{$team->name}}<br/>
                    <div>
                        <hr style="margin: 10px 0;">
                     简介：{{$team->describe}}<br/>
                    </div>
                        <hr style="margin: 10px 0;">
                        <div style="margin:0 2px">
                        @can('isadmin',$team)
                        <a href="{{route('team.edit',$team->id)}}">
                            <button type="button" class="btn btn-default">修改信息</button></a>
                        <a href="{{route('message.edit',$team->id)}}">
                            <button type="button" class="btn btn-default">发布公告</button></a>
                        @endcan
                        @cannot('isexist',$team)
                        <form action="{{route('team.add')}}" method="post">
                            {{csrf_field()}}
                            <input name="user_id" value="{{Auth::user()->id}}" hidden>
                            <input name="team_id" value="{{$team->id}}" hidden>
                             <button type="submit" class="btn btn-default" value="申请加入">申请加入</button>
                        </form>
                        @endcannot
                    @can('isexist',$team)
                        <a href="{{route('resources.create',$team->id)}}">
                            <button type="button" class="btn btn-default">发布资源</button></a>
                    @endcan
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                @if(!empty($messages->get()->first()))
                <div class="panel panel-default" id="all_message" style="display: none">
                    <div class="panel-heading" >
                        所有通知
                        <button type="button" class="btn btn-default" style="float: right;margin-top: -7px;" onclick="newmessage()">最近通知</button>
                    </div>
                    @foreach($messages->get() as $message)
                        <div class="panel-heading">
                            {{$message->updated_at}}<br>
                            {{$message->text}}<br>
                            @can('isadmin',$team)
                            <form action="{{ route('message.destroy',array($message->id,$team->id))}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-default" style="float: right;margin-top: -31px;">
                                    删除
                                </button>
                            </form>
                            @endcan
                        </div>
                    @endforeach
                </div>
                <div class="panel panel-default" id="notall_message" style="display: block">
                    <div class="panel-heading">最新通知
                        <button type="button" class="btn btn-default" style="float: right;margin-top: -7px;" onclick="allmessage()">所有通知</button>
                    </div>
                    <div style="padding: 10px;">

                            <span style="font-size: 0.7em;">{{$messages->first()->updated_at}}</span><br>
                            <span style="font-weight: bold">{{$messages->first()->text}}</span><br>

                    </div>
                </div>
                @else
                    <div class="panel panel-default" >
                        <div class="panel-heading" >
                            该小组暂无通知
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">小组成员
                    </div>
                    <div style="padding: 10px;">
                    @include('users.user_list')
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default" id="all_message" >
                    <div class="panel-heading" >组内资源</div>
                    @include('resources.resource_list')
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function allmessage(){
        document.getElementById("notall_message").style.display = "none";
        document.getElementById("all_message").style.display = "block";
    }
    function newmessage(){
        document.getElementById("notall_message").style.display = "block";
        document.getElementById("all_message").style.display = "none";
    }
</script>