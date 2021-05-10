document.addEventListener('DOMContentLoaded', function () {
    $('#run-wheel').on('click', function () {
        if (!$('.wheel-sectors').hasClass('.--spin')) {
            runSpin();
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/noodleRequest',
            method: 'POST',
            data: {action: 'getPresent'},
            success: function (response) {
              setTimeout(function () {
                $('#myModal').modal('show');

                stopSpin();
              },2000);

              if(response.length !== 0){
                $('#btn_reg')[0].href = response.link;
              }
            },
            error: function (xhr, status, error) {
              let err = JSON.parse(xhr.responseText);
            },
          });
        }
    });
});

function runSpin() {
    $('.wheel-sectors').addClass('--spin');
    $('#run-wheel').html('<i class="fa fa-refresh fa-spinner fa-spin"><\/i>');
}

function stopSpin() {
    $('.wheel-sectors').removeClass('--spin');
    $('#run-wheel').html('Мне повезёт');

    $('#wheel_btn').html('<br>\n' +
        '<div class="color-blue">\n' +
        'Entschuldigung, Sie haben Ihren Versuch bereits erschöpft.\n' +
        '</div>');
}