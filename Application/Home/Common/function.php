<?php
	//判断星期
    function weekNum($week)
	{
		switch ($week) {
			case 0:return "星期日"; break;
			case 1:return "星期一"; break;
			case 2:return "星期二"; break;
			case 3:return "星期三"; break;
			case 4:return "星期四"; break;
			case 5:return "星期五"; break;
			case 6:return "星期六"; break;
		}
	}

	//判断工作时间段
	function timePoint($time){
		switch ($time) {
			case 1:return "中班"; break;
			case 2:return "午班"; break;
			case 3:return "晚班"; break;
		}

	}

	//判断当前时间是那个班次
	function whatTime(){
		$t=strtotime(date('H:i'));
		if($t>strtotime('11:00')&&$t<strtotime('13:00')){
			return 1;
		}else{
			if($t>strtotime('16:30')&$t<strtotime('18:30')){
				return 2;
			}else{
				if($t>strtotime('18:30')&$t<strtotime('22:30')){
					return 3;
				}else{
					return 0;
				}
			}
		}
	}

	//判断是否已经签到了
	function had_qiandao($week,$point){
		$data['username']=session('username');
		$data['week']=$week;
		$data['point']=$point;
		$data['month']=date('y-m');
		$ret=M('woker')->where($data)->count();
		if($ret>0){
			return true;
		}else{
			return false;
		}
	}

	//计算兼职费
	function count_money($h){
		$w=date('w');
		if($w==0||$w==6){
			return C('Money_weeken')*whatHour($h);
		}else{
			return C('Money')*whatHour($h);
		}
	}

	//几个工作小时
	function whatHour($h){
		switch ($h) {
			case 1:return 2;break;
			case 2:return 2;break;
			case 3:return 4;break;
		}
	}

	//检验登录信息
	function checkLoginInfo($username){
		$m=M("Myuser");
		$data['username']=$username;
		$data['password']=md5($password);
		$num=$m->where($data)->count();
	        if($num>0){//判断验证码是否正确
	        	return true;
	        }
	        else{
	        	$this->error("用户名或密码错误");
	        	exit();
	        }
	    }

	//检验验证码
	function checkCode($code){
	    $verify = new \Think\Verify();
	    return $verify->check($code);
	}
?>