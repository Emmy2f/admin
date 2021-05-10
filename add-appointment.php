<?php
session_start();
if (!isset($_SESSION['receptionist'])) {
    header("Location:login.php");
}
?>
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
        <?php include 'styles.php'; ?>
        <?php include 'rheader.php'; ?>
        <?php include 'rsidebar.php'; ?>
        <?php
        include_once 'commonMethods.php';
        doDBConnect();
        ?>
        <script>
            
           

            function show(str) {
                if (str == "") {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "fetchday.php?q=" + str, true);
                    xmlhttp.send();
                }
            }
//            
            function showtime(str) {
                //alert(str);
                if (str == "") {
                    document.getElementById("txtHint2").innerHTML = "";
                    return;
                }
                 else {
                    // alert(str);
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                       
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtHint2").innerHTML = this.responseText;
                        }
                    };
                    //str2="hello";
                    str2=document.getElementById('txtdoctor').value;
                    xmlhttp.open("GET", "fetchtime.php?q=" + str+"&d="+str2, true);
                    xmlhttp.send();
                }
            }
            
          
        </script>
       
    </head>
    <body>
        <div class="page-wrapper">
            <div class="content">
                <div class='row'>
                    <div class="col-lg-8 offset-lg-2">
                        <div class="form-group">
                            <label>Select Doctor</label>
                            <select class="form-control" name="txtdoctor" id='txtdoctor' onchange="show(this.value)">
                                <option value="select" >--Select--</option>
                                <?php
                                $fetch = $con->query("select * from doctorMaster");
                                if ($fetch) {

                                    while ($row = $fetch->fetch_assoc()) {
                                        $id = $row['doctorId'];
                                        echo "<option value=$id>" . $row['firstName'] . " " . $row['lastName'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-8 offset-lg-2">
                        <div class="form-group">
                            <label>Select Day</label>
                            <select class="form-control" name="txtday" id="txtHint" onchange="showtime(this.value)">
                                <option value="select">--Select--</option>
                                
                            </select>

                        </div>

                    </div>
                    
                    <div class="col-lg-8 offset-lg-2">
                        <div class="form-group">
                            <label>Select Time</label>
                            <select class="form-control" name="txttime" id="txtHint2" >
                                <option value="select">--Select--</option>
                                
                            </select>

                        </div>

                    </div>

                </div>


            </div>
        </div>

    </div>

</body>
</html>
