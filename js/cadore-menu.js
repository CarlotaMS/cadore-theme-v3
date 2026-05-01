const toggle = document.querySelector('.cadore-menu-toggle');
const mobileNav = document.getElementById('cadore-nav-mobile');
if (toggle && mobileNav) {
  toggle.addEventListener('click', function() {
    const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
    toggle.setAttribute('aria-expanded', String(!isExpanded));
    mobileNav.hidden = isExpanded;
  });
}
