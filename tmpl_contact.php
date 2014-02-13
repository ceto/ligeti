<?php
/**
 * The Contact template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * Template Name: Contact Page with Map	 
 * @package Ligeti
 * @since Ligeti 1.0
 */
?>
<?php
  
  //response generation function

  $response = "";

  //function to generate response
  function generate_response($type, $message){
    
    global $response;

    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";
    
  }

  //response messages
  $not_human       = "Human verification incorrect.";
  $missing_content = "Please supply all information.";
  $email_invalid   = "Email Address Invalid.";
  $message_unsent  = "Message was not sent. Try Again.";
  $message_sent    = "Thanks! Your message has been sent.";

  //user posted variables
  $name = $_POST['message_name'];
  $email = $_POST['message_email'];
  $tel = $_POST['message_tel'];
  $message = $_POST['message_text'];
  $human = $_POST['message_human'];

  //php mailer variables
  $to = get_option('admin_email');
  $subject = "Someone sent a message from ".get_bloginfo('name');
  $headers = 'From: '. $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n";
  
if(!$human == 0){
    if($human != 2) generate_response("error", $not_human); //not human!
    else {
      
      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        generate_response("error", $email_invalid);
      else //email is valid
      {
        //validate presence of name and message
        if(empty($name) || empty($message) || empty($tel)){
          generate_response("error", $missing_content);
        }
        else //ready to go!
        {
        	$message='Tel: '.$tel.'<br/>'.$message;
        	$sent = mail($to, $subject, $message, $headers);
          	if($sent) generate_response("success", $message_sent); //message sent!
          	else generate_response("error", $message_unsent); //message wasn't sent
        }
      }
    }
  } 
  else 
  	if ($_POST['submitted']) generate_response("error", $missing_content);

?>
<?php get_header(); ?>
	<!-- <div class="mapwrap">
		<div id="map-canvas" class="gmap"></div>
	</div> -->
	<div class="csplash clearfix">
		
		<div class="contact-content clearfix">
				<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				

				<?php
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>
		</div>


	</div>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			
	
			<div class="entry-content">
				<div id="respond">
					<?php echo $response; ?>
					<form class="form-horizontal" action="<?php the_permalink(); ?>" method="post">
						<div class="row-fluid">
							<div class="span6">
									<div class="controlsa">
										<div class="input-prepend">
											<span class="add-on"><i class="icon-user"></i></span>
											<input type="text" required placeholder="Név" id="message_name" name="message_name" value="<?php echo $_POST['message_name']; ?>">
										</div>
									</div>
							</div>
						
							<div class="span6">
							
									<div class="controlsa">
										<div class="input-prepend">
											<span class="add-on"><i class="icon-envelope"></i></span>
											<input type="email" required placeholder="E-mail" id="message_email" name="message_email" value="<?php echo $_POST['message_email']; ?>">
										</div>
									</div>
							</div>
						</div>
						
						<div class="row-fluid">
							<div class="span6">
									<div class="controlsa">
										<div class="input-prepend">
											<span class="add-on"><i class="icon-phone"></i></span>
											<input type="text" required placeholder="Telefon" id="message_tel" name="message_tel" value="<?php echo $_POST['message_tel']; ?>">
										</div>
									</div>
							</div>
						</div>
						
						<div class="row-fluid">
							<div class="span12">
									<div class="controlsa">
										<div class="input-prepend">
											<span class="add-on"><i class="icon-pencil"></i></span>
											<textarea required placeholder="Üzenet" id="message_text" name="message_text" value="<?php echo $_POST['message_text']; ?>"></textarea>
										</div>
									</div>
							</div>
						</div>
			

						<div class="form-actions">
							<input type="hidden" name="message_human" value="2">
							<input type="hidden" name="submitted" value="1">
							<input type="submit" class="btn btn-inverse">
						</div>
					</form>
				</div>

			</div><!-- .entry-content -->

			

		

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
   
<?php get_footer(); ?>
