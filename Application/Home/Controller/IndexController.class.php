<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends PublicController {
	public function index(){
		if(IS_POST){
			$s=session('username');
			if($s!=''){
				//判断是否重复登录
				$this->error('你已经登录了，不能重复登录！');
				exit();
			}
			//验证登录信息
	        $m= D("Myuser"); 
	        if (!$m->create()){
            	$this->error($m->getError());
			}else{
				session('username',I('post.username'));
				cookie('username',I('post.username'),3600*24*160);
				cookie('psw',md5(I('post.password')),3600*24*160);
				$this->success('登录成功');
			}
		}else{
			$this->display();
		}
	}

	public function quit(){
		session(null);
		$this->redirect('Index/index');
	}
}