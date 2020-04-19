<?php
    session_start();
?>

<?php

  include "connectMYSQL.php";

  $sql = "insert into donhang(kh_ma,ad_ma,dh_ngay,dh_tongtien) 
        values('".$_SESSION['kh_ma']."','1',CURDATE(),0)";
        mysqli_query($conn,$sql);
          foreach($_SESSION['shoppingCart'] as $x => $values){

          $sql1 ="insert into chitietdonhang(dh_ma,monan_ma,ctdh_soluong,ctdh_dongia) values ((select dh_ma from donhang order by dh_ma desc limit 1), '".$x."','".$values."', (select monan_gia from monan where monan_ma = '".$x."'));";
          

          mysqli_query($conn,$sql1);
       
          $sql2 = "update donhang set dh_tongtien = dh_tongtien + ".$values." * (select monan_gia from monan where monan_ma = '".$x."') where dh_ma = (select dh_ma from donhang order by dh_ma desc limit 1);";
         $result2 = mysqli_query($conn,$sql2);
     
        }

        if($result2){
          echo "Bạn đã mua hàng thành công!";
          echo "Hàng sẽ được giao cho bạn ngay!";
          echo "<meta http-equiv='refresh' content='2;url=../pages/index.php'>";
          unset($_SESSION["shoppingCart"]);
        }else{
          echo "Thanh toán thất bại";
           echo "<meta http-equiv='refresh' content='2;url=../pages/viewCart.php'>";
        }

  

?>