<?php
namespace Home\Controller;
use Think\Controller;
class BuyController extends PublicController {
	public function index(){
		//日常采购单
		$data['status']==1;
		$bdata=M('Batai')->where($data)->select();
		$cdata=M('Chufang')->where($data)->select();
		$odata=M('Online')->where($data)->select();
		//原材料
		$list=S('src_list');
		if($list==''){
			$list=M('Myauto')->select();
		}
		//采购明细
		$buyList=M('Srorder')->limit(15)->order('id DESC')->select();
		$this->assign('buyList',$buyList);
		$this->assign('srcList',$list);
		$this->assign('batai',$bdata);
		$this->assign('online',$odata);
		$this->assign('chufang',$cdata);
		$this->display();
	}
	//入料
	public function add_src(){
		$radio=I('post.radio');
		switch ($radio) {
			case 1:
				$chufang = M('Chufang');
				$chufang->create();
				$chufang->time=time();
				$chufang->username=session('username');
				$ret=$chufang->add();
				$this->success('吧台原料下单成功');
			break;
			case 2:
				$batai = M('Batai');
				$batai->create();
				$batai->time=time();
				$batai->username=session('username');
				$batai->add();
				$this->success('吧台原料下单成功');
			break;
			case 3:
				$ol = M('Online');
				$ol->create();
				$ol->time=time();
				$ol->username=session('username');
				$ol->add();
				$this->success('网购原料下单成功');
			break;
		}

	}
}