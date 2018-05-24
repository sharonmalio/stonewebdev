$( document ).ready(function() {
	
    console.log( "ready!" );
    
    var mymap = L.map('mapid').setView([3.121832846, 35.587164318], 13);

    $(document).ready(initialize);

    function initialize(){
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={pk.eyJ1Ijoia2FuaW5pbWFsaW8iLCJhIjoiY2poamh4ZjllMDB4ZTM2cWtoM2V3bWd1ZyJ9.rnF81uaCjIFtaEAfQ1ytBg}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">KenyaHealthFacilitiess</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1Ijoia2FuaW5pbWFsaW8iLCJhIjoiY2poamh4ZjllMDB4ZTM2cWtoM2V3bWd1ZyJ9.rnF81uaCjIFtaEAfQ1ytBg'
    }).addTo(mymap);

    getData();
    }

    var popup = L.popup()
    .setLatLng([3.121832846, 35.587164318])
    .setContent("I am a standalone popup.")
    .openOn(mymap);

    marker.bindPopup("<b>Want the info</b><br>on the postgresdb.").openPopup();

    var popup = L.popup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("You clicked the map at " + e.latlng.toString())
            .openOn(mymap);
    }

    mymap.on('click', onMapClick);

    function getData(){
    	$.ajax("/config/local.php", {
    		data: {
    			table: "Kenya_maps_2015_health_facilities",
    			fields: fields
    		},
    		success: function(data){
    			mapData(data);
    		}
    	})
    };
    function mapData(data){
    	//remove existing map layers
    	map.eachLayer(function(layer){
    		//if not the tile layer
    		if (typeof layer._url === "undefined"){
    			map.removeLayer(layer);
    		}
    	});
    }

    //create geojson container object
    var geojson = {
    	"type": "FeatureCollection",
    	"features": []
    };

    //split data into features
    var dataArray = data.split(", ;");
    dataArray.pop();

});


