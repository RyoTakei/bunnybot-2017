<html lang='en'>
<head>
    <title>View Data</title>
    <link rel="icon" href="res/bunny.jpeg">
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>

<style>
    p {
        font-size: 150%;
        text-align: center;
    }
</style>

<?php
/**
 * Created by IntelliJ IDEA.
 * User: ryotakei
 * Date: 11/12/17
 * Time: 12:03 AM
 */

$command = 'python3.6 /opt/lampp/htdocs/scouting/ave.py';
exec('. python/ave.sh', $out, $status);
//exec(dirname(__FILE__) . 'ave.sh', $out, $status);
if (0 === $status) {
    echo "<p>DONE</p>";
} else {
    echo "Command failed with status: $status";
}

if ($file = fopen("/tmp/ave.text", "r")) {
    while(!feof($file)) {
        $line = fgets($file);
        echo '<p>' . $line . '</p>';
    }
    fclose($file);
}

?>
</html>
