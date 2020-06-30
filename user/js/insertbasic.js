$(document).ready(function () {
  $('.ui.dropdown').dropdown();
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
        });
      },
      error: function () {},
    });
  });

  $('#suspectform').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      url: '../insertFiles/insert_suspectForm.php',
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
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('txttwo').innerHTML = this.responseText;
            }
            $('#suspectFormDiv').replaceWith($('#txttwo'));
          };
          xmlhttp.open('GET', '../displayFiles/displaySuspect.php', true);
          xmlhttp.send();
        });
      },
      error: function () {},
    });
  });

  $('#insertNumber').on('submit', function (e) {
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
          $('#numModel').modal('hide');
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('new-row').innerHTML = this.responseText;
            }
            $('#old-row').replaceWith($('#new-row'));
          };
          xmlhttp.open('GET', '../displayFiles/displayNumber.php', true);
          xmlhttp.send();
          $('#insertNumber')
            .find('input')
            .each((i, el) => {
              $(el).val('');
            });
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
});
