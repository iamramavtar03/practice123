<?php 
    include('Connection.php');
    if(isset($_POST['Register']))
    {
        $fn=$_POST['fname'];
        $ln=$_POST['lname'];
        $dob=$_POST['dob'];
        $phn=$_POST['phone'];
        $em=$_POST['email'];
        $pass=$_POST['password'];
        $cfp=$_POST['cpassword'];
        session_start();
        $_SESSION['fname'] = $fn;
        $_SESSION['lname'] = $ln;
        $_SESSION['dob'] = $dob;
        $_SESSION['phone'] = $phn;
        $_SESSION['email'] = $em;
        $_SESSION['password'] = $pass;
        $_SESSION['cpassword'] = $cfp;
        //FName
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
    
        //Gender
        if (empty($gn)){
            $gnErr = "Please Select anyone of the Above Gender";
        }
    
        //DOB
        if (empty($dob)){
            $dobErr = "Please Enter Your Date Of Birth";
        }
    
        //Phone
        if (empty($phn)){
            $phoneErr = "Please Enter Mobile No upto 10 Digits";
        }
        elseif (!preg_match("/^\d{10}+$/",$phn)){
            $phoneErr = "Please Enter Mobile No upto 10 Digits";
        }
    
        //EMail
        if (empty($em)){
            $emailErr = "Please Enter Full Email with '@' and '.'";
        }
        elseif (!filter_var($em,FILTER_VALIDATE_EMAIL)){
            $emailErr = "Please Enter Full Email with '@' and '.'";
        }
    
        //Password
        if (empty($pass)){
            $passwordErr = "Please Enter Password";
        }
        
        //confirm Password
        if (empty($cfp)){
            $cpasswordErr = "Please Enter Confirm Password";
        } 
    
        if(!$fnameErr && !$lnameErr && !$gnErr && !$dobErr && !$phoneErr && !$bloodErr && !$emailErr && !$passwordErr && !$cpassswordErr){
            $str = "Insert into signup_master(first_name,last_name,gender,phone,email,password) values ('$fn','$ln','$gn','$phn','$em','$pass')";
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
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register_page</title>
    <meta name="description" content="Register_page">
    <meta name="v iewport" content="width=device-width, initial-scale=1">
<link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" href="">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
<!--  <script type="text/javascript">
function valid()
{
 if(document.registration.password.value!= document.registration.password_again.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.registration.password_again.focus();
return false;
}
return true;
}
</script> -->
</head>
<body class="bg-light">
<div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">   
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
<div class="login-form">
                    <form action="Register_page.php" method="POST">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="fname" value="<?php if(isset($fn)){echo $_SESSION['fname'];}?>" placeholder="First Name">
                            <span class="text-danger"><?php if (isset($fnameErr)){echo $fnameErr;}?></span>
                        </div>
                        
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lname" value="<?php if(isset($ln)){echo $_SESSION['lname'];}?>" placeholder="Last Name">
                            <span class="text-danger"><?php if (isset($lnameErr)){echo $lnameErr;}?></span>
                        </div>
<div class="form-group">
                            <label>Gender</label><br>
                            Male :&nbsp;<input type="Radio" name="gn" class="" value="Gender" style="size: 20px" >
                             &nbsp;&nbsp;Female :&nbsp;<input type="Radio" name="gn" class="" value="Gender" style="size: 20px">
                             <span class="text-danger"><?php if (isset($gnErr)){echo $gnErr;}?></span>
                            
                       </div>
                    
                       <div>
                           Birthdate:&nbsp &nbsp<input type="date" value="days" class="" name="dob">
                           <span class="text-danger"><?php if (isset($dobErr)){echo $dobErr;}?></span>
                        </div>
                    
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" value="<?php if(isset($phn)){echo $_SESSION['phone'];}?>" placeholder="Phone number" name="phone" minlength="10" maxlength="10">
                             <span class="text-danger"><?php if (isset($phoneErr)){echo $phoneErr;}?></span>
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <label>Email address</label>
                            <span class="input-icon">
                            <input type="email" class="form-control"   value="<?php if(isset($em)){echo $_SESSION['email'];}?>"     placeholder="Email" name="email">
                            <i class="fa fa-envelope"></i> </span>
                                     <span id="user-availability-status1" style="font-size:12px;"></span>
                                <span class="text-danger"><?php if (isset($emailErr)){echo $emailErr;}?></span>
                        </div>
<div class="form-group">
                            <label>Password</label>
                            <span class="input-icon">
                            <input type="password" class="form-control" value="<?php if(isset($pass)){echo $_SESSION['password'];}?>" minlength="6" placeholder="Password" name="password">
                            <i class="fa fa-lock"></i> </span>
                                <span class="text-danger"><?php if (isset($passwordErr)){echo $passwordErr;}?></span>
                        </div>
<div class="form-group">
                            <label>Confirm Password</label>
                            <span class="input-icon">
                            <input type="password" class="form-control" placeholder="Confirm Password" value="<?php if(isset($cfp)){echo $_SESSION['cpassword'];}?>" minlength="6" name="cpassword">
                            <i class="fa fa-lock"></i> </span>
                                <span class="text-danger"><?php if (isset($cpasswordErr)){echo $cpasswordErr;}?></span>
                        </div>
<div class="checkbox">
                            <label>
                                <input type="checkbox"> Agree the terms and policy
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="Register">Register</button>
                        
                        <div class="register-link m-t-15 text-center">
                          <p>Already have account ? <a href="login2.php"> Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
if(empty($_FILES["filename"]['type']))

        {
            $uploadresumeErr="* Upload Your Resume";
            $valid=false;
        }
        else
        {
            $_FILES["filename"]['type'] = 'application/pdf';
            $_FILES["filename"]['type'] = 'application/msword';
       {
        $uploadresume=test_input($_POST["filename"]);

       }
       }    
