<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Wop_Lab
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', get_post_type());



	endwhile; // End of the loop.
	?>


    <div class="row">
        <div class="col-md-8 offset-md-2">
            <ul class="single_meta-box_block box_block">
                <?php
				$meta_values = get_post_meta(get_the_ID(), '', false);
				foreach ($meta_values as $key => $val) :
					if ($key[0] !== '_') :
						if ($val[0][0] == '#') :
				?>
                <li class="box_block__item box_block--color">
                    <?php echo $key; ?> :
                    <span style="display: inline-block; width: 25px; height: 25px; background: <?php echo $val[0] ?>"
                        class="color_block_view">
                    </span>
                </li>
                <?php
						else :
						?>
                <li class="box_block__item box_block--fuel">
                    <?php echo $key ?>: <?php echo $val[0] ?>
                </li>

                <?php
						endif;
					endif;
				endforeach;


				?>
                </li>
            </ul>
        </div>
    </div>
    <hr>


</main><!-- #main -->

<?php
get_footer();