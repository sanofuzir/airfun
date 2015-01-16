<!-- Start Sharing -->
<section id="post-sharing">
	<div class="row">
		<div class="small-12 medium-6 columns">
			<?php get_template_part( 'inc/postformats/sharing' ); ?>
		</div>
		<div class="small-12 medium-6 columns tags">
			<?php $posttags = get_the_tags();
			if ($posttags) {
				foreach($posttags as $tag) {
					echo '<a href="'. get_tag_link($tag->term_id).'" class="tag-link">' . $tag->name . '</a>';
				}
			} ?>
		</div>
	</div>
</section>
<!-- End Sharing -->