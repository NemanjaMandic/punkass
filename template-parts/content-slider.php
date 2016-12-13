

  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  
   <?php
         $args = array( 'post_type' => 'slide');
         $slider_query = new WP_Query( $args );
    ?>
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php if( have_posts()) : while( $slider_query->have_posts() ) : $slider_query->the_post(); ?>
     
      <li <?php if( $slider_query->current_post == 0) : ?> class="active" <?php endif; ?> data-target="#myCarousel" data-slide-to="<?php echo $slider_query->current_post; ?>"></li>
      
      <?php endwhile; endif; ?>
    </ol>

   <?php rewind_posts(); ?>
    <!-- Wrapper for slides -->
    <div class="carousel-inner karusel" role="listbox">
        <?php

            if( have_posts()) : while( $slider_query->have_posts() ) : $slider_query->the_post();
           
            $image_id = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src(  $image_id, 'large', true );
            $image_alt_tag = get_post_meta( $image_id, '_wp_attachment_image_alt', true )
            
        ?>
        
      <div class="item <?php if( $slider_query->current_post == 0) : ?>active <?php endif; ?>">
    
          <img alt="<?php echo $image_alt_tag ?>" class="first-slide" src="<?php echo $image_url[0] ?>">
        
     <div class="container">
            <div class="carousel-caption">
              <h3><?php the_title(); ?></h3>
              <p><?php the_content(); ?></p>
             
            </div>
      </div>

    </div>

   <?php endwhile; endif; ?>
   
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div id="content" class="container site-content">

