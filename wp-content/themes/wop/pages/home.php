<?php
/*
* Template name: WOP_Home :)
*/

get_header();
?>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">
                <?php the_title(); ?>
            </h1>

        </div>
    </div>
</section>

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            //ВЫБОР СКОЛЬКО ПОСТОВ ВЫВЕСТИ В ШОКРТКОДЕ 
            echo do_shortcode('[wop_shortcode count=7]');
            ?>
        </div>
    </div>
</div>

<?php
get_footer();

?>