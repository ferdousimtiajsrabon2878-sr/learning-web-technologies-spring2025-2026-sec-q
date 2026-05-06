<?php
include "db.php";
$q = $_GET['q'];
$sql = "SELECT * FROM employees WHERE name LIKE '%$q%' OR username LIKE '%$q%'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        echo $row['id']." - ".$row['name']." - ".$row['contact_no']."<br>";
    }
}else{
    echo "No results found";
}
?>