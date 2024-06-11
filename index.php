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
	<div class="row">
		<div class="col colLine">AAA</div>
	</div>
	<div class="row">
		<div class="col colLine">BBB</div>
		<div class="col colLine">CCC</div>
	</div>
	<div class="row">
		<div class="col-2 col-md-6 bg-danger">DDD</div>
		<div class="col bg-primary">EEE</div>
	</div>
	<div class="row">
		<div class="col-2 col-md-6 bg-danger">FFF</div>
		<div class="col-8 bg-primary">GGG</div>
		<div class="col-4 bg-warning">HHH</div>
	</div>
	<div class="row">
		<div class="col-1 d-none col-md-1 d-md-block bg-danger text-white">순서</div>
		<div class="col-8 col-md-6 bg-primary text-center">제목</div>
		<div class="col-4 col-md bg-warning text-end">작성자</div>
		<div class="col d-none col-md d-md-block  bg-secondary">작성일</div>
	</div>

	<div class="row">
		<div class="col-2 colLine">아이디</div>
		<div class="col colLine">
			<input type="text" name="id" class="form-control" placeholder="아이디 입력">
		</div>
	</div>
	<div class="row">
		<div class="col-2 colLine">비번</div>
		<div class="col colLine">
			<input type="password" name="pass" class="form-control" placeholder="아이디 입력">
		</div>
	</div>

	

	<div class="row">
		<div class="col-2 colLine">email</div>
		<div class="col colLine">
			<input type="email" name="email" class="form-control" placeholder="아이디 입력">
		</div>
	</div>

	<div class="row">
		<div class="col-2 colLine">나이</div>
		<div class="col colLine">
			<input type="number" name="age" value="10" min="0" max="100" step="2" class="form-control" placeholder="아이디 입력">
		</div>
	</div>

	<div class="row">
		<div class="col-2 colLine">내용</div>
		<div class="col colLine">
			<textarea class="form-control" name="memo" rows=10>안녕하세요?
홍길동입니다.
			</textarea>
		</div>
	</div>

	<div class="row">
		<div class="col-2 colLine">버튼</div>
		<div class="col colLine">
			<button type="button">버튼1</button>
		</div>
		<div class="col colLine">
			<button type="button" class="btn btn-primary">버튼2</button>
		</div>
		<div class="col colLine">
			<button type="button" class="btn btn-danger">버튼3</button>
		</div>
		<div class="col colLine">
			<button type="button" class="btn btn-success form-control">버튼4</button>
		</div>
		<div class="col colLine">
			<button type="button" class="btn btn-success btn-sm form-control">버튼4</button>
		</div>
	</div>

	<div class="row">
		<div class="col-2 colLine">버튼</div>
		<div class="col colLine">
			<button type="button" class="btn btn-primary">
				<span class="material-icons">settings</span> 버튼2</button>
		</div>
		<div class="col colLine">
			<button type="button" class="btn btn-danger"><span class="material-icons">search</span></button>
		</div>
		<div class="col colLine">
			<button type="button" class="btn btn-success form-control">버튼4</button>
		</div>
		<div class="col colLine">
			<button type="button" class="btn btn-success btn-sm form-control">버튼4</button>
		</div>
	</div>

	<div class="row">
		<div class="col colLine">
			1<br>2<br>...<br>
			<?php 
				echo "안녕하세요? <br>";
				$age = 10;
				$age = $age + 10;
				echo "age = $age<br>";
				$age = "홍길동";
				echo "age = $age<br>";
			?>
			HTML 영역<br>
			<?php 
				for($i = 1; $i<=10; $i++) 
				{
					echo "$i ";
				}
			?>
		</div>
	</div>

	<?php 
		for($i=1; $i<=10; $i++)
		{
			?>
			<div class="row">
				<div class="col-2 colLine">
					<?php echo "$i"; ?>
				</div>
				<div class="col-2 colLine"><?php echo "$i"; ?>번째 줄입니다.</div>
			</div>
			<?php
		}
	?>

	<?php  
		$a = 12;
		include "test.php";
		echo "file : index a = $a<br>";

		include "db.inc.php";
		$conn = connect();

		closeDB($conn);
	?>

</div> <!-- container -->

</body>
</html>
