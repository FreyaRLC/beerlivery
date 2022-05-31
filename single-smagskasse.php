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

                        <article class="klikbar">
                            <img class="billede" src="" alt="" />
                            <div class="smagskasse-info">
                                <p class="typeprodukt"></p>
                                <h2 class="titel"></h2>
                                <p class="pris"></p>
                                <p class="langbeskrivelse"></p>
                                <p class="kortbeskrivelse"></p>
                                <p class="lagerinfo"></p>
                                <p class="varenummer"></p>
                                <p class="oltyper"></p>
                                <button class="button aux-button aux-medium aux-carmine-pink aux-none aux-uppercase">Tilføj til kurv</button>
                            </div>
                        </article>
        

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
