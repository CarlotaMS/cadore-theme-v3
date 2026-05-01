<?php
/**
 * Cadore Custom Theme — archive-product.php
 * Template da loja WooCommerce (chamado automaticamente pelo WC).
 *
 * @package cadore-custom
 * @version 1.0.0
 *
 * NÃO redefinir :root nem @font-face — declarados apenas em header.php.
 */

defined( 'ABSPATH' ) || exit;

get_header();

if ( ! function_exists( 'WC' ) ) {
	get_footer();
	return;
}
?>

<main id="cadore-main" class="cadore-main cadore-shop" role="main">

  <?php /* =====================================================
     SECÇÃO 1 — HERO
  ===================================================== */ ?>
  <section class="cadore-shop__hero" aria-labelledby="cadore-shop-heading">
    <div class="cadore-shop__hero-inner">
      <?php if ( is_product_category() ) :
        $queried = get_queried_object();
      ?>
        <h1 id="cadore-shop-heading" class="cadore-shop__hero-title">
          <?php echo esc_html( $queried->name ); ?>
        </h1>
        <?php if ( $queried->description ) : ?>
          <p class="cadore-shop__hero-subtitle">
            <?php echo esc_html( $queried->description ); ?>
          </p>
        <?php endif; ?>
      <?php else : ?>
        <h1 id="cadore-shop-heading" class="cadore-shop__hero-title">
          <?php esc_html_e( 'Coleção', 'cadore-custom' ); ?>
        </h1>
        <p class="cadore-shop__hero-subtitle">
          <?php esc_html_e( 'Joias artesanais em ouro, prata e pedras preciosas — cada peça criada com significado.', 'cadore-custom' ); ?>
        </p>
      <?php endif; ?>
    </div>
  </section>
  <?php /* /HERO */ ?>


  <?php /* =====================================================
     SECÇÃO 2 — BARRA DE FILTROS
  ===================================================== */ ?>
  <?php
  $filter_terms = get_terms( array(
    'taxonomy'   => 'product_cat',
    'hide_empty' => true,
    'parent'     => 0,
    'orderby'    => 'name',
    'order'      => 'ASC',
    'exclude'    => array( get_option( 'default_product_cat' ) ),
  ) );

  $current_term     = is_product_category() ? get_queried_object() : null;
  $current_term_id  = $current_term ? $current_term->term_id : 0;
  $shop_url         = esc_url( get_permalink( wc_get_page_id( 'shop' ) ) );
  $has_filter_terms = ! is_wp_error( $filter_terms ) && ! empty( $filter_terms );

  // Contagem total para o filtro "Todos"
  $total_count = 0;
  if ( $has_filter_terms ) {
    $total_ids   = wc_get_products( array(
      'limit'      => -1,
      'status'     => 'publish',
      'visibility' => 'catalog',
      'return'     => 'ids',
    ) );
    $total_count = is_array( $total_ids ) ? count( $total_ids ) : 0;
  }
  ?>

  <?php if ( $has_filter_terms ) : ?>
  <nav class="cadore-shop__filters"
       aria-label="<?php esc_attr_e( 'Filtrar por categoria', 'cadore-custom' ); ?>">
    <div class="cadore-shop__filters-inner">
      <ul class="cadore-shop__filter-list" role="list">

        <!-- Todos -->
        <li class="cadore-shop__filter-item">
          <a href="<?php echo esc_url( $shop_url ); ?>"
             class="cadore-shop__filter-link<?php echo ( ! is_product_category() ) ? ' cadore-shop__filter-link--active' : ''; ?>"
             <?php echo ( ! is_product_category() ) ? 'aria-current="page"' : ''; ?>>
            <?php esc_html_e( 'Todos', 'cadore-custom' ); ?>
            <?php if ( $total_count > 0 ) : ?>
              <span class="cadore-shop__filter-count" aria-hidden="true">
                (<?php echo esc_html( $total_count ); ?>)
              </span>
            <?php endif; ?>
          </a>
        </li>

        <?php foreach ( $filter_terms as $term ) :
          $term_url    = esc_url( get_term_link( $term->slug, 'product_cat' ) );
          $is_active   = ( $current_term_id === $term->term_id );
          $aria_current = $is_active ? 'aria-current="page"' : '';
        ?>
          <li class="cadore-shop__filter-item">
            <a href="<?php echo esc_url( $term_url ); ?>"
               class="cadore-shop__filter-link<?php echo $is_active ? ' cadore-shop__filter-link--active' : ''; ?>"
               <?php echo $aria_current; ?>>
              <?php echo esc_html( $term->name ); ?>
              <?php if ( $term->count > 0 ) : ?>
                <span class="cadore-shop__filter-count" aria-hidden="true">
                  (<?php echo esc_html( $term->count ); ?>)
                </span>
              <?php endif; ?>
            </a>
          </li>
        <?php endforeach; ?>

      </ul>
    </div>
  </nav>
  <?php endif; ?>
  <?php /* /FILTROS */ ?>


  <?php /* =====================================================
     SECÇÃO 3 — GRID DE PRODUTOS
  ===================================================== */ ?>
  <section class="cadore-shop__content" aria-label="<?php esc_attr_e( 'Produtos', 'cadore-custom' ); ?>">
    <div class="cadore-shop__content-inner">

      <?php
      // Hook WooCommerce: antes do loop (ordena/resultados)
      do_action( 'woocommerce_before_shop_loop' );
      ?>

      <?php if ( have_posts() ) : ?>

        <div class="cadore-shop__grid" role="list">
          <?php while ( have_posts() ) : the_post();
            $product = wc_get_product( get_the_ID() );
            if ( ! $product ) continue;

            $product_id  = $product->get_id();
            $product_url = esc_url( get_permalink( $product_id ) );
            $img_url     = cadore_get_product_image_url( $product_id );

            // Categoria principal
            $cats      = get_the_terms( $product_id, 'product_cat' );
            $cat_name  = '';
            if ( $cats && ! is_wp_error( $cats ) ) {
              foreach ( $cats as $cat ) {
                if ( (int) $cat->term_id !== (int) get_option( 'default_product_cat' ) ) {
                  $cat_name = esc_html( $cat->name );
                  break;
                }
              }
            }

            // Botão adicionar ao carrinho
            $is_purchasable = $product->is_purchasable() && $product->is_in_stock();
            $cart_url       = esc_url( $product->add_to_cart_url() );
            $cart_label     = esc_attr( sprintf(
              __( 'Adicionar %s ao carrinho', 'cadore-custom' ),
              $product->get_name()
            ) );
          ?>
            <article class="cadore-shop__card"
                     role="listitem"
                     aria-label="<?php echo esc_attr( $product->get_name() ); ?>">

              <!-- Imagem -->
              <a href="<?php echo esc_url( $product_url ); ?>"
                 class="cadore-shop__card-image-link"
                 tabindex="-1"
                 aria-hidden="true">
                <div class="cadore-shop__card-image-wrap">
                  <img src="<?php echo esc_url( $img_url ); ?>"
                       alt="<?php echo esc_attr( $product->get_name() ); ?>"
                       class="cadore-shop__card-image"
                       loading="lazy"
                       width="250"
                       height="250">
                  <?php if ( $product->is_on_sale() ) : ?>
                    <span class="cadore-shop__card-badge cadore-shop__card-badge--sale">
                      <?php esc_html_e( 'Promoção', 'cadore-custom' ); ?>
                    </span>
                  <?php elseif ( ! $product->is_in_stock() ) : ?>
                    <span class="cadore-shop__card-badge cadore-shop__card-badge--soldout">
                      <?php esc_html_e( 'Esgotado', 'cadore-custom' ); ?>
                    </span>
                  <?php endif; ?>
                </div>
              </a>

              <!-- Corpo -->
              <div class="cadore-shop__card-body">
                <?php if ( $cat_name ) : ?>
                  <span class="cadore-shop__card-cat">
                    <?php echo esc_html( $cat_name ); ?>
                  </span>
                <?php endif; ?>

                <h2 class="cadore-shop__card-name">
                  <a href="<?php echo esc_url( $product_url ); ?>">
                    <?php echo esc_html( $product->get_name() ); ?>
                  </a>
                </h2>

                <div class="cadore-shop__card-price">
                  <?php echo wp_kses_post( $product->get_price_html() ); ?>
                </div>

                <?php if ( $is_purchasable ) : ?>
                  <a href="<?php echo esc_url( $cart_url ); ?>"
                     class="cadore-btn cadore-btn--dark cadore-btn--full add_to_cart_button ajax_add_to_cart"
                     data-product_id="<?php echo esc_attr( $product_id ); ?>"
                     data-product_sku="<?php echo esc_attr( $product->get_sku() ); ?>"
                     data-quantity="1"
                     aria-label="<?php echo esc_attr( $cart_label ); ?>"
                     rel="nofollow">
                    <?php esc_html_e( 'Adicionar ao carrinho', 'cadore-custom' ); ?>
                  </a>
                <?php else : ?>
                  <a href="<?php echo esc_url( $product_url ); ?>"
                     class="cadore-btn cadore-btn--dark cadore-btn--full"
                     aria-label="<?php echo esc_attr( sprintf( __( 'Ver detalhes de %s', 'cadore-custom' ), $product->get_name() ) ); ?>">
                    <?php esc_html_e( 'Ver detalhes', 'cadore-custom' ); ?>
                  </a>
                <?php endif; ?>
              </div>

            </article>
          <?php endwhile; ?>
        </div><!-- .cadore-shop__grid -->

        <?php
        // Hook WooCommerce: paginação
        do_action( 'woocommerce_after_shop_loop' );
        ?>

      <?php else : ?>

        <?php do_action( 'woocommerce_no_products_found' ); ?>

        <div class="cadore-shop__empty">
          <p class="cadore-shop__empty-msg">
            <?php esc_html_e( 'Nenhum produto encontrado nesta categoria.', 'cadore-custom' ); ?>
          </p>
          <a href="<?php echo esc_url( $shop_url ); ?>"
             class="cadore-btn cadore-btn--primary">
            <?php esc_html_e( 'Ver toda a coleção', 'cadore-custom' ); ?>
          </a>
        </div>

      <?php endif; ?>

    </div><!-- .cadore-shop__content-inner -->
  </section>
  <?php /* /GRID */ ?>

</main><!-- #cadore-main -->

<style>
/* =========================================================
   ARCHIVE-PRODUCT.PHP — ESTILOS
   Usa apenas variáveis de :root declaradas em header.php.
   ========================================================= */

/* ---------------------------------------------------------
   Utilitários (duplicados até Fase 4 — mover para style.css)
--------------------------------------------------------- */
.cadore-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 0.75rem 1.5rem;
  border-radius: var(--cadore-radius);
  font-family: var(--cadore-font-body);
  font-size: 0.9rem;
  font-weight: 600;
  letter-spacing: 0.03em;
  text-decoration: none;
  cursor: pointer;
  border: none;
  transition: background-color var(--cadore-transition),
              color var(--cadore-transition);
  white-space: nowrap;
}

.cadore-btn--primary {
  background-color: var(--cadore-gold);
  color: var(--cadore-dark-sage);
}

.cadore-btn--primary:hover {
  background-color: var(--cadore-gold-rich);
}

.cadore-btn--dark {
  background-color: var(--cadore-dark-sage);
  color: var(--cadore-cream);
}

.cadore-btn--dark:hover {
  background-color: #3D4F45;
}

.cadore-btn--full {
  width: 100%;
}

/* ---------------------------------------------------------
   SECÇÃO 1 — HERO
--------------------------------------------------------- */
.cadore-shop__hero {
  background-color: var(--cadore-sage);
  padding: 3.5rem 2rem;
  text-align: center;
}

.cadore-shop__hero-inner {
  max-width: 800px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.cadore-shop__hero-title {
  font-family: var(--cadore-font-heading);
  font-weight: 300;
  font-size: 2.75rem;
  color: var(--cadore-cream);
  letter-spacing: 0.02em;
  line-height: 1.15;
}

.cadore-shop__hero-subtitle {
  font-size: 1.05rem;
  color: var(--cadore-cream);
  font-style: italic;
  line-height: 1.6;
  max-width: 560px;
  margin: 0 auto;
}

/* ---------------------------------------------------------
   SECÇÃO 2 — BARRA DE FILTROS
--------------------------------------------------------- */
.cadore-shop__filters {
  background-color: var(--cadore-white);
  border-bottom: 1px solid rgba(166, 181, 160, 0.2);
  padding: 0 2rem;
  position: sticky;
  top: var(--cadore-header-h);
  z-index: 90;
}

.cadore-shop__filters-inner {
  max-width: var(--cadore-max-width);
  margin: 0 auto;
}

.cadore-shop__filter-list {
  display: flex;
  align-items: center;
  gap: 0;
  overflow-x: auto;
  scrollbar-width: none;
  -ms-overflow-style: none;
}

.cadore-shop__filter-list::-webkit-scrollbar {
  display: none;
}

.cadore-shop__filter-item {
  flex-shrink: 0;
}

.cadore-shop__filter-link {
  display: block;
  padding: 1rem 1.25rem;
  font-size: 0.85rem;
  font-weight: 500;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  color: var(--cadore-dark-sage);
  text-decoration: none;
  border-bottom: 2px solid transparent;
  transition: color var(--cadore-transition),
              border-color var(--cadore-transition);
  white-space: nowrap;
}

.cadore-shop__filter-link:hover {
  color: var(--cadore-gold);
  border-bottom-color: var(--cadore-gold);
}

.cadore-shop__filter-link--active {
  color: var(--cadore-dark-sage);
  border-bottom-color: var(--cadore-dark-sage);
  font-weight: 600;
}

.cadore-shop__filter-count {
  font-size: 0.75rem;
  font-weight: 400;
  color: var(--cadore-sage);
  margin-left: 0.2rem;
}

/* ---------------------------------------------------------
   SECÇÃO 3 — CONTEÚDO / GRID
--------------------------------------------------------- */
.cadore-shop__content {
  background-color: var(--cadore-white);
  padding: 3rem 2rem 4rem;
}

.cadore-shop__content-inner {
  max-width: var(--cadore-max-width);
  margin: 0 auto;
}

/* WooCommerce: orderby / resultados */
.woocommerce-result-count,
.woocommerce-ordering {
  font-size: 0.875rem;
  color: var(--cadore-dark-sage);
  margin-bottom: 1.5rem;
}

.woocommerce-ordering select {
  padding: 0.4rem 0.75rem;
  border: 1px solid var(--cadore-sage);
  border-radius: var(--cadore-radius);
  font-size: 0.875rem;
  font-family: inherit;
  color: var(--cadore-dark-sage);
  background-color: var(--cadore-white);
  cursor: pointer;
}

.woocommerce-ordering select:focus-visible {
  outline: 2px solid var(--cadore-dark-sage);
  outline-offset: 2px;
}

.cadore-shop__grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2rem;
}

/* ----- Card de produto ----- */
.cadore-shop__card {
  display: flex;
  flex-direction: column;
  background-color: var(--cadore-white);
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
  transition: box-shadow var(--cadore-transition),
              transform var(--cadore-transition);
}

.cadore-shop__card:hover {
  box-shadow: var(--cadore-shadow-md);
  transform: translateY(-3px);
}

.cadore-shop__card-image-link {
  display: block;
}

.cadore-shop__card-image-wrap {
  position: relative;
  overflow: hidden;
  background-color: var(--cadore-cream);
  aspect-ratio: 1 / 1;
}

.cadore-shop__card-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}

.cadore-shop__card:hover .cadore-shop__card-image {
  transform: scale(1.04);
}

/* Badges */
.cadore-shop__card-badge {
  position: absolute;
  top: 0.75rem;
  left: 0.75rem;
  font-size: 0.7rem;
  font-weight: 700;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  padding: 0.25rem 0.6rem;
  border-radius: 4px;
}

.cadore-shop__card-badge--sale {
  background-color: var(--cadore-gold-rich);
  color: var(--cadore-dark-sage);
}

.cadore-shop__card-badge--soldout {
  background-color: rgba(74, 90, 80, 0.75);
  color: var(--cadore-cream);
}

/* Corpo do card */
.cadore-shop__card-body {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  padding: 1rem;
  flex: 1;
}

.cadore-shop__card-cat {
  font-size: 0.7rem;
  font-weight: 600;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--cadore-gold);
}

.cadore-shop__card-name {
  font-family: var(--cadore-font-heading);
  font-weight: 300;
  font-size: 1rem;
  color: var(--cadore-dark-sage);
  line-height: 1.3;
}

.cadore-shop__card-name a {
  color: inherit;
  text-decoration: none;
  transition: color var(--cadore-transition);
}

.cadore-shop__card-name a:hover {
  color: var(--cadore-gold);
}

.cadore-shop__card-price {
  font-size: 1rem;
  font-weight: 600;
  color: var(--cadore-dark-sage);
  margin-top: auto;
  padding-top: 0.5rem;
}

/* WooCommerce price overrides */
.cadore-shop__card-price .woocommerce-Price-amount {
  color: var(--cadore-dark-sage);
}

.cadore-shop__card-price ins {
  text-decoration: none;
}

.cadore-shop__card-price del {
  font-size: 0.85rem;
  color: var(--cadore-sage);
}

.cadore-shop__card-body .cadore-btn {
  margin-top: 0.75rem;
}

/* Estado "a adicionar" — WooCommerce AJAX */
.cadore-shop__card-body .cadore-btn.loading {
  opacity: 0.7;
  pointer-events: none;
}

.cadore-shop__card-body .cadore-btn.added {
  background-color: var(--cadore-gold);
  color: var(--cadore-dark-sage);
}

/* ----- Estado sem produtos ----- */
.cadore-shop__empty {
  text-align: center;
  padding: 4rem 2rem;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1.5rem;
}

.cadore-shop__empty-msg {
  font-size: 1rem;
  color: var(--cadore-dark-sage);
}

/* ---------------------------------------------------------
   PAGINAÇÃO WooCommerce
--------------------------------------------------------- */
.woocommerce-pagination {
  margin-top: 3rem;
  display: flex;
  justify-content: center;
}

.woocommerce-pagination ul.page-numbers {
  display: flex;
  align-items: center;
  gap: 0.35rem;
  flex-wrap: wrap;
  justify-content: center;
}

.woocommerce-pagination ul.page-numbers li {
  list-style: none;
}

.woocommerce-pagination ul.page-numbers li a.page-numbers,
.woocommerce-pagination ul.page-numbers li span.page-numbers {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-width: 40px;
  height: 40px;
  padding: 0 0.5rem;
  border-radius: var(--cadore-radius);
  font-size: 0.875rem;
  font-weight: 500;
  color: var(--cadore-dark-sage);
  text-decoration: none;
  border: 1px solid rgba(166, 181, 160, 0.3);
  transition: background-color var(--cadore-transition),
              border-color var(--cadore-transition),
              color var(--cadore-transition);
}

.woocommerce-pagination ul.page-numbers li a.page-numbers:hover {
  background-color: var(--cadore-cream);
  border-color: var(--cadore-sage);
}

.woocommerce-pagination ul.page-numbers li span.current {
  background-color: var(--cadore-dark-sage);
  color: var(--cadore-cream);
  border-color: var(--cadore-dark-sage);
  font-weight: 700;
}

.woocommerce-pagination ul.page-numbers li a.page-numbers:focus-visible {
  outline: 2px solid var(--cadore-dark-sage);
  outline-offset: 3px;
}

/* =========================================================
   FOCUS VISIBLE
   ========================================================= */

.cadore-btn:focus-visible {
  outline: 2px solid var(--cadore-dark-sage);
  outline-offset: 3px;
  border-radius: var(--cadore-radius);
}

.cadore-shop__filter-link:focus-visible {
  outline: 2px solid var(--cadore-dark-sage);
  outline-offset: -2px;
}

.cadore-shop__card-image-link:focus-visible {
  outline: 2px solid var(--cadore-dark-sage);
  outline-offset: 0;
}

.cadore-shop__card-name a:focus-visible {
  outline: 2px solid var(--cadore-dark-sage);
  outline-offset: 2px;
  border-radius: 2px;
}

/* =========================================================
   RESPONSIVO
   ========================================================= */

/* Tablet: 768px–1024px */
@media (max-width: 1024px) {
  .cadore-shop__hero {
    padding: 2.5rem 1.5rem;
  }

  .cadore-shop__hero-title {
    font-size: 2.25rem;
  }

  .cadore-shop__filters {
    padding: 0 1.5rem;
  }

  .cadore-shop__content {
    padding: 2.5rem 1.5rem 3rem;
  }

  .cadore-shop__grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
  }
}

/* Mobile: ≤767px */
@media (max-width: 767px) {
  .cadore-shop__hero {
    padding: 2rem 1rem;
  }

  .cadore-shop__hero-title {
    font-size: 1.875rem;
  }

  .cadore-shop__hero-subtitle {
    font-size: 0.95rem;
  }

  .cadore-shop__filters {
    padding: 0 1rem;
  }

  .cadore-shop__filter-link {
    padding: 0.85rem 0.85rem;
    font-size: 0.8rem;
  }

  .cadore-shop__content {
    padding: 2rem 1rem 2.5rem;
  }

  .cadore-shop__grid {
    grid-template-columns: 1fr;
    gap: 1.25rem;
  }

  .woocommerce-result-count,
  .woocommerce-ordering {
    font-size: 0.8rem;
  }
}
</style>

<?php get_footer(); ?>
