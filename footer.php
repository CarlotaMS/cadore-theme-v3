<?php
/**
 * Cadore Custom Theme — footer.php
 *
 * @package cadore-custom
 * @version 1.0.0
 *
 * NÃO redefinir :root nem @font-face — declarados apenas em header.php.
 */

defined( 'ABSPATH' ) || exit;
?>

  <footer class="cadore-footer" role="contentinfo">

    <!-- ===================================================
         GRID PRINCIPAL — 4 COLUNAS
    =================================================== -->
    <div class="cadore-footer__grid">
      <div class="cadore-footer__inner">

        <!-- COLUNA 1 — BRAND -->
        <div class="cadore-footer__col cadore-footer__col--brand">
          <?php
          $logo_id = get_theme_mod( 'custom_logo' );
          if ( $logo_id ) :
            $logo_url = wp_get_attachment_image_url( $logo_id, 'full' );
          ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
               class="cadore-footer__logo-link"
               aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> — <?php esc_attr_e( 'Ir para a página inicial', 'cadore-custom' ); ?>">
              <img src="<?php echo esc_url( $logo_url ); ?>"
                   alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
                   class="cadore-footer__logo"
                   loading="lazy">
            </a>
          <?php else : ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
               class="cadore-footer__logo-text"
               aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> — <?php esc_attr_e( 'Ir para a página inicial', 'cadore-custom' ); ?>">
              <?php bloginfo( 'name' ); ?>
            </a>
          <?php endif; ?>

          <?php
          $tagline = get_bloginfo( 'description' );
          if ( $tagline ) :
          ?>
            <p class="cadore-footer__tagline">
              <?php echo esc_html( $tagline ); ?>
            </p>
          <?php endif; ?>

          <address class="cadore-footer__address">
            <p>Rua Fresca 353, 201</p>
            <p>4450-681 Leça da Palmeira</p>
            <p>Portugal</p>
            <p class="cadore-footer__nif">
              <?php esc_html_e( 'NIF', 'cadore-custom' ); ?>:
              <span>271559780</span>
            </p>
          </address>
        </div>
        <!-- /COLUNA 1 -->

        <!-- COLUNA 2 — INFORMAÇÃO -->
        <div class="cadore-footer__col cadore-footer__col--info">
          <h3 class="cadore-footer__heading">
            <?php esc_html_e( 'Informação', 'cadore-custom' ); ?>
          </h3>
          <nav aria-label="<?php esc_attr_e( 'Menu informação', 'cadore-custom' ); ?>">
            <ul class="cadore-footer__links">
              <li>
                <a href="<?php echo esc_url( home_url( '/contactos/' ) ); ?>">
                  <?php esc_html_e( 'Contactos', 'cadore-custom' ); ?>
                </a>
              </li>
              <li>
                <a href="<?php echo esc_url( home_url( '/sobre/' ) ); ?>">
                  <?php esc_html_e( 'Sobre', 'cadore-custom' ); ?>
                </a>
              </li>
              <li>
                <a href="#">
                  <?php esc_html_e( 'FAQs', 'cadore-custom' ); ?>
                </a>
              </li>
              <li>
                <a href="#">
                  <?php esc_html_e( 'Devoluções', 'cadore-custom' ); ?>
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <!-- /COLUNA 2 -->

        <!-- COLUNA 3 — LEGAL -->
        <div class="cadore-footer__col cadore-footer__col--legal">
          <h3 class="cadore-footer__heading">
            <?php esc_html_e( 'Legal', 'cadore-custom' ); ?>
          </h3>
          <nav aria-label="<?php esc_attr_e( 'Menu legal', 'cadore-custom' ); ?>">
            <ul class="cadore-footer__links">
              <li>
                <?php
                $privacy = get_page_by_path( 'politica-de-privacidade' );
                $privacy_url = $privacy
                  ? esc_url( get_permalink( $privacy ) )
                  : '#';
                ?>
                <a href="<?php echo esc_url( $privacy_url ); ?>">
                  <?php esc_html_e( 'Política de Privacidade', 'cadore-custom' ); ?>
                </a>
              </li>
              <li>
                <?php
                $terms = get_page_by_path( 'termos-e-condicoes' );
                $terms_url = $terms
                  ? esc_url( get_permalink( $terms ) )
                  : '#';
                ?>
                <a href="<?php echo esc_url( $terms_url ); ?>">
                  <?php esc_html_e( 'Termos e Condições', 'cadore-custom' ); ?>
                </a>
              </li>
              <li>
                <?php
                $cookies = get_page_by_path( 'politica-de-cookies' );
                $cookies_url = $cookies
                  ? esc_url( get_permalink( $cookies ) )
                  : '#';
                ?>
                <a href="<?php echo esc_url( $cookies_url ); ?>">
                  <?php esc_html_e( 'Política de Cookies', 'cadore-custom' ); ?>
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <!-- /COLUNA 3 -->

        <!-- COLUNA 4 — SOCIAL + NEWSLETTER -->
        <div class="cadore-footer__col cadore-footer__col--social">
          <h3 class="cadore-footer__heading">
            <?php esc_html_e( 'Siga-nos', 'cadore-custom' ); ?>
          </h3>

          <ul class="cadore-footer__social" aria-label="<?php esc_attr_e( 'Redes sociais', 'cadore-custom' ); ?>">
            <li>
              <a href="https://www.instagram.com/cadorejoias"
                 target="_blank"
                 rel="noopener noreferrer"
                 aria-label="<?php esc_attr_e( 'Cadore Joias no Instagram (abre em nova aba)', 'cadore-custom' ); ?>"
                 class="cadore-footer__social-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                  <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                  <circle cx="12" cy="12" r="4"/>
                  <circle cx="17.5" cy="6.5" r="0.5" fill="currentColor" stroke="none"/>
                </svg>
                <span>Instagram</span>
              </a>
            </li>
            <li>
              <a href="https://www.facebook.com/cadorejoias"
                 target="_blank"
                 rel="noopener noreferrer"
                 aria-label="<?php esc_attr_e( 'Cadore Joias no Facebook (abre em nova aba)', 'cadore-custom' ); ?>"
                 class="cadore-footer__social-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                  <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                </svg>
                <span>Facebook</span>
              </a>
            </li>
            <li>
              <a href="https://www.pinterest.com/cadorejoias"
                 target="_blank"
                 rel="noopener noreferrer"
                 aria-label="<?php esc_attr_e( 'Cadore Joias no Pinterest (abre em nova aba)', 'cadore-custom' ); ?>"
                 class="cadore-footer__social-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                  <path d="M12 2C6.477 2 2 6.477 2 12c0 4.236 2.636 7.855 6.356 9.312-.088-.791-.167-2.005.035-2.868.181-.78 1.172-4.97 1.172-4.97s-.299-.598-.299-1.482c0-1.388.806-2.428 1.808-2.428.853 0 1.267.641 1.267 1.408 0 .858-.546 2.140-.828 3.33-.236.995.499 1.806 1.476 1.806 1.772 0 3.135-1.867 3.135-4.563 0-2.386-1.715-4.054-4.163-4.054-2.836 0-4.5 2.126-4.5 4.322 0 .856.329 1.772.741 2.273a.3.3 0 0 1 .069.284c-.075.314-.244.995-.277 1.134-.044.183-.146.222-.337.134-1.249-.581-2.03-2.407-2.03-3.874 0-3.154 2.292-6.052 6.608-6.052 3.469 0 6.165 2.473 6.165 5.776 0 3.447-2.173 6.22-5.19 6.22-1.013 0-1.966-.527-2.292-1.148l-.623 2.378c-.226.869-.835 1.958-1.244 2.621.937.29 1.931.446 2.962.446 5.523 0 10-4.477 10-10S17.523 2 12 2z"/>
                </svg>
                <span>Pinterest</span>
              </a>
            </li>
          </ul>

          <!-- Newsletter -->
          <div class="cadore-footer__newsletter">
            <h4 class="cadore-footer__newsletter-title">
              <?php esc_html_e( 'Receba novidades e exclusivos', 'cadore-custom' ); ?>
            </h4>
            <form class="cadore-footer__newsletter-form"
                  method="post"
                  action="<?php echo esc_url( home_url( '/contactos/' ) ); ?>"
                  novalidate
                  aria-label="<?php esc_attr_e( 'Formulário de subscrição da newsletter', 'cadore-custom' ); ?>">
              <?php wp_nonce_field( 'cadore_newsletter', 'cadore_newsletter_nonce' ); ?>
              <input type="hidden" name="form_type" value="newsletter">

              <div class="cadore-footer__newsletter-row">
                <label for="cadore-newsletter-email" class="cadore-sr-only">
                  <?php esc_html_e( 'Endereço de email', 'cadore-custom' ); ?>
                </label>
                <input type="email"
                       id="cadore-newsletter-email"
                       name="newsletter_email"
                       class="cadore-footer__newsletter-input"
                       placeholder="<?php esc_attr_e( 'O seu email', 'cadore-custom' ); ?>"
                       required
                       autocomplete="email"
                       aria-required="true">
                <button type="submit"
                        class="cadore-footer__newsletter-btn"
                        aria-label="<?php esc_attr_e( 'Subscrever newsletter', 'cadore-custom' ); ?>">
                  <?php esc_html_e( 'Subscrever', 'cadore-custom' ); ?>
                </button>
              </div>
            </form>
          </div>

        </div>
        <!-- /COLUNA 4 -->

      </div><!-- .cadore-footer__inner -->
    </div><!-- .cadore-footer__grid -->

    <!-- ===================================================
         BOTTOM BAR
    =================================================== -->
    <div class="cadore-footer__bottom">
      <div class="cadore-footer__bottom-inner">

        <!-- Esquerda: selectores moeda / idioma -->
        <div class="cadore-footer__selectors">
          <label for="cadore-currency-select" class="cadore-sr-only">
            <?php esc_html_e( 'Moeda', 'cadore-custom' ); ?>
          </label>
          <select id="cadore-currency-select"
                  class="cadore-footer__select"
                  aria-label="<?php esc_attr_e( 'Seleccionar moeda', 'cadore-custom' ); ?>">
            <option value="EUR" selected>Portugal — EUR €</option>
          </select>

          <label for="cadore-lang-select" class="cadore-sr-only">
            <?php esc_html_e( 'Idioma', 'cadore-custom' ); ?>
          </label>
          <select id="cadore-lang-select"
                  class="cadore-footer__select"
                  aria-label="<?php esc_attr_e( 'Seleccionar idioma', 'cadore-custom' ); ?>">
            <option value="pt" selected>Português</option>
          </select>
        </div>

        <!-- Centro: copyright -->
        <p class="cadore-footer__copyright">
          &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
          <?php bloginfo( 'name' ); ?>.
          <?php esc_html_e( 'Todos os direitos reservados.', 'cadore-custom' ); ?>
        </p>

        <!-- Direita: trust badges -->
        <ul class="cadore-footer__trust" aria-label="<?php esc_attr_e( 'Garantias da loja', 'cadore-custom' ); ?>">
          <li class="cadore-footer__trust-badge">
            <span aria-hidden="true">✓</span>
            <?php esc_html_e( 'Autenticidade Certificada', 'cadore-custom' ); ?>
          </li>
          <li class="cadore-footer__trust-badge">
            <span aria-hidden="true">🚚</span>
            <?php esc_html_e( 'Envio Grátis ≥€50', 'cadore-custom' ); ?>
          </li>
          <li class="cadore-footer__trust-badge">
            <span aria-hidden="true">💬</span>
            <?php esc_html_e( 'Atendimento Dedicado', 'cadore-custom' ); ?>
          </li>
        </ul>

      </div><!-- .cadore-footer__bottom-inner -->
    </div><!-- .cadore-footer__bottom -->

  </footer><!-- .cadore-footer -->

</div><!-- .cadore-site-wrapper -->

<style>
/* =========================================================
   FOOTER STYLES
   Usa apenas variáveis de :root declaradas em header.php
   ========================================================= */

/* Screen-reader only utility */
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

/* ---- Footer wrapper ---- */
.cadore-footer {
  background-color: var(--cadore-sage);
  margin-top: auto;
}

/* ---- Grid principal ---- */
.cadore-footer__grid {
  padding: 4rem 2rem 2rem;
}

.cadore-footer__inner {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
  max-width: var(--cadore-max-width);
  margin: 0 auto;
}

/* ---- Coluna genérica ---- */
.cadore-footer__col {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

/* ---- Brand ---- */
.cadore-footer__logo-link {
  display: inline-block;
  transition: opacity var(--cadore-transition);
}

.cadore-footer__logo-link:hover {
  opacity: 0.8;
}

.cadore-footer__logo {
  height: 44px;
  width: auto;
}

.cadore-footer__logo-text {
  font-family: var(--cadore-font-heading);
  font-weight: 300;
  font-size: 1.5rem;
  color: var(--cadore-cream);
  letter-spacing: 0.08em;
  text-transform: uppercase;
  text-decoration: none;
  display: inline-block;
}

.cadore-footer__tagline {
  font-size: 0.9rem;
  color: var(--cadore-cream);
  line-height: 1.5;
  font-style: italic;
}

.cadore-footer__address {
  font-style: normal;
  font-size: 0.875rem;
  color: var(--cadore-cream);
  line-height: 1.8;
}

.cadore-footer__nif {
  margin-top: 0.5rem;
  font-size: 0.8rem;
}

/* ---- Headings das colunas ---- */
.cadore-footer__heading {
  font-family: var(--cadore-font-heading);
  font-weight: 300;
  font-size: 0.75rem;
  color: var(--cadore-cream);
  letter-spacing: 0.12em;
  text-transform: uppercase;
  padding-bottom: 0.5rem;
  border-bottom: 1px solid rgba(245, 241, 232, 0.2);
}

/* ---- Links de navegação ---- */
.cadore-footer__links {
  display: flex;
  flex-direction: column;
  gap: 0.4rem;
}

.cadore-footer__links li a {
  font-size: 0.875rem;
  color: var(--cadore-cream);
  text-decoration: none;
  transition: color var(--cadore-transition);
  padding: 0.15rem 0;
  display: inline-block;
}

.cadore-footer__links li a:hover {
  color: var(--cadore-gold);
}

/* ---- Social ---- */
.cadore-footer__social {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}

.cadore-footer__social-link {
  display: flex;
  align-items: center;
  gap: 0.6rem;
  font-size: 0.875rem;
  color: var(--cadore-cream);
  text-decoration: none;
  transition: color var(--cadore-transition);
}

.cadore-footer__social-link:hover {
  color: var(--cadore-gold);
}

.cadore-footer__social-link svg {
  flex-shrink: 0;
}

/* ---- Newsletter ---- */
.cadore-footer__newsletter {
  margin-top: 0.5rem;
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
}

.cadore-footer__newsletter-title {
  font-family: var(--cadore-font-heading);
  font-weight: 300;
  font-size: 0.875rem;
  color: var(--cadore-cream);
  letter-spacing: 0.04em;
}

.cadore-footer__newsletter-row {
  display: flex;
  gap: 0.5rem;
}

.cadore-footer__newsletter-input {
  flex: 1;
  padding: 0.65rem 0.85rem;
  background-color: rgba(245, 241, 232, 0.12);
  border: 1px solid rgba(245, 241, 232, 0.35);
  border-radius: var(--cadore-radius);
  color: var(--cadore-cream);
  font-size: 0.875rem;
  font-family: inherit;
  transition: border-color var(--cadore-transition),
              box-shadow var(--cadore-transition);
  min-width: 0;
}

.cadore-footer__newsletter-input::placeholder {
  color: rgba(245, 241, 232, 0.5);
}

.cadore-footer__newsletter-input:focus {
  outline: none;
  border-color: var(--cadore-cream);
  box-shadow: 0 0 0 3px rgba(245, 241, 232, 0.12);
}

.cadore-footer__newsletter-btn {
  flex-shrink: 0;
  padding: 0.65rem 1.1rem;
  background-color: var(--cadore-gold);
  color: var(--cadore-dark-sage);
  border-radius: var(--cadore-radius);
  font-size: 0.85rem;
  font-weight: 600;
  font-family: inherit;
  letter-spacing: 0.03em;
  transition: background-color var(--cadore-transition);
  white-space: nowrap;
}

.cadore-footer__newsletter-btn:hover {
  background-color: var(--cadore-gold-rich);
}

/* ---- Bottom bar ---- */
.cadore-footer__bottom {
  border-top: 1px solid rgba(245, 241, 232, 0.2);
  padding: 1.25rem 2rem;
  background-color: rgba(0, 0, 0, 0.08);
}

.cadore-footer__bottom-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 1rem;
  max-width: var(--cadore-max-width);
  margin: 0 auto;
}

/* Selectores moeda/idioma */
.cadore-footer__selectors {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.cadore-footer__select {
  padding: 0.35rem 0.6rem;
  background-color: rgba(245, 241, 232, 0.1);
  border: 1px solid rgba(245, 241, 232, 0.3);
  border-radius: var(--cadore-radius);
  color: var(--cadore-cream);
  font-size: 0.8rem;
  font-family: inherit;
  cursor: pointer;
  transition: border-color var(--cadore-transition);
}

.cadore-footer__select:focus-visible {
  outline: 2px solid var(--cadore-cream);
  outline-offset: 2px;
  border-color: var(--cadore-cream);
}

.cadore-footer__select option {
  background-color: var(--cadore-dark-sage);
  color: var(--cadore-cream);
}

/* Copyright */
.cadore-footer__copyright {
  font-size: 0.8rem;
  color: var(--cadore-cream);
  text-align: center;
}

/* Trust badges */
.cadore-footer__trust {
  display: flex;
  align-items: center;
  gap: 1.25rem;
  flex-wrap: wrap;
  justify-content: flex-end;
}

.cadore-footer__trust-badge {
  display: flex;
  align-items: center;
  gap: 0.3rem;
  font-size: 0.78rem;
  color: var(--cadore-cream);
  white-space: nowrap;
}

/* =========================================================
   RESPONSIVO
   ========================================================= */

/* Tablet: 768px–1024px */
@media (max-width: 1024px) {
  .cadore-footer__grid {
    padding: 3rem 1.5rem 2rem;
  }

  .cadore-footer__bottom {
    padding: 1.25rem 1.5rem;
  }

  .cadore-footer__trust {
    gap: 0.85rem;
  }
}

/* Mobile: ≤767px */
@media (max-width: 767px) {
  .cadore-footer__grid {
    padding: 2.5rem 1rem 1.5rem;
  }

  .cadore-footer__inner {
    grid-template-columns: 1fr;
    gap: 2rem;
  }

  .cadore-footer__bottom {
    padding: 1rem;
  }

  .cadore-footer__bottom-inner {
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 0.85rem;
  }

  .cadore-footer__selectors {
    justify-content: center;
  }

  .cadore-footer__trust {
    justify-content: center;
    gap: 0.75rem;
  }

  .cadore-footer__newsletter-row {
    flex-direction: column;
  }

  .cadore-footer__newsletter-btn {
    display: flex;
    width: 100%;
    justify-content: center;
    text-align: center;
  }
}

/* =========================================================
   FOCUS VISIBLE — acessibilidade de teclado
   ========================================================= */

/* Input newsletter */
.cadore-footer__newsletter-input:focus-visible {
  outline: 2px solid var(--cadore-cream);
  outline-offset: 0;
  border-color: var(--cadore-cream);
  box-shadow: 0 0 0 3px rgba(245, 241, 232, 0.15);
}

/* Botão newsletter */
.cadore-footer__newsletter-btn:focus-visible {
  outline: 2px solid var(--cadore-cream);
  outline-offset: 3px;
  border-radius: var(--cadore-radius);
}

/* Links de navegação (Informação + Legal) */
.cadore-footer__links li a:focus-visible {
  outline: 2px solid var(--cadore-cream);
  outline-offset: 3px;
  border-radius: 2px;
}

/* Links sociais */
.cadore-footer__social-link:focus-visible {
  outline: 2px solid var(--cadore-cream);
  outline-offset: 3px;
  border-radius: 2px;
}

/* Logo link */
.cadore-footer__logo-link:focus-visible {
  outline: 2px solid var(--cadore-cream);
  outline-offset: 4px;
  border-radius: 2px;
}
</style>

<?php wp_footer(); ?>

</body>
</html>
