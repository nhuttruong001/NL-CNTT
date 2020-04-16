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
	<h2>Xóa món ăn</h2>

  <form action="../controller/xoaMONAN_.php" method="GET">
       <label>Mã món ăn</label>
    <input type="text" name="mamonan" >

   <label for="loai">Loại</label>
    <select id="loai" name="loai">
      <option value="B">Nước uống</option>
      <option value="A" >Đồ khô</option>
      <option value="C" >Sinh tố</option>
      <option value="D" >Trà sữa</option>
    </select>

    <label>Têm món ăn</label>
    <input type="text" name="tenmonan" >

      

    <label>Giá</label><br>
    <input type="number" name="giamonan">
     <br>
    <label>Diễn giải</label><br>
    <textarea rows="10" cols="50"  type="number" name="diengiaimonan"></textarea>
    <br>
    <label>Image</label><br>
    <input type="number" name="image">

    <input type="submit" value="Xóa">


  </form>
</div>

</body>
</html>