<?php
include '../include/connect.php';
session_start();

if(isset($_POST['cart'])) {
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $rate = $_POST['rate'];
    $product_id = $_POST['product_id'];
    $allquantity = $_POST['allquantity'];
    $currentquantity = $_POST['currentquantity'];
    $user_id = $_SESSION['user_id'];
if($currentquantity>0){
  $stmt = "insert into `quantities` (quantity,product_id,price,user_id) values('$quantity','$product_id','$price','$user_id')";
  $result = mysqli_query($con, $stmt);

}else{
  echo '......لا يوجد منتجات اخري من هدا المنتج';
}
    // $stmt = "insert into `quantities` (quantity,product_id,price) values('$quantity','$product_id','$price')";
   if(!empty($rate)){
    $che= "insert into `rating` (product_id,rate) values('$product_id','$rate')";
    $rate = mysqli_query($con, $che);
   }




    // $currentquantity = $_POST['currentquantity'];
    $product_id=$_GET['pcid'];
    $amount = array();
    $qwe="SELECT * FROM quantities WHERE product_id='$product_id' ";
    $result = mysqli_query($con, $qwe);


    if($result) {
        while($row = mysqli_fetch_assoc($result)) {
            $sold = $row['quantity'];
            $asd= $currentquantity - $sold;
            $amount[]=$row['quantity'] * $row['price'];
            if($asd>=0){
              $stmt = "UPDATE products SET currentquantity = '$asd' WHERE  product_id='$product_id'";
              $check = mysqli_query($con, $stmt);

            }
           

        }
        echo  'السعر الحالي '.array_sum($amount);


    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employees</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      /* * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
} */

/* body {
    height: 100vh;
    width: 100vw;
    display: flex;
    justify-content: center;
    align-items: center;
} */

.container {
    background-color: aliceblue;
}

.star {
    border: none;
    background-color: unset;
    color: goldenrod;
    font-size: 3rem;
    cursor: pointer;
}
.star:hover{
   color:goldenrod; 
}

p {
    text-align: center;
}
      .heart {
    display: inline-block;
    width: 50px;
    height: 50px;
    background-image: url('../adminassets/heart-empty.png');
    /* تغيير الصورة إلى ملف القلب الفارغ */
    background-size: cover;
    cursor: pointer;
}

.heart.red {
    background-image: url('../adminassets/heart-red.png');
    width: 55px;

    /* تغيير الصورة إلى ملف القلب الأحمر */
}
    </style>
</head>

<body>


<?php
// include 'include/connect.php';
$product_id=$_GET['pcid'];
// echo $product_id;
$sql ="select * from `products` where product_id='$product_id'";
$result = mysqli_query($con,$sql);
while($data = mysqli_fetch_assoc($result)) {
    echo '     <form action="" method="POST" enctype="multipart/form-data">

    <div class="row" >

    <div class="card col-lg-4" >
    <img class="card-img-top" src="../admin/products/photos/'.$data['photo'].'" alt="Card image cap">
    <div class="card-body">
    <a class="star">&#9734;</a>
    <a class="star">&#9734;</a>
    <a class="star">&#9734;</a>
    <a class="star">&#9734;</a>
    <a class="star">&#9734;</a>
    <p class="current-rating">0 of 5</p>
      <p class="card-text">Some quick example texup the bulk of the card</p>
      <input type="hidden" name="rate" class="rating">
      <input type="hidden" name="product_id" value="'.$data['product_id'].'">
      <input type="hidden" name="price" value="'.$data['price'].'">
      <input type="number" name="quantity" value="1">
      <input type="hidden" name="allquantity" value="'.$data['quantity'].'">
      <input type="hidden" name="currentquantity" value="'.$data['currentquantity'].'">


      </div>

    <button type="submit" name="cart" class="btn btn-primary ">add-to-cart</buttom>

  </div>
 
  </div>

  </form>
';
}
?>
<script>
   // استرجاع حالة القلب من الذاكرة المحلية عند تحميل الصفحة
window.onload = function () {
  const heart = document.querySelector(".heart");
  const heartState = localStorage.getItem("heartState");

  if (heartState === "red") {
    heart.classList.add("red");
  }
};

function changeHeartColor(heart) {
  heart.classList.toggle("red");

  // حفظ حالة القلب في الذاكرة المحلية
  if (heart.classList.contains("red")) {
    localStorage.setItem("heartState", "red");
  } else {
    localStorage.removeItem("heartState");
  }
}
const stars=document.querySelectorAll('.star');
const current_rating=document.querySelector('.current-rating');
const rating=document.querySelector('.rating');


stars.forEach((star,index)=>{
  star.addEventListener('click',()=>{

    let current_star=index+1;
    current_rating.innerHTML=`${current_star} of 5`;
    rating.value=`${current_star} `;


    stars.forEach((star,i)=>{
        if(current_star>=i+1){
          star.innerHTML='&#9733;';
        }else{
          star.innerHTML='&#9734;';
        }
    });

  });
});

</script>
</body>

</html>