<?php
/*
Template Name: Portfolio - Paginated
*/
?>
<?php get_header(); ?>
<?php 
 	if (is_page()) {
 		$id = $wp_query->get_queried_object_id();
 		$sidebar = get_post_meta($id, 'sidebar_set', true);
 		$sidebar_pos = get_post_meta($id, 'sidebar_position', true);
 		$grayscale = (get_post_meta($id, 'grayscale', true) == 'on') ? ' grayscale' : '';
 		$titles = (get_post_meta($id, 'titles', true) == 'on') ? ' show-titles' : '';
 	}
?>
<div class="row">
<section class="portfolio-container small-12 <?php if($sidebar) { echo 'medium-9';} else { echo 'medium-12'; } ?> columns <?php if ($sidebar && ($sidebar_pos == 'left'))  { echo 'medium-push-3'; } ?>">
	<div class="row">
		<?php $activevar = get_query_var('project-category'); ?>
		<?php $mainpage = get_permalink();?>
		<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
		<?php $itemlimit 	=	get_post_meta($post->ID, 'portfolio_pagecount', TRUE); ?>
		<?php $margin = get_post_meta($post->ID, 'portfolio_margin', TRUE); ?>
		<?php $cols = get_post_meta($post->ID, 'portfolio_columns', TRUE); ?>
		<?php $catorg = get_post_meta($post->ID, 'portfolio_categories', TRUE); ?>
		<?php $cat = implode(',', $catorg); ?>
		<div class="small-12 columns">
			<ul class="filters hide-for-small">
				<?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; ?>
			  <li><a href="<?php echo add_query_arg(array ( 'project-category' => ''));?>" <?php if ( $activevar == "") { echo 'class="active"'; } ?>><?php _e( 'show all', THB_THEME_NAME ); ?></a></li>
			  <?php 
			  
				$portfolio_categories = get_categories(array('taxonomy'=>'project-category', 'include' => $cat));
				foreach($portfolio_categories as $portfolio_category) {
					$args = array(
					    'post_type' => 'portfolio',
					    'post_status' => 'published',
					    'project-category' => $portfolio_category->slug,
					    'numberposts' => -1
					);
					$num = count(get_posts($args));
					$thelink = remove_query_arg( 'paged', $mainpage );
					$thelink = add_query_arg(array ('project-category' => $portfolio_category->category_nicename), $thelink); 
				?>
					<li><a href="<?php echo $thelink; ?>" title="<?php echo $portfolio_category->name; ?>" <?php if ( $activevar == $portfolio_category->category_nicename) { echo 'class="active"'; } ?>><?php echo $portfolio_category->name ?> <span>(<?php echo $num; ?>)</span></a></li>
					
				<?php if ( $activevar == $portfolio_category->category_nicename) {$catorg = $portfolio_category->term_id;} ?>
				<?php } ?>
			</ul>
			<div id="portfolioselect" class="show-for-small">
				<a href="#" id="sortportfolio"><?php _e( 'Sort By:', THB_THEME_NAME ); ?></a>
				<ul>
				   <li><a href="<?php echo add_query_arg(array ( 'project-category' => ''));?>" class="<?php if ( $activevar == "") { echo 'active'; } ?>"><?php echo __('All', THB_THEME_NAME); ?></a></li>
			     <?php 
			     $portfolio_categories = get_categories(array('taxonomy'=>'project-category', 'include' => $cat));
			     foreach ($portfolio_categories as $category){ ?>
			       <?php $thelink = remove_query_arg( 'paged', $mainpage ); ?> 
			       <?php $thelink = add_query_arg(array ('project-category' => $category->category_nicename), $thelink); ?>
			       <li><a href="<?php echo $thelink; ?>" title="<?php echo $category->name;?>" class="<?php if ( $activevar == $category->category_nicename) { echo 'active'; } ?>"><?php echo $category->name;?> <span>(<?php echo $num; ?>)</span></a></li>
			       <?php if ( $activevar == $category->category_nicename) {
			       	$catorg = $category->term_id;
			       	} ?>
			     <?php } ?>
				</ul>
			</div>
		</div>
		<?php endwhile; else : endif; ?> 
	</div>
	<?php if ($cols == 'three') {
					$col_text = 'medium-3';
					$columns = '4';
				} else if ($cols == 'four') {
					$col_text = 'medium-4';
					$columns = '3';
				} else if ($cols == 'six') {
					$col_text = 'medium-6';
					$columns = '2';
				} ?>	
	<div class="thb-portfolio paginated row<?php if($margin == 'on') { echo ' margin'; } ?>" data-columns="<?php echo $columns; ?>" data-equal=".item">
		<?php $args = array(
  	   'post_type' => 'portfolio',
  	   'orderby'=>'menu_order',
  	   'order'     => 'ASC',
  	   'posts_per_page' => $itemlimit,
  	   'paged' => $paged,
  	   'skill-type' => get_query_var('project-category'),
  	   'tax_query' => array(
  	   		array(
           'taxonomy' => 'project-category',
           'field' => 'id',
           'terms' => ($activevar? $catorg : array_values($catorg)),
           'operator' => 'IN'
  	      )
  	    ) // end of tax_query
	  	);
		?>
		<?php $query = new WP_Query($args); ?>
            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                  $terms = get_the_terms( get_the_ID(), 'project-category' );
                  $type = get_post_meta($post->ID, 'portfolio_type', true);
                  $meta = get_the_term_list( $post->ID, 'project-category', '<span>', '</span>, <span>', '</span>' ); 
                  $meta = preg_replace('/<a href=\"(.*?)\">(.*?)<\/a>/', "\\2", $meta);
                  ?>
            <div class="item <?php echo $col_text; ?> columns <?php foreach ($terms as $term) { echo strtolower($term->slug). ' '; } ?>">
	            <article id="post-<?php the_ID(); ?>" <?php post_class('post cf'.$grayscale.''.$titles.''); ?>>
                <figure class="post-gallery fresco">
                	<?php
                	    $image_id = get_post_thumbnail_id();
                	    $image_link = wp_get_attachment_image_src($image_id,'full');
                	    
                	    $image_title = esc_attr( get_the_title($post->ID) );
                	?>
            	  	<?php if ($cols == 'three') { ?>
            	  		<?php $image = aq_resize( $image_link[0], 290, 195, true, false); ?>
            	  		<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php echo $image_title; ?>" />
            	  	<?php } else if ($cols == 'four') { ?>
            	  		<?php $image = aq_resize( $image_link[0], 390, 265, true, false); ?>
            	  		<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php echo $image_title; ?>" />
            	  	<?php } else if ($cols == 'six') { ?>
            	  		<?php $image = aq_resize( $image_link[0], 590, 345, true, false); ?>
            	  		<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php echo $image_title; ?>" />
            	  	<?php } ?>
                	<?php 
                				if ($type == "video") {
                  				$video_url = get_post_meta($post->ID, 'portfolio_video', TRUE);
                				}
                	?>
                	<?php switch($type) {
                		
                			case "link": ?>
                				<?php $link = get_post_meta($id, 'portfolio_link', TRUE); ?>
                				<div class="overlay">
                					<div class="buttons"><a href="<?php echo $link; ?>" class="details" target="blank"><?php _e( '<i class="icon-budicon-343"></i>', THB_THEME_NAME ); ?></a></div>
                			<?php break;
                			
                			case "image":
                			case "standard": ?>
                				<div class="overlay">
                					<div class="buttons"><a href="<?php the_permalink(); ?>" class="details"><?php _e( '<i class="icon-budicon-496"></i>', THB_THEME_NAME ); ?></a>
                					<a href="<?php echo $image_link[0]; ?>" class="zoom" rel="magnific" title="<?php the_title(); ?>"><?php _e( '<i class="icon-budicon-545"></i>', THB_THEME_NAME ); ?></a></div>
                			<?php break;
                			
                			case "gallery": ?>
                				<div class="overlay">
                					<div class="buttons"><a href="<?php the_permalink(); ?>" class="details"><?php _e( '<i class="icon-budicon-496"></i>', THB_THEME_NAME ); ?></a></div>
                			<?php break;
                			
                			case "video": ?>
                				<div class="overlay">
                					<div class="buttons"><a href="<?php the_permalink(); ?>" class="details"><?php _e( '<i class="icon-budicon-496"></i>', THB_THEME_NAME ); ?></a>
                					<a href="<?php echo $video_url; ?>" class="zoom video" rel="magnific" title="<?php the_title(); ?>"><?php _e( '<i class="icon-budicon-189"></i>', THB_THEME_NAME ); ?></a></div>
                				
                			<?php break;
                		}?>
                			<?php if ($titles == '') { ?>
                				<div class="overlay-title">
                					<h4><?php if ($type != 'link') { ?><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a><?php } else { the_title(); } ?></h4>
                					<aside class="post_categories"><?php echo $meta; ?></aside>
                				</div>
                			<?php } ?>
                			</div>
                			<?php if ($titles !== '') { ?>
                				<div class="overlay-title">
                					<h4><?php if ($type != 'link') { ?><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a><?php } else { the_title(); } ?></h4>
                					<aside class="post_categories"><?php echo $meta; ?></aside>
                				</div>
                			<?php } ?>
                	</figure>
	            </article>
            </div>
            <?php endwhile; else : ?>
            <div class="small-3 columns small-centered">
            	<p><?php _e('Please select Portfolio Categories for this page', THB_THEME_NAME); ?></p>
            </div>
            <?php endif; ?>
        <?php wp_reset_query(); ?>
	</div>
	<?php theme_pagination($query->max_num_pages,1,true); ?>
</section>
<?php if($sidebar) { get_sidebar('page'); } ?>
</div>
<?php get_footer(); ?>