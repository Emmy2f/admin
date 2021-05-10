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
                       
                               <option value="select">--Select--</option>
                                   <?php
                                    $q = ($_GET['q']);
                                   // echo '<option>'.$q.'</option>';
                                   $fetch = $con->query("select * from doctorAvailability where doctorId=$q");
                                if ($fetch) {

                                    while ($row = $fetch->fetch_assoc()) {
                                       echo "<option value=$row[day]>$row[day]</option>";
                                    }
                                }
                                    ?>
                               
                           
                         
    </body>
</html>
