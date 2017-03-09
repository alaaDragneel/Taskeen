/*global $, document*/
$(document).ready(function () {

   'use strict';

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

});
