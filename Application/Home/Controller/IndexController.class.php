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
			$login = array( 
				//验证登录信息  
				array('username','require','账号不能为空'),
				array('username','checkLoginName','账号或密码错误',1,'callback'), 
				array('password','require','密码不能为空'),
				array('password','checkLoginPassword','账号或密码错误',1,'callback'),
				array('code','require','验证码不能为空',1),
				array('code','checkCode','验证码错误',1,'callback'), 
			);
	        $m= D("Myuser"); 
	        if (!$m->validate($login)->create()){
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

	public function register(){
		if(IS_POST){
			//验证注册信息
			$reg = array( 
				array('username','require','账号不能为空'),
				array('username','','账号已经存在',0,'unique',1),
				array('password','require','密码不能为空'),
				array('password','/^[a-z\d_]{6,16}$/i','密码必须是6-16个字符的字母、数字或者下划线',0,'regex',1),
				array('confirm_password','require','确认密码不能为空'),
				array('confirm_password','password','两次输入密码不一致',0,'confirm'),
				array('email','require','邮箱不能为空'), 
				array('email','/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/','邮箱格式错误',0,'regex',1),
				array('email','','邮箱已被注册！',0,'unique',1),
				array('code','require','验证码不能为空',1),
				array('code','checkRegCode','验证码错误',1,'callback'), 
				);
			$m= D("Myuser"); 
			if (!$m->validate($reg)->create()){
				$this->error($m->getError());
			}else{
			$regtime = time();//获得注册时间
			$m->regtime=$regtime;
			$m->power=null;
			$m->add();
			$this->success('注册成功');
			}
		}else{
			$this->display();
		}
	}

	public function quit(){
		session('username',null);
		cookie('username',null);
		cookie('psw',null);
		$this->redirect('Index/index');
	}
}