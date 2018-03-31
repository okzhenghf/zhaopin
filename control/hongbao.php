<?php
/**
* 红包领取
*/
class hongbao
{
	public function lingqu()
	{
		//查询数据库
		$info = find('mh_hongbao',['uid'=>1]);
		// 如果无记录，第一天
		$people_day = $info['h_total']+1;
		
		// 如果连续次数是1，那么就把第二天加一个背景色
		
       $isShow = $this->getHasDo();
		include_once "./view/hongbao/lingqu.html";
	}
	public function add_log(){
		$isShow = $this->getHasDo();
		$a_time = time();
		$h_total = $_GET['people_day'];
		$add_money = '0.88';
		$sql = "insert into mh_hongbao(uid,a_time,h_total,add_money)values(1,$a_time,$h_total,$add_money)";
		insert($sql);
	}
	public function getHasDo(){
		$last_record = find('mh_hongbao',['uid'=>1],'a_time','id desc');
		if(empty($last_record)){
			$isShow = true;
		}else{
			// php获取当天
			$now_month = date('m',time()); //month月
			$now_day = date('d',time()); //day 天

			// 时间戳
			$record_month = date('m',$last_record['a_time']);
			$record_day = date('d',$last_record['a_time']);
			if($now_month == $record_month && $now_day == $record_day){
				$isShow = false;
			}else{
				$isShow = true;
			}
		}
		return $isShow;
	}
}
?>