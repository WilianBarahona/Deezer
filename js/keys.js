$(document).keypress(function(event){
	var key = event.keyCode;
	var char = event.charCode;
	switch(key){
		case 27:
			if (floatBar.visible) {
				floatBar.hidePanel();
			}
		// break; case :
		break; default:
		break;
	}

	switch(char){
		case 32:
			if (event.target!=$("#txt-search")[0]) {
				event.preventDefault();
				lista.toggle();
			}
		break; default:
			//DEFAULT
		break;
	}
});