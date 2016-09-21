<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>古卡老屋</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link rel="stylesheet" href="/kucaroomGit/kucarrom/Public/css/mui.min.css">
		<link href="/kucaroomGit/kucarrom/Public/css/iconfont.css" rel="stylesheet"/>
		<script src="/kucaroomGit/kucarrom/Public/js/mui.min.js"></script>
		<style>
			html,
			body {
				background-color: #efeff4;
			}
			.header{
				background-color: rgba(96,56,17,1);
				color: #9B30FF;
			}
			.mui-action-back{
				color: white;
				font-size: 5px;
			}
			.mui-title{
				color: white;
			}
			.spancolor{
				color: rgba(96,56,17,1);
			}
			.active{
				color: red;
			}
						.mui-bar~.mui-content .mui-fullscreen {
				top: 44px;
				height: auto;
			}
			
			.mui-pull-top-tips {
				position: absolute;
				top: -20px;
				left: 50%;
				margin-left: -25px;
				width: 40px;
				height: 40px;
				border-radius: 100%;
				z-index: 1;
			}
			
			.mui-bar~.mui-pull-top-tips {
				top: 24px;
			}
			
			.mui-pull-top-wrapper {
				width: 42px;
				height: 42px;
				display: block;
				text-align: center;
				background-color: #efeff4;
				border: 1px solid #ddd;
				border-radius: 25px;
				background-clip: padding-box;
				box-shadow: 0 4px 10px #bbb;
				overflow: hidden;
			}
			
			.mui-pull-top-tips.mui-transitioning {
				-webkit-transition-duration: 200ms;
				transition-duration: 200ms;
			}
			
			.mui-pull-top-tips .mui-pull-loading {
				margin: 0;
			}
			.xxx{
				margin-right:0; text-align:left; padding: 5%; border: 1px solid #efeff4;
			}
			.mui-pull-top-wrapper .mui-icon,
			.mui-pull-top-wrapper .mui-spinner {
				margin-top: 7px;
			}
			
			.mui-pull-top-wrapper .mui-icon.mui-reverse {
				/*-webkit-transform: rotate(180deg) translateZ(0);*/
			}
			
			.mui-pull-bottom-tips {
				text-align: center;
				background-color: #efeff4;
				font-size: 15px;
				line-height: 40px;
				color: #777;
			}
			
			.mui-pull-top-canvas {
				overflow: hidden;
				background-color: #fafafa;
				border-radius: 40px;
				box-shadow: 0 4px 10px #bbb;
				width: 40px;
				height: 40px;
				margin: 0 auto;
			}
			
			.mui-pull-top-canvas canvas {
				width: 40px;
			}
			
			.mui-slider-indicator.mui-segmented-control {
				background-color: #efeff4;
			}
		</style>
	</head>
	<body>
		<header class="mui-bar mui-bar-nav header">
			<a class="mui-action-back mui-icon mui-pull-left">kuca</a>
			<h1 id="title" class="mui-title">古卡老屋</h1>
		</header>
		<nav class="mui-bar mui-bar-tab">
			<a id="defaultTab" class="mui-tab-item" href="tab-webview-subpage-about.html">
				<span class="spancolor mui-icon iconfont icon-jianzhishouru active"></span>
				<span class="spancolor mui-tab-label active">兼职</span>
			</a>
			<a class="mui-tab-item" href="tab-webview-subpage-chat.html">
				<span class="spancolor mui-icon iconfont icon-jinhuoche" ></span>
				<span class="spancolor mui-tab-label">采购</span>
			</a>
			<a class="mui-tab-item" href="tab-webview-subpage-contact.html">
				<span class="spancolor mui-icon iconfont icon-caiwu" ></span>
				<span class="spancolor mui-tab-label">财务</span>
			</a>
			<a class="mui-tab-item" href="tab-webview-subpage-setting.html">
				<span class="spancolor mui-icon iconfont icon-houtai" ></span>
				<span class="spancolor mui-tab-label">管理</span>
			</a>
			<a class="mui-tab-item" href="tab-webview-subpage-setting.html">
				<span class="spancolor mui-icon iconfont icon-geren" ></span>
				<span class="spancolor mui-tab-label">个人</span>
			</a>
		</nav>
<div class="mui-content">
	<div id="slider" class="mui-slider mui-fullscreen" > 
		<div id="sliderSegmentedControl" class="mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
			<a class="mui-control-item" href="#item1mobile" >签到</a>
			<a class="mui-control-item" href="#item2mobile">签到明细</a>
		</div>
		<div id="sliderProgressBar" class="mui-slider-progress-bar mui-col-xs-6" ></div>
		<div class="mui-slider-group">
			<div id="item1mobile" class="mui-slider-item mui-control-content mui-active">
				<div id="scroll1" class="mui-scroll-wrapper">
					<div class="mui-scroll">
						<ul class="mui-table-view mui-grid-view mui-grid-9">
							<!--签到-->
							<li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6 qiandaodiv">
								<a>
									<span class="spancolor mui-icon iconfont icon-qiandao"></span>
									<div class="mui-media-body">签到</div>
								</a>
							</li>
							<!--签到情况-->
							<li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6" style="border-left:solid 1px gray;">
								<a>
									<span>小明 中班 已签</span><br>
									<span>小明 中班 未签</span><br>
									<span>小明 中班 未签</span><br>
									<span>小明 中班 未签</span><br>
									<span>小明 晚班 未签</span>
								</a>
							</li>
						</ul> 

						<!--排班表-->
						<ul class="mui-table-view">
							<li class="mui-table-view-cell mui-media">
								<a href="javascript:;">
									<img class="mui-media-object mui-pull-left" src="../images/shuijiao.jpg">
									<div class="mui-media-body">
										波波
										<p class='mui-ellipsis'>星期几 中班</p>
									</div>
								</a>
							</li>
							<li class="mui-table-view-cell mui-media">
								<a href="javascript:;">
									<img class="mui-media-object mui-pull-left" src="../images/muwu.jpg">
									<div class="mui-media-body">
										俊杰
										<p class='mui-ellipsis'>星期几 晚班</p>
									</div>
								</a>
							</li>
							<li class="mui-table-view-cell mui-media">
								<a href="javascript:;">
									<img class="mui-media-object mui-pull-left" src="../images/cbd.jpg">
									<div class="mui-media-body">
										达达
										<p class='mui-ellipsis'>星期几 晚班</p>
									</div>
								</a>
							</li>
							<li class="mui-table-view-cell mui-media">
								<a href="javascript:;">
									<img class="mui-media-object mui-pull-left" src="../images/shuijiao.jpg">
									<div class="mui-media-body">
										波波
										<p class='mui-ellipsis'>星期几 中班</p>
									</div>
								</a>
							</li>
							<li class="mui-table-view-cell mui-media">
								<a href="javascript:;">
									<img class="mui-media-object mui-pull-left" src="../images/muwu.jpg">
									<div class="mui-media-body">
										俊杰
										<p class='mui-ellipsis'>星期几 晚班</p>
									</div>
								</a>
							</li>
							<li class="mui-table-view-cell mui-media">
								<a href="javascript:;">
									<img class="mui-media-object mui-pull-left" src="../images/cbd.jpg">
									<div class="mui-media-body">
										达达
										<p class='mui-ellipsis'>星期几 晚班</p>
									</div>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!--签到详情-->
			<div id="item2mobile" class="mui-slider-item mui-control-content">
				<div class="mui-scroll-wrapper">
					<div class="mui-scroll">
						<ul class="mui-table-view">
							<li class="mui-table-view-cell">
								<a class="mui-navigate-right">Item 1</a>
							</li>
							<li class="mui-table-view-cell">
								<a class="mui-navigate-right">Item 2</a>
							</li>
							<li class="mui-table-view-cell">
								<a class="mui-navigate-right">Item 3</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>