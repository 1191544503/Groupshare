@extends('layouts.default')

@section('title','编辑文章资源')

@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">
                    <h2 class="text-center">
                            新建资源
                    </h2>

                    <hr>
                    <form action="{{ route('resources.store') }}" method="POST" accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        @include('shared.error')
                        {{csrf_field()}}
                        <input type="text" name="team_id" value="{{$team->id}}" hidden>
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" value="" placeholder="请填写标题" required/>
                        </div>
                        <div class="form-group">
                            <textarea name="introduce" class="form-control" id="editor" rows="3" placeholder="请填入至少三个字符的内容。" required></textarea>
                        </div>
                        <div class="form-group">
                            上传资源附件
                            <div class="form-group " id="aetherupload-wrapper">
                                <div class="controls" >
                                    <input type="file" id="file" onchange="aetherupload(this,'file').upload()"/>
                                    <div class="progress " style="height: 6px;margin-bottom: 2px;margin-top: 10px;width: 200px;">
                                        <div id="progressbar" style="background:blue;height:6px;width:0;"></div>
                                    </div>
                                    <span style="font-size:12px;color:#aaa;" id="output"></span>
                                    <input type="hidden" name="file2" id="savedpath" >
                                </div>
                            </div>
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
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@stop
@section('scripts')
    <script type="text/javascript"  src="{{ asset('js/module.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/hotkeys.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/uploader.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/simditor.js') }}"></script>
    <script src="{{ URL::asset('js/spark-md5.min.js') }}"></script><!--需要引入spark-md5.min.js-->
    <script src="//cdn.bootcss.com/jquery/2.2.3/jquery.min.js"></script><!--需要引入jquery.min.js-->
    <script src="{{ URL::asset('js/aetherupload.js') }}"></script><!--需要引入aetherupload.js-->
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