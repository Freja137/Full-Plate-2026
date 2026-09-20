<?php get_header(); ?>

<main>
    <!-- HERO -->
    <article class="hero tools-hero">

        <div class="hero-text">
            <h1>TOOLS WORTH TRYING</h1>
            <p>Everything you need to cook with confidence.</p>
        </div>

        <div class="tools-hero-images">

            <img src="<?php echo get_theme_file_uri('/images/baking.webp'); ?>"
                alt="Cook working with a mixing bowl">

            <img src="<?php echo get_theme_file_uri('/images/man-cutting-board.webp'); ?>"
                alt="Food and kitchen tools on a table">

        </div>

    </article>

    <!-- TOOL OF THE WEEK -->
    <?php
    $featuredTool = new WP_Query(array(
        'posts_per_page' => 1,
        'post_type' => 'tool',
        'orderby' => 'date',
        'order' => 'DESC'
    ));

    while ($featuredTool->have_posts()) {
        $featuredTool->the_post();

        $author = get_userdata(get_the_author_meta('ID'));
    ?>

        <div class="blue-card">
            <?php the_post_thumbnail('large', array('class' => 'blue-card-img')); ?>
            <div class="blue-box">
                <div class="blue-box-text">
                    <p class="tip-of-the-week">TOOL OF THE WEEK</p>
                    <h3><?php the_title(); ?></h3>
                    <p>
                        <?php echo wp_trim_words(get_the_excerpt(), 25, ' ...'); ?>
                    </p>
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
                        Read about the tool
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    <?php
    }

    wp_reset_postdata();
    ?>

    <!-- TOOL FILTER -->
    <div class="recipe-filter tools-filter" aria-label="Filter tools">
        <div class="recipe-filter-options">
            <button class="filter-button active" type="button">ALL</button>
            <button class="filter-button" type="button">PREP</button>
            <button class="filter-button" type="button">COOK</button>
            <button class="filter-button" type="button">BAKE</button>
            <button class="filter-button" type="button">SERVE</button>
        </div>
    </div>

    <div class="recipes-cards-container">
        <?php while (have_posts()) {
            the_post();
            get_template_part('template-parts/content', 'tool');
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