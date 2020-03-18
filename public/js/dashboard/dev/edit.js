$(document).ready(function() {
  $('#colorSelect').on('change', function (e) {
    console.log($('#colorSelect option:selected').css('color'));
    var css = $('#colorSelect option:selected').text();
    $('#colorSelect').css('color', css);
  });
});