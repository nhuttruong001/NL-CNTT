<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  
     <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
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
      <img src="../public/image/quantri.png" class="img">
    </div>
    <div class="col-sm-4"  >
          <!-- Dropdown User -->
      <div class="dropdown" style="position: absolute;left: 150px;top: 115px;">
    <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $_SESSION['username'] ;?>
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="../pages/index.php">Về trang chủ</a></li>
      <li><a href="../controller/doiMATKHAU.php">Đổi mật khẩu</a></li>
      <li><a href="../controller/dangxuat.php">Đăng xuất</a></li>
    </ul>
  </div>
  <!-- End Dropdown User -->
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
         QUẢN LÝ MÓN 
         <i class=" fas fa-angle-down"></i>
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      <ul class="list-group">

  
  <li class="list-group-item list-group-item-primary"><a href="../pages/formthemMONAN.php">Thêm món ăn</a> </li>
  <li class="list-group-item list-group-item-secondary"><a href="../controller/capnhatHome1.php">Sửa món ăn</a></li>
  <li class="list-group-item list-group-item-success"><a href="../controller/xoaHome1.php">Xóa món ăn</a></li>
 
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
  

  
  
  <li class="list-group-item list-group-item-secondary"><a href="../pages/formthemKHACHHANG.php">Thêm khách hàng</a></li>
  <li class="list-group-item list-group-item-success"><a href="../pages/capnhatKHACHHANGHOME.php"></a>Sửa khách hàng</a></li>
  <li class="list-group-item list-group-item-danger"><a href="../pages/xoaKHACHHANGHOME.php">Xóa khách hàng</a></li>
 
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

     $sql = "select kh_ma,kh_id,kh_matkhau,kh_ten,kh_gioitinh,kh_diachi,kh_sdt
                      from khachhang ;";

    $result = mysqli_query($conn,$sql);

    echo "<table id='mytable'>";

    echo "<tr> <th>KH ma</th> <th> Ten TK </th><th> Mat khau </th><th> KH ten </th>
    <th> KH gioi tinh</th><th> KH dia chi </th><th> KH sdt </th><th> </th></tr>";

    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
                      echo "<td>".$row['kh_ma']."</td>";
                      echo "<td>".$row['kh_id']."</td>";
                      echo "<td>".$row['kh_matkhau']."</td>";
                      echo "<td>".$row['kh_ten']."</td>";
                      echo "<td>".$row['kh_gioitinh']."</td>";
                      echo "<td>".$row['kh_diachi']."</td>";
                      echo "<td>".$row['kh_sdt']."</td>";
                       echo "<TD> <a href='formcapnhatKHACHHANG.php?kh_ma=".$row["kh_ma"]."'>cap nhat</a> </TD>";
                                             echo "</tr>";
    }

    echo "</table>";
    mysqli_close($conn);

 ?>

    
 
  </table>
    </div>
  </div>
</div>


<!-- <script>
function openclick(click) {
  var i;
  var x = document.getElementsByClassName("oj");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(click).style.display = "block";  
}
</script> -->


</body>
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
</html>