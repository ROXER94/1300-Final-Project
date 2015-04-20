<?php
$page;
if(!strlen(session_id())){
    session_name('someSpecialName');
    session_start();
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $page;?>
	</title>
	<link rel="stylesheet" type="text/css" href="../styles/style.css" media="only screen and (min-width: 741px)">
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" href="../styles/mobile.css" media="only screen and (min-width: 320px) and (max-width: 740px)" />
	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Della+Respira' rel='stylesheet' type='text/css'>
	<script src="../js/jquery-1.10.2.min.js"></script>
	<script src="../js/lightbox-2.6.min.js"></script>
	<link href="../styles/lightbox.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<?php
		if (isset($_SESSION['user_name'])) {
			echo '<div class="loginthumb"><p><a href="memberlogin.php">Hi,<br>'. $_SESSION['user_name'].'</a></p></div>';}
		else {
			echo '<div class="loginthumb"><p><a href="memberlogin.php">Member<br>Login</a></p></div>';}
	?>
	<div id="page">
		<div id="header">
			<h1>The Guild of Visual Arts</h1>
			<div id="nav">
				<ul id="navigation">
					<li><a href="index.php">Home</a></li>
					<li><a href="gallery.php">Gallery</a></li>
					<li><a href="calendar.php">Calendar</a></li>
					<li><a href="announcements.php">Announcements</a></li>
					<li><a href="resources.php">Resources</a></li>
					<li><a href="contacts.php">Contacts</a></li>
				</ul>
			</div>
		</div>
