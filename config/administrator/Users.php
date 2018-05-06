<?php

use App\Models\User;
return[
    'title'=>'用户',
    'single'  => '用户',
    'model'   => User::class,
    'columns' => [
        'id',
        'name'=>[
            'title'=>'名称',
            'output' => function ($name, $model) {
                return '<a href="/users/'.$model->id.'" target=_blank>'.$name.'</a>';
            },
            'sortable'=>true,
        ],
        'avatar'=>[
            'title'  => '头像',
            'output' => function ($avatar, $model) {
                return empty($avatar) ? 'N/A' : '<img src="'.$avatar.'" width="40">';
            },
            'sortable' => false,
        ],
        'email' => [
            'title' => '学号',
        ],
        'createcount' => [
            'title' => '创建小组次数',
        ],
        'introduction'=>[
            'title'=>'介绍'
        ],
        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],

    ],
    'edit_fields'=>[
        'name' => [
            'title' => '名称',
        ],
        'email' => [
            'title' => '邮箱',
        ],
        'password' => [
            'title' => '密码',

            // 表单使用 input 类型 password
            'type' => 'password',
        ],
        'createcount'=>[
          'title'=>'小组剩余创建次数',
        ],

    ],
    'filters' => [
        'id' => [

            // 过滤表单条目显示名称
            'title' => '用户 ID',
        ],
        'name' => [
            'title' => '用户名',
        ],
        'email' => [
            'title' => '邮箱',
        ],
    ],

];