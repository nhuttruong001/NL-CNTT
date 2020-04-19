<?php
  include "bienToanCuc.php";
  include "ham.php";
  session_start();
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">

<head>
 <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="js/popper.min.js"></script>
     <script type="text/javascript" src="js/jquery.js"></script>
     <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.js"></script>
     
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="../public/css/generalFormat.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        .custom{

            margin-left: 20px;
        }

        .nhut-truong-navibar{
            position: relative;
            height: 100px;

    
         }
         .nhut-truong-img{
          position:absolute;
          top: 0px;
          left:0px;

         }
         .groove{
            border: 1px groove gray;
         }

         .front{
            color:white;
         }

#onclick{
  position : relative;
}
         #toggle{
          position : absolute;
          z-index:100;
         }

    </style>

      <script type="text/javascript">
 
         function testwarning()  {
 
              alert("Bạn cần đăng nhập trước khi làm điều này!");
         }
 
      </script>
</head>

<body>

    <header style="border-bottom: 1px solid #ffa500">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light nhut-truong-navibar d-flex flex-row-reverse">
                <a class="navbar-brand" href="#"><img src="img/logo.png" class="nhut-truong-img"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex flex-row-reverse custom" id="navbarNav" style="position: absolute;left:170px;">
                    <ul class="navbar-nav ">
                        <li class="nav-item ">
                            <a class="nav-link mr-2 ml-2 " href="../pages/index.php" ><strong> TRANG CHỦ</strong> <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mr-1 ml-1" href="../pages/huongdanmuahang.php" ><strong>HƯỚNG DẪN MUA HÀNG</strong> </a>
                        </li>

                          <li class="nav-item mr-2 ml-2">
                            <a class="nav-link" href="https://www.facebook.com/profile.php?id=100032830450868&ref=bookmarks" ><strong>FACKBOOK</strong></a>
                        </li>

                            <li class="nav-item">
                        <div class="w3-bar w3-light-grey w3-border"   >
                          <form action="searchmonan.php" method="get">
                        <input type="text" name="search" class="w3-bar-item w3-input w3-white w3-mobile" style="width: 300px;" placeholder="Search..">
                        <button class="w3-bar-item w3-button w3-blue w3-mobile" name="submit">Go</button>
                      </form>
                      </div>
                            </li>

                        <li class="nav-item mr-2 ml-2 ">
                           <span style="color: red;"> <?php if(isset($_SESSION["shoppingCart"])) echo count($_SESSION["shoppingCart"]); else echo "0"?></span>
                          <a href="../pages/viewCart.php"><h1 class="fas fa-shopping-cart" style="width: 40px; height: 50px; position: absolute;top:0px;"></h1> </a> 
                        </li>
                      
                        </ul>
                          
                       
                        </div>

                </div>

            </nav>
                                   
                    <div class="nav-item" style="position: fixed;z-index:100; right: 0px; top: 2px;">   
                                                
                            <div class="dropdown ">
                              
                               <button id="onclick" class="btn btn-primary dropdown-toggle">
                              

                                 <span>
                                
                                 <?php 
                                    if(isset($_SESSION["username"])){
                                      echo $_SESSION["username"];
                                    }else{

                                      echo ' <a href="login1.php"><button type="button" class="btn btn-primary">Đăng nhập</button><span class="sr-only">(current)</span></a> ';

                                    }

                                  ?>

                                </span> 

                                  </button>

                              <div id="toggle" style="display:none; ">

                                <a class="dropdown-item" href="login1.php">Đăng nhập</a>
                                  <a class="dropdown-item" href="doiMATKHAU.php">Đổi mật khẩu</a>  
                                <a class="dropdown-item" href="dangxuat.php">Đăng xuất</a>  
                             <?php 
                                if(isset($_SESSION['quyen'])){
                                     if($_SESSION['quyen']==1) {
                                        echo '<a href="../pages/homeQuantri.php" class="dropdown-item">Quản trị</a>'; 
                                      } 
                                }
                               ?>     
                              
                              </div>                           
                          </div>

                    

                        <a href="../pages/fromDangky.php"><button type="button" class="btn btn-primary">Đăng ký</button><span class="sr-only">(current)</span></a>
                   </div>
             
        </div>

    </header>

    <?php 

        // Nếu người dùng submit form thì thực hiện
        if (isset($_REQUEST['submit'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                include "connectMYSQL.php";

                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $sql = "select * from monan where monan_ten like '%$search%'";

                // Thực thi câu truy vấn
                $query = mysqli_query($conn,$sql);
 
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($query);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $search != "") 
                {
                    
                    echo "<div style='margin-top:70px;margin-left:220px;'><h3> $num ket qua tra ve voi tu khoa $search </h3></div> ";

                    while($row = $query->fetch_assoc()) {

                            echo  "
                                        <div class='col-md-3 mb-3' style='margin-top:75px; margin-left:220px;'>
                                        <div class='card' style='width: 100% '>
                                        <img src='../public/image/".$row["IMAGE"]."' class='card-img-top' alt='Card image cap' width='450px' height='350px' >
                                          <div class='card-body'>
                                           <h5 class='card-title'>".$row["MONAN_TEN"]."&nbsp;&nbsp;&nbsp;&nbsp; Giá:".$row["MONAN_GIA"]."</h5> 
                                               <p class='card-text'>".$row["MONAN_DIENGIAI"]."</p>        
                                          </div>
                                          </div>
                                        </div> ";
                         
         
                    }
                }
                   
             
                else {
                    echo "Khong tim thay ket qua!";
                }
            }
     
        }
?>

<?php include "footer.php"; ?>

</body>
</html>

