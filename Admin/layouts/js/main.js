$(document).ready(function () {

   $(".submenu > a").click(function (e) {
      e.preventDefault();
      var $li = $(this).parent("li");
      var $ul = $(this).siblings("ul");

      if($li.hasClass("open")) {
         $ul.slideUp(350);
         $li.removeClass("open");
      } else {
         $(".nav > li > ul").slideUp(350);
         $(".nav > li").removeClass("open");
         $ul.slideDown(350);
         $li.addClass("open");
      }
   });

      $('#city').on('change', function() {

      var cityID = $(this).val();
      $.ajax({
         method: 'POST',
         url: 'areaAjax.php',
         data: { cityID: cityID },
      }).done(function(msg){
         $('#area').html(msg);
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

   // end bulding
   $('select').select2();
});
