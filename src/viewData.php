<html>
<head>
    <title>View Data</title>
    <link rel="icon" href="bunny.jpeg">
    <link rel="stylesheet" href="style2.css">
</head>
<?php
/**
 * Created by IntelliJ IDEA.
 * User: ryotakei
 * Date: 10/22/17
 * Time: 7:07 PM
 */

require 'connection.php';

$query = "SELECT team_number, score, base_line, team_bucket, field_bucket, autonomous_info, bunnies, teleop_info, drive_team, defense, extra_info FROM scouting";

$response = @mysqli_query($conn, $query);

if ($response) {
    echo '<table align="left" cellspacing="8" cellpadding="11"><tr>
    <th align="left"><b>Team Number</b></th>
    <th align="left"><b>Score</b></th><
    <th align="left"><b>Base Line Passed</b></th>
    <th align="left"><b>Team Bucket</b></th>
    <th align="left"><b>Field Bucket</b></th>
    <th align="left"><b>Autonomous Info</b></th>
    <th align="left"><b>Bunnies</b></th>
    <th align="left"><b>Teleop Info</b></th>
    <th align="left"><b>Drive Team</b></th>
    <th align="left"><b>Defense</b></th>
    <th align="left"><b>Extra Info</b></th>';

    while ($row = mysqli_fetch_array($response)) {
        echo '<tr><td align="left">' .
            $row['team_number'] . '</td><td align="left">' .
            $row['score'] . '</td><td align="left">' .
            $row['base_line'] . '</td><td align="left">' .
            $row['team_bucket'] . '</td><td align="left">' .
            $row['field_bucket'] . '</td><td align="left">' .
            $row['autonomous_info'] . '</td><td align="left">' .
            $row['bunnies'] . '</td><td align="left">' .
            $row['teleop_info'] . '</td><td align="left">' .
            $row['drive_team'] . '</td><td align="left">' .
            $row['defense'] . '</td><td align="left">' .
            $row['extra_info'] . '</td><td align="left">';
        echo '</tr>';
    }

    echo "</table>";
} else {
    echo "ERROR: ";
    echo mysqli_errno($conn);
}

mysqli_close($conn);

?>

</html>
