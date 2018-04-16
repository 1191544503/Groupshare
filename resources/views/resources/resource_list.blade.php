<div class="panel-body remove-padding-horizontal" style="padding-top: 0">
    <ul class="list-group row topic-list">
        @foreach($resources as $resource)
            <li class="list-group-item " style="padding: 5px;">
                    <div class="media-heading">
                        <a href="#">
                        <span style="border-radius: 50%; display:inline-block;width:30px;overflow:hidden;height:30px;margin-right: 5px;">
                            <img  src="{{$resource->user->avatar}}" width="30px" height="30px"  alt="">
                        </span>
                        </a>
                        <a  href="{{route('resources.show',$resource->id)}}" title="">
                            <span style="color: #555;"> {{$resource->name}}</span>
                            <a style="display: inline;float: right;text-align: right" href="#">{{$resource->user->name}}</a>
                            <span style="color: #444444;float: right; opacity:.8;font-size:.8em;
                            text-align: right">
                                Time:{{$resource->updated_at}}
                                作者:
                            </span>

                        </a>

                    </div>
            </li>
        @endforeach
            {!! $resources->links() !!}
    </ul>
</div>