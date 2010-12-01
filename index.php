<?php
	require_once("init.php");
	tryToSave();
	$note=grabNote();
?>
<!doctype html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<title>Silly Notes</title>
		<link rel="stylesheet" href="../myFont/stylesheet.css" type="text/css" charset="utf-8" />
		<link rel="stylesheet" href="style.css" type="text/css" charset="utf-8" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
		<script>
			var img_src="<?php echo $note['doodle'] ?>";
		</script>
		<script type="text/javascript" src="script.js"></script>
	</head>
	<body>
		<div id="mainwrapper">
			<canvas id="doodle"></canvas>
			<div id='note' contenteditable="true" designmode="on"><?php echo $note["text"] ?></div>
			<!--div id="debug"></div-->
			<div id="toolbox">
				<div id="eraser" class="tool"></div>
				<div id="pencil" class="tool selected"></div>
			</div>
		</div>
	</body>
</html>
<?php

function grabNote() {
	global $db;
	
	$id=addslashes($_REQUEST["id"]);
	
	$query="select value,doodle from ganglios_apps_notes where name='$id'";
	$res=$db->query($query);
	$row=$db->fetch($res);
	
	return array(
		"text"=>stripslashes($row["value"]),
		"doodle"=>stripslashes($row["doodle"]),
	);
}

function tryToSave() {
	global $db;
	if (isset($_REQUEST["txt"])) {
		$id=addslashes($_REQUEST["id"]);
		$txt=addslashes($_REQUEST["txt"]);
		
		$query="insert into ganglios_apps_notes(name,value) values('$id','$txt') on duplicate key update value='$txt'";
		$db->query($query);
		
		die("OK");
	}
	
	if (isset($_REQUEST["doodle"])) {
		$id=addslashes($_REQUEST["id"]);
		$doodle=addslashes($_REQUEST["doodle"]);
		
		$query="insert into ganglios_apps_notes(name,doodle) values('$id','$doodle') on duplicate key update doodle='$doodle'";
		$db->query($query);
		
		die("OK");
	}
}

?>
