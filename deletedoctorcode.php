<?php
      
           include_once 'commonMethods.php';
           doDBConnect();
           $id=$_POST['doctorId'];
           $stmt=$con->prepare("delete from doctorMaster where doctorId=?");
           $stmt->bind_param("i",$bid);
           $bid=$id;
          if ($stmt->execute() == true) {
              echo "<script>alert('Data Deleted')</script>";
              header("Location:doctor.php");
              } else {
              echo "<script>alert('Data Not Deleted')</script>";
                  }
//           $qry=$con->query("delete from staffMaster where staffID=$id");
//            if ($qry == true) {
//              echo "<script>alert('Data Deleted')</script>";
//              header("Location:staff.php");
//              } else {
//              echo "<script>alert('Data Not Deleted')</script>";
//                  }

                  ?>