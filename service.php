<?php
require_once('weixin.class.php');
$weixin = new class_weixin();
$signPackage = $weixin->GetSignPackage();
?>
<!DOCTYPE html>
<html leng="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- IE兼容模式 -->
	<meta name="viewport" content="width=640,user-scalable=no,,target-densitydpi=device-dpi">
    <meta name="apple-mobile-web-app-title" content="公众号助手 - 微信公众平台手机端"> <!-- 添加到主屏后的标题（iOS 6 新增） -->
    <meta name="apple-mobile-web-app-capable" content="yes" /> <!-- 删除苹果默认的工具栏和菜单栏 -->
    <meta name="apple-touch-fullscreen" content="yes">
    <link href="img/favicon.ico" rel="shortcut icon">
    <title>公众号助手 - 微信公众平台手机端</title>
    <meta name="keywords" content="微信公众号,微信公众号助手,公众平台,微信公众平台登录,微信公众号注册,公众号申请,微信公众号认证,微信营销,微商城,微信公众平台手机端"/>
    <meta name="description" content="公众号助手，是微信公众平台手机端，直接管理微信公众账号，实现公众帐号运营者与粉丝之间的实时互动。同时也是国内最专业的微信公众号服务商，基于公众号为客户提供账号注册、开发、运营、推广一体化解决方案。"/>
	<link type='text/css'  href="css/index.css" media="all" rel="stylesheet" />
    <!--[if lt ie 9]>
    <script src="js/css3-mediaqueries.js"></script>
    <![endif]-->  
</head>
<body>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
            	<nav class="top-nav">
            		<a href="index.html" target="_self">功能介绍</a>
            		<a href="about_us.html" target="_self">联系我们</a>
            	</nav>
            	<div class="service-img">
            		<img src="img/s_01.png" alt="公众号助手">
            		<h2>我们不仅仅提供助手App，还提供<br>公众号专业服务！</h2>
            	</div>
            </div>
            <div class="swiper-slide bg">
				<div class="c-txt">
					<h3>代理认证</h3>
					<strong>加V认证，你就是官方！</strong>
				</div>
				<img class="c-img" src="img/s_02.png" alt="粉丝消息">
            </div>
            <div class="swiper-slide bg">
            	<div class="c-txt">
            		<h3>微商城搭建</h3>
            		<strong>开启微商新时代！</strong>
            	</div>
				<img class="c-img" src="img/s_03.png" alt="运营宝典">
            </div>
            <div class="swiper-slide more-bg">
                <div class="more-bg-top">
                	<div class="c-txt">
                		<h3>MORE…</h3>
                		<strong>公众号WIFI开通、微信支付申请、<br>专业咨询和培训</strong>
                	</div>
    				<img class="c-img" src="img/more.png" alt="公众号排行榜">
                </div>
				<ul class="contact">
                    <li id="j-online-qq">
                        <span class="contact-tit">在线客服</span>
                        <span class="contact-info"><img src="img/icon_qq.png" alt="在线客服"></span>
                    </li>
                    <li><a href="tel:400-805-8802"><span class="contact-tit">咨询电话</span><span class="contact-info">400-805-8802</span></a></li>
                </ul>
				<p class="corporation">©2015 广州市珍分夺秒信息科技有限公司<br>粤ICP备14052434号-1</p>
            </div>
        </div>
    </div>
	<div class="swiper-button-next"></div>


    <script src="js/swiper.min.js"></script>
    <script type="text/javascript" src="http://wpa.b.qq.com/cgi/wpa.php"></script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script>
    //QQ客服接口
    BizQQWPA.addCustom({aty:'0',a:'0',nameAccount:4008058802,selector:'j-online-qq'});
    //触摸滑动
    var swiper = new Swiper('.swiper-container', {
        nextButton: '.swiper-button-next',
        direction: 'vertical'
    });

    //微信分享自定标题图片
	wx.config({
		debug: false,
		appId: '<?php echo $signPackage["appId"];?>',
		timestamp: <?php echo $signPackage["timestamp"];?>,
		nonceStr: '<?php echo $signPackage["nonceStr"];?>',
		signature: '<?php echo $signPackage["signature"];?>',
		jsApiList: [
			// 所有要调用的 API 都要加到这个列表中
			'checkJsApi',
			'onMenuShareAppMessage',//分享朋友
			'onMenuShareTimeline',//分享朋友圈
			'onMenuShareQQ',//分享到qq
			'onMenuShareWeibo',//分享到微博
		  ]
	});
	wx.ready(function () {
		// 在这里调用 API
		var wxData = {
			title:'公众号助手 - 微信公众平台手机端',
			desc:'公众号助手，是微信公众平台手机端，直接管理微信公众账号，实现公众帐号运营者与粉丝之间的实时互动',
			link: 'http://lilychung.github.io/',
			imgUrl:'http://lilychung.github.io/img/logo.png'
		}
		
		wx.checkJsApi({
			jsApiList: [
				'checkJsApi',
				'onMenuShareAppMessage',
				'onMenuShareTimeline',
				'onMenuShareQQ',
				'onMenuShareWeibo',
			],
			success: function(res) {
				//console.log(JSON.stringify(res));
			}
		});
		wx.onMenuShareAppMessage({
			title: wxData.title,
			desc: wxData.desc,
			link: wxData.link,
			imgUrl: wxData.imgUrl,
			success: function(res) {
			},
			fail: function(res) {
				//console.log(JSON.stringify(res));
			}
		});
		wx.onMenuShareTimeline({
			title: wxData.title, 
			link: wxData.link, 
			imgUrl: wxData.imgUrl, 
			success: function() {
			}
		});
		wx.onMenuShareQQ({
			title: wxData.title, 
			desc: wxData.desc,
			link: wxData.link, 
			imgUrl: wxData.imgUrl, 
			success: function() {
			},
			cancel: function() {
			}
		});
		wx.onMenuShareWeibo({
			title: wxData.title, 
			desc: wxData.desc,
			link: wxData.link,
			imgUrl: wxData.imgUrl,
			success: function() {
			},
			cancel: function() {
			}
		});
	});
    </script>
</body>
</html>