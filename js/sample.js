// JavaScript Document
$(document).ready(function (){
	//---3级下拉菜单---
	$(".item01 em").hide();
	//二级菜单弹出
	$(".item01 strong").hover(
		function (){
		$(this).parent().find("em").show();
		$(this).parent().find("em").end().find("span").hide();
		},
		function (){
			$(this).parent().find("em").hide();
		}
	);
	//三级菜单弹出
	$(".item01 em").hover(
		function (){
			$(this).find("a.grade2").addClass("grayBG");
			$(this).find("span").show();
		},
		function (){
			$(this).find("a.grade2").removeClass("grayBG");
			$(this).find("span").hide();
		}
	);
	//
});
//浏览器判断
var Sys = {};
var ua = navigator.userAgent.toLowerCase();
if (window.ActiveXObject) Sys.ie = ua.match(/msie ([\d.]+)/)[1]
if(Sys.ie) alert('你正在使用IE '+ Sys.ie + '浏览器。由于本页面的CSS3效果不支持IE系列浏览器。浏览本网页请使用firefox或chrome。');