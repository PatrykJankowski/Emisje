<?php get_header(); ?>

<section class="section">
    <div class="container">

        <div class="row">
            <div class="col">
                <h2 class="header header--uppercase">Aktualne emisje</h2>
            </div>
        </div>

        <div class="row">

            <?php global $post; ?>

            <?php $catquery = new WP_Query('cat=3'); ?>

            <?php while($catquery->have_posts()) : $catquery->the_post(); ?>

                <div class="col-md-4">
                    <div class="box">
                        <?php the_post_thumbnail(); ?>
                        <div class="box__content">
                            <h3 class="subpage-top__header"><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                        </div>
                        <div class="box__meta-container">
                            <div class="box__meta">
                                <span class="box__value"><?php echo get_post_meta($post->ID, 'zebrany_kapital', true); ?></span>
                                <span class="box__key">Cel</span>
                            </div>
                            <div class="box__meta">
                                <span class="box__value"><?php echo get_post_meta($post->ID, 'zebrany_kapital', true); ?></span>
                                <span class="box__key">Zebrano</span>
                            </div>
                            <div class="box__meta">
                                <span class="box__value"><?php echo get_post_meta($post->ID, 'liczba_inwestorow', true); ?></span>
                                <span class="box__key">Zebrano</span>
                            </div>
                            <div class="box__meta">
                                <span class="box__value"><?php echo get_post_meta($post->ID, 'data_zakonczenia', true); ?></span>
                                <span class="box__key">Zebrano</span>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>

        </div>
    </div>
</section>


<section class="section">
    <div class="container">

        <div class="row">
            <div class="col">
                <h2 class="header header--uppercase">Nadchodzące emisje</h2>
            </div>
        </div>

        <?php $catquery = new WP_Query('cat=1'); ?>

        <div class="row">
            <?php global $post; while($catquery->have_posts()) : $catquery->the_post(); ?>

                <div class="col-md-4">
                    <div class="box">
                        <?php the_post_thumbnail(); ?>
                        <div class="box__content">
                            <h3 class="subpage-top__header"><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                        </div>
                        <div class="box__meta-container">
                            Zapisz się
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
        </div>

    </div>
</section>


<section class="section">
    <div class="container">

        <div class="row">
            <div class="col">
                <h2 class="header header--uppercase">Zakończone emisje</h2>
            </div>
        </div>

        <?php $catquery = new WP_Query('cat=2'); ?>

        <div class="row">
        <?php global $post; while($catquery->have_posts()) : $catquery->the_post(); ?>

            <div class="col-md-4">
                <div class="box">
                    <?php the_post_thumbnail(); ?>
                    <div class="box__content">
                        <h3 class="subpage-top__header"><?php the_title(); ?></h3>
                        <?php the_content(); ?>
                    </div>
                    <div class="box__meta-container">
                        <div class="box__meta">
                            <span class="box__value"><?php echo get_post_meta($post->ID, 'zebrany_kapital', true); ?></span>
                            <span class="box__key">Cel</span>
                        </div>
                        <div class="box__meta">
                            <span class="box__value"><?php echo get_post_meta($post->ID, 'zebrany_kapital', true); ?></span>
                            <span class="box__key">Zebrano</span>
                        </div>
                        <div class="box__meta">
                            <span class="box__value"><?php echo get_post_meta($post->ID, 'liczba_inwestorow', true); ?></span>
                            <span class="box__key">Zebrano</span>
                        </div>
                        <div class="box__meta">
                            <span class="box__value"><?php echo get_post_meta($post->ID, 'data_zakonczenia', true); ?></span>
                            <span class="box__key">Zebrano</span>
                        </div>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>
        </div>

    </div>
</section>


<script defer>
    document.getElementById("contact-form").onsubmit = function(){
        let name = document.getElementsByName('name')[0].value;
        let lastname = document.getElementsByName('lastname')[0].value;
        let company = document.getElementsByName('company')[0].value;
        let service = document.getElementsByName('service')[0].value;
        let budget = document.getElementsByName('budget')[0].value;
        let email = document.getElementsByName('email')[0].value;
        let phone = document.getElementsByName('phone')[0].value;
        let message = document.getElementsByName('message')[0].value;

        fetch(ajax_url, {
            method: "POST",
            headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8' },
            body: `action=send_form&security=${form_nonce}&name=${name}&lastname=${lastname}&company=${company}&service=${service}&budget=${budget}&email=${email}&phone=${phone}&message=${message}`
        }).then(response => {
            console.log(response);
            if (response.ok) {
                //return response.json();
            }
        }, networkError => {
            //console.log(networkError.message);
        });

        // This return prevents the submit event to refresh the page.
        return false;
    };
</script>

<?php get_footer(); ?>
