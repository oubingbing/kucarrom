<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends PublicController {
	public function index(){
		$this->display();
	}

	public function finance(){
		if(!IS_POST){
			$bus=M('Business')->order('id DESC')->select();
			$cost=M('cost')->order('id DESC')->select();
			$this->assign('business',$bus);
			$this->assign('cost',$cost);
			$this->display();
		}else{
			$addData = array( 
				//验证登录信息  
				array('ym','require','日期不能为空'),
				array('allmoney','require','金额不能为空'),
				array('alipay','require','支付宝不能为空'),
				array('weixinpay','require','微信不能为空'),
				array('cash','require','现金不能为空'),
				array('num','require','订单不能为空'),
				array('yesterDay','require','昨日零钱不能为空'),
				array('todayYingyou','require','今日应有不能为空'),
				array('todayShiyou','require','今日实有不能为空'),
				array('takeUp','require','取走的钱不能为空'),
				array('info','require','余零不能为空'),
				);
			$m=M("Business"); 
			if (!$m->validate($addData)->create()){
				$this->error($m->getError());
			}else{
				$m->time=time();
				$m->m=date('y-m');
				$ret=$m->add();
				if($ret>0){
					$arr = array('tip'=>'录入成功','id'=>$ret,'ym' =>I('post.ym') ,'allmoney'=>I('post.allmoney'),'alipay'=>I('post.alipay'),'weixinpay'=>I('post.weixinpay'),'cash'=>I('post.cash'),'num' =>I('post.num') ,'yesterDay'=>I('post.yesterDay'),'todayYingyou'=>I('post.todayYingyou'),'todayYingyou'=>I('post.todayYingyou'),'todayShiyou'=>I('post.todayShiyou'),'takeUp'=>I('post.takeUp'),'info'=>I('post.info'));
					$this->success($arr);
				}else{
					$this->error("录入失败");
				}
			}
		}
	}

	public function busuness_del(){
		$id=I('post.id');
		$where['id']=$id;
		$ret=M('Business')->where($where)->delete();
		if($ret==1){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
}