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
          xmlhttp.open('GET', '../displayFiles/display.php?basicform= "1"', true);
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
          document.getElementById("num_detailform").reset();
          $("#btn_addcdr").prop('disabled', false);
          $("#btn_addipdr").prop('disabled', false);
          $("#btn_addupi").prop('disabled', false);
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('txt2').innerHTML = this.responseText;
            }
            $('#suspect_num_table_main').replaceWith($('#txt2'));
          };
          xmlhttp.open('GET', '../displayFiles/display.php?numdetailform="1"',true);
          xmlhttp.send();
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
        console.log(data);
        swal({
          title: 'Inserted Successfuly',
          icon: 'success',
          button: 'Next',
        }).then(() => {
          console.log('DONE');
          document.getElementById("cdr_detailform").reset();
          $('#suspect_no_cdr_details').modal('hide');
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('txt3').innerHTML = this.responseText;
            }
            $('#suspect_num_table_cdr').replaceWith($('#txt3'));
          };
          xmlhttp.open('GET', '../displayFiles/display.php?cdrdetailform="1"',true);
          xmlhttp.send();
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
        console.log(data);
        swal({
          title: 'Inserted Successfuly',
          icon: 'success',
          button: 'Next',
        }).then(() => {
          console.log('DONE');
          document.getElementById("ipdr_detailform").reset();
          $('#suspect_no_ipdr_details').modal('hide');
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('txt4').innerHTML = this.responseText;
            }
            $('#suspect_num_table_ipdr').replaceWith($('#txt4'));
          };
          xmlhttp.open('GET', '../displayFiles/display.php?ipdrdetailform="1"',true);
          xmlhttp.send();
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
        console.log(data);
        swal({
          title: 'Inserted Successfuly',
          icon: 'success',
          button: 'Next',
        }).then(() => {
          console.log('DONE');
          document.getElementById("upi_detailform").reset();
          $('#suspect_no_upi_details').modal('hide');
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('txt5').innerHTML = this.responseText;
            }
            $('#suspect_num_table_upi').replaceWith($('#txt5'));
          };
          xmlhttp.open('GET', '../displayFiles/display.php?upidetailform="1"',true);
          xmlhttp.send();
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
        }).then(() => {
          document.getElementById("acc_detailform").reset();
          $("#btn_addpan").prop('disabled', false);
          $("#btn_addatm").prop('disabled', false);
          $("#btn_addiplog").prop('disabled', false);
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('txt6').innerHTML = this.responseText;
            }
            $('#suspect_acc_table_main').replaceWith($('#txt6'));
          };
          xmlhttp.open('GET', '../displayFiles/display.php?accdetailform="1"',true);
          xmlhttp.send();
        });
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
        console.log(data);
        swal({
          title: 'Inserted Successfuly',
          icon: 'success',
          button: 'Next',
        }).then(() => {
          console.log('DONE');          
          $('#suspect_acc_pan_details').modal('hide');
          document.getElementById("acc_panform").reset();
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('txt7').innerHTML = this.responseText;
            }
            $('#suspect_acc_table_pan').replaceWith($('#txt7'));
          };
          xmlhttp.open('GET', '../displayFiles/display.php?pandetailform="1"',true);
          xmlhttp.send();
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
        console.log(data);
        swal({
          title: 'Inserted Successfuly',
          icon: 'success',
          button: 'Next',
        }).then(() => {
          console.log('DONE');
          $('#suspect_acc_atm_details').modal('hide');
          document.getElementById("acc_atmform").reset();
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('txt8').innerHTML = this.responseText;
            }
            $('#suspect_acc_table_atm').replaceWith($('#txt8'));
          };
          xmlhttp.open('GET', '../displayFiles/display.php?atmdetailform="1"',true);
          xmlhttp.send();
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
        console.log(data);
        swal({
          title: 'Inserted Successfuly',
          icon: 'success',
          button: 'Next',
        }).then(() => {
          console.log('DONE');
          $('#suspect_acc_iplog_details').modal('hide');
          document.getElementById("acc_iplogform").reset();
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('txt9').innerHTML = this.responseText;
            }
            $('#suspect_acc_table_iplog').replaceWith($('#txt9'));
          };
          xmlhttp.open('GET', '../displayFiles/display.php?iplogdetailform="1"',true);
          xmlhttp.send();
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
        }).then(() => {
          console.log('DONE');
          document.getElementById("wallet_detailform").reset();
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('txt10').innerHTML = this.responseText;
            }
            $('#suspect_ewallet_table_main').replaceWith($('#txt10'));
          };
          xmlhttp.open('GET', '../displayFiles/display.php?ewalletdetailform="1"',true);
          xmlhttp.send();
        });
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
        }).then(() => {
          console.log('DONE');
          document.getElementById("website_detailform").reset();
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('txt11').innerHTML = this.responseText;
            }
            $('#suspect_website_table_main').replaceWith($('#txt11'));
          };
          xmlhttp.open('GET', '../displayFiles/display.php?websitedetailform="1"',true);
          xmlhttp.send();
        });
      },
      error: function () {},
    });
  });
});
