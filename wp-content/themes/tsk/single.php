<?php
get_header();

?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	

		<div class="container">

			<?php

			if (have_posts()) :

				while (have_posts()) : the_post();
			?>
					<div class="podt_content ">
						<h1><?php the_title(); ?></h1>
						<span><?php echo get_the_ID(); ?> </span>
						<div>
							<?php
							the_content();
							?>
							  
					</div>



			<?php
				endwhile;

			endif;

			?>

		</div><!-- .container -->





</div>

</main>


</div><!-- #primary -->


<?php
get_footer();
?>