<div class = "container">
<div class="alm-item<?php if (! has_post_thumbnail() ) { echo ' no-img'; } ?>">
   
  <h2><?php the_title(); ?></h2>
			<img style="height: 250px; width: 100%;" src="<?php echo get_the_post_thumbnail_url() ?>" alt="article" />
                <span class="date"> <?php echo get_the_date('d M, Y', $post_id); ?></span>
			<div class="post-content"><?php the_content(); ?></div>
  
</div>
</div>