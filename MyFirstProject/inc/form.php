<?php
$firstName =    $_POST['firstname'];
$lastName =     $_POST['lastname'];
$email =        $_POST['email'];

$errors =[
    'firstNameError' => '',
    'lastNameError' => '',
    'emailError' => '',
] ;
if (isset($_POST['submit'])) {

    if(empty($firstName)){

        $errors ['firstNameError'] = '
        <font color="red"><b>
        الرجاء إدخال الإسم الأول*
        </b></font>
        ';
        //echo "plaese enter your first name <br>";
    }

    if(empty($lastName)){

        $errors ['lastNameError'] = '
        <font color="red"><b>
        الرجاء إدخال الإسم الأخير*
        </b></font>
        ';
        //echo "plaese enter your last name <br>";
    }

    if(empty($email)){

        $errors ['emailError'] = '
        <font color="red"><b>
        الرجاء إدخال البريد الإلكتروني*
        </b></font>
        ';
        //echo "plaese enter your email <br>";
    }

    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){

        $errors ['emailError'] = '
        <font color="red"><b>
        الرجاء إدخال بريد إلكتروني صحيح*
        </b></font>
        ';
       // echo "plese enter a correct email <br>";
    }


    if(!array_filter($errors)){

        $firstName =    mysqli_real_escape_string($conn ,$_POST['firstname']);
        $lastName =     mysqli_real_escape_string($conn ,$_POST['lastname']);
        $email =        mysqli_real_escape_string($conn ,$_POST['email']);


        $sql = "INSERT INTO users(firstName , lastName , email)
                VALUES ('$firstName' , '$lastName','$email') ";


            if(mysqli_query($conn , $sql)){

                header('Location: index.php');
            }
                else{
            echo "somthing is wrong ". mysqli_error($conn);
    }
  }
}
/*

*/
?>