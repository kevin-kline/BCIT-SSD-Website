<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BCIT Schedule</title>
    <link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
<header>
            <h1>Schedule</h1>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="Schedule.php">Schedule</a></li>
                    <li><a href="students.php">Students</a></li>
                    <li><a href="staff.html">Staff</a></li>
                    <li><a href="resources.html">Resources</a></li>
                    <li><a href="overview.html">Overview</a></li>
                    <li><a href="courses.html">Courses</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>

            </nav>
            <button class="hamburger" id="hamburger">
                    <div class="hamburger-content" tabindex="-1">
                        <span class="text">Menu</span>
                        <span class="bar"></span>
                    </div><!-- end button-content -->
            </button>
    </header>

<?php 
$scheduleFile = "./data/ssd-schedule-2017-2018.csv";

//The r says read I think
if(($handle = fopen($scheduleFile,"r")) !== FALSE) {
    while(($data = fgetcsv($handle,1000,",")) !== FALSE) {
        $number = count($data);
        echo "<div>";
        for ($cell = 0; $cell < $number; $cell++) {
            if($data[0] == "Monday" ||
                $data[0] == "Tuesday" ||
                $data[0] == "Wednesday" ||
                $data[0] == "Thursday" ||
                $data[0] == "Friday" ||
                $data[0] == "Saturday" ||
                $data[0] == "Sunday" ) {
                    echo $data[$cell] . "<br>\n";
                }
            
        }
        echo "</div>";
    }
    fclose($handle);
}

?>
    
</body>
</html>