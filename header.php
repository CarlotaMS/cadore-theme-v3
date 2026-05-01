<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Sem <title> — RankMath injeta via wp_head() -->

  <style>
    /* =====================================================
       @font-face — declarado APENAS em header.php
       Pasta: /wp-content/themes/cadore-custom/fonts/
    ===================================================== */
    @font-face {
      font-family: 'CreatoDisplay';
      src: url('<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/CreatoDisplay-Light.woff2') format('woff2'),
           url('<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/CreatoDisplay-Light.woff')  format('woff');
      font-weight: 300;
      font-style: normal;
      font-display: swap;
    }

    @font-face {
      font-family: 'Brolimo';
      src: url('<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/Brolimo-Regular.woff2') format('woff2'),
           url('<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/Brolimo-Regular.woff')  format('woff');
      font-weight: 400;
      font-style: normal;
      font-display: swap;
    }

    /* =====================================================
       :root — CSS Variables (definidas APENAS aqui)
    ===================================================== */
    :root {
      --cadore-sage:        #A6B5A0;
      --cadore-cream:       #F5F1E8;
      --cadore-dark-sage:   #4A5A50;
      --cadore-gold:        #C8B8A0;
      --cadore-gold-rich:   #D4AF37;
      --cadore-white:       #FFFFFF;
      --cadore-black:       #000000;

      /* Tipografia */
      --cadore-font-heading: 'CreatoDisplay', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      --cadore-font-accent:  'Brolimo', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      --cadore-font-body:    -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;

      /* Espaçamento */
      --cadore-header-h:    72px;
      --cadore-max-width:   1200px;
      --cadore-radius:      6px;

      /* Sombras */
      --cadore-shadow-sm:   0 2px 4px rgba(0, 0, 0, 0.05);
      --cadore-shadow-md:   0 4px 16px rgba(0, 0, 0, 0.10);

      /* Transições */
      --cadore-transition:  0.2s ease;
    }

    /* =====================================================
       Skip to content
    ===================================================== */
    .cadore-skip-link {
      position: absolute;
      top: -100%;
      left: 1rem;
      z-index: 9999;
      padding: 0.6rem 1.2rem;
      background-color: var(--cadore-dark-sage);
      color: var(--cadore-cream);
      font-size: 0.875rem;
      font-weight: 600;
      border-radius: 0 0 var(--cadore-radius) var(--cadore-radius);
      text-decoration: none;
      transition: top 0.15s ease;
    }

    .cadore-skip-link:focus {
      top: 0;
    }

    /* =====================================================
       Reset CSS básico
    ===================================================== */
    *,
    *::before,
    *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html {
      font-size: 16px;
      -webkit-text-size-adjust: 100%;
      scroll-behavior: smooth;
    }

    body {
      font-family: var(--cadore-font-body);
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.6;
      color: var(--cadore-dark-sage);
      background-color: var(--cadore-white);
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    img,
    svg {
      display: block;
      max-width: 100%;
      height: auto;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    ul,
    ol {
      list-style: none;
    }

    button {
      cursor: pointer;
      border: none;
      background: none;
      font-family: inherit;
    }

    input,
    textarea,
    select {
      font-family: inherit;
      font-size: inherit;
    }

    h1, h2, h3, h4, h5, h6 {
      font-family: var(--cadore-font-heading);
      font-weight: 300;
      line-height: 1.2;
      color: var(--cadore-dark-sage);
    }

    /* =====================================================
       Site wrapper
    ===================================================== */
    .cadore-site-wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* =====================================================
       HEADER
    ===================================================== */
    .cadore-header {
      position: sticky;
      top: 0;
      z-index: 100;
      background-color: var(--cadore-cream);
      box-shadow: var(--cadore-shadow-sm);
      height: var(--cadore-header-h);
    }

    .cadore-header__inner {
      display: flex;
      align-items: center;
      justify-content: space-between;
      max-width: var(--cadore-max-width);
      margin: 0 auto;
      padding: 0 2rem;
      height: 100%;
      gap: 2rem;
    }

    /* ---- Logo ---- */
    .cadore-header__logo {
      flex-shrink: 0;
    }

    .cadore-header__logo a {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .cadore-header__logo img {
      height: 44px;
      width: auto;
    }

    .cadore-header__logo-text {
      font-family: var(--cadore-font-heading);
      font-weight: 300;
      font-size: 1.5rem;
      color: var(--cadore-dark-sage);
      letter-spacing: 0.08em;
      text-transform: uppercase;
      white-space: nowrap;
    }

    /* ---- Nav desktop ---- */
    .cadore-header__nav {
      flex: 1;
      display: flex;
      justify-content: center;
    }

    .cadore-nav-desktop {
      display: flex;
      align-items: center;
      gap: 2rem;
    }

    .cadore-nav-desktop ul {
      display: flex;
      align-items: center;
      gap: 2rem;
    }

    .cadore-nav-desktop ul li {
      position: relative;
    }

    .cadore-nav-desktop ul li a {
      display: block;
      padding: 0.5rem 0.85rem;
      font-family: var(--cadore-font-body);
      font-size: 0.9rem;
      font-weight: 500;
      color: var(--cadore-dark-sage);
      letter-spacing: 0.04em;
      text-transform: uppercase;
      border-bottom: 2px solid transparent;
      transition: color var(--cadore-transition),
                  border-color var(--cadore-transition);
    }

    .cadore-nav-desktop ul li a:hover,
    .cadore-nav-desktop ul li.current-menu-item > a,
    .cadore-nav-desktop ul li.current-menu-ancestor > a {
      color: var(--cadore-gold);
      border-bottom-color: var(--cadore-gold);
    }

    /* Sub-menu (depth 2) */
    .cadore-nav-desktop ul li ul {
      position: absolute;
      top: calc(100% + 4px);
      left: 0;
      min-width: 200px;
      background-color: var(--cadore-cream);
      box-shadow: var(--cadore-shadow-md);
      border-radius: var(--cadore-radius);
      border-top: 2px solid var(--cadore-gold);
      flex-direction: column;
      gap: 0;
      display: none;
      z-index: 200;
    }

    .cadore-nav-desktop ul li:hover > ul,
    .cadore-nav-desktop ul li:focus-within > ul {
      display: flex;
    }

    .cadore-nav-desktop ul li ul li a {
      padding: 0.6rem 1rem;
      font-size: 0.85rem;
      border-bottom: none;
      border-bottom: 1px solid rgba(166, 181, 160, 0.2);
    }

    .cadore-nav-desktop ul li ul li:last-child a {
      border-bottom: none;
    }

    /* ---- Área direita (carrinho + hamburger) ---- */
    .cadore-header__actions {
      display: flex;
      align-items: center;
      gap: 1rem;
      flex-shrink: 0;
    }

    /* Carrinho */
    .cadore-cart-link {
      display: flex;
      align-items: center;
      gap: 0.4rem;
      padding: 0.4rem 0.75rem;
      background-color: var(--cadore-dark-sage);
      color: var(--cadore-cream);
      border-radius: var(--cadore-radius);
      font-size: 0.85rem;
      font-weight: 600;
      letter-spacing: 0.02em;
      transition: background-color var(--cadore-transition);
      text-decoration: none;
    }

    .cadore-cart-link:hover {
      background-color: var(--cadore-gold);
      color: var(--cadore-dark-sage);
    }

    .cadore-cart-icon {
      font-size: 1rem;
      line-height: 1;
    }

    .cadore-cart-count {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-width: 18px;
      height: 18px;
      padding: 0 4px;
      background-color: var(--cadore-gold-rich);
      color: var(--cadore-dark-sage);
      border-radius: 999px;
      font-size: 0.7rem;
      font-weight: 700;
      line-height: 1;
    }

    /* Hamburger — visível apenas mobile */
    .cadore-menu-toggle {
      display: none;
      align-items: center;
      justify-content: center;
      width: 44px;
      height: 44px;
      padding: 0;
      color: var(--cadore-dark-sage);
      font-size: 1.4rem;
      border-radius: var(--cadore-radius);
      transition: background-color var(--cadore-transition);
    }

    .cadore-menu-toggle:hover {
      background-color: rgba(166, 181, 160, 0.2);
    }

    /* =====================================================
       NAV MOBILE
    ===================================================== */
    .cadore-nav-mobile {
      position: absolute;
      top: var(--cadore-header-h);
      left: 0;
      right: 0;
      background-color: var(--cadore-cream);
      box-shadow: var(--cadore-shadow-md);
      border-top: 2px solid var(--cadore-gold);
      z-index: 99;
      padding: 1rem 0;
    }

    .cadore-nav-mobile ul {
      display: flex;
      flex-direction: column;
    }

    .cadore-nav-mobile ul li a {
      display: block;
      padding: 0.85rem 2rem;
      font-family: var(--cadore-font-body);
      font-size: 0.95rem;
      font-weight: 500;
      color: var(--cadore-dark-sage);
      letter-spacing: 0.04em;
      text-transform: uppercase;
      border-left: 3px solid transparent;
      transition: color var(--cadore-transition),
                  border-color var(--cadore-transition),
                  background-color var(--cadore-transition);
    }

    .cadore-nav-mobile ul li a:hover,
    .cadore-nav-mobile ul li.current-menu-item > a {
      color: var(--cadore-gold);
      border-left-color: var(--cadore-gold);
      background-color: rgba(166, 181, 160, 0.08);
    }

    /* Sub-menu mobile */
    .cadore-nav-mobile ul li ul li a {
      padding-left: 3.5rem;
      font-size: 0.875rem;
      text-transform: none;
      border-left: none;
    }

    /* =====================================================
       RESPONSIVO
    ===================================================== */

    /* Tablet: 768px–1024px */
    @media (max-width: 1024px) {
      .cadore-header__inner {
        padding: 0 1.5rem;
      }

      .cadore-nav-desktop {
        gap: 1rem;
      }

      .cadore-nav-desktop ul li a {
        padding: 0.5rem 0.6rem;
        font-size: 0.82rem;
      }
    }

    /* Mobile: ≤767px */
    @media (max-width: 767px) {
      .cadore-header__nav {
        display: none;
      }

      .cadore-menu-toggle {
        display: flex;
      }

      .cadore-header__inner {
        padding: 0 1rem;
      }

      .cadore-header__logo img {
        height: 36px;
      }

      .cadore-header__logo-text {
        font-size: 1.25rem;
      }
    }

    /* Garante que o nav mobile se posiciona relativamente ao header */
    @media (min-width: 768px) {
      .cadore-nav-mobile {
        display: none !important;
      }
    }

    /* =====================================================
       FOCUS VISIBLE — acessibilidade de teclado
    ===================================================== */

    /* Remove o outline padrão apenas quando :focus-visible está disponível */
    :focus:not(:focus-visible) {
      outline: none;
    }

    /* Estilo de foco consistente para todos os elementos interactivos */
    :focus-visible {
      outline: 2px solid var(--cadore-dark-sage);
      outline-offset: 3px;
      border-radius: 2px;
    }

    /* Nav desktop — foco em links */
    .cadore-nav-desktop ul li a:focus-visible {
      outline: 2px solid var(--cadore-dark-sage);
      outline-offset: 2px;
      border-radius: var(--cadore-radius);
    }

    /* Nav mobile — foco em links */
    .cadore-nav-mobile ul li a:focus-visible {
      outline: 2px solid var(--cadore-dark-sage);
      outline-offset: -2px;
      border-radius: 0;
    }

    /* Carrinho */
    .cadore-cart-link:focus-visible {
      outline: 2px solid var(--cadore-dark-sage);
      outline-offset: 3px;
      border-radius: var(--cadore-radius);
    }

    /* Hamburger */
    .cadore-menu-toggle:focus-visible {
      outline: 2px solid var(--cadore-dark-sage);
      outline-offset: 2px;
    }

    /* Logo */
    .cadore-header__logo a:focus-visible {
      outline: 2px solid var(--cadore-dark-sage);
      outline-offset: 4px;
      border-radius: 2px;
    }
  </style>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a href="#cadore-main" class="cadore-skip-link">
  <?php esc_html_e( 'Saltar para o conteúdo principal', 'cadore-custom' ); ?>
</a>

<div class="cadore-site-wrapper">

  <header class="cadore-header" role="banner">
    <div class="cadore-header__inner">

      <!-- ===== LOGO ===== -->
      <div class="cadore-header__logo">
        <?php
        $logo_id = get_theme_mod( 'custom_logo' );
        if ( $logo_id ) :
          $logo_url   = wp_get_attachment_image_url( $logo_id, 'full' );
          $logo_alt   = get_bloginfo( 'name' );
          $logo_width = '';
          $logo_height = '';
          $logo_meta  = wp_get_attachment_metadata( $logo_id );
          if ( $logo_meta ) {
            $logo_width  = isset( $logo_meta['width'] )  ? (int) $logo_meta['width']  : '';
            $logo_height = isset( $logo_meta['height'] ) ? (int) $logo_meta['height'] : '';
          }
        ?>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
             aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> — <?php esc_attr_e( 'Ir para a página inicial', 'cadore-custom' ); ?>">
            <img src="<?php echo esc_url( $logo_url ); ?>"
                 alt="<?php echo esc_attr( $logo_alt ); ?>"
                 <?php echo $logo_width  ? 'width="'  . esc_attr( $logo_width )  . '"' : ''; ?>
                 <?php echo $logo_height ? 'height="' . esc_attr( $logo_height ) . '"' : ''; ?>
                 loading="eager">
          </a>
        <?php else : ?>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
             aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> — <?php esc_attr_e( 'Ir para a página inicial', 'cadore-custom' ); ?>">
            <span class="cadore-header__logo-text">
              <?php bloginfo( 'name' ); ?>
            </span>
          </a>
        <?php endif; ?>
      </div>
      <!-- /LOGO -->

      <!-- ===== NAV DESKTOP ===== -->
      <nav class="cadore-header__nav" aria-label="<?php esc_attr_e( 'Menu principal', 'cadore-custom' ); ?>">
        <?php
        wp_nav_menu( array(
          'theme_location'  => 'primary',
          'menu_class'      => 'cadore-nav-desktop',
          'container'       => false,
          'depth'           => 2,
          'fallback_cb'     => 'cadore_nav_fallback',
        ) );
        ?>
      </nav>
      <!-- /NAV DESKTOP -->

      <!-- ===== AÇÕES (CARRINHO + HAMBURGER) ===== -->
      <div class="cadore-header__actions">

        <!-- Carrinho -->
        <?php if ( function_exists( 'WC' ) ) :
          $cart_url   = esc_url( wc_get_cart_url() );
          $cart_count = WC()->cart ? (int) WC()->cart->get_cart_contents_count() : 0;
          $cart_label = sprintf(
            _n( '%d item no carrinho', '%d itens no carrinho', $cart_count, 'cadore-custom' ),
            $cart_count
          );
        ?>
          <a href="<?php echo $cart_url; ?>"
             class="cadore-cart-link"
             aria-label="<?php echo esc_attr( $cart_label ); ?>">
            <span class="cadore-cart-icon" aria-hidden="true">🛒</span>
            <span class="cadore-cart-count"
                  aria-label="<?php echo esc_attr( $cart_label ); ?>">
              <?php echo esc_html( $cart_count ); ?>
            </span>
          </a>
        <?php endif; ?>

        <!-- Hamburger (mobile) -->
        <button class="cadore-menu-toggle"
                aria-expanded="false"
                aria-controls="cadore-nav-mobile"
                aria-label="<?php esc_attr_e( 'Abrir menu de navegação', 'cadore-custom' ); ?>">
          <span aria-hidden="true">☰</span>
        </button>

      </div>
      <!-- /AÇÕES -->

    </div><!-- .cadore-header__inner -->

    <!-- ===== NAV MOBILE ===== -->
    <nav id="cadore-nav-mobile"
         class="cadore-nav-mobile"
         aria-label="<?php esc_attr_e( 'Menu móvel', 'cadore-custom' ); ?>"
         hidden>
      <?php
      wp_nav_menu( array(
        'theme_location'  => 'primary',
        'menu_class'      => 'cadore-nav-mobile__list',
        'container'       => false,
        'depth'           => 2,
        'fallback_cb'     => 'cadore_nav_fallback',
      ) );
      ?>
    </nav>
    <!-- /NAV MOBILE -->

  </header><!-- .cadore-header -->

