<?php
namespace app\index\controller;

// class Index
// {
//     public function index($name)
//     {
//         return 'hello world!'.$name;
//     }
//     public function test()
//     {
//         return 'this is test fun!';
//     }
// }

// use	think\Controller;
// class Index	extends	Controller {				
// 	public	function hello($name='thinkphp'){
// 		$this->assign('name',$name);
// 		return	$this->fetch();
// 	} 
// }

// use	think\Controller; 
// use	think\Db;

// url('index/hello','name=thinkphp');
// class Index extends	Controller {
// 	public function index(){
// 		$data = Db::name('data')
// 		->find();
// 		$this->assign('result',	$data);
// 		return	$this->fetch();
// 	}
// 	public function hello($name='world'){
// 		return $name;
// 	}
// }
use	think\Controller;
use think\Request;
use	think\Db;
class Index	extends	Controller {
	use	\traits\controller\Jump;
	public function index(){
		$data=Db::name('data')->find();
		$this->assign('result', $data); 
		// return json($data);
		return $this->fetch();
		// return "hello world";
	}
	public function hello(){
		// $request=Request::instance();
		// $arr = input();
		// echo request()->domain();
		// echo 'url:'.request()->url().'<br/>';
		// $data=['name'=>'thinkphp','status'=>'1'];
		// return	xml($data);	

		// 数据查询
		$result	= Db::table('think_data')->select(); 
		return json($result);
	}
	public function go($name='no'){
		if('go' == $name){
			$this->success('goPage','page1');
		}else{
			$this->error('error','page2');
		}
	}
	public function page1(){
		return "page01";
	}
	public function page2(){
		return "error name";
	}
}





