<?php
/**
 * The Template for displaying all single posts
 *
 * 
 * @package    Auxin
 * @author     averta (c) 2014-2022
 * @link       http://averta.net
*/

get_header(); ?>

    <main id="main" <?php auxin_content_main_class(); ?> >
        <div class="aux-wrapper">
            <div class="aux-container aux-fold">

                <div id="primary" class="aux-primary" >
                    <div class="content" role="main"  >
        
                    <button class="tilbage button" >Tilbage</button>

                        

                    </div><!-- end content -->
                </div><!-- end primary -->


                <?php get_sidebar(); ?>


            </div><!-- end container -->
        </div><!-- end wrapper -->
    </main><!-- end main -->

<script>

     document.querySelector(".tilbage").addEventListener("click", ()=>{ history.back()});
</script>

<?php get_sidebar('footer'); ?>
<?php get_footer(); ?>
