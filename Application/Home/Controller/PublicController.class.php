<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller {
	protected function _initialize() {
		header("Content-Type:text/html; charset=utf-8");
		if (!$this->is_mobile()) { 
			echo "请使用手机访问，谢谢";
			exit();
		}
	}

	//判断是否是手机访问
	function is_mobile() { 
		$user_agent = $_SERVER['HTTP_USER_AGENT']; 
		$mobile_agents = array("240x320","acer","acoon","acs-","abacho","ahong","airness","alcatel", 
			"amoi","android","anywhereyougo.com","applewebkit/525","applewebkit/532","asus","audio", 
			"au-mic","avantogo","becker","benq","bilbo","bird","blackberry","blazer","bleu", 
			"cdm-","compal","coolpad","danger","dbtel","dopod","elaine","eric","etouch","fly ", 
			"fly_","fly-","go.web","goodaccess","gradiente","grundig","haier","hedy","hitachi", 
			"htc","huawei","hutchison","inno","ipad","ipaq","iphone","ipod","jbrowser","kddi", 
			"kgt","kwc","lenovo","lg ","lg2","lg3","lg4","lg5","lg7","lg8","lg9", 
			"lg-","lge-","lge9","longcos","maemo", 
			"mercator","meridian","micromax","midp","mini","mitsu","mmm","mmp","mobi","mot-", 
			"moto","nec-","netfront","newgen","nexian","nf-browser","nintendo","nitro","nokia", 
			"nook","novarra","obigo","palm","panasonic","pantech","philips","phone","pg-", 
			"playstation","pocket","pt-","qc-","qtek","rover","sagem","sama","samu","sanyo", 
			"samsung","sch-","scooter","sec-","sendo","sgh-","sharp","siemens","sie-","softbank", 
			"sony","spice","sprint","spv","symbian","tablet","talkabout","tcl-","teleca","telit", 
			"tianyu","tim-","toshiba","tsm","up.browser","utec","utstar","verykool","virgin", 
			"vk-","voda","voxtel","vx","wap","wellco","wig browser","wii","windows ce", 
			"wireless","xda","xde","zte"); 
		$is_mobile = false; 
		foreach ($mobile_agents as $device) { 
			if (stristr($user_agent, $device)) { 
				$is_mobile = true; 
				break; 
			} 
		} 
		return $is_mobile; 
	}

	//验证码
	public function code() {
		$config =    array(
            'fontSize'    =>    15,    // 验证码字体大小
            'length'      =>    3,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点

            );
		$Verify = new \Think\Verify($config);
		$Verify->codeSet = '0123456789';
		$Verify->entry();
	}
}