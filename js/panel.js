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
				content.html("");
				var header = '<div class="header">'+
				'	<div class="container-fluid">'+
				'		<div class="row">'+
				'			<div class="col-sm-12">'+
				'				<h4>Playlists Favoritos</h4>'+
				'		</div>'+
				'		</div>'+
				'	</div>'+
				'</div>';
				content.append(header);
				var id_usuario=$("#id_usuario").val();

				$.ajax({
					url:"ajax/gestionar-usuario.php",
					method:"POST",
					dataType:"JSON",
					data:{
						"accion":"playlist-favoritos",
						"id_usuario":id_usuario
					},
					success:function(respuesta){
						var body=
						'<div class="list-body">'+
						'	<ul class="list-items section" id="info-cola">	'+
						'	</ul>'+
						'</div>';
						content.append(body);
						for (var i = 0; i < respuesta.length; i++) {
							var playlist = respuesta[i];
							var card=
							'<li>'+
							'	<div class="row">'+
							'		<div class="col-sm-2 cover">'+
							'			<img src="'+playlist.url_foto_playlist+'" alt="cover" class="img-rounded img-responsive"></div>'+
							'			<div class="col-sm-6">'+
							'				<p>'+playlist.nombre_playlist+'</p>'+
							'			</div>'+
							'			<div class="col-sm-2">'+
							'				<button onclick="cargarPlaylist('+playlist.id_playlist+')" type="button" class="btn btn-none">'+
							'					<span class="glyphicon glyphicon-play"></span>'+
							'				</button>'+
							'			</div>'
							'	</div>'+
							'</li>';
							$("#info-cola").append(card);
						}
					},
					error: function(error){
						console.log(error);
					}
				});

			break;
			case "float-albums": 	
				content.html("");
				var header = '<div class="header">'+
				'	<div class="container-fluid">'+
				'		<div class="row">'+
				'			<div class="col-sm-12">'+
				'				<h4>Albumes Favoritos</h4>'+
				'		</div>'+
				'		</div>'+
				'	</div>'+
				'</div>';
				content.append(header);
				var id_usuario=$("#id_usuario").val();
				$.ajax({
					url:"ajax/gestionar-usuario.php",
					method:"POST",
					dataType:"JSON",
					data:{
						"accion":"albumes-favoritos",
						"id_usuario":id_usuario
					},
					success:function(respuesta){
						var body=
						'<div class="list-body">'+
						'	<ul class="list-items section" id="info-cola">	'+
						'	</ul>'+
						'</div>';
						content.append(body);
						for (var i = 0; i < respuesta.length; i++) {
							var album = respuesta[i];
							var card=
							'<li>'+
							'	<div class="row">'+
							'		<div class="col-sm-2 cover">'+
							'			<img src="'+album.album_cover_url+'" alt="cover" class="img-rounded img-responsive"></div>'+
							'			<div class="col-sm-6">'+
							'				<p>'+album.nombre_album+'</p>'+
							'			</div>'+
							'			<div class="col-sm-2">'+
							'				<button onclick="cargarAlbum('+album.id_album+')" type="button" class="btn btn-none">'+
							'					<span class="glyphicon glyphicon-play"></span>'+
							'				</button>'+
							'			</div>'
							'	</div>'+
							'</li>';
							$("#info-cola").append(card);
						}
					},
					error: function(error){
						console.log(error);
					},
					complete: function(){
						//TO-DO
					}
				});
			break;
			case "float-activity": 	
				content.html("");
				var header = '<div class="header">'+
				'	<div class="container-fluid">'+
				'		<div class="row">'+
				'			<div class="col-sm-12">'+
				'				<h4>Historial</h4>'+
				'		</div>'+
				'		</div>'+
				'	</div>'+
				'</div>';
				content.append(header);
				var id_usuario=$("#id_usuario").val();
				$.ajax({
					url:"ajax/gestionar-usuario.php",
					method:"POST",
					dataType:"JSON",
					data:{
						"accion": "listar-historial",
						"id_usuario":id_usuario
					},
					success:function(respuesta){
						var body=
						'<div class="list-body">'+
						'	<ul class="list-items section" id="info-cola">	'+
						'	</ul>'+
						'</div>';
						content.append(body);
						for (var i = 0; i < respuesta.length; i++) {
							var cancion = respuesta[i];
							var card=
							'<li>'+
							'	<div class="row">'+
							'		<div class="col-sm-2 cover">'+
							'			<img src="'+cancion.album_cover_url+'" alt="cover" class="img-rounded img-responsive"></div>'+
							'			<div class="col-sm-6">'+
							'				<p>'+cancion.nombre_cancion+'</p>'+
							'			</div>'+
							'			<div class="col-sm-2">'+
							'				<button onclick="reproducir('+cancion.id_cancion+')" type="button" class="btn btn-none">'+
							'					<span class="glyphicon glyphicon-play"></span>'+
							'				</button>'+
							'			</div>'
							'	</div>'+
							'</li>';
							$("#info-cola").append(card);
						}
					},
					error: function(error){
						console.log(error);
					},
					complete: function(){
						//TO-DO
					}
				});

				break;
			case "float-apps": 	
				content.load(path+"apps.html");
				break;
			case "float-playlist-playing": 	
				if(playlist!=undefined && album==undefined){
					content.html("");
					var header = '<div class="header">'+
					'	<div class="container-fluid">'+
					'		<div class="row">'+
					'			<div class="col-sm-12">'+
					'				<h4>'+playlist.nombre_album+'</h4>'+
					'				<h5 id="total-cancion">'+playlist.numero_canciones+' canciones</h5>'+
					'				<p><label><input type="checkbox" name="reco-autom"> Recomendaciones automáticas</label></p>'+
					'		</div>'+
					'		</div>'+
					'	</div>'+
					'</div>';
					content.append(header);
					var body=
					'<div class="list-body">'+
					'	<ul class="list-items section" id="info-cola">	'+
					'	</ul>'+
					'</div>';
					content.append(body);
					for (var i = 0; i < playlist.canciones.length; i++) {
						var cancion = playlist.canciones[i];
						var card=
						'<li>'+
						'	<div class="row">'+
						'		<div class="col-sm-2 cover">'+
						'			<img src="'+cancion.album_cover_url+'" alt="cover" class="img-rounded img-responsive"></div>'+
						'			<div class="col-sm-6">'+
						'				<p>'+cancion.nombre_cancion+'</p>'+
						'			</div>'+
						'			<div class="col-sm-2">'+
						'				<button onclick="reproducir('+cancion.id_cancion+')" type="button" class="btn btn-none">'+
						'					<span class="glyphicon glyphicon-play"></span>'+
						'				</button>'+
						'			</div>'+
						'			<div class="col-sm-2">'+
						'				<button onclick="agregarCancion('+cancion.id_cancion+')" type="button" class="btn btn-none">'+
						'					<span class="glyphicon glyphicon-heart"></span>'+
						'				</button>'+
						'			</div>'+
						'	</div>'+
						'</li>';
						$("#info-cola").append(card);
					}
				}else if(album!=undefined && playlist==undefined){
					content.html("");
					var header = '<div class="header">'+
					'	<div class="container-fluid">'+
					'		<div class="row">'+
					'			<div class="col-sm-12">'+
					'				<h4>'+album.nombre_album+'</h4>'+
					'				<h5 id="total-cancion">'+album.numero_canciones+' canciones</h5>'+
					'				<p><label><input type="checkbox" name="reco-autom"> Recomendaciones automáticas</label></p>'+
					'		</div>'+
					'		</div>'+
					'	</div>'+
					'</div>';
					content.append(header);
					var body=
					'<div class="list-body">'+
					'	<ul class="list-items section" id="info-cola">	'+
					'	</ul>'+
					'</div>';
					content.append(body);
					for (var i = 0; i < album.canciones.length; i++) {
						var cancion = album.canciones[i];
						var card=
						'<li>'+
						'	<div class="row">'+
						'		<div class="col-sm-2 cover">'+
						'			<img src="'+cancion.album_cover_url+'" alt="cover" class="img-rounded img-responsive"></div>'+
						'			<div class="col-sm-6">'+
						'				<p>'+cancion.nombre_cancion+'</p>'+
						'			</div>'+
						'			<div class="col-sm-2">'+
						'				<button onclick="reproducir('+cancion.id_cancion+')" type="button" class="btn btn-none">'+
						'					<span class="glyphicon glyphicon-play"></span>'+
						'				</button>'+
						'			</div>'+
						'			<div class="col-sm-2">'+
						'				<button onclick="agregarCancion('+cancion.id_cancion+')" type="button" class="btn btn-none">'+
						'					<span class="glyphicon glyphicon-heart"></span>'+
						'				</button>'+
						'			</div>'+
						'	</div>'+
						'</li>';
						$("#info-cola").append(card);
				}
			}
			break;
			default:
				console.log(id);
		};
	}
}