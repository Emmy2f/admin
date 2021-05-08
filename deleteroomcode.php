<?php


           include_once 'commonMethods.php';
           doDBConnect();
           $id=$_POST['roomNumber'];
           $stmt=$con->prepare("delete from roomMaster where roomNumber=?");
           $stmt->bind_param("i",$bid);
           $bid=$id;
          if ($stmt->execute() == true) {
              echo "<script>alert('Data Deleted')</script>";
              header("Location:rooms.php");
              } else {
              echo "<script>alert('Data Not Deleted')</script>";
                  }
