<?php
session_start();
include 'db.php';

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if(!isset($_GET['t'])){
    die("Invalid Access");
}

$token = mysqli_real_escape_string($conn,$_GET['t']);

$res = mysqli_query($conn,"
SELECT emp_id, emp_name, has_submitted
FROM employees
WHERE url_token='$token'
");

if(mysqli_num_rows($res)==0){
    die("Invalid URL Token");
}

$emp = mysqli_fetch_assoc($res);

if($emp['has_submitted']==1){
    die("You already submitted feedback.");
}

/* Store identity */
$_SESSION['emp_id'] = $emp['emp_id'];
$_SESSION['token']  = $token;

/* Emoji → Number map */
$emojis = [
 "😡"=>1,
 "😕"=>2,
 "😐"=>3,
 "🙂"=>4,
 "😁"=>5,
 "😍"=>6,
 "😎"=>7,
 "🤩"=>8,
 "🥳"=>9,
 "🔥"=>10
];
?>

<!DOCTYPE html>
<html>
<head>
<title>Employee Feedback</title>

<style>
body{
  font-family:'Segoe UI',Arial;
  background:linear-gradient(90deg,#020024,#090979,#00d4ff);
}

.container{
  max-width:550px;
  margin:40px auto;
  background:#fff;
  padding:30px;
  border-radius:30px;
}

.emoji-group{
  display:flex;
  gap:12px;
  flex-wrap:wrap;
}

.emoji-group span{
  font-size:30px;
  cursor:pointer;
  opacity:.3;
}

.emoji-group span.active{
  opacity:1;
  transform:scale(1.25);
}

button{
  width:100%;
  padding:12px;
  background:#4f46e5;
  color:#fff;
  border:none;
  border-radius:30px;
  margin-top:20px;
}
</style>
</head>

<body>

<div class="container">

<h3>Employee Feedback Form</h3>

<form method="post" action="/employee_feedback/submit.php">

<?php for($i=1;$i<=5;$i++){ ?>
<div class="question">

<p>Question <?= $i ?></p>

<div class="emoji-group" data-q="<?= $i ?>">

<?php foreach($emojis as $em=>$num){ ?>
<span data-val="<?= $num ?>"><?= $em ?></span>
<?php } ?>

</div>

<input type="hidden" name="q<?= $i ?>" id="q<?= $i ?>" required>

</div>
<?php } ?>

<button type="submit">Submit Feedback</button>

</form>
</div>

<script>
document.querySelectorAll(".emoji-group").forEach(group=>{

 let q = group.dataset.q;

 group.querySelectorAll("span").forEach(e=>{

  e.onclick=function(){

   group.querySelectorAll("span")
   .forEach(x=>x.classList.remove("active"));

   this.classList.add("active");

   /* Store numeric value */
   document.getElementById("q"+q).value =
   this.dataset.val;

history.pushState(null,null,location.href);

window.onpopstate = function(){
   history.go(1);
};

  };

 });

});
</script>

</body>
</html>
