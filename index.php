<?php
	session_save_path("./sess");
	session_start();

	include "config.inc.php";
	include "db.inc.php";

	date_default_timezone_set("Asia/Seoul");

	$conn = connect();

	// log
	$work = $_SERVER["QUERY_STRING"];
	//$ip = $_SERVER["REMOTE_ADDR"];

	$ip1 = rand(1, 254);
	$ip2 = rand(1, 254);
	$ip3 = rand(1, 254);
	$ip4 = rand(1, 254);
	$ip = "$ip1.$ip2.$ip3.$ip4"; // 랜덤한 IP

	if(isset($_SESSION[$sess_id]))
		$userid = $_SESSION[$sess_id];
	else
		$userid = "";

	if(isset($_GET["cmd"]))
		$cmd = $_GET["cmd"];
	else
		$cmd = "init";

	if($cmd != "chart" and $cmd != "chart2")
	{
		$sql = "insert into log (work, id, ip, time) 
					values ('$work', '$userid', '$ip', now())";
		mysqli_query($conn, $sql);
	}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <title><?php echo $windowTitle ?></title>
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
            <li><a class="dropdown-item" href="index.php?cmd=shell">shell</a></li>
            <li><a class="dropdown-item" href="index.php?cmd=shell2">shell2</a></li>
            <li><a class="dropdown-item" href="index.php?cmd=brute">Brute Force</a></li>
			<li><a class="dropdown-item" href="index.php?cmd=ftp">FTP</a></li>
			<li><a class="dropdown-item" href="index.php?cmd=rand">Random</a></li>
			<li><a class="dropdown-item" href="index.php?cmd=board">Board</a></li>         
			<li><a class="dropdown-item" href="index.php?cmd=editor">Editor</a></li>
		</ul>
        </li>

		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Secure</a>
          <ul class="dropdown-menu">
		  	<li><a class="dropdown-item" href="index.php?cmd=log">Log</a></li>
			<li><a class="dropdown-item" href="index.php?cmd=chart">LogChart</a></li>
			<li><a class="dropdown-item" href="index.php?cmd=chart2">LogChart</a></li>
            <li><a class="dropdown-item" href="index.php?cmd=crawling">Crawling</a></li>
			<li><a class="dropdown-item" href="index.php?cmd=fake">Fake</a></li>
          </ul>
        </li>

		<?php
			if(isset( $_SESSION[$sess_level] ) and $_SESSION[$sess_level] >= $adminLevel)
			{
		?>
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">관리자메뉴</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Link</a></li>
            <li><a class="dropdown-item" href="#">Another link</a></li>
            <li><a class="dropdown-item" href="#">A third link</a></li>
          </ul>
        </li>

		<?php
			}
		?>

      </ul>
    </div>
  </div>
</nav>
본인이름
	<script>
		function checkError()
		{
			//var id = document.getElementById('id');
			//var id = document.querySelector('#id');
			let id = document.querySelector('#id');
			console.log('id = ' + id);
			console.log("id = " + id.value);
			if(id.value.length < 4)
			{
				alert('4글자 이상 입력하세요');
				id.focus();
				return false;

			}else
			{

			}
			
		}
	</script>


	<form method="post" onSubmit="return checkError()" action="index.php?cmd=login">
	<div class="row">
		<div class="col"></div>
		<?php
			// $_GET["id"] , $_POST["id"]
			// $_SERVER["test"] , $_SESESSION[""]
			if(isset($_SESSION[$sess_id]) and $_SESSION[$sess_id])
			{
				?>
				<div class="col text-end">
					<?php echo $_SESSION[$sess_name]; ?> 
					<button type="button" class="btn btn-primary" onClick="location.href='index.php?cmd=logout' ">Exit</button>
				</div>
				<?php
			}else
			{
				?>
				
				<div class="col-1 text-end">ID</div>
				<div class="col-2">
					<input type="text" name="id" id="id" class="form-control"  required placeholder="ID">
				</div>
				<div class="col-1 text-end">PW</div>
				<div class="col-2">
					<input type="password" name="pass" id="pass" class="form-control" required placeholder="Password">
				</div>
				<div class="col-1">
					<button type="submit" class="btn btn-primary form-control">GO</button>
				</div>
				

				<?php
			}

		?>
	</div>
	</form>

	<?php


		if(file_exists("$cmd.php"))
			include "$cmd.php";	

		//phpinfo();
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