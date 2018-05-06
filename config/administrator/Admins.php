<?php

use App\Models\Admin;
return[
    'title'=>'管理员',
    'single'  => '管理员',
    'model'   => Admin::class,
    'columns' => [
        'id',
        'name' => [
            'title' => '用户名',
        ],
        'password'=>[
            'title'  => '密码',
            'sortable' => false,
        ],
        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],

    ],
    'edit_fields'=>[
        'name' => [
            'title' => '用户名',
        ],
        'password' => [
            'title' => '密码',
        ],

    ],
    'filters' => [
        'team_id' => [
            'title' => '用户名',
        ],
    ],


];