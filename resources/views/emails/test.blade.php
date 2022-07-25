
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <h2>منصة دليلي</h2>
    <div>  <?php
    
    $array = explode("<br/>",$test_message);

foreach ($array as $word) {
  $eword=urlencode($word);
  echo "<p>$word</p> ";
}
  ?>    </div>
  </body>
</html>