$(document).ready(function() {
(function(){
$("#no_ktp").validate({
  rules: {
    field: {
      required: true,
      minlength: 16
    }
  }
});
  });

