document.addEventListener("DOMContentLoaded", () => {
  const navToggle = document.querySelector(".ean-nav-toggle");
  const navPanel = document.querySelector(".ean-nav-panel");
  const submenuToggles = document.querySelectorAll(".ean-submenu-toggle");
  const header = document.querySelector(".ean-site-header");

  if (navToggle && navPanel) {
    navToggle.addEventListener("click", () => {
      const expanded = navToggle.getAttribute("aria-expanded") === "true";
      navToggle.setAttribute("aria-expanded", String(!expanded));
      navPanel.classList.toggle("is-open", !expanded);
      document.body.classList.toggle("ean-menu-open", !expanded);
    });

    navPanel.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", () => {
        if (window.innerWidth >= Number(eanNavigation.mobileBreakpoint)) {
          return;
        }

        navToggle.setAttribute("aria-expanded", "false");
        navPanel.classList.remove("is-open");
        document.body.classList.remove("ean-menu-open");
      });
    });
  }

  submenuToggles.forEach((button) => {
    button.addEventListener("click", () => {
      if (window.innerWidth >= Number(eanNavigation.mobileBreakpoint)) {
        return;
      }

      const parent = button.closest(".menu-item-has-children");
      const expanded = button.getAttribute("aria-expanded") === "true";
      button.setAttribute("aria-expanded", String(!expanded));
      button.setAttribute("aria-label", expanded ? eanNavigation.expandText : eanNavigation.collapseText);
      parent?.classList.toggle("is-open", !expanded);
    });
  });

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && navPanel?.classList.contains("is-open")) {
      navToggle?.setAttribute("aria-expanded", "false");
      navPanel.classList.remove("is-open");
      document.body.classList.remove("ean-menu-open");
      navToggle?.focus();
    }
  });

  const onScroll = () => {
    if (!header) {
      return;
    }

    header.classList.toggle("is-scrolled", window.scrollY > 8);
  };

  onScroll();
  window.addEventListener("scroll", onScroll, { passive: true });
});
