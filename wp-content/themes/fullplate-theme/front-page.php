<?php get_header(); ?>

<section class="hero-homepage">

    <div class="hero-homepage-text">
        <h1>More than what’s on the plate</h1>
        <p>
            Discover recipes, food stories, trusted utensils and advice
            from cooks at every level.
        </p>
    </div>

    <a href="#homepage-content" class="hero-scroll" aria-label="Scroll down">
        <i class="fa-solid fa-chevron-down"></i>
    </a>

</section>

<main id="homepage-content">
    <!-- RECIPES -->
    <div class="heading-frontpage">
        <h2>RECIPES WORTH TRYING</h2>
        <a href="<?php echo get_post_type_archive_link('recipe'); ?>" class="btn btn-arrow">

            VIEW ALL RECIPES
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>

    <div class="fep-card-container">
        <!-- Henter de fire nyeste recipes -->
        <?php
        $homepageRecipes = new WP_Query(array(
            'posts_per_page' => 4,
            'post_type' => 'recipe',
            'orderby' => 'date',
            'order' => 'DESC'
        ));

        while ($homepageRecipes->have_posts()) {
            $homepageRecipes->the_post();
        ?>
            <a class="fep-card-content" href="<?php the_permalink(); ?>">
                <?php
                the_post_thumbnail(
                    'large',
                    array('class' => 'fep-card-img')
                );

                ?>
                <div class="fep-card-text">
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_field('time'); ?> MIN | <?php the_author(); ?></p>
                </div>

            </a>

        <?php } ?>

        <?php wp_reset_postdata(); ?>

    </div>

    <!-- FEATURED FOOD STORY -->
    <h2>FEATURED FOOD STORY</h2>
    <?php
    $featuredStory = new WP_Query(array(
        'posts_per_page' => 1,
        'post_type' => 'story',
        'orderby' => 'date',
        'order' => 'DESC'
    ));

    while ($featuredStory->have_posts()) {
        $featuredStory->the_post();
        $author = get_userdata(get_the_author_meta('ID'));
    ?>

        <div class="blue-card">
            <?php
            the_post_thumbnail(
                'large',
                array('class' => 'blue-card-img')
            );

            ?>
            <div class="blue-box">
                <div class="blue-box-text">
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                </div>

                <div class="blue-box-bottom">
                    <p class="author-level-thin">
                        <?php
                        the_author();

                        if ($author->roles[0] == 'home_cook') {
                            echo ' | Home Cook';
                        }

                        if ($author->roles[0] == 'amateur') {
                            echo ' | Amateur';
                        }

                        if ($author->roles[0] == 'professional') {
                            echo ' | Professional';
                        }

                        ?>

                    </p>

                    <a href="<?php the_permalink(); ?>" class="btn-arrow blue-card-link">
                        Read the story
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </div>
            </div>
        </div>
    <?php } ?>

    <?php wp_reset_postdata(); ?>

    <!-- TOOLS -->
    <section class="tools-homepage">
        <article>
            <h2>TOOLS PEOPLE TRUST</h2>
            <p>Tools recommended by people who know how to use them.</p>
            <a href="<?php echo get_post_type_archive_link('tool'); ?>" class="btn btn-arrow">
                EXPLORE TOOLS
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </article>

        <div class="tool-img-container">
            <?php
            $homepageTools = new WP_Query(array(
                'posts_per_page' => 2,
                'post_type' => 'tool',
                'orderby' => 'title',
                'order' => 'ASC'
            ));

            while ($homepageTools->have_posts()) {
                $homepageTools->the_post();
            ?>
                <a href="<?php the_permalink(); ?>">
                    <?php
                    the_post_thumbnail(
                        'large',
                        array('class' => 'tool-img-hp')
                    );
                    ?>
                </a>

            <?php } ?>

            <?php wp_reset_postdata(); ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>