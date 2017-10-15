<?php

namespace app\index\model;
use	think\Model;
class User extends Model {
	// protected $table = 'think_user';
	// protected $name = 'user';

	//	开启自动写入时间戳				
	protected $autoWriteTimestamp = true;
	//	定义自动完成的属性
	protected $insert = ['status' => 1];


	//	birthday读取器				
	protected function getBirthdayAttr($birthday) { 
		return date('Y-m-d', $birthday); 
	} 

	//	user_birthday读取器
	protected function getUserBirthdayAttr($value,$data) {  
		return date('Y-m-d', $data['birthday']);
	}

	//	birthday修改器
	protected function setBirthdayAttr($value) { 
		return strtotime($value);
	}

	//	email查询
	protected function scopeEmail($query, $email = '') { 
		$query->where('email', $email);
	}

	//	定义关联方法
	public function books() { 
		return $this->hasMany('Book');
	}

	//	定义关联方法
	public function profile() { 
		// hasOne('关联模型名','关联外键','主键','别名定义','join类型')
		// 用户HAS ONE档案关联
		return $this->hasOne('Profile'); 
	} 

}
