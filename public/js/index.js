//模拟弹窗提示
function T_alert(data){
	dom=$('.T-alert-'+data.type);
	if(dom.length > 0 )
	dom.html(data.content);
	dom.fadeIn();
	setTimeout(function(){
		dom.fadeOut();
	},1500);
}
//跳转分页
function turnPage(event){
	var code=event.keyCode||event.which||event.charCode;
	if(code == 13){
		var pageNum=event.target.value;
		var url=event.target.dataset.url;
		if(pageNum==parseInt(pageNum))
			window.location=url.replace(event.target.dataset.num,pageNum);
		else
			event.target.value='';
	}
}