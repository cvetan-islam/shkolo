$(document).ready(function() {
  $(".cell").click(function() {
    window.location.href=$(this).data('href');
  });

  $.contextMenu({
    selector: '.cell',
    callback: function(key, options) {
      var m = "clicked: " + key;
      switch(key) {
        case 'edit':
          window.location.href='dashboard/edit/'+$(this).data('id');
          break;
        case 'delete':
          var $resetForm = $('#resetForm');
          $resetForm.attr('action', 'dashboard/delete/'+$(this).data('id'));
          $resetForm.submit();
          break;
      }
    },
    items: {
      "edit": {name: "Edit"},
      "delete": {name: "Reset"},
      "quit": {name: "Quit"}
    }
  });
});