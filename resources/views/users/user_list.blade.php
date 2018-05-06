@foreach($users as $user)
    <a href="{{route('user.showother',array($user->id,$team->id))}}">{{$user->name}}</a>
    <br>
@endforeach
