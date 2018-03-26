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


<?php 
$scheduleFile = "./data/ssd-schedule-2017-2018.csv";

$sep = [];
$oct = [];
$nov = [];
$dec = [];
$jan = [];
$feb = [];
$mar = [];
$apr = [];


//The r says read I think
if(($handle = fopen($scheduleFile,"r")) !== FALSE) {
    while(($data = fgetcsv($handle,1000,",")) !== FALSE) {
        $number = count($data);

        for ($cell = 0; $cell < $number; $cell++) {

            switch(substr($data[1],0,3)) {
                
                case "Sep": 
                    array_push($sep,$data[$cell]);
                    break;
                case "Oct": 
                    array_push($oct,$data[$cell]);
                    break;
                case "Nov": 
                    array_push($nov,$data[$cell]);
                    break;
                case "Dec": 
                    array_push($dec,$data[$cell]);
                    break;
                case "Jan": 
                    array_push($jan,$data[$cell]);
                    break;
                case "Feb": 
                    array_push($feb,$data[$cell]);
                    break;
                case "Mar": 
                    array_push($mar,$data[$cell]);
                    break;
                case "Apr": 
                    array_push($apr,$data[$cell]);
                    break;
            }
            
        }
       
    }
  
    fclose($handle);
    
}

function DisplayMonth($month, $monthName) {
    $dataCount = 0;
    $weekDays = Array("Monday", "Tuesday", "Wednesday","Thursday","Friday");
    echo "<h1 class='monthHead'>" . $monthName . "</h1>";
    echo "<div class='month'>";
    for($d=0; $d < count($weekDays); $d++) {
        echo "<div class='dayHead'> <h3>" . $weekDays[$d] . "</h3></div>";
    }

    $dayCount = 0;

    for($s=0; $s < count($month); $s++) {
        //data comes in packets of 5 (one is blank)
        if($s == 0) {
            if($month[$s] == "Tuesday") {
                echo "<div class='day'></div>";
            } else if($month[$s] == "Wednesday") {
                echo "<div class='day'></div>";
                echo "<div class='day'></div>";
            } else if($month[$s] == "Thursday") {
                echo "<div class='day'></div>";
                echo "<div class='day'></div>";
                echo "<div class='day'></div>";
            } else if ($month[$s] == "Friday") {
                echo "<div class='day'></div>";
                echo "<div class='day'></div>";
                echo "<div class='day'></div>";
                echo "<div class='day'></div>";
            }

        }
        if($dataCount == 0) {
            echo "<div class='day'>";
            echo "<ul>";
        }
        if($month[$s] !== "") {
            echo "<li>" . $month[$s] . "</li>";  
        }
        
        
        $dataCount++;
        if($dataCount == 5) {
            echo "</div>";
            echo "</ul>";
            $dataCount = 0;
        }

    }
    echo "</div>";

    echo "<hr>";
}

$months = Array($sep,$oct,$nov,$dec,$jan,$feb,$mar,$apr);
$monthNames = Array("September","October","November","December","January","February","March","April");

for($m=0; $m < count($months); $m++) {
    DisplayMonth($months[$m],$monthNames[$m]);
}

?>
    
</body>
</html>