$(document).ready(function () {
   //delete number
  $(document).on("click", "button[name='delete_num']", function () {
    var num_id = $(this).attr('id');
    swal({
      title: "Are you sure you want to delete this number?",
      text:
        "if you delete this number then cdr,ipdr,upi details of this number will also deleted ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "../deleteFiles/deletefile.php",
          method: "POST",
          dataType: "JSON",
          data: { num_id: num_id },
          success: function (data) {
            swal({
              title: "Deleted Successfully",
              icon: "success",
              button: "Next",
            }).then(() => {
             
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  var res = JSON.parse(this.responseText);
                 document.getElementById("suspect_num_table_main").innerHTML = res.htmladd;
                 document.getElementById("label_number").innerHTML = res.number_one;
                  if (res.sessiondata== 2) {
                    console.log("disable button");
                    $("#btn_addcdr").prop("disabled", true);
                    $("#btn_addipdr").prop("disabled", true);
                    $("#btn_addupi").prop("disabled", true);
                    $("#suspect_num_table_cdr").html(data.resetcdr);
                    $("#suspect_num_table_ipdr").html(data.resetipdr);
                    $("#suspect_num_table_upi").html(data.resetupi);
                  }

                }
                $("#suspect_num_table_main").css("display", "inline");
              };
              xmlhttp.open(
                "GET",
                '../displayFiles/display.php?numdetailform="1"',
                true
              );
              xmlhttp.send();
            });
          },
          error: function () {},
        });
      }
    });
  });
  //delete cdr
  $(document).on("click", "button[name='delete_cdr']", function () {
    var cdr_id = $(this).attr('id');
    swal({
      title: "Are you sure you want to delete this entry?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {  
        $.ajax({
          url: "../deleteFiles/deletefile.php",
          method: "POST",
          data: { cdr_id: cdr_id },
          success: function (data) {
            console.log(data);
            swal({
              title: "Deleted Successfully",
              icon: "success",
              button: "Next",
            }).then(() => {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById(
                    "suspect_num_table_cdr"
                  ).innerHTML = this.responseText;
                }
                $("#suspect_num_table_cdr").css("display", "inline");
              };
              xmlhttp.open(
                "GET",
                '../displayFiles/display.php?cdrdetailform="1"',
                true
              );
              xmlhttp.send();
            });
          },
          error: function () {},
        });
      }
    });
  });
  //delete ipdr
  $(document).on("click", "button[name='delete_ipdr']", function () {
    var ipdr_id = $(this).attr('id');
    swal({
      title: "Are you sure you want to delete this entry?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "../deleteFiles/deletefile.php",
          method: "POST",
          data: { ipdr_id: ipdr_id },
          success: function (data) {
            console.log(data);
            swal({
              title: "Deleted Successfully",
              icon: "success",
              button: "Next",
            }).then(() => {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById(
                    "suspect_num_table_ipdr"
                  ).innerHTML = this.responseText;
                }
                $("#suspect_num_table_ipdr").css("display", "inline");
              };
              xmlhttp.open(
                "GET",
                '../displayFiles/display.php?ipdrdetailform="1"',
                true
              );
              xmlhttp.send();
            });
          },
          error: function () {},
        });
      }
    });
  });
  //Delete Upi
  $(document).on("click", "button[name='delete_upi']", function () {
    var upi_id = $(this).attr('id');
    swal({
      title: "Are you sure you want to delete this entry?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {     
        $.ajax({
          url: "../deleteFiles/deletefile.php",
          method: "POST",
          data: { upi_id: upi_id },
          success: function (data) {
            console.log(data);
            swal({
              title: "Deleted Successfully",
              icon: "success",
              button: "Next",
            }).then(() => {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById(
                    "suspect_num_table_upi"
                  ).innerHTML = this.responseText;
                }
                $("#suspect_num_table_upi").css("display", "inline");
              };
              xmlhttp.open(
                "GET",
                '../displayFiles/display.php?upidetailform="1"',
                true
              );
              xmlhttp.send();
            });
          },
          error: function () {},
        });
      }
    });
  });
  //delete account
  $(document).on("click", "button[name='delete_acc']", function () {
    var acc_id = $(this).attr('id');
    swal({
      title: "Are you sure you want to delete this account number?",
      text:
        "if you delete this number then pan,atm,iplog details of this number will also deleted ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "../deleteFiles/deletefile.php",
          method: "POST",
          data: { acc_id: acc_id },
          dataType: "JSON",
          success: function (data) {
            console.log(data.msg);
            swal({
              title: "Deleted Successfully",
              icon: "success",
              button: "Next",
            }).then(() => {
              
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  var res = JSON.parse(this.responseText); 
                  document.getElementById(
                    "suspect_acc_table_main"
                  ).innerHTML = res.htmladd;
                  document.getElementById(
                    "label_acc"
                  ).innerHTML = res.acc_num;
                  if (res.sessiondata == 2) {
                    console.log("disable button");
                    $("#btn_addpan").prop("disabled", true);
                    $("#btn_addatm").prop("disabled", true);
                    $("#btn_addiplog").prop("disabled", true);
                    $("#suspect_acc_table_pan").html(data.resetpan);
                    $("#suspect_acc_table_atm").html(data.resetatm);
                    $("#suspect_acc_table_iplog").html(data.resetiplog);
                  }

                }
                $("#suspect_acc_table_main").css("display", "inline");
              };
              xmlhttp.open(
                "GET",
                '../displayFiles/display.php?accdetailform="1"',
                true
              );
              xmlhttp.send();
            });
          },
          error: function () {},
        });
      }
    });
  });
  //delete Pan
  $(document).on("click", "button[name='delete_pan']", function () {
    var pan_id = $(this).attr('id');
    swal({
      title: "Are you sure you want to delete this entry?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "../deleteFiles/deletefile.php",
          method: "POST",
          data: { pan_id: pan_id },
          success: function (data) {
            console.log(data);
            swal({
              title: "Deleted Successfully",
              icon: "success",
              button: "Next",
            }).then(() => {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById(
                    "suspect_acc_table_pan"
                  ).innerHTML = this.responseText;
                }
                $("#suspect_acc_table_pan").css("display", "inline");
              };
              xmlhttp.open(
                "GET",
                '../displayFiles/display.php?pandetailform="1"',
                true
              );
              xmlhttp.send();
            });
          },
          error: function () {},
        });
      }
    });
  });
  //delete atm
  $(document).on("click", "button[name='delete_atm']", function () {
    var atm_id = $(this).attr('id');
    swal({
      title: "Are you sure you want to delete this entry?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "../deleteFiles/deletefile.php",
          method: "POST",
          data: { atm_id: atm_id },
          success: function (data) {
            console.log(data);
            swal({
              title: "Deleted Successfully",
              icon: "success",
              button: "Next",
            }).then(() => {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById(
                    "suspect_acc_table_atm"
                  ).innerHTML = this.responseText;
                }
                $("#suspect_acc_table_atm").css("display", "inline");
              };
              xmlhttp.open(
                "GET",
                '../displayFiles/display.php?atmdetailform="1"',
                true
              );
              xmlhttp.send();
            });
          },
          error: function () {},
        });
      }
    });
  });
  //delete iplog
  $(document).on("click", "button[name='delete_iplog']", function () {
    var iplog_id = $(this).attr('id');
    swal({
      title: "Are you sure you want to delete this entry?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "../deleteFiles/deletefile.php",
          method: "POST",
          data: { iplog_id: iplog_id },
          success: function (data) {
            console.log(data);
            swal({
              title: "Deleted Successfully",
              icon: "success",
              button: "Next",
            }).then(() => {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById(
                    "suspect_acc_table_iplog"
                  ).innerHTML = this.responseText;
                }
                $("#suspect_acc_table_iplog").css("display", "inline");
              };
              xmlhttp.open(
                "GET",
                '../displayFiles/display.php?iplogdetailform="1"',
                true
              );
              xmlhttp.send();
            });
          },
          error: function () {},
        });
      }
    });
  });
  //delete ewallet
  $(document).on("click", "button[name='delete_ewallet']", function () {
    var ewallet_id = $(this).attr('id');
    swal({
      title: "Are you sure you want to delete this entry?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "../deleteFiles/deletefile.php",
          method: "POST",
          data: { ewallet_id: ewallet_id },
          success: function (data) {
            console.log(data);
            swal({
              title: "Deleted Successfully",
              icon: "success",
              button: "Next",
            }).then(() => {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById(
                    "suspect_ewallet_table_main"
                  ).innerHTML = this.responseText;
                }
                $("#suspect_ewallet_table_main").css("display", "inline");
              };
              xmlhttp.open(
                "GET",
                '../displayFiles/display.php?ewalletdetailform="1"',
                true
              );
              xmlhttp.send();
            });
          },
          error: function () {},
        });
      }
    });
  });
  //delete website
  $(document).on("click", "button[name='delete_website']", function () {
    var website_id = $(this).attr('id');
    swal({
      title: "Are you sure you want to delete this entry?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "../deleteFiles/deletefile.php",
          method: "POST",
          data: { website_id: website_id },
          success: function (data) {
            console.log(data);
            swal({
              title: "Deleted Successfully",
              icon: "success",
              button: "Next",
            }).then(() => {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById(
                    "suspect_website_table_main"
                  ).innerHTML = this.responseText;
                }
                $("#suspect_website_table_main").css("display", "inline");
              };
              xmlhttp.open(
                "GET",
                '../displayFiles/display.php?websitedetailform="1"',
                true
              );
              xmlhttp.send();
            });
          },
          error: function () {},
        });
      }
    });
  });
  //delete website
  $(document).on("click", "button[name='delete_suspect']", function () {
    var suspect_id = $(this).attr('id');
    swal({
      title: "Are you sure you want to delete this entry?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "../deleteFiles/deletefile.php",
          method: "POST",
          data: { suspect_id: suspect_id },
          success: function (data) {
            console.log(data);
            swal({
              title: "Deleted Successfully",
              icon: "success",
              button: "Next",
            }).then(() => {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById(
                    "suspect_table_main"
                  ).innerHTML = this.responseText;
                }
                $("#suspect_table_main").css("display", "inline");
              };
              xmlhttp.open(
                "GET",
                '../displayFiles/display.php?suspectdetailform="1"',
                true
              );
              xmlhttp.send();
            });
          },
          error: function () {},
        });
      }
    });
  });
});
