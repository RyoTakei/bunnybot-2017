<html style="background-color: darkblue">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="bunny.jpeg">
    <title>2898 Scouting</title>
</head>
<body>
<!--<div class="background">-->
<div id="wapper">
    <div id="wapper2">
        <div id="wapper3">
            <h1>Thank You!</h1>
            <br>

            <?php
            require "connection.php"; 
            // require "push.php";



            if (!empty($_POST["name"])) {
                $name = $_POST["name"];
            } else {
                $name = "*Unknown*";
            }

            if (!empty($_POST["matchNum"])) {
                $match_number = $_POST["matchNum"];
            } else {
                $match_number = "*Unknown*";
            }

            $alliance = $_POST["alliance"];

            if (!empty($_POST["team"])) {
                $team = $_POST["team"];
            } else {
                $team = "*Unknown*";
            }

            if (isset($_POST["baseLine"])) {
                $baseLine = "Yes";
            } else {
                $baseLine = "No";
            }

            if (isset($_POST["teamBucket"])) {
                $team_bucket = "Yes";
            } else {
                $team_bucket = "No";
            }

            if (isset($_POST["fieldBucket"])) {
                $field_bucket = "Yes";
            } else {
                $field_bucket = "No";
            }

            if (!empty($_POST["autonomousInfo"])) {
                $autonomous_info = $_POST["autonomousInfo"];
            } else {
                $autonomous_info = "*Nothing was entered*";
            }

            if (!empty($_POST["bunnies"])) {
                $bunnies = $_POST["bunnies"];
            } else {
                $bunnies = "*Unknown*";
            }

            if (!empty($_POST["teleopInfo"])) {
                $teleop_info = $_POST["teleopInfo"];
            } else {
                $teleop_info = "*Nothing was entered*";
            }

            if (isset($_POST["driveTeamNA"]) and !isset($_POST["driveTeam1"])
                and !isset($_POST["driveTeam2"]) and !isset($_POST["driveTeam3"])) {
                $drive_team_rating = "NA";
            } else if (isset($_POST["driveTeam1"]) and !isset($_POST["driveTeam2"])
                and !isset($_POST["driveTeam3"]) and !isset($_POST["driveTeamNA"])) {
                $drive_team_rating = "1";
            } else if (isset($_POST["driveTeam2"]) and !isset($_POST["driveTeamNA"])
                and !isset($_POST["driveTeam1"]) and !isset($_POST["driveTeam3"])) {
                $drive_team_rating = "2";
            } else if (isset($_POST["driveTeam3"]) and !isset($_POST["driveTeamNA"])
                and !isset($_POST["driveTeam1"]) and !isset($_POST["driveTeam2"])) {
                $drive_team_rating = "3";
            } else {
                $drive_team_rating = "NA";
            }

            if (isset($_POST["defenseTeamNA"]) and !isset($_POST["defenseTeam1"])
                and !isset($_POST["defenseTeam2"]) and !isset($_POST["defenseTeam3"])) {
                $defense_rating = "NA";
            } else if (isset($_POST["defenseTeam1"]) and !isset($_POST["defenseTeam2"])
                and !isset($_POST["defenseTeam3"]) and !isset($_POST["defenseTeamNA"])) {
                $defense_rating = "1";
            } else if (isset($_POST["defenseTeam2"]) and !isset($_POST["defenseTeamNA"])
                and !isset($_POST["defenseTeam1"]) and !isset($_POST["defenseTeam3"])) {
                $defense_rating = "2";
            } else if (isset($_POST["defenseTeam3"]) and !isset($_POST["defenseTeamNA"])
                and !isset($_POST["defenseTeam1"]) and !isset($_POST["defenseTeam2"])) {
                $defense_rating = "3";
            } else {
                $defense_rating = "NA";
            }

            if (!empty($_POST["info"])) {
                $info = $_POST["info"];
            } else {
                $info = "*Nothing was entered*";
            }

            if (!empty($_POST["currentRank"])) {
                $current_rank = $_POST["currentRank"];
            } else {
                $current_rank = "*Unknown*";
            }

            if (!empty($_POST["finalScore"])) {
                $final_score = $_POST["finalScore"];
            } else {
                $final_score = "*Nothing was entered*";
            }

            $mysql_qry = "INSERT INTO scouting(name, match_number, alliance, team_number, base_line, team_bucket,
field_bucket,autonomous_info, bunnies, teleop_info, drive_team, defense, extra_info, current_rank, score) VALUES (
'$name', '$match_number', '$alliance', '$team', '$baseLine', '$team_bucket', '$field_bucket', '$autonomous_info',
'$bunnies', '$teleop_info', '$drive_team_rating', '$defense_rating', '$info', '$current_rank', '$final_score')";

            /*
            CREATE TABLE scouting (
            name VARCHAR(50) NOT NULL,
            match_number VARCHAR(50) NOT NULL,
            alliance VARCHAR(50) NOT NULL,
            team_number VARCHAR(50) NOT NULL,
            base_line VARCHAR(50) NOT NULL,
            team_bucket VARCHAR(50) NOT NULL,
            field_bucket VARCHAR(50) NOT NULL,
            autonomous_info TEXT NOT NULL,
            bunnies VARCHAR(50) NOT NULL,
            teleop_info TEXT NOT NULL,
            drive_team VARCHAR(50) NOT NULL,
            defense VARCHAR(50) NOT NULL,
            extra_info TEXT NOT NULL,
            current_rank VARCHAR(50) NOT NULL,
            score VARCHAR(50) NOT NULL
            );
            */

            if ($conn->query($mysql_qry) === TRUE) {

                echo "<div class='redFont'>INSERT SUCCESS</div>";
                echo "<br><br>##############################################"
                    . "<br><br>Here's the info"
                    . "<br>Your Name: " . "<b>" . $name . "</b>"
                    . "<br><br>Match<b> " . $match_number
                    . "<br>" . $alliance . "</b> alliance"
                    . "<br>Team<b> " . $team . "</b>"
                    . "<br><br>In autonomous period....."
                    . "<br>Passed baseline?  <b>" . $baseLine
                    . "<br></b> bucket?  <b>" . $team_bucket
                    . "<br></b> bucket?  <b>" . $field_bucket
                    . "<br></b>And extra info about autonomous: <b>" . $autonomous_info
                    . "<br><br></b>In teleop period....."
                    . "<br>They got <b>" . $bunnies . "</b> bunnies"
                    . "<br>And Extra info about their teleop: <b>" . $teleop_info
                    . "<br><br></b>After the match...."
                    . "<br>You gave<b> " . $drive_team_rating . "</b> to their drive team"
                    . "<br>And you gave<b> " . $defense_rating . "</b> to their defense"
                    . "<br>Their current rank is<b> " . $current_rank
                    . "<br></b>They scored <b>" . $final_score
                    . "<br></b>This was the final comment about their robot was:<b> " . $info
                    . "<br><br></b>###############################################";
                $conn->close();

            } else {
                echo "<a class='biggerFont'><b>ERROR: </b></a><br>" . $mysql_qry . "<br>" . $conn->error . "<br><br>";
                echo "<a class='biggerFont'>
<b>## This might be caused by using single quotation marks/apostrophes 
make sure that you're not using single quotation marks/apostrophes ##</b>
</a>";
            }
                
            ?>
            <br><br>
            <p>Want to see the data?? Click <a href="viewData.php" target="_blank">here</a> to check the data!</p>
            <a href="index.html">Go back to home</a>
            <br><br><br><br>
            <p class="smallText">Created by Ryo Takei</p>
        </div>
    </div>
</div>
<!--</div>-->
</body>
</html>

