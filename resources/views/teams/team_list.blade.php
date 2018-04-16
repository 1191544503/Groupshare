@foreach($teams as $team)
    <a href="{{route('team.show',$team->id)}}">{{$team->name}}</a>
    <br/>
@endforeach