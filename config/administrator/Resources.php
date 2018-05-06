<?php

use App\Models\Resource;
return[
    'title'=>'资源',
    'single'  => '资源',
    'model'   => Resource::class,
    'columns' => [
        'id',
        'name'=>[
            'title'=>'名称',
            'sortable'=>false,
        ],
        'introduce'=>[
            'title'  => '介绍',
            'sortable' => false,
        ],
        'user_name' => [
            'title' => '发布者',
            'output'   => function ($value, $model) {
                $name = $model->user->name;
                return $name;
            },
        ],
        'team_name' => [
            'title' => '资源所在小组',
            'output'   => function ($value, $model) {
                $name = $model->team->name;
                return $name;
            },
        ],
        'url'=>[
            'title'=>'附件存放位置'
        ],
        'docount' => [
            'title'  => '浏览次数',
            'sortable' => true,
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
        'introduce' => [
            'title' => '介绍',
            'type'=>'text',
        ],
        'url' => [
            'title' => '附件存放位置',
        ],

    ],
    'filters' => [
        'id' => [

            // 过滤表单条目显示名称
            'title' => '资源ID',
        ],
        'team_id' => [
            'title' => '小组ID',
        ],
        'user_id' => [
            'title' => '用户名',
        ],
    ],
    'rules'   => [
        'name' => 'required|min:1|unique:categories'
    ],
    'messages' => [
        'name.unique'   => '分类名在数据库里有重复，请选用其他名称。',
        'name.required' => '请确保名字至少一个字符以上',
    ],

];