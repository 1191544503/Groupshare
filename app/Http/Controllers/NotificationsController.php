<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {

        // 获取登录用户的所有通知
        $notifications = Auth::user()->notifications()->paginate(20);
        foreach(Auth::user()->unreadNotifications as $notification)
        {
            if($notification->type=="App\Notifications\Feedback"){
                Auth::user()->marskread();
                $notification->delete();
            }
        }
        return view('notifications.index', compact('notifications'));
    }
}
