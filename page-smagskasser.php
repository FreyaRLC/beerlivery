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
                    <div class="content main-smagskasser" role="main"  >

                       <!-- Dette er den container alle hvor alt info bliver puttet ind efter template er kopieret og loopet igennem med json -->
	 
                        <img class="smagskasser-header" src="billeder/specialøl-billede-1" alt="header billede med specialøl">
                        <p>Vi har blandet nogle af vores mest velsmagende og spændende øl i smagskasser, så du kan få en blandet kasse med lige den øltype, du bedst kan lide.</p>
                        <h2>Her ser du vores sortiment af smagskasser.</h2>

     
                       <section id="container"></section>


                    </div><!-- end content -->
                </div><!-- end primary -->

                <?php get_sidebar(); ?>

            </div><!-- end container -->
        </div><!-- end wrapper -->
    </main><!-- end main -->



<script>
    console.log("detvirker")
    console.log("LoadSite")
	 
    // dette er et endpoint, her ser vi vores custom posts fordi der står "smagskasse" til sidst som er vores slug
	const url = "https://freyaluntang.dk/kea/eksamensprojekt/beerlivery_wp/wp-json/wp/v2/smagskasse?per_page=100";
    
    // denne skal bruges hvis man bruger kategorier
    const caturl = "https://freyaluntang.dk/kea/eksamensprojekt/beerlivery_wp/wp-json/wp/v2/categories";
	
	
	let smagskasser;

    hentData(url);

	async function hentData() {
        const respons = await fetch(url);
        smagskasser = await respons.json();
        visSmagskasser();
      }

	    function visSmagskasser() {
			console.log({ smagskasser });

			const container = document.querySelector("#container");
       		const template = document.querySelector("template");

            // her sletter den det tekst der kunne stå i forvejen (kun brugt når der er filtrering)   
			container.textContent = "";

			smagskasser.forEach((smagskasse) => {
            	const klon = template.cloneNode(true).content;
            	klon.querySelector(".billede").src = smagskasse.billede.guid;
            	klon.querySelector(".typeprodukt").textContent = smagskasse.typeprodukt;
                klon.querySelector(".titel").textContent = smagskasse.title.rendered;
            	klon.querySelector(".pris").textContent = smagskasse.pris + " kr.";
            	klon
              		.querySelector("article")
              		.addEventListener("click", () => { location.href = smagskasse.link; })
            	container.appendChild(klon);
        });
      }
		
</script>


<?php get_sidebar('footer'); ?>
<?php get_footer(); ?>





