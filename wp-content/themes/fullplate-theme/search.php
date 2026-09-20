<?php get_header(); ?>

<main>
    <!-- HERO -->
    <article>
        <div>
            <h1>SEARCH RESULTS</h1>
        </div>
    </article>

    <!-- SEARCH -->
    <?php if (have_posts()) { ?>
        <div class="recipes-cards-container">

            <?php
            while (have_posts()) {
                the_post();

                get_template_part(
                    'template-parts/content-search-results'
                );
            }
            ?>

        </div>

        <nav class="recipe-pagination">
            <?php echo paginate_links(); ?>
        </nav>

    <?php } else { ?>
        <h2>NO RESULTS FOUND</h2>
        <p>
            We couldn't find anything matching
            "<?php echo get_search_query(); ?>".
        </p>
    <?php } ?>

</main>

<?php get_footer(); ?>