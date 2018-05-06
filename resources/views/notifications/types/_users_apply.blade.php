<div class="media">
    <div class="avatar pull-left">
        {!! $notification->data['created_at'] !!}
    </div>

    <div class="infos">
        <div class="media-heading">
        <a href="{{route('user.show',$notification->data['user_id'])}}">{{$notification->data['user_name']}}</a>
            申请加入
        <a href="{{route('team.show',$notification->data['team_id'])}}">{{$notification->data['team_name']}}</a>
            <form id="audit" action="{{route('team.auditteam')}}" method="post">
                {{csrf_field()}}
                <input name="user_id" value="{{$notification->data['user_id']}}" hidden>
                <input name="team_id" value="{{$notification->data['team_id']}}" hidden>
                <input name="id"  value="{{$notification->id}}" hidden>
                <input name="result" id="ans" value="pass" hidden>
                <button type="button" class="btn btn-default" value="tongyi" onclick="submit1()">同意</button>
                <button type="button" class="btn btn-default" value="jujue" onclick="submit2()">拒绝</button>
            </form>
        </div>
    </div>
</div>
<hr>
<script>
    function submit1() {
        var form = document.getElementById('audit');
        form.submit();
    }
    function submit2(){
        var form = document.getElementById('audit');
        document.getElementById('ans').value = "refuse";
        form.submit();
    }
</script>