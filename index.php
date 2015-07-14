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
	<meta name="viewport" content="width=640,user-scalable=no,target-densitydpi=device-dpi">
	<meta name="apple-mobile-web-app-title" content="公众号助手 - 微信公众平台手机端"> <!-- 添加到主屏后的标题（iOS 6 新增） -->
	<meta name="apple-mobile-web-app-capable" content="yes" /> <!-- 删除苹果默认的工具栏和菜单栏 -->
	<meta name="apple-touch-fullscreen" content="yes">
	<link href="img/favicon.ico" rel="shortcut icon">
	<title>公众号助手 - 微信公众平台手机端</title>
  	<meta name="keywords" content="微信公众号,微信公众号助手,公众平台,微信公众平台登录,微信公众号注册,公众号申请,微信公众号认证,微信营销,微商城,微信公众平台手机端"/>
  	<meta name="description" content="公众号助手，是微信公众平台手机端，直接管理微信公众账号，实现公众帐号运营者与粉丝之间的实时互动。同时也是国内最专业的微信公众号服务商，基于公众号为客户提供账号注册、开发、运营、推广一体化解决方案。"/>
	<link type='text/css'  href="css/index.css" media="all" rel="stylesheet" />
	<!--[if lt IE 9]>
    <script>
    (function() {
	    // 页面头部
	    var a = ['section', 'nav', 'header', 'footer' /* 其他HTML5元素 */];
	    for (var i = 0, j = a.length; i < j; i++) {
	        document.createElement(a[i]);
	    }	
	})();
    </script>
    <![endif]-->	
</head>
<body>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
	            	<nav class="top-nav">
	            		<a href="service.html" target="_self">专业服务</a>
	            		<a href="about_us.html" target="_self">联系我们</a>
	            	</nav>
	            	<div class="c-logo">
	            		<img src="img/index.png" alt="公众号助手">
	            		<h2>公众平台手机端，微商运营微店必备</h2>
	            	</div>
	            	<a href="http://a.app.qq.com/o/simple.jsp?pkgname=com.bangyibang.weixinmh" class="btn-download">免费下载</a>
	            </div>
	            <div class="swiper-slide bg">
					<div class="c-txt">
						<h3>粉丝消息</h3>
						<strong>随时随地实时对话、自动回复</strong>
					</div>
					<img class="c_img" src="img/f_01.png" alt="粉丝消息">
	            </div>
	            <div class="swiper-slide bg">
	            	<div class="c-txt">
	            		<h3>运营宝典</h3>
	            		<strong>思路讲解、工具解剖、案例分析、政策解读</strong>
	            	</div>
					<img class="c_img" src="img/f_02.png" alt="运营宝典">
	            </div>
	            <div class="swiper-slide bg">
	            	<div class="c-txt">
	            		<h3>公众号排行榜</h3>
	            		<strong>与全国同类公众号PK，发现你的排名</strong>
	            	</div>
					<img class="c_img" src="img/f_03.png" alt="公众号排行榜">
	            </div>
        </div>
    </div>
    <div class="swiper-button-next"></div>

    <script src="js/swiper.min.js"></script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script>
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