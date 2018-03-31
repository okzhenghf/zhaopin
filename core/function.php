<?php


$pdo = new PDO("mysql:host=localhost;dbname=nd_manhua;charset=utf8","root","");

	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);



function saveFile($req_file){

$tmp_name = $req_file['tmp_name'];

$type = $req_file['type'];

list($file_type,$file_ext) = explode('/', $type);
copy($_FILES['eorror_book']['tmp_name'], './uploads/'.time().'.'.$file_ext);

}

// 通过指定sql获取数据库信息
// 通过指定sql获取数据库信息






function getInfo($sql){

	
	global $pdo;
	$pdoStatment = $pdo->prepare($sql);

	$pdoStatment->execute();

	return $pdoStatment->fetch();
}
/**
 * 查找记录
 * @param  string $table_name 表名
 * @param  array $where_data 查询数组条件
 * @param  string $fields     查询哪些自动
 * @return array             一条记录
 */
function find($table_name,$where_data,$fields='*',$order="")
{
	
	// $where_data条件后面值提取出来 ['user_name'=>$uname,'user_pwd'=>$upwd]
	//把上面的数组生成字符串如: user_name='$uname' and user_pwd='$upwd'
	// 推荐方案：
	// 遍历下，就OK
	// 
	// 备用方案：
	// 1.1、获取数组的键array_keys ['user_name','user_pwd']
	// 1.2、获取数组的值array_values [$uname,$upwd]
	// 
	global $pdo;
	$sql_where = "";

	if ($where_data) {
		$join_str = "";
		foreach ($where_data as $key => $value) {
			 $sql_where .= $join_str." $key = '$value' ";
			 $join_str = " and ";
		}
	}

    $order_sql = "";
	if ($order) {
		$order_sql = "order by $order";
	}
	$sql =" select $fields from $table_name where $sql_where $order_sql";

	

	$pdoStatment = $pdo->prepare($sql);

	$pdoStatment->execute();
	return $pdoStatment->fetch();
}

function update($sql){
  global $pdo;
  $pdo->exec($sql);
}
?>