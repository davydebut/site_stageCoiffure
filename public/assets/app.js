$(function () {
    $(document).scroll(function () {
      var $nav = $(".menu");
      $nav.toggleClass('scrolled p-2', $(this).scrollTop() > $nav.height());
      $nav.toggleClass('ms-5', $(this).scrollTop() < $nav.height());
    });
  });