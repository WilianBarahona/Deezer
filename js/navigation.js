$(document).ready(function(){
    $("#main").load("templates/index.html");
});

$("#index").click(function(){
    floatBar.hidePanel();
    $("#main").load("templates/index.html");
    $(".active").removeClass();
    $("#index").parent().addClass("active");
});

$("#img-index").click(function(){
    floatBar.hidePanel();
    $("#main").load("templates/index.html");
    $(".active").removeClass();
    $("#index").parent().addClass("active");
});

$("#recomendaciones").click(function(){
    floatBar.hidePanel();
    $("#main").load("templates/feed.html");
    $(".active").removeClass();
    $("#recomendaciones").parent().addClass("active");
});

$("#cuenta").click(function(){
    floatBar.hidePanel();
    $("#main").load("templates/configuration.html");
    $(".active").removeClass();
});

$("#mi-musica").click(function(){
    floatBar.hidePanel();
    $(".active").removeClass();
    $("#mi-musica").parent().parent().addClass("active");
    $("#main").load("templates/favorites.html", function(){

    });
});
$("#favoritas").click(function(){
    floatBar.hidePanel();
    $("#main").load("templates/favorites.html");
    $(".active").removeClass();
    $("#favoritas").parent().addClass("active");
});

$("#txt-search").focus(function() {
    floatBar.toggle("txt-search");
});

$("#btn-search").click(function(){
    floatBar.hidePanel();
    $("#main").load("templates/search.html");
});

$(".btn-float").click(function(){
  var id = $(this).attr("id");
  floatBar.toggle(id);
})