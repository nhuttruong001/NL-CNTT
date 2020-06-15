<?php
  include "../controller/bienToanCuc.php";
  include "../controller/ham.php";
  session_start();
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

     <link rel="stylesheet" type="text/css" href="css/reset.css">
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

        <link rel="stylesheet" href="generalFormat.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" type="text/css" href="../public/css/chatbot.css">
        <link rel="stylesheet" type="text/css" href="../public/css/front-end.css">
        <link rel="stylesheet" type="text/css" href="../public/css/addbuy.css">
        <link rel="stylesheet" type="text/css" href="../public/css/insert-cart.css">
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
          <!-- CHATBOT -->
          <div class="chatbot-circle" id="chatbot-circle" style="display:block" ><i class="fas fa-sms"></i></div>
        <div class="chatbot-box" id="mychatbot" style="display:none" >
            <div class="chatbot-head " >
                <div class="avatar">
                    <span class="icon"><img src="../public/image/chatbot.png" width="30" height="30" alt="Avatar Chatbot"></span>
                    <span class="name-chatbot">ChatBot</span>
                    <span class="status"></span>
                </div>
                <span class="close"><i class="fas fa-times"></i></span>
            </div>
            <div class="chatbot-body " id="chat-body">
                <!-- <div class="message-u">
                    <div class="user_avt">
                      <img src="../public/image/chatbot_avt.jpg" width="50px">
                    </div>
                    <p class="message">
                      Xin chào bạn đến với cửa hàng đồ ăn vặt của chúng tôi!!!!
                    </p> 
                </div> -->
                <div class="message-bot">
                    <div class="user_avt">
                        <img src="../public/image/chatbot_avt_bot.png" width="50px">
                    </div>
                    <p class="message">
                    Xin chào bạn đến với cửa hàng đồ ăn vặt của chúng tôi!!!!
                    </p> 
                </div>
    
         </div>
            <div class="chatbot-footer">
                <input id="user_type_msg" type="text" placeholder="Type a message..." class="type-message">
                <button class="submit-chatbot" id="submit-chatbot" ><img src="../public/image/send.png" alt="Icon Send"  width="50" height="50"></button>
            </div>
        </div>
          <!-- END CHATBOT -->
            <nav class="navbar navbar-expand-lg navbar-light nhut-truong-navibar d-flex flex-row-reverse">
                <a class="navbar-brand" href="#"><img src="../public/image/logo.png" class="nhut-truong-img"></a>
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
                          <form action="../controller/searchmonan.php" method="get">
                        <input type="text" name="search" class="w3-bar-item w3-input w3-white w3-mobile" style="width: 300px;" placeholder="Search..">
                        <button class="w3-bar-item w3-button w3-blue w3-mobile" name="submit">Go</button>
                      </form>
                      </div>
                            </li>

                        <li class="nav-item mr-2 ml-2 ">
                           <span style="color: red;"> <?php if(isset($_SESSION['username'])){ if(isset($_SESSION["shoppingCart"])) echo count($_SESSION["shoppingCart"]);} else echo "0"?></span>
                          <a href="../pages/viewCart.php"><h1 class="fas fa-shopping-cart" style="width: 40px; height: 50px; position: absolute;top:0px;"></h1> </a> 
                        </li>
                      
                        </ul>
                          
                       
                        </div>

                </div>

            </nav>

          
                                   
                    <!-- <div class="nav-item" style="position: fixed;z-index:100; right: 0px; top: 2px;">  -->  

                      <!--Dang ky  -->      
                        <a href="../pages/fromDangky.php" style="z-index: 100;"><button type="button" class="btn btn-primary dangky">Đăng ký</button><span class="sr-only">(current)</span></a>
                        <!--End dang ky  -->
                            <!-- Dang nhap -->                    
                            <!-- <div class="dropdown ">
                              
                               <button id="onclick" class="btn btn-primary dropdown-toggle"> -->
                             

                                
                                
                               
                               <?php   if(isset($_SESSION["username"]) && ($_SESSION['quyen'] == 1)){ ?>
                                      
                                      <div class="dropdown" style="position: absolute;right: 10px;top: 5px;">
                                          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $_SESSION["username"]; ?>
                                            <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu user_menu">
                                            <li><a href="../pages/homeQuantri.php">Quản trị</a></li>
                                            <li><a href="../controller/doiMATKHAU.php">Đổi mật khẩu</a></li>
                                            <li><a href="../controller/dangxuat.php">Đăng xuất</a></li>
                                          </ul>
                                      </div>
                                 <?php   } else if (isset($_SESSION["username"]) && ($_SESSION['quyen'] == 0)){ ?>
                                      <div class="dropdown" style="position: absolute;right: 10px;top: 5px;">
                                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> <?php echo $_SESSION["username"] ?>
                                        <span class="caret"></span>
                                      </button>
                                        <ul class="dropdown-menu user_menu">
                                          <li><a href="../controller/doiMATKHAU.php">Đổi mật khẩu</a></li>
                                          <li><a href="../controller/dangxuat.php">Đăng xuất</a></li>
                                        </ul>
                                      </div>
                               <?php   } else{ ?>
                                        <a href="../controller/login1.php">
                                          <button type="button" class="btn btn-primary dangnhap">Đăng nhập</button>
                                          <span class="sr-only">(current)</span>
                                        </a> 
                                 <?php   } ?> 
                                 <!--   <div id="toggle" style="display:none; ">

                              
                                  <a class="dropdown-item" href="../controller/doiMATKHAU.php">Đổi mật khẩu</a>  
                                <a class="dropdown-item" href="../controller/dangxuat.php">Đăng xuất</a>   -->

                                

                                 <!--  </button> -->

                             
                             <!-- <?php 
                                if(isset($_SESSION['quyen'])){
                                     if($_SESSION['quyen']==1) {
                                        echo '<a href="../pages/homeQuantri.php" class="dropdown-item">Quản trị</a>'; 
                                      } 
                                }
                               ?>      -->
                              </div> 
                             

                                                 
                          </div>


                         
                   </div>
             
        </div>

    </header>
    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-8">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner img-thumbnails">
                            <div class="carousel-item active">
                                <img src="../public/image/pizza.jpg" height="300px" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item ">
                                <img src="../public/image/trasua.jpg" height="300px" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item ">
                                <img src="../public/image/khoga.jpg" height="300px" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                    </div>
                   
            </div>
             <div class="col-sm-4" style="border: 2px groove black">
                    <h2>CHÚNG TÔI CAM KẾT</h2>
                    <p>
                        &#9728;Chỉ sử dụng dầu đậu nành Simply.<br>
                        &#9728;Sữa Vinamilk, pho mai được mua từ công
                        ty Kiwi Food. Xúc xích Đức Việt chính hãng.<br>
                        &#9728;Sử dụng Thịt và Chân gà tươi nguồn gốc rõ ràng.
                        Không sử dụng đường hóa học, các chất phụ gia 
                        và thực phẩm độc hại.<br>
                        &#9728;Chúng tôi cam kết sẽ dành trọn tâm huyết để
                        quý khách hàng có thể thưởng thức những món 
                        ăn ngon, an toàn và giá thành hợp lý.
                    </p>
                    
                    
                </div>
            <div class="row">
   
                  <div class="col-12">
                      <h2>Thực đơn online</h2>
                       <hr>
                  </div>


          
                            <?php
                              include "../controller/connectMYSQL.php";
                              $sql = "select *from monan limit 16";
                              $result=$conn->query($sql);


                              while($row=$result->fetch_assoc()){
                  
                                   echo  "
                                        <div class='col-md-3 mb-3'>
                                        <div class='card' style='width: 100%; height:100%'>
                                        <img src='../public/image/".$row["IMAGE"]."' class='card-img-top' alt='Card image cap' width='450px' height='350px' >
                                          <div class='card-body'>
                                           <h5 class='card-title'>".$row["MONAN_TEN"]."&nbsp;&nbsp;&nbsp;&nbsp; Giá:".$row["MONAN_GIA"]."</h5> 
                                               <p class='card-text'>".$row["MONAN_DIENGIAI"]."</p>
                                               <br> <br>
                                               <a href='../controller/insertCart.php?maso=".$row["MONAN_MA"]."' class='btn btn-primary custom-insert-cart ' >Thêm vào giỏ</a> 
                                               <a href='../controller/buynow.php?maso=".$row["MONAN_MA"]."' class='btn btn-primary custom-cart'  onclick='testwarning()'>Mua ngay&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>          
                                          </div>
                                          </div>
                                        </div> ";
                              }

                            ?>

                            <!-- end content left -->
                        </div>

                    </div>
                </div>
                <!-- end content right -->
            </div>
        </div>
        </div>
        </div>
    </main>

    <?php include "../layouts/footer.php"; ?>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js" integrity="sha256-yr4fRk/GU1ehYJPAs8P4JlTgu0Hdsp4ZKrx8bDEDC3I=" crossorigin="anonymous"></script>
    <script src="../public/javascript/chatbot.js"></script>
    
    <script>


      $(document).ready(function(){

        var socket = io.connect("http://localhost:5000/");

        socket.on("Server-Send-Message", function(data){
            console.log(data);
        });

              $("#onclick").click(function(){
                $("#toggle").toggle();
            });


              
              $("#submit-chatbot").click(function(){
                  var message = $(".type-message").val();
                  socket.emit("Client-Send-Message", {data:message});
                  $("#chat-body").append(`
                    <div class="message-u">
                      <div class="user_avt">
                          <img src="../public/image/chatbot_avt.jpg" width="50px">
                      </div>
                      <p class="message">
                        ${message}
                      </p>
                  </div>
                  `);
                  $(".type-message").val("");
                  srollToBottom();
                });

              socket.on("message", function(data){
                $("#chat-body").append(`
                  <div class="message-bot">
                      <div class="user_avt">
                          <img src="../public/image/chatbot_avt_bot.png" width="50px">
                      </div>
                      <p class="message">
                          ${data}
                      </p>
                  </div>
                `);
                srollToBottom();
              });

              $(".close").click(function(){
                  $(".chatbot-box").css("display","none");
                  $('.chatbot-circle').css('display','block');
                  $("#getting").css({"display":"block"});
              });

              $('.chatbot-circle').click(function(){
                  $('.chatbot-circle').css('display','none');
                  $(".chatbot-box").css("display","block");
              });
  });
    </script>

        
</body>

</html>





















