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


  <?php
    include '../controller/connectMYSQL.php';

    $sql = "select *from khachhang where kh_ma='".$_GET['kh_ma']."';";
  
    $query=mysqli_query($conn,$sql);

    $row=mysqli_fetch_assoc($query);
 

  ?>


<body>




<div>
	<h2>CẬP NHẬT KHÁCH HÀNG</h2>

  <form action="../controller/capnhatKHACHHANG_.php" method="POST" enctype="multipart/form-data">
    
    <label>Mã khách hàng</label>
    <input type="text" name="kh_ma" value="<?php echo $row["KH_MA"]; ?>">

    <label>Tài khoản</label>
    <input type="text" name="kh_id1"  required="" value="<?php echo $row["KH_ID"] ?>">

   <label>Mật khẩu</label>
   	<input type="text" name="kh_matkhau1" required="" value="<?php echo $row["KH_MATKHAU"] ?>">

   	<label>Tên Khách hàng</label>
   	<input type="text" name="kh_ten1" value="<?php echo $row["KH_TEN"]; ?>" >

   	   <label >Giới tính</label>
    <select id="gioitinh" name="kh_gioitinh1" required="">
      <option value="nam"<?php if($row["KH_GIOITINH"]=="nam") ?> >Nam</option>
      <option value="nu" <?php if($row["KH_GIOITINH"]=="nu") ?>>Nữ</option>
   
    </select>

       <label>Địa chỉ</label>
    <input type="text" name="kh_diachi1" value="<?php echo $row["KH_DIACHI"]; ?>" required="">

   	 <label>Số điện thoại</label>
   	<input type="number" name="kh_sdt1" value="<?php echo $row["KH_SDT"]; ?>" required="">

   	<input type="submit" value="Cập nhật">


  </form>
</div>

</body>
</html>