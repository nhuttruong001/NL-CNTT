<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;

}

div {
  border-radius: 5px;
  
  padding: 20px;
}

div{
	margin: 0 auto;
	width: 550px;
	height: auto;
	background-color: #f0f0f0;
	padding: 35px;

}

h2{
	text-align: center;
}


</style>
<body>



<div>
	<h2>ĐĂNG KÝ TÀI KHOẢN</h2>

  <form action="../controller/Dangky_.php" method="POST">

    <label>Tên người dùng</label>
    <input type="text" name="kh_ten" required="required">

    <label>Tài khoản</label>
    <input type="text" name="kh_id" required="">

   <label>Mật khẩu</label>
   	<input type="password" id="password" name="kh_matkhau" required="">

   	<label>Nhập lại mật khẩu</label>
   	<input type="password" id="confirmed" onchange="confirmed_pass()"  name="nlpw" required="">
    <span id="check"></span>
<br>

   	   <label >Giới tính</label>
    <select id="gioitinh" name="kh_gioitinh" required="">
      <option value="nam" >Nam</option>
      <option value="nu" >Nữ</option>
   
    </select>

       <label>Địa chỉ</label>
    <input type="text" name="kh_diachi" required="">

   	 <label>Số điện thoại</label>
   	<input type="number" name="sdt" required="">

   	<input type="submit" value="đăng ký">


  </form>
</div>

<script type="text/javascript">
    function confirmed_pass(){
        var password = document.getElementById("password").value;
        var confirmed_password = document.getElementById("confirmed").value;
        if(password != confirmed_password){
          document.getElementById("check").innerHTML= "Mat khau khong khop";
          document.getElementById("check").style.color = "red";
        }
    }

 <?php
      $_POST['kh_id'] = $new_username;

     $_SESSION['new_username'] = $new_username;

     echo $_SESSION['new_username'];
 ?>

    
</script>
</body>
</html>