@extends('layouts.default')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@stop
@section('title','编辑文章资源')

@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">
                    <h2 class="text-center">
                        编辑资源
                    </h2>

                    <hr>
                    <form action="{{ route('resources.update',$resource->id) }}" method="POST" accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        @include('shared.error')
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <input type="text" name="team_id" value="{{$resource->team_id}}" hidden>
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" value="{{$resource->name}}" placeholder="请填写标题" required/>
                        </div>
                        <div class="form-group">
                            <textarea name="introduce" class="form-control" id="editor" rows="3" placeholder="请填入至少三个字符的内容。" required>{{$resource->introduce}}</textarea>
                        </div>
                        <div class="form-group">
                            更改资源附件<input type="file" name="file" />
                        </div>
                        <div class="well well-sm">
                            <button type="submit" class="btn btn-primary"> 上传</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript"  src="{{ asset('js/module.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/hotkeys.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/uploader.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/simditor.js') }}"></script>

    <script>
        $(document).ready(function(){
            var editor = new Simditor({
                textarea: $('#editor'),
                upload: {
                    url: '{{ route('resources.upload_image') }}',
                    params: { _token: '{{ csrf_token() }}' },
                    fileKey: 'upload_file',
                    connectionCount: 3,
                    leaveConfirm: '文件上传中，关闭此页面将取消上传。'
                },
                pasteImage: true,
            });
        });
    </script>

@stop