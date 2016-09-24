<?php
namespace Home\Model;
// use Think\Model;
// class MyuserModel extends Model{
use Think\Model\RelationModel;
class MyuserModel extends RelationModel{
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
	protected function checkCode($code){
	    $verify = new \Think\Verify();
	    return $verify->check($code);
	}

	//检验验证码
	protected function checkRegCode($code){
	    $verify = new \Think\Verify();
	    return $verify->check($code);
	}
}

