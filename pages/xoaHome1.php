<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  
     <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="js/popper.min.js"></script>
     <script type="text/javascript" src="js/jquery.js"></script>
     <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.js"></script>
     
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/generalFormat.css">
</head>
<style type="text/css">
  .img{
    width: 150px;
    height: 150px;
    margin-left: 100px;
  }

</style>
<body>
<div class="container-fluid">
 
  <div class="row" style="background-color: gray">
    <div class="col-sm-8" >
      <img src="../public/image/quantri.jpg" class="img">
    </div>
    <div class="col-sm-4"  >
      <div class="dropdown ">
        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position: absolute;left:150px; top:92px;">
          <span><?php
            echo $_SESSION['username'] ;?></span>
        </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="../pages/index.php">Về trang chủ</a>
    <a class="dropdown-item" href="../controller/doiMATKHAU.php">Đổi mật khẩu</a>
    <a class="dropdown-item" href="../controller/dangxuat.php">Đăng xuất</a>
  </div>
</div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <h1>Admin</h1>
  <div class="row">
    <div class="col-sm-4" style="background-color:green;">
      <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         QUẢN LÝ MÓN ĂN
         <i class=" fas fa-angle-down"></i>
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      <ul class="list-group">

  
  <li class="list-group-item list-group-item-primary"><a href="../pages/formthemMONAN.php">Thêm món ăn</a> </li>
  <li class="list-group-item list-group-item-secondary"><a href="../pages/capnhatHome1.php">Sửa món ăn</a></li>
  <li class="list-group-item list-group-item-success"><a href="../pages/xoaHome1.php">Xóa món ăn</a></li>
 
</ul>

      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          QUẢN LÝ KHÁCH HÀNG
          <i class=" fas fa-angle-down"></i>
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
      <ul class="list-group">
  

  
  
<li class="list-group-item list-group-item-secondary"><a href="../pages/formthemKHACHHANG.php"> Thêm khách hàng</a></li>
  <li class="list-group-item list-group-item-success"><a href="../pages/capnhatKHACHHANGHOME.php"> Sửa khách hàng</a></li>
  <li class="list-group-item list-group-item-danger"><a href="../pages/xoaKHACHHANGHOME.php"> Xóa Khách hàng</a></li>
 
</ul>

      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          QUẢN LÝ HÓA ĐƠN
         <i class=" fas fa-angle-down"></i>
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
     <ul class="list-group">
 
    <li class="list-group-item list-group-item-primary"><a href="../pages/hoadonTHEONGAYHOME.php"> Theo Ngày</a></li>
  <li class="list-group-item list-group-item-secondary"><a href="../pages/hoadonTHEOTHANGHOME.php"> Theo tháng</a></li>
  <li class="list-group-item list-group-item-success"><a href="../pages/hoadonTHEONAMHOME.php"> Theo năm</a></li>
  </ul>

      </div>
    </div>
  </div>
</div>
    </div>
    <div class="col-sm-8" style="background-color:white;">
       <table class="table table-bordered" style="border:1px solid black;">
   
      <?php 
    $servername = '127.0.0.1';
    $username = 'root';
    $password = '';
    $database = 'nlcs';


    $conn = mysqli_connect($servername,$username,$password,$database);
  $conn->set_charset("utf8");
    if(!$conn){
      die("Connect failed".mysqli_connect_error());
    }

     $sql = "select monan_ma,monan.loai_ma,monan_ten,monan_gia,monan_diengiai,image
                      from monan,loai where
                     monan.loai_ma = loai.loai_ma order by monan.loai_ma;";

    $result = mysqli_query($conn,$sql);

    echo "<table id='mytable'>";

    echo "<tr> <th>Mon an ma</th> <th> Loai ma </th><th> Mon an ten </th><th> Mon an gia </th><th> Mon an dien giai</th><th> Image </th><th></th></tr>";

    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
                      echo "<td>".$row['monan_ma']."</td>";
                      echo "<td>".$row['loai_ma']."</td>";
                      echo "<td>".$row['monan_ten']."</td>";
                      echo "<td>".$row['monan_gia']."</td>";
                      echo "<td>".$row['monan_diengiai']."</td>";
                      echo "<td>".$row['image']."</td>";
                      echo "<TD> <a href='xoaMONAN_.php?monan_ma=".$row["monan_ma"]."'>xoa</a> </TD>";
                                             echo "</tr>";
    }

    echo "</table>";
    mysqli_close($conn);

 ?>

    
 
  </table>
    </div>
  </div>
</div>


</body>
 
</html>