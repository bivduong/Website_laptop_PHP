  $('.slide-one-item-alt').owlCarousel({
      center: false,
      items: 1,
    dots:false,
      loop: true,
      margin: 0,
      smartSpeed: 1000,
      autoplay: true,
      pauseOnHover: true,
      onDragged: function(event) {
        console.log('event : ',event.relatedTarget['_drag']['direction'])
        if ( event.relatedTarget['_drag']['direction'] == 'left') {
          $('.slide-one-item-alt-text').trigger('next.owl.carousel');
        } else {
          $('.slide-one-item-alt-text').trigger('prev.owl.carousel');
        }
      }
    });
    
    
    $('.slide-one-item-alt-text').owlCarousel({
      center: false,
      items: 1,
      dots:false,
      loop: true,
      margin: 0,
      smartSpeed: 1000,
      autoplay: true,
      pauseOnHover: true,
      onDragged: function(event) {
        console.log('event : ',event.relatedTarget['_drag']['direction'])
        if ( event.relatedTarget['_drag']['direction'] == 'left') {
          $('.slide-one-item-alt').trigger('next.owl.carousel');
        } else {
          $('.slide-one-item-alt').trigger('prev.owl.carousel');
        }
      }
    });
   

    


    $('.custom-next').click(function(e) {
      e.preventDefault();
      $('.slide-one-item-alt').trigger('next.owl.carousel');
      $('.slide-one-item-alt-text').trigger('next.owl.carousel');
    });
    
    $('.custom-prev').click(function(e) {
      e.preventDefault();
      $('.slide-one-item-alt').trigger('prev.owl.carousel');
      $('.slide-one-item-alt-text').trigger('prev.owl.carousel');
    });

     var swiper = new Swiper('.swiper-container', {
      slidesPerView: 1,
      spaceBetween: 10,
      // init: false,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 50,
        },
      }
    });

       $('.odd').owlCarousel({
    items:5,
    loop:true,
    margin:10,
    merge:true,
     autoplay:true,
     autoplayTimeout:1500,
    responsive:{
        678:{
            mergeFit:true
        },
        1000:{
          
            mergeFit:false
        }
    }
});
         $(document).ready(function(){
      $('#img1').zoom();
     
    });


          function initMap() {
           var map = new google.maps.Map(document.getElementById('map'), {
             zoom: 11,
             center: {lat: 40.645037, lng: -73.880224},
         styles: [
                  {
                    elementType: 'geometry',
                    stylers: [{color: '#fefefe'}]
                  },
                  {
                    elementType: 'labels.icon',
                    stylers: [{visibility: 'off'}]
                  },
                  {
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#616161'}]
                  },
                  {
                    elementType: 'labels.text.stroke',
                    stylers: [{color: '#f5f5f5'}]
                  },
                  {
                    featureType: 'administrative.land_parcel',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#bdbdbd'}]
                  },
                  {
                    featureType: 'poi',
                    elementType: 'geometry',
                    stylers: [{color: '#eeeeee'}]
                  },
                  {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#757575'}]
                  },
                  {
                    featureType: 'poi.park',
                    elementType: 'geometry',
                    stylers: [{color: '#e5e5e5'}]
                  },
                  {
                    featureType: 'poi.park',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9e9e9e'}]
                  },
                  {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{color: '#eee'}]
                  },
                  {
                    featureType: 'road.arterial',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#3d3523'}]
                  },
                  {
                    featureType: 'road.highway',
                    elementType: 'geometry',
                    stylers: [{color: '#eee'}]
                  },
                  {
                    featureType: 'road.highway',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#616161'}]
                  },
                  {
                    featureType: 'road.local',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9e9e9e'}]
                  },
                  {
                    featureType: 'transit.line',
                    elementType: 'geometry',
                    stylers: [{color: '#e5e5e5'}]
                  },
                  {
                    featureType: 'transit.station',
                    elementType: 'geometry',
                    stylers: [{color: '#000'}]
                  },
                  {
                    featureType: 'water',
                    elementType: 'geometry',
                    stylers: [{color: '#c8d7d4'}]
                  },
                  {
                    featureType: 'water',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#b1a481'}]
                  }
                ]
         });
         
           var image = 'images/it_service/location_icon_map_cont.png';
           var beachMarker = new google.maps.Marker({
             position: {lat: 40.645037, lng: -73.880224},
             map: map,
             icon: image
           });
         }


         