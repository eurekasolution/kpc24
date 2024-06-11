<?php
	include "db.inc.php";

	$conn = connect();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

</head>
<body>
<div class="container">

<nav class="navbar navbar-expand-sm bg-gray navbar-gray">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Bootstrap</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?cmd=aaa">aaa</a></li>
            <li><a class="dropdown-item" href="index.php?cmd=bbb">bbb</a></li>
            <li><a class="dropdown-item" href="#">A third link</a></li>
          </ul>
        </li>

		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Secure</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Link</a></li>
            <li><a class="dropdown-item" href="#">Another link</a></li>
            <li><a class="dropdown-item" href="#">A third link</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

	<?php
		if(isset($_GET["cmd"]))
			$cmd = $_GET["cmd"];
		else
			$cmd = "init";

		include "$cmd.php";	

	?>

</div> <!-- container -->

<div class="container-fluid">
	<div class="row">
		<div class="col bg-warning">
			정보보안 연습용<br>
			정보보호 책임자 : 홍길동
		</div>
	</div>
</div>

</body>
</html>
<?php
	closeDB($conn);
?>