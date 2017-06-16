var floatBar= new panel();
document.ready=function(){
	floatBar.showPanel();
}
function panel(){
	this.visible=false;
	this.hidePanel = function() {
		var panel = $("#float-bar");
		panel.animate({
			"margin-left":-500
		},300);
		$("#float-bar-overlay").css({"display": "none"});
		panel.css({
			"display":"none"
		});
		this.visible=false;
	}
	this.showPanel= function(){
		var panel = $("#float-bar");
		var a = $("#sidebar").width();
		panel.css({
			"display":"block"
		});
		panel.animate({
			"margin-left":(a+30)
		},300);
		$("#float-bar-overlay").css({"display": "block"});
		this.visible=true;
	}
	this.toggle = function(){
		if (this.visible) {
			this.hidePanel();
		}else{
			this.showPanel();
		}
	}
}