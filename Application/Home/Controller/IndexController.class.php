<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $list=M('Myuser')->select();
        var_dump($list);
    }
}