<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Redis;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams=Auth::User()->team()->get();
        $messages=array();
        Redis::set('ss','hello');
        foreach($teams as $team){
            array_push($messages,$team->message()->orderBy('updated_at','desc')->first());
        }
        return view('home',compact('data','messages','teams'));
    }
}