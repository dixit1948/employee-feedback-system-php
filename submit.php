<?php
session_start();
include 'db.php';

if(!isset($_SESSION['emp_id'])){
    die("Unauthorized Access");
}

$emp_id = $_SESSION['emp_id'];
$token  = $_SESSION['token'];

$check = mysqli_query($conn,"
SELECT has_submitted
FROM employees
WHERE emp_id='$emp_id'
");

$row = mysqli_fetch_assoc($check);

if($row['has_submitted']==1){
    die("You already submitted feedback.");
}


$q1 = (int)$_POST['q1'];
$q2 = (int)$_POST['q2'];
$q3 = (int)$_POST['q3'];
$q4 = (int)$_POST['q4'];
$q5 = (int)$_POST['q5'];


$rating = round(($q1+$q2+$q3+$q4+$q5)/5);


mysqli_query($conn,"
INSERT INTO feedback_answers
(emp_id,q1,q2,q3,q4,q5,rating)
VALUES
(
'$emp_id',
'$q1','$q2','$q3','$q4','$q5',
'$rating'
)
");


mysqli_query($conn,"
UPDATE employees
SET has_submitted=1
WHERE emp_id='$emp_id'
");


session_destroy();

header("Location: thankyou.php?t=".$token);
exit;
?>
