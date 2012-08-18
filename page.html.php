<!doctype html>
<html>
  <head>
    <title>Bingokaarten</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/screen.css?<?php echo filemtime('css/screen.css'); ?>" media="screen">
    <link rel="stylesheet" type="text/css" href="css/print.css?<?php echo filemtime('css/screen.css'); ?>" media="print">
  </head>
  <body>

    <form method="get" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
      <label for="count">
        Please specify the amount of cards you would like to generate: 
      </label>
      
      <input type="text" size="4" id="count" name="count" value="<?php echo (int) $_GET['count']; ?>">

      <input type="submit" value="Generate">
    </form> 

    <?php foreach ($cards as $card) : ?>
      <?php echo $card->getHTML('card') ?>
    <?php endforeach; ?>
  </body>
</html>
