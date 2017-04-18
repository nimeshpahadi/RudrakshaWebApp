jQuery( document ).ready(function( $ ) {  
    //screept for men menu
    
    jQuery('.main-navigation, .inner-page-nav').meanmenu({
      meanScreenWidth: "767"
    })

    //accordian
    function toggleChevron(e) {
    $(e.target)
        .prev('.panel-heading')
        .find("i.indicator")
        .toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
      }
      $('#accordion').on('hidden.bs.collapse', toggleChevron);
      $('#accordion').on('shown.bs.collapse', toggleChevron);

      $('#accordionbottom').on('hidden.bs.collapse', toggleChevron);
      $('#accordionbottom').on('shown.bs.collapse', toggleChevron);


    //screept for tougle search
    $('.search-btn').click(function () {            
            if($('.search-btn').hasClass('show-search-icon')){
                if ($(window).width()>767) {
                    $('.search-box').fadeOut(300);
                } else {
                    $('.search-box').fadeOut(0);
                }
                $('.search-btn').removeClass('show-search-icon');
            } else {
                if ($(window).width()>767) {
                    $('.search-box').fadeIn(300);
                } else {
                    $('.search-box').fadeIn(0);
                }
                $('.search-btn').addClass('show-search-icon');
            } 
        }); 

        // close search box on body click
        if($('.search-btn').size() != 0) {
            $('.search-box, .search-btn').on('click', function(e){
                e.stopPropagation();
            });

            $('body').on('click', function() {
                if ($('.search-btn').hasClass('show-search-icon')) {
                    $('.search-btn').removeClass("show-search-icon");
                    $('.search-box').fadeOut(300);
                }
            });
        }

        //carasoul
        $("#owl-demo").owlCarousel({
          margin: 10,
          nav: true,
          loop: true,
          responsive: {
            0: {
              items: 1
            },
            600: {
              items: 1
            },
            1000: {
              items: 1
            }
          }

        });

        $('.service_detail').owlCarousel({
          margin: 10,
          nav: true,
          loop: false,
          responsive: {
            0: {
              items: 1
            },
            600: {
              items: 3
            },
            1000: {
              items: 5
            }
          }
        })
        $('#service_detail1').owlCarousel({
          margin: 10,
          nav: true,
          loop: true,
          responsive: {
            0: {
              items: 1
            },
            600: {
              items: 3
            },
            1000: {
              items: 5
            }
          }
        })

        $('#zoom-click').owlCarousel({
          items: 1,
          loop: false,
          center: true,
          margin: 10,
          callbacks: true,
          URLhashListener: true,
          autoplayHoverPause: true,
          startPosition: 'URLHash'
        });
  
        


        //image cart zoom js
       $('.product-main-image').zoom({url: $('.product-main-image img').attr('data-BigImgSrc')});

       //js for plus and minus
       $(".incr-btn").on("click", function (e) {
        var $button = $(this);
        var oldValue = $button.parent().find('.quantity').val();
        $button.parent().find('.incr-btn[data-action="decrease"]').removeClass('inactive');
        if ($button.data('action') == "increase") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below 1
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
                $button.addClass('inactive');
            }
        }
        $button.parent().find('.quantity').val(newVal);
        e.preventDefault();
    });
       
    
      //rating js
        var rating = 1.6;

        $(".counter").text(rating);

        $("#rateYo1").on("rateyo.init", function () { console.log("rateyo.init"); });

        $("#rateYo1").rateYo({
          rating: rating,
          numStars: 5,
          precision: 2,
          starWidth: "64px",
          spacing: "5px",
          rtl: true,
          multiColor: {

            startColor: "#000000",
            endColor  : "#ffffff"
          },
          onInit: function () {

            console.log("On Init");
          },
          onSet: function () {

            console.log("On Set");
          }
        }).on("rateyo.set", function () { console.log("rateyo.set"); })
          .on("rateyo.change", function () { console.log("rateyo.change"); });

        $(".rateyo").rateYo();

        $(".rateyo-readonly-widg").rateYo({

          rating: rating,
          numStars: 5,
          precision: 2,
          minValue: 1,
          maxValue: 5
        }).on("rateyo.change", function (e, data) {
        
          console.log(data.rating);
        });

         //hide and  show
         function testClick(obj,serviceId){
          console.log("testClicked "+serviceId);

  // Declare all variables
      var i, servicesDetails, servicesLink;

        // Get all elements with class="servicesDetails" and hide them
        servicesDetails = document.getElementsByClassName("service-wrapper");
        for (i = 0; i < servicesDetails.length; i++) {
          servicesDetails[i].style.display = "none";
        }

        // Get all elements with class="servicesLink" and remove the class "active"
        servicesLink = document.getElementsByClassName("gallery_item_details_list");
        for (i = 0; i < servicesLink.length; i++) {
          servicesLink[i].className = servicesLink[i].className.replace(" gallery_item_details_list_active", "");
          console.log("loop class called "+servicesLink[i].className);
        }


        // Show the current tab, and add an "active" class to the link that opened the tab
        document.getElementById(serviceId).style.display = "block";
        obj.currentTarget.className += " gallery_item_details_list_active";
        // smooth scroll to top
        $("html, body").animate({ scrollTop: 200 }, "slow");
        
      }

  
      
   

//smooth scroll to top

  var offset = 300,
  //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
  offset_opacity = 1200,
  //duration of the top scrolling animation (in ms)
  scroll_top_duration = 700,
  //grab the "back to top" link
  $back_to_top = $('.cd-top');
  $(window).scroll(function(){
    ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
    if( $(this).scrollTop() > offset_opacity ) { 
      $back_to_top.addClass('cd-fade-out');
    }
  });
  /* end show the back to top */

  //smooth scroll to top
  $back_to_top.on('click', function(event){
    event.preventDefault();
    $('body,html').animate({
      scrollTop: 0 ,
    }, scroll_top_duration
    );
  });



});