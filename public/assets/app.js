$(function () {
    $(document).scroll(function () {
      var $nav = $(".menu");
      $nav.toggleClass('scrolled p-2', $(this).scrollTop() > $nav.height());
      $nav.toggleClass('ms-5', $(this).scrollTop() < $nav.height());
    });
    $("#show_hide_password a").on('click', function (event) {
      event.preventDefault();
      if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("fa-eye-slash");
          $('#show_hide_password i').removeClass("fa-eye");
      } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("fa-eye-slash");
          $('#show_hide_password i').addClass("fa-eye");
      }
  });
  });