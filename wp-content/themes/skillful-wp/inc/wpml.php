<?php

/* Custom Language Switcher */

function thb_language_switcher () {

	if ( function_exists('icl_get_languages')) {
	global $data;
	?>
		<div class="select-wrapper">
		<select id="thb_language_selector">
			<?php
				$languages = icl_get_languages('skip_missing=0');
				if(1 < count($languages)){
					foreach($languages as $l){
						echo '<option value="'.$l['url'].'">'.$l['native_name'].'</option>';
					}
				}
			?>
			</select>
		</div>
	<?php 
	}
}
add_action( 'thb_language_switcher', 'thb_language_switcher',3 );
?>