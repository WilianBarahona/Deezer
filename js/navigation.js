$("#txt-search").focus(function() {
    floatBar.toggle("txt-search");
});

$(".btn-float").click(function(){
  var id = $(this).attr("id");
  floatBar.toggle(id);
})