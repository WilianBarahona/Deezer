var lista; // LISTA REPRODUCCION
soundManager.setup({
	onready: function() {
		lista = new playList(); // LISTA DE REPRODUCCION CREADA ARGUMENTO VACIO
	},
	ontimeout: function() {
		// Hrmm, SM2 could not start. Missing SWF? Flash blocked? Show an error, etc.?
	}
});	

// OBJETO PLAYLIST CREADA EN SoundManager.onready
function playList(){
	this.isPlaying=false;
	// Definicion DE ARREGLO PLAYLIST (El id se puede obtener de una DataBase)
	// Donde esté guardado el URL del archivo, cover, informacion de artista, etc.
	this.arraySong = [
		{id:"photo",url:"music/photo.mp3"}//, + iteraciones
	];
	this.i=0; // CONTADOR DE REPRODUCCION
	this.initSounds = function(){
		for (var i = 0; i < this.arraySong.length; i++) {
			soundManager.createSound({
				id: this.arraySong[i].id,
				url: this.arraySong[i].url
			});
		}
	}
	// Devuelve Objeto Sound actual en reproduccion
	this.getCurrent=function(){
		return soundManager.getSoundById(this.arraySong[this.i].id);
	}
	// Reproducir la cancion actual
	this.play = function(){
		soundManager.pauseAll();
		var id = this.arraySong[this.i].id;
		soundManager.getSoundById(id).play();
		// Cambiar icono
		document.getElementById("player-play").setAttribute("class","");
		document.getElementById("player-play").setAttribute("class","glyphicon glyphicon-pause");
	}
	// Pausar canción Actual
	this.pause=function(){
		soundManager.pauseAll();
		document.getElementById("player-play").setAttribute("class","");
		document.getElementById("player-play").setAttribute("class","glyphicon glyphicon-play");	
	}

	// Reproducir/Pausar Cancion Actual
	this.toogle=function(){
		if (this.isPlaying==true) {
			this.pause();
			this.isPlaying=false;
		}else{
			this.play();
			this.isPlaying=true;
		}
	}

	this.prev=function(){}
	this.next=function(){}

	// METODOS DE INICIO
	this.initSounds();
}