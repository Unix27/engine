jQuery(document).ready(function () {
  let qLayer = '#authorization_layer';
  //headers
  let qHeads = ['qHeadWelcome', 'qHeadEmail', 'qHeadRegister', 'qHeadForgot', 'qHeadSepa', 'qHeadResetPassword', 'qHeadAcceptDisclaimer', 'qHeadAuthMain', 'qHeadResetPassword'];
  //// значения повторятся не должны
  let qHeadWelcome = '#authorization_layer .authorizati' +
    '' +
    'on_header_authorization';
  let qHeadEmail = '#authorization_layer .authorization_header_email';
  let qHeadRegister = '#authorization_layer .authorization_header_register';
  let qHeadForgot = '#authorization_layer .authorization_header_forgot';
  let qHeadSepa = '#authorization_layer .authorization_header_sepa';
  let qHeadResetPassword = '#authorization_layer .authorization_header_reset_password';
  let qHeadAcceptDisclaimer = '#authorization_layer .authorization_header_accept_disclaimer';
  let qHeadAuthMain = '#authorization_layer .authorization_header_auth_main';
  //inners
  let qInners = ['qInnerWelcome', 'qInnerEmail', 'qInnerRegister', 'qInnerForgot', 'qInnerSepa', 'qInnerResetPassword', 'qInnerAcceptDisclaimer', 'qInnerAccept', 'qInnerAuthMain'];
  //// значения повторятся не должны
  let qInnerWelcome = '#authorization_inner_welcome';
  let qInnerEmail = '#authorization_inner_email';
  let qInnerRegister = '#authorization_inner_register';
  let qInnerForgot = '#authorization_inner_forgot';
  let qInnerSepa = '#authorization_inner_sepa';
  let qInnerResetPassword = '#authorization_inner_reset_password';
  let qInnerAcceptDisclaimer = '#authorization_inner_accept_disclaimer';
  let qInnerAccept = '#authorization_inner_accept';
  let qInnerAuthMain = '#authorization_inner_auth_main';

  let qBack = '#authorization_layer .back';

  let back = function () {
    let current = '';
    if (window.authPopup.stack.length >= 0) {
      current = window.authPopup.stack.pop();
    }
    const prev = window.authPopup.stack.length > 0 ? window.authPopup.stack[window.authPopup.stack.length - 1] : '';
    if (current.length > 0 && current == prev) {
      return back();
    }
    if (prev.length > 0) {
      window.authPopup.stack.pop();
      eval(prev + '();');
    } else {
      main();
    }
    return false;
  };
  let close = function () {
    jQuery('#authorization_layer').css('display', 'none');
    jQuery('.sidebar___3X-DF').css('display', 'auto');
    window.removeEventListener('keydown', onKeyUpHandle);
    return false;
  };
  let _show = function (type, name) {
    let qName = type + name.substr(0, 1).toUpperCase() + name.substr(1);
    for (let i = 0; i < eval(type + 's.length'); i++) {
      let inner = eval(type + 's[i]');
      if (inner === qName) {
        jQuery(eval(inner)).css('display', '');
      } else {
        jQuery(eval(inner)).css('display', 'none');
      }
    }
  };
  let show = function (name) {
    jQuery(qLayer).css('display', 'block');
    _show('qInner', name);
    _show('qHead', name);
    window.addEventListener('keydown', onKeyUpHandle);
  };

  let main = function (ev) {

    window.authPopup.stack.push('main');
    show('authMain');
    //back
    jQuery(qBack).css('display', 'none');
    return false;
  };
  let register = function () {
    window.authPopup.stack.push('register');
    show('register');
    //back
    jQuery(qBack).css('display', '');
    return false;
  };
  let email = function () {
    window.authPopup.stack.push('email');
    show('email');
    jQuery(qBack).css('display', '');
    return false;
  };
  let forgot = function () {
    window.authPopup.stack.push('forgot');
    show('forgot');
    jQuery(qBack).css('display', '');
    return false;
  };
  let sepa = function () {
    window.authPopup.stack.push('sepa');
    show('sepa');
    return false;
  };
  let resetPassword = function () {
    window.authPopup.stack.push('resetPassword');
    show('resetPassword');
    return false;
  };
  let acceptDisclaimer = function () {
    window.authPopup.stack.push('acceptDisclaimer');
    show('acceptDisclaimer');
    return false;
  };
  let emailAccept = function () {
    window.authPopup.stack.push('accept');
    show('accept');
    jQuery(qBack).css('display', '');
    return false;
  };



  jQuery('#authorization_icon, .need_auth').on('click tap', main);
  jQuery('#authorization_close').on('click tap', close);
  jQuery('#authorization_layer .authorization_to_email').on('click tap', email);
  jQuery('#authorization_layer .authorization_register').on('click tap', register);
  jQuery('#authorization_layer .authorization_forgot_btn').on('click tap', forgot);
  jQuery('#authorization_layer .close-btn').on('click tap', close);
  jQuery(qBack).on('click', back);

  jQuery(document).on('click tap', '[data-auth-btn-forgot]', forgot);

  window.authPopup = {};
  window.authPopup.stack = [];
  window.authPopup.registration = register;
  window.showPopup = show;

  // main();

  $(qLayer).click(function (e) {
    if(!$(e.target).closest('.inner___3uuBN').length) {
      close();
    }
  });

  function onKeyUpHandle (e) {
    if (e.keyCode === 27) {
      close();
    }
  }


  // - - VALIDATION - -


  $.validator.addMethod("regex", function (value, element) {
    let regex = $(element).attr('data-regex');
    if (!regex) return true;

    regex = new RegExp(regex);
    return this.optional(element) || regex.test(value);
  });

  $.validator.addMethod("custom", function (value, element, result) {
    return result;
  }, 'Validation error');

  $.validator.addMethod("same", function (value, element, result) {
    return value === result;
  }, 'Validation error');


  const validationOptions = {
    submitHandler: function (form) {
      $(form).submit();
    },
    success: function (label, element) {
      $(element).closest('.label').next('.input-error').remove();
    },
    errorPlacement: function (error, element) {
      let $errorEl = $(element).closest('.label').next('.input-error');
      if (!error.text()) {
        return $errorEl.remove();
      }

      if (!$errorEl.length) {
        $errorEl = $('<p class="input-error"></p>');
        element.closest('.label').after($errorEl);
      }
      $errorEl.text(error.text());
    },
    rules: {
      password: {
        required: true,
        regex: true
      },
      password_confirmation: {
        required: true,
        same: function (input) {
          return $(input).closest('form').find('input[name="password"]').val();
        }
      }
    }
  };

  // - - VALIDATION REGISTRATION - -

  // const $registerForm = $('#authorization_inner_register .auth-form');
  // const $loginForm = $('#authorization_inner_email .auth-form');
  const $registerForm = $('#authorization_inner_auth_main-registration');
  const $loginForm = $('#authorization_inner_auth_main-login');
  const $forgotForm = $('#authorization_inner_forgot .auth-form');
  const $resetForm = $('#authorization_inner_reset_password .auth-form');
  const $regForm = $('#authorization_page_register');

  const registerOptions = Object.assign({}, validationOptions, {
    submitHandler: function (form) {
      const _self = this;

      $loginForm.find('.input-error._general').remove();

      $.ajax({
        method: "POST",
        url: $('html').attr('lang') === 'de' ? "/register" : '/' + $('html').attr('lang') + "/register",
        data: getFields(form)
      })
        .done(function (data) {
          if(data.next_url) {
            location = data.next_url
          }
        })
        .fail(function (response) {
          if(response.responseJSON.data) {
            _self.showErrors(response.responseJSON.data);
          }

          if(response.responseJSON.errors) {
            $loginForm.find('.submit___adX-b').before($(`<p class="input-error _test">${response.responseJSON.errors.error}</p>`))
          }
        })
    },
  });

  const loginOptions = Object.assign({}, validationOptions, {
    submitHandler: function (form) {
      const _self = this;

      $loginForm.find('.input-error._general').remove();

      $.ajax({
        method: "POST",
        url: "/login",
        data: getFields(form)
      })
        .done(function (data) {
          if(data.status === 200) {
            if(data.next_url) {
              location = data.next_url
            }
          } else {
            if(data.message) $loginForm.find('.submit___adX-a').before($(`<p class="input-error  _general">${data.message}</p>`))
          }
        })
        .fail(function (response) {
          if(response.responseJSON.data) {
            _self.showErrors(response.responseJSON.data);
          }

          if(response.responseJSON.errors) {
            $loginForm.find('.submit___adX-a').before($(`<p class="input-error  _general">${response.responseJSON.errors.error}</p>`))
          }
        })
    },
  });

  const forgotOptions = Object.assign({}, validationOptions, {
    submitHandler: function (form) {
      const _self = this;

      $loginForm.find('.input-error._general').remove();

      $.ajax({
        method: "POST",
        url: "/password/email",
        data: getFields(form)
      })
        .done(function (data) {
          if(data.status === 200) {
            emailAccept()
          } else {
            if(data.message) $loginForm.find('.submit___adX-a').before($(`<p class="input-error  _general">${data.message}</p>`))
          }
        })
        .fail(function (response) {
          console.log(response.responseJSON.data, response.responseJSON.errors);
          if(response.responseJSON.data) {
            _self.showErrors(response.responseJSON.data);
          }
          if(response.responseJSON.errors) {
            $('.auth-form').find('.fieldsWrapper___zSdsE').before($(`<p class="input-error  _general">${response.responseJSON.errors.email}</p>`))
          }
          if(response.responseJSON.message) {
            if($('html').attr('lang') === 'de') {
              $('.auth-form').find('.fieldsWrapper___zSdsE').before($(`<p class="input-error  _general">Es konnte leider kein Nutzer mit dieser E-Mail-Adresse gefunden werden.</p>`))
            } else {
              $('.auth-form').find('.fieldsWrapper___zSdsE').before($(`<p class="input-error  _general">These credentials do not match our records.</p>`))
            }
          }
        })
    },
  });

  const resetOptions = Object.assign({}, validationOptions, {
    submitHandler: function (form) {
      const _self = this;

      $loginForm.find('.input-error._general').remove();

      $.ajax({
        method: "POST",
        url: "/password/reset",
        data: getFields(form)
      })
        .done(function (data) {
          if(data.next_url) {
            location = data.next_url
          } else {
            if(data.message) $loginForm.find('.submit___adX-a').before($(`<p class="input-error  _general">${data.message}</p>`))
          }
        })
        .fail(function (response) {
          if(response.responseJSON.data) {
            _self.showErrors(response.responseJSON.data);
          }

          if(response.responseJSON.errors) {
            $loginForm.find('.submit___adX-a').before($(`<p class="input-error  _general">${response.responseJSON.errors.error}</p>`))
          }
        })
    },
  });

  const regOptions = Object.assign({}, validationOptions, {
    submitHandler: function (form) {
      const _self = this;

      $loginForm.find('.input-error._general').remove();

      $.ajax({
        method: "POST",
        url: "/register",
        data: getFields(form)
      })
          .done(function (data) {
            if(data.next_url) {
              location = data.next_url
            }
          })
          .fail(function (response) {
            if(response.responseJSON.data) {
              _self.showErrors(response.responseJSON.data);
            }

            if(response.responseJSON.errors) {
              $loginForm.find('.submit___adX-a').before($(`<p class="input-error _test">${response.responseJSON.errors.error}</p>`))
            }
          })
    },
  });

  $registerForm.validate(registerOptions);
  $loginForm.validate(loginOptions);
  $forgotForm.validate(forgotOptions);
  $resetForm.validate(resetOptions);
  $regForm.validate(regOptions);


  function getFields(form) {
    return $(form).serializeArray().reduce(function(obj, item) {
      obj[item.name] = item.value;
      return obj;
    }, {});
  }

});
