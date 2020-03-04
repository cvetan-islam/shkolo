<html>
<head>
    <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
    <script src="{{ asset('js/jquery.ui.position.min.js') }}"></script>
    <script src="{{ asset('js/jquery.contextMenu.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/jquery.contextMenu.min.css') }}" />
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>

    <title>Shkolo Task</title>
</head>
<body>
<div>
  @include('flash-message')
</div>
<div class="main">
  <div class="container">
    <?php foreach ($dashboard as $item) { ?>
    <?php $location = $item->link ? $item->link : 'dashboard/edit/'.$item->id; ?>
    <?php $color = $colors[$item->color] ?? 'none'; ?>
      <input class="cell" style="background: <?php echo $color?>" value="<?php echo $item->title?>" type="button" data-href="<?php echo $location?>" data-id="<?php echo $item->id?>"/>
    <?php }  ?>
  </div>

    <div style="display:none">
        <form method="POST"  id="resetForm">
            @csrf
        </form>

    </div>
</div>
<script>
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
            // console.log($resetForm.attr('action'));
            $resetForm.submit();
            // window.location.href='dashboard/delete/'+$(this).data('id');
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
</script>
</body>
</html>