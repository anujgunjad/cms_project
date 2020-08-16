$(document).ready(function () {
  $(document).on('click', "button[name='update_basic']", function () {
    $('.form-text').removeAttr('disabled');
    $("button[name='update_basic']").replaceWith("<button class='ui button form-btn' id='save_button' type='button' name='save_button'>Save</button>");
  });

  $(document).on('click', "button[name='save_button']", function (){
    console.log('Tested');
    var complaint_no = $('#complaint_no').val();
    var ap_name = $('#ap_name').val();
    var ap_age = $('#ap_age').val();
    var ap_gender = $('#ap_gender').val();
    var ap_mob = $('#ap_mob').val();
    var ap_address = $('#ap_address').val();
    var ap_country = $('#ap_country').val();
    var ap_state = $('#ap_state').val();
    var ap_city = $('#ap_city').val();
    var ap_pin_code = $('#ap_pin_code').val();
    var ap_adhar = $('#ap_adhar').val();
    var complaint_type = $('#complaint_type').val();
    var sub_complaint_type = $('#sub_complaint_type').val();
    var it_act = $('#it_act').val();
    var bh_dv = $('#bh_dv').val();
    var crime_date = $('#crime_date').val();
    var crime_time = $('#crime_time').val();
    var amount = $('#amount').val();
    var freeze_amount = $('#freeze_amount').val();
    var checker_name = $('#checker_name').val();
    //console.log(complaintNo);
    $.ajax({
        url: '../updateFiles/UpdateBasic.php',
        type: 'POST',
        data: { complaint_no : complaint_no, ap_name : ap_name, ap_age : ap_age, ap_gender : ap_gender,ap_mob : ap_mob, ap_address : ap_address, ap_country : ap_country, ap_state : ap_state,  ap_city : ap_city, ap_pin_code : ap_pin_code, ap_adhar, complaint_type : complaint_type , sub_complaint_type : sub_complaint_type, it_act : it_act, bh_dv : bh_dv, crime_date : crime_date, crime_time : crime_time , amount : amount, freeze_amount : freeze_amount, checker_name : checker_name},
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
              $('#basicFormResult').replaceWith($('#txt'));
            };
            xmlhttp.open(
              'GET',
              '../displayFiles/display.php?basicform="1"',
              true
            );
            xmlhttp.send();
          });
        },
        error: function () {},
     });
  });
});

