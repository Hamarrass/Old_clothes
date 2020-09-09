
<!DOCTYPE html>
<html>
<head>

    <title>Quick Start - Leaflet</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <style>
       #map {
           height: 400px;
       }

       .marker-pin {
           width: 30px;
           height: 30px;
           border-radius: 50% 50% 50% 0;
           background: #c30b82;
           position: absolute;
           transform: rotate(-45deg);
           left: 50%;
           top: 50%;
           margin: -15px 0 0 -15px;
       }

       .marker-pin::after {
           content: '';
           width: 24px;
           height: 24px;
           margin: 3px 0 0 3px;
           background: #fff;
           position: absolute;
           border-radius: 50%;
       }

       .custom-div-icon i {
           position: absolute;
           width: 22px;
           font-size: 22px;
           left: 0;
           right: 0;
           margin: 10px auto;
           text-align: center;
       }

       .custom-div-icon i.awesome {
           margin: 12px auto;
           font-size: 17px;
       }
   </style>
</head>
<body>



<div id="mapid" style="width: 1300px; height: 600px;"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


<script>

    // var mymap = L.map('mapid').setView([51.505, -0.09], 13);
    var mymap = L.map('mapid').fitBounds([[51.5, 10], [55.5, 13]]);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mymap);

    var icon = L.divIcon({
        className: 'custom-div-icon',
        html: "<div style='background-color:red;' class='marker-pin'></div><i class='material-icons'>group</i>",
        iconSize: [30, 42],
        iconAnchor: [15, 42]
    });

    const marker = L.marker([51.5, -0.09], {draggable:true,icon: icon})
                    .addTo(mymap)
                    .bindPopup("Team location");

    marker.on('dragend', function (e) {
        document.getElementById('latitude').value = marker.getLatLng().lat;
        document.getElementById('longitude').value = marker.getLatLng().lng;
    });

    var icon = L.divIcon({
        className: 'custom-div-icon',
        html: "<div style='background-color:green;' class='marker-pin'></div><i class='material-icons'>group</i>",
        iconSize: [30, 42],
        iconAnchor: [25, 80]
    });

    $.ajax({
        url : "{{route('displayteams')}}",
        method:'get',

        success:function(data) {
             data.forEach(e => {
                 L.marker([e.latitude,e.longitude],{icon: icon})
                     .addTo(mymap)
                     .bindPopup(e.description);
             })
        }
    })

</script>



</body>
</html>
