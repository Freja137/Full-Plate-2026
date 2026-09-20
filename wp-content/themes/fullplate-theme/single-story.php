<?php get_header(); ?>

<?php
while (have_posts()) {
    the_post();
    $author = get_userdata(get_the_author_meta('ID'));
    $relatedStories = get_field('related_stories');
?>

    <main>

        <div class="all-recipes-arrow">
            <a href="<?php echo get_post_type_archive_link('story'); ?>">
                <i class="fa-solid fa-arrow-left"></i>
                ALL STORIES
            </a>
        </div>


        <!-- STORY HERO -->
        <article class="hero">

            <div class="hero-text">

                <h1><?php the_title(); ?></h1>

                <p><?php the_excerpt(); ?></p>

                <div class="story-author">

                    <img src="<?php echo get_theme_file_uri('/images/mads.webp'); ?>" alt="<?php the_author(); ?>">

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


        <!-- STORY CONTENT -->
        <h2>THE STORY</h2>

        <p class="story-date">
            <?php echo get_the_date('j. F Y'); ?>
        </p>

        <div class="food-story-container">
            <article class="foodstory-content">
                <div class="foodstory-text">
                    <?php the_content(); ?>
                </div>
            </article>
        </div>

        <!-- RELATED STORIES -->
        <?php if ($relatedStories) { ?>
            <h2>RELATED STORIES</h2>

            <section class="recipes-cards-container">

                <?php

                foreach ($relatedStories as $post) {
                    setup_postdata($post);
                    get_template_part('template-parts/content', 'story');
                }

                wp_reset_postdata();

                ?>
            </section>

        <?php } ?>


    </main>

<?php } ?>

<?php get_footer(); ?>