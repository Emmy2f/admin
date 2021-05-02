 <?php
      
           include_once 'commonMethods.php';
           doDBConnect();
           $id=$_POST['staffID'];
           $qry=$con->query("delete from staffMaster where staffID=$id");
            if ($qry == true) {
              echo "<script>alert('Data Deleted')</script>";
              header("Location:staff.php");
              } else {
              echo "<script>alert('Data Not Deleted')</script>";
                  }

                  ?>
