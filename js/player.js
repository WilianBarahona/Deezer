var lista; // LISTA REPRODUCCION
var album;
var playlist;
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
	this.arraySong = [];
	this.i=0; // CONTADOR DE REPRODUCCION
	this.setArraySong = function(arraySong){
		this.arraySong = arraySong;
		this.initSounds();
	}
	this.initSounds = function(){
		for (var i = 0; i < this.arraySong.length; i++) {
			soundManager.createSound({
				id: "id_"+this.arraySong[i].id_cancion,
				url: "http://freezer.rf.gd/"+this.arraySong[i].url_audio,
			});
		}
	}
	// Devuelve Objeto Sound actual en reproduccion
	this.getCurrent=function(){
		return soundManager.getSoundById("id_"+this.arraySong[this.i].id_cancion);
	}
	this.getCurrentIndex=function(){
		return this.i;
	}
	// Reproducir la cancion actual
	this.play = function(){
		soundManager.pauseAll();
		var id = "id_"+this.arraySong[this.i].id_cancion;
		escuchada(this.arraySong[this.i].id_cancion);
		// soundManager.getSoundById(id).play();
		soundManager.play(id, {
			whileplaying : function(){
				//console.log(this);
				// Update position
			},
			// onfinish: lista.next
			onfinish: nextSound
		});
		// Cambiar icono
		$("#player-play").attr("class","");
		$("#player-play").attr("class","glyphicon glyphicon-pause");
	}
	this.playID = function(id){
		escuchada(id);
		soundManager.pauseAll();
		soundManager.play("id_"+id, {
			whileplaying : function(){
				//console.log(this);
				// Update position
			},
			// onfinish: lista.next
			onfinish: nextSound
		});
		// Cambiar icono
		$("#player-play").attr("class","");
		$("#player-play").attr("class","glyphicon glyphicon-pause");
		for (var i = 0; i < this.arraySong.length; i++) {
			idc = this.arraySong[i].id_cancion;
			if(idc==id){
				return i;
			}
		}
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
		$("#player-title").html(cancion.nombre_cancion);
		// Cambiar artista
		$("#player-artist").html(cancion.nombre_artista);
		// Cmabiar cover
		var imgURL = cancion.album_cover_url;
		$("#player").css({
			"background-image":"url("+imgURL+")"
		});
	}
	this.setInfoSong = function(nombre,artista,cover){
		var cancion = this.arraySong[this.i];
		// Cambiar titulo
		$("#player-title").html(nombre);
		// Cambiar artista
		$("#player-artist").html(artista);
		// Cmabiar cover
		var imgURL =cover;
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
	//this.initSounds();
}

$(document).ready(function(){
	$.ajax({
		url:"ajax/gestionar-playlist.php",
		method:"POST",
		dataType:"JSON",
		data:{
			"accion":"seleccionar",
			"id_playlist":23
		},
		success:function(respuesta){
			playlist=respuesta;
			album=undefined;
			lista.setArraySong(respuesta.canciones);
			lista.changeInfoSong();
		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
		}
	});
});


function reproducir(id){
	$.ajax({
		url:"ajax/gestionar-cancion.php",
		method:"POST",
		dataType:"JSON",
		data:{
			"accion":"seleccionar",
			"id_cancion":id,
		},
		success:function(respuesta){
			lista.arraySong.splice(lista.i+1,0,respuesta);
			lista.i++;
			lista.changeInfoSong();
			lista.play();
		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
		}
	});
}

function escuchada(id){
	var id_usuario = $("#id_usuario").val();
	$.ajax({
		url:"ajax/gestionar-usuario.php",
		method:"POST",
		dataType:"JSON",
		data:{
			"accion":"agregar-historial",
			"id_usuario":id_usuario,
			"id_cancion":id
		},
		success:function(respuesta){
			console.log(respuesta);
		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
		}
	});
}

function cargarAlbum(idAlbum){
	$.ajax({
		url:"ajax/gestionar-album.php",
		method:"POST",
		dataType:"JSON",
		data:{
			"accion":"seleccionar",
			"id_album":idAlbum
		},
		success:function(respuesta){
			album=respuesta;
			playlist=undefined;
			lista.setArraySong(respuesta.canciones);
			lista.i=0;
			lista.changeInfoSong();
			lista.play();
		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
		}
	});
}

function cargarPlaylist(idPlaylist){
	$.ajax({
		url:"ajax/gestionar-playlist.php",
		method:"POST",
		dataType:"JSON",
		data:{
			"accion":"seleccionar",
			"id_playlist":idPlaylist
		},
		success:function(respuesta){
			album=undefined;
			playlist=respuesta;
			lista.setArraySong(respuesta.canciones);
			lista.i=0;
			lista.changeInfoSong();
			lista.play();
		},
		error: function(error){
			console.log(error);
		},
		complete: function(){
			//TO-DO
		}
	});
}