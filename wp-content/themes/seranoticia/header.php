<!doctype html>
<html lang="es">
<head>
<title><?php if ( is_category() ) {
		echo single_cat_title(); echo ' | '; bloginfo( 'name' );
	} elseif ( is_tag() ) {
		echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
	} elseif ( is_archive() ) {
		wp_title(''); echo ' Archive | '; bloginfo( 'name' );
	} elseif ( is_search() ) {
		echo 'Search for &quot;'.wp_specialchars($s).'&quot; | '; bloginfo( 'name' );
	} elseif ( is_home() ) {
		bloginfo( 'name' ); /*echo ' | ';*/ bloginfo( 'description' );
	}  elseif ( is_404() ) {
		echo 'Error 404 No se encontró lo que buscaba :(  | '; bloginfo( 'name' );
	} elseif ( is_single() ) {
		wp_title('');
	} else {
		echo wp_title(''); echo ' | '; bloginfo( 'name' );
	} ?></title>


    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    <!--[if lt IE 9]>
        <script src='http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js'></script>
     <![endif]-->
  

<?php wp_head(); ?> 
	<meta property="fb:app_id" content="203368716368157">
	<meta property="fb:admins" content="418067554970895">
	 
	<meta name="description" content="<?php wp_title(''); echo ' | '; bloginfo( 'description' ); ?>" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<!--meta name="viewport" content="width=device-width; initial-scale=1"/><?php /* Add "maximum-scale=1" to fix the Mobile Safari auto-zoom bug on orientation changes, but keep in mind that it will disable user-zooming completely. Bad for accessibility. */ ?>-->
	<!-- <link rel="icon" href="<?php //bloginfo('template_url'); ?>/whiteboard_favicon.ico" type="image/x-icon" /> -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<?php //wp_enqueue_script("jquery"); /* Loads jQuery if it hasn't been loaded already */ ?>
	
	<!--script type="text/javascript" src="js/jquery-1.10.2.min.js"></script-->
	<script type="text/javascript" src="http://www.bci.cl/common/include/valores.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/modernizr.js" ></script>
	<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/respond.js" ></script> 	
 	<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/prefixfree.min.js" ></script> 
 
	<script type="text/javascript">


	</script>
	<script type="text/javascript">
	 	//abreviación para document.getElementById
	
		//función que obtiene el valor deseado
		//formatear_numero es una función definida en el archivo del bci
		 
		function formatear_numero1(numero)
		{
				var nroFormateado = '';
				var band = 0;
				for (i=0;i<=numero.length;i++){
					if(numero.charAt(i)=="-"){
						band++;
					}
					if ( numero.charAt(i)=="." || numero.charAt(i)==",")
						nroFormateado = formato_miles(nroFormateado) + ",";		
					else
						nroFormateado = nroFormateado +  numero.charAt(i);
				}
			        if(band>0){
					 nroFormateado = "-" + nroFormateado;
				}
				return nroFormateado;
		}
		 function formatear_numero2(numero){
			 var nroFormateado = '';
					var indice=0;
					var band=false;
			 var numero2 = new String(numero);
			 for (i=0;i<=numero2.length && indice<=2;i++){
			  if ( numero2.charAt(i)=="." || numero2.charAt(i)==","){
			   nroFormateado = formato_miles(nroFormateado) + ",";
									band=true;  
			  }else{
			   nroFormateado = nroFormateado +  numero2.charAt(i);
			  }
			  if(band)
				indice++;
			 }
			 return nroFormateado;
		}
		 
	</script>

</head>
<body>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
 var js, fjs = d.getElementsByTagName(s)[0];
 if (d.getElementById(id)) return;
 js = d.createElement(s); js.id = id;
 js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1&appId=418067554970895";
 fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div class="wrapper"> 
			<header> 
				
				<aside id="menu-superior" >
					<aside class="search inline">
						 <?php get_search_form(); ?> 
					</aside>
					<aside class="menu inline">
						<ul>
							<li><a href="<?php bloginfo('url');?>">Inicio</a></li>
							<li><a href="<?php bloginfo('url');?>/Nosotros/">Nosotros</a></li>
							<li><a href="<?php bloginfo('url');?>/legal/">Legal</a></li>
							<li><a href="<?php bloginfo('url');?>/contactos/">Contactos</a> </li> 
						</ul>
					</aside>
				</aside>
				<h1><a href="<?php bloginfo('url');?>"><img src="<?php print IMAGES; ?>/logo4.png" alt="<?php bloginfo('name')?>"></a></h1>	
				
				<!--?php wp_nav_menu(array('menu'=>'Main', 'container'=>'nav')); ?-->
				<aside id="main-menu" >
					<aside class="iconos-sociales inline">
						 <!--img src="<?php 	//print IMAGES;?>/_social/Facebook.png" alt="F"--> 
					</aside>
					
				</aside>
		
			
			</header>