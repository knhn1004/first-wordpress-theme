
<?php 
function post_meta() {
			echo 'Posted on';
			echo '<a href="' . get_permalink() . '">';
			echo '<time datetime="' .  get_the_date() . '">'
				. get_the_date()
			. '</time>';
			echo '</a>';
			echo 'By <a href="' . get_author_posts_url(get_the_author_meta('ID'))  . '">';
				 echo get_the_author();
			echo '</a>';
}

function  readmore_link() {
	echo '<a href="' . get_the_permalink() . '" title="' . the_title_attribute().  '">';
		echo 'Read More <span class="u-screen-reader-text">';
				echo 'About ' . the_title();
			echo '</span>';
		echo '</a>';

}