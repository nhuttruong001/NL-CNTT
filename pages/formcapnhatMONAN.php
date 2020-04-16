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

h3{
	text-align: center;
}


</style>
<body>
 <?php 

    include "../controller/connectMYSQL.php";
    $sql ="select *from MONAN where monan_ma='".$_GET["monan_ma"]."';";
  
    $query=mysqli_query($conn,$sql);

    $row=mysqli_fetch_assoc($query);
  ?>


<div>
	<h2>Cập nhật món ăn</h2>


  <form action="../controller/capnhatMONAN_.php" method="POST" enctype="multipart/form-data">
    <label>Mã món ăn</label>
    <input type="text" name="monan_ma" value="<?php echo $row["MONAN_MA"]; ?>" >

    <label>Tên món ăn</label>
    <input type="text" name="tenmonan" value="<?php echo $row["MONAN_TEN"]; ?>" >

    <label for="loai">Loại</label>
    <select id="loai" name="loai">
      <option value="B" <?php if($row["LOAI_MA"]=="B") echo "selected";?>>Nước uống</option>
      <option value="A" <?php if($row["LOAI_MA"]=="A") echo "selected";?> >Đồ khô</option>
      <option value="C" <?php if($row["LOAI_MA"]=="C") echo "selected";?> >Sinh tố</option>
      <option value="D" <?php if($row["LOAI_MA"]=="D") echo "selected";?> >Trà sữa</option>
    </select>

    <label>Giá</label><br>
    <input type="number" name="giamonan" value="<?php echo $row["MONAN_GIA"]; ?>">
     <br>
    <label>Diễn giải</label><br>
    <textarea rows="10" cols="50"  type="text"name="diengiaimonan"><?php echo $row["MONAN_DIENGIAI"]; ?></textarea>
    <br>
    <label>Image</label><br>
    <input type="file" name="image">

    <input type="submit" value="cập nhật">


  </form>

</div>

</body>
</html>