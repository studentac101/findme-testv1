

var temp_lat = parseFloat($("#lat").val());
var temp_lng = parseFloat($("#lng").val());


var Cebu = {lat : 10.3157 , lng : 123.8854};  //used for creating a new missing person
var Missing = {lat: temp_lat  , lng: temp_lng}; //used for editing missing person
var Sighting = {lat: temp_lat  , lng: temp_lng}; //used for viewing the sighting of a missing person

var url = window.location.href;
// remove the last character
url = url.slice(0, -1)



if( url == "http://localhost:8000/missings/editMissing/"){

  function  initMap(){// map for editing of missing person record

    var map = new google.maps.Map(document.getElementById('mapEditMissing'),{
      center: Missing,
      zoom: 10,
      styles: [
            {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
            {
              featureType: 'administrative.locality',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [{color: '#263c3f'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [{color: '#6b9a76'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{color: '#38414e'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry.stroke',
              stylers: [{color: '#212a37'}]
            },
            {
              featureType: 'road',
              elementType: 'labels.text.fill',
              stylers: [{color: '#9ca5b3'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#746855'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#1f2835'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#f3d19c'}]
            },
            {
              featureType: 'transit',
              elementType: 'geometry',
              stylers: [{color: '#2f3948'}]
            },
            {
              featureType: 'transit.station',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#17263c'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [{color: '#515c6d'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.stroke',
              stylers: [{color: '#17263c'}]
            }
          ],
    });

    var marker = new google.maps.Marker({
      position : map.center,
      map : map,
      draggable : true,
    });

        var input = document.getElementById('searchbox'); //1
        var autocomplete = new google.maps.places.Autocomplete(input); //2

        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();//3
            //4
            var newmapcenter = {lat:place.geometry.location.lat() ,lng:place.geometry.location.lng() }

            // if i will use map object to set center
            // use map.setCenter
            //
            // if i will use marker object to set center
            // use marker.setPosition

            map.setCenter(newmapcenter);
            marker.setPosition(newmapcenter);
            $('#lat').val(marker.getPosition().lat());
            $('#lng').val(marker.getPosition().lng());
        });

    $("#mapEditMissing").click(function(event) {
      $("#lat").val(marker.getPosition().lat());
      $("#lng").val(marker.getPosition().lng());
    });


  }// map for editing of missing person record



} //  if





else if(url == 'http://localhost:8000/missings/createMissing/') {
  // ------------------------------------------------------------------
  function initMap() {// map for creation of a missing person record
    var map = new google.maps.Map(document.getElementById('mapCreateMissing'), {
      center: Cebu,
      zoom: 10,
      styles: [
            {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
            {
              featureType: 'administrative.locality',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [{color: '#263c3f'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [{color: '#6b9a76'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{color: '#38414e'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry.stroke',
              stylers: [{color: '#212a37'}]
            },
            {
              featureType: 'road',
              elementType: 'labels.text.fill',
              stylers: [{color: '#9ca5b3'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#746855'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#1f2835'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#f3d19c'}]
            },
            {
              featureType: 'transit',
              elementType: 'geometry',
              stylers: [{color: '#2f3948'}]
            },
            {
              featureType: 'transit.station',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#17263c'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [{color: '#515c6d'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.stroke',
              stylers: [{color: '#17263c'}]
            }
          ],
    });


    var marker = new google.maps.Marker({
      position : map.center,
      map : map,
      draggable : true,

    });
    var input = document.getElementById('searchbox');
    var autocomplete = new google.maps.places.Autocomplete(input);
                  // add an event listen using the google addListener
                  autocomplete.addListener('place_changed', function() {
                      var place = autocomplete.getPlace();
                      var newmapcenter = {lat:place.geometry.location.lat() ,lng:place.geometry.location.lng() }
                      // set the map center
                      map.setCenter(newmapcenter);
                      // set the position of the marker according to the new center basing on the place that is being searched
                      marker.setPosition(newmapcenter);
                      $('#lat').val(marker.getPosition().lat());
                      $('#lng').val(marker.getPosition().lng());
                  });

    $(document).ready(function() {
      $('#lat').val(map.center.lat());
      $('#lng').val(map.center.lng());

              $("#mapCreateMissing").click(function(event) {
                $('#lat').val(marker.getPosition().lat());
                $('#lng').val(marker.getPosition().lng());
              });
    });


  } // map for creation of a missing person record



} //else if

else {
  function initMap() {
    var map = new google.maps.Map(document.getElementById('mapSightingDetail'),{
      center: Sighting,
      zoom:10,
      styles: [
            {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
            {
              featureType: 'administrative.locality',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [{color: '#263c3f'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [{color: '#6b9a76'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{color: '#38414e'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry.stroke',
              stylers: [{color: '#212a37'}]
            },
            {
              featureType: 'road',
              elementType: 'labels.text.fill',
              stylers: [{color: '#9ca5b3'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#746855'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#1f2835'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#f3d19c'}]
            },
            {
              featureType: 'transit',
              elementType: 'geometry',
              stylers: [{color: '#2f3948'}]
            },
            {
              featureType: 'transit.station',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#17263c'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [{color: '#515c6d'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.stroke',
              stylers: [{color: '#17263c'}]
            }
          ],
    });

    var marker = new google.maps.Marker({
      position: map.center,
      map:map,
      draggable:false,
    });

  }
}













































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































//
//
//
// var temp_lat = parseFloat($("#lat").val());
// var temp_lng = parseFloat($("#lng").val());
//
//
// var Cebu = {lat : 10.3157 , lng : 123.8854};  //used for creating a new missing person
// var Missing = {lat: temp_lat  , lng: temp_lng}; //used for editing missing person
//
// var url = window.location.href;
// // remove the last character
// url = url.slice(0, -1)
//
//
//
// if( url == "http://localhost:8000/missings/editMissing/"){
//
//   function  initMap(){// map for editing of missing person record
//
//     var map = new google.maps.Map(document.getElementById('mapEditMissing'),{
//       center: Missing,
//       zoom: 10,
//       styles: [
//             {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
//             {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
//             {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
//             {
//               featureType: 'administrative.locality',
//               elementType: 'labels.text.fill',
//               stylers: [{color: '#d59563'}]
//             },
//             {
//               featureType: 'poi',
//               elementType: 'labels.text.fill',
//               stylers: [{color: '#d59563'}]
//             },
//             {
//               featureType: 'poi.park',
//               elementType: 'geometry',
//               stylers: [{color: '#263c3f'}]
//             },
//             {
//               featureType: 'poi.park',
//               elementType: 'labels.text.fill',
//               stylers: [{color: '#6b9a76'}]
//             },
//             {
//               featureType: 'road',
//               elementType: 'geometry',
//               stylers: [{color: '#38414e'}]
//             },
//             {
//               featureType: 'road',
//               elementType: 'geometry.stroke',
//               stylers: [{color: '#212a37'}]
//             },
//             {
//               featureType: 'road',
//               elementType: 'labels.text.fill',
//               stylers: [{color: '#9ca5b3'}]
//             },
//             {
//               featureType: 'road.highway',
//               elementType: 'geometry',
//               stylers: [{color: '#746855'}]
//             },
//             {
//               featureType: 'road.highway',
//               elementType: 'geometry.stroke',
//               stylers: [{color: '#1f2835'}]
//             },
//             {
//               featureType: 'road.highway',
//               elementType: 'labels.text.fill',
//               stylers: [{color: '#f3d19c'}]
//             },
//             {
//               featureType: 'transit',
//               elementType: 'geometry',
//               stylers: [{color: '#2f3948'}]
//             },
//             {
//               featureType: 'transit.station',
//               elementType: 'labels.text.fill',
//               stylers: [{color: '#d59563'}]
//             },
//             {
//               featureType: 'water',
//               elementType: 'geometry',
//               stylers: [{color: '#17263c'}]
//             },
//             {
//               featureType: 'water',
//               elementType: 'labels.text.fill',
//               stylers: [{color: '#515c6d'}]
//             },
//             {
//               featureType: 'water',
//               elementType: 'labels.text.stroke',
//               stylers: [{color: '#17263c'}]
//             }
//           ]
//     });
//
//     var marker = new google.maps.Marker({
//       position : map.center,
//       map : map,
//       draggable : true,
//     });
//
//         var input = document.getElementById('searchbox'); //1
//         var autocomplete = new google.maps.places.Autocomplete(input); //2
//
//         autocomplete.addListener('place_changed', function() {
//             var place = autocomplete.getPlace();//3
//             //4
//             var newmapcenter = {lat:place.geometry.location.lat() ,lng:place.geometry.location.lng() }
//
//             // if i will use map object to set center
//             // use map.setCenter
//             //
//             // if i will use marker object to set center
//             // use marker.setPosition
//
//             map.setCenter(newmapcenter);
//             marker.setPosition(newmapcenter);
//             $('#lat').val(marker.getPosition().lat());
//             $('#lng').val(marker.getPosition().lng());
//         });
//
//     $("#mapEditMissing").click(function(event) {
//       $("#lat").val(marker.getPosition().lat());
//       $("#lng").val(marker.getPosition().lng());
//     });
//
//
//   }// map for editing of missing person record
//
//
//
// } //  if
//
//
//
//
//
// else if(url == 'http://localhost:8000/missings/createMissing/') {
//   // ------------------------------------------------------------------
//   function initMap() {// map for creation of a missing person record
//     var map = new google.maps.Map(document.getElementById('mapCreateMissing'), {
//       center: Cebu,
//       zoom: 10,
//       styles: [
//             {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
//             {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
//             {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
//             {
//               featureType: 'administrative.locality',
//               elementType: 'labels.text.fill',
//               stylers: [{color: '#d59563'}]
//             },
//             {
//               featureType: 'poi',
//               elementType: 'labels.text.fill',
//               stylers: [{color: '#d59563'}]
//             },
//             {
//               featureType: 'poi.park',
//               elementType: 'geometry',
//               stylers: [{color: '#263c3f'}]
//             },
//             {
//               featureType: 'poi.park',
//               elementType: 'labels.text.fill',
//               stylers: [{color: '#6b9a76'}]
//             },
//             {
//               featureType: 'road',
//               elementType: 'geometry',
//               stylers: [{color: '#38414e'}]
//             },
//             {
//               featureType: 'road',
//               elementType: 'geometry.stroke',
//               stylers: [{color: '#212a37'}]
//             },
//             {
//               featureType: 'road',
//               elementType: 'labels.text.fill',
//               stylers: [{color: '#9ca5b3'}]
//             },
//             {
//               featureType: 'road.highway',
//               elementType: 'geometry',
//               stylers: [{color: '#746855'}]
//             },
//             {
//               featureType: 'road.highway',
//               elementType: 'geometry.stroke',
//               stylers: [{color: '#1f2835'}]
//             },
//             {
//               featureType: 'road.highway',
//               elementType: 'labels.text.fill',
//               stylers: [{color: '#f3d19c'}]
//             },
//             {
//               featureType: 'transit',
//               elementType: 'geometry',
//               stylers: [{color: '#2f3948'}]
//             },
//             {
//               featureType: 'transit.station',
//               elementType: 'labels.text.fill',
//               stylers: [{color: '#d59563'}]
//             },
//             {
//               featureType: 'water',
//               elementType: 'geometry',
//               stylers: [{color: '#17263c'}]
//             },
//             {
//               featureType: 'water',
//               elementType: 'labels.text.fill',
//               stylers: [{color: '#515c6d'}]
//             },
//             {
//               featureType: 'water',
//               elementType: 'labels.text.stroke',
//               stylers: [{color: '#17263c'}]
//             }
//           ]
//     });
//
//     var marker = new google.maps.Marker({
//       position : map.center,
//       map : map,
//       draggable : true,
//
//     });
//     var input = document.getElementById('searchbox');
//     var autocomplete = new google.maps.places.Autocomplete(input);
//                   // add an event listen using the google addListener
//                   autocomplete.addListener('place_changed', function() {
//                       var place = autocomplete.getPlace();
//                       var newmapcenter = {lat:place.geometry.location.lat() ,lng:place.geometry.location.lng() }
//                       // set the map center
//                       map.setCenter(newmapcenter);
//                       // set the position of the marker according to the new center basing on the place that is being searched
//                       marker.setPosition(newmapcenter);
//                       $('#lat').val(marker.getPosition().lat());
//                       $('#lng').val(marker.getPosition().lng());
//                   });
//
//     $(document).ready(function() {
//       $('#lat').val(map.center.lat());
//       $('#lng').val(map.center.lng());
//
//               $("#mapCreateMissing").click(function(event) {
//                 $('#lat').val(marker.getPosition().lat());
//                 $('#lng').val(marker.getPosition().lng());
//               });
//     });
//
//
//   } // map for creation of a missing person record
//
//
//
// } //else
