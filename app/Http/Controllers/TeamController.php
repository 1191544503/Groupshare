<?php

namespace App\Http\Controllers;

use App\Models\Team_User;
use Illuminate\Http\Request;
use App\Models\Team;
use Auth;
use App\Handlers\ImageUploadHandler;
use App\Http\Requests\TeamRequest;

class TeamController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>[''],
        ]);
    }
    public function show(Team $team){
        $messages=$team->message()->orderBy('updated_at','desc');
        $users=$team->user()->get();
        $resources=$team->resource()
            ->orderBy('updated_at','desc')
            ->paginate(6);
        return view('teams.team_home',compact('team','messages','users','resources'));
    }
    public function edit(Team $team){
        $this->authorize('isadmin',$team);
        return view('teams.team_form',compact('team'));
    }
    public function update(TeamRequest $request,ImageUploadHandler $uploader,Team $team){
        $this->authorize('isadmin',$team);
        $team->name=$request->name;
        $team->describe=$request->describe;
        if ($request->photo) {
            $result = $uploader->save($request->photo, 'team_photo', $team->id);
            if ($result) {
                $team->photo = $result['path'];
            }
        }
        $team->save();
        session()->flash('success','小组信息修改成功');
        return redirect()->route('team.show',$team->id);
    }
    public function create(){
        return view('teams.create');
    }
    public function store(TeamRequest $request,Team $team,ImageUploadHandler $uploader){
        $this->validate($request,[
            'name'=>'required|min:1',
        ]);
        if(Auth::user()->createcount==0){
            return redirect()->route('home')->with('warning','您没有创建小组的次数');
        }
        $team->name=$request->name;
        $team->describe=$request->describe;
        if ($request->photo) {
            $result = $uploader->save($request->photo, 'team_photo', $team->id);
            if ($result) {
                $team->photo = $result['path'];
            }
        }
        $team->admin_id=$request->admin_id;
        $team->save();
        return redirect()->route('home')->with('success','小组创建成功');
    }
}
