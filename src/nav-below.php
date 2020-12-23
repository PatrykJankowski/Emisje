<nav id="nav-below" class="news__navigation" role="navigation">
<div class="news__previous"><?php next_posts_link(sprintf( __( '%s starsze', 'grzybowski' ), '&larr;' ) ) ?></div>
<?php
    if ($paged > 1 && $paged != $wp_query->max_num_pages) {
       echo "<span class='news__divider'> | </span>";
    }
?>
<div class="news__next"><?php previous_posts_link(sprintf( __( 'nowsze %s', 'grzybowski' ), '&rarr;' ) ) ?></div>
</nav>
