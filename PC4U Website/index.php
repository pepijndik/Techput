<!--PHP login System by Pdik Systems (https://pdik.nl) -->
<?php
include("src/auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welkom PC4u User</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="form">
<h1 >Welkom<?php echo $_SESSION['username']; ?>!</h1>
<p >Dit is Uw account Pagina.</p>   
<p>Bekijk hier uw Afspraken</p>
<p><a href="dashboard.php">dashboard</a></p>
<a href="logout.php">Logout</a>
</div>
</body>
</html>