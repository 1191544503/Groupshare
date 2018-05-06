<div class="media">
    <div class="avatar pull-left">
        {!! $notification->data['created_at'] !!}
    </div>

    <div class="infos">
        <div class="media-heading">
            <a href="{{route('team.show',$notification->data['team_id'])}}">{{$notification->data['team_name']}}</a>
            {{$notification->data['text']}}
        </div>
    </div>
</div>
<hr>