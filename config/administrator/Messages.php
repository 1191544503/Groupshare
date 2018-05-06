<?php

use App\Models\Message;
return[
    'title'=>'公告',
    'single'  => '公告',
    'model'   => Message::class,
    'columns' => [
        'id',
        'team_name' => [
            'title' => '资源所在小组',
            'output'   => function ($value, $model) {
                $name = $model->team->name;
                return $name;
            },
        ],
        'text'=>[
            'title'  => '公告',
            'sortable' => false,
        ],
        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],

    ],
    'edit_fields'=>[
        'team_id' => [
            'title' => '小组ID',
        ],
        'text' => [
            'title' => '公告',
        ],

    ],
    'filters' => [
        'team_id' => [
            'title' => '小组ID',
        ],
    ],


];