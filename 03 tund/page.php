<?php
	$userName = "henri";
	$picFileTypes = ["image/jpeg", "image/png"];
	$photoDir = "../photos/";
	$fullTimeNow = date("d/m/Y H:i:s");
	$hourNow = date("H");
	
	if ( $hourNow < 8){$partOfDay = "Hommikust";} 
	else if (17 < $hourNow){$partOfDay = "Hägune aeg";}
	else {$partOfDay = "Kool";}
	
	//info semestri kulgemise kohta
	$semesterstart = new DateTime("2019-9-2");
	$semesterend = new DateTime("2019-12-13");
	$semesterDuration = $semesterstart->diff($semesterend);
	$today = new DateTime("now");
	$fromsemstart = $semesterstart->diff($today);
	
	//var_dump($photoDir);
	$semesterinfoHTML = "<p>Siin peaks olema info semestri kestuseks</p>";
	//<meter min="0" max="155" value="33">väärtus</meter>
	$elapsedValue = $fromsemstart->format("%r%a");
	$durationValue = $semesterDuration->format("%r%a");
	if($elapsedValue > 0){$semesterinfoHTML = "<p>semester on hoos: ";
		$semesterinfoHTML .= '<meter min="0" max="' .$durationValue .'" ';
		$semesterinfoHTML .= 'value="' .$elapsedValue .'">';
		$semesterinfoHTML .= round($elapsedValue / $durationValue *100, 1) ."%";
		$semesterinfoHTML .= '</meter>';
		$semesterinfoHTML .= "</p>"; }
		
	//foto lisamine random
	$allPhotos = [];
	$dirContent = array_slice(scandir($photoDir), 2);
	foreach ($dirContent as $file){$fileInfo = getImagesize($photoDir .$file);
		if(in_array($fileInfo["mime"], $picFileTypes) == true){array_push ($allPhotos, $file);}}
	
	
	//var_dump($allPhotos);
	$picCount = count($allPhotos);
	$picNum = mt_rand(0, ($picCount - 1));
	//echo $allPhotos[$picNum];
	$photoFile = $photoDir .$allPhotos[$picNum];
	$randomImgHTML = '<img src="' .$photoFile .'" alt="TLÜ Terra õppehoone">';
	
	//lehe päis
	require("header.php");
?>

<body>
	<?php echo "<h1>" .$userName ."koolitõõleht?</h1>"; ?>
	<hl>koolitöö leht</hl>
	<p> h </p>
	<P>See leht on loodud koolis õppetöö raames ja ei sisalda tösiseltvöetavat sisu?</p>
	<?php 
	echo $semesterinfoHTML
	?>
	
	<p>Sisenemise aeg: <?php echo $fullTimeNow; ?> </p>
	<?php echo $partOfDay ?>
	<hr>
	<?php echo $randomImgHTML; ?>
	
	
</body>
</html>