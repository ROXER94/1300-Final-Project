<?php 
$page = 'Guild of Visual Arts - Gallery';
include 'header.php';
$membername = 'EileenLiu';
?>

<!-- all of your code for the main part of the page-->
	<div id="content">
		<?php include 'gallerynav.php'; ?>
		<div id="rightpage">	
			<div id="memberprofile">
				<img src="../images/EileenLiu.jpg" alt="profile" height="200">
			</div>
			<div id="membertext">
				<h3>Eileen Liu</h3>
				<p>Eileen is the President of the Guild and a CS major.</p>
			</div>
			<div id="thumbnails">
				<?php
				$folder = './uploaded_files/';
				$filetype = '*.*';
				$files = glob($folder.$filetype);
				$oppositeorder = array_reverse($files);
				for ($i=0; $i<count($oppositeorder); $i++) {
					if (strpos($oppositeorder[$i], $membername) !== FALSE){
				    echo '<div class= "imgthumb">';
				    echo '<a name="'.$i.'" href="'.$oppositeorder[$i].'" data-lightbox="maingallery"><img src="'.$oppositeorder[$i].'" alt="img" /></a>';
				    echo '</div>';
					}
				}
			?>
		</div>
	</div>
</div>


<?php
include 'footer.php';
?>