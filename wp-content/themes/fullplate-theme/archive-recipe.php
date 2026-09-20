<?php get_header(); ?>

<main>
    <article>
        <div>
            <h1>RECIPES</h1>
            <p>Recipes for every cook, every level and every kind of cooking.</p>
        </div>
    </article>
    <div class="recipe-filter" aria-label="Filter recipes">
        <div class="recipe-filter-options">
            <button class="filter-button active" type="button">ALL</button>
            <button class="filter-button" type="button">TYPE<i class="fa-solid fa-chevron-down"></i></button>
            <button class="filter-button" type="button">DIFFICULTY<i class="fa-solid fa-chevron-down"></i></button>
            <button class="filter-button" type="button">CUISINES<i class="fa-solid fa-chevron-down"></i></button>
            <button class="filter-button" type="button">DIET<i class="fa-solid fa-chevron-down"></i></button>
        </div>

        <p class="recipe-count">
            <?php
            $recipe_count = $GLOBALS['wp_query']->found_posts;
            echo $recipe_count;
            if ($recipe_count == 1) {
                echo ' RECIPE';
            } else {
                echo ' RECIPES';
            }
            ?>
        </p>
    </div>
    <div class="recipes-cards-container">
        <?php while (have_posts()) {
            the_post();
            get_template_part('template-parts/content', 'recipe');
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