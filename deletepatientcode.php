 <?php
      
           include_once 'commonMethods.php';
           doDBConnect();
           $id=$_POST['editid'];
           $qry=$con->query("delete from patientMaster where patientId=$id");
            if ($qry == true) {
              echo "<script>alert('Data Deleted')</script>";
              header("Location:patients.php");
              } else {
              echo "<script>alert('Data Not Deleted')</script>";
                  }

                  ?>
