<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div class="buscador">
    	<label class="screen-reader-text" for="s"></label>
        <input type="text" value="" name="s" id="s"  placeholder="Buscar Noticias"/>
        <input type="image" id="searchsubmit" src="<?php echo IMAGES; ?>/buscar.png" width="18"/>
    </div>
</form>