/*
    UNF JQuery validation
    Dependencies: 
        - jquery 1.11.2
        - jquery.validate 1.14.0
        - bootstrap 3.3.4 (only CSS)
 */
(function ($) {

    //--------------------------------------------//
    //----------- Global static values -----------//
    //--------------------------------------------//
    var htmlGlyphiconValid = $('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>');

    var htmlGlyphiconInvalid = $('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');

    var forbiddenAreaCodes = ["019", "0800", "0900", "00", "032"];



    $.fn.unfvalidate = function (options) {
      
        //--------------------------------------------//
        //---  Jquery Validator extension methods  ---//
        //--------------------------------------------//

        jQuery.validator.addMethod("nonNumeric", function (value, element) {
            var reg = /[0-9]/;
            return this.optional(element) || !reg.test(value);
        }, "Only alphabatic characters allowed.");

        jQuery.validator.addMethod("phoneNumber", function (value, element) {
            var isForbidden = false;
            $.each(forbiddenAreaCodes, function(idx, code){
                if(!isForbidden)
                    isForbidden = value.slice(0, code.length) == code;
            });
            return this.optional(element) || !isForbidden;
        }, "Only alphabatic characters allowed.");

        jQuery.validator.addMethod("valueNotDefault", function(value, element, param) {
          var def = param !== true ? param : "0";
          return this.optional(element) || $(element).find('option:selected').val() !== def;
        }, "Please choose a value!");

        //--------------------------------------------//
        //------------  Default settings  ------------//
        //--------------------------------------------//
        var settings = $.extend({
            ignore: "",
            rules: {},
            messages: {},
            errorClass: 'text-danger error-label',
            highlight: function (element, errorClass, validClass) {
                var $element = $(element);
                var $parent = $element.closest('.form-group');
                $parent.removeClass("has-success has-feedback")
                       .addClass("has-error has-feedback")
                       .find('label.text-danger, .glyphicon, .help-block').remove();
                if(!$element.is('select')){
                  htmlGlyphiconInvalid.clone().insertBefore($element); 
                }
            },
            unhighlight: function (element, errorClass, validClass) {
                var $element = $(element);
                var $parent = $element.closest('.form-group');
                $parent.removeClass("has-error has-feedback")
                       .addClass("has-success has-feedback")
                       .find('label.text-danger, .glyphicon, .help-block').remove();
                if(!$element.is('select')){
                  htmlGlyphiconValid.clone().insertBefore($element);
                }
            }

        }, options);

        return this.validate({
            ignore: settings.ignore,
            rules: settings.rules,
            messages: settings.messages,
            errorClass: settings.errorClass,
            highlight: settings.highlight,
            unhighlight: settings.unhighlight,
            submitHandler: settings.submitHandler
        });
    };


    var replaceFullWidthChars = function(str) {
        var chars, chr, fullWidth, halfWidth, idx, value, _i, _len;
        if (str == null) {
          str = '';
        }
        fullWidth = '\uff10\uff11\uff12\uff13\uff14\uff15\uff16\uff17\uff18\uff19';
        halfWidth = '0123456789';
        value = '';
        chars = str.split('');
        for (_i = 0, _len = chars.length; _i < _len; _i++) {
          chr = chars[_i];
          idx = fullWidth.indexOf(chr);
          if (idx > -1) {
            chr = halfWidth[idx];
          }
          value += chr;
        }
        return value;
    };

    var safeVal = function(value, $target) {
        var cursor, error, last;
        try {
          cursor = $target.prop('selectionStart');
        } catch (_error) {
          error = _error;
          cursor = null;
        }
        last = $target.val();
        $target.val(value);
        if (cursor !== null && $target.is(":focus")) {
          if (cursor === last.length) {
            cursor = value.length;
          }
          $target.prop('selectionStart', cursor);
          return $target.prop('selectionEnd', cursor);
        }
    };

    var onlyNonNumeric = function(e) {
        var input;
        if (e.metaKey || e.ctrlKey) {
          return true;
        }
        /*
        Makes textbox decline spacebars
        if (e.which === 32) {
          return false;
        }
        */
        if (e.which === 0) {
          return true;
        }
        if (e.which < 33) {
          return true;
        }
        input = String.fromCharCode(e.which);
        return /[\D]/.test(input);
    };

    var reFormatNoNumeric = function(e){

        return setTimeout(function() {
          var $target, value;
          $target = $(e.currentTarget);
          value = $target.val();
          value = replaceFullWidthChars(value);
          value = value.replace(/\d/g, '');
          return safeVal(value, $target);
        });
    };

    $.fn.unfnoNumeric = function(){
        this.on('keypress', onlyNonNumeric);
        this.on('paste', reFormatNoNumeric);
        this.on('change', reFormatNoNumeric);
        this.on('input', reFormatNoNumeric);
    };

}(jQuery));