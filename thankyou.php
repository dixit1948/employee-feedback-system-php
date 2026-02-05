<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if(!isset($_GET['t'])){
  die("Invalid access");
  
}

$token = $_GET['t'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Thank You</title>
<style>
body{
  font-family: Arial;
  background: #f4f6f8;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
}
.box{
  background: white;
  padding: 30px;
  text-align: center;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
.success{
  font-size: 40px;
}
</style>
</head>
<body>

<div class="box">
  <div class="success">✅</div>
  <h2>Thank You!</h2>
  <p>Your feedback has been submitted successfully.</p>
</div>

</body>
</html>
