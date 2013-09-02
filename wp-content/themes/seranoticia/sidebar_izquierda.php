<section id="sidebarIzquierda" class="inline">
	<aside >
			<!-- INDICADORES -->
		<div class="sidebar-izquierda">
			 
				<?php
					setlocale(LC_ALL,"es_ES");
					date_default_timezone_set("Chile/Continental"); 
					$color = "verde";
					$foto = "indicadores";
					$titulo_normal="INDICADORES";
					$titulo_negrita="";
					$subtitulo=strftime("%A %d de %B ");
					include("titulos-tema.php");
				?>
	
				<!-- INDICADORES ECONÓMICOS -->
				<aside id="indicadores" class="inline">
					<ul>
					<!-- DOLAR -->
					<li><span class="izquierda">USD : </span><span class="derecha" >$<script>if(typeof(arrValores) != "undefined")
								   if(typeof(arrValores[55])=="object")
									document.write(formatear_numero1(arrValores[55].valor2));</script></span>
					</li>
					<!-- UF -->
					<li><span class="izquierda">UF : </span><span class="derecha" >$<script>if(typeof(arrValores) != "undefined")
								   if(typeof(arrValores[4])=="object")
									document.write(formatear_numero1(arrValores[4].valor2));</script></span>
					</li>
					<!-- UTM -->
					<li><span class="izquierda">UTM : </span><span  class="derecha">$<script>if(typeof(arrValores) != "undefined")
								   if(typeof(arrValores[5])=="object")
									document.write(formatear_numero1(arrValores[5].valor2));</script></span>
					</li>
					<!-- EURO -->
					<li><span class="izquierda">EURO : </span><span class="derecha" >$<script>if(typeof(arrValores) != "undefined")
										  if(typeof(arrValores) != "undefined"){
							if((typeof(arrValores[8])=="object") && (typeof(arrValores[55])=="object")){
								var xRealValor=parseFloat(arrValores[55].valor2)/(parseFloat(1) / parseFloat(arrValores[8].venda));
								document.write(formatear_numero2(xRealValor));
							}
						}
					</script></span>
					</li>
					
					<!-- peso argentino -->
					<li><span class="izquierda">P. ARG. : </span><span  class="derecha">$<script>if(typeof(arrValores) != "undefined")
								 //   if(typeof(arrValores[10])=="object")
									// document.write(formatear_numero1(arrValores[10].valor2));
 											  if(typeof(arrValores) != "undefined"){
							if((typeof(arrValores[10])=="object") && (typeof(arrValores[55])=="object")){
								var xRealValor=parseFloat(arrValores[55].valor2)*(parseFloat(1) / parseFloat(arrValores[10].venda));
								document.write(formatear_numero2(xRealValor));
							}
						}
					</script></span>


					</li>
					<!-- YEN -->
					<li><span class="izquierda">YEN : </span><span class="derecha">$<script>if(typeof(arrValores) != "undefined")
								   if(typeof(arrValores[9])=="object")
									document.write(formatear_numero1(arrValores[9].valor2));</script></span>
					</li>

					</ul>
				</aside>
				<!-- FIN INDICADORES -->
				<?php 
					$color="azul";
					$link = "/camaratestigo";
					include("ver_mas.php"); 
				?>
		</div>
		<!-- FIN DIV INDICADRORES -->
		<div class="sidebar-izquierda">
				<?php 
					$color = "verde";
					$foto = "clima";
					$titulo_normal="CLIMA";
					$titulo_negrita="";
					$subtitulo=" Curico";
					include("titulos-tema.php");
				?>

				<aside>
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('izquierda') ) : ?><?php endif; ?>
				</aside>
		</div>

	
	
	</aside>
</section>