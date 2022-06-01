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
          <div class="smagskasse-info">
            <p class="typeprodukt"></p>
            <h2 class="titel"></h2>
            <p class="pris"></p>
            <p class="langbeskrivelse"></p>
            <p class="kortbeskrivelse"></p>
            <p class="lagerinfo"></p>
            <p class="varenummer"></p>
            <p class="oltyper"></p>
            <p class="indholdtitel"></p>
            <p class="smagskasseindhold"></p>
            <button class="button aux-button aux-medium aux-carmine-pink aux-none aux-uppercase">Mere info</button>
          </div>
        </article>
      </template>

    <main id="main" <?php auxin_content_main_class(); ?> >
        <div class="aux-wrapper">
            <div class="aux-container aux-fold">

                <div id="primary" class="aux-primary" >
                    <div class="content main-smagskasser" role="main"  >

                       <!-- Dette er den container alle hvor alt info bliver puttet ind efter template er kopieret og loopet igennem med json -->
	 
                       <div class="smagskasser-header"></div> 
                        <p>Vi har et bredt udvalg af danske speciaøl og danskproduceret Whiskey og Gin. Alt sammen er af højeste kvalitet specielt udvalgt fra nogle af landets bedste nano- og mikrobryggerier og destillerier.</p>
                        <h2>Her ser du vores udvalg af specialøl og spiritus fra danske bryggerier.</h2>

                        <div id="filtrering"><button class="button aux button" data-bryggeri="alle">Alle</button></div>
                       <section id="container" class="container_produkt"></section>


                    </div><!-- end content -->
                </div><!-- end primary -->

                <?php get_sidebar(); ?>

            </div><!-- end container -->
        </div><!-- end wrapper -->
    </main><!-- end main -->



<script>
    console.log("LoadSite")
	 
    // dette er et endpoint, her ser vi vores custom posts fordi der står "produkt" til sidst som er vores slug
	const url = "https://freyaluntang.dk/kea/eksamensprojekt/beerlivery_wp/wp-json/wp/v2/produkt?per_page=100";
    
    // denne skal bruges hvis man bruger kategorier
    const catUrl = "https://freyaluntang.dk/kea/eksamensprojekt/beerlivery_wp/wp-json/wp/v2/categories";
	
	
	let produkter;
  let categories;
  let filterBryggeri = "alle";

    hentData(url);

	async function hentData() {
        const respons = await fetch(url);
        const catdata = await fetch(catUrl);
        produkter = await respons.json();
        categories = await catdata.json();
        console.log(categories);
        visProdukter();
        opretKnapper();
      }

       // opretter knapperne alt efter de kategorier vi har
       function opretKnapper() {
        categories.forEach((cat) => {
          document.querySelector(
            "#filtrering"
          ).innerHTML += `<button class="filter button aux button" data-bryggeri="${cat.id}">${cat.name}</button>`;
        });

        addEventListenersToButtons();
      }

       // tilføjer eventlisteners til knapper
       function addEventListenersToButtons() {
        document.querySelectorAll("#filtrering button").forEach((element) => {
          element.addEventListener("click", filtrering);
        });
      }

      function filtrering() {
        filterBryggeri = this.dataset.bryggeri;
        console.log(filterBryggeri);

        visProdukter();
      }

	    function visProdukter() {
			console.log({ produkter });

			const container = document.querySelector("#container");
       		const template = document.querySelector("template");

            // her sletter den det indhold der kunne være i forvejen (kun brugt når der er filtrering)   
			container.innerHTML = "";

			produkter.forEach((produkt) => {
        if (
            filterBryggeri == "alle" ||
            produkt.categories.includes(parseInt(filterBryggeri))
          ) {
            	const klon = template.cloneNode(true).content;
            	klon.querySelector(".billede").src = produkt.billede.guid;
            	klon.querySelector(".typeprodukt").textContent = produkt.typeprodukt;
              klon.querySelector(".titel").textContent = produkt.title.rendered;
            	klon.querySelector(".pris").textContent = produkt.pris + " kr.";
            	klon
              		.querySelector("article")
              		.addEventListener("click", () => { location.href = produkt.link; })
            	container.appendChild(klon);
          }
        });
      }
		
</script>


<?php get_sidebar('footer'); ?>
<?php get_footer(); ?>





