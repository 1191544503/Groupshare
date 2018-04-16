
<div>
    @if(!empty($message['text']))
    <li>{{$message->team->name}} &nbsp&nbsp&nbsp&nbsp{{$message['updated_at']}}</li>
    {{$message['text']}}
    <hr>
    @endif
</div>