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
        
                    <!-- <button class="tilbage button aux-button aux-medium aux-carmine-pink aux-none aux-uppercase" >Tilbage</button> -->

                        <article class="klikbar">
                            <div class="single-grid">
                                <img class="billede" src="" alt="" />
                                <div class="single-tekst">
                                    <h2 class="titel titel_loop_produkt"></h2>
                                    <p class="pris"></p>
                                    <p class="kortbeskrivelse"></p>
                                    <p class="lagerinfo"></p>
                                    <button class="button aux-button aux-medium aux-carmine-pink aux-none aux-uppercase">Tilføj til kurv</button>
                                    <p class="varenummer lille_tekst"></p>
                                    <hr>
                                    <p class="langbeskrivelse"></p>
                                    <p class="oltyper"></p>
                                    <p class="typeprodukt"></p>
                                </div>
                            </div>
                            <p class="indholdtitel"></p>
                            <p class="smagskasseindhold"></p>
                               
                        </article>
        

                    </div><!-- end content -->
                </div><!-- end primary -->


                


            </div><!-- end container -->
        </div><!-- end wrapper -->
    </main><!-- end main -->

<script>

    console.log("detvirker")


    let produkt;
    document.addEventListener("DOMContentLoaded", getJson);

    async function getJson(){
        console.log("Id er", <?php echo get_the_ID()?>);
        
    let jsonData = await fetch(`https://freyaluntang.dk/kea/eksamensprojekt/beerlivery_wp/wp-json/wp/v2/produkt/<?php echo get_the_ID() ?>`);
    produkt = await jsonData.json();
    vis();
    }
        

        function vis(){

          document.querySelector(".billede").src = produkt.billede.guid;
          document.querySelector(".titel").textContent = produkt.title.rendered;
          document.querySelector(".pris").textContent = produkt.pris + " kr.";
          document.querySelector(".kortbeskrivelse").textContent = produkt.kortbeskrivelse;
          document.querySelector(".lagerinfo").textContent = produkt.lagerinfo;
          document.querySelector(".varenummer").textContent = produkt.varenummer;
          document.querySelector(".langbeskrivelse").textContent = produkt.langbeskrivelse;
          document.querySelector(".oltyper").textContent = produkt.oltyper;
          document.querySelector(".typeprodukt").textContent = produkt.typeprodukt;
        


          
          
        }
    // Dette var hvis vi ønskede en tilbage knap
    //  document.querySelector(".tilbage").addEventListener("click", ()=>{ history.back()});
</script>

<?php get_sidebar('footer'); ?>
<?php get_footer(); ?>
