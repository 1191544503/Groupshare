<?php

use App\Models\Team;
return[
    'title'=>'小组',
    'single'  => '小组',
    'model'   => Team::class,
    'columns' => [
        'id',
        'name'=>[
            'title'=>'小组名称',
            'output' => function ($name, $model) {
                return '<a href="/teams/'.$model->id.'" target=_blank>'.$name.'</a>';
            },
            'sortable'=>true,
        ],
        'photo'=>[
            'title'  => '头像',
            'output' => function ($photo, $model) {
                return empty($photo) ? 'N/A' : '<img src="'.$photo.'" width="40">';
            },
            'sortable' => false,
        ],
        'describe' => [
            'title' => '小组描述',
        ],
        'admin_id' => [
            'title' => '小组管理员',
        ],
        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],

    ],
    'edit_fields'=>[
        'name' => [
            'title' => '小组名称',
        ],
        'describe' => [
            'title' => '小组描述',
        ],
        'admin_id'=>[
            'title'=>'小组管理员',
        ],

    ],
    'filters' => [
        'id' => [

            'title' => '小组ID',
        ],
        'name' => [
            'title' => '小组名',
        ],
    ],

];