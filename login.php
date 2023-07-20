<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta name="author" content="Mayuri K">
  

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="img/favicon.png">
    <title>Sistema de Gestion de Hospital</title>

    
    
</head>
<body>
    <?php

    //learn from w3schools.com
    //Unset all the server side variables

    session_start();

    $_SESSION["user"]="";
    $_SESSION["usertype"]="";
    
    // Set the new timezone
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d');

    $_SESSION["date"]=$date;
    

    //import database
    include("connection.php");

    



    if($_POST){

        $email=$_POST['useremail'];
        $password=$_POST['userpassword'];
        
        $error='<label for="promter" class="form-label"></label>';

        $result= $database->query("select * from webuser where email='$email'");
        if($result->num_rows==1){
            $utype=$result->fetch_assoc()['usertype'];
            if ($utype=='p'){
                //TODO
                $checker = $database->query("select * from patient where pemail='$email' and ppassword='$password'");
                if ($checker->num_rows==1){


                    //   Patient dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='p';
                    
                    header('location: patient/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }

            }elseif($utype=='a'){
                //TODO
                $checker = $database->query("select * from admin where aemail='$email' and apassword='$password'");
                if ($checker->num_rows==1){


                    //   Admin dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='a';
                    
                    header('location: admin/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }


            }elseif($utype=='d'){
                //TODO
                $checker = $database->query("select * from doctor where docemail='$email' and docpassword='$password'");
                if ($checker->num_rows==1){


                    //   doctor dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='d';
                    header('location: doctor/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }

            }
            
        }else{
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">We cant found any acount for this email.</label>';
        }






        
    }else{
        $error='<label for="promter" class="form-label">&nbsp;</label>';
    }

    ?>





   <center>
     <div class="container">
    <div class="col-lg-6 col-md-5 d-flex login-box box-skew1">
        
        <table>
            <tr>
                <a class="login-logo" href="">
                       <img src="img/logo.png" alt="" width="20px">
                </a>
                <td>
                   <h3>Sistema de Gestion de Hospital</h3>
                   <p class="">Inicie sesión</p>
                </td>
            </tr>
        <div class="form-body">
           
            <tr>
                <form action="" method="POST" >
                <td class="label">
                    <label for="useremail" class="form-label">Email: </label>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <input type="email" name="useremail" class="form-control" placeholder="Email Address" required>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <label for="userpassword" class="form-label">Clave: </label>
                </td>
            </tr>

            

            <tr>
                <td class="label">
                    <input type="Password" name="userpassword" class="form-control" placeholder="Password" required>
                </td>
            </tr>



           <tr>
                <td class="label">
                     <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                
                            <label class="form-check-label" for="basic_checkbox_1">Recuerda mi preferencia</label>
                       
                </td>
            </tr>
            <tr>
                <td><br>
                <?php echo $error ?>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" value="Login" class="login-btn btn-primary btn">
                </td>
            </tr>
        </div>
            <tr>
                <td>
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">No tengo una cuenta&#63; </label>
                    <a href="signup.php" class="hover-link1 non-style-link">Registrese</a>
                    <br><br><br>
                </td>
            </tr>
                   
                    </form>
        </table>

    </div>
             <div class="col-lg-6 col-md-5 d-flex back">
                
             </div>
 </div>
</center>
<!--  Orginal Author Name: Mayuri K. 
 for any PHP, Codeignitor, Laravel OR Python work contact me at info@compubinario.com  
 Visit website : www.mayurik.com -->  
</body>
</html>
   
            <!-- <div class="col-lg-6 col-md-5 d-flex box-skew1">
                
            </div>
         -->
