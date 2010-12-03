$(document).ready(function(){
	var $note=$("#note");
	var $doc=$(document);
	var tool=1; // 1 pencil 0 eraser
	var $doodle=$("#doodle");
	var button=0;
	var $context=$doodle.get(0).getContext("2d");
	var lastDoodle;
	
	$(window).load(function(){
		$doodle.height($note.height()).width($(window).width-$note.width());
		$doodle.get(0).height=$doodle.get(0).clientHeight;
		$doodle.get(0).width=$doodle.get(0).clientWidth;
		$note.width($note.width()-55);
		pasteImg(img_src,$context);
	});
	
	
	function pasteImg(src,context) {
		var img=new Image();
		img.onload=function(){
			context.drawImage(img,0,0);
		}
		img.src=src;
		lastDoodle=src;
		context.beginPath();
		context.strokeStyle="#0000bb";
		context.lineWidth=1;
	}
	
	$note.keyup(function(){
		txt=$(this).html();
		
		NW=$note.width()+$note.css("padding-left");
		NH=$note.height();
		WW=$(window).width();
		WH=$(window).height();
		
		DW=WW-NW;
		DH=Math.max(NH,WH);
		
		$doodle.height(DH).width(DW).attr("height",DH);
		pasteImg(lastDoodle,$context);
		
		$.post(location.href,{
			"txt":txt
		},function(r){
			if (r!="OK")
				alert("Something happened...\nSo, so sorry!");
		},"text");
	});
	
	$note.scroll(function(){
		$note.css({backgroundPosition:"0 "+(-this.scrollTop-7)+"px"});
	});
	
	$doodle.mousemove(function(e){
		if (button==1) {
			$context.lineTo(e.layerX,e.layerY);
			$context.stroke();
		} else {
			$context.moveTo(e.layerX,e.layerY);
		}
		return false;
	});
	
	$doodle.mousedown(function(e){
		button=1;
		return false;
	});
	
	$doodle.mouseup(function(e){
		button=0;
		
		lastDoodle=$doodle.get(0).toDataURL();
		$.post(location.href,{
			"doodle":lastDoodle
		},function(r){
			if (r!="OK")
				alert("Something happened...\nSo, so sorry!");
		},"text");
		
		return false;
	});
	
	$(".tool").click(function(){
		$(this).siblings().removeClass("selected");
		$(this).addClass("selected");
		if ($(this).attr("id")=="pencil") {
			$context.closePath();
			$context.strokeStyle="#0000bb";
			$context.lineWidth=1;
			$context.beginPath();
		} else {
			$context.closePath();
			$context.strokeStyle="#ffffff";
			$context.lineWidth=30;
			$context.beginPath();
		}
	});
	
});
