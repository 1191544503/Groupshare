@foreach($teams as $team)
    <a href="{{route('team.show',$team->id)}}" class="list-group-item">
        <img src="{{$team->photo}}" width="30px">
        {{$team->name}}
    </a>
@endforeach

{{--<a href="#" class="list-group-item active">--}}
    {{--免费域名注册--}}
{{--</a>--}}
{{--<a href="#" class="list-group-item">24*7 支持</a>--}}
{{--<a href="#" class="list-group-item">免费 Window 空间托管</a>--}}
{{--<a href="#" class="list-group-item">图像的数量</a>--}}
{{--<a href="#" class="list-group-item">每年更新成本</a>--}}
