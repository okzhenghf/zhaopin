<?php
// 父类控制器

// 相当于路由，老前辈
// 继承的
class baseControl{
	// 属性
	// 方法
	public function run(){
		// 1、知道是哪个功能模块
		// 登录、学生成绩
		$contorl = $_GET['control'];  //user用户模块 ，score成绩模块
        

		// 2、具体是这个模块的哪个操作
		// 添加、编辑、删除
		$action = isset($_GET['action'])?$_GET['action']:'index';//edit编辑，add添加


		// 引入
		include "./control/".$contorl.".php"; //例如：include "./control/userphp"


		$control_obj = new $contorl();
		$control_obj->$action();

		// 以上两行代码会变成例如：
		// $user = new user();
		// $user->reg();
	}
}
?>