<?php
/**
 * Template Name: Contactos
 *
 * Cadore Custom Theme — page-contactos.php
 * Template: Contactos
 *
 * @package cadore-custom
 * @version 1.0.0
 *
 * NÃO redefinir :root nem @font-face — declarados apenas em header.php.
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="cadore-main" class="cadore-main cadore-contactos" role="main">

  <?php /* =====================================================
     SECÇÃO 1 — HERO
  ===================================================== */ ?>
  <section class="cadore-contactos__hero" aria-labelledby="cadore-contactos-heading">
    <div class="cadore-contactos__hero-inner">
      <p class="cadore-contactos__eyebrow">
        <?php esc_html_e( 'Estamos Disponíveis', 'cadore-custom' ); ?>
      </p>
      <h1 id="cadore-contactos-heading" class="cadore-contactos__hero-title">
        <?php esc_html_e( 'Contacto', 'cadore-custom' ); ?>
      </h1>
      <p class="cadore-contactos__hero-subtitle">
        <?php esc_html_e( 'Tem uma pergunta ou quer uma peça personalizada? Adoramos saber de si.', 'cadore-custom' ); ?>
      </p>
    </div>
  </section>
  <?php /* /HERO */ ?>


  <?php /* =====================================================
     SECÇÃO 2 — FORMULÁRIO + INFO BOX
  ===================================================== */ ?>
  <section class="cadore-contactos__main" aria-label="<?php esc_attr_e( 'Formulário e informações de contacto', 'cadore-custom' ); ?>">
    <div class="cadore-contactos__main-inner">

      <!-- ===== FORMULÁRIO (esquerda) ===== -->
      <div class="cadore-contactos__form-wrap">
        <h2 class="cadore-contactos__form-title">
          <?php esc_html_e( 'Envie-nos uma mensagem', 'cadore-custom' ); ?>
        </h2>

        <form class="cadore-contactos__form"
              method="post"
              action="#"
              novalidate
              aria-label="<?php esc_attr_e( 'Formulário de contacto', 'cadore-custom' ); ?>">
          <?php wp_nonce_field( 'cadore_contacto', 'cadore_contacto_nonce' ); ?>
          <input type="hidden" name="form_type" value="contacto">

          <!-- Nome -->
          <div class="cadore-contactos__field">
            <label for="cadore-contact-nome" class="cadore-contactos__label">
              <?php esc_html_e( 'Nome', 'cadore-custom' ); ?>
              <span class="cadore-contactos__required" aria-hidden="true">*</span>
            </label>
            <input type="text"
                   id="cadore-contact-nome"
                   name="contact_nome"
                   class="cadore-contactos__input"
                   placeholder="<?php esc_attr_e( 'O seu nome completo', 'cadore-custom' ); ?>"
                   required
                   autocomplete="name"
                   aria-required="true">
          </div>

          <!-- Email -->
          <div class="cadore-contactos__field">
            <label for="cadore-contact-email" class="cadore-contactos__label">
              <?php esc_html_e( 'Email', 'cadore-custom' ); ?>
              <span class="cadore-contactos__required" aria-hidden="true">*</span>
            </label>
            <input type="email"
                   id="cadore-contact-email"
                   name="contact_email"
                   class="cadore-contactos__input"
                   placeholder="<?php esc_attr_e( 'o.seu@email.com', 'cadore-custom' ); ?>"
                   required
                   autocomplete="email"
                   aria-required="true">
          </div>

          <!-- Assunto -->
          <div class="cadore-contactos__field">
            <label for="cadore-contact-assunto" class="cadore-contactos__label">
              <?php esc_html_e( 'Assunto', 'cadore-custom' ); ?>
              <span class="cadore-contactos__required" aria-hidden="true">*</span>
            </label>
            <input type="text"
                   id="cadore-contact-assunto"
                   name="contact_assunto"
                   class="cadore-contactos__input"
                   placeholder="<?php esc_attr_e( 'Como podemos ajudar?', 'cadore-custom' ); ?>"
                   required
                   aria-required="true">
          </div>

          <!-- Mensagem -->
          <div class="cadore-contactos__field">
            <label for="cadore-contact-mensagem" class="cadore-contactos__label">
              <?php esc_html_e( 'Mensagem', 'cadore-custom' ); ?>
              <span class="cadore-contactos__required" aria-hidden="true">*</span>
            </label>
            <textarea id="cadore-contact-mensagem"
                      name="contact_mensagem"
                      class="cadore-contactos__input cadore-contactos__textarea"
                      rows="6"
                      placeholder="<?php esc_attr_e( 'Escreva a sua mensagem aqui…', 'cadore-custom' ); ?>"
                      required
                      aria-required="true"></textarea>
          </div>

          <p class="cadore-contactos__required-note">
            <span aria-hidden="true">*</span>
            <?php esc_html_e( 'Campos obrigatórios', 'cadore-custom' ); ?>
          </p>

          <button type="submit"
                  class="cadore-btn cadore-btn--dark cadore-btn--full"
                  aria-label="<?php esc_attr_e( 'Enviar mensagem de contacto', 'cadore-custom' ); ?>">
            <?php esc_html_e( 'Enviar mensagem', 'cadore-custom' ); ?>
          </button>

        </form>
      </div>
      <!-- /FORMULÁRIO -->

      <!-- ===== INFO BOX (direita) ===== -->
      <aside class="cadore-contactos__info"
             aria-label="<?php esc_attr_e( 'Informações de contacto', 'cadore-custom' ); ?>">

        <!-- Email -->
        <div class="cadore-contactos__info-block">
          <h3 class="cadore-contactos__info-label">
            <?php esc_html_e( 'Email', 'cadore-custom' ); ?>
          </h3>
          <a href="mailto:contacto@cadorejoias.com"
             class="cadore-contactos__info-link">
            contacto@cadorejoias.com
          </a>
        </div>

        <!-- Telefone -->
        <div class="cadore-contactos__info-block">
          <h3 class="cadore-contactos__info-label">
            <?php esc_html_e( 'Telefone', 'cadore-custom' ); ?>
          </h3>
          <a href="tel:+351915229933"
             class="cadore-contactos__info-link">
            +351 915 229 933
          </a>
        </div>

        <!-- Atelier -->
        <div class="cadore-contactos__info-block">
          <h3 class="cadore-contactos__info-label">
            <?php esc_html_e( 'Atelier', 'cadore-custom' ); ?>
          </h3>
          <address class="cadore-contactos__address">
            <p>Rua Fresca 353, 201</p>
            <p>4450-681 Leça da Palmeira</p>
            <p>Portugal</p>
          </address>
        </div>

        <!-- Horário -->
        <div class="cadore-contactos__info-block">
          <h3 class="cadore-contactos__info-label">
            <?php esc_html_e( 'Horário', 'cadore-custom' ); ?>
          </h3>
          <ul class="cadore-contactos__schedule">
            <li>
              <span class="cadore-contactos__schedule-day">
                <?php esc_html_e( 'Seg – Qui', 'cadore-custom' ); ?>
              </span>
              <span class="cadore-contactos__schedule-time">10h – 18h</span>
            </li>
            <li>
              <span class="cadore-contactos__schedule-day">
                <?php esc_html_e( 'Sexta', 'cadore-custom' ); ?>
              </span>
              <span class="cadore-contactos__schedule-time">10h – 19h</span>
            </li>
            <li>
              <span class="cadore-contactos__schedule-day">
                <?php esc_html_e( 'Sábado', 'cadore-custom' ); ?>
              </span>
              <span class="cadore-contactos__schedule-time">10h – 14h</span>
            </li>
            <li>
              <span class="cadore-contactos__schedule-day">
                <?php esc_html_e( 'Domingo', 'cadore-custom' ); ?>
              </span>
              <span class="cadore-contactos__schedule-time cadore-contactos__schedule-time--closed">
                <?php esc_html_e( 'Fechado', 'cadore-custom' ); ?>
              </span>
            </li>
          </ul>
        </div>

        <!-- Social -->
        <div class="cadore-contactos__info-block">
          <h3 class="cadore-contactos__info-label">
            <?php esc_html_e( 'Redes Sociais', 'cadore-custom' ); ?>
          </h3>
          <ul class="cadore-contactos__social"
              aria-label="<?php esc_attr_e( 'Redes sociais Cadore Joias', 'cadore-custom' ); ?>">
            <li>
              <a href="https://www.instagram.com/cadorejoias"
                 class="cadore-contactos__social-link"
                 target="_blank"
                 rel="noopener noreferrer"
                 aria-label="<?php esc_attr_e( 'Cadore Joias no Instagram (abre em nova aba)', 'cadore-custom' ); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                  <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                  <circle cx="12" cy="12" r="4"/>
                  <circle cx="17.5" cy="6.5" r="0.5" fill="currentColor" stroke="none"/>
                </svg>
                <span>Instagram</span>
              </a>
            </li>
            <li>
              <a href="https://www.facebook.com/cadorejoias"
                 class="cadore-contactos__social-link"
                 target="_blank"
                 rel="noopener noreferrer"
                 aria-label="<?php esc_attr_e( 'Cadore Joias no Facebook (abre em nova aba)', 'cadore-custom' ); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                  <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                </svg>
                <span>Facebook</span>
              </a>
            </li>
            <li>
              <a href="https://www.pinterest.com/cadorejoias"
                 class="cadore-contactos__social-link"
                 target="_blank"
                 rel="noopener noreferrer"
                 aria-label="<?php esc_attr_e( 'Cadore Joias no Pinterest (abre em nova aba)', 'cadore-custom' ); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                  <path d="M12 2C6.477 2 2 6.477 2 12c0 4.236 2.636 7.855 6.356 9.312-.088-.791-.167-2.005.035-2.868.181-.78 1.172-4.97 1.172-4.97s-.299-.598-.299-1.482c0-1.388.806-2.428 1.808-2.428.853 0 1.267.641 1.267 1.408 0 .858-.546 2.140-.828 3.33-.236.995.499 1.806 1.476 1.806 1.772 0 3.135-1.867 3.135-4.563 0-2.386-1.715-4.054-4.163-4.054-2.836 0-4.5 2.126-4.5 4.322 0 .856.329 1.772.741 2.273a.3.3 0 0 1 .069.284c-.075.314-.244.995-.277 1.134-.044.183-.146.222-.337.134-1.249-.581-2.03-2.407-2.03-3.874 0-3.154 2.292-6.052 6.608-6.052 3.469 0 6.165 2.473 6.165 5.776 0 3.447-2.173 6.22-5.19 6.22-1.013 0-1.966-.527-2.292-1.148l-.623 2.378c-.226.869-.835 1.958-1.244 2.621.937.29 1.931.446 2.962.446 5.523 0 10-4.477 10-10S17.523 2 12 2z"/>
                </svg>
                <span>Pinterest</span>
              </a>
            </li>
          </ul>
        </div>

      </aside>
      <!-- /INFO BOX -->

    </div><!-- .cadore-contactos__main-inner -->
  </section>
  <?php /* /FORMULÁRIO + INFO BOX */ ?>

</main><!-- #cadore-main -->

<style>
/* =========================================================
   PAGE-CONTACTOS.PHP — ESTILOS
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
.cadore-contactos__hero {
  background-color: var(--cadore-cream);
  padding: 3rem 2rem;
  text-align: center;
}

.cadore-contactos__hero-inner {
  max-width: 800px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.cadore-contactos__eyebrow {
  font-size: 0.85rem;
  font-weight: 600;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--cadore-sage);
}

.cadore-contactos__hero-title {
  font-family: var(--cadore-font-heading);
  font-weight: 300;
  font-size: 2.5rem;
  color: var(--cadore-dark-sage);
  letter-spacing: 0.02em;
  line-height: 1.15;
}

.cadore-contactos__hero-subtitle {
  font-size: 1.05rem;
  color: var(--cadore-dark-sage);
  line-height: 1.65;
  max-width: 560px;
  margin: 0 auto;
}

/* ---------------------------------------------------------
   SECÇÃO 2 — LAYOUT PRINCIPAL
--------------------------------------------------------- */
.cadore-contactos__main {
  background-color: var(--cadore-white);
  padding: 4rem 2rem;
}

.cadore-contactos__main-inner {
  display: grid;
  grid-template-columns: 1.5fr 1fr;
  gap: 3rem;
  max-width: var(--cadore-max-width);
  margin: 0 auto;
  align-items: start;
}

/* ----- Formulário ----- */
.cadore-contactos__form-wrap {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

.cadore-contactos__form-title {
  font-family: var(--cadore-font-heading);
  font-weight: 300;
  font-size: 1.5rem;
  color: var(--cadore-dark-sage);
  letter-spacing: 0.02em;
}

.cadore-contactos__form {
  display: flex;
  flex-direction: column;
  gap: 1.25rem;
}

.cadore-contactos__field {
  display: flex;
  flex-direction: column;
  gap: 0.4rem;
}

.cadore-contactos__label {
  font-size: 0.85rem;
  font-weight: 600;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  color: var(--cadore-dark-sage);
}

.cadore-contactos__required {
  color: var(--cadore-gold);
  margin-left: 0.2rem;
}

.cadore-contactos__input {
  width: 100%;
  padding: 0.75rem;
  border: 1px solid var(--cadore-sage);
  border-radius: var(--cadore-radius);
  font-size: 1rem;
  font-family: inherit;
  color: var(--cadore-dark-sage);
  background-color: var(--cadore-white);
  transition: border-color var(--cadore-transition),
              box-shadow var(--cadore-transition);
  appearance: none;
}

.cadore-contactos__input::placeholder {
  color: rgba(74, 90, 80, 0.4);
}

.cadore-contactos__input:focus-visible {
  outline: 2px solid var(--cadore-sage);
  outline-offset: 0;
  border-color: var(--cadore-sage);
  box-shadow: 0 0 0 3px rgba(166, 181, 160, 0.1);
}

.cadore-contactos__textarea {
  resize: vertical;
  min-height: 150px;
  line-height: 1.6;
}

.cadore-contactos__required-note {
  font-size: 0.78rem;
  color: var(--cadore-sage);
}

/* ----- Info Box ----- */
.cadore-contactos__info {
  background-color: var(--cadore-cream);
  border-radius: 12px;
  padding: 2rem;
  display: flex;
  flex-direction: column;
  gap: 1.75rem;
}

.cadore-contactos__info-block {
  display: flex;
  flex-direction: column;
  gap: 0.4rem;
}

.cadore-contactos__info-label {
  font-size: 0.75rem;
  font-weight: 600;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--cadore-sage);
  padding-bottom: 0.25rem;
  border-bottom: 1px solid rgba(166, 181, 160, 0.3);
}

.cadore-contactos__info-link {
  font-size: 0.925rem;
  color: var(--cadore-dark-sage);
  text-decoration: none;
  font-weight: 500;
  transition: color var(--cadore-transition);
}

.cadore-contactos__info-link:hover {
  color: var(--cadore-gold);
}

.cadore-contactos__address {
  font-style: normal;
  font-size: 0.9rem;
  color: var(--cadore-dark-sage);
  line-height: 1.8;
}

/* Horário */
.cadore-contactos__schedule {
  display: flex;
  flex-direction: column;
  gap: 0.35rem;
}

.cadore-contactos__schedule li {
  display: flex;
  justify-content: space-between;
  align-items: baseline;
  font-size: 0.875rem;
  color: var(--cadore-dark-sage);
  padding: 0.2rem 0;
  border-bottom: 1px solid rgba(166, 181, 160, 0.15);
}

.cadore-contactos__schedule li:last-child {
  border-bottom: none;
}

.cadore-contactos__schedule-day {
  font-weight: 500;
}

.cadore-contactos__schedule-time {
  font-weight: 400;
}

.cadore-contactos__schedule-time--closed {
  color: var(--cadore-gold);
  opacity: 1;
  font-style: italic;
}

/* Social */
.cadore-contactos__social {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}

.cadore-contactos__social-link {
  display: inline-flex;
  align-items: center;
  gap: 0.55rem;
  font-size: 0.875rem;
  font-weight: 500;
  color: var(--cadore-dark-sage);
  text-decoration: none;
  transition: color var(--cadore-transition);
}

.cadore-contactos__social-link:hover {
  color: var(--cadore-gold);
}

.cadore-contactos__social-link svg {
  flex-shrink: 0;
}

/* =========================================================
   RESPONSIVO
   ========================================================= */

/* Tablet: 768px–1024px */
@media (max-width: 1024px) {
  .cadore-contactos__hero {
    padding: 2.5rem 1.5rem;
  }

  .cadore-contactos__main {
    padding: 3rem 1.5rem;
  }

  .cadore-contactos__main-inner {
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
  }

  .cadore-contactos__hero-title {
    font-size: 2rem;
  }
}

/* Mobile: ≤767px — grid 1 coluna, form → info box */
@media (max-width: 767px) {
  .cadore-contactos__hero {
    padding: 2rem 1rem;
  }

  .cadore-contactos__hero-title {
    font-size: 1.75rem;
  }

  .cadore-contactos__hero-subtitle {
    font-size: 0.95rem;
  }

  .cadore-contactos__main {
    padding: 2rem 1rem;
  }

  .cadore-contactos__main-inner {
    grid-template-columns: 1fr;
    gap: 2rem;
  }

  .cadore-contactos__info {
    padding: 1.5rem;
  }
}

/* =========================================================
   FOCUS VISIBLE — acessibilidade de teclado
   ========================================================= */

/* Botão submit */
.cadore-btn:focus-visible {
  outline: 2px solid var(--cadore-dark-sage);
  outline-offset: 3px;
  border-radius: var(--cadore-radius);
}

/* Links de contacto (email, telefone) */
.cadore-contactos__info-link:focus-visible {
  outline: 2px solid var(--cadore-dark-sage);
  outline-offset: 3px;
  border-radius: 2px;
}

/* Links sociais */
.cadore-contactos__social-link:focus-visible {
  outline: 2px solid var(--cadore-dark-sage);
  outline-offset: 3px;
  border-radius: 2px;
}
</style>

<?php get_footer(); ?>
