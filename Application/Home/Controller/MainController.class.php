<?php
namespace Home\Controller;
use Think\Controller;
class MainController extends PublicController {
	public function index(){
		$sumMoney=0;
		$allMoney=0;
		$time=time();
		$w=date('w',$time);
		$m=date('y-m',$time);
		//是否有兼职数据缓存
		$employeer=S('employeer');
		if($employeer==''){
			$list=M("qiandao")->order('week ASC')->select();
			//缓存数据
			S('employeer',$list);
		}else{
			$list=S('employeer');
		}
		//获取当天的兼职数据
		$arr_live=array();
		foreach ($list as $key => $value) {
			if($value['week']==$w){
				//当天的兼职
				array_push($arr_live, $value);
			}
		}
		//获取签到详情
		// $data['username']=session("username");
		$data['username']='耀影';
		$m='16-06';
		$qiandao_list=M("woker")->where($data)->order('month desc')->select();
		foreach ($qiandao_list as $key => $value) {
			if($value['month']==$m){
				//计算当月的兼职费
				$sumMoney+=$value['salary'];
			}
			//总兼职费
			$allMoney+=$value['salary'];
		}
		$this->assign('allMoney',$allMoney);
		$this->assign('sumMoney',$sumMoney);
		$this->assign('qd_list',$qiandao_list);
		$this->assign('live',$arr_live);
		$this->assign('live',$arr_live);		
		$this->assign('list',$list);
		$this->display();
	}

	//签到操作
	public function do_qiandao(){
		$this->success(I('post.id'));
	}
}