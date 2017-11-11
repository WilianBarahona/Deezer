var lista; // LISTA REPRODUCCION
soundManager.setup({
	onready: function() {
		lista = new playList(); // LISTA DE REPRODUCCION CREADA ARGUMENTO VACIO
	},
	ontimeout: function() {
		// Hrmm, SM2 could not start. Missing SWF? Flash blocked? Show an error, etc.?
	}
});	
function nextSound(){
	lista.next();
}
// OBJETO PLAYLIST CREADA EN SoundManager.onready
function playList(){
	this.isPlaying=false;
	// Definicion DE ARREGLO PLAYLIST (El id se puede obtener de una DataBase)
	// Donde esté guardado el URL del archivo, cover, informacion de artista, etc.
	// Elementos
	// {id:"photo",url:"path/to/song.mp3", cover: "path/to/img.jpg(png) , artist: John Doe, title: Some song"}
	this.arraySong = [
	//, + iteraciones // Agregar coverimage, artist, titulo
	{
			id:"db",
			title: "Chala head chala",
			artist: "Ricardo Silva",
			url:"http://download1504.mediafire.com/db5zs6ybsjkg/zs421rcqgiw3mb2/db.mp3",
			cover: "img/cover/db.jpg",
		},
		{
			id:"photo",
			title: "Photograph",
			artist: "Ed Sheeran",
			url:"music/photo.mp3",
			cover: "img/cover/x.jpg",
		}
	];
	this.i=0; // CONTADOR DE REPRODUCCION
	this.setArraySong = function(arraySong){
		this.arraySong = arraySong;
	}
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
			whileplaying : function(){
				console.log(this);
				// Update position
			},
			// onfinish: lista.next
			onfinish: nextSound
		});
		// Cambiar icono
		$("#player-play").attr("class","");
		$("#player-play").attr("class","glyphicon glyphicon-pause");
	}
	// Pausar canción Actual
	this.pause=function(){
		soundManager.pauseAll();
		// Cambiar icono
		$("#player-play").attr("class","");
		$("#player-play").attr("class","glyphicon glyphicon-play");	
	}
	// Reproducir/Pausar Cancion Actual
	this.toggle=function(){
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
			this.play();
			this.changeInfoSong();
		}else{
			this.i++;
		}
	}
	this.next=function(){
		this.i++;
		if (this.i<this.arraySong.length && this.i>=0) {
			soundManager.stopAll();
			this.play();
			this.changeInfoSong();
		}else{
			this.i--;
			this.pause();
		}
	}
	this.changeInfoSong = function(){
		var cancion = this.arraySong[this.i];
		// Cambiar titulo
		$("#player-title").html(cancion.title);
		// Cambiar artista
		$("#player-artist").html(cancion.artist);
		// Cmabiar cover
		var imgURL = cancion.cover;
		$("#player").css({
			"background-image":"url("+imgURL+")"
		});
	}
	this.stop = function(){
		soundManager.stopAll();
		// Cambiar icono
		$("#player-play").attr("class","");
		$("#player-play").attr("class","glyphicon glyphicon-play");	
	}
	this.clear = function(){
		this.arraySong =[];
	}

	// METODOS DE INICIO __constructor
	this.initSounds();
}