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
    <?php
	$meta_values = get_post_meta(get_the_ID(), '', false);
	if ($meta_values) :
	?>
    <hr>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <ul class="single_meta-box_block box_block">
                <li class="box_block__item box_block--color">
                    Car color:
                    <span
                        style="display: inline-block; width: 25px; height: 25px; background: <?php echo $meta_values['car_color'][0] ?>"
                        class="color_block_view">
                    </span>
                </li>
                <li class="box_block__item box_block--fuel">
                    fuel: <?php echo $meta_values['fuel'][0] ?>
                </li>
                <li class="box_block__item box_block--power">
                    Power: <?php echo $meta_values['power_int'][0] ?>
                </li>
                <li class="box_block__item box_block--price">
                    Price: <?php echo $meta_values['price'][0]  ?> $
                </li>
            </ul>
        </div>
    </div>
    <hr>
    <?php
	endif;
	?>

</main><!-- #main -->

<?php
get_footer();