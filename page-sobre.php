<?php
/**
 * Template Name: Sobre
 *
 * Cadore Custom Theme — page-sobre.php
 * Template: Sobre
 *
 * @package cadore-custom
 * @version 1.0.0
 *
 * NÃO redefinir :root nem @font-face — declarados apenas em header.php.
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="cadore-main" class="cadore-main cadore-sobre" role="main">

  <?php /* =====================================================
     SECÇÃO 1 — HERO
  ===================================================== */ ?>
  <section class="cadore-sobre__hero" aria-labelledby="cadore-sobre-heading">
    <div class="cadore-sobre__hero-inner">
      <h1 id="cadore-sobre-heading" class="cadore-sobre__hero-title">
        <?php esc_html_e( 'Sobre a Cadore Joias', 'cadore-custom' ); ?>
      </h1>
      <p class="cadore-sobre__hero-subtitle">
        <?php esc_html_e( 'Nascemos da convicção de que uma joia é mais do que ornamento — é memória, herança e identidade.', 'cadore-custom' ); ?>
      </p>
    </div>
  </section>
  <?php /* /HERO */ ?>


  <?php /* =====================================================
     SECÇÃO 2 — IMAGEM DO ATELIER
  ===================================================== */ ?>
  <section class="cadore-sobre__atelier" aria-label="<?php esc_attr_e( 'Atelier Cadore Joias', 'cadore-custom' ); ?>">
    <div class="cadore-sobre__atelier-inner">
      <img src="<?php echo cadore_get_atelier_image_url(); ?>"
           alt="<?php esc_attr_e( 'Atelier Cadore Joias — espaço de criação artesanal', 'cadore-custom' ); ?>"
           class="cadore-sobre__atelier-image"
           loading="eager"
           width="1200"
           height="400">
    </div>
  </section>
  <?php /* /ATELIER */ ?>


  <?php /* =====================================================
     SECÇÃO 3 — 4 CARDS
  ===================================================== */ ?>
  <section class="cadore-sobre__cards" aria-labelledby="cadore-sobre-cards-heading">
    <div class="cadore-sobre__cards-inner">

      <h2 id="cadore-sobre-cards-heading" class="cadore-sr-only">
        <?php esc_html_e( 'Sobre nós', 'cadore-custom' ); ?>
      </h2>

      <div class="cadore-sobre__cards-grid">

        <!-- Card 1 — História -->
        <article class="cadore-sobre__card">
          <div class="cadore-sobre__card-icon" aria-hidden="true">🏛️</div>
          <h3 class="cadore-sobre__card-title">
            <?php esc_html_e( 'História', 'cadore-custom' ); ?>
          </h3>
          <p class="cadore-sobre__card-text">
            <?php esc_html_e( 'Fundada em 2014 em Lisboa, a Cadore começou no pequeno atelier de uma mestre ourives. O que nasceu como paixão tornou-se numa referência de joalharia artesanal em Portugal — cada peça continua a ser criada com a mesma atenção ao detalhe dos primeiros dias.', 'cadore-custom' ); ?>
          </p>
        </article>

        <!-- Card 2 — Qualidade -->
        <article class="cadore-sobre__card">
          <div class="cadore-sobre__card-icon" aria-hidden="true">✦</div>
          <h3 class="cadore-sobre__card-title">
            <?php esc_html_e( 'Qualidade', 'cadore-custom' ); ?>
          </h3>
          <p class="cadore-sobre__card-text">
            <?php esc_html_e( 'Ouro 18K e 14K, prata 925 e pedras certificadas. Cada peça acompanha certificado de autenticidade e beneficia de garantia de dois anos. Trabalhamos apenas com fornecedores cujos padrões de qualidade correspondem aos nossos.', 'cadore-custom' ); ?>
          </p>
        </article>

        <!-- Card 3 — Processo -->
        <article class="cadore-sobre__card">
          <div class="cadore-sobre__card-icon" aria-hidden="true">🤲</div>
          <h3 class="cadore-sobre__card-title">
            <?php esc_html_e( 'Processo', 'cadore-custom' ); ?>
          </h3>
          <p class="cadore-sobre__card-text">
            <?php esc_html_e( 'Do esboço à finalização, cada joia passa pelas mãos dos nossos mestres ourives. O processo combina técnicas tradicionais com ferramentas contemporâneas — garantindo precisão sem perder a alma artesanal que distingue cada peça.', 'cadore-custom' ); ?>
          </p>
        </article>

        <!-- Card 4 — Compromisso Ético -->
        <article class="cadore-sobre__card">
          <div class="cadore-sobre__card-icon" aria-hidden="true">🌿</div>
          <h3 class="cadore-sobre__card-title">
            <?php esc_html_e( 'Compromisso Ético', 'cadore-custom' ); ?>
          </h3>
          <p class="cadore-sobre__card-text">
            <?php esc_html_e( 'Materiais certificados, rastreabilidade total, metais reciclados e pedras de origem ética. Acreditamos que a beleza não deve ter custos ocultos — para as pessoas, nem para o planeta.', 'cadore-custom' ); ?>
          </p>
        </article>

      </div><!-- .cadore-sobre__cards-grid -->
    </div><!-- .cadore-sobre__cards-inner -->
  </section>
  <?php /* /CARDS */ ?>


  <?php /* =====================================================
     SECÇÃO 4 — CTA FINAL
  ===================================================== */ ?>
  <section class="cadore-sobre__cta" aria-labelledby="cadore-sobre-cta-heading">
    <div class="cadore-sobre__cta-inner">
      <h2 id="cadore-sobre-cta-heading" class="cadore-sobre__cta-title">
        <?php esc_html_e( 'Pronto para descobrir a coleção?', 'cadore-custom' ); ?>
      </h2>
      <p class="cadore-sobre__cta-subtitle">
        <?php esc_html_e( 'Cada peça conta uma história. A próxima pode ser a sua.', 'cadore-custom' ); ?>
      </p>
      <div class="cadore-sobre__cta-btns">
        <?php if ( function_exists( 'WC' ) ) : ?>
          <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"
             class="cadore-btn cadore-btn--primary">
            <?php esc_html_e( 'Ver coleção', 'cadore-custom' ); ?>
          </a>
        <?php endif; ?>
        <a href="<?php echo esc_url( home_url( '/contactos/' ) ); ?>"
           class="cadore-btn cadore-btn--secondary">
          <?php esc_html_e( 'Contacte-nos', 'cadore-custom' ); ?>
        </a>
      </div>
    </div>
  </section>
  <?php /* /CTA */ ?>

</main><!-- #cadore-main -->

<style>
/* =========================================================
   PAGE-SOBRE.PHP — ESTILOS
   Usa apenas variáveis de :root declaradas em header.php.
   ========================================================= */

/* ---------------------------------------------------------
   Utilitários (duplicados até Fase 4 — mover para style.css)
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

.cadore-btn--secondary {
  background-color: transparent;
  color: var(--cadore-cream);
  border: 1px solid var(--cadore-cream);
}

.cadore-btn--secondary:hover {
  background-color: rgba(245, 241, 232, 0.1);
}

/* ---------------------------------------------------------
   SECÇÃO 1 — HERO
--------------------------------------------------------- */
.cadore-sobre__hero {
  background-color: var(--cadore-sage);
  padding: 4rem 2rem;
  text-align: center;
}

.cadore-sobre__hero-inner {
  max-width: 800px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: 1.25rem;
}

.cadore-sobre__hero-title {
  font-family: var(--cadore-font-heading);
  font-weight: 300;
  font-size: 3rem;
  color: var(--cadore-cream);
  letter-spacing: 0.01em;
  line-height: 1.15;
}

.cadore-sobre__hero-subtitle {
  font-size: 1.15rem;
  color: var(--cadore-cream);
  font-style: italic;
  line-height: 1.65;
  max-width: 640px;
  margin: 0 auto;
}

/* ---------------------------------------------------------
   SECÇÃO 2 — IMAGEM DO ATELIER
--------------------------------------------------------- */
.cadore-sobre__atelier {
  background-color: var(--cadore-dark-sage);
}

.cadore-sobre__atelier-inner {
  max-width: var(--cadore-max-width);
  margin: 0 auto;
}

.cadore-sobre__atelier-image {
  width: 100%;
  height: 400px;
  object-fit: cover;
  display: block;
  border-radius: 0;
}

/* ---------------------------------------------------------
   SECÇÃO 3 — 4 CARDS
--------------------------------------------------------- */
.cadore-sobre__cards {
  background-color: var(--cadore-white);
  padding: 4rem 2rem;
}

.cadore-sobre__cards-inner {
  max-width: var(--cadore-max-width);
  margin: 0 auto;
}

.cadore-sobre__cards-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
}

.cadore-sobre__card {
  background-color: var(--cadore-white);
  border-radius: 12px;
  padding: 2rem;
  display: flex;
  flex-direction: column;
  gap: 0.85rem;
  box-shadow: 0 2px 12px rgba(74, 90, 80, 0.08);
  border: 1px solid rgba(166, 181, 160, 0.2);
  transition: box-shadow var(--cadore-transition),
              transform var(--cadore-transition);
}

.cadore-sobre__card:hover {
  box-shadow: 0 6px 24px rgba(74, 90, 80, 0.14);
  transform: translateY(-3px);
}

.cadore-sobre__card-icon {
  font-size: 2rem;
  line-height: 1;
}

.cadore-sobre__card-title {
  font-family: var(--cadore-font-heading);
  font-weight: 300;
  font-size: 1.35rem;
  color: var(--cadore-dark-sage);
  letter-spacing: 0.02em;
}

.cadore-sobre__card-text {
  font-size: 0.9rem;
  color: var(--cadore-dark-sage);
  line-height: 1.7;
}

/* ---------------------------------------------------------
   SECÇÃO 4 — CTA FINAL
--------------------------------------------------------- */
.cadore-sobre__cta {
  background-color: var(--cadore-sage);
  padding: 5rem 2rem;
  text-align: center;
}

.cadore-sobre__cta-inner {
  max-width: 640px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1rem;
}

.cadore-sobre__cta-title {
  font-family: var(--cadore-font-heading);
  font-weight: 300;
  font-size: 2rem;
  color: var(--cadore-cream);
  letter-spacing: 0.02em;
}

.cadore-sobre__cta-subtitle {
  font-size: 1rem;
  color: var(--cadore-cream);
  line-height: 1.6;
}

.cadore-sobre__cta-btns {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
  justify-content: center;
  margin-top: 0.5rem;
}

/* =========================================================
   RESPONSIVO
   ========================================================= */

/* Tablet: 768px–1024px */
@media (max-width: 1024px) {
  .cadore-sobre__hero {
    padding: 3rem 1.5rem;
  }

  .cadore-sobre__hero-title {
    font-size: 2.25rem;
  }

  .cadore-sobre__cards {
    padding: 3rem 1.5rem;
  }

  .cadore-sobre__atelier-image {
    height: 300px;
  }

  .cadore-sobre__cta {
    padding: 3.5rem 1.5rem;
  }
}

/* Mobile: ≤767px */
@media (max-width: 767px) {
  .cadore-sobre__hero {
    padding: 2.5rem 1rem;
  }

  .cadore-sobre__hero-title {
    font-size: 1.875rem;
  }

  .cadore-sobre__hero-subtitle {
    font-size: 1rem;
  }

  .cadore-sobre__atelier-image {
    height: 220px;
  }

  .cadore-sobre__cards {
    padding: 2.5rem 1rem;
  }

  .cadore-sobre__cards-grid {
    grid-template-columns: 1fr;
    gap: 1.25rem;
  }

  .cadore-sobre__card {
    padding: 1.5rem;
  }

  .cadore-sobre__cta {
    padding: 2.5rem 1rem;
  }

  .cadore-sobre__cta-title {
    font-size: 1.5rem;
  }

  .cadore-sobre__cta-btns {
    flex-direction: column;
    width: 100%;
  }

  .cadore-sobre__cta-btns .cadore-btn {
    width: 100%;
  }
}

/* =========================================================
   FOCUS VISIBLE — acessibilidade de teclado
   ========================================================= */

/* Botões sobre fundo branco (cards section) */
.cadore-sobre__cards .cadore-btn:focus-visible,
.cadore-btn:focus-visible {
  outline: 2px solid var(--cadore-dark-sage);
  outline-offset: 3px;
  border-radius: var(--cadore-radius);
}

/* Botões sobre fundo sage (hero, CTA section) */
.cadore-sobre__hero .cadore-btn:focus-visible,
.cadore-sobre__cta .cadore-btn:focus-visible {
  outline-color: var(--cadore-cream);
}
</style>

<?php get_footer(); ?>
