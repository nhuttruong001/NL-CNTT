<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <link rel="stylesheet" href="generalFormat.css">
</head>
<body>
  <div id="headContainer">
          <div id="headContainerLeft" class="dividedLeft">
              <h3 class="tittle">Quản lý món ăn</h3>
          </div>

          <div id="headContainerRight" class="dividedRight">
              <b class="tittleContent"> Cập nhật thông tin món ăn</b>
          </div>
</div>

 <div id="generalContainer">
          <div id="menuContainer" class="dividedLeft">
            <ul id="menuList">
              <li class="subParent"><a href="><b> Món ăn</b></a><hr></li>
                  <li id="selected" class="subChild"><a href=""> Cập nhật</a></li>
                  <li class="subChild"  class="subChild"><a href="#"> Thêm</a></li>
                  <li class="subChild"><a href=""> Xóa</a></li>


            </ul>


            </div>
            <div>
               <?php 
    $servername = '127.0.0.1';
    $username = 'root';
    $password = '';
    $database = 'nlcs';


    $conn = mysqli_connect($servername,$username,$password,$database);

    if(!$conn){
      die("Connect failed".mysqli_connect_error());
    }

     $sql = "select monan_ma,monan.loai_ma,monan_ten,monan_gia,monan_diengiai,image
                      from monan,loai where
                     monan.loai_ma = loai.loai_ma order by monan.loai_ma;";

    $result = mysqli_query($conn,$sql);

    echo "<table border=1>";

    echo "<tr> <th>Mon an ma</th> <th> Loai ma </th><th> Mon an ten </th><th> Mon an gia </th><th> Mon an dien giai</th><th> Image </th><th></th><th></th></tr>";

    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
                      echo "<td>".$row['monan_ma']."</td>";
                      echo "<td>".$row['loai_ma']."</td>";
                      echo "<td>".$row['monan_ten']."</td>";
                      echo "<td>".$row['monan_gia']."</td>";
                      echo "<td>".$row['monan_diengiai']."</td>";
                      echo "<td>".$row['image']."</td>";
                       echo "<TD> <a href='formcapnhatMONAN.php?monan_ma=".$row["monan_ma"]."'&tenmonan=>cap nhat</a> </TD>";

                                             echo "</tr>";
    }

    echo "</table>";
    mysqli_close($conn);

 ?>

              
            </div>
          </div>

 
</body>
</html>





