$(document).ready(function () {
  $(document).on('click', "button[name='update_basic']", function () {
    $('.form-text').removeAttr('disabled');
    $("button[name='update_basic']").replaceWith("<button class='ui button update-btn' type='submit' id='save_button'  name='save_button'>Save</button>");
  });
  $('#basicFormResult').on('submit', function (e)  {
    console.log("Tested");
    e.preventDefault();
    $.ajax({
      url: '../updateFiles/UpdateBasic.php',
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        console.log(data);
        swal({
          title: 'Updated Successfuly',
          icon: 'success',
          button: 'Next',
        }).then(() => {
          console.log('DONE');
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById('txtbasic').innerHTML = this.responseText;
            }
            $('#basicFormResult').replaceWith($('#txtbasic'));
          };
          xmlhttp.open(
            'GET',
            '../displayFiles/display.php?basicform= "1"',
            true
          );
          xmlhttp.send();
        });
      },
      error: function () {},
    });
  });
});

