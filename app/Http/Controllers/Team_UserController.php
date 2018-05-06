<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Notifications\Feedback;
use Illuminate\Http\Request;
use App\Notifications\UsersApply;
use Illuminate\Notifications\Notifiable;
use Auth;

class Team_UserController extends Controller
{
    //
    public function addteam(Request $request){
        $team=Team::find($request->team_id);
        $user=User::find($team->admin_id);
        //放入消息队列中通知管理员
        $apply=array(
            'user_id'=>$request->user_id,
            'user_name'=>User::find($request->user_id)->name,
            'team_id'=>$request->team_id,
            'team_name'=>$team->name,
            'created_at'=>date('Y-m-d H:i:s'),
        );
        $user->notify(new UsersApply($apply));
        return redirect()->route('team.show',$request->team_id)->with('success','您已成功申请，等待小组管理员审核');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * 退出小组
     */
    public function exitteam(Request $request){
        $user=User::find($request->user_id);
        $user->team()->detach($request->team_id);
        return redirect()->route('home');
    }
    public function auditteam(Request $request){
     //   dd($request);
        Auth::user()->marskread();//一个消息已读将用户消息-1
        foreach(Auth::user()->unreadNotifications as $notification)
        {
            if($notification->id==$request->id) {
                $notification->delete();
                break;
            }
        }
        $team=Team::find($request->team_id);
        $user = User::find($request->user_id);
        $feedback=array(
            'team_id'=>$request->team_id,
            'team_name'=>$team->name,
            'created_at'=>date('Y-m-d H:i:s'),
        );
        if($request->result=="pass") {
            $user->team()->attach($request->team_id);
            $feedback['text']="的管理员同意了您的加入,恭喜你成为小组的一员";
        }else{
            $feedback['text']="的管理员拒绝了您的加入.";
        }
        $user->notify(new Feedback($feedback));
        return back();
    }
}
