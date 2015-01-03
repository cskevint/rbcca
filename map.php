<?php
  session_start();
  $name = "Regional Bah&aacute;'&iacute; Council of the State of California";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $name ?></title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"/>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

<!--    <link rel="stylesheet" href="http://bootswatch.com/readable/bootstrap.min.css"/>-->
<!--    <link rel="stylesheet" href="http://bootswatch.com/flatly/bootstrap.min.css"/>-->
    <link rel="stylesheet" href="http://bootswatch.com/united/bootstrap.min.css"/>

    <style type="text/css">
        body {
            margin-top: 75px; /* adjust this if the height of the menu bar changes */
        }
        /*.navbar {*/
            /*background-color: #ffffff;*/
        /*}*/
        footer {
            padding: 30px 0;
        }

        #map-canvas {
            height: 600px;
            margin: 0px;
            padding: 0px
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>
        // This example creates a simple polygon representing the Bermuda Triangle.

        $(function(){
            $.get("/rbcca/temp.json", function(result){

                var coordinates = result.mpoly.coordinates[0];

                var mapOptions = {
                    zoom: 10,
                    center: new google.maps.LatLng(38.0861397177404, -122.76869271679686),
                    disableDefaultUI: false
                };

                var clusterPolygon;

                var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

                var wrappedCoordinates = [];

                coordinates.forEach(function(o){
                    wrappedCoordinates.push(new google.maps.LatLng(o[1], o[0]));
                });

                clusterPolygon = new google.maps.Polygon({
                    paths: wrappedCoordinates,
                    strokeColor: '#FF0000',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#FF0000',
                    fillOpacity: 0.35
                });

                clusterPolygon.setMap(map);

                return;

                var myLatlng = new google.maps.LatLng(coordinates[0][1],coordinates[0][0]);
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    draggable:true,
                    title:"Drag me!"
                });
                google.maps.event.addListener(marker, 'click', function(event) {
                    console.log(event.latLng.lat(), event.latLng.lng());
                });
                marker.setMap(map);
            });
        });

     </script>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
            <a class="navbar-brand logo-nav" href="index.php"><?= $name ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#about">Clusters</a></li>
                <li><a href="#services">Training Institute</a></li>
                <li><a href="#services">Service</a></li>
                <li><a href="#contact">Contact</a></li>
                <?php
                    $hostname = str_replace(__FILE__, "", $_SERVER["REQUEST_URI"]);
                    if(isset($_SESSION['unity_token'])) {
                ?>
                    <li><a href="<?=$hostname?>oauth.php?auth_logout=true">Sign Out</a></li>
                <?php } else { ?>
                    <li><a href="<?=$hostname?>oauth.php?auth_redirect=true">Sign In</a></li>
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>

<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <div id="map-canvas"></div>
        </div>
    </div>

    <footer>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; <?= $name ?> 2013</p>
            </div>
        </div>
    </footer>

</div><!-- /.container -->

</body>
</html>
