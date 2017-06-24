var floatBar= new panel("#float-bar");
function panel(id){
	this.panel=$(id);
	this.visible=false;
	this.event="";
	this.hidePanel = function() {
		this.visible=false;
		$(this.panel).animate({"margin-left":-500,},250);
		$(this.panel).fadeOut(250);
		$("#float-bar-overlay").fadeOut();
		$(".active-white").removeClass().addClass("active");
		$("#txt-search").focusout();
	}
	this.showPanel= function(id){
		this.load(id);
		var content=$("#float-bar-content");
		this.visible=true;
		this.event=id;
		var a = $("#sidebar").width();
		$(this.panel).show();
		this.panel.animate({"margin-left":(a+30)},300);
		$(".active").removeClass().addClass("active-white")
		$("#float-bar-overlay").fadeIn();
	}
	this.toggle = function(id){
		if (this.visible) {
			if (this.event==id) {
				this.hidePanel();
			}else{
				this.event=id;
				this.load(id);
			}
		}else{
			this.showPanel(id);
		}
	}

	this.load=function(id){
		var content = $("#float-bar-content");
		var path ="templates/float-bar/";
		switch(id){
			case "txt-search":
			content.load(path+"search.html");
				break;
			case "float-settings":
				content.load(path+"settings.html");
				break;
			case "float-playlist": 	
				content.load(path+"playlist.html");
				break;
			case "float-albums": 	
				content.load(path+"albums.html");
				break;
			case "float-activity": 	
				content.load(path+"activity.html");
				break;
			case "float-apps": 	
				content.load(path+"apps.html");
				break;
			case "float-playlist-playing": 	
				content.load(path+"cola.html");
				break;
			default:
				console.log(id);
		}
	}
}