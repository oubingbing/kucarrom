<?php
namespace Home\Controller;
use Think\Controller;
class MainController extends PublicController {
	protected function _initialize() {
		$data['username']=session('username');
		$power=M('Myuser')->where($data)->getField('power');
		if($power<=0){
			$this->redirect('Index/index');
		}

	}
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
		$data['username']=session("username");
		$m=date('y-m');
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
		//判断是否有排班
		$w=date('w');
		$data['name']=session('username');
		$data['week']=$w;
		$ret=M('qiandao')->where($data)->find();
		if($ret==null){
			$this->error('今天没有你的排班');
		}else{
			//判断是否可以签到了
			switch (whatTime()) {
				case 1:
				//中班
				//判断是否有这个时间段的签到了
				if(had_qiandao($w,1)){
					$this->error('你已经签到了，无需重复签到');
				}else{
					$data['username']=session('username');
		            $data['startime']=time();
		            $data['time']=2;
		            $data['salary']=count_money(1);
		            $data['ymd']=date("y-m-d ", time());
		            $data['month']=date("y-m", time());
		            $data['week']=date('w');
		            $data['point']=1;
		            $c=M('Woker')->add($data);
		            $arr = array('tip' =>'签到成功,'.'两小时,'.count_money(1).'元' ,'username'=>session('username'),'time'=>2,'salary'=>count_money(1) );
					$this->success($arr);
				}
				break;
				case 2:
				//午班
				if(had_qiandao($w,2)){
					$this->error('你已经签到了，无需重复签到');
				}else{
					$data['username']=session('username');
		            $data['startime']=time();
		            $data['time']=2;
		            $data['salary']=count_money(2);
		            $data['ymd']=date("y-m-d ", time());
		           	$data['month']=date("y-m", time());
		            $data['week']=date('w');
		            $data['point']=2;
		            $c=M('Woker')->add($data);
					$arr = array('tip' =>'签到成功,'.'两小时,'.count_money(2).'元' ,'username'=>session('username'),'time'=>2,'salary'=>count_money(2) );
					$this->success($arr);
				}
				break;
				case 3:
				//晚班
				if(had_qiandao($w,3)){
					$this->error('你已经签到了，无需重复签到');
				}else{
					$data['username']=session('username');
		            $data['startime']=time();
		            $data['time']=4;
		            $data['salary']=count_money(3);
		            $data['ymd']=date("y-m-d", time());
		           	$data['month']=date("y-m", time());
		            $data['week']=date('w');
		            $data['point']=3;
		            $c=M('Woker')->add($data);
		            $arr = array('tip' =>'签到成功,'.'两小时,'.count_money(3).'元' ,'username'=>session('username'),'time'=>4,'salary'=>count_money(3) );
					$this->success($arr);
				}
				break;
				case 0:
				//没到排班签到时间
					$this->error('还没到签到时间');
				break;

			}
		}
	}
}