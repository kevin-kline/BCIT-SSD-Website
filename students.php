<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
</head>
<body>
<div class="wrapper">
<header>
<h1>Students</h1>
<button class="hamburger" id="hamburger">
        <div class="hamburger-content" tabindex="-1">
            <span class="text">Menu</span>
            <span class="bar"></span>
        </div><!-- end button-content -->
</button>
<nav>
<ul>
    <li><a href="index.html">Home</a></li>
    <li><a href="Schedule.php">Schedule</a></li>
    <li><a href="students.php">Students</a></li>
    <li><a href="staff.php">Staff</a></li>
    <li><a href="resources.html">Resources</a></li>
    <li><a href="overview.html">Overview</a></li>
    <li><a href="courses.html">Courses</a></li>
    <li><a href="contact.html">Contact</a></li>
</ul>

</nav>

</header>
<main>
<?php

$row = 1;
if (($handle = fopen("data/ssd-student-list-2017-2018.csv", "r")) !== FALSE) {
    
    echo "<table class='dt'>";
    
    while (($studentData = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $numberOfFields = count($studentData);
//        echo "<p> $numberOfFields fields in line $row: <br /></p>\n";
//        $row++;
        echo "<tr>";
        for ($i=0; $i < $numberOfFields; $i++) {
            echo "<td>".$studentData[$i] . "</td>";
        }
        echo "</tr>";
    }
    fclose($handle);

    echo "</table>";
}


?>
</main>
</div>
<script src="./scripts/script.js"></script>
</body>
</html>
