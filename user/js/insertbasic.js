$(document).ready(function () {
  //console.log('Tested');
  $('#basicForm').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      url: '../insertFiles/insert_basicForm.php',
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        console.log(data);
        swal({
          title: 'Inserted Successfuly',
          icon: 'success',
          button: 'Next',
        }).then(() => {
          console.log('DONE');
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('txt').innerHTML = this.responseText;
            }
            $('#basicForm').replaceWith($('#txt'));
          };
          xmlhttp.open('GET', '../displayFiles/displayBasic.php', true);
          xmlhttp.send();
        });
      },
      error: function () {},
    });
  });

  // $('#suspectform').on('submit', function (e) {
  //   e.preventDefault();
  //   $.ajax({
  //     url: '../insertFiles/insert_suspectForm.php',
  //     type: 'POST',
  //     data: new FormData(this),
  //     contentType: false,
  //     cache: false,
  //     processData: false,
  //     success: function (data) {
  //       console.log(data);
  //       swal({
  //         title: 'Inserted Successfuly',
  //         icon: 'success',
  //         button: 'Next',
  //       }).then(() => {
  //         var xmlhttp = new XMLHttpRequest();
  //         xmlhttp.onreadystatechange = function () {
  //           if (this.readyState == 4 && this.status == 200) {
  //             document.getElementById('txttwo').innerHTML = this.responseText;
  //           }
  //           $('#suspectFormDiv').replaceWith($('#txttwo'));
  //         };
  //         xmlhttp.open('GET', '../displayFiles/displaySuspect.php', true);
  //         xmlhttp.send();
  //       });
  //     },
  //     error: function () {},
  //   });
  // });

  $('#num_detailform').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      url: '../insertFiles/insertNumber.php',
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        console.log(data);
        swal({
          title: 'Inserted Successfuly',
          icon: 'success',
          button: 'Next',
        }).then(() => {
          console.log('DONE');
        });
      },
      error: function () {},
    });
  });

  $('#cdr_detailform').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      url: '../insertFiles/insertCDR.php',
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        //$('#suspect_no_cdr_details').modal('hide');
        console.log(data);
        swal({
          title: 'Inserted Successfuly',
          icon: 'success',
          button: 'Next',
        }).then(() => {
          console.log('DONE');
        });
      },
      error: function () {},
    });
  });

  $('#ipdr_detailform').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      url: '../insertFiles/insertPDR.php',
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        //$('#suspect_no_cdr_details').modal('hide');
        console.log(data);
        swal({
          title: 'Inserted Successfuly',
          icon: 'success',
          button: 'Next',
        }).then(() => {
          console.log('DONE');
        });
      },
      error: function () {},
    });
  });

  $('#upi_detailform').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      url: '../insertFiles/insertUPI.php',
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        //$('#suspect_no_cdr_details').modal('hide');
        console.log(data);
        swal({
          title: 'Inserted Successfuly',
          icon: 'success',
          button: 'Next',
        }).then(() => {
          console.log('DONE');
        });
      },
      error: function () {},
    });
  });

  $('#acc_detailform').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      url: '../insertFiles/insert_accountForm.php',
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        console.log(data);
        swal({
          title: 'Inserted Successfuly',
          icon: 'success',
          button: 'Next',
        }).then(() => {});
      },
      error: function () {},
    });
  });

  $('#acc_panform').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      url: '../insertFiles/insertPAN.php',
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        //$('#suspect_no_cdr_details').modal('hide');
        console.log(data);
        swal({
          title: 'Inserted Successfuly',
          icon: 'success',
          button: 'Next',
        }).then(() => {
          console.log('DONE');
        });
      },
      error: function () {},
    });
  });

  $('#acc_atmform').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      url: '../insertFiles/insertATM.php',
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        //$('#suspect_no_cdr_details').modal('hide');
        console.log(data);
        swal({
          title: 'Inserted Successfuly',
          icon: 'success',
          button: 'Next',
        }).then(() => {
          console.log('DONE');
        });
      },
      error: function () {},
    });
  });

  $('#acc_iplogform').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      url: '../insertFiles/insertIPLOG.php',
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        //$('#suspect_no_cdr_details').modal('hide');
        console.log(data);
        swal({
          title: 'Inserted Successfuly',
          icon: 'success',
          button: 'Next',
        }).then(() => {
          console.log('DONE');
        });
      },
      error: function () {},
    });
  });

  $('#wallet_detailform').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      url: '../insertFiles/insertEwallet.php',
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        console.log(data);
        swal({
          title: 'Inserted Successfuly',
          icon: 'success',
          button: 'Next',
        }).then(() => {});
      },
      error: function () {},
    });
  });

  $('#website_detailform').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      url: '../insertFiles/insertWEB.php',
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        console.log(data);
        swal({
          title: 'Inserted Successfuly',
          icon: 'success',
          button: 'Next',
        }).then(() => {});
      },
      error: function () {},
    });
  });
});
