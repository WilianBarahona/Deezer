var lista; // LISTA REPRODUCCION
soundManager.setup({
	onready: function() {
		lista = new playList(); // LISTA DE REPRODUCCION CREADA ARGUMENTO VACIO
	},
	ontimeout: function() {
		// Hrmm, SM2 could not start. Missing SWF? Flash blocked? Show an error, etc.?
	}
});	

function cambiarRola(){
	lista.next();
}

// OBJETO PLAYLIST CREADA EN SoundManager.onready
function playList(){
	this.isPlaying=false;
	// Definicion DE ARREGLO PLAYLIST (El id se puede obtener de una DataBase)
	// Donde esté guardado el URL del archivo, cover, informacion de artista, etc.
	this.arraySong = [
		{id:"photo",url:"music/photo.mp3"},//, + iteraciones
		{id:"rend",url:"music/rend.mp3"}//, + iteraciones
	];
	this.i=0; // CONTADOR DE REPRODUCCION
	this.initSounds = function(){
		for (var i = 0; i < this.arraySong.length; i++) {
			soundManager.createSound({
				id: this.arraySong[i].id,
				url: this.arraySong[i].url,

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
		// soundManager.getSoundById(id).play();
		soundManager.play(id, {
			// onfinish: lista.next
			whileplaying : function(){
				console.log(this.position);
			},
			onfinish: cambiarRola
		});
		// Cambiar icono
		document.getElementById("player-play").setAttribute("class","");
		document.getElementById("player-play").setAttribute("class","glyphicon glyphicon-pause");
	}
	// Pausar canción Actual
	this.pause=function(){
		soundManager.pauseAll();
		// Cambiar icono
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

	this.prev=function(){
		this.i--;
		if (this.i<this.arraySong.length && this.i>=0) {
			soundManager.stopAll();
			this.play()
		}
	}
	this.next=function(){
		this.i++;
		if (this.i<this.arraySong.length && this.i>=0) {
			soundManager.stopAll();
			this.play()
		}
	}

	// METODOS DE INICIO
	this.initSounds();
}