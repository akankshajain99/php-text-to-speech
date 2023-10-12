<?php
$player = '';
if (isset($_POST['convert'])) {
$txt = $_POST['txt'];
$txt = htmlspecialchars($txt);
$txt = rawurlencode($txt);
$html = file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q=' .$txt. '&tl=en-IN');
$player = "<audio controls='controls' autoplay>
  			<source src='data:audio/mpeg;base64,".base64_encode($html)."'>
		   </audio>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Text to Speech Using PHP</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
	audio {
    filter: sepia(20%) saturate(70%) grayscale(1) contrast(99%) invert(12%);
    width: 200px;
    height: 25px;
}
</style>
</head>
<body>
<nav class="navbar navbar-light bg-success">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1" style="color:white;">Text to Speech Using PHP</span>
  </div>
</nav>
<section style="padding-top: 50px;">
	<div class="container">
		<div class="row">
		  <div class="offset-lg-2 col-lg-8 offset-lg-2">
		    <div class="card">
		      <div class="card-body">
		        <form method="post">
					<div class="mb-3">
				  
				  	  <textarea name="txt" class="form-control" placeholder="Type Your Text Here..." required="" rows="5" cols="3"></textarea>
					</div>
					
				  <center>
					<div class="mb-3">
					  <button type="submit" name="convert" class="btn btn-danger"> Convert to Speech </button>
					</div>
					
						<div class="mb-3">
						  <?php 
							if (isset($_POST['convert'])) {
								echo $player;

							}

							?>
						</div>
					</center>
					
				</form>
		      </div>
		    </div>
		  </div>
		  
		</div>
		
	</div>
</section>
</body>
</html>