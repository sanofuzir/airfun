</div><!-- End role["main"] -->
<?php $header_grid = (ot_get_option('header_grid') != 'off' ? '' : 'notgrid');
			$footer_grid = (ot_get_option('footer_grid') != 'off' ? '' : 'notgrid');
			$mobile_menu_style = (isset($_GET['mobile_menu_style']) ? htmlspecialchars($_GET['mobile_menu_style']) : ot_get_option('mobile_menu_style', 'style1'));
			$logo_position = (isset($_GET['header_logo_position']) ? htmlspecialchars($_GET['header_logo_position']) : ot_get_option('header_logo_position')); 
			$footer_style = (isset($_GET['footer_style']) ? htmlspecialchars($_GET['footer_style']) : ot_get_option('footer_style', 'style1'));
			$fixed_style = (isset($_GET['header_fixed_animation']) ? htmlspecialchars($_GET['header_fixed_animation']) : ot_get_option('header_fixed_animation', 'swing')); ?>

<?php if( $footer_style == 'style2' ) {  ?>
<!-- Start Style2 Footer Container -->
<div id="footer_container">
<?php } ?>
	<?php if (ot_get_option('sitewide_cta') == 'on') { ?>
	<a href="<?php echo ot_get_option('sitewide_cta_url'); ?>" id="sitewide_cta">
		<div class="row">
			<div class="twelve columns">
				<h6><?php echo ot_get_option('sitewide_cta_text'); ?></h6>
			</div>
		</div>
	</a>
	<?php } ?>
	<?php if (ot_get_option('footer') != 'off') { ?>
	<!-- Start Footer -->
	<footer id="footer" class="<?php echo $footer_style; ?>">
	  	<div class="row <?php echo $footer_grid; ?>">
	  		<div class="small-12 columns show-for-small toggle">
	  			<a href="#" id="footer-toggle"><i class="icon-budicon-512"></i></a>
	  		</div>
	  		<?php if (ot_get_option('footer_columns') == 'fourcolumns') { ?>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer1'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer2'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
			    <?php dynamic_sidebar('footer3'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
			    <?php dynamic_sidebar('footer4'); ?>
		    </div>
		    <?php } elseif (ot_get_option('footer_columns') == 'threecolumns') { ?>
		    <div class="small-12 medium-4 columns">
		    	<?php dynamic_sidebar('footer1'); ?>
		    </div>
		    <div class="small-12 medium-4 columns">
		    	<?php dynamic_sidebar('footer2'); ?>
		    </div>
		    <div class="small-12 medium-4 columns">
		        <?php dynamic_sidebar('footer3'); ?>
		    </div>
		    <?php } elseif (ot_get_option('footer_columns') == 'twocolumns') { ?>
		    <div class="small-12 medium-6 columns">
		    	<?php dynamic_sidebar('footer1'); ?>
		    </div>
		    <div class="small-12 medium-6 columns">
		    	<?php dynamic_sidebar('footer2'); ?>
		    </div>
		    <?php } elseif (ot_get_option('footer_columns') == 'doubleleft') { ?>
		    <div class="small-12 medium-6 columns">
		    	<?php dynamic_sidebar('footer1'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer2'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
		        <?php dynamic_sidebar('footer3'); ?>
		    </div>
		    <?php } elseif (ot_get_option('footer_columns') == 'doubleright') { ?>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer1'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer2'); ?>
		    </div>
		    <div class="small-12 medium-6 columns">
		        <?php dynamic_sidebar('footer3'); ?>
		    </div>
		    <?php } elseif (ot_get_option('footer_columns') == 'fivecolumns') { ?>
		    <div class="small-12 medium-2 columns">
		    	<?php dynamic_sidebar('footer1'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer2'); ?>
		    </div>
		    <div class="small-12 medium-2 columns">
		    	<?php dynamic_sidebar('footer3'); ?>
		    </div>
		    <div class="small-12 medium-3 columns">
		    	<?php dynamic_sidebar('footer4'); ?>
		    </div>
		    <div class="small-12 medium-2 columns">
		    	<?php dynamic_sidebar('footer5'); ?>
		    </div>
		    <?php }?>
	    </div>
	</footer>
	<!-- End Footer -->
	<?php } ?>
<?php if( $footer_style == 'style2' ) {  ?>
<!-- End #footer_container-->
</div>
<?php } ?>


</div> <!-- End #wrapper -->

<?php echo ot_get_option('ga'); ?>

<?php 
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	 wp_footer(); 
?>
</body>
</html>