var floatBar= new panel("#float-bar");
function panel(id){
	this.panel=$(id);
	this.visible=false;
	this.event="";
	this.hidePanel = function() {
		this.panel.animate({
			"margin-left":-500,
			"display":"none"
		},300);
		$("#float-bar-overlay").css({"display": "none"});
		$(".active-white").removeClass().addClass("active");
		$("#txt-search").focusout();
		this.visible=false;
	}
	this.showPanel= function(id){
		this.event=id;
		console.log("this.id: "+id)
		var a = $("#sidebar").width();
		this.panel.css({
			"display":"block"
		});
		$(".active").removeClass().addClass("active-white")
		this.panel.animate({
			"margin-left":(a+30)
		},300);
		$("#float-bar-overlay").css({"display": "block"});
		this.visible=true;
	}
	this.toggle = function(id){
		console.log(id);
		console.log("(toggle)this.id: "+id)
		if (this.visible) {
			if (this.event==id) {
				this.hidePanel();
			}else{
				showPanel(id);
			}
		}else{
			this.showPanel(id);
		}
	}
}

function viewPlayList(){
	console.log(lista);
	// $("#list-bar").html("Hola")
	listaBar.toggle();
}