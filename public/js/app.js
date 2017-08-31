$(function () {
  $(".button-collapse").sideNav();
  $('[data-dismiss-validation-alert]').click(function(){
    $('[data-validation-alert]').fadeOut('slow');
  });

  $('input, textarea').keyup(function() {
    $(this).parent().removeClass('has-error');
  });

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  if ($('#myCarousel').length) {
    // handles the carousel thumbnails
    $('[id^=carousel-selector-]').click(function () {
      var id_selector = $(this).attr('id')
      var id = id_selector.substr(id_selector.length - 1)
      id = parseInt(id)
      $('#myCarousel').carousel(id)
      $('[id^=carousel-selector-]').removeClass('selected')
      $(this).addClass('selected')
    })

    // when the carousel slides, auto update
    $('#myCarousel').on('slid', function (e) {
      var id = $('.item.active').data('slide-number')
      id = parseInt(id)
      $('[id^=carousel-selector-]').removeClass('selected')
      $('[id=carousel-selector-' + id + ']').addClass('selected')
    })
  }
  $('[data-toggle="tooltip"]').tooltip({delay: 0});

  $('[data-delete-image]').click(function() {
    _fa = $(this).find('i');
    _this = $(this);
    id = $(this).data('delete-image');
    if (confirm('Are you sure?')) {
      _fa.removeClass('fa-close').addClass('fa-spinner fa-spin')
      $.ajax({
        url: '/images/' + id,
        type: 'DELETE'
      }).done(function (response) {
        if (response.success) {
          _this.parent().fadeOut();
        }
      })
    }
  });
})