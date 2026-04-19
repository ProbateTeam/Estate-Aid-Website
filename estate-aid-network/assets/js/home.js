document.addEventListener("DOMContentLoaded", () => {
  const animatedSections = document.querySelectorAll(".ean-section, .ean-sticky-cta");

  if (!("IntersectionObserver" in window)) {
    animatedSections.forEach((section) => section.classList.add("is-visible"));
    return;
  }

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          observer.unobserve(entry.target);
        }
      });
    },
    {
      threshold: 0.15,
    }
  );

  animatedSections.forEach((section) => observer.observe(section));
});
