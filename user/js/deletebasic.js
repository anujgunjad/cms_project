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
                data: {num_id:num_id},
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
                            document.getElementById('txt2').innerHTML = this.responseText;
                          }
                          $('#suspect_num_table_main').replaceWith($('#txt2'));
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
                            document.getElementById('txt3').innerHTML = this.responseText;
                        }
                        $('#suspect_num_table_cdr').replaceWith($('#txt3'));
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
                            document.getElementById('txt4').innerHTML = this.responseText;
                            }
                            $('#suspect_num_table_ipdr').replaceWith($('#txt4'));
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
                            document.getElementById('txt5').innerHTML = this.responseText;
                          }
                          $('#suspect_num_table_upi').replaceWith($('#txt5'));
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
                            document.getElementById('txt6').innerHTML = this.responseText;
                          }
                          $('#suspect_acc_table_main').replaceWith($('#txt6'));
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
                            document.getElementById('txt7').innerHTML = this.responseText;
                          }
                          $('#suspect_acc_table_pan').replaceWith($('#txt7'));
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
                            document.getElementById('txt8').innerHTML = this.responseText;
                          }
                          $('#suspect_acc_table_atm').replaceWith($('#txt8'));
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
                            document.getElementById('txt9').innerHTML = this.responseText;
                          }
                          $('#suspect_acc_table_iplog').replaceWith($('#txt9'));
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
                            document.getElementById('txt10').innerHTML = this.responseText;
                          }
                          $('#suspect_ewallet_table_main').replaceWith($('#txt10'));
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
                            document.getElementById('txt11').innerHTML = this.responseText;
                            }
                            $('#suspect_website_table_main').replaceWith($('#txt11'));
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