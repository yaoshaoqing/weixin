<?php if (!defined('THINK_PATH')) exit();?> <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>智能社-http://www.zhinengshe.com</title>
<style>
*{ margin:0; padding:0; list-style:none;}
.box{ width:300px; height:300px; background:#ccc; position:absolute; left:200px; top:200px; border-radius:50%; background-size:contain; border:10px solid #282828; box-shadow:inset 3px 3px 10px #fff,1px 1px 5px #000;}
.cap{ width:30px; height:30px; background:-webkit-radial-gradient(#f8f8f8,#282828); position:absolute; left:50%; top:50%; margin:-15px 0 0 -15px; border-radius:50%;}
.box div{ transform-origin:center bottom;}
.hour{ width:16px; height:80px; background:#000; position:absolute; left:50%; top:50%; margin-left:-8px; margin-top:-80px; border-radius:50% 50% 0 0;}
.min{ width:10px; height:100px; background:#000; position:absolute; left:50%; top:50%; margin-left:-5px; margin-top:-100px; border-radius:50% 50% 0 0;}
.sec{ width:4px; height:120px; background:#f00; position:absolute; left:50%; top:50%; margin-left:-2px; margin-top:-120px;}
.scale{ width:2px; height:10px; background:#000; position:absolute; left:50%; margin-left:-1px; transform-origin:center 150px;}
.bigScale{ width:4px; height:14px; background:#000; position:absolute; left:50%; margin-left:-2px;transform-origin:center 150px;}
.bigScale strong{ margin-top:20px; position:absolute; left:50%; margin-left:-50px; width:100px; text-align:center; font-size:20px;}
</style>
<script>
window.onload=function(){
	var oDiv=document.querySelector('.box');	
	var oH=document.querySelector('.hour');
	var oM=document.querySelector('.min');
	var oS=document.querySelector('.sec');
	
	var x=0;
	var y=0;
	
	//画刻度
	var N=60;
	for(var i=0; i<N; i++){
		var oSpan=document.createElement('span');
		if(i%5==0){
			oSpan.className='bigScale';
			var n=i/5==0?12:i/5;	
			oSpan.innerHTML='<strong>'+n+'</strong>';
			oSpan.children[0].style.transform='rotate('+-i*6+'deg)';
		}else{
			oSpan.className='scale';
		}
		oSpan.style.transform='rotate('+i*6+'deg)';
		oDiv.appendChild(oSpan);
	}
	
	function clock(){
		var oDate=new Date();
		var h=oDate.getHours();
		var m=oDate.getMinutes();
		var s=oDate.getSeconds();
		var ms=oDate.getMilliseconds();
		
		
		oH.style.transform='rotate('+(h*30+m/60*30)+'deg)';
		oM.style.transform='rotate('+(m*6+s/60*6)+'deg)';
		oS.style.transform='rotate('+(s*6+ms/1000*6)+'deg)';
	}
	clock();
	setInterval(clock,30);
	
	//拖拽
	oDiv.onmousedown=function(ev){
		var disX=ev.clientX-x;
		var disY=ev.clientY-y;
		
		document.onmousemove=function(ev){
			x=ev.clientX-disX;
			y=ev.clientY-disY;
			x<=0 && (x=0);
			oDiv.style.transform='translate('+x+'px,'+y+'px)';
		};
		document.onmouseup=function(){
			document.onmousemove=null;
			document.onmouseup=null;	
		};
		return false;
	};
};
</script>
</head>

<body>
<div class="box">
	<div class="hour"></div>
    <div class="min"></div>
    <div class="sec"></div>
    <div class="cap"></div>
</div>
</body>
</html>