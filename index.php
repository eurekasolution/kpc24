<!DOCTYPE html>
<html lang="ko">
<head>
  <title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col">AAA</div>
	</div>
	<div class="row">
		<div class="col">BBB</div>
		<div class="col">CCC</div>
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
</div>

</body>
</html>
