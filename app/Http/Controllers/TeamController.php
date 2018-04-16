<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Auth;
use App\Handlers\ImageUploadHandler;

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
    public function update(Request $request,ImageUploadHandler $uploader,Team $team){
        $this->authorize('isadmin',$team);
        $this->validate($request,[
            'name'=>'max:20',
            'describe'=>'max:100'
        ]);
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
    public function store(Request $request,Team $team,ImageUploadHandler $uploader){
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
        $team->admin_id=Auth::user()->id;
        $team->save();
        return redirect()->route('home')->with('success','小组创建成功');
    }
}
