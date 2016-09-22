<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="baidu-site-verification" content="ZsfPXC6cIr" />
  <title>Kuca</title>
  <link href="/kucaroomGit/kucarrom/Public/css/bootstrap.min.css" rel="stylesheet">
  <link href="/kucaroomGit/kucarrom/Public/css/font-awesome.min.css" rel="stylesheet">
  <link href="/kucaroomGit/kucarrom/Public/css/templatemo-style.css" rel="stylesheet">
  <link rel="shortcut icon" href="/kucaroomGit/kucarrom/Public/img/favicon.ico" type="image/x-icon" />
</head>
<body>
  <!-- 引用头部文件 -->
  <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
  <!-- End Preloader -->
  <div class="tm-top-header">
    <div class="container">
      <div class="row">
        <div class="tm-top-header-inner">
          <div class="tm-logo-container">
            <img src="/kucaroomGit/kucarrom/Public/img/logo.png" alt="Logo" class="tm-site-logo">
            <h1 class="tm-site-name tm-handwriting-font">Kuca Room</h1>
          </div>
          <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
          </div>
          <nav class="tm-nav">
            <ul>
              <li><a href="/kucaroomGit/kucarrom/index.php/home/index/main" class="active">首页</a></li>
              <?php if($status == 1 ): ?><li><a href="/kucaroomGit/kucarrom/index.php/home/personal/index" ><?php if($vip == 1 ): ?><img src="/kucaroomGit/kucarrom/Public/img/Vip.png" style="width:30px"><?php endif; echo ($login); ?></a></li>
               <?php else: ?>
               <li><a href="<?php echo U('Index/login');?>"><small style="font-size:9px">未登录,点击登录</small></a></li><?php endif; ?>
             <li><a href="/kucaroomGit/kucarrom/index.php/home/Login/register">注册</a></li>
             <li><?php if($power >= 1 ): ?><a href="/kucaroomGit/kucarrom/index.php/admine" >后台</a><?php endif; ?></li>
             <?php if($status == 1 ): ?><li><a href="/kucaroomGit/kucarrom/index.php/home/Login/quit" >退出</a></li><?php endif; ?>
           </ul>
         </nav>   
       </div>           
     </div>    
   </div>
 </div> 

 <div class="copyrights"> <a href="http://www.cssmoban.com/" ></a></div>
 <section class="tm-welcome-section">
  <div class="container tm-position-relative">
    <div class="tm-lights-container">
      <img src="/kucaroomGit/kucarrom/Public/img/light.png" alt="Light" class="light light-1">
      <img src="/kucaroomGit/kucarrom/Public/img/light.png" alt="Light" class="light light-2">
      <img src="/kucaroomGit/kucarrom/Public/img/light.png" alt="Light" class="light light-3">  
    </div>        
    <div class="row tm-welcome-content">
      <h2 class="white-text tm-handwriting-font tm-welcome-header"><img src="/kucaroomGit/kucarrom/Public/img/header-line.png" alt="Line" class="tm-header-line">&nbsp;Welcome To&nbsp;&nbsp;<img src="/kucaroomGit/kucarrom/Public/img/header-line.png" alt="Line" class="tm-header-line"></h2>
    </p>
    <a href="/kucaroomGit/kucarrom/index.php/home/Visitor/index" class="tm-more-button tm-more-button-welcome" style="">Kuca Room</a> 

    <p class="gray-text tm-welcome-description">古卡咖啡餐厅是一个由在校大学生创办的，成立于2015年4月。 <span class="gold-text">特点有三个：店面小而美、投资成本低和产品附加值高。</span>但是，古卡不仅仅只是一家咖啡餐厅，古卡来源于大学生，所以决定回到大学生中，所以古卡希望打造一个大学生可以真正体验创业的平台，其核心理念是“together”.    
    </div>
    <img src="/kucaroomGit/kucarrom/Public/img/table-set.png" alt="Table Set" class="tm-table-set img-responsive"> 
  </div>      
</section>
<div class="tm-main-section light-gray-bg">
  <div class="container">
    <section class="tm-section row">
      <div class="col-lg-9 col-md-9 col-sm-8">
        <h2 class="tm-section-header gold-text tm-handwriting-font">The Best Coffee for you</h2>
        <h2>卡布奇诺</h2>
        <p class="tm-welcome-description">卡布奇诺是一种加入以同量的意大利特浓咖啡和蒸汽泡沫牛奶相混合的意大利咖啡。此时咖啡的颜色，就像卡布奇诺教会的修士在深褐色的外衣上覆上一条头巾一样，咖啡因此得名。传统的卡布奇诺咖啡是三分之一浓缩咖啡，三分之一蒸汽牛奶和三分之一泡沫牛奶，并在上面撒上小颗粒的肉桂粉末。</p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 tm-welcome-img-container">
        <div class="inline-block shadow-img">
          <img src="/kucaroomGit/kucarrom/Public/img/kabu.jpg" alt="Image" class="img-circle img-thumbnail">  
        </div>              
      </div>            
    </section> 
    <section class="tm-section">
      <div class="row">
        <div class="col-lg-12 tm-section-header-container">
          <h2 class="tm-section-header gold-text tm-handwriting-font"><img src="/kucaroomGit/kucarrom/Public/img/logo.png" alt="Logo" class="tm-site-logo">kuca blackboard</h2> 
          <div class="tm-hr-container"><hr class="tm-hr"></div> 
        </div>  
      </div>          
      <div class="row">
        <div class="tm-daily-menu-container margin-top-60">
          <div class="col-lg-4 col-md-4">
            <img src="/kucaroomGit/kucarrom/Public/img/menu-board.png" alt="Menu board" class="tm-daily-menu-img">      
          </div>            
          <div class="col-lg-8 col-md-8">
            <p style="color:green">古卡小黑板，这里有古卡最新的动态信息，我们会把古卡最新的信息，包括最新优惠活动、招聘信息和其他与古卡相关的资讯都会公布于此。</p>
            <ol class="margin-top-30">
              <li style="color:green">古卡超值午餐，任一主食加饮品=（会员八折、非会员九折），时间为午餐时间。</li> 
              <li style="color:green">古卡开始找兼职啦，想加入我们的就把你的基本信息和邮箱发到我们的微信公众吧，预报名时间为3月30日——4月2日，面试时间为4月3日——4月5日。</li>
              <li style="color:green">古卡晋级省挑战杯，广州等着我们</li> 
            </ol>
          </div>
        </div>
      </div>          
    </section>
  </div>
</div> 
<footer>
  <div class="tm-black-bg">
    <div class="container">
      <div class="row margin-bottom-60">
        <nav class="col-lg-3 col-md-3 tm-footer-nav tm-footer-div">
          <h3 class="tm-footer-div-title">古卡</h3>
          <ul>
            <li><a href="/kucaroomGit/kucarrom/index.php/home/index/aboutus">关于我们</a></li>
            <li><a href="/kucaroomGit/kucarrom/index.php/home/index/culture">古卡文化</a></li>
            <li><a href="/kucaroomGit/kucarrom/index.php/home/index/team">古卡团队</a></li>
          </ul>
        </nav>

        <div class="col-lg-4 col-md-4 tm-footer-div">
          <h3 class="tm-footer-div-title">古卡联系</h3>
          <div class="tm-social-icons-container">
            <p>微博：古卡老屋</p>
            <p>QQ：928861455</p>
            <p>电话：15767089608</p>
            <p>微信公众号：古卡老屋(gukalaowu)<br><br><img src="/kucaroomGit/kucarrom/Public/img/erweima.jpg" style="width:200px"></p>
          </div>
        </div>
      </div>          
    </div>  
  </div>      
  <div>
    <div class="container">
      <div class="row tm-copyright">
       <p class="col-lg-12 small copyright-text text-center">Copyright &copy; 2015-2016 kucaroom.com All Right Reserved</p>
       <p class="col-lg-12 small copyright-text text-center">粤ICP备16004706号-1</p>
     </div>  
   </div>
 </div>
</footer> 
<script type="text/javascript" src="/kucaroomGit/kucarrom/Public/js/jquery-1.11.2.min.js"></script>    
<script type="text/javascript" src="/kucaroomGit/kucarrom/Public/js/templatemo-script.js"></script>      
</body>
</html>