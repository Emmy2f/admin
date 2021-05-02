 <?php
       if (isset($_POST['btnstaff'])) {
           include_once 'commonMethods.php';
           doDBConnect();

            //echo "<script>alert('$staffID')</script>";
         
                $fname = $_POST['txtfname'];
                $mname = $_POST['txtmname'];
                $lname = $_POST['txtlname'];
                $contact = $_POST['txtcontact'];
                $email = $_POST['txtemail'];
                $gender = $_POST['txtgender'];
                $address = $_POST['txtaddress'];
                $dob = $_POST['txtdob'];
                $doj = $_POST['txtdoj'];
                $marital = $_POST['txtmarital'];
                $stype = $_POST['txtstype'];
                $password=$_POST['txtpass'];
                $id=$_POST['id'];
                //echo "<script>alert('$fname')</script>";
                $qry=$con->query("update staffMaster set"
                        . "staffFName=$fname where staffID=$id");
                
                 if ($qry == true) {
              echo "<script>alert('Data Updated')</script>";
              header("Location:staff.php");
              } else {
              echo "<script>alert('Data Not Updated')</script>";
                  }
                
                // echo "<script>alert('$dob $doj')</script>";
                
                
                
                            
                          /*  $stmt=$con->prepare("update staffMaster set"
                                    . "staffFName=?"
                                    . "staffMName=?"
                                    . "staffLName=?"
                                    . "contactNumber=?"
                                    . "email=?"
                                    . "gender=?"
                                    . "address=?"
                                    . "dateOfBirth=?"
                                    . "dateOfJoining=?"
                                    . "maritalStatues=?"
                                    . "staffTypeId=?"
                                    
                                    . "password=?"
                                    . "where staffID=?");
                            $stmt->bind_param("sssssisssiisi",$bfname,$bmname,$blname,$bcontact,$bemail,$bgender,$baddress,$bdob,$bdoj,$bmarital,$bstype,$bpass,$id);
                            $bfname=$_POST['txtfname'];
                            $bmname=$_POST['txtmname'];
                            $blname=$_POST['txtlname'];
                            $bcontact=$_POST['txtcontact'];
                            $bemail = $_POST['txtemail'];
                $bgender = $_POST['txtgender'];
                $baddress = $_POST['txtaddress'];
                $bdob = $_POST['txtdob'];
                $bdoj = $_POST['txtdoj'];
                $bmarital = $_POST['txtmarital'];
                $bstype = $_POST['txtstype'];
                
                $bpass=$_POST['txtpass'];
                $id=$_POST['id'];
                if ($stmt->execute() == true) {
              echo "<script>alert('Data Updated')</script>";
              header("Location:staff.php");
              } else {
              echo "<script>alert('Data Not Updated')</script>";
                  }
                           * /
                           */
                            //echo "<script>alert('$qry')</script>";

//                            if ($qry == true) {
//                                echo "<script>alert('Data Inserted')</script>";
//                            } else {
//                                echo "<script>alert('Data Not Inserted')</script>";
//                            }
                
            }
        ?>