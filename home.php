<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Home - Employee Management</title>
<script>
function searchEmployee() {
    var query = document.getElementById('search').value;
    if(query==""){ document.getElementById('result').innerHTML=""; return; }
    var xhr = new XMLHttpRequest();
    xhr.open("GET","search_ajax.php?q="+query,true);
    xhr.onload = function(){ document.getElementById('result').innerHTML=this.responseText; }
    xhr.send();
}
</script>
</head>
<body>
<h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
<a href="logout.php">Logout</a>

<h3>Search Employee</h3>
<input type="text" id="search" onkeyup="searchEmployee()" placeholder="Type name or username">
<div id="result"></div>

</body>
</html>