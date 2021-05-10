/**
 * Redirect URL
 * @param url
 */
function redirect(url) {
  window.location.replace(url);
  window.location.href = url;
}

$('#parserWizardBtn').click(function (e) {
  e.preventDefault();

  $(document).off('click', '.wizard-apply-button');

  Swal.mixin({
    input: 'text',
    confirmButtonText: 'Next &rarr;',
    showCancelButton: true,
    allowOutsideClick: false,
    progressSteps: ['1', '2']
  }).queue([
    {
      title: 'Step 1',
      text: 'Enter Ad URL',
      input: 'text',
      showLoaderOnConfirm: true,
      preConfirm: (url) => {
        let productUrl = url;
        let postId = $('#parserWizardBtn').data('post-id');

        return fetch(document.location.origin + `/api/wizard/parse`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            url: url
          }),
        }).then(async response => {
          if (!response.ok) {
            let err = await response.json();

            if (err.message) {
              throw new Error(err.message);
            }

            throw new Error(response.statusText);
          }

          return response.json();
        }).then(data => {
          let parserData = data;

          return fetch(document.location.origin + '/api/wizard/show', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify({
              post_id: postId, // ToDo: add post id
              product_name: data.current_product_name,
              product_description: data.current_product_description,
              product_images: data.current_product_images,
              service_product_id: data.service_product_id,
              price: data.current_price,
              approximately_price: data.approximately_price,
              currency: data.current_currency,
              service: data.service,
              url: productUrl
            }),
          }).then(async response => {
            if (!response.ok) {
              let err = await response.json();

              if (err.message) {
                throw new Error(err.message);
              }

              throw new Error(response.statusText);
            }

            return response.json();
          }).then(data => {
            Swal.insertQueueStep({
              title: 'Step 2',
              showConfirmButton: true,
              confirmButtonText: '<span class="wizard-apply-button">Apply</span>',
              input: null,
              html: data.html,
              width: '800px',
              maxHeight: '80vh',
              overflowY: 'auto',
              preConfirm: function() {
                Swal.showLoading();

                fetch(document.location.origin + '/api/wizard/update', {
                  method: 'POST',
                  headers: {
                    'Content-Type': 'application/json',
                  },
                  body: JSON.stringify({
                    post_id: postId,
                    price: parserData.current_price,
                    approximately_price: parserData.approximately_price,
                    currency: parserData.current_currency,
                    service: parserData.service,
                    service_product_id: parserData.service_product_id,
                    url: productUrl
                  }),
                }).then(async response => {
                  if (!response.ok) {
                    let err = await response.json();

                    if (err.message) {
                      throw new Error(err.message);
                    }

                    throw new Error(response.statusText);
                  }
                });
              }
            });
          });
        }).catch(error => {
          Swal.showValidationMessage(
            `Request failed: ${error}`
          )
        });
      },
    },
  ]);
});

$('#postEditListWizardBtn .dropdown-menu li a').click(function (e) {
  e.preventDefault();
  let targetService = $(e.target).data('value');
  let post_id = $(e.target).data('post_id');
  $(document).off('click', '.wizard-apply-button');

  Swal.mixin({
    input: 'text',
    confirmButtonText: 'Next &rarr;',
    showCancelButton: true,
    allowOutsideClick: false,
    progressSteps: ['1', '2']
  }).queue([
    {
      title: 'Step 1',
      text: 'Enter ' + targetService.toUpperCase() +' URL',
      input: 'text',
      showLoaderOnConfirm: true,
      preConfirm: (url) => {
        return fetch(document.location.origin + `/api/wizard/parse`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            url: url,
            repository: targetService,
            post_id: post_id
          }),
        }).then(response => {
          if (!response.ok) {
            throw new Error(response.statusText)
          }
          return response.json();
        }).then(response => {
          let product = response.product;
          Swal.insertQueueStep({
            title: 'Step 2',
            input: null,
            html: response.html,
            width: '800px',
            preConfirm: function() {
              return new Promise((resolve, reject) => {
                resolve({
                  post_id: post_id,
                  url: url,
                  title: $('#wizard-preview input[name="title"]').val(),
                  description: $('#wizard-preview textarea[name="description"]').val(),
                  repository: targetService,
                });
              });
            }
          });
        }).catch(error => {
          Swal.showValidationMessage(
            `Request failed: ${error}`
          )
        });
      },
    }
  ]).then((result) => {
    if (result.value) {
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/api/wizard/create',
        method: 'POST',
        dataType: 'json',
        data: result.value[1],
        success: function success(response) {
          Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
          );
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
    }
  });
});
