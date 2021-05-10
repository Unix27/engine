$('#subCatsList h5 a').click(function()
{
  $('#subCatsList').hide();
  $('#catsList').show();
  return false;
});

$('.make-favorite').click(function() {
  savePost(this);
});

$(".selectWrapper__language").on("click tap", function () {
  $('.select_language').toggle();
});

$(".selectWrapper__currency").on("click tap", function () {
  $('.select_currency').toggle();
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

// /**
//  * Save Ad
//  * @param elmt
//  * @returns {boolean}
//  */
function savePost(elmt)
{
  var postId = $(elmt).attr('id');

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

    /* Guest Users - Need to Log In */
    // if (data.logged == '0') {
    //   $('#quickLogin').modal();
    //     return false;
    //   }

    /* Logged Users - Notification */
    if (data.status == 1) {
      // // console.log(data.status);
      //   if ($(elmt).hasClass('btn')) {
      //       $('#' + data.postId).removeClass('btn-default').addClass('btn-success');
      //   } else {
      //       $(elmt).html('<i class="fa fa-heart tooltipHere" data-toggle="tooltip" data-original-title="' + lang.labelSavePostRemove + '"></i>');
      //   }
      $(elmt).find('.inner___25Ou-').attr('y', 0);
      // openModal($('[data-modal="add-to-favorites-success"]'));
    } else {
      // if ($(elmt).hasClass('btn')) {
      //     $('#' + data.postId).removeClass('btn-success').addClass('btn-default');
      // } else {
      //     $(elmt).html('<i class="far fa-heart tooltipHere" data-toggle="tooltip" data-original-title="' + lang.labelSavePostSave + '"></i>');
      // }
      $(elmt).find('.inner___25Ou-').attr('y', 30);
      // openModal($('[data-modal="remove-from-favorites-success"]'));
    }

    return false;
  });

  return false;
}
