<?php get_header(); ?>

    <section class="news">
        <div class="container">
            <div class="row">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <div class="col-12">
                        <article class="news__article">
                            <?php if ( has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail(); ?>
                            <?php endif; ?>
                            <div class="news__content">
                                <h2 class="news__header"><?php the_title(); ?></h2>
                                <time class="news__date"><?php the_date(); ?></time>

                                <div class="news__text">
                                    <?php echo force_balance_tags( html_entity_decode( wp_trim_words( htmlentities( get_the_content() ), 44, '...' ) ) ); ?>
                                </div>

                                <a class="news__more" href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">Czytaj więcej »</a>
                            </div>
                        </article>
                    </div>

                <?php endwhile; endif; ?>

            </div>

            <?php get_template_part( 'nav', 'below' ); ?>
        </div>
    </section>

<?php get_footer(); ?>
