<html>
<head>
<title>Creating your first app with Flickr API</title>
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<style type="text/css">
#sq,#lg-sq,#thumb,#small,#mid,#ori {
width: 100%
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://masonry.desandro.com/masonry.pkgd.min.js"></script>
<script>
var apiurl,myresult,apiurl_size,selected_size;
apiurl = "https://api.flickr.com/services/rest/?method=flickr.photos.getRecent&api_key=YOUR_KEY&per_page=10&format=json&nojsoncallback=1";
$(document).ready(function(){
$('#button').attr("disabled", true);
});
$(document).ready(function(){
$("#sq").click(function(){
selected_size=75;
$('#sq,#lg-sq,#thumb,#small,#mid,#ori').attr("disabled", true);
$('#button').removeAttr('disabled');
})
});
$(document).ready(function(){
$("#lg-sq").click(function(){
selected_size=150;
$('#sq,#lg-sq,#thumb,#small,#mid,#ori').attr("disabled", true);
$('#button').removeAttr('disabled');
})
});
$(document).ready(function(){
$("#thumb").click(function(){
selected_size=100;
$('#sq,#lg-sq,#thumb,#small,#mid,#ori').attr("disabled", true);
$('#button').removeAttr('disabled');
})
});
$(document).ready(function(){
$("#small").click(function(){
selected_size=240;
$('#sq,#lg-sq,#thumb,#small,#mid,#ori').attr("disabled", true);
$('#button').removeAttr('disabled');
})
});
$(document).ready(function(){
$("#mid").click(function(){
selected_size=500;
$('#sq,#lg-sq,#thumb,#small,#mid,#ori').attr("disabled", true);
$('#button').removeAttr('disabled');
})
});
$(document).ready(function(){
$("#ori").click(function(){
selected_size=640;
$('#sq,#lg-sq,#thumb,#small,#mid,#ori').attr("disabled", true);
$('#button').removeAttr('disabled');
})
});
$(document).ready(function(){
$("#reset").click(function(){
$("#results").html('');
$('#button').attr("disabled", true);
$('#sq,#lg-sq,#thumb,#small,#mid,#ori').removeAttr('disabled');
})
});
$(document).ready(function(){
$('#button').click(function(){
$.getJSON(apiurl,function(json){
$.each(json.photos.photo,function(i,myresult){
apiurl_size = "https://api.flickr.com/services/rest/?method=flickr.photos.getSizes&api_key=YOUR_KEY&photo_id="+myresult.id+"&format=json&nojsoncallback=1";
$.getJSON(apiurl_size,function(size){
$.each(size.sizes.size,function(i,myresult_size){
if(myresult_size.width==selected_size){
$("#results").append('<p><a href="'+myresult_size.url+'" target="_blank"><img src="'+myresult_size.source+'"/></a></p>');
}
})
})
});
});
});
});
</script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<h2>Select size of photos (in pixels) you want them to be displayed</h2>
</div>
</div>
<div class="row">
<div class="col-md-2">
<button type="button" class="btn btn-primary" id="sq">Square [75X75]</button>
</div>
<div class="col-md-2">
<button type="button" class="btn btn-primary" id="lg-sq">Large Square</button>
</div>
<div class="col-md-2">
<button type="button" class="btn btn-primary" id="thumb">Thumbnail</button>
</div>
<div class="col-md-2">
<button type="button" class="btn btn-primary" id="small">Small</button>
</div>
<div class="col-md-2">
<button type="button" class="btn btn-primary" id="mid">Medium</button>
</div>
<div class="col-md-2">
<button type="button" class="btn btn-primary" id="ori">Original</button>
</div>
</div>
<div class="row">
<div class="col-md-12">
<h2>Hit This button to fetch photos</h2>
<button type="button" class="btn btn-success" id="button">Fetch Recent Photos</button>
<button type="button" class="btn btn-alert" id="reset">Reset</button>
<hr>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div id="results"></div>
</div>
</div>
</div>
</body>
</html>
