<?php
include("conn.php");
if(isset($_POST['Register']))
    {
        $fn=$_POST['fname'];
        $ln=$_POST['lname'];
        $em=$_POST['email'];
        $age=$_POST['age'];
        $phn=$_POST['phone'];
        $address=$_POST['address'];
        $file=$_POST['file'];
        
        session_start();
        $_SESSION['fname'] = $fn;
        $_SESSION['lname'] = $ln;
        $_SESSION['email'] = $em;
        $_SESSION['age'] = $age;
        $_SESSION['phone'] = $phn;
        $_SESSION['address'] = $address;
        $_SESSION['file'] = $file;
        $fnameErr="";
        $lnameErr="";
        $emailErr="";
        $ageErr="";
        $phoneErr=""; 
        $addressErr="";

        if (empty($fn)){
            $fnameErr = "Please Enter First Name";
        }
        elseif (!preg_match("/^[a-zA-Z]*$/",$fn)){
            $fnameErr = "Only Letters And White Space Allowed";
        }
        
        //LName
        if (empty($ln)){
            $lnameErr = "Please Enter Last Name";
        }
        elseif (!preg_match("/^[a-zA-Z]*$/",$ln)){
            $lnameErr = "Only Letters And White Space Allowed";
        }
        if (empty($em)){
            $emailErr = "Please Enter Full Email with '@' and '.'";
        }
        elseif (!filter_var($em,FILTER_VALIDATE_EMAIL)){
            $emailErr = "Please Enter Full Email with '@' and '.'";
        }
        if (empty($age)){
            $ageErr = "Please Enter Your Age";
        }
        elseif($age<=18)
        {
            $ageErr="PLease Enter more then 18";
        }

        if (empty($phn)){
            $phoneErr = "Please Enter Mobile No upto 10 Digits";
        }
        elseif (!preg_match("/^\d{10}+$/",$phn)){
            $phoneErr = "Please Enter Mobile No upto 10 Digits";
        }
        if (empty($address)){
            $addressErr = "Please Enter Your Address";
        }
       
        
       
        if(!$fnameErr && !$lnameErr && !$emailErr && !$ageErr && !$phoneErr && !$addressErr ){
            $str = "Insert into tbreg(fname,lname,email,age,phone,address,docpdf) values ('$fn','$ln','$em','$age','$phn','$address','$file')";
            $q = mysqli_query($conn,$str);
     
            if ($q) {
                echo "<script>alert('Successfully Registered. You can login now');</script>";
            }
        }
        else{
            echo "<script>alert('Please Fill The Remaining Fields !!')</script>";
        }
       
    }  
?>
<html>
    <head>
        <title> Registration Form</title>
    </head>
    <body>
        <form name="form1" method="post" action="design.php">
            <table align="center" >
                <tr>
                    <td>First Name</td>
                    <td><input type="text" class="form-control" name="fname" value="<?php if(isset($fn)){echo $_SESSION['fname'];}?>" placeholder="First Name">
                            <span class="text-danger"><?php if(isset($fnameErr)){echo $fnameErr;}?></span></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" class="form-control" name="lname" value="<?php if(isset($ln)){echo $_SESSION['lname'];}?>" placeholder="Last Name">
                            <span class="text-danger"><?php if(isset($lnameErr)){echo $lnameErr;}?></span></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" class="form-control"   value="<?php if(isset($em)){echo $_SESSION['email'];}?>"     placeholder="Email" name="email">
                            <i class="fa fa-envelope"></i> </span>
                                     <span id="user-availability-status1" style="font-size:12px;"></span>
                                <span class="text-danger"><?php if (isset($emailErr)){echo $emailErr;}?></span></td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td><input type ="day" name="age" value="<?php if(isset($age)){echo $_SESSION['age'];}?>"/>
                    <span class="text-danger"><?php if (isset($ageErr)){echo $ageErr;}?></span></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" class="form-control" value="<?php if(isset($phn)){echo $_SESSION['phone'];}?>" placeholder="Phone number" name="phone" minlength="10" maxlength="10">
                             <span class="text-danger"><?php if (isset($phoneErr)){echo $phoneErr;}?></span></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" class="form-control" value="<?php if(isset($address)){echo $_SESSION['address'];}?>" placeholder="Address" name="address" >
                             <span class="text-danger"><?php if (isset($addressErr)){echo $addressErr;}?></span></td>
                </tr>
                <tr>
                    <td>File</td>
                    <td><input type="file"name="file" value="<?php if(isset($file)){echo $_SESSION['file'];}?>" ></td>
                </tr>

                <tr>
                    <td>
                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="Register">Register</button>
                    </td>
                </tr>
               
            </table>
        </form>
    </body>
</html>