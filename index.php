<?php
// MVC特点：
// 1、单一入口文件
// 2、引入PDO、函数
include_once "./core/function.php";
// 面向对象
// class
// 运行起来

// 1/引入父类控制器
include_once "./core/baseControl.php";
// 2/实例化类 new 类（）
$baseControl = new baseControl();
// 2/实例化类 new 类（）
// http://localhost/fenda/public/admin/slider/index.html
$baseURL = 'http://localhost/fenda/public'; //tp5
$jobApiURL = 'http://localhost/zhixin/';//tp3


$baseControl->run();
?>