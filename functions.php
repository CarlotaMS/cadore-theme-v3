<?php
/**
 * Cadore Custom Theme — functions.php
 *
 * @package cadore-custom
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;


/* =========================================================
   1. THEME SUPPORTS
   ========================================================= */

function cadore_setup() {
	// RankMath gere o <title> — não declarar manualmente
	add_theme_support( 'title-tag' );

	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );

	load_theme_textdomain( 'cadore-custom', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'cadore_setup' );


/* =========================================================
   2. NAV MENUS
   ========================================================= */

function cadore_register_menus() {
	register_nav_menus( array(
		'primary' => esc_html__( 'Menu Principal', 'cadore-custom' ),
		'footer'  => esc_html__( 'Menu Rodapé',    'cadore-custom' ),
	) );
}
add_action( 'after_setup_theme', 'cadore_register_menus' );


/* =========================================================
   3. SCRIPTS & STYLES
   ========================================================= */

function cadore_enqueue_scripts() {
	$ver = wp_get_theme()->get( 'Version' );

	// Stylesheet principal
	wp_enqueue_style(
		'cadore-style',
		get_stylesheet_uri(),
		array(),
		$ver
	);

	// JS do menu mobile — footer=true (LiteSpeed: nunca inline no <head>)
	wp_enqueue_script(
		'cadore-menu',
		get_template_directory_uri() . '/js/cadore-menu.js',
		array(),
		$ver,
		true
	);

	// WooCommerce: scripts de comentários de produto
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cadore_enqueue_scripts' );


/* =========================================================
   4. WOOCOMMERCE — THUMBNAIL SIZES
   ========================================================= */

function cadore_woocommerce_image_dimensions() {
	// Formato quadrado para cards de produto (250×250px per spec)
	update_option( 'woocommerce_single_image_width',    800 );
	update_option( 'woocommerce_thumbnail_image_width', 250 );
	update_option( 'woocommerce_thumbnail_cropping',    'custom' );
	update_option( 'woocommerce_thumbnail_cropping_custom_width',  1 );
	update_option( 'woocommerce_thumbnail_cropping_custom_height', 1 );
}
// Executar uma única vez via hook init (não sobrescreve opções a cada request)
if ( get_option( 'cadore_image_dimensions_set' ) !== '1' ) {
	add_action( 'init', function() {
		cadore_woocommerce_image_dimensions();
		update_option( 'cadore_image_dimensions_set', '1' );
	} );
}


/* =========================================================
   5. WOOCOMMERCE — REMOVER WRAPPERS E CONTEÚDO PADRÃO
   ========================================================= */

// Remove wrappers WC padrão para controlo total via tema
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper',    10 );
remove_action( 'woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end', 10 );

// Remove título/descrição da taxonomia e da página de arquivo injectados pelo WC
// (o hero e o breadcrumb são geridos pelo archive-product.php)
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description',  10 );

// Remove o breadcrumb que o WC injeta em woocommerce_before_main_content
// (o breadcrumb é gerido pelo single-product.php via woocommerce_breadcrumb() directo)
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

// Remove o banner/header da página Shop injectado por blocos WC ou pelo template padrão.
// woocommerce_before_shop_loop pode receber conteúdo da página "Shop" definida nas
// definições WC (WooCommerce → Definições → Produtos → Página de loja).
// O título e o conteúdo dessa página são injectados via woocommerce_product_archive_description
// (já removido acima) e via o_filter the_content no contexto da shop page.
// Remover também o hook que processa o conteúdo da página shop como bloco FSE/Gutenberg:
add_filter( 'woocommerce_show_page_title', '__return_false' );

function cadore_woocommerce_wrapper_before() {
	echo '<main id="cadore-main" class="cadore-main cadore-woocommerce-main" role="main">';
}
function cadore_woocommerce_wrapper_after() {
	echo '</main><!-- #cadore-main -->';
}
add_action( 'woocommerce_before_main_content', 'cadore_woocommerce_wrapper_before', 10 );
add_action( 'woocommerce_after_main_content',  'cadore_woocommerce_wrapper_after',  10 );


/* =========================================================
   6. TAMANHOS DE IMAGEM PERSONALIZADOS
   ========================================================= */

function cadore_add_image_sizes() {
	add_image_size( 'cadore-hero',    1200, 400, true );
	add_image_size( 'cadore-product', 250,  250, true );
	add_image_size( 'cadore-atelier', 1200, 400, true );
}
add_action( 'after_setup_theme', 'cadore_add_image_sizes' );


/* =========================================================
   7. WIDGETS / SIDEBARS
   ========================================================= */

function cadore_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Barra Lateral Loja', 'cadore-custom' ),
		'id'            => 'cadore-shop-sidebar',
		'description'   => esc_html__( 'Widgets para a barra lateral da loja.', 'cadore-custom' ),
		'before_widget' => '<section id="%1$s" class="cadore-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="cadore-widget__title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Rodapé — Coluna 1', 'cadore-custom' ),
		'id'            => 'cadore-footer-1',
		'before_widget' => '<div id="%1$s" class="cadore-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="cadore-widget__title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'cadore_widgets_init' );


/* =========================================================
   8. HELPER — IMAGEM DE PRODUTO (ACF FREE FALLBACK)
   ========================================================= */

/**
 * Devolve a URL de imagem para um produto WooCommerce.
 * Ordem: thumbnail WC (cadore-product) → thumbnail WC (woocommerce_thumbnail)
 *        → thumbnail WP nativo → campo ACF product_image → placeholder local.
 *
 * @param  int $post_id
 * @return string URL escapada
 */
function cadore_get_product_image_url( $post_id ) {
	$url = '';

	// 1. Thumbnail no tamanho cadore-product (250×250)
	$url = get_the_post_thumbnail_url( $post_id, 'cadore-product' );

	// 2. Fallback para tamanho WooCommerce padrão (imagens não regeneradas)
	if ( ! $url ) {
		$url = get_the_post_thumbnail_url( $post_id, 'woocommerce_thumbnail' );
	}

	// 3. Fallback para thumbnail nativo WP
	if ( ! $url ) {
		$url = get_the_post_thumbnail_url( $post_id, 'thumbnail' );
	}

	// 4. Campo ACF (ACF Free — nunca 'option')
	if ( ! $url && function_exists( 'get_field' ) ) {
		$acf = get_field( 'product_image', $post_id );
		if ( $acf ) {
			$url = $acf;
		}
	}

	// 5. Placeholder local — caminho absoluto via get_template_directory_uri()
	if ( ! $url ) {
		$url = get_template_directory_uri() . '/images/placeholder-product.jpg';
	}

	return esc_url( $url );
}


/* =========================================================
   9. HELPER — IMAGEM HERO (ACF FREE FALLBACK)
   ========================================================= */

/**
 * Devolve a URL do hero para a homepage.
 * Ordem: campo ACF hero_image (page_on_front) → placeholder local.
 *
 * @return string URL escapada
 */
function cadore_get_hero_image_url() {
	$url = '';

	if ( function_exists( 'get_field' ) ) {
		$front_id = (int) get_option( 'page_on_front' );
		if ( $front_id ) {
			$acf = get_field( 'hero_image', $front_id );
			if ( $acf ) {
				$url = $acf;
			}
		}
	}

	if ( ! $url ) {
		$url = get_template_directory_uri() . '/images/hero-placeholder.jpg';
	}

	return esc_url( $url );
}


/* =========================================================
   10. HELPER — IMAGEM ATELIER (ACF FREE FALLBACK)
   ========================================================= */

/**
 * Devolve a URL da imagem do atelier para page-sobre.php.
 * Ordem: campo ACF atelier_image (post atual) → placeholder local.
 *
 * @return string URL escapada
 */
function cadore_get_atelier_image_url() {
	$url = '';

	if ( function_exists( 'get_field' ) ) {
		$acf = get_field( 'atelier_image' );
		if ( $acf ) {
			$url = $acf;
		}
	}

	if ( ! $url ) {
		$url = get_template_directory_uri() . '/images/atelier-placeholder.jpg';
	}

	return esc_url( $url );
}


/* =========================================================
   11. WOOCOMMERCE — CONTAGEM DO CARRINHO VIA AJAX
   ========================================================= */

/**
 * Atualiza a contagem do carrinho via fragmentos AJAX do WC.
 */
function cadore_cart_count_fragment( $fragments ) {
	if ( ! function_exists( 'WC' ) ) {
		return $fragments;
	}

	$count = WC()->cart ? (int) WC()->cart->get_cart_contents_count() : 0;

	$fragments['.cadore-cart-count'] = '<span class="cadore-cart-count" aria-label="'
		. esc_attr( sprintf( _n( '%d item no carrinho', '%d itens no carrinho', $count, 'cadore-custom' ), $count ) )
		. '">' . esc_html( $count ) . '</span>';

	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'cadore_cart_count_fragment' );


/* =========================================================
   12. SEGURANÇA — REMOVER VERSÃO DO WP
   ========================================================= */

remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );


/* =========================================================
   13. BODY CLASS — CONTEXTO DE PÁGINA
   ========================================================= */

function cadore_body_classes( $classes ) {
	if ( is_singular() ) {
		$classes[] = 'cadore-singular';
	}
	if ( function_exists( 'WC' ) ) {
		if ( is_shop() ) {
			$classes[] = 'cadore-shop';
		}
		if ( is_product() ) {
			$classes[] = 'cadore-product-single';
		}
		if ( is_product_category() ) {
			$classes[] = 'cadore-product-category';
		}
	}
	return $classes;
}
add_filter( 'body_class', 'cadore_body_classes' );


/* =========================================================
   14. EXCERPT — COMPRIMENTO PERSONALIZADO
   ========================================================= */

function cadore_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'cadore_excerpt_length', 999 );

function cadore_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'cadore_excerpt_more' );


/* =========================================================
   15. NAV FALLBACK
   ========================================================= */

/**
 * Fallback do menu quando nenhum menu está atribuído à localização "primary".
 * Mostra apenas o link para a homepage.
 */
function cadore_nav_fallback() {
	echo '<ul><li><a href="' . esc_url( home_url( '/' ) ) . '">'
		. esc_html__( 'Início', 'cadore-custom' )
		. '</a></li></ul>';
}


/* =========================================================
   16. WOOCOMMERCE — TEXTDOMAIN PORTUGUÊS
   Carrega as traduções PT do WooCommerce para que strings
   como "Showing results" e "Default sorting" apareçam
   traduzidas quando o ficheiro .mo correspondente existir
   em wp-content/languages/plugins/.
   ========================================================= */

function cadore_load_woocommerce_pt_textdomain() {
	load_plugin_textdomain(
		'woocommerce',
		false,
		WP_LANG_DIR . '/plugins/'
	);
}
add_action( 'init', 'cadore_load_woocommerce_pt_textdomain', 5 );
