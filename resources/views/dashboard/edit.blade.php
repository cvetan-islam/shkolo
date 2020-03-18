<html>
<head>
  <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>

  <title>Shkolo Task</title>
</head>
<body>
<div>
  @include('flash-message')
</div>
<div class="main">
  <form method="POST" action="">
    @csrf
    <label for="title">Title: </label><input type="text" name="title" value="<?php echo $config->title?>"> <br />
    <label for="link">Link: </label><input type="text" name="link" value="<?php echo $config->link?>" placeholder="http://google.com"> <br />
    <label for="color">Color: </label>
    <select id="colorSelect" name="color" style="color:<?php echo $colors[$config->color]?>">
    <?php foreach ($colors as $id => $color) { ?>
      <option value="<?php echo $id ?>" <?php echo ($id == $config->color) ? 'selected="selected"' : ''?> style="color:<?php echo $color?>"> <?php echo $color?></option>
    <?php } ?>
    </select> <br />
    <input type="submit" value="Save" />

  </form>
</div>
<script src="{{asset('js/dashboard/edit.js')}}"></script>
</body>
</html>