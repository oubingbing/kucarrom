	(function($) {
		$('.mui-scroll-wrapper').scroll({
			indicators: true 
		});
		mui('#nav').on('tap', 'a', function() {
			switch (this.getAttribute('name')) {
				case 'one':dump_page("{:U('Main/index')}");break;
				case 'two':dump_page("{:U('Buy/index')}");break;
				case 'three':dump_page("{:U('Index/index')}");break;
				case 'four':dump_page("{:U('Index/index')}");break;
				case 'five':dump_page("{:U('Index/index')}");break;
			}
		});
		function dump_page(url){
			window.location.href=url;
		}
	})(mui);