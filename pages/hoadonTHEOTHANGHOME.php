   <?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  
     <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/popper.min.js"></script>
     <script type="text/javascript" src="js/jquery.js"></script>
     <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.js"></script>
     
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="generalFormat.css">
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
      <img src="img/quantri.jpg" class="img">
    </div>
    <div class="col-sm-4"  >
      <div class="dropdown ">
        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position: absolute;left:150px; top:92px;">
          <span><?php
            echo $_SESSION['username'] ;?></span>
        </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="fromNLCS.php">Về trang chủ</a>
    <a class="dropdown-item" href="doiMATKHAU.php">Đổi mật khẩu</a>
    <a class="dropdown-item" href="dangxuat.php">Đăng xuất</a>
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

  
  <li class="list-group-item list-group-item-primary"><a href="formthemMONAN.php">Thêm món ăn</a> </li>
  <li class="list-group-item list-group-item-secondary"><a href="capnhatHome1.php">Sửa món ăn</a></li>
  <li class="list-group-item list-group-item-success"><a href="xoaHome1.php">Xóa món ăn</a></li>
 
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
  

  
  
  <li class="list-group-item list-group-item-secondary"><a href="formthemKHACHHANG.php"> Thêm khách hàng</a></li>
  <li class="list-group-item list-group-item-success"><a href="capnhatKHACHHANGHOME.php"> Sửa khách hàng</a></li>
  <li class="list-group-item list-group-item-danger"><a href=xoaKHACHHANGHOME.php"> Xóa Khách hàng</a></li>
 
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
 
    <li class="list-group-item list-group-item-primary"><a href="hoadonTHEONGAYHOME.php"> Theo Ngày</a></li>
  <li class="list-group-item list-group-item-secondary"><a href="hoadonTHEOTHANGHOME.php"> Theo tháng</a></li>
  <li class="list-group-item list-group-item-success"><a href="hoadonTHEONAMHOME.php"> Theo năm</a></li>
  </ul>

      </div>
    </div>
  </div>
</div>
    </div>
    <div class="col-sm-8" style="background-color:white;">
       <table class="table table-bordered" style="border:1px solid black;">
   
            <?php 
    include 'connectMySQL.php';
      
     $sql = "select donhang.dh_ma,donhang.kh_ma,donhang.ad_ma,donhang.dh_ngay,donhang.dh_tongtien
                      from donhang where MONTH(CURDATE()); ";

    $result = mysqli_query($conn,$sql);

    echo "<table id='mytable'>";

    echo "<tr> <th>DH ma</th> <th> KH ma </th><th> AD ma </th><th> DH ngay </th><th>DH tong tien</th></tr>";

    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
                      echo "<td>".$row['dh_ma']."</td>";
                      echo "<td>".$row['kh_ma']."</td>";
                      echo "<td>".$row['ad_ma']."</td>";
                      echo "<td>".$row['dh_ngay']."</td>";
                      echo "<td>".$row['dh_tongtien']."</td>";
                     //  echo "<TD> <a href='formcapnhatMONAN.php?monan_ma=".$row["monan_ma"]."'>cap nhat</a> </TD>";

                                             echo "</tr>";
    }

    echo "</table>";
    mysqli_close($conn);

 ?>

 
  </table>
    </div>
  </div>
</div>


<!-- //  ,khachhang,admin,chitietdonhang where
                     // donhang.dh_ma = chitietdonhang.dh_ma -->

</body>

</html>