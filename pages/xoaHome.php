<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="generalFormat.css">
    <title>Xóa Món ăn</title>
  </head>
  <body>
      <div id="headContainer">
          <div id="headContainerLeft" class="dividedLeft">
              <h3 class="tittle">Quản lý Món ăn</h3>
          </div>

          <div id="headContainerRight" class="dividedRight">
              <b class="tittleContent">Xóa món ăn</b>
          </div>


      </div>

      <div id="generalContainer">
          <div id="menuContainer" class="dividedLeft">
              <ul id="menuList">
                  <li class="subParent"><a href=""><b> Món ăn</b></a><hr></li>
                  <li class="subChild"><a href=""> Cập nhật</a></li>
                  <li class="subChild"><a href=""> Thêm</a></li>
                  <li id="selected" class="subChild"><a href=""> Xóa</a></li>
                 
              </ul>
          </div>

          <div id="contentContainer" class="dividedRight">
            <?php
              $servername = "127.0.0.1";
              $username = "root";
              $password = "";
              $dbname = "nlcs";

              $conn = mysqli_connect($servername, $username, $password, $dbname);

              $sql = "select monan_ma,monan.loai_ma,monan_ten,monan_gia,monan_diengiai,image
                      from monan,loai where
                     monan.loai_ma = loai.loai_ma order by monan.loai_ma;";

              $result = mysqli_query($conn,$sql);

              if ($result) {
                     
                    echo "<TABLE id='mytable' ";
                    echo "<TR><TH> Ma mon an </TH><TH> Loai ma </TH> <TH> Ten mon an </TH><TH> Gia </TH>
                    <TH> Dien giai </TH><TH> Image <TH></TH><TH></TH> </TR>";

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<TR>";
                        echo "<TD> " . $row["monan_ma"] . " </TD>";
                        echo "<TD> " . $row["loai_ma"] . " </TD>";
                        echo "<TD> " . $row["monan_ten"] . " </TD>";
                        echo "<TD> " . $row["monan_gia"] . " </TD>";
                        echo "<TD> " . $row["monan_diengiai"] . " </TD>";
                        echo "<TD> " . $row["image"] . " </TD>";
                       
                          echo "<TD> <a href='xoaMONAN_.php?monan_ma=".$row["monan_ma"]."'>xoa</a> </TD>";
                        echo "</TR>";
                    }

                    echo "</TABLE>";
                   
                
              }


            ?>
          </div>
      </div>

  </body>
</html>




