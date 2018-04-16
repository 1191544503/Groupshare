<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use App\Handlers\ImageUploadHandler;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
                'except'=>[],
            ]);
    }

    public function edit(User $user){
        $this->authorize('edit',$user);
        return view('users.editnifo',compact('user'));
    }
    public function update(Request $request,ImageUploadHandler $uploader,User $user)
    {
        $this->authorize('edit',$user);
        $this->validate($request,[
            'name' => 'required|string|max:255',
        ]);
        $user->name=$request->name;
        $user->introduction=$request->introduction;
        if ($request->avatar) {
            $result = $uploader->save($request->avatar, 'User_avatars', $user->id);
            if ($result) {
                $user->avatar = $result['path'];
            }
        }
        $user->save();
        session()->flash('success','个人资料更新成功');
        return redirect()->route('user.show',$user->id);
    }
    public function showother(User $user,Team $team){
        $resources=$user->resource()->where('team_id','=',$team->id)
                   ->orderBy('updated_at','desc')
                   ->paginate(5);

        return view('users.user_showother',compact('user','resources'));
    }
    public function show(User $user){
        return view('users.user_show',compact('user'));
    }

}
