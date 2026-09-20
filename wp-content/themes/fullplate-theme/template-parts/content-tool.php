<?php

$author = get_userdata(get_the_author_meta('ID'));

?>

<article class="recipe-card">

    <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('large', array('class' => 'recipe-card-img')); ?>
    </a>

    <div class="recipe-card-text">

        <h3><?php the_title(); ?></h3>

        <p>
            <?php echo wp_trim_words(get_the_excerpt(), 15, ' ...'); ?>
        </p>

        <div>
            <p class="author-level-thin">
                Recommended by <?php the_author(); ?>
                <?php

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

            <a href="<?php the_permalink(); ?>">
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </div>

    </div>

</article>