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

    <div class="hidden">
        <form method="POST"  id="resetForm">
            @csrf
        </form>

    </div>
</div>
<script src="{{asset('js/dashboard/index.js')}}"></script>
</body>
</html>