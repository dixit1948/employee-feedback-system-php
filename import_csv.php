
<?php
include 'db.php';
$file = fopen("employees_1200.csv","r");
while(($row = fgetcsv($file)) !== false){
  if($row[0]=="emp_id") continue;
  mysqli_query($conn,"INSERT IGNORE INTO employees
  (emp_id,emp_name,department,email)
  VALUES
  ('$row[0]','$row[1]','$row[2]','$row[3]')");
}
fclose($file);
echo "Employees imported successfully";
?>
