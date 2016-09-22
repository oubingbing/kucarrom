<?php
	//判断星期
    function weekNum($week)
	{
		switch ($week) {
			case 0:return "星期日"; break;
			case 1:return "星期一"; break;
			case 2:return "星期二"; break;
			case 3:return "星期三"; break;
			case 4:return "星期四"; break;
			case 5:return "星期五"; break;
			case 6:return "星期六"; break;
		}
	}

	//判断工作时间段
	function timePoint($time){
		switch ($time) {
			case 1:return "中班"; break;
			case 2:return "午班"; break;
			case 3:return "晚班"; break;
		}

	}

?>