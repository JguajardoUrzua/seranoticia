<?php 
	define( 'TEMPPATH' , get_bloginfo('stylesheet_directory') );
	define( 'IMAGES', TEMPPATH.'/images' );


//error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE);# ...but do log them


    // add_theme_support('nav-menus');
    // if(function_exists('register_nav_menus')){
    //     register_nav_menus(
    //         array('main'=>'Main Nav')
    //     );
    // };
	add_theme_support('nav-menus');
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(150, 150, true); 
	add_image_size( 'thumb_seranoticia', 150, 120 , true); 
    add_image_size( 'thumb_seranoticia_mini', 130, 97 , true); 
	add_image_size( 'thumb_post_reciente', 150, 120 , true); 

 

	if(function_exists('register_sidebar')){
		register_sidebar(
			array(
        		'name' => 'Sidebar Derecha',
        		'id' => 'sidebar_primario',
        		'before_widget' => '<div>',
        		'after_widget' => '</div>',
        		'before_title' => '<h2 class="titulo">',
        		'after_title' => '</h2>',
        	)
		);
          register_sidebar(
            array(
                'name' => 'Sidebar Izquierda',
                'id' => 'izquierda',
                'before_widget' => '<div>',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="titulo">',
                'after_title' => '</h2>',
            )
        );
	}; 	
   

	add_action( 'init', 'create_post_type' );
	function create_post_type() {
		register_post_type( 'podcast_sn',
			array(
				'labels' => array(
					'name' => __( 'SN Radio' ),
					'singular_name' => __( 'SN Radio' )
				),
			'public' => true,
			'has_archive' => true,
			)
		);

	}


	// Permitir comentarios encadenados
	// function enable_threaded_comments(){
 //    	if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
 //    	   wp_enqueue_script('comment-reply');
 //    	}
	// }
	// add_action('get_header', 'enable_threaded_comments');

  
/* Function that Rounds To The Nearest Value.
   Needed for the pagenavi() function */
function round_num($num, $to_nearest) {
   /*Round fractions down (http://php.net/manual/en/function.floor.php)*/
   return floor($num/$to_nearest)*$to_nearest;
}
/*DETERMINAR TAMAÑO DEL EXCERPT*/
// function excerpt($num) {
//     $limit = $num+1;
//     $excerpt = explode(' ', get_the_excerpt(), $limit);
//     array_pop($excerpt);
//     $excerpt = implode(" ",$excerpt)." - <strong> [Continua Leyendo]</strong>";
//     echo $excerpt;
// }
function largo_extracto($length) {
    if(is_category('3'))
        return 30;
    if(is_search())
        return 30;
    else
        return 20;
}
//tamaño del Titulo
function tituloRecortado($limite) {
    $titulo = get_the_title($post->ID);
    $titulo = substr($titulo, 0, $limite) . '...';
    echo $titulo;
}
function mi_excerpt_leermas() {
       global $post;
    return '<a href="'. get_permalink($post->ID) . '"> <strong> ...</strong></a>';
}
add_filter('excerpt_more', 'mi_excerpt_leermas');


add_filter('excerpt_length', 'largo_extracto');
/* Function that performs a Boxed Style Numbered Pagination (also called Page Navigation).
   Function is largely based on Version 2.4 of the WP-PageNavi plugin */
function pagenavi($before = '', $after = '') {
    global $wpdb, $wp_query;
    $pagenavi_options = array();
    $pagenavi_options['pages_text'] = ('Página %CURRENT_PAGE% de %TOTAL_PAGES%:');
    $pagenavi_options['current_text'] = '%PAGE_NUMBER%';
    $pagenavi_options['page_text'] = '%PAGE_NUMBER%';
    $pagenavi_options['first_text'] = ('Primera');
    $pagenavi_options['last_text'] = ('Última');
    $pagenavi_options['next_text'] = 'Siguiente &raquo;';
    $pagenavi_options['prev_text'] = '&laquo; Anterior';
    $pagenavi_options['dotright_text'] = '...';
    $pagenavi_options['dotleft_text'] = '...';
    $pagenavi_options['num_pages'] = 5; //continuous block of page numbers
    $pagenavi_options['always_show'] = 0;
    $pagenavi_options['num_larger_page_numbers'] = 0;
    $pagenavi_options['larger_page_numbers_multiple'] = 5;
  
    //If NOT a single Post is being displayed
    /*http://codex.wordpress.org/Function_Reference/is_single)*/
    if (!is_single()) {
        $request = $wp_query->request;
        //intval — Get the integer value of a variable
        /*http://php.net/manual/en/function.intval.php*/
        $posts_per_page = intval(get_query_var('posts_per_page'));
        //Retrieve variable in the WP_Query class.
        /*http://codex.wordpress.org/Function_Reference/get_query_var*/
        $paged = intval(get_query_var('paged'));
        $numposts = $wp_query->found_posts;
        $max_page = $wp_query->max_num_pages;
  
        //empty — Determine whether a variable is empty
        /*http://php.net/manual/en/function.empty.php*/
        if(empty($paged) || $paged == 0) {
            $paged = 1;
        }
  
        $pages_to_show = intval($pagenavi_options['num_pages']);
        $larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
        $larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
        $pages_to_show_minus_1 = $pages_to_show - 1;
        $half_page_start = floor($pages_to_show_minus_1/2);
        //ceil — Round fractions up (http://us2.php.net/manual/en/function.ceil.php)
        $half_page_end = ceil($pages_to_show_minus_1/2);
        $start_page = $paged - $half_page_start;
  
        if($start_page <= 0) {
            $start_page = 1;
        }
  
        $end_page = $paged + $half_page_end;
        if(($end_page - $start_page) != $pages_to_show_minus_1) {
            $end_page = $start_page + $pages_to_show_minus_1;
        }
        if($end_page > $max_page) {
            $start_page = $max_page - $pages_to_show_minus_1;
            $end_page = $max_page;
        }
        if($start_page <= 0) {
            $start_page = 1;
        }
  
        $larger_per_page = $larger_page_to_show*$larger_page_multiple;
        //round_num() custom function - Rounds To The Nearest Value.
        $larger_start_page_start = (round_num($start_page, 10) + $larger_page_multiple) - $larger_per_page;
        $larger_start_page_end = round_num($start_page, 10) + $larger_page_multiple;
        $larger_end_page_start = round_num($end_page, 10) + $larger_page_multiple;
        $larger_end_page_end = round_num($end_page, 10) + ($larger_per_page);
  
        if($larger_start_page_end - $larger_page_multiple == $start_page) {
            $larger_start_page_start = $larger_start_page_start - $larger_page_multiple;
            $larger_start_page_end = $larger_start_page_end - $larger_page_multiple;
        }
        if($larger_start_page_start <= 0) {
            $larger_start_page_start = $larger_page_multiple;
        }
        if($larger_start_page_end > $max_page) {
            $larger_start_page_end = $max_page;
        }
        if($larger_end_page_end > $max_page) {
            $larger_end_page_end = $max_page;
        }
        if($max_page > 1 || intval($pagenavi_options['always_show']) == 1) {
            /*http://php.net/manual/en/function.str-replace.php */
            /*number_format_i18n(): Converts integer number to format based on locale (wp-includes/functions.php*/
            $pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
            $pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
            echo $before.'<div class="pagenavi">'."\n";
  
            if(!empty($pages_text)) {
                echo '<span class="pages">'.$pages_text.'</span>';
            }
            //Displays a link to the previous post which exists in chronological order from the current post.
            /*http://codex.wordpress.org/Function_Reference/previous_post_link*/
            previous_posts_link($pagenavi_options['prev_text']);
  
            if ($start_page >= 2 && $pages_to_show < $max_page) {
                $first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
                //esc_url(): Encodes < > & " ' (less than, greater than, ampersand, double quote, single quote).
                /*http://codex.wordpress.org/Data_Validation*/
                //get_pagenum_link():(wp-includes/link-template.php)-Retrieve get links for page numbers.
                echo '<a href="'.esc_url(get_pagenum_link()).'" class="first" title="'.$first_page_text.'">1</a>';
                if(!empty($pagenavi_options['dotleft_text'])) {
                    echo '<span class="expand">'.$pagenavi_options['dotleft_text'].'</span>';
                }
            }
  
            if($larger_page_to_show > 0 && $larger_start_page_start > 0 && $larger_start_page_end <= $max_page) {
                for($i = $larger_start_page_start; $i < $larger_start_page_end; $i+=$larger_page_multiple) {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }
  
            for($i = $start_page; $i  <= $end_page; $i++) {
                if($i == $paged) {
                    $current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
                    echo '<span class="current">'.$current_page_text.'</span>';
                } else {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }
  
            if ($end_page < $max_page) {
                if(!empty($pagenavi_options['dotright_text'])) {
                    echo '<span class="expand">'.$pagenavi_options['dotright_text'].'</span>';
                }
                $last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
                echo '<a href="'.esc_url(get_pagenum_link($max_page)).'" class="last" title="'.$last_page_text.'">'.$max_page.'</a>';
            }
            next_posts_link($pagenavi_options['next_text'], $max_page);
  
            if($larger_page_to_show > 0 && $larger_end_page_start < $max_page) {
                for($i = $larger_end_page_start; $i <= $larger_end_page_end; $i+=$larger_page_multiple) {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }
            echo '</div>'.$after."\n";
        }
    }
}


 ?>