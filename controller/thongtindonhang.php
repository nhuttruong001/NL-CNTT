<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<div class="col-sm-12" style="background-color:white;">
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