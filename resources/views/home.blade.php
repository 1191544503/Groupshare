@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        @include('shared._message')
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">全部小组</div>
                @foreach($allteam as $oneteam)
                    <a href="{{route('team.show',$oneteam->id)}}" class="list-group-item">
                        <img src="{{$oneteam->photo}}" width="30px">
                        {{$oneteam->name}}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="panel panel-default">
                <div class="panel-heading">小组最新公告</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($messages as $message)
                        @include('message.show_info')
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">我的小组</div>
                    @include('teams.team_list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
