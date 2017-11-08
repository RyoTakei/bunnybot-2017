<?php                                                                                                           
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "BunnyBots_Scouting";

$con = mysqli_connect('localhost', 'root', '1234', 'BunnyBots_Scouting');

$sql_qry = "SELECT team_number,score FROM scouting INTO OUTFILE '/tmp/data.cvs' FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n'";

mysqli_query($con, $sql_qry);

mysqli_close($con);
?>
