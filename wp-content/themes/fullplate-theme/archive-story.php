<?php get_header(); ?>

<main>
    <!-- HERO -->
    <article class="hero">
        <div class="hero-text">
            <h1>FOOD STORIES</h1>
            <p>Stories about food, people, places – and what is behind what we cook.</p>
        </div>
    </article>

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
    ?>

        <div class="blue-card">
            <?php the_post_thumbnail('large', array('class' => 'blue-card-img')); ?>
            <div class="blue-box">
                <div class="blue-box-text">
                    <h3><?php the_title(); ?></h3>
                    <p>
                        <?php echo wp_trim_words(get_the_excerpt(), 30, ' [...]'); ?>
                    </p>
                </div>

                <div class="blue-box-bottom">
                    <p class="author-level-thin"><?php the_author(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn-arrow blue-card-link">
                        Read the story
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

    <?php
    }
    wp_reset_postdata();
    ?>

    <!-- FILTER -->
    <div class="recipe-filter" aria-label="Filter stories">
        <div class="recipe-filter-options">
            <button class="filter-button active" type="button"> ALL</button>
            <button class="filter-button" type="button">TYPE <i class="fa-solid fa-chevron-down"></i></button>
            <button class="filter-button" type="button">DIFFICULTY <i class="fa-solid fa-chevron-down"></i></button>
            <button class="filter-button" type="button">CUISINES <i class="fa-solid fa-chevron-down"></i></button>
            <button class="filter-button" type="button">DIET <i class="fa-solid fa-chevron-down"></i></button>
        </div>

        <p class="recipe-count">
            <?php
            $storyCount = $GLOBALS['wp_query']->found_posts;
            echo $storyCount;

            if ($storyCount == 1) {
                echo ' STORY';
            } else {
                echo ' STORIES';
            }
            ?>
        </p>
    </div>

    <!-- ALL FOOD STORIES -->
    <h2>MORE STORIES</h2>
    <div class="recipes-cards-container">
        <?php
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/content', 'story');
        }
        ?>
    </div>

    <!-- Kan skifte mellem siderne, så man kan se de resterende opskrifter, tools eller stories -->
    <nav class="recipe-pagination">
        <?php
        echo paginate_links(array(
            'prev_text' => '<i class="fa-solid fa-arrow-left"></i> PREVIOUS',
            'next_text' => 'NEXT <i class="fa-solid fa-arrow-right"></i>'
        ));
        ?>
    </nav>

</main>

<?php get_footer(); ?>