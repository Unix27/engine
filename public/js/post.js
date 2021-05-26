
document.addEventListener('DOMContentLoaded',function(){
  setAddToCartEvents();
});

function setAddToCartEvents(){
  $('.vpAddToCart').off('click');
  $('.vpAddToCart').on('click',function(e){
    var ok = 1;
    console.log(custom_fields_count);
    if(custom_fields_count > 0){
      for(var i = 0; i < custom_fields_count; i++){
        if(!selected_custom_fields.includes(i)){
          ok = 0;
          $('.custom_field_' + i + ' .post-attribute-name').addClass('shake___3oxNN');
          $('.custom_field_' + i + ' .post-attribute-name').html('<span class="error___1q9h7">' + $('.custom_field_' + i + ' .post-attribute-name').data('attr-name') + ': ' + not_checked + '</span>');
        }
      }
    }

    if(ok){
      e.preventDefault();

      var t = e.currentTarget;
      var pid = $(t).data('post-id');
      var attrs = [];

      attrs.push({'options':{
          'product_id': now_pid,
          'fields_set': now_set
        }});
      console.log(now_set);
      console.log(now_pid);

      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: siteUrl + '/cart/add',
        method: 'POST',
        data: {product_id:now_pid,quantity:parseInt($('#countOfProduct').text()),'attrs':attrs,currency:user_currency},
        success: function success(response) {
          updateCartCount();
          Swal.fire(
            success_add_to_cart
          );
        },
        error: function (xhr, status, error) {
          let err = JSON.parse(xhr.responseText);
          console.log(err);
        },
      });
    }else{
      if($(document).width() > 600){
        $([document.documentElement, document.body]).animate({
          scrollTop: $($(".product-card-attributes")[1]).offset().top
        }, 400);
      }else{
        $([document.documentElement, document.body]).animate({
          scrollTop: $($(".product-card-attributes")[0]).offset().top
        }, 400);
      }
    }
  });

  $('.vpBuyNow').off('click');
  $('.vpBuyNow').on('click',function(e){
    var ok = 1;

    if(custom_fields_count > 0){
      for(var i = 0; i < custom_fields_count; i++){
        if(!selected_custom_fields.includes(i)){
          ok = 0;
          $('.custom_field_' + i + ' .post-attribute-name').addClass('shake___3oxNN');
          $('.custom_field_' + i + ' .post-attribute-name').html('<span class="error___1q9h7">' + $('.custom_field_' + i + ' .post-attribute-name').data('attr-name') + ': ' + not_checked + '</span>');
        }
      }
    }

    if(ok){
      e.preventDefault();

      var t = e.currentTarget;
      var pid = $(t).data('post-id');
      var attrs = [];

      attrs.push({'options':{
          'product_id': now_pid,
          'fields_set': now_set
        }});

      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: siteUrl + '/cart/add',
        method: 'POST',
        data: {product_id:now_pid,quantity:parseInt($('#countOfProduct').text()),'attrs':attrs,currency:user_currency},
        success: function success(response) {
          updateCartCount();
          location.href='/checkout';
        },
        error: function (xhr, status, error) {
          let err = JSON.parse(xhr.responseText);
        },
      });
    }else{
      if($(document).width() > 600){
        $([document.documentElement, document.body]).animate({
          scrollTop: $($(".product-card-attributes")[1]).offset().top
        }, 400);
      }else{
        $([document.documentElement, document.body]).animate({
          scrollTop: $($(".product-card-attributes")[0]).offset().top
        }, 400);
      }
    }
  });
}

function updateCartCount(){
  $.get('/cart/count',{},function onAjaxSuccess(data){
    if(data > 0){
      $('#cartCount').text(data);
      $('#cartCount').fadeIn();
    }else{
      $('#cartCount').text(data);
      $('#cartCount').fadeOut();
    }

  });
}

$('[data-fancybox]').fancybox({
  backFocus: false,
  loop: true
});

$(document).ready(function () {


  $('#bx-pager .thumb___1midQ_').unwrap();

  /* Keep the current tab active with Twitter Bootstrap after a page reload */
  /* For bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line */
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    /* save the latest tab; use cookies if you like 'em better: */
    localStorage.setItem('lastTab', $(this).attr('href'));
  });
  /* Go to the latest tab, if it exists: */
  var lastTab = localStorage.getItem('lastTab');
  if (lastTab) {
    $('[href="' + lastTab + '"]').tab('show');
  }
});

/* bxSlider - Initiates Responsive Carousel */
function bxSliderSettings() {
  var smSettings = {
    slideWidth: 65,
    minSlides: 1,
    maxSlides: 4,
    slideMargin: 5,
    adaptiveHeight: true,
    pager: false
  };
  var mdSettings = {
    slideWidth: 100,
    minSlides: 1,
    maxSlides: 4,
    slideMargin: 5,
    adaptiveHeight: true,
    pager: false
  };
  var lgSettings = {
    slideWidth: 100,
    minSlides: 3,
    maxSlides: 6,
    pager: false,
    slideMargin: 10,
    adaptiveHeight: true
  };

  if ($(window).width() <= 640) {
    return smSettings;
  } else if ($(window).width() > 640 && $(window).width() < 768) {
    return mdSettings;
  } else {
    return lgSettings;
  }
}

$('.description .button___Ljx44').on('click tap', function (e) {
  $('.description .text___3JGYJ').toggleClass('full_description');
  if ($('.description .text___3JGYJ').hasClass('full_description')) {
    $('.description .button___Ljx44').text("{!! t('Hide full description') !!}");
  } else {
    $('.description .button___Ljx44').text("{!! t('Show full description') !!}");
  }
});
$('.specifications .button___Ljx44').on('click tap', function (e) {
  $('.specifications .text___3JGYJ').toggleClass('full_description');
  if ($('.specifications .text___3JGYJ').hasClass('full_description')) {
    $('.specifications .button___Ljx44').text("{!! t('Hide full description') !!}");
  } else {
    $('.specifications .button___Ljx44').text("{!! t('Show full description') !!}");
  }
});
