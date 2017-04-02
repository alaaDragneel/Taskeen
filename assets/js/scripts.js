$(document).ready(function() {
   $("#owl-example").owlCarousel();
   $('.listing-detail span').tooltip('hide');
   $('.carousel').carousel({
      interval: 3000
   });
   $('.carousel').carousel('cycle');

    $('#city').on('change', function() {

      var cityID = $(this).val();
      $.ajax({
         method: 'POST',
         url: 'areaAjax.php',
         data: { cityID: cityID },
      }).done(function(msg){

         $('#area').append(msg);
      });
   });


   // bulding
   $('#city_id_bulding').on('change click', function() {

      var cityID = $(this).val();
      $.ajax({
         method: 'POST',
         url: 'ajaxfiles/buldings/getarea.php',
         data: { cityID: cityID },
      }).done(function(msg){
         $('#area_id_bulding').html('');
         $('#area_id_bulding').append('<option value=""> Select area </option>');
         $('#area_id_bulding').append(msg);
      });
   });

   $('#area_id_bulding').on('change click', function() {
      var area_id = $(this).val();
      $.ajax({
         method: 'POST',
         url: 'ajaxfiles/buldings/getSubArea.php',
         data: { area_id: area_id },
      }).done(function(msg){
         $('#subarea_id_bulding').html("");
         $('#subarea_id_bulding').append('<option value=""> Select subarea </option>');
         $('#subarea_id_bulding').append(msg);
      });
   });

   $('#cat_id_bulding').on('change click', function() {
      var cat_id = $(this).val();
      $.ajax({
         method: 'POST',
         url: 'ajaxfiles/buldings/getSubCat.php',
         data: { cat_id: cat_id },
      }).done(function(msg){
         $('#subcat_id_bulding').html("");
         $('#subcat_id_bulding').append('<option value=""> Select subcategory </option>');
         $('#subcat_id_bulding').append(msg);
      });
   });


   /*Trigger select2*/
   $('select').select2();
   /*Trigger select2*/

});




$(function() {

   var Page = (function() {


      var $nav = $( '#nav-dots > span' ),
      slitslider = $( '#slider' ).slitslider( {
         onBeforeChange : function( slide, pos ) {

            $nav.removeClass( 'nav-dot-current' );
            $nav.eq( pos ).addClass( 'nav-dot-current' );

         }
      } ),

      init = function() {

         initEvents();

      },
      initEvents = function() {

         $nav.each( function( i ) {

            $( this ).on( 'click', function( event ) {

               var $dot = $( this );

               if( !slitslider.isActive() ) {

                  $nav.removeClass( 'nav-dot-current' );
                  $dot.addClass( 'nav-dot-current' );

               }

               slitslider.jump( i + 1 );
               return false;

            } );

         } );

      };

      return { init : init };

   })();

   Page.init();

   /**
   * Notes:
   *
   * example how to add items:
   */

   /*

   var $items  = $('<div class="sl-slide sl-slide-color-2" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1"><div class="sl-slide-inner bg-1"><div class="sl-deco" data-icon="t"></div><h2>some text</h2><blockquote><p>bla bla</p><cite>Margi Clarke</cite></blockquote></div></div>');

   // call the plugin's add method
   ss.add($items);

   */



   $(document).on('click', '#Add_another_service', function(event) {
       event.preventDefault();

       $.ajax({
           method: 'get',
           url: 'admin/survice_form.php',
           success: function (msg) {
               $('.survices').append(msg);
           },
           error: function () {
               alert('error');
           }
       });
   });



   $(document).on('keyup', '.textarea', function(event) {
       var text_max       = 250;
       $(this).next('div').html(text_max + ' characters remaining');
       var text_length    = $(this).val().length;
       var text_remaining = text_max - text_length;
       $(this).next('div').html(text_remaining + ' characters remaining');
   });



});
