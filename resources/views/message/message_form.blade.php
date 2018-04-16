@extends('layouts.default')
@section('title','发布公告')
@section('content')
    <div class="container">
        <div class="panel panel-default col-md-10 col-md-offset-1">
            <div class="panel-heading">
                <h4>
                    发布公告
                </h4>
            </div>

            <div class="panel-body">

                <form action="{{route('message.update',$team->id)}}" method="POST" accept-charset="UTF-8">
                    {{method_field('patch')}}
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="introduction-field">公告</label>
                        <textarea name="text" id="introduction-field" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection