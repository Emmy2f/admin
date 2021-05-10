<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <?php
                                    include_once 'commonMethods.php';
                                    doDBConnect();
                                    ?>
    </head>                 
    
    <body>
        <script>
           
            </script>
                               <option value="select">--Select--</option>
                                   <?php
                                    function SplitTime($StartTime, $EndTime, $Duration="60"){
    $ReturnArray = array ();// Define output
    $StartTime    = strtotime ($StartTime); //Get Timestamp
    $EndTime      = strtotime ($EndTime); //Get Timestamp

    $AddMins  = $Duration * 60;

    while ($StartTime <= $EndTime) //Run loop
    {
        $ReturnArray[] = date ("G:i", $StartTime);
        $StartTime += $AddMins; //Endtime check
    }
    return $ReturnArray;
}
                                   
                                    $q = ($_GET['q']);
                                    $d=($_GET['d']);
                                   
                                   $fetch = $con->query("select * from doctorAvailability where doctorId='$d' and day='$q'");
                                if ($fetch) {

                                    while ($row = $fetch->fetch_assoc()) {
//                                       echo "<option>$row[startTime]</option>";
//                                       echo "<option>$row[endTime]</option>";
                                         $Data = SplitTime("$row[startTime]", "$row[endTime]", "15");
                                        foreach ($Data as $key => $value) {
                                            echo "<option>$value</option>";
                                        }
                                       
                                    }
                                }
                                    ?>
                               
                           
                         
    </body>
</html>
