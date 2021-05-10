@section('after_styles')
    <link href="{{ url('css/quiz-custom.css') . getPictureVersion() }}" rel="stylesheet">
@endsection




@section('after_scripts')
    <script>

        Swal.fire(
            {
                icon: 'info',
                title: 'Erfahren Sie, wie Sie bei Online-Einkäufen bis zu 80% sparen können\n',
                confirmButtonText: 'Ja! Ich will sparen!\n',
                confirmButtonClass: 'calc-cta open-calc',
                showCancelButton: false,
                buttonsStyling: false,
                allowOutsideClick: false,
                allowEscapeKey: false,
                heightAuto: false,
                animation: false,
                customClass: {
                    container: 'calc',
                    text: 'calc-podzagolovok',
                },
            }
        );

        $(document).ready(function () {

            $('.open-calc').on('click tap', function(e) {
                let what = [];
                let where = [];
                let send_email;

                Swal.mixin({
                    confirmButtonText: 'Weiter',
                    showCancelButton: false,
                    showCloseButton: false,
                    allowEscapeKey: false,
                    progressSteps: ['1', '2', '3'],
                    showLoaderOnConfirm: true,
                    allowOutsideClick: false,
                    customClass: {
                        container: 'windows-calc',
                        popup: 'white quiz-fields',
                        header: 'header-class',
                        title: 'title-class',
                        closeButton: 'close-button-class',
                        icon: 'icon-class',
                        image: 'image-class',
                        content: 'square',
                        input: 'input-class',
                        actions: 'actions-class',
                        confirmButton: 'btn',
                        cancelButton: 'cancel-button-class',
                        footer: 'footer-class'
                    },
                    onOpen: (target) => {
                        for (var checkbox = target.querySelectorAll(".checkbox"), i = 0; i < checkbox.length; i++) {
                            checkbox[i].onclick = function() {
                                this.classList.toggle("checkbox-activ")
                            };
                        }

                        for (var radioAll = target.querySelectorAll(".radioAll"), _loop = function(e) {
                            for (var t = radioAll[e].querySelectorAll(".radio"), o = function(e) {
                                t[e].onclick = function() {
                                    for (var o = 0; o < t.length; o++)
                                        t[o].classList.remove("radio-activ");
                                    t[e].classList.add("radio-activ")
                                }
                            }, n = 0; n < t.length; n++)
                                o(n)
                        }, i = 0; i < radioAll.length; i++) _loop(i);
                    }
                }).queue([
                    {
                        title: 'Was kaufen Sie am häufigsten online?',
                        html: '<div class="step-1">' +
                            '<label class="variant-item form-field-checkbox-item">' +
                                '<input type="checkbox" class="form-field-checkbox--input" value="closing">' +
                                '<span class="form-field-checkbox--box">' +
                                    '<i></i>' +
                                '</span>' +
                                '<span class="form-field-checkbox--name">\n' +
                                    'Kleidung, Schuhe & Uhren\n' +
                                '</span>' +
                            '</label>' +
                            '<label class="variant-item form-field-checkbox-item">' +
                                '<input type="checkbox" class="form-field-checkbox--input" value="electronic">' +
                                '<span class="form-field-checkbox--box">' +
                                    '<i></i>' +
                                '</span>' +
                                '<span class="form-field-checkbox--name">\n' +
                                    'Elektronik & Computer\n' +
                                '</span>' +
                            '</label>' +
                            '<label class="variant-item form-field-checkbox-item">' +
                                '<input type="checkbox" class="form-field-checkbox--input" value="children">' +
                                '<span class="form-field-checkbox--box">' +
                                    '<i></i>' +
                                '</span>' +
                                '<span class="form-field-checkbox--name">\n' +
                                    'Spielzeug & Baby\n' +
                                '</span>' +
                            '</label>' +
                            '<label class="variant-item form-field-checkbox-item">' +
                                '<input type="checkbox" class="form-field-checkbox--input" value="animals">' +
                                '<span class="form-field-checkbox--box">' +
                                    '<i></i>' +
                                '</span>' +
                                '<span class="form-field-checkbox--name">\n' +
                                    'Haushalt, Garten, Tier & Baumarkt\n' +
                                '</span>' +
                            '</label>' +
                            '<label class="variant-item form-field-checkbox-item">' +
                                '<input type="checkbox" class="form-field-checkbox--input" value="sport">' +
                                '<span class="form-field-checkbox--box">' +
                                    '<i></i>' +
                                '</span>' +
                                '<span class="form-field-checkbox--name">\n' +
                                    'Sport & Freizeit\n' +
                                '</span>' +
                            '</label>' +
                            '<label class="variant-item form-field-checkbox-item">' +
                                '<input type="checkbox" class="form-field-checkbox--input" value="books">' +
                                '<span class="form-field-checkbox--box">' +
                                    '<i></i>' +
                                '</span>' +
                                '<span class="form-field-checkbox--name">\n' +
                                    'Bücher & Audible\n' +
                                '</span>' +
                            '</label>' +
                            '<div>',
                        preConfirm: () => {
                            $.each($("input[type='checkbox']:checked"), function(){
                                what.push($(this).val());
                            });

                            if (what.length === 0) {
                                Swal.showValidationMessage('Bitte treffen Sie Ihre Wahl')
                            }

                            return what;
                        }
                    },
                    {
                        title: 'In welchen online shops kaufen Sie?',
                        html: '' +
                            '<label class="variant-item form-field-checkbox-item">' +
                            '<input type="checkbox" class="form-field-checkbox--input" value="Aliexpress">' +
                            '<span class="form-field-checkbox--box">' +
                            '<i></i>' +
                            '</span>' +
                            '<span class="form-field-checkbox--name">\n' +
                            'Aliexpress\n' +
                            '</span>' +
                            '</label>' +
                            '<label class="variant-item form-field-checkbox-item">' +
                            '<input type="checkbox" class="form-field-checkbox--input" value="Amazon">' +
                            '<span class="form-field-checkbox--box">' +
                            '<i></i>' +
                            '</span>' +
                            '<span class="form-field-checkbox--name">\n' +
                            'Amazon\n' +
                            '</span>' +
                            '</label>' +
                            '<label class="variant-item form-field-checkbox-item">' +
                            '<input type="checkbox" class="form-field-checkbox--input" value="Ebay">' +
                            '<span class="form-field-checkbox--box">' +
                            '<i></i>' +
                            '</span>' +
                            '<span class="form-field-checkbox--name">\n' +
                            'Ebay\n' +
                            '</span>' +
                            '</label>' +
                            '<label class="variant-item form-field-checkbox-item">' +
                            '<input type="checkbox" class="form-field-checkbox--input" value="Otto">' +
                            '<span class="form-field-checkbox--box">' +
                            '<i></i>' +
                            '</span>' +
                            '<span class="form-field-checkbox--name">\n' +
                            'Otto\n' +
                            '</span>' +
                            '</label>' +
                            '<label class="variant-item form-field-checkbox-item">' +
                            '<input type="checkbox" class="form-field-checkbox--input" value="MediaMarket">' +
                            '<span class="form-field-checkbox--box">' +
                            '<i></i>' +
                            '</span>' +
                            '<span class="form-field-checkbox--name">\n' +
                            'MediaMarket\n' +
                            '</span>' +
                            '</label>' +
                            '<label class="variant-item form-field-checkbox-item">' +
                            '<input type="checkbox" class="form-field-checkbox--input" value="Bonprix">' +
                            '<span class="form-field-checkbox--box">' +
                            '<i></i>' +
                            '</span>' +
                            '<span class="form-field-checkbox--name">\n' +
                            'Bonprix\n' +
                            '</span>' +
                            '</label>' +
                            '',
                        preConfirm: () => {
                            $.each($("input[type='checkbox']:checked"), function(){
                                where.push($(this).val());
                            });

                            if (where.length === 0) {
                                Swal.showValidationMessage('Bitte treffen Sie Ihre Wahl')
                            }

                            return where;
                        }
                    },
                    {
                        title: 'Wir haben Rabatte auf Ihre Produkte bis zu 80%, möchten Sie erhalten?',
                        confirmButtonText: 'Jetzt kostenlos registrieren',
                        html: '' +
                            '<div class="radioAll">' +
                            '<p class="radio">\n' +
                            '<input type="radio" value="yes" name="options[]">\n' +
                            'Ja\n' +
                            '</p>' +
                            '<p class="radio">\n' +
                            '<input type="radio" value="no" name="options[]">\n' +
                            'Nein\n' +
                            '</p>' +
                            '</div>' +
                            '',
                        preConfirm: () => {
                            $.each($("input[type='radio']:checked"), function(){
                                send_email = $(this).val();
                            });

                            if (send_email.length === 0) {
                                Swal.showValidationMessage('Bitte treffen Sie Ihre Wahl')
                            }

                            return send_email;
                        }
                    },
                ]).then(() => {
                    Swal.showLoading();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/quizSave',
                        method: 'POST',
                        // dataType: 'json',
                        data: {what: what, where: where, send_email: send_email},
                        success: function success(response) {
                            if(response.length !== 0) {
                                document.location.href = response.link;
                            }
                        },
                        error: function (xhr, status, error) {
                            let err = JSON.parse(xhr.responseText);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: err,
                                footer: '<a href>Why do I have this issue?</a>'
                            });
                        },
                    });
                })
            });

        });

    </script>
@endsection
