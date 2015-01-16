<?php
function theme_pagination($pages = '', $range = 1, $style = false)
{  
	$showitems = 2;
	
	global $paged;
	if(empty($paged)) $paged = 1;
	
	if($pages == '')
	{
	   global $wp_query;
	   $pages = $wp_query->max_num_pages;
	   if(!$pages)
	   {
	       $pages = 1;
	   }
	}   
	if(1 != $pages)
	{
	   echo '<aside class="pagination '.($style ? $style : "").'"><ul>';
	
	
	   if($paged > 1 && $showitems < $pages) echo '<li class="prev"><a href="'.get_pagenum_link($paged - 1).'">'.($style == 'style2' ? __('PREV', THB_THEME_NAME) : __('<i class="icon-budicon-439"></i>', THB_THEME_NAME)).'</a></li>';
	
	   for ($i=1; $i <= $pages; $i++)
	   {
	       if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
	       {
	           echo ($paged == $i)? "<li><span class='current'>".$i."</span></li>":"<li class='pages ".(($i == 1) ? 'first' : '')."'><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
	       }
	   }
	
	   if ($paged < $pages && $showitems < $pages) echo '<li class="next"><a href="'.get_pagenum_link($paged + 1).'">'.($style == 'style2' ? __('NEXT', THB_THEME_NAME) : __('<i class="icon-budicon-447"></i>', THB_THEME_NAME)).'</a></li>';  
	   // echo '</ul><div class="six mobile-two columns"><span class="pages">'.$paged.' of '.$pages.'</span></div></aside>';
	}
	
	if(1==2){paginate_links(); posts_nav_link(); next_posts_link(); previous_posts_link();}
}
?>