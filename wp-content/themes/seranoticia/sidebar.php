
<section id="sidebar" class="inline">
	<aside >
			<div class = "sidebar" ><!--FOTO DENUNCIA-->
				<?php 
					$color = "azul";
					$foto = "camara";
					$titulo_normal="FOTO";
					$titulo_negrita="DENUNCIA";
					$subtitulo="Denuncias Ciudadanas en Fotografía";
					include("titulos-tema.php");
				?>
			
				<aside>
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar_primario') ) : ?><?php endif; ?>
				</aside>
				<div>

					<a href="<?php bloginfo('url');?>/contactos/"><img src="<?php echo IMAGES; ?>/fotodenuncia.jpg" alt="foto-denuncia"/></a>
				</div>
				<?php 
					$link = "/foto-denuncia-2/";
					$color="azul";
					include("ver_mas.php"); 
				?>
			</div>
			<div class = "sidebar"><!-- CAMARA TESTIGO -->
					<?php 
					$foto = "camaratestigo";
					$color = "azul";
					$titulo_normal="CÁMARA";
					$titulo_negrita="TESTIGO";
					$subtitulo="Reportajes de seranoticia.cl";
					include("titulos-tema.php");
				?>

				<!-- contenidos -->
				<?php echo do_shortcode("[SlideDeck2 id=92]"); ?>
				<!-- fin contendido -->
	 			<?php 
					$color="azul";
					$link = "/camara-testigo/";
					include("ver_mas.php"); 
				?>
			</div>
			 
			 <div class = "sidebar"> <!-- POLICIAL -->
			 	<?php 
					$color = "rojo";
					$foto = "policial";
					$titulo_normal="POLICIAL";
					$titulo_negrita="";
					$subtitulo="Cobertura especial";
					include("titulos-tema.php");?>
				
				<?php echo do_shortcode("[SlideDeck2 id=94]"); ?>
				
				<?php 
					$color="rojo";
					$link = "/category/policial/"; 
					include("ver_mas.php"); 
				?>
		 	</div>
			<div class = "sidebar"> <!-- Lo Más leido -->
				<?php
					$foto = "noticias"; 
					$color = "verde";
					$titulo_normal="LOMÁS";
					$titulo_negrita="LEIDO";
					$subtitulo="Lo más leido del día en seranoticia.cl";
					include("titulos-tema.php");
				?>

			</div>
	</aside>
</section>