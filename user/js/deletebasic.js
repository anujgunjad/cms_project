$(document).ready(function () {
    //delete number
    $(document).on("click","button[name='delete_num']", function(){
        swal({
            title: 'Are you sure you want to delete this number?',
            text: "if you delete this number then cdr,ipdr,upi details of this number will also deleted ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {
                var num_id =$("#delete_num").val();
                $.ajax({
                url: '../deleteFiles/deletefile.php',
                method: 'POST',
                dataType: 'JSON',
                data: {num_id:num_id},
                success: function(data) {                 
                    swal({
                    title: 'Deleted Successfully',
                    icon: 'success',
                    button: 'Next',
                    }).then(() => {
                      var session_data = data.sessiondata;
                      if(session_data > 0)
                      {  console.log("disable button");
                        $('#btn_addcdr').prop('disabled', true);
                        $('#btn_addipdr').prop('disabled', true);
                        $('#btn_addupi').prop('disabled', true);
                        $("#suspect_num_table_cdr").html(data.resetcdr);
                        $("#suspect_num_table_ipdr").html(data.resetipdr);
                        $("#suspect_num_table_upi").html(data.resetupi);
                      }
                      var xmlhttp = new XMLHttpRequest();
                      xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                          document.getElementById('suspect_num_table_main').innerHTML = this.responseText;
                        }
                       $('#suspect_num_table_main').css('display','inline');
                      };
                      xmlhttp.open(
                        'GET',
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
    $(document).on("click","button[name='delete_cdr']", function(){
        swal({
            title: 'Are you sure you want to delete this entry?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {
                var cdr_id =$("#delete_cdr").val();
                $.ajax({
                url: '../deleteFiles/deletefile.php',
                method: 'POST',
                data: {cdr_id:cdr_id},
                success: function (data) {
                    console.log(data);
                    swal({
                    title: 'Deleted Successfully',
                    icon: 'success',
                    button: 'Next',
                    }).then(() => {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById('suspect_num_table_cdr').innerHTML = this.responseText;
                        }
                        $('#suspect_num_table_cdr').css('display','inline');
                        };
                        xmlhttp.open(
                        'GET',
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
    $(document).on("click","button[name='delete_ipdr']", function(){
        swal({
            title: 'Are you sure you want to delete this entry?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {
                var ipdr_id =$("#delete_ipdr").val();
                $.ajax({
                url: '../deleteFiles/deletefile.php',
                method: 'POST',
                data: {ipdr_id:ipdr_id},
                success: function (data) {
                    console.log(data);
                    swal({
                    title: 'Deleted Successfully',
                    icon: 'success',
                    button: 'Next',
                    }).then(() => {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                            document.getElementById('suspect_num_table_ipdr').innerHTML = this.responseText;
                            }
                            $('#suspect_num_table_ipdr').css('display','inline');
                        };
                        xmlhttp.open(
                            'GET',
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
    $(document).on("click","button[name='delete_upi']", function(){
        swal({
            title: 'Are you sure you want to delete this entry?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {
                var upi_id =$("#delete_upi").val();
                $.ajax({
                url: '../deleteFiles/deletefile.php',
                method: 'POST',
                data: {upi_id:upi_id},
                success: function (data) {
                    console.log(data);
                    swal({
                    title: 'Deleted Successfully',
                    icon: 'success',
                    button: 'Next',
                    }).then(() => {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function () {
                          if (this.readyState == 4 && this.status == 200) {
                            document.getElementById('suspect_num_table_upi').innerHTML = this.responseText;
                          }
                          $('#suspect_num_table_upi').css('display','inline');
                        };
                        xmlhttp.open(
                          'GET',
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
    $(document).on("click","button[name='delete_acc']", function(){
        swal({
            title: 'Are you sure you want to delete this account number?',
            text: "if you delete this number then pan,atm,iplog details of this number will also deleted ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {
                var acc_id =$("#delete_acc").val();
                $.ajax({
                url: '../deleteFiles/deletefile.php',
                method: 'POST',
                data: {acc_id:acc_id},
                dataType: "JSON",
                success: function (data) {
                    console.log(data.msg);                    
                    swal({
                    title: 'Deleted Successfully',
                    icon: 'success',
                    button: 'Next',
                    }).then(() => {
                      var session_data = data.sessiondata;
                      if(session_data > 0)
                      {  console.log("disable button");
                        $('#btn_addpan').prop('disabled', true);
                        $('#btn_addatm').prop('disabled', true);
                        $('#btn_addiplog').prop('disabled', true);
                        $("#suspect_acc_table_pan").html(data.resetpan);
                        $("#suspect_acc_table_atm").html(data.resetatm);
                        $("#suspect_acc_table_iplog").html(data.resetiplog);
                      
                      }
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function () {
                          if (this.readyState == 4 && this.status == 200) {
                            document.getElementById('suspect_acc_table_main').innerHTML = this.responseText;
                          }
                          $('#suspect_acc_table_main').css('display','inline');
                        };
                        xmlhttp.open(
                          'GET',
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
    $(document).on("click","button[name='delete_pan']", function(){
        swal({
            title: 'Are you sure you want to delete this entry?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {
                var pan_id =$("#delete_pan").val();
                $.ajax({
                url: '../deleteFiles/deletefile.php',
                method: 'POST',
                data: {pan_id:pan_id},
                success: function (data) {
                    console.log(data);
                    swal({
                    title: 'Deleted Successfully',
                    icon: 'success',
                    button: 'Next',
                    }).then(() => {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function () {
                          if (this.readyState == 4 && this.status == 200) {
                            document.getElementById('suspect_acc_table_pan').innerHTML = this.responseText;
                          }
                          $('#suspect_acc_table_pan').css('display','inline');
                        };
                        xmlhttp.open(
                          'GET',
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
    $(document).on("click","button[name='delete_atm']", function(){
        swal({
            title: 'Are you sure you want to delete this entry?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {
                var atm_id =$("#delete_atm").val();
                $.ajax({
                url: '../deleteFiles/deletefile.php',
                method: 'POST',
                data: {atm_id:atm_id},
                success: function (data) {
                    console.log(data);
                    swal({
                    title: 'Deleted Successfully',
                    icon: 'success',
                    button: 'Next',
                    }).then(() => {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function () {
                          if (this.readyState == 4 && this.status == 200) {
                            document.getElementById('suspect_acc_table_atm').innerHTML = this.responseText;
                          }
                          $('#suspect_acc_table_atm').css('display','inline');
                        };
                        xmlhttp.open(
                          'GET',
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
    $(document).on("click","button[name='delete_iplog']", function(){
        swal({
            title: 'Are you sure you want to delete this entry?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {
                var iplog_id =$("#delete_iplog").val();
                $.ajax({
                url: '../deleteFiles/deletefile.php',
                method: 'POST',
                data: {iplog_id:iplog_id},
                success: function (data) {
                    console.log(data);
                    swal({
                    title: 'Deleted Successfully',
                    icon: 'success',
                    button: 'Next',
                    }).then(() => {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function () {
                          if (this.readyState == 4 && this.status == 200) {
                            document.getElementById('suspect_acc_table_iplog').innerHTML = this.responseText;
                          }
                          $('#suspect_acc_table_iplog').css('display','inline');
                        };
                        xmlhttp.open(
                          'GET',
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
    $(document).on("click","button[name='delete_ewallet']", function(){
        swal({
            title: 'Are you sure you want to delete this entry?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {
                var ewallet_id =$("#delete_ewallet").val();
                $.ajax({
                url: '../deleteFiles/deletefile.php',
                method: 'POST',
                data: {ewallet_id:ewallet_id},
                success: function (data) {
                    console.log(data);
                    swal({
                    title: 'Deleted Successfully',
                    icon: 'success',
                    button: 'Next',
                    }).then(() => {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function () {
                          if (this.readyState == 4 && this.status == 200) {
                            document.getElementById('suspect_ewallet_table_main').innerHTML = this.responseText;
                          }
                          $('#suspect_ewallet_table_main').css('display','inline');
                        };
                        xmlhttp.open(
                          'GET',
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
    $(document).on("click","button[name='delete_website']", function(){
        swal({
            title: 'Are you sure you want to delete this entry?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {
                var website_id =$("#delete_website").val();
                $.ajax({
                url: '../deleteFiles/deletefile.php',
                method: 'POST',
                data: {website_id:website_id},
                success: function (data) {
                    console.log(data);
                    swal({
                    title: 'Deleted Successfully',
                    icon: 'success',
                    button: 'Next',
                    }).then(() => {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                            document.getElementById('suspect_website_table_main').innerHTML = this.responseText;
                            }
                            $('#suspect_website_table_main').css('display','inline');
                        };
                        xmlhttp.open(
                            'GET',
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
});