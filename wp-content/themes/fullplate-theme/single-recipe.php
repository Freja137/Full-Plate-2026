<?php get_header(); ?>

<?php

while (have_posts()) {
    the_post();
    $relatedTools = get_field('related_tools');
    $relatedRecipes = get_field('related_recipe');
?>

    <main>
        <div class="all-recipes-arrow">
            <a href="<?php echo esc_url(get_post_type_archive_link('recipe')); ?>">
                <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                ALL RECIPES
            </a>

        </div>

        <article class="recipe-hero">
            <p class="hero-label">LET'S COOK</p>
            <div class="hero-text">

                <h1 class="hero-text-recipe">
                    <?php the_title(); ?>
                </h1>

                <?php if (has_excerpt()) { ?>

                    <p>
                        <?php echo esc_html(get_the_excerpt()); ?>
                    </p>

                <?php } ?>
            </div>

            <p class="recipe-author">
                By: <?php the_author(); ?>
            </p>

            <?php if (has_post_thumbnail()) { ?>

                <div class="hero-recipe-img">
                    <?php
                    the_post_thumbnail(
                        'large',
                        array(
                            'alt' => esc_attr(get_the_title())
                        )
                    );

                    ?>

                </div>
            <?php } ?>

        </article>

        <!-- RECIPE INFO -->
        <div class="recipe-meta-info">
            <div class="meta-info">
                <p>TIME:</p>
                <p>
                    <?php the_field('time'); ?> MIN
                </p>
            </div>

            <div class="meta-info">
                <p>DIFFICULTY:</p>
                <p>
                    <?php the_field('difficulty'); ?>
                </p>
            </div>

            <div class="meta-info">
                <p>REVIEWS:</p>
                <p>
                    <?php the_field('reviews'); ?> / 5
                </p>
            </div>

            <div class="meta-info">
                <p>SERVES:</p>

                <p class="serves-number">
                    <?php the_field('servings'); ?>
                </p>
            </div>
        </div>

        <!-- INGREDIENTS AND METHOD -->
        <section class="recipe-details">
            <article class="ingredients">

                <h3>INGREDIENTS</h3>

                <div class="portions">
                    <p>Portions</p>
                    <button type="button" aria-label="Decrease portions">−</button>

                    <span class="portion-number">
                        <?php the_field('servings'); ?>
                    </span>

                    <button type="button" aria-label="Increase portions">+</button>
                </div>

                <div class="ingredients-text">
                    <?php the_field('ingredients'); ?>
                </div>

            </article>

            <article class="method">
                <h3>METHOD</h3>

                <div class="method-text">
                    <?php the_field('method'); ?>
                </div>
            </article>
        </section>

        <!-- Tip fra kokken -->
        <?php
        $tip = get_field('tips');
        $tipImage = get_field('tip_image');

        if ($tip && $tipImage) {
        ?>
            <div class="blue-card tip-card">

                <img
                    class="blue-card-img"
                    src="<?php echo esc_url($tipImage); ?>"
                    alt="Tip from the cook">

                <div class="blue-box">
                    <div class="recipe-tip">
                        <h3>A TIP FROM THE COOK</h3>
                        <p>“<?php echo esc_html($tip); ?>”</p>
                    </div>
                </div>

            </div>
        <?php } ?>

    <?php } ?>

    <?php if ($relatedTools) { ?>
        <section class="recipe-essentials">
            <div class="essentials-intro">
                <h2>THE ESSENTIALS BEHIND THIS RECIPE</h2>

                <p>
                    Good cooking starts with the right tools.
                </p>

                <a href="<?php echo esc_url(get_post_type_archive_link('tool')); ?>" class="btn btn-arrow">
                    EXPLORE TOOLS
                    <i class="fa-solid fa-arrow-right" aria-hidden="true">
                    </i>
                </a>
            </div>

            <?php foreach ($relatedTools as $tool) { ?>
                <article class="recipe-card">

                    <a href="<?php echo esc_url(get_the_permalink($tool)); ?>"
                        aria-label="<?php echo esc_attr(
                                        'Read about ' . get_the_title($tool)
                                    ); ?>">
                        <?php

                        echo get_the_post_thumbnail(
                            $tool,
                            'large',
                            array(
                                'class' => 'recipe-card-img',
                                'alt' => esc_attr(get_the_title($tool))
                            )
                        );
                        ?>
                    </a>

                    <div class="recipe-card-text">
                        <h3>
                            <?php echo esc_html(get_the_title($tool)); ?>
                        </h3>

                        <p>
                            <?php
                            echo esc_html(
                                wp_trim_words(
                                    get_the_excerpt($tool),
                                    15,

                                    ' ...'
                                )
                            );

                            ?>
                        </p>

                        <div>
                            <p>
                                Recommended by <?php the_author(); ?>
                            </p>

                            <a href="<?php echo esc_url(get_the_permalink($tool)); ?>"

                                aria-label="<?php echo esc_attr(
                                                'Read about ' . get_the_title($tool)
                                            ); ?>">

                                <i class="fa-solid fa-arrow-right"
                                    aria-hidden="true">
                                </i>
                            </a>
                        </div>
                    </div>
                </article>
            <?php } ?>
        </section>

    <?php } ?>

    <?php if ($relatedRecipes) { ?>
        <section class="related-recipes">

            <h2>YOU MIGHT ALSO LIKE</h2>

            <div class="recipes-cards-container">

                <?php foreach ($relatedRecipes as $recipe) { ?>

                    <?php
                    $recipeAuthor = get_userdata($recipe->post_author);
                    ?>

                    <article class="recipe-card">

                        <a href="<?php echo esc_url(get_the_permalink($recipe)); ?>"
                            aria-label="<?php echo esc_attr(
                                            'View ' . get_the_title($recipe)
                                        ); ?>">
                            <?php

                            echo get_the_post_thumbnail(
                                $recipe,
                                'recipe-card',
                                array(
                                    'class' => 'recipe-card-img',
                                    'alt' => esc_attr(get_the_title($recipe))
                                )

                            );

                            ?>
                        </a>

                        <div class="recipe-card-text">

                            <p>
                                <?php the_field('time', $recipe); ?> MIN
                            </p>

                            <h3>
                                <?php echo esc_html(get_the_title($recipe)); ?>
                            </h3>

                            <p>
                                <?php

                                echo esc_html(

                                    wp_trim_words(

                                        get_the_excerpt($recipe),

                                        15,

                                        ' ...'

                                    )

                                );

                                ?>
                            </p>

                            <div>

                                <p class="author-level-thin">

                                    <?php

                                    echo esc_html(

                                        $recipeAuthor->display_name

                                    );

                                    if ($recipeAuthor->roles[0] == 'Home_cook') {

                                        echo ' | Home Cook';
                                    }

                                    if ($recipeAuthor->roles[0] == 'Amateur') {

                                        echo ' | Amateur';
                                    }

                                    if ($recipeAuthor->roles[0] == 'Professional') {

                                        echo ' | Professional';
                                    }

                                    ?>

                                </p>

                                <a href="<?php echo esc_url(get_the_permalink($recipe)); ?>"
                                    aria-label="<?php echo esc_attr(
                                                    'View ' . get_the_title($recipe)
                                                ); ?>">
                                    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                                </a>

                            </div>

                        </div>

                    </article>

                <?php } ?>

            </div>

        </section>

    <?php } ?>

    <!-- REVIEWS -->
    <section class="recipe-reviews">
        <div class="reviews-heading">
            <p>COMMUNITY REVIEWS</p>
            <h2>WHAT OUR COOKS THINK</h2>
        </div>

        <div class="review-list">

            <!-- ANNA -->
            <article class="review">

                <div class="review-author">

                    <img

                        src="<?php echo esc_url(

                                    get_theme_file_uri('/images/anna.webp')

                                ); ?>"

                        alt="Anna, Home Cook">

                    <div>

                        <h3>Anna</h3>

                        <p>HOME COOK</p>

                    </div>

                </div>

                <div class="review-content">

                    <div

                        class="review-stars"

                        aria-label="3 out of 5 stars">

                        ★ ★ ★ ☆ ☆
                    </div>

                    <p>

                        “Really easy to follow and perfect for a weekday

                        dinner. I loved how quickly it came together, and

                        my family enjoyed it too.”
                    </p>

                </div>

            </article>


            <!-- CATHERINE -->

            <article class="review">

                <div class="review-author">
                    <img src="<?php echo esc_url(get_theme_file_uri('/images/catherine.webp')); ?>" alt="Catherine, Amateur Cook">
                    <div>
                        <h3>Catherine</h3>
                        <p>AMATEUR COOK</p>
                    </div>
                </div>

                <div class="review-content">
                    <div
                        class="review-stars"
                        aria-label="4 out of 5 stars">
                        ★ ★ ★ ★ ☆
                    </div>

                    <p> “A lovely combination of sweet and spicy flavours. Next time I would add a little bit chilli, but the recipe was simple to adapt to my own taste.”</p>
                </div>
            </article>

            <article class="review">
                <div class="review-author">
                    <img src="<?php echo esc_url(get_theme_file_uri('/images/mads.webp')); ?>" alt="Mads, Professional Chef">

                    <div>
                        <h3>Mads</h3>
                        <p>PROFESSIONAL CHEF</p>
                    </div>

                </div>

                <div class="review-content">
                    <div
                        class="review-stars"
                        aria-label="4 out of 5 stars">
                        ★ ★ ★ ★ ☆
                    </div>

                    <p>“The balance between the mango chutney, lemon and salmon works very well. A simple recipe with a strong flavour profile.”</p>
                </div>
            </article>
        </div>
    </section>
    </main>

    <?php get_footer(); ?>