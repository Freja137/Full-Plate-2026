<?php
$post_type = get_post_type();
$author = get_userdata(get_the_author_meta('ID'));
?>

<article class="recipe-card">

    <a href="<?php the_permalink(); ?>">
        <?php
        the_post_thumbnail(
            'recipe-card',
            array('class' => 'recipe-card-img')
        );
        ?>
    </a>

    <div class="recipe-card-text">

        <!-- Alle cards får en linje, så indholdet flugter med hinanden -->
        <p class="search-card-type">
            <?php
            if ($post_type === 'recipe') {
                echo ' RECIPE';
            } elseif ($post_type === 'story') {
                echo 'FOOD STORY';
            } elseif ($post_type === 'tool') {
                echo 'TOOL';
            }
            ?>
        </p>

        <h3><?php the_title(); ?></h3>

        <p><?php echo wp_trim_words(get_the_excerpt(), 15, ' ...'); ?></p>

        <div>
            <p class="author-level-thin">

                <?php
                if ($post_type === 'tool') {
                    echo 'Recommended by ';
                }

                the_author();

                if ($author && isset($author->roles[0])) {
                    if ($author->roles[0] === 'home_cook') {
                        echo ' | Home Cook';
                    }

                    if ($author->roles[0] === 'amateur') {
                        echo ' | Amateur';
                    }

                    if ($author->roles[0] === 'professional') {
                        echo ' | Professional';
                    }
                }
                ?>

            </p>

            <a href="<?php the_permalink(); ?>" aria-label="Read <?php the_title_attribute(); ?>">
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

    </div>

</article>