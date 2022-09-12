<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MapPoi $model */
/** @var yii\widgets\ActiveForm $form */
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<style>
.modal-content{
height: 768px;
width: 1024px;
}
</style>



<!-- Button trigger modal -->
<div class="row">
   
    <div class="col">
        <br>
        <input type="button" value="Get Location" id="location" class="btn btn-success" data-toggle="modal" data-target="#mapModalCenter">
        <!-- <?= Html::button('Get Location', ['class' => 'btn btn-success']) ?> -->
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mapModalCenter" tabindex="-1" role="dialog" aria-labelledby="mapModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Choose Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="map" class="modal-body">
      </div>
      <div class="modal-footer">
            <div class="map-poi-form">

        <?php $form = ActiveForm::begin(); ?>


        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <br>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <br>
        

        </div>
        <div class="form-group">
            <?= Html::submitButton('Save changes', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

 <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly"
      defer
    ></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!-- <script type="text/javascript">
    var lati = document.getElementsByName('latitude');
    var longi = document.getElementsByName('longitude');
    function getLocation() {
        // alert("get location");
        if(navigator.geolocation){
            // alert("supporting");
            lati.value = "Latitude";
            longi.value = "Longitude";
        }else{
            lati.value = "Not Suppoted";
            longi.value = "Not Suppoted";
        }
    }
</script> -->
<script type="text/javascript">

/**
 * @license
 * Copyright 2019 Google LLC. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

var defLat = '20.5937';
var defLng = '78.9629';
$.getJSON("https://api.ipify.org/?format=json", function(e) {
    var defip = e.ip;
    if(defip){
        $.getJSON('http://ip-api.com/json/'+defip+'?fields=status,message,lat,lon,query')  
        .done (function(location)
        {
            defLat = location.lat;
            defLng = location.lon;
            // console.log(location.lat);
            // alert(defLat);
            // $('#latitude').html(location.latitude);
            // $('#longitude').html(location.longitude);
        });
    }
    // console.log(e);
});
function initMap() {
    
  const myLatlng = { lat: parseFloat(defLat), lng: parseFloat(defLng) };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 6,
    center: myLatlng,
  });
  // Create the initial InfoWindow.

  let marker = new google.maps.Marker({
                    position: myLatlng,
                    title:"Hello World!"
                });
    // marker.setMap(map);             
  let infoWindow = new google.maps.InfoWindow({
    content: "Click the map to get Lat/Lng!",
    position: myLatlng,
  });

  infoWindow.open(map);

  // Configure the click listener.
//   var listener1 = marker.addListener('click', aFunction);


  map.addListener("click", (mapsMouseEvent) => {
    // Close the current InfoWindow.
    $("#mappoi-latitude").val('');
    $("#mappoi-longitude").val('');
    marker.setMap(null);

    marker = new google.maps.Marker({
                    position: mapsMouseEvent.latLng,
                    title:JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2),
                    //icon: icons[features[i].type].icon
                });

    var myLatLng = mapsMouseEvent.latLng;
    var lat = myLatLng.lat();
    var lng = myLatLng.lng();
                
    // let latlng = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);
    // console.log(JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2));
    // alert(lat);
    // alert(latlng.lng)
    $("#mappoi-latitude").val(lat);
    $("#mappoi-longitude").val(lng);
    // infoWindow.close();
    marker.setMap(map); 
    // Create a new InfoWindow.
    // infoWindow = new google.maps.InfoWindow({
    //   position: mapsMouseEvent.latLng,
    // });
    // infoWindow.setContent(
    //   JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
    // );
    // infoWindow.open(map);
    



  });
}

window.initMap = initMap;
</script>