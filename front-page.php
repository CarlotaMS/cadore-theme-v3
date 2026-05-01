<?php
/**
 * Cadore Custom Theme — home.php
 * Template da homepage.
 *
 * @package cadore-custom
 * @version 1.0.0
 *
 * NÃO redefinir :root nem @font-face — declarados apenas em header.php.
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="cadore-main" class="cadore-main" role="main">

  <?php /* =====================================================
     SECÇÃO 1 — HERO
  ===================================================== */ ?>
  <section class="cadore-hero" aria-labelledby="cadore-hero-heading">
    <div class="cadore-hero__inner">

      <!-- Texto -->
      <div class="cadore-hero__content">
        <p class="cadore-hero__eyebrow">
          <?php esc_html_e( 'Ca\'dore — Unique Jewellery', 'cadore-custom' ); ?>
        </p>
        <h1 id="cadore-hero-heading" class="cadore-hero__title">
          <?php esc_html_e( 'Joias Elegantes para Momentos Especiais', 'cadore-custom' ); ?>
        </h1>
        <p class="cadore-hero__subtitle">
          <?php esc_html_e( 'Descubra a nossa coleção de joias premium em ouro, prata e pedras preciosas.', 'cadore-custom' ); ?>
        </p>
        <div class="cadore-hero__ctas">
          <?php if ( function_exists( 'WC' ) ) : ?>
            <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"
               class="cadore-btn cadore-btn--primary">
              <?php esc_html_e( 'Explorar Coleção', 'cadore-custom' ); ?>
            </a>
          <?php endif; ?>
          <a href="<?php echo esc_url( home_url( '/sobre/' ) ); ?>"
             class="cadore-btn cadore-btn--secondary">
            <?php esc_html_e( 'Saiba Mais', 'cadore-custom' ); ?>
          </a>
        </div>
      </div>

      <!-- Imagem -->
      <div class="cadore-hero__image-wrap">
        <img src="<?php echo cadore_get_hero_image_url(); ?>"
             alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> — <?php esc_attr_e( 'Joias artesanais exclusivas', 'cadore-custom' ); ?>"
             class="cadore-hero__image"
             loading="eager"
             width="600"
             height="400">
      </div>

    </div><!-- .cadore-hero__inner -->
  </section>
  <?php /* /HERO */ ?>


  <?php /* =====================================================
     SECÇÃO 2 — DESTAQUES DA SEMANA
  ===================================================== */ ?>
  <section class="cadore-featured" aria-labelledby="cadore-featured-heading">
    <div class="cadore-featured__inner">

      <div class="cadore-section-header">
        <h2 id="cadore-featured-heading" class="cadore-section-title">
          <?php esc_html_e( 'Destaques da Semana', 'cadore-custom' ); ?>
        </h2>
        <?php if ( function_exists( 'WC' ) ) : ?>
          <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"
             class="cadore-section-link">
            <?php esc_html_e( 'Ver todos', 'cadore-custom' ); ?>
            <span aria-hidden="true">&rarr;</span>
          </a>
        <?php endif; ?>
      </div>

      <div class="cadore-products-grid">
        <?php
        $has_products = false;

        if ( function_exists( 'wc_get_products' ) ) :
          $products = wc_get_products( array(
            'limit'      => 4,
            'status'     => 'publish',
            'visibility' => 'catalog',
            'orderby'    => 'date',
            'order'      => 'DESC',
          ) );

          if ( ! empty( $products ) ) :
            $has_products = true;
            foreach ( $products as $product ) :
              $img_url     = cadore_get_product_image_url( $product->get_id() );
              $product_url = esc_url( get_permalink( $product->get_id() ) );
              $categories  = get_the_terms( $product->get_id(), 'product_cat' );
              $cat_name    = ( $categories && ! is_wp_error( $categories ) )
                             ? esc_html( $categories[0]->name )
                             : '';
              $cart_url    = esc_url( add_query_arg(
                array( 'add-to-cart' => $product->get_id() ),
                wc_get_cart_url()
              ) );
        ?>
            <article class="cadore-product-card"
                     aria-label="<?php echo esc_attr( $product->get_name() ); ?>">
              <a href="<?php echo esc_url( $product_url ); ?>"
                 class="cadore-product-card__image-link"
                 tabindex="-1"
                 aria-hidden="true">
                <div class="cadore-product-card__image-wrap">
                  <img src="<?php echo esc_url( $img_url ); ?>"
                       alt="<?php echo esc_attr( $product->get_name() ); ?>"
                       class="cadore-product-card__image"
                       loading="lazy"
                       width="250"
                       height="250">
                </div>
              </a>
              <div class="cadore-product-card__body">
                <?php if ( $cat_name ) : ?>
                  <span class="cadore-product-card__material">
                    <?php echo esc_html( $cat_name ); ?>
                  </span>
                <?php endif; ?>
                <h3 class="cadore-product-card__name">
                  <a href="<?php echo esc_url( $product_url ); ?>">
                    <?php echo esc_html( $product->get_name() ); ?>
                  </a>
                </h3>
                <div class="cadore-product-card__price">
                  <?php echo wp_kses_post( $product->get_price_html() ); ?>
                </div>
                <a href="<?php echo $cart_url; ?>"
                   class="cadore-btn cadore-btn--dark cadore-btn--full"
                   aria-label="<?php echo esc_attr( sprintf(
                     __( 'Adicionar %s ao carrinho', 'cadore-custom' ),
                     $product->get_name()
                   ) ); ?>">
                  <?php esc_html_e( 'Adicionar ao carrinho', 'cadore-custom' ); ?>
                </a>
              </div>
            </article>
        <?php
            endforeach;
          endif;
        endif;

        // Fallback — 4 cards placeholder estáticos
        if ( ! $has_products ) :
          $placeholders = array(
            array(
              'name'     => __( 'Anel Solitário Ouro 18K', 'cadore-custom' ),
              'material' => __( 'Anéis', 'cadore-custom' ),
              'price'    => '€ 890',
            ),
            array(
              'name'     => __( 'Colar Delicado Prata 925', 'cadore-custom' ),
              'material' => __( 'Colares', 'cadore-custom' ),
              'price'    => '€ 340',
            ),
            array(
              'name'     => __( 'Pulseira Artesanal Ouro 14K', 'cadore-custom' ),
              'material' => __( 'Pulseiras', 'cadore-custom' ),
              'price'    => '€ 560',
            ),
            array(
              'name'     => __( 'Brincos Pérola & Ouro', 'cadore-custom' ),
              'material' => __( 'Brincos', 'cadore-custom' ),
              'price'    => '€ 420',
            ),
          );
          $placeholder_img = esc_url( get_template_directory_uri() . '/images/placeholder-product.jpg' );

          foreach ( $placeholders as $item ) :
        ?>
          <article class="cadore-product-card cadore-product-card--placeholder"
                   aria-label="<?php echo esc_attr( $item['name'] ); ?>">
            <div class="cadore-product-card__image-wrap">
              <img src="<?php echo $placeholder_img; ?>"
                   alt="<?php echo esc_attr( $item['name'] ); ?>"
                   class="cadore-product-card__image"
                   loading="lazy"
                   width="250"
                   height="250">
            </div>
            <div class="cadore-product-card__body">
              <span class="cadore-product-card__material">
                <?php echo esc_html( $item['material'] ); ?>
              </span>
              <h3 class="cadore-product-card__name">
                <?php echo esc_html( $item['name'] ); ?>
              </h3>
              <div class="cadore-product-card__price">
                <?php echo esc_html( $item['price'] ); ?>
              </div>
              <span class="cadore-btn cadore-btn--dark cadore-btn--full cadore-btn--disabled"
                    aria-disabled="true">
                <?php esc_html_e( 'Em breve', 'cadore-custom' ); ?>
              </span>
            </div>
          </article>
        <?php endforeach; endif; ?>
      </div><!-- .cadore-products-grid -->

    </div><!-- .cadore-featured__inner -->
  </section>
  <?php /* /DESTAQUES */ ?>


  <?php /* =====================================================
     SECÇÃO 3 — EXPLORAR POR CATEGORIA
  ===================================================== */ ?>
  <section class="cadore-categories" aria-labelledby="cadore-categories-heading">
    <div class="cadore-categories__inner">

      <div class="cadore-section-header">
        <h2 id="cadore-categories-heading" class="cadore-section-title">
          <?php esc_html_e( 'Explorar por Categoria', 'cadore-custom' ); ?>
        </h2>
      </div>

      <div class="cadore-categories__grid">
        <?php
        $categories = array(
          array(
            'slug'  => 'aneis',
            'label' => __( 'Anéis', 'cadore-custom' ),
            'desc'  => __( 'Anéis solitários, grappos e designs exclusivos em ouro.', 'cadore-custom' ),
            'icon'  => '💍',
          ),
          array(
            'slug'  => 'colares',
            'label' => __( 'Colares', 'cadore-custom' ),
            'desc'  => __( 'Colares delicados e statement, feitos sob medida.', 'cadore-custom' ),
            'icon'  => '📿',
          ),
          array(
            'slug'  => 'pulseiras',
            'label' => __( 'Pulseiras', 'cadore-custom' ),
            'desc'  => __( 'Pulseiras finas, argolas e peças artesanais.', 'cadore-custom' ),
            'icon'  => '✨',
          ),
          array(
            'slug'  => 'brincos',
            'label' => __( 'Brincos', 'cadore-custom' ),
            'desc'  => __( 'Brincos estudados, pérolas e designs minimalistas.', 'cadore-custom' ),
            'icon'  => '🌙',
          ),
        );

        foreach ( $categories as $cat ) :
          $term    = get_term_by( 'slug', $cat['slug'], 'product_cat' );
          $cat_url = ( $term && ! is_wp_error( $term ) )
                     ? esc_url( get_term_link( $cat['slug'], 'product_cat' ) )
                     : ( function_exists( 'wc_get_page_id' )
                         ? esc_url( get_permalink( wc_get_page_id( 'shop' ) ) )
                         : esc_url( home_url( '/' ) ) );
          $count   = ( $term && ! is_wp_error( $term ) ) ? (int) $term->count : 0;
        ?>
          <a href="<?php echo esc_url( $cat_url ); ?>"
             class="cadore-cat-card"
             aria-label="<?php echo esc_attr( sprintf(
               __( 'Ver categoria %s', 'cadore-custom' ),
               $cat['label']
             ) ); ?>">
            <span class="cadore-cat-card__icon" aria-hidden="true">
              <?php echo esc_html( $cat['icon'] ); ?>
            </span>
            <h3 class="cadore-cat-card__name">
              <?php echo esc_html( $cat['label'] ); ?>
            </h3>
            <p class="cadore-cat-card__desc">
              <?php echo esc_html( $cat['desc'] ); ?>
            </p>
            <?php if ( $count > 0 ) : ?>
              <span class="cadore-cat-card__count">
                <?php echo esc_html( sprintf(
                  _n( '%d peça', '%d peças', $count, 'cadore-custom' ),
                  $count
                ) ); ?>
              </span>
            <?php endif; ?>
          </a>
        <?php endforeach; ?>
      </div><!-- .cadore-categories__grid -->

    </div><!-- .cadore-categories__inner -->
  </section>
  <?php /* /CATEGORIAS */ ?>


  <?php /* =====================================================
     SECÇÃO 4 — NEWSLETTER
  ===================================================== */ ?>
  <section class="cadore-newsletter" aria-labelledby="cadore-newsletter-heading">
    <div class="cadore-newsletter__inner">

      <h2 id="cadore-newsletter-heading" class="cadore-newsletter__title">
        <?php esc_html_e( 'Receba novidades e exclusivos', 'cadore-custom' ); ?>
      </h2>
      <p class="cadore-newsletter__subtitle">
        <?php esc_html_e( 'Seja o primeiro a conhecer novas coleções, eventos e ofertas exclusivas.', 'cadore-custom' ); ?>
      </p>

      <form class="cadore-newsletter__form"
            method="post"
            action="<?php echo esc_url( home_url( '/contactos/' ) ); ?>"
            novalidate
            aria-label="<?php esc_attr_e( 'Formulário de subscrição da newsletter', 'cadore-custom' ); ?>">
        <?php wp_nonce_field( 'cadore_newsletter', 'cadore_newsletter_nonce' ); ?>
        <input type="hidden" name="form_type" value="newsletter">

        <div class="cadore-newsletter__row">
          <label for="cadore-home-newsletter-email" class="cadore-sr-only">
            <?php esc_html_e( 'Endereço de email', 'cadore-custom' ); ?>
          </label>
          <input type="email"
                 id="cadore-home-newsletter-email"
                 name="newsletter_email"
                 class="cadore-newsletter__input"
                 placeholder="<?php esc_attr_e( 'O seu endereço de email', 'cadore-custom' ); ?>"
                 required
                 autocomplete="email"
                 aria-required="true">
          <button type="submit"
                  class="cadore-btn cadore-btn--primary"
                  aria-label="<?php esc_attr_e( 'Subscrever newsletter', 'cadore-custom' ); ?>">
            <?php esc_html_e( 'Subscrever', 'cadore-custom' ); ?>
          </button>
        </div>

        <p class="cadore-newsletter__disclaimer">
          <?php esc_html_e( 'Sem spam. Pode cancelar a subscrição a qualquer momento.', 'cadore-custom' ); ?>
        </p>
      </form>

    </div><!-- .cadore-newsletter__inner -->
  </section>
  <?php /* /NEWSLETTER */ ?>

</main><!-- #cadore-main -->

<style>
/* =========================================================
   HOME.PHP — ESTILOS
   Usa apenas variáveis de :root declaradas em header.php.
   ========================================================= */

/* ---------------------------------------------------------
   Utilitários partilhados
--------------------------------------------------------- */
.cadore-sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border: 0;
}

/* Botões — reutilizados em todas as secções */
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
              color var(--cadore-transition),
              box-shadow var(--cadore-transition);
  white-space: nowrap;
}

.cadore-btn--primary {
  background-color: var(--cadore-gold);
  color: var(--cadore-dark-sage);
}

.cadore-btn--primary:hover {
  background-color: var(--cadore-gold-rich);
}

.cadore-btn--secondary {
  background-color: transparent;
  color: var(--cadore-cream);
  border: 1px solid var(--cadore-cream);
}

.cadore-btn--secondary:hover {
  background-color: rgba(245, 241, 232, 0.1);
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

.cadore-btn--disabled {
  opacity: 0.5;
  cursor: not-allowed;
  pointer-events: none;
}

/* Cabeçalho de secção */
.cadore-section-header {
  display: flex;
  align-items: baseline;
  justify-content: space-between;
  margin-bottom: 2rem;
  gap: 1rem;
}

.cadore-section-title {
  font-family: var(--cadore-font-heading);
  font-weight: 300;
  font-size: 2rem;
  color: var(--cadore-dark-sage);
  letter-spacing: 0.02em;
}

.cadore-section-link {
  font-size: 0.875rem;
  font-weight: 600;
  color: var(--cadore-gold);
  text-decoration: none;
  white-space: nowrap;
  transition: color var(--cadore-transition);
}

.cadore-section-link:hover {
  color: var(--cadore-gold-rich);
}

/* ---------------------------------------------------------
   SECÇÃO 1 — HERO
--------------------------------------------------------- */
.cadore-hero {
  background-color: var(--cadore-sage);
  padding: 4rem 2rem;
}

.cadore-hero__inner {
  display: grid;
  grid-template-columns: 1fr 1fr;
  align-items: center;
  gap: 3rem;
  max-width: var(--cadore-max-width);
  margin: 0 auto;
}

.cadore-hero__content {
  display: flex;
  flex-direction: column;
  gap: 1.25rem;
}

.cadore-hero__eyebrow {
  font-family: var(--cadore-font-accent);
  font-size: 0.8rem;
  font-weight: 400;
  color: var(--cadore-cream);
  letter-spacing: 0.18em;
  text-transform: uppercase;
}

.cadore-hero__title {
  font-family: var(--cadore-font-heading);
  font-weight: 300;
  font-size: 3rem;
  color: var(--cadore-cream);
  line-height: 1.15;
  letter-spacing: 0.01em;
}

.cadore-hero__subtitle {
  font-size: 1.1rem;
  color: var(--cadore-cream);
  font-style: italic;
  line-height: 1.6;
}

.cadore-hero__ctas {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
  margin-top: 0.5rem;
}

.cadore-hero__image-wrap {
  position: relative;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: var(--cadore-shadow-md);
}

.cadore-hero__image {
  width: 100%;
  height: 400px;
  object-fit: cover;
  display: block;
}

/* ---------------------------------------------------------
   SECÇÃO 2 — DESTAQUES DA SEMANA
--------------------------------------------------------- */
.cadore-featured {
  background-color: var(--cadore-white);
  padding: 4rem 2rem;
}

.cadore-featured__inner {
  max-width: var(--cadore-max-width);
  margin: 0 auto;
}

.cadore-products-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2rem;
}

.cadore-product-card {
  display: flex;
  flex-direction: column;
  background-color: var(--cadore-white);
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
  transition: box-shadow var(--cadore-transition),
              transform var(--cadore-transition);
}

.cadore-product-card:hover {
  box-shadow: var(--cadore-shadow-md);
  transform: translateY(-3px);
}

.cadore-product-card__image-link {
  display: block;
}

.cadore-product-card__image-wrap {
  overflow: hidden;
  background-color: var(--cadore-cream);
  aspect-ratio: 1 / 1;
}

.cadore-product-card__image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}

.cadore-product-card:hover .cadore-product-card__image {
  transform: scale(1.04);
}

.cadore-product-card__body {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
  padding: 1rem;
  flex: 1;
}

.cadore-product-card__material {
  font-size: 0.7rem;
  font-weight: 600;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--cadore-gold);
}

.cadore-product-card__name {
  font-family: var(--cadore-font-heading);
  font-weight: 300;
  font-size: 1rem;
  color: var(--cadore-dark-sage);
  line-height: 1.3;
}

.cadore-product-card__name a {
  color: inherit;
  text-decoration: none;
  transition: color var(--cadore-transition);
}

.cadore-product-card__name a:hover {
  color: var(--cadore-gold);
}

.cadore-product-card__price {
  font-size: 1rem;
  font-weight: 600;
  color: var(--cadore-dark-sage);
  margin-top: auto;
  padding-top: 0.5rem;
}

.cadore-product-card__price .woocommerce-Price-amount {
  color: var(--cadore-dark-sage);
}

.cadore-product-card__price ins {
  text-decoration: none;
}

.cadore-product-card__price del {
  opacity: 0.45;
  font-size: 0.85rem;
}

.cadore-product-card__body .cadore-btn {
  margin-top: 0.75rem;
}

/* ---------------------------------------------------------
   SECÇÃO 3 — EXPLORAR POR CATEGORIA
--------------------------------------------------------- */
.cadore-categories {
  background-color: var(--cadore-cream);
  padding: 4rem 2rem;
}

.cadore-categories__inner {
  max-width: var(--cadore-max-width);
  margin: 0 auto;
}

.cadore-categories__grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2rem;
}

.cadore-cat-card {
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
  padding: 2rem;
  background-color: var(--cadore-dark-sage);
  border-radius: 12px;
  text-decoration: none;
  transition: background-color var(--cadore-transition),
              transform var(--cadore-transition),
              box-shadow var(--cadore-transition);
}

.cadore-cat-card:hover {
  background-color: #3D4F45;
  transform: translateY(-3px);
  box-shadow: var(--cadore-shadow-md);
}

.cadore-cat-card__icon {
  font-size: 2rem;
  line-height: 1;
  color: var(--cadore-cream);
  display: block;
}

.cadore-cat-card__name {
  font-family: var(--cadore-font-heading);
  font-weight: 300;
  font-size: 1.5rem;
  color: var(--cadore-cream);
  letter-spacing: 0.02em;
}

.cadore-cat-card__desc {
  font-size: 0.875rem;
  color: var(--cadore-cream);
  line-height: 1.6;
  flex: 1;
}

.cadore-cat-card__count {
  font-size: 0.75rem;
  font-weight: 600;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  color: var(--cadore-gold);
  margin-top: auto;
  padding-top: 0.5rem;
}

/* ---------------------------------------------------------
   SECÇÃO 4 — NEWSLETTER
--------------------------------------------------------- */
.cadore-newsletter {
  background-color: var(--cadore-sage);
  padding: 5rem 2rem;
  text-align: center;
}

.cadore-newsletter__inner {
  max-width: 600px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1rem;
}

.cadore-newsletter__title {
  font-family: var(--cadore-font-heading);
  font-weight: 300;
  font-size: 2rem;
  color: var(--cadore-cream);
  letter-spacing: 0.02em;
}

.cadore-newsletter__subtitle {
  font-size: 1rem;
  color: var(--cadore-cream);
  line-height: 1.6;
}

.cadore-newsletter__form {
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
  margin-top: 0.5rem;
}

.cadore-newsletter__row {
  display: flex;
  gap: 0.5rem;
  width: 100%;
}

.cadore-newsletter__input {
  flex: 1;
  padding: 0.75rem 1rem;
  background-color: rgba(245, 241, 232, 0.15);
  border: 1px solid rgba(245, 241, 232, 0.4);
  border-radius: var(--cadore-radius);
  color: var(--cadore-cream);
  font-size: 1rem;
  font-family: inherit;
  transition: border-color var(--cadore-transition),
              box-shadow var(--cadore-transition);
  min-width: 0;
}

.cadore-newsletter__input::placeholder {
  color: rgba(245, 241, 232, 0.55);
}

.cadore-newsletter__input:focus-visible {
  outline: 2px solid var(--cadore-cream);
  outline-offset: 0;
  border-color: var(--cadore-cream);
  box-shadow: 0 0 0 3px rgba(245, 241, 232, 0.12);
}

.cadore-newsletter__disclaimer {
  font-size: 0.78rem;
  color: var(--cadore-cream);
}

/* =========================================================
   RESPONSIVO
   ========================================================= */

/* Tablet: 768px–1024px */
@media (max-width: 1024px) {

  .cadore-hero {
    padding: 3rem 1.5rem;
  }

  .cadore-hero__title {
    font-size: 2.25rem;
  }

  .cadore-featured {
    padding: 3rem 1.5rem;
  }

  .cadore-products-grid {
    grid-template-columns: repeat(2, 1fr);
  }

  .cadore-categories {
    padding: 3rem 1.5rem;
  }

  .cadore-categories__grid {
    grid-template-columns: repeat(2, 1fr);
  }

  .cadore-newsletter {
    padding: 3.5rem 1.5rem;
  }
}

/* Mobile: ≤767px */
@media (max-width: 767px) {

  /* Hero — stack vertical, imagem primeiro */
  .cadore-hero {
    padding: 2.5rem 1rem;
  }

  .cadore-hero__inner {
    grid-template-columns: 1fr;
    gap: 2rem;
  }

  .cadore-hero__image-wrap {
    order: -1;
  }

  .cadore-hero__image {
    height: 250px;
  }

  .cadore-hero__title {
    font-size: 1.875rem;
  }

  .cadore-hero__subtitle {
    font-size: 1rem;
  }

  .cadore-hero__ctas {
    flex-direction: column;
  }

  .cadore-hero__ctas .cadore-btn {
    width: 100%;
  }

  /* Produtos */
  .cadore-featured {
    padding: 2.5rem 1rem;
  }

  .cadore-products-grid {
    grid-template-columns: 1fr;
    gap: 1.5rem;
  }

  .cadore-section-title {
    font-size: 1.5rem;
  }

  /* Categorias */
  .cadore-categories {
    padding: 2.5rem 1rem;
  }

  .cadore-categories__grid {
    grid-template-columns: 1fr;
    gap: 1.25rem;
  }

  /* Newsletter */
  .cadore-newsletter {
    padding: 2.5rem 1rem;
  }

  .cadore-newsletter__title {
    font-size: 1.5rem;
  }

  .cadore-newsletter__row {
    flex-direction: column;
  }

  .cadore-newsletter__row .cadore-btn {
    width: 100%;
  }
}

/* =========================================================
   FOCUS VISIBLE — acessibilidade de teclado
   ========================================================= */

/* Botões (primário, secundário, dark) */
.cadore-btn:focus-visible {
  outline: 2px solid var(--cadore-dark-sage);
  outline-offset: 3px;
  border-radius: var(--cadore-radius);
}

/* Botões sobre fundo escuro (hero, newsletter) */
.cadore-hero .cadore-btn:focus-visible,
.cadore-newsletter .cadore-btn:focus-visible {
  outline-color: var(--cadore-cream);
}

/* Links de produto (nome) */
.cadore-product-card__name a:focus-visible {
  outline: 2px solid var(--cadore-dark-sage);
  outline-offset: 2px;
  border-radius: 2px;
}

/* Link de imagem do produto */
.cadore-product-card__image-link:focus-visible {
  outline: 2px solid var(--cadore-dark-sage);
  outline-offset: 0;
}

/* Cards de categoria (link completo) */
.cadore-cat-card:focus-visible {
  outline: 2px solid var(--cadore-cream);
  outline-offset: 3px;
  border-radius: 12px;
}

/* Link "Ver todos" */
.cadore-section-link:focus-visible {
  outline: 2px solid var(--cadore-dark-sage);
  outline-offset: 3px;
  border-radius: 2px;
}

/* Input newsletter */
.cadore-newsletter__input:focus {
  outline: none;
}
</style>

<?php get_footer(); ?>
