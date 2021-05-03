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
                                    $err_room="";?>
    </head>
    <body>
                       
                                <label>Select Room</label>
                                <select class="form-control" name="txtroom"  >
                                    <option value="select">--Select--</option>
                                   <?php
                                    $q = intval($_GET['q']);

                                    $fetch = $con->query("select * from roomMaster where floor=$q");
                                    //print_r($fetch);
                                    if ($fetch) {

                                        while ($row = $fetch->fetch_assoc()) {
                                            $id = $row['roomNumber'];
                                            echo "<option value=$id>" . $row['roomNumber'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <span style="color:red">
                                     <?php
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    if($_POST['txtroom']=="select")
                                                    {
                                                        $err_room="Room is required";
                                                    }
                                                   else {
                                                        $err_room = "";
                                                    }
                                                }
                                                echo $err_room;
                                                ?>
                                </span>
                           
                         
    </body>
</html>
