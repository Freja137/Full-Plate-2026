<?php get_header(); ?>

<?php

while (have_posts()) {
    the_post();
    $toolTitle = get_the_title();
    $toolID = get_the_ID();
    $author = get_userdata(get_the_author_meta('ID'));
    $authorImage = '';

    // Vælger forfatterbillede ud fra brugerens rolle.
    if ($author->roles[0] == 'amateur') {
        $authorImage = get_theme_file_uri('/images/catherine.webp');
    }

    if ($author->roles[0] == 'professional') {
        $authorImage = get_theme_file_uri('/images/mads.webp');
    }

?>
    <main>
        <!-- TOOL HERO -->
        <article class="hero hero-tool">

            <div class="hero-text">
                <h1><?php the_title(); ?></h1>
                <p><?php the_excerpt(); ?></p>
                <div class="story-author">
                    <img src="<?php echo esc_url($authorImage); ?>" alt="<?php the_author(); ?>">

                    <p>
                        By <?php the_author(); ?>
                        <?php
                        if ($author->roles[0] == 'home_cook') {
                            echo ', Home Cook';
                        }

                        if ($author->roles[0] == 'amateur') {
                            echo ', Amateur Cook';
                        }

                        if ($author->roles[0] == 'professional') {
                            echo ', Professional Chef';
                        }

                        ?>
                    </p>

                </div>

            </div>

        </article>


        <!-- TOOL CONTENT -->

        <h2>ABOUT THE TOOL</h2>

        <p class="story-date">
            <?php echo get_the_date('j. F Y'); ?>
        </p>

        <div class="food-story-container tool-container">

            <article class="foodstory-content">

                <div class="foodstory-text">
                    <?php the_content(); ?>
                </div>

            </article>

            <article class="foodstory-content">

                <div class="foodstory-text">

                    <?php

                    the_post_thumbnail(

                        'large',

                        array('class' => 'foodstory-img')

                    );

                    ?>

                </div>

            </article>

        </div>


        <?php

        // Finder Recipes, hvor ACF-feltet related_tools indeholder den aktuelle Tool.
        $relatedRecipes = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'recipe',
            'orderby' => 'title',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'related_tools',
                    'compare' => 'LIKE',
                    'value' => '"' . $toolID . '"'
                )
            )
        ));

        ?>


        <!-- RELATED RECIPES -->

        <?php if ($relatedRecipes->have_posts()) { ?>

            <h2>
                RECIPES THAT USE <?php echo $toolTitle; ?>
            </h2>

            <div class="recipes-cards-container">
                <?php
                while ($relatedRecipes->have_posts()) {
                    $relatedRecipes->the_post();
                    get_template_part(
                        'template-parts/content',
                        'recipe'
                    );
                }
                ?>
            </div>
        <?php } ?>

        <?php

        // Gendanner den oprindelige Tool efter vores custom query.
        wp_reset_postdata();

        ?>

    </main>

<?php } ?>

<?php get_footer(); ?>