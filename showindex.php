<?php
include 'include/connect.php';
session_start();

// (isset($_SESSION["login"]))

if(!((isset($_SESSION["login"])) && $_SESSION["login"]=="ok")) {
  header('location:admin/login-sign/login.php');
  exit();
}
//  $qwe = "select "
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employees</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      .heart {
    display: inline-block;
    width: 50px;
    height: 50px;
    background-image: url('adminassets/heart-empty.png');
    /* تغيير الصورة إلى ملف القلب الفارغ */
    background-size: cover;
    cursor: pointer;
}

.heart.red {
    background-image: url('adminassets/heart-red.png');
    width: 55px;

    /* تغيير الصورة إلى ملف القلب الأحمر */
}
    </style>
</head>

<body>


<?php
include 'include/connect.php';
$sql ="select * from `products`";
$result = mysqli_query($con,$sql);
while($data = mysqli_fetch_assoc($result)) {
    echo '<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">

    <div class="card col-lg-4" style="">
    <img class="card-img-top" src="admin/products/photos/'.$data['photo'].'" alt="Card image cap">
    <form>
    </form>
    <div class="card-body">
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card</p>
        
        



      </div>

    <a type="submit"  class="btn btn-primary " href="carts/showcart.php?pcid='.$data['product_id'].'">go-to-cart</a>

  </div>
 
  </div>

  </form>';
}
?>

</body>

</html>