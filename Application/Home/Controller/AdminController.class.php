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

	public function paiban(){
		if(!IS_POST){
			$data['power']=1;
			$jianzhi=M('Myuser')->where($data)->select();
			$qiandao=M('qiandao')->order('id DESC')->select();
			$this->assign('qiandao_list',$qiandao);
			$this->assign('jianzhi_list',$jianzhi);
			$this->display();
		}else{
			$m=M('qiandao');
			$m->create();
			$ret=$m->add();
			if($ret>0){
				//更新数据缓存
				$list=M("qiandao")->order('week ASC')->select();
				//缓存数据
				S('employeer',$list);
				$arr = array('tip' =>'添加成功' ,'id'=>$ret,'name'=>I('post.name'),'workpoint'=>timePoint(I('post.workpoint')),'week'=>weekNum(I('post.week')) );
				$this->success($arr);
			}else{
				$this->error('添加失败');
			}
		}
		
	}

	//删除兼职排班
	public function paiban_del(){
		$id=I('post.id');
		$where['id']=$id;
		$ret=M('qiandao')->where($where)->delete();
		if($ret==1){
			//更新数据缓存
			$list=M("qiandao")->order('week ASC')->select();
			//缓存数据
			S('employeer',$list);
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}

	public function jianzhi(){
		if(!IS_POST){
			$where['power']=1;
			$list= M('Myuser')->where($where)->select();
			$this->assign('list',$list);
			$this->display();
		}else{
			$username=I('post.username');
			$where['username']=$username;
			$data['power']=1;
			$ret=M('Myuser')->where($where)->setField($data);
			if($ret>0){
				$arr = array('tip' =>'添加兼职成功' ,'username'=>I('post.username') );
				$this->success($arr);
			}else{
				$this->error('添加兼职失败');
			}
		}
	}

	public function jianzhi_del(){
		$id=I('post.id');
		$where['id']=$id;
		$data['power']=0;
		$ret=M('Myuser')->where($where)->setField($data);
		if($ret>0){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}

	//给兼职签到
	public function help(){
		if(!IS_POST){
			$where['power']=1;
			$list= M('Myuser')->where($where)->select();
			$this->assign('list',$list);
			$this->display();

		}else{
			$data['username']=I('post.username');
			$data['startime']=time();
			$data['boss']=session('username');
			$data['time']=I('post.time');
			$data['salary']=I('post.money');
			$data['ymd']=date("y-m-d ", strtotime(I('post.timeUnix')));
			$data['month']=date("y-m", strtotime(I('post.timeUnix')));
			$data['week']=I('post.week');
			$data['point']=I('post.workpoint');
			$c=M('Woker')->add($data);
			if($c>0){
				$this->success('帮助签到成功');
			}else{
				$this->success('帮助签到失败');
			}
			
		}
	}

	//日常采购列表
	public function nornal(){
		if(!IS_POST){
			$list=M('myauto')->select();
			$this->assign('list',$list);
			$this->display();
		}else{
			$m=M('myauto');
			$m->create();
			$ret=$m->add();
			if($ret>0){
				$arr = array('tip' =>'添加成功' ,'name'=>I('post.name'),'price'=>I('post.price'),'num'=>I('post.num') );
				$this->success($arr);
			}else{
				$arr = array('tip' =>'添加失败' );
				$this->error($array);
			}

		}
	}

	//删除日常采购
	public function nornal_del(){
		$id=I('post.id');
		$where['id']=$id;
		$ret=M('myauto')->where($where)->delete();
		if($ret==1){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
}