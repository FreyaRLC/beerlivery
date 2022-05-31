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
        
                    <button class="tilbage button aux-button aux-medium aux-carmine-pink aux-none aux-uppercase" >Tilbage</button>

                        <article class="klikbar">
                            <img class="billede" src="" alt="" />
                            <h2 class="titel"></h2>
                            <p class="pris"></p>
                                <p class="kortbeskrivelse"></p>
                                <p class="lagerinfo"></p>
                                <button class="button aux-button aux-medium aux-carmine-pink aux-none aux-uppercase">Tilføj til kurv</button>
                                <p class="varenummer"></p>
                                <p class="langbeskrivelse"></p>
                                <p class="oltyper"></p>
                                <p class="typeprodukt"></p>
                               
                        </article>
        

                    </div><!-- end content -->
                </div><!-- end primary -->


                


            </div><!-- end container -->
        </div><!-- end wrapper -->
    </main><!-- end main -->

<script>

    let smagskasse;
    document.addEventListener("DOMContentLoaded", getJson);

    async function getJson(){
        console.log("Id er", <?php echo get_the_ID()?>);
        
    let jsonData = await fetch(`https://freyaluntang.dk/kea/eksamensprojekt/beerlivery_wp/wp-json/wp/v2/smagskasse/<?php echo get_the_ID() ?>`);
    smagskasse = await jsonData.json();
    vis();
    }
        

        function vis(){

          document.querySelector(".billede").src = smagskasse.billede.guid;
          document.querySelector(".titel").textContent = smagskasse.title.rendered;
          document.querySelector(".pris").textContent = smagskasse.pris + " kr.";
          document.querySelector(".kortbeskrivelse").textContent = smagskasse.kortbeskrivelse;
          document.querySelector(".lagerinfo").textContent = smagskasse.lagerinfo;
          document.querySelector(".varenummer").textContent = smagskasse.varenummer;
          document.querySelector(".langbeskrivelse").textContent = smagskasse.langbeskrivelse;
          document.querySelector(".oltyper").textContent = smagskasse.oltyper;


          document.querySelector(".typeprodukt").textContent = smagskasse.typeprodukt;
          
          
        }

        // smagskasser.forEach((smagskasse) => {
        //     	const klon = template.cloneNode(true).content;
            	
        //     	klon
        //       		.querySelector("article")
        //       		.addEventListener("click", () => { location.href = smagskasse.link; })
        //     	container.appendChild(klon);
        // });

     document.querySelector(".tilbage").addEventListener("click", ()=>{ history.back()});
</script>

<?php get_sidebar('footer'); ?>
<?php get_footer(); ?>
