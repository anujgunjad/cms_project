$(document).ready(function () {
  console.log("Tested");
  $(document).on("click", "button[name='delete_complaint']", function () {
    console.log("Great");

    swal({
      title: "Are you sure you want to delete this number?",
      text:
        "if you delete this number then cdr,ipdr,upi details of this number will also deleted ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      var num_id = $("#delete_complaint").val();
      console.log(num_id);
    });
  });
});
