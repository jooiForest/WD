<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
        'id' =>'\d+',
    ],
    'user/index' =>	'index/user/index',
    'user/create' => 'index/user/create',
    'create' => 'index/user/create',
    'user/add' => 'index/user/add',
    'user/scope'=>'index/user/scope',
    'user/add_list' => 'index/user/addList',
    'user/update/:id' => 'index/user/update',
	'user/delete/:id' => 'index/user/delete',
	'user/:id'=> 'index/user/read',
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
