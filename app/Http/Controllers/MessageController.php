<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Team;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>[],
        ]);
    }
    public function index(){
    }
    public function update(Request $request,Team $team,Message $message){
        $this->validate($request,[
            'text'=>'max:100'
        ]);
        $message->text=$request->text;
        $message->team_id=$team->id;
        $message->save();
        session()->flash('success','公告发布成功');
        return redirect()->route('team.show',$team->id);
    }
    public function edit(Team $team){
        return view('message.message_form',compact('team'));
    }
    public function destroy(Message $message,Team $team){
        $this->authorize('isadmin',$team);
        $message->delete();
        return redirect()->back()->with('success','公告成功删除');
    }

}
