<?php
/**
 * The template for displaying pages.
 *
 * 
 * @package    Auxin
 * @author     averta (c) 2014-2022
 * @link       http://averta.net
 */
get_header(); ?>


 <template>
        <article class="klikbar">
          <img class="billede" src="" alt="" />
          <p class="typeprodukt"></p>
          <h2 class="titel"></h2>
          <p class="pris"></p>
          <p class="langbeskrivelse"></p>
          <p class="kortbeskrivelse"></p>
          <p class="lagerinfo"></p>
          <p class="varenummer"></p>
          <p class="oltyper"></p>
        </article>
      </template>

    <main id="main" <?php auxin_content_main_class(); ?> >
        <div class="aux-wrapper">
            <div class="aux-container aux-fold">

                <div id="primary" class="aux-primary" >
                    <div class="content" role="main"  >

                       <!-- Dette er den container alle hvor alt info bliver puttet ind efter template er kopieret og loopet igennem med json -->
	 <section id="container"></section>


                    </div><!-- end content -->
                </div><!-- end primary -->

                <?php get_sidebar(); ?>

            </div><!-- end container -->
        </div><!-- end wrapper -->
    </main><!-- end main -->

<?php get_sidebar('footer'); ?>
<?php get_footer(); ?>





