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

    const urlParams = new URLSearchParams(window.location.search);
        const id = <?php echo get_the_ID() ?>;
        console.log({id});
        let smagskasse;

        const url = `https://freyaluntang.dk/kea/eksamensprojekt/beerlivery_wp/wp-json/wp/v2/smagskasse/${id}`;

        async function hentData() {
        console.log("hentData");
        const respons = await fetch(url);
        projekt = await respons.json();
        console.log({smagskasse});
        vis();
        }

        function vis(){

          klon.querySelector(".billede").src = smagskasse.billede.guid;
          klon.querySelector(".titel").textContent = smagskasse.title.rendered;
          klon.querySelector(".pris").textContent = smagskasse.pris + " kr.";
          klon.querySelector(".kortbeskrivelse").textContent = smagskasse.kortbeskrivelse;
          klon.querySelector(".lagerinfo").textContent = smagskasse.lagerinfo;
          klon.querySelector(".varenummer").textContent = smagskasse.varenummer;
          klon.querySelector(".langbeskrivelse").textContent = smagskasse.langbeskrivelse;
          klon.querySelector(".oltyper").textContent = smagskasse.oltyper;


          klon.querySelector(".typeprodukt").textContent = smagskasse.typeprodukt;
          
          
        }

        smagskasser.forEach((smagskasse) => {
            	const klon = template.cloneNode(true).content;
            	
            	klon
              		.querySelector("article")
              		.addEventListener("click", () => { location.href = smagskasse.link; })
            	container.appendChild(klon);
        });

        hentData();

     document.querySelector(".tilbage").addEventListener("click", ()=>{ history.back()});
</script>

<?php get_sidebar('footer'); ?>
<?php get_footer(); ?>
