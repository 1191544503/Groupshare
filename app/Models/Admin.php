<?php

namespace App\Models;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Admin extends Model
{
    //
    protected $fullable=['name','password','level'];

}
