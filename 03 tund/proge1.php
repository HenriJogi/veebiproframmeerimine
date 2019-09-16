<?php
	$userName = "henri";
	$fullTimeNow = date("d/m/Y H:i:s");
	$hourNow = date("H");
	
	if ( $hourNow < 8){$partOfDay = "Hommikust";} 
	else if (17 < $hourNow){$partOfDay = "Hägune aeg";}
	else {$partOfDay = "Kool";}
?>
<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="utf-8">
	<title><?php echo $userName;?>	Kodutöö</title>

</head>
<body>
	<?php echo "<h1>" .$userName ."koolitõõleht?</h1>"; ?>
	<hl>koolitöö leht</hl>
	<P>See leht on loodud koolis õppetöö raames ja ei sisalda tösiseltvöetavat sisu?</p>
	<p>Sisenemise aeg: <?php echo $fullTimeNow; ?> </p>
	<?php echo $partOfDay ?>
	<hr>
	<p><?php echo $hourNow ?></p>
</body>
</html>