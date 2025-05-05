
<?php

// Assuming you're using GET method to pass stock symbol
$symbol = $_GET['symbol'];

// Call Python script using shell_exec
$output = shell_exec("python C:/xampp/htdocs/Testingnew/python/app.py $symbol");

// Output JSON response
header('Content-Type: application/json');
echo $output;
?>
