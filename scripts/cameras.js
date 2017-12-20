var map = null;
var currentOpenInfoWindow = null;
var markers = Object();
var radar = new Image();
radar.src = "/images/radar.jpg";

$(document)
		.ready(
				function(e) {

					var myLatlng = new google.maps.LatLng(40.177682, 44.512470);
					var mapOptions ={
										zoom : 16,
										center : myLatlng,
										mapTypeId : google.maps.MapTypeId.ROADMAP
									};
					map = new google.maps.Map(document.getElementById("map_main_canvas"),mapOptions);
					$("#select-type").bind(   'change' ,   function()   {  loadCities(this); })
					$("#select-city").bind(   'change' ,   function()   {  loadStreets(this); });
					$("#select-street").bind( 'change' ,   function()   {  loadCameras(); });
					$("#select-zoom").bind( 'change' ,   function()   {  map.setZoom(this.value*1) });
					loadCameras();

				});
var drowStreetCamreas = function(markers, self) {
	
	for (index in markers) {
		object = markers[index];
		if (self.value == object.camera.street) {

			var streetDesc = $("<div>", {
				class : 'camera-desc',
				html : object.camera.description + " " + object.camera.address
						+ " " + object.camera.max_speed
			});
			streetDesc.data('latitude', object.camera.latitude);
			streetDesc.data('longitude', object.camera.longitude);
			var icon = $("<div>", {
				class : 'camera-type ' + object.camera.camera_type
			}).prependTo(streetDesc);

			streetDesc.bind('click', function() {

				var latitude = $(this).data('latitude');
				var longitude = $(this).data('longitude');

				var markerLatlng = new google.maps.LatLng(latitude, longitude);
				map.setCenter(markerLatlng);
			});
			streetDesc.appendTo($("#street-desc"));
		}
	}
};
function centerMap(markers, city, street) {
	var markerBounds = new google.maps.LatLngBounds();
	var $isExtendet = 0;
	for (index in markers) 
	{
		object = markers[index];
		var markerLatlng = new google.maps.LatLng(object.camera.latitude,
				object.camera.longitude);

		if (city == 0 && street == 0) {
			markerBounds.extend(markerLatlng);
			$isExtendet++;
			continue;
		}
		if (city != 0 && street != 0) {
			if (object.camera.city == city && object.camera.street == street) {
				markerBounds.extend(markerLatlng);
			}
			$isExtendet++;
			continue;
		}
		if (city != 0 && street == 0) {
			if (object.camera.city == city) {
				markerBounds.extend(markerLatlng);
			}
			$isExtendet++;
			continue;
		}

	}
	
	if ($isExtendet) 
	{
		map.fitBounds(markerBounds);
		if(map.getZoom() > 16)
		{
			map.setZoom(16);
			
			
		}
		
	}
		
	$("#select-zoom").val(map.getZoom());
}
var loadCities = function(self) {
	$.ajax({
		url : '',
		dataType : "json",
		data : 
		{
			action:'loadCities',
			type : self.value, 
		},
		beforeSend:function()
		{
			$('option:not(:first)', $("select#select-city")).remove();
			$('option:not(:first)', $("select#select-street")).remove();
		},
		success : function(data) {

			$('option:not(:first)', $("select#select-city")).remove();
			console.log(data);
			for ( var i in data) 
			{
				$("select#select-city").append($("<option>", {
					value : data[i].id,
					text : data[i].value
				}));
			}
			loadCameras();
		}
	});
};
var loadStreets = function(self) {
	$.ajax({
		url : '?action=loadStreet',
		dataType : "json",
		data : {
			city : self.value,
			type : $("#select-type").val()			
		},
		beforeSend:function()
		{
			 
			$('option:not(:first)', $("select#select-street")).each(function(e,i)
			{
					console.log($(i).remove());
			});
		},
		success : function(data) 
		{
			for ( var i in data) 
			{
					$("select#select-street").append($("<option>", {
						value : data[i].id,
						text : data[i].value
					}));
			}
			loadCameras();
		}
	});
};

function createMarker(camera,infowindow,marker) 
{

	var ctype = camera.dubleside == 3 ? 0 : camera.dubleside;
	var a = createDirectionPatch(camera.latitude, camera.longitude, ctype,	camera.angle, 200, 30);
	var poligonSetup = 
	{
		strokeColor : "#00354b",
		strokeOpacity : 0.0,
		strokeWeight : 1,
		fillColor : "#00354b",
		fillOpacity : 0.0,
		clickable : true,
		map : map,
		path : a,
	};		
	var cameraArea = new google.maps.Polygon(poligonSetup);
	 
	 google.maps.event.addListener(cameraArea, 'click', function(){ infowindow.open(map,marker);});
	 google.maps.event.addListener(cameraArea, 'mouseover', cameraMouseover);
	 google.maps.event.addListener(cameraArea, 'mouseout', cameraMouseout);
	 marker.cameraArea = cameraArea;
	 google.maps.event.addListener(marker, 'mouseover', markerMouseover);
	 google.maps.event.addListener(marker, 'mouseout', markerMouseout);
	 return cameraArea;
}
var markerMouseover = function(){ this.cameraArea.setOptions({fillColor : "#00354b",fillOpacity : 0.5,strokeOpacity : 0.8});}
var markerMouseout = function(){ this.cameraArea.setOptions({fillColor : "#00354b",fillOpacity : 0,strokeOpacity : 0});}
var cameraMouseout = function ()
{
	 
	this.setOptions({fillColor : "#00354b",fillOpacity : 0,strokeOpacity : 0});
	console.log({fillColor : "#00354b",fillOpacity : 0,strokeOpacity : 0});
	
}
var cameraMouseover = function ()
{
	 
	this.setOptions({fillColor : "#00354b",fillOpacity : 0.5,strokeOpacity : 0.8})
}
//j, k, c, m, l, e
function createDirectionPatch(j, k, c, m, l, e) {

	j = j - 0;
	k = k - 0;
	var h = [ new google.maps.LatLng(j, k) ];
	var n = m;
	n = 360 - n + 90;
	if (c == 0) {
		e = 180;
	}
	e = e / 2;
	var f = Math.PI / 180;
	var a = 180 / Math.PI;
	var b = (l / 6378000) * a;
	var d = b / Math.cos(j * f);
	function g(o) {
		var p = Math.PI * (o / 180);
		sx = k + (d * Math.cos(p));
		sy = j + (b * Math.sin(p));
		h.push(new google.maps.LatLng(sy, sx));

	}
	g(n + e);
	g(n + e / 2);
	g(n);
	g(n - e / 2);
	g(n - e);
	if (c == 2 || c == 0) {
		h.push(new google.maps.LatLng(j, k));
		g(n + e - 180);
		g(n + e / 2 - 180);
		g(n - 180);
		g(n - e / 2 - 180);
		g(n - e - 180)
	}
	return h
}
var processMarkers = function(self)
{
	
		for(markerId in markers)
		{
				var cMarker = markers[markerId];
				
				if(self.value == 0)
				{
					if(cMarker.marker.getMap() == null)
					{
							cMarker.marker.setMap(map);
							cMarker.area.setMap(map);
					}
				}
				else
				{
					
				
					if(cMarker.camera.camera_type != self.value)
					{
						cMarker.marker.setMap(null);
						cMarker.area.setMap(null)
					}else
					{
						if(cMarker.marker.getMap() == null)
						{
							cMarker.marker.setMap(map);
							cMarker.area.setMap(map)
						}
					}
				}
		}
	
};


var loadCameras = function()
{
	$.ajax({
								url : '?',
								dataType : "json",
								data:
								{
									'action':'loadCameras',
									"type":$("#select-type").val(),
									"city":$("#select-city").val(),
									"street":$("#select-street").val()
									
								},
								beforeSend:function()
								{
								
									
									for(prop in markers)
									{
									
										 
										var rMarker = markers[prop];
										rMarker.marker.setMap(null);
										rMarker.area.setMap(null);
										
									}
									delete markers ;
								},
								success : function(data) 
								{
									
								
									markers = new Object();
									
									$(data).each(function(index, camera) 
									{					if (camera.camera_type == 'speed') 
														{
															var icon = new google.maps.MarkerImage("/css/images/speed-camera.png");
														}
														else 
														{
															var icon = new google.maps.MarkerImage( "/css/images/violation-camera.png");
														}

														var markerLatlng = new google.maps.LatLng(camera.latitude,camera.longitude);
														var infowindow = new google.maps.InfoWindow({content :"<div class='info-content'>"+"<div id='topNotice'>"+"</div>"+"<div class='botNotice'>"+camera.description+"</div>"+"</div>"});
														var marker = new google.maps.Marker(
																{
																	position : markerLatlng,
																	map : map,
																	id : "cameraAlias"+camera.id,
																	flat : true,
																	icon : icon,
																	animation : google.maps.Animation.DROP,
																	title : camera.camera_type_label,
																	city : camera.city,
																	street : camera.street,
																	dirType : camera.dubleside,
																	angle : camera.angle

																});
														
														var area = createMarker(camera,infowindow,marker);
														markers["cameraAlias"+camera.id] = 
														{
															marker : marker,
															infowindow : infowindow,
															camera : camera,
															area:area
														};
														
														if(camera.description != '')
														{
								                             
								                            google.maps.event.addListener(marker,'click',function(arg) {
								                            //infowindow.open(map,marker);
                                                            if(currentOpenInfoWindow){
                                                                currentOpenInfoWindow.close();
                                                            }
															markers[this.id].infowindow.open(map,this);
                                                            currentOpenInfoWindow = markers[this.id].infowindow;
															});
														}
														
									});
									if(markers)
									{
										centerMap(markers, 0, 0);
									}
								}

							})
}