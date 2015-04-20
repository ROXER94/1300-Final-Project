<?php 
$page = 'Guild of Visual Arts - Resources';
include 'header.php';
require 'wall_database.php';

if (isset($_REQUEST['email'])){
  $email = $_POST['email'];
  $name = strip_tags($_REQUEST['name']);
  $title = strip_tags($_REQUEST['title']);
  $link = strip_tags($_REQUEST['link']);
  $description = strip_tags($_REQUEST['description']);

  $post_fields = array();
  $post_fields['email'] = $email;
  $post_fields['name'] = $name;
  $post_fields['title'] = $title;
  $post_fields['link'] = $link;
  $post_fields['description'] = $description;
  $success_flag = saveCurrentPost($post_fields);
}
?>

<div id="content">
	<div id="suggestionbox">
			<?php
			function spamcheck($field){
			  $field=filter_var($field, FILTER_SANITIZE_EMAIL);
			  if(filter_var($field, FILTER_VALIDATE_EMAIL))
			    {return TRUE;}
			  else
			    {return FALSE;}
			  }

			if (isset($_REQUEST['email'])){
				$emailcheck = spamcheck($_REQUEST['email']);
		  		if ($emailcheck==FALSE){
		    		echo "<h2>Send a Suggestion!</h2>
		    		  <p>Invalid email address.</p>
		    		  <form method='post' action='resources.php'>
					  <p>Your email: <input name='email' type='text'><br>
					  Your name: <input name='name' type='text'><br>
					  Title your resource: <input name='title' type='text'><br>
					  Link to the resource: <input name='link' type='text'><br>
					  Description and any other comments:<br>
					  <textarea name='description' rows='4' cols='35'></textarea><br>
					  <input type='submit'></p>
					  </form></p>";}
				else {
				  $email = $_REQUEST['email'] ;
				  $link = $_REQUEST['link'] ;
				  $description = $_REQUEST['description'] ;
				  echo "<h2>Send a Suggestion!</h2>
				  <p>Thank you for submtting your suggestion!<br>Want to send another? Feel free to fill out the form again.</p>
				  <form method='post' action='resources.php'>
				  <p>Your email: <input name='email' type='text'><br>
				  Your name: <input name='name' type='text'><br>
				  Title your resource: <input name='title' type='text'><br>
				  Link to the resource: <input name='link' type='text'><br>
				  Description and any other comments:<br>
				  <textarea name='description' rows='4' cols='35'></textarea><br>
				  <input type='submit'></p>
				  </form></p>";
				}
			}
			else
			//if "email" is not filled out, display the form
			  {
			  echo "<h2>Send a Suggestion!</h2>
			  <p>Have a resource you think should be on this list? Fill out the form below and we'll approve it to be added!</p>
			  <form method='post' action='resources.php'>
			  <p>Your email: <input name='email' type='text'><br>
			  Your name: <input name='name' type='text'><br>
			  Title your resource: <input name='title' type='text'><br>
			  Link to the resource: <input name='link' type='text'><br>
			  Description and any other comments:<br>
			  <textarea name='description' rows='4' cols='30'></textarea><br>
			  <input type='submit'></p>
			  </form>";
			  }
			?>
		</div>
		<div id="resources">
			<h2>Shared Resources</h2>
			<p id="resourcesinfo">These are some resources that our group members have found useful. If you want us to add something, fill out the form to the right!</p>

				<?php 
				$posts_array = getAllPosts();

				foreach(array_reverse($posts_array) as $post){
	   				$email = $post['email'];
	    			$name = $post['name'];
	   				$title = $post['title'];
	   				$link = $post['link'];
	    			$description = $post['description'];

					echo '<div class="oneresource"><h3>'.$title.'</h3><p><a href="'.$link.'" target="_blank">'.$link.'</a></p>
					<p>'.$description.'</p> 
					<p>Submitted by '.$name.' (<a href="'.$email.'">'.$email.'</a>)</p></div>';
				}
				?>
		</div>


	<!-- Suggestion Form -->
		
	</div>
  
<?php
include 'footer.php';
?>