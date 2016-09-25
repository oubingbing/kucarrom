<?php
namespace Home\Controller;
use Think\Controller;
class BuyController extends PublicController {
	public function index(){
		//日常采购单
		$data['status']==1;
		$bdata=M('Batai')->where($data)->order('id DESC')->select();
		$cdata=M('Chufang')->where($data)->order('id DESC')->select();
		$odata=M('Online')->where($data)->order('id DESC')->select();
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
				$arr = array('tip'=>'厨房原料下单成功','id'=>$ret,'where' =>I('post.radio') ,'name'=>I('post.name'),'time'=>time(),'num'=>I('post.num'),'price'=>I('post.price'),'username'=>session('username') );
				$this->success($arr);
			break;
			case 2:
				$batai = M('Batai');
				$batai->create();
				$batai->time=time();
				$batai->username=session('username');
				$ret=$batai->add();
				$arr = array('tip'=>'吧台原料下单成功','id'=>$ret,'where' =>I('post.radio') ,'name'=>I('post.name'),'time'=>time(),'num'=>I('post.num'),'price'=>I('post.price'),'username'=>session('username') );
				$this->success($arr);
			break;
			case 3:
				$ol = M('Online');
				$ol->create();
				$ol->time=time();
				$ol->username=session('username');
				$ret=$ol->add();
				$arr = array('tip'=>'网购原料下单成功','id'=>$ret,'where' =>I('post.radio') ,'name'=>I('post.name'),'time'=>time(),'num'=>I('post.num'),'price'=>I('post.price'),'username'=>session('username') );
				$this->success($arr);
			break;
		}

	}

	//厨房采购操作
	public function cf_do_buy(){
		$id=I('post.id');
		$where['id']=$id;
		$data['status']=0;
        $data['buyman']=session('username');
        $ret=M('chufang')->where($where)->setField($data);
        if($ret==1){
        	$this->success('采购成功');
        }else{
        	$this->error('采购失败');
        }
	}

	//厨房删除操作
	public function cf_do_del(){
		$id=I('post.id');
		$where['id']=$id;
        $ret=M('chufang')->where($where)->delete();
        if($ret==1){
        	$this->success('删除成功');
        }else{
        	$this->error('删除失败');
        }
	}

	//吧台采购操作
	public function bt_do_buy(){
		$id=I('post.id');
		$where['id']=$id;
		$data['status']=0;
        $data['buyman']=session('username');
        $ret=M('batai')->where($where)->setField($data);
        if($ret==1){
        	$this->success('采购成功');
        }else{
        	$this->error('采购失败');
        }
	}

	//吧台删除操作
	public function bt_do_del(){
		$id=I('post.id');
		$where['id']=$id;
        $ret=M('batai')->where($where)->delete();
        if($ret==1){
        	$this->success('删除成功');
        }else{
        	$this->error('删除失败');
        }
	}

	//网购采购操作
	public function ol_do_buy(){
		$id=I('post.id');
		$where['id']=$id;
		$data['status']=0;
        $data['buyman']=session('username');
        $ret=M('online')->where($where)->setField($data);
        if($ret==1){
        	$this->success('采购成功');
        }else{
        	$this->error('采购失败');
        }
	}

	//网购删除操作
	public function ol_do_del(){
		$id=I('post.id');
		$where['id']=$id;
        $ret=M('online')->where($where)->delete();
        if($ret==1){
        	$this->success('删除成功');
        }else{
        	$this->error('删除失败');
        }
	}

	//厨房数量更新操作
	public function cf_changeNum(){
		$where['id']=I('post.id');
		$data['num']=I('post.value');
		$ret=M('Chufang')->where($where)->setField($data);
        if($ret==1){
        	$this->success('更新成功');
        }else{
        	$this->error('更新失败');
        }
	}

	//厨房价格更新操作
	public function cf_changePrice(){
		$where['id']=I('post.id');
		$data['price']=I('post.value');
		$ret=M('Chufang')->where($where)->setField($data);
        if($ret==1){
        	$this->success('更新成功');
        }else{
        	$this->error('更新失败');
        }
	}

	//吧台数量更新操作
	public function bt_changeNum(){
		$where['id']=I('post.id');
		$data['num']=I('post.value');
		$ret=M('batai')->where($where)->setField($data);
        if($ret==1){
        	$this->success('更新成功');
        }else{
        	$this->error('更新失败');
        }
	}

	//吧台价格更新操作
	public function bt_changePrice(){
		$where['id']=I('post.id');
		$data['price']=I('post.value');
		$ret=M('batai')->where($where)->setField($data);
        if($ret==1){
        	$this->success('更新成功');
        }else{
        	$this->error('更新失败');
        }
	}

	//网购数量更新操作
	public function ol_changeNum(){
		$where['id']=I('post.id');
		$data['num']=I('post.value');
		$ret=M('online')->where($where)->setField($data);
        if($ret==1){
        	$this->success('更新成功');
        }else{
        	$this->error('更新失败');
        }
	}

	//网购价格更新操作
	public function ol_changePrice(){
		$where['id']=I('post.id');
		$data['price']=I('post.value');
		$ret=M('online')->where($where)->setField($data);
        if($ret==1){
        	$this->success('更新成功');
        }else{
        	$this->error('更新失败');
        }
	}

}