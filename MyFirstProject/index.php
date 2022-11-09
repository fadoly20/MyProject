<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./css/style.css">

    <title>المشروع</title>
</head>
<body>

    <div class="container">
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
        
        <img src="./images/tvtc.jpg" width="300" height="300"><br>
      <h4><br>
        يا ترى من الرابح هنا؟
    </h4>
      <p class="lead fw-normal">الوقت المتبقي</p>
      <h5 id="Cdown"></h5>

      <ul class="list-group">
    <li class="list-group-item" style="background-color: red;">
    عمل الطالب : فاضل بدر المسلم
    </li>

    <li class="list-group-item" style="background-color: green;">
    الرقم الأكاديمي : 441104103
    </li>

    <li class="list-group-item" style="background-color: blue;">
        النظام المستخدم : كالي لينكس Kali Linux
    </li>

    <li class="list-group-item" style="background-color: yellow;">
        برنامج السيرفر الوهمي : اكسامب Xampp
    </li>

    <li class="list-group-item" style="background-color: brown;">
        مقر الدراسة : الكلية التقنية بالدمام TVTC
    </li>
</ul>
    </div>
  </div>
</div>
<?php
echo '<br>';
  
include './inc/con.php';
include './inc/form.php';

$sql_select = 'SELECT * FROM users  ORDER BY RAND() LIMIT 1';
$result = mysqli_query($conn, $sql_select);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

?>

<div class="position-relative text-right">
    <div class="col-md-5 mx-auto">
        
  <form action="index.php" method="POST">
        <h2>
            من فضلك قم بإدخال المعلومات التالية
        </h2><br>
        <div class="mb-3">
    <label for="firstName" class="form-label">
        الإسم الأول
    </label>
    <input type="text" name="firstname" id="firstName" value ="<?php echo $firstName ?>" class="form-control"  aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text error"> <?php error_reporting(0); echo $errors['firstNameError']?> </div>
        </div>

        <div class="mb-3">
    <label for="lastName" class="form-label">
        الإسم الأخير
    </label>
    <input type="text" name="lastname" id="lastName" value ="<?php echo $lastName ?>" class="form-control"  aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text error"> <?php error_reporting(0); echo $errors['lastNameError'] ?> </div>
        </div>
        
        <div class="mb-3">
    <label for="email" class="form-label">
        البريد الإلكتروني
    </label>
    <input type="text" name="email" id="email" value ="<?php echo $email ?>" class="form-control"  aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text error"> <?php error_reporting(0); echo $errors['emailError'] ?> </div>
        </div>

  <button type="submit" name="submit" class="btn btn-primary">
    إرسال المعلومات
    </button>

</form>
</div>
  </div>

    <!-- Button trigger modal -->
    <div class="d-grid gap-2 col-6 mx-auto my-5">
<button id="winner" type="button" class="btn btn-primary">
 اختيار الفائز 
</button>
</div>




<div class="loader-con">
<div id="loader">
	<canvas id="circularLoader" width="200" height="200"></canvas>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">الفائز معنا هو : </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>


      <div class="modal-body">
      <?php 
foreach($users as $user){
    echo '
    
        
        
        <div class="card-body">
    ';
    
    echo '<h4 class="display-3 text-center card-title">'. htmlspecialchars($user['firstName'])." " .htmlspecialchars($user['lastName']) .
    '</h4>'.'<br>'; 
    
    echo '
        </div>
    ';
}
?>
      </div>
    </div>
  </div>
</div>

<div id="cards" class="row mb-5 pb-5">
    
    <?php 
foreach($users as $user){
    echo '
    
        <div class="col-sm-6">
        <div class="card my-2 bg-light">
        <div class="card-body">
    ';
    
    echo '<h5 class="card-title">'. htmlspecialchars($user['firstName'])." " .htmlspecialchars($user['lastName']) .
    '</h5>'.'<br>'. htmlspecialchars($user['email']).'<br><br>'; 
    
    echo '
        </div>
     </div>
   </div> 
    ';
}
?>
</div>
</div>

<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/loader.js"> </script>
<script src="./js/script.js"> </script>

</body>
</html>