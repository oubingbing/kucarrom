<?php
namespace Home\Model;
use Think\Model;
class MyuserModel extends Model{
		protected $_validate = array( 
			//验证登录信息  
			array('username','require','用户名不能为空！'),    
			array('password','require','密码不能为空！！'), 
			array('username','checkLoginName','用户名不存在！',0,'callback',1),
			array('password','checkLoginPassword','密码错误！',0,'callback',1),
			array('code','require','验证码不能为空！'),
        	array('code','checkCode','验证码错误！',0,'callback',1), 
	    );

		//检验用户名
		protected function checkLoginName($username){
			$m=M("Myuser");
			$data['username']=$username;
			$num=$m->where($data)->count();
	        if($num>0){//判断验证码是否正确
	        	return true;
	        }
	        else{
	        	return false;
	        }
    	}

    	//检验登录密码
	    protected function checkLoginPassword($password){
	    	$m=M("Myuser");
	    	$data['password']=md5($password);
	    	$num=$m->where($data)->count();
	        if($num>0){//判断验证码是否正确
	        	return true;
	        }
	        else{
	        	return false;
	        }
	    }

	    //检验验证码
	    function checkCode($code){
		    $verify = new \Think\Verify();
		    return $verify->check($code);
		}

	}

