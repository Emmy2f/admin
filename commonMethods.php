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
    </head>
    <body>
        <?php

        function doDBConnect() {
            global $con;
            $con = new mysqli("localhost", "root", "", "admin");
            if (isset($con->connect_error))
                die("connection not established $con->connect_error");
            else {
                //echo "connection established";
            }
        }
        
        function doDBClose(){
            global $con;
            $con->close();
        }
        ?>
    </body>
</html>
