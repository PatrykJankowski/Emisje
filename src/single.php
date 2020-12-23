<?php get_header(); ?>

<section class="subpage">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="/aktualnosci" class="subpage-top__back">← Wróć do listy aktualności</a>
                <div class="subpage-top__container">
                    <img class="subpage-top__img" src="<?php echo get_the_post_thumbnail_url(); ?>">
                    <div class="subpage-top__inner">
                        <h1 class="subpage-top__header subpage-top__header--margin"><?php the_title(); ?></h1>
                        <time><?php echo get_the_date(); ?></time>
                    </div>
                </div>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
