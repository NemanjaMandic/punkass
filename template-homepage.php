<?php
/**
 * The template for displaying the homepage.
 *
 *
 * Template name: Homepage
 *
 * @package punkass
 */
get_header(); ?>
<?php
 if ( is_home() || is_front_page() ){
         	echo do_shortcode("[metaslider id=112 percentwidth=100]");
         }
         ?>

<div class="text-center homepage-wrapper">
	
	<h2><i class="fa fa-tags" aria-hidden="true"></i> Product Categories</h2>

	<?php

	echo do_shortcode("[product_categories number=12 parent=0]"); ?>

	<h2><i class="fa fa-money" aria-hidden="true"></i> Save your money</h2>
	 <?php 
	    echo do_shortcode("[sale_products per_page=4]");
	 ?>

	<h2><i class="fa fa-fire" aria-hidden="true"></i> Best selling products</h2>
	 <?php 
	    echo do_shortcode("[best_selling_products per_page=4]");
	 ?>

	 <h2><i class="fa fa-thumbs-up" aria-hidden="true"></i>
 Top Rated Products</h2>
	 <?php 
	    echo do_shortcode("[top_rated_products per_page=12]");
	 ?>
 </div>


<?php
  get_footer();
?>