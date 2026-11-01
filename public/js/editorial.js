/**
 * BYLINE BRIDGE — EDITORIAL LUXURY INTERACTIONS & MOTION SYSTEM
 * Powered by GSAP 3.12.5 + ScrollTrigger & Micro-Interactions
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Accessibility Check: Honor prefers-reduced-motion
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // 2. Sticky Navbar State
  const navbar = document.querySelector('.editorial-navbar');
  if (navbar) {
    const handleScroll = () => {
      if (window.scrollY > 40) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    };
    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll();
  }

  // 3. Auto-dismiss Alert Messages
  const autoAlerts = document.querySelectorAll('.alert-auto-dismiss');
  autoAlerts.forEach(alert => {
    setTimeout(() => {
      if (typeof bootstrap !== 'undefined' && bootstrap.Alert) {
        const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
        if (bsAlert) bsAlert.close();
      }
    }, 5000);
  });

  // 4. GSAP Motion System (Only if GSAP is available & user allows motion)
  if (typeof gsap !== 'undefined' && !prefersReducedMotion) {
    if (typeof ScrollTrigger !== 'undefined') {
      gsap.registerPlugin(ScrollTrigger);
    }

    // -------------------------------------------------------------
    // SIGNATURE MOTION (HIGH): HERO ENTRANCE SEQUENCE
    // -------------------------------------------------------------
    const heroWrapper = document.querySelector('.hero-wrapper');
    if (heroWrapper) {
      const heroTl = gsap.timeline({
        defaults: { ease: 'power3.out' }
      });

      // (a) Eyebrow & Badges
      const heroBadges = heroWrapper.querySelectorAll('.badge-rotated, .hero-eyebrow-badge');
      if (heroBadges.length) {
        heroTl.fromTo(heroBadges,
          { y: -16, opacity: 0 },
          { y: 0, opacity: 1, duration: 0.6, stagger: 0.08 }
        );
      }

      // (b) Staggered Headline Mask Reveals
      const maskInners = heroWrapper.querySelectorAll('.text-mask-inner');
      if (maskInners.length) {
        heroTl.fromTo(maskInners,
          { yPercent: 105, opacity: 0 },
          { yPercent: 0, opacity: 1, duration: 0.9, stagger: 0.12, ease: 'power4.out' },
          '-=0.3'
        );
      }

      // (c) Supporting Subtitle
      const heroSubtitle = heroWrapper.querySelector('.display-subtitle');
      if (heroSubtitle) {
        heroTl.fromTo(heroSubtitle,
          { y: 20, opacity: 0 },
          { y: 0, opacity: 1, duration: 0.7 },
          '-=0.4'
        );
      }

      // (d) CTA Buttons
      const heroBtns = heroWrapper.querySelectorAll('.btn-hero-primary, .btn-hero-secondary');
      if (heroBtns.length) {
        heroTl.fromTo(heroBtns,
          { y: 15, opacity: 0 },
          { y: 0, opacity: 1, duration: 0.6, stagger: 0.1 },
          '-=0.4'
        );
      }

      // (e) Trust Bar Micro-Pills
      const trustPills = heroWrapper.querySelectorAll('.hero-trust-bar .hero-trust-pill');
      if (trustPills.length) {
        heroTl.fromTo(trustPills,
          { y: 12, opacity: 0 },
          { y: 0, opacity: 1, duration: 0.5, stagger: 0.08 },
          '-=0.3'
        );
      }

      // (f) Hero Editorial Media Collage Reveal (Backdrops, Magazine Frame, Seal)
      const cobaltPlate = heroWrapper.querySelector('.collage-cobalt-backdrop');
      const inkPlate = heroWrapper.querySelector('.collage-ink-backdrop');
      const collageFrame = heroWrapper.querySelector('.collage-magazine-frame');
      const badgeTearsheet = heroWrapper.querySelector('.collage-tearsheet-badge');

      if (cobaltPlate && inkPlate) {
        heroTl.fromTo([cobaltPlate, inkPlate],
          { x: 30, opacity: 0 },
          { x: 0, opacity: 1, duration: 0.8, stagger: 0.1 },
          0.3
        );
      }

      if (collageFrame) {
        heroTl.fromTo(collageFrame,
          { scale: 0.93, y: 25, opacity: 0 },
          { scale: 1, y: 0, opacity: 1, duration: 0.95, ease: 'power4.out' },
          0.45
        );
      }

      if (badgeTearsheet) {
        heroTl.fromTo(badgeTearsheet,
          { scale: 0.8, rotation: 6, opacity: 0 },
          { scale: 1, rotation: -1.5, opacity: 1, duration: 0.6, ease: 'back.out(1.8)' },
          0.7
        );
      }
    }

    // -------------------------------------------------------------
    // SUBPAGE HERO BANNER ENTRANCE SEQUENCE
    // -------------------------------------------------------------
    const subpageBanner = document.querySelector('.subpage-hero-banner');
    if (subpageBanner) {
      const bannerElements = subpageBanner.querySelectorAll('.badge-rotated, .display-monumental, .display-huge, .display-subtitle');
      if (bannerElements.length) {
        gsap.from(bannerElements, {
          y: 28,
          opacity: 0,
          duration: 0.9,
          stagger: 0.12,
          ease: 'power3.out',
          delay: 0.1
        });
      }
    }

    // -------------------------------------------------------------
    // SCROLL-TRIGGERED MOTION (MEDIUM & SUBTLE)
    // -------------------------------------------------------------
    if (typeof ScrollTrigger !== 'undefined') {
      // 1. Watermark Background Outlines (Subtle Parallax)
      const watermarks = document.querySelectorAll('.text-outline-bg');
      watermarks.forEach(wm => {
        gsap.to(wm, {
          y: -45,
          scrollTrigger: {
            trigger: wm.parentElement,
            start: 'top bottom',
            end: 'bottom top',
            scrub: 1.2
          }
        });
      });

      // 2. Section Titles & Eyebrows
      const sectionHeaders = document.querySelectorAll('.display-huge, .display-section');
      sectionHeaders.forEach(heading => {
        // Skip hero heading since it already animated
        if (heading.closest('.hero-wrapper')) return;

        gsap.from(heading, {
          y: 35,
          opacity: 0,
          duration: 0.9,
          ease: 'power3.out',
          scrollTrigger: {
            trigger: heading,
            start: 'top 88%',
            toggleActions: 'play none none none'
          }
        });
      });

      // 3. Core Services Cards Staggered Reveal
      const serviceCards = document.querySelectorAll('.section-pad-lg.bg-deep-ink .editorial-card');
      if (serviceCards.length) {
        gsap.from(serviceCards, {
          y: 45,
          opacity: 0,
          duration: 0.85,
          stagger: 0.14,
          ease: 'power3.out',
          scrollTrigger: {
            trigger: serviceCards[0].closest('.row'),
            start: 'top 85%',
            toggleActions: 'play none none none'
          }
        });
      }

      // 4. Four-Step Process Items Staggered Entrance
      const processItems = document.querySelectorAll('.process-step-item');
      if (processItems.length) {
        gsap.from(processItems, {
          y: 35,
          opacity: 0,
          duration: 0.8,
          stagger: 0.14,
          ease: 'power3.out',
          scrollTrigger: {
            trigger: processItems[0].closest('.row'),
            start: 'top 85%',
            toggleActions: 'play none none none'
          }
        });
      }

      // 5. Case Studies / Format Tiles Staggered Entrance
      const caseTiles = document.querySelectorAll('.case-tile');
      if (caseTiles.length) {
        gsap.from(caseTiles, {
          y: 40,
          opacity: 0,
          duration: 0.85,
          stagger: 0.12,
          ease: 'power3.out',
          scrollTrigger: {
            trigger: caseTiles[0].closest('.row'),
            start: 'top 85%',
            toggleActions: 'play none none none'
          }
        });
      }

      // 6. Testimonials / Proof Cards
      const testCards = document.querySelectorAll('.testimonial-card');
      if (testCards.length) {
        gsap.from(testCards, {
          y: 35,
          opacity: 0,
          duration: 0.8,
          stagger: 0.12,
          ease: 'power3.out',
          scrollTrigger: {
            trigger: testCards[0].closest('.row'),
            start: 'top 85%',
            toggleActions: 'play none none none'
          }
        });
      }

      // 7. Trust Bar Outlets Reveal
      const pubLogos = document.querySelectorAll('.pub-logo-item');
      if (pubLogos.length) {
        gsap.from(pubLogos, {
          opacity: 0,
          y: 15,
          duration: 0.6,
          stagger: 0.08,
          ease: 'power2.out',
          scrollTrigger: {
            trigger: '.publication-strip',
            start: 'top 90%',
            toggleActions: 'play none none none'
          }
        });
      }
    }
  }

  // 5. Micro-Interactions: Interactive 3D Subtle Tilt on Desktop
  if (window.matchMedia('(hover: hover) and (pointer: fine)').matches && !prefersReducedMotion) {
    const cards = document.querySelectorAll('.editorial-card, .case-tile');
    cards.forEach(card => {
      card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left - rect.width / 2;
        const y = e.clientY - rect.top - rect.height / 2;
        const rotateX = (y / rect.height) * -6;
        const rotateY = (x / rect.width) * 6;
        card.style.transform = `perspective(1000px) rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg) translateY(-5px)`;
      });

      card.addEventListener('mouseleave', () => {
        card.style.transform = '';
      });
    });
  }
});
