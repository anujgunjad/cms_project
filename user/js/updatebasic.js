$(document).ready(function () {
  $(document).on('click', "button[name='update_basic']", function () {
    $('.form-text').removeAttr('disabled');
  });
});
