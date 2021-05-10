var now_set;

var openModal;
var closeModal;

;(function () {
  var $body = $('body');

  $body.on('click', '[data-modal-close]', function (e) {
    e.preventDefault();
    var currentModal = $(this).closest('[data-modal]');
    close(currentModal);
  });

  $body.on('click', '[data-modal-toggle]', function (e) {
    e.preventDefault();

    var name = $(this).attr('data-modal-toggle');
    var selector = '[data-modal="' + name + '"]';
    var currentModal = $(selector);

    if (currentModal.hasClass('_open')) {
      $(this).removeClass('_open');
      close(currentModal);
    } else {
      $(this).addClass('_open');
      open(currentModal);
    }
  });

  $body.on('click', '[data-modal], [data-modal-overlay]', function (e) {
    var target = e.target;

    if (target.hasAttribute('data-modal') || target.hasAttribute('data-modal-overlay')) {
      e.preventDefault();
      var modal = $(this).closest('[data-modal]');
      close(modal);
    }
  });

  window.addEventListener('keydown', function (e) {
    if (e.keyCode == 27) {
      close();
    }
  });


//открытие попапа по склику на data-modal-btn
  $body.on('click', '[data-modal-btn]', function (e) {
    if(!this.hasAttribute('data-no-prevent')) e.preventDefault();

    var name = $(this).attr('data-modal-btn');
    var selector = '[data-modal="' + name + '"]';

    open($(selector));
  });

  function open(modal) {
    if(!modal.length) return;
    close();

    var display = modal.attr('data-display') || 'flex';
    modal.css('display', 'none');
    modal.addClass('_open').fadeIn({
      duration: 200,
      start: function () {
        $(this).css({
          display: display
        })
      }
    });

    if(modal[0].hasAttribute('data-stop-scroll')) {
      // document.documentElement.style.overflowY = 'hidden';
    }
  }


  function close(modal) {
    if (!modal || !modal.length) {
      modal = $('._open[data-modal]');
    }

    modal.removeClass('_open').fadeOut(200);
    modal.find('.burger').removeClass('_close');

    document.documentElement.style.overflowY = '';
  }

  openModal = open;
  closeModal = close;

}());

$(document).ready(function(){

  var galleryMain = $(".bxslider").owlCarousel({
    items: 1,
    dots: false,
    loop: true,
    nav: true,
    video:true,
    videoWidth: 277, // Default false; Type: Boolean/Number
    videoHeight: 277, // Default false; Type: Boolean/Number
    onChange: function (event) {
      var currentIndex = 0;

      if(event.property.name === 'position') {
        var clonesHalfIndex = (event.relatedTarget._clones.length / 2) || 0;
        var currentPosition = event.property.value;
        // var postionsArr = event.relatedTarget._clones.slice(0);
        var indexsArr = [];

        for (var i = 0; i < event.item.count; i++) {
          indexsArr.splice(i, 0, i);
        }

        indexsArr = [...indexsArr.slice(-clonesHalfIndex), ...indexsArr, ...indexsArr.slice(0, clonesHalfIndex)];

        // postionsArr.splice(clonesHalfIndex, 0, indexsArr);
        // console.log('postionsArr', indexsArr[currentPosition], indexsArr, event);
        currentIndex = indexsArr[currentPosition]
        // currentIndex = event.item.index - clonesHalfIndex;
      }

      // console.log(event.item.index, currentIndex, event);

      // console.log(current, event.item.index - 2, 'event', event);
      // console.log('event.property.value, event.relatedTarget._current',event,  event.property.value, event.relatedTarget._current);
      // var index = typeof event.property.value === "number" ? event.property.value : 0;
      $('.prod-gallery .thumb___1midQ').removeClass('active___2pKVy').eq(currentIndex).addClass('active___2pKVy');
    }
  });

  $('.prod-gallery .prod-gallery__prev-slide-link').on('click', function (e) {
    e.preventDefault();

    var index = parseFloat($(this).attr('data-slide-index')) || 0;
    galleryMain.trigger('to.owl.carousel', [index, 300]);
  });

  var $mainGalleryBlock = $('.prod-gallery__main-gallery-carousel');

  $mainGalleryBlock.on('click', '.prod-gallery__main-slide', function (e) {
    e.preventDefault();

    var imgs = $mainGalleryBlock.attr('data-slides');

    if(!imgs) return;

    imgs = JSON.parse(imgs);

    if(!Array.isArray(imgs)) return;

    imgs = imgs.map(function (img) {
      return {
        src: img
      }
    });

    var index = parseFloat($(this).attr('data-slide-index')) || 0;

    $.fancybox.open(imgs, {
      backFocus: false,
      loop : true
    }, index);
  });
});


$('.shops-item__details-links-wrap a').click(function (e) {
  var targetShop = $(e.target).closest('.shops-item');
  var modal = $('[data-modal="delivery-details"]');

  var titleText = targetShop.find('.shops-item__title').text();
  modal.find('.delivery-details__img')
    .attr('src', targetShop.closest('.row___56-KP').find('.content___3JFLv img').attr('src'))
    .attr('alt', titleText);

  modal.find('.delivery-details__title').text(titleText);
  modal.find('.delivery-details__price').text(targetShop.find('.shops-item__price').text());
  modal.find('.delivery-details__price-back').text(targetShop.find('.shops-item__price-back').text());
  modal.find('.delivery-details__shop').attr('href', targetShop.find('.button--leadout').attr('href'));
  modal.find('.delivery-details__shop-img').attr('src', targetShop.find('.productOffers-listItemOfferLogoShop').attr('src'))
    .attr('alt', targetShop.find('.productOffers-listItemOfferLogoShop').attr('alt'));
  modal.find('.delivery-details__sub-shop').text(targetShop.find('.productOffers-listItemOfferLogoShop').attr('alt'));
  modal.find('.delivery-details__show-shop-btn').attr('href', targetShop.find('.button--leadout').attr('href'));

  var rating = targetShop.find('.shops-item__rating-wrap');

  modal.find('.delivery-details__rating')
    .attr('href', rating.attr('href'))
    .html(rating.html());

  if(targetShop.data('offer_service') == 'aliexpress') {
    modal.find('.delivery-details__delivery-text').html('loading...');
    var data = targetShop.find('.shops-item__details-links-wrap').data('delivery_attr');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/ajax/post/delivery-options',
      method: 'POST',
      dataType: 'json',
      data: data,
      success: function success(response) {
        modal.find('.delivery-details__delivery-wrap').html(response.html);
      },
      error: function (xhr, status, error) {
        let err = JSON.parse(xhr.responseText);
      },
    });
  }
});


$(document).ready(function () {

  /* CSRF Protection */
  var token = $('meta[name="csrf-token"]').attr('content');
  if (token) {
    $.ajaxSetup({
      headers: {'X-CSRF-TOKEN': token}
    });
  }

  /* Search Left Sidebar : Categories & Sub-categories */
  $('#subCatsList h5 a').click(function()
  {
    $('#subCatsList').hide();
    $('#catsList').show();
    return false;
  });

  // /* Save the Post */
  $('.make-favorite').click(function() {
    savePost(this);
    if($('.make-favorite > i').hasClass('full')){
      $('.make-favorite > i').removeClass('full');
    }else{
      $('.make-favorite > i').addClass('full');
    }
  });

  //
  // /* Product*/
  //
  var field_option_set = {}, product_id = '';

  if($('.product-card-attributes .selected___1QFWZ, .product-card-attributes .selected___GvdwT').length > 0) {
    $('.product-card-attributes .selected___1QFWZ, .product-card-attributes .selected___GvdwT').each(function(){
      field_option_set[$(this).data('sku_option')] = $(this).data('product_field_option_id');
      selected_custom_fields.push($(this).data('cfieldk'));
    });
  }

  $(document).on('click tap', '.product-card-attributes .with-picture-attribute', function (e) {
    e.preventDefault();
    let target = $(e.target);
    let closest = $(target.closest('.item___3x9Ra'));
    let closestAll = $(closest.closest('#customFields'));
    let value = target.data('formatted');
    closest.find('.post-attribute-name').text(value);
    let img = target.data('img');
    let cfieldk = target.data('cfieldk');
    // if(closest.find('#sku_attr').length === 1) {
    //   return false;
    // }
    if(target.hasClass('selected___GvdwT')) {
      closest.find('.selected___GvdwT').removeClass('selected___GvdwT');
      delete field_option_set[target.data('sku_option')];
      if(selected_custom_fields.includes(cfieldk)){
        delete selected_custom_fields[cfieldk];
      }
    } else {
      closest.find('.selected___GvdwT').removeClass('selected___GvdwT');
      target.addClass('selected___GvdwT');
      field_option_set[target.data('sku_option')] = target.data('product_field_option_id');
      if(!selected_custom_fields.includes(cfieldk)){
        selected_custom_fields.push(cfieldk);
      }
    }

    let product_id = target.data('product_id');
    let picture_id = target.data('picture_id');
    if(picture_id) {
      slideToImage(picture_id);
    }

    now_pid = product_id;
    now_set = field_option_set;

    if($.isEmptyObject(field_option_set)) {
      closestAll.find('.selected___GvdwT').removeClass('selected___GvdwT');
      closestAll.find('.disabledOverlay___1_KGq').remove();
      getDefaultOptionSetPrice(product_id, closestAll);
    } else {
      getFieldOptionSetPrice(product_id, field_option_set, closestAll);
    }

  });

  $(document).on('click tap', '.product-card-attributes .sku-attribute', function (e) {
    e.preventDefault();
    let target = $(e.target);
    let closest = $(target.closest('.item___3x9Ra'));
    let closestAll = $(closest.closest('#customFields'));
    let value = target.data('formatted');
    let cfieldk = target.data('cfieldk');
    let product_id = target.data('product_id');
    // if(closest.find('#sku_attr').length === 1) {
    //   return false;
    // }
    if(target.hasClass('selected___1QFWZ')) {
      closest.find('.selected___1QFWZ').removeClass('selected___1QFWZ');
      delete field_option_set[target.data('sku_option')];
      // TODO: ???
      if(selected_custom_fields.includes(cfieldk)){
        delete selected_custom_fields[cfieldk];
      }
    } else {
      closest.find('.selected___1QFWZ').removeClass('selected___1QFWZ');
      target.addClass('selected___1QFWZ');
      field_option_set[target.data('sku_option')] = target.data('product_field_option_id');
      // TODO: ???
      if(!selected_custom_fields.includes(cfieldk)){
        selected_custom_fields.push(cfieldk);
      }
    }
    // TODO: ???
    now_pid = product_id;
    now_set = field_option_set;
    // END TODO
    if($.isEmptyObject(field_option_set)) {
      closestAll.find('.selected___1QFWZ').removeClass('selected___1QFWZ');
      closestAll.find('.disabledOverlay___1_KGq').remove();
      getDefaultOptionSetPrice(product_id);
    } else {
      getFieldOptionSetPrice(product_id, field_option_set, closestAll);
    }

  });

  function slideToImage(image_id){
    $('.prod-gallery__main-gallery-carousel').trigger('to.owl.carousel', $('.imageId' + image_id).data('slide-index'), [300]);
  }


  function getDefaultOptionSetPrice(product_id) {
    $.ajax({
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: siteUrl + '/products/'+product_id+'/getDefaultOptionSetPrice',
      data: {
      }
    }).done(function(data) {
      if(data.html && data.html.length !== 0) {
        $('.showcase__buy-block').html(data.html);
      }
      setAddToCartEvents();
    });
  }

  function getFieldOptionSetPrice(product_id, field_option_set, optionsContainer) {
    let item_count = $('#customFields').data('item_count');
    let selected_count = 0;
    $.each(field_option_set, function(key, val) { selected_count+=1; } );
    if(item_count === selected_count) {
      $.ajax({
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: siteUrl + '/products/'+product_id+'/field_option_set_price',
        data: {
          'field_option_set': field_option_set,
          'product_count': product_count
        }
      })
        // .beforeSend(function () {
        //   optionsContainer.find('#sku_attr').attr('disabled', true);
        // })
        .done(function(data) {
        if(data.html && data.html.length !== 0) {
          $('.showcase__buy-block').html(data.html);
        }
        setAddToCartEvents();
      });
    } else  {
      $.ajax({
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: siteUrl + '/products/'+product_id+'/field_option_set_prices',
        data: {
          'field_option_set': field_option_set,
          'product_count': product_count
        }
      }).done(function(data) {
        if(data.html && data.html.length !== 0) {
          $('.product-card-attributes').html(data.html);
        }
        setAddToCartEvents();
      });
    }
  }

  // /* Save the Search */
  // $('#saveSearch').click(function() {
  //     saveSearch(this);
  // });

  $(".selectWrapper__language").on("click tap", function () {
    $('.select_language').toggle();
    $('.select_language .menu_pos_transform').css('transform', 'translate3d(' + ( $(".selectWrapper__language").offset().left - $('.select_language .menu').width()/2.5 )  + 'px, 34px, 0px)');
  });
  $(".selectWrapper__currency").on("click tap", function () {
    $('.select_currency').toggle();
    $('.select_currency .menu_pos_transform').css('transform', 'translate3d(' + ( $(".selectWrapper__currency").offset().left - $('.select_currency .menu').width()/2.5 )  + 'px, 34px, 0px)');
  });

  $("body").on("click tap", '.contextMenu__overlay', function () {
    $('.contextMenu, .category__children_popup').hide();
    $('body').css("overflow","");
  });

  // mobile popups
  $(".select__language-button-mobile").on("click tap", function (e) {
    let target = $(e.target);
    $('.select__language-popup-mobile').toggle();
    $('.select__language-popup-mobile .transform-container').css('transform', 'translate3d(15px, ' + (target.offset().top - target.height() * 3.20) + 'px, 0px)');
  });
  $("body").on("click tap", '.select__language-popup-mobile .overlay', function () {
    $('.select__language-popup-mobile').hide();
  });

  $(".select__currency-button-mobile").on("click tap", function (e) {
    let target = $(e.target);
    $('.select__currency-popup-mobile').toggle();
    $('.select__currency-popup-mobile .transform-container').css('transform', 'translate3d(114px, ' + (target.offset().top - target.height() * 4.30) + 'px, 0px)');
  });
  $("body").on("click tap", '.select__currency-popup-mobile .overlay', function () {
    $('.select__currency-popup-mobile').hide();
  });

  $("body").on("click tap", '.notice-popup .action_close, .notice-popup .overlay', function () {
    $('.notice-popup').hide();
  });


  $('.all-categories').on("click tap", function (){
    // $('.category__children_popup').toggle();
    $.ajax({
      method: 'GET',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: siteUrl + '/ajax/show_all_categories'
    }).done(function(data) {
      if(data.html && data.html.length !== 0) {
        $('.menu__header').append(data.html);
      }
    });
  });

  $('.burger__menu').on("click tap", function (e){
    $('.sign-mobile-menu').show();
    $('body').css("overflow","hidden");
  });

  $('.close-mobile-menu').on("click tap", function (e){
    $('.sign-mobile-menu').hide();
    $('body').css("overflow","");
  });

  $('.searchIconOpen___2264C').on('click tap', function (e) {
    $('.header___3bMN6').addClass('searchMode___3theW');
    $('.searchIconOpen___2264C').hide();
    $('.searchIconClose___2IMez').show();
  });

  $('.searchIconClose___2IMez').on('click tap', function (e) {
    $('.searchIconOpen___2264C').show();
    $('.searchIconClose___2IMez').hide();
    $('.header___3bMN6').removeClass('searchMode___3theW');
  });



  $('body').on('click', '[data-tab-btn]', function (e) {
    //если это не радиобаттон, отменяем стандартное событие
    !$(this).is('input[type="radio"]') ? e.preventDefault() : null;
    if ($(this).hasClass('_open')) return;

    var tabsGroup = $(this).closest('[data-tabs-wrap]');
    var tabName = $(this).attr('data-tab-btn') || '';

    var tabBlock;

    if(tabName === 'all') {
      tabBlock = tabsGroup.find('[data-tab-block]').fadeIn();
			tabBlock.addClass('_open');
			tabsGroup.find('._open[data-tab-btn]').removeClass('_open');
			$(this).addClass('_open');
			return;
    }

    tabBlock = tabsGroup.find('[data-tab-block="' + tabName + '"]');

    if (!tabBlock.length) return;

    tabsGroup.find('._open[data-tab-btn]').removeClass('_open');
    tabsGroup.find('._open[data-tab-block]').removeClass('_open').hide();

    tabBlock.addClass('_open').fadeIn();
    $(this).addClass('_open');
  });


});

//
// /**
//  * Save Ad
//  * @param elmt
//  * @returns {boolean}
//  */
function savePost(elmt)
{
  var postId = $(elmt).data('id');
  $.ajax({
    method: 'POST',
    url: siteUrl + '/ajax/save/post',
    data: {
      'postId': postId,
      '_token': $('input[name=_token]').val()
    }
  }).done(function(data) {
    if (typeof data.logged == "undefined") {
      return false;
    }

    /* Logged Users - Notification */
    if (data.status == 1) {
      if($('html').attr('lang') === 'de') {
        Swal.fire(
          'Sie haben unseren Newsletter abonniert.',
          "Wir werden Sie sofort informieren, wenn sich der Preis ändert.",
          'success'
        );
      } else {
        Swal.fire(
          'You have subscribed to our newsletter.',
          "We will inform you immediately if the price changes.",
          'success'
        );
      }
    } else {
      if($('html').attr('lang') === 'de') {
        Swal.fire(
          'Sie haben unseren Newsletter abbestellt.',
          'Sie erhalten keine Informationen mehr über die Preisänderung dieses Produkts',
          'success'
        );
      } else {
        Swal.fire(
          'You have unsubscribed to our newsletter.',
          'You will no longer be sent information on the change in the price of this product',
          'success'
        );

      }
    }

    return false;
  });

  return false;
}
