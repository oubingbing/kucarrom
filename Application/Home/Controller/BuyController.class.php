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
		$allmoney=0;
		$username=session('username');
		//计算个人采购金额
		foreach ($bdata as $key => $value) {
			if($value['buyman']==$username){
				$allmoney+=$value['price'];
			}
		}
		foreach ($cdata as $key => $value) {
			if($value['buyman']==$username){
				$allmoney+=$value['price'];
			}
		}
		foreach ($odata as $key => $value) {
			if($value['buyman']==$username){
				$allmoney+=$value['price'];
			}
		}
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
		$this->assign('allmoney',$allmoney);
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

	//清空已采购原料
	public function clear(){
		$name=session('username');
		if ($name!="区志彬") {
			$this->error('您不是古卡财务人员，无法进行此操作！！！');
			exit();
		}
		$b=M('Batai')->select();
		$c=M('Chufang')->select();
		$ol=M('Online')->select();
		$dataStatus['status']=0;
		$bret=M('Batai')->where($dataStatus)->find();
		$cret=M('Chufang')->where($dataStatus)->find();
		$oret=M('Online')->where($dataStatus)->find();
		$allmoney='';
		$bm='';
		$cm='';
		$om='';
		foreach ($b as $key => $val) {
			if($val['status']==0){ 
				$allmoney=$allmoney+$val['price'];
				$bm=$bm+$val['price'];
			}
		}
		foreach ($c as $key => $val) {
			if($val['status']==0){ 
				$allmoney=$allmoney+$val['price'];
				$cm=$cm+$val['price'];
			}
		}
		foreach ($ol as $key => $val) {
			if($val['status']==0){ 
				$allmoney=$allmoney+$val['price'];
				$om=$om+$val['price'];
			}
		}
		if($bret>0||$cret>0||$oret>0){
			$order_data=array();
			$order_data['username']='古卡';
			$order_data['time']=time();
			$order_data['price']=$allmoney;
			$order_data['m']=date('y-m');
			$oid=D('Srorder')->add($order_data);
         	//制作日支出表
			$costdata['chufang']=$cm;
			$costdata['batai']=$bm;
			$costdata['online']=$om;
			$costdata['other']=0;
			$costdata['time']=time();
			$costdata['ym']=date('y-m-d');
			$costdata['m']=date('y-m');
			M('Cost')->add($costdata);
		}else{
			$this->error('没有可清除的原料单！！！');
		}
		if ($oid) {
			foreach ($b as $key => $val) {
				$order_b=array();
				if($val['status']==0){ 
					$order_b['oid']=$oid;
					$order_b['name']=$val['name'];
					$order_b['price']=$val['price'];
					$order_b['num']=$val['num'];
					$order_b['time']=$val['time'];
					$order_b['buyman']=$val['buyman'];
					$order_b['m']=date('y-m');
					$is_ok=D('Orderlist')->add($order_b); 
				}
			}
			foreach ($c as $key => $val) {
				if($val['status']==0){
					$order_c=array();
					$order_c['oid']=$oid;
					$order_c['name']=$val['name'];
					$order_c['price']=$val['price'];
					$order_c['num']=$val['num'];
					$order_c['time']=$val['time'];
					$order_c['buyman']=$val['buyman'];
					$order_c['m']=date('y-m');
					$is_ok=D('Orderlist')->add($order_c);  
				}
			}
			foreach ($ol as $key => $val) {
				if($val['status']==0){
					$order_c=array();
					$order_c['oid']=$oid;
					$order_c['name']=$val['name'];
					$order_c['price']=$val['price'];
					$order_c['num']=$val['num'];
					$order_c['time']=$val['time'];
					$order_c['buyman']=$val['buyman'];
					$order_c['m']=date('y-m');
					$is_ok=D('Onlinelist')->add($order_c);  
				}
			}
			$where['status']=0;
			$data['status']=1;
			$id['id']=1;
			M('Caigou')->where($id)->save($data);
			M('Batai')->where($where)->delete(); 
			M('Chufang')->where($where)->delete();
			M('Online')->where($where)->delete();
			$this->success('清除成功！！！');
		}
	}

	//获取原料详情
	public function detail(){
		$m=M('Myuser');
		$where['username']=session('username');
		$c=$m->where($where)->getField('buy');
		if ($c==0) {
			$this->error('您不是古卡采购人员，无法进入该页面！！！');
			exit();
		}
		$id=I('id',0,'int');
		$m=M('Orderlist');
		$where['oid']=$id;
		$online=M('Onlinelist');
		$data=$m->where($where)->select();

		$allmoney=0;
		$allonline=0;
		foreach ($data as $key => $val) {        
			$allmoney+=$val['price'];
		}
		foreach ($onlinedata as $key => $val) {        
			$allonline+=$val['price'];
		}
		$w=M();
		$r=$w->query("select buyman,oid,sum(price) as 'kucapay'  from tp_orderlist where oid=".$id." group by buyman,oid ");
		$this->assign('zhichu',$r);
		$this->assign('data',$data);
		$this->assign('money',$allmoney);
		$this->assign('onlinemoney',$allonline);
		$this->display();
	}

	//自动下采购单
	public function auto(){
      $myauto=M('Myauto');
      $chufang=M('Chufang');
      $re=$myauto->select();
      foreach ($re as $key => $val) {   
        $order_c=array();
        $order_c['name']=$val['name'];
        $order_c['price']=$val['price'];
        $order_c['num']=$val['num'];
        $order_c['status']=$val['status'];
        $order_c['time']=time();
        $order_c['username']=session('username');
        $order_c['buyman']='null';
        $is_ok=D('Chufang')->add($order_c);  
      }
      $this->redirect('Buy/index');
	}

}