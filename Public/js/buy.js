	$(document).ready(function(){
		//设置页面的高
		$('.mui-slider-group').height($(document).height()-80);
		//签到操作
		$("#post_form").submit(function(e){
	        //简单的前端判断
	        if($('input[name="name"]').val()==''){
	        	mui.toast("原料名称不能为空");
	        	return false;
	        }
	        if($('input[name="price"]').val()==''){
	        	mui.toast("原料价格不能为空");
	        	return false;
	        }
	        if($('input[name="num"]').val()==''){
	        	mui.toast("原料数量不能为空");
	        	return false;
	        }
	        var self = $(this);
	        $.post(self.attr("action"), self.serialize(), success, "json");
	        return false;
	        function success(ajaxdata){
	         	if(ajaxdata.status==1){
	         		mui.alert(ajaxdata.info.tip);
	         		switch (ajaxdata.info.where) {
	         			case '1':
	         			$("#cf").prepend('<li class="mui-table-view-cell mui-media"><a><div class="mui-media-body"><label style="color:red;">'+ajaxdata.info.name+'</label>　<span style="float:right">下单日期:刚刚</span><p>数量：<input class="inputChange" type="text" name="num" value="'+ajaxdata.info.num+'" style="width:80px;height:30px;text-align:center">　　<span style="float:right">总金额：<input class="inputChange" type="text" name="num" value="'+ajaxdata.info.price+'" style="width:80px;height:30px;text-align:center;"></span></p><p class="mui-ellipsis"><label>下单：</label>'+ajaxdata.info.username+'　<button style="float:right" type="button" class="mui-btn mui-btn-danger mui-pull-right">删除</button><button type="button" class="mui-btn mui-btn-warning" style="float:right;margin-right:20px">采购</button></p></div></a></li>');
	         			break;
	         			case '2':
	         			$("#bt").prepend('<li class="mui-table-view-cell mui-media"><a><div class="mui-media-body"><label style="color:red;">'+ajaxdata.info.name+'</label>　<span style="float:right">下单日期:刚刚</span><p>数量：<input class="inputChange" type="text" name="num" value="'+ajaxdata.info.num+'" style="width:80px;height:30px;text-align:center">　　<span style="float:right">总金额：<input class="inputChange" type="text" name="num" value="'+ajaxdata.info.price+'" style="width:80px;height:30px;text-align:center;"></span></p><p class="mui-ellipsis"><label>下单：</label>'+ajaxdata.info.username+'　<button style="float:right" type="button" class="mui-btn mui-btn-danger mui-pull-right">删除</button><button type="button" class="mui-btn mui-btn-warning" style="float:right;margin-right:20px">采购</button></p></div></a></li>');
	         			break;
	         			case '3':
	         			$("#ol").prepend('<li class="mui-table-view-cell mui-media"><a><div class="mui-media-body"><label style="color:red;">'+ajaxdata.info.name+'</label>　<span style="float:right">下单日期:刚刚</span><p>数量：<input class="inputChange" type="text" name="num" value="'+ajaxdata.info.num+'" style="width:80px;height:30px;text-align:center">　　<span style="float:right">总金额：<input class="inputChange" type="text" name="num" value="'+ajaxdata.info.price+'" style="width:80px;height:30px;text-align:center;"></span></p><p class="mui-ellipsis"><label>下单：</label>'+ajaxdata.info.username+'　<button style="float:right" type="button" class="mui-btn mui-btn-danger mui-pull-right">删除</button><button type="button" class="mui-btn mui-btn-warning" style="float:right;margin-right:20px">采购</button></p></div></a></li>');
	         			break;
	         		}

		        }else{
		          	mui.toast(ajaxdata.info);
		        }
      		}
  		});

		//显示那个采购单
		$('.whichShow').on('click',function(){
			var name=$(this).attr('name');
			var cf=$('#cf');
			var bt=$('#bt');
			var ol=$('#ol');
			switch (name) {
				case '1':
				cf.css('display','');
				bt.css('display','none');
				ol.css('display','none');
				break;
				case '2':
				cf.css('display','none');
				bt.css('display','');
				ol.css('display','none');
				break;
				case '3':
				cf.css('display','none');
				bt.css('display','none');
				ol.css('display','');
				break;
			}
		});

		//获取动态产生的元素
		//厨房采购操作
        $('#cf').on('click','.do_buy',function(){
            var id=$(this).attr("id");
            $.ajax({
            	url: "{:U('Buy/do_buy')}",
            	dataType: "json",
            	async: true,
            	data: {id:id},
            	type: "POST",
            	success: function(ajaxdata) {
            		mui.toast(ajaxdata.info);
            		if(ajaxdata.status==1){
            			
            		}
            	},
            	error: function() {
            		alert('网络出错');
            	}
            });
        });

	});