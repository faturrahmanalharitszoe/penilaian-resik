var map;
var initMap = function() {                                                                                                                                                 
  var mm = com.modestmaps;
  var layer = new mm.TemplatedLayer('http://osm-bayarea.s3.amazonaws.com/{Z}-r{Y}-c{X}.jpg');

  map = new mm.Map('map', layer, new mm.Point(690,360))
  var f = new mm.Follower(map, new mm.Location(37.811530, -122.2666097), 'Broadway and Grand');
  map.setCenterZoom(new mm.Location(37.811530, -122.2666097), 14);
}