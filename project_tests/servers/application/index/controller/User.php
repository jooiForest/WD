<?php 
namespace app\index\controller;
use app\index\model\User as UserModel;
use	app\index\model\Profile;
use	app\index\model\Book;
use	think\Db;
class User {
	public	function add() { 
		// $user =	new	UserModel;
		// $user->nickname	= '林云宇'; 
		// $user->email = '279282362@qq.com'; 
		// $user->birthday = strtotime('1987-04-09'); 
		// if ($user->save()) { 
		// 	return '用户['.$user->nickname.':'.$user->id.']新增成功';
		// }else{ 
		// 	return $user->getError(); 
		// }
		$user = new UserModel; 
		// 这里使用 allowField(true) 是为了避免表单令牌验证的字段被写入数据表，如果你已经在模型里面定 义了field属性的话，可以不需要
		if ($user->allowField(true)->validate(true)->save(input('post.'))) {
			// 写入关联数据 
			$profile = new Profile; 
			$profile->truename = '林耘宇'; 
			$profile->birthday = '1987-03-05'; 
			$profile->address = '中国成都'; 
			$profile->email = 'thinkphp@qq.com'; 
			$user->profile()->save($profile); 
 	        return '用户[ ' . $user->nickname . ':' . $user->id . ' ]新增成功'; 
		}else { 
			return $user->getError(); 
		}
	}

	// 删除一条数据
	public function delete($id){
		$user = UserModel::get($id);
		if($user){
			$user->delete();
			return "删除".$id."成功";
		}else{
			return "数据不存在";
		}
		
	}

	//邮箱查询范围条件
	public function scope($email=''){
		$list = UserModel::all(['id'=>1]);
		foreach ($list as $user) { 
			echo $user->nickname . '<br/>';
			echo $user->email . '<br/>';
			echo $user->birthday . '<br/>';
			echo $user->status . '<br/>';
			echo '-------------------------------------<br/>';
		} 
	}

	//	读取用户数据 
	public function read($id='') { 
		$user = UserModel::get($id); 
		// echo $user->nickname . '<br/>'; 
		// echo $user->email . '<br/>'; 
		// echo $user->birthday . '<br/>';
		// echo $user->user_birthday . '<br/>';
		$user->profile;
		return json($user);
	}

	//	全局查询范围 
	protected static function base($query) { 
	// 查询状态为1的数据 
		$query->where('status',1); 
	}

	//	创建用户数据页面
	public function create() { 
		return view('user/create');
	}
	// 增加单本书
	public function addBook() { 
		$user = UserModel::get(1); 
		$book = new Book; 
		$book->title = 'ThinkPHP5快速入门'; 
		$book->publish_time = '2016-05-06'; 
		$user->books()->save($book); 
		return '添加Book成功'; 
	}

	public function addBooks() { 
		$user = UserModel::get(1); 
		$books = [ 
			['title' => 'ThinkPHP5快速入门', 
			'publish_time' => '2016-05-06'], 
			['title' => 'ThinkPHP5开发手册', 
			'publish_time' => '2016-03-06'], 
		]; 
		$user->books()->saveAll($books); 
		return '添加Book成功'; 
	}
}
