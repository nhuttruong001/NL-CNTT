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
	width: 650px;
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
	<h2>Thêm món ăn</h2>

  <form action="../controller/themMONAN_.php" method="POST" enctype="multipart/form-data">
    <label>Mã món ăn</label>
    <input type="text" name="monan_ma" required="" >

    
    <label for="loai" >Loại</label>
    <select id="loai" name="loai" required="">
      <option value="A" >Trà sữa</option>
      <option value="B" >Nước Ngọt</option>
      <option value="C" >Sinh Tố</option>
      <option value="D" >Khô bò</option>
    </select>

    <label>Tên món ăn</label>
    <input type="text" name="tenmonan" required="">


    <label>Giá</label><br>
    <input type="number" name="giamonan" required="">
     <br>
    <label>Diễn giải</label><br>
    <textarea rows="10" cols="50"  type="number" name="diengiaimonan" required=""></textarea>
    <br>
    <label>Image</label><br>

    <input type="file" name="image" required="">

    <input type="submit" value="Add"> <input type="reset" value="Reset">


  </form>
</div>

</body>
</html>