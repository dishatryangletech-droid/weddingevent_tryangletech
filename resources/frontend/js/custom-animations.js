/**
 * Master Custom Animations & Interactive Components for Knotcraft Template
 * Supports offline execution: Dropdowns, Accordions (FAQ), Tabs, Sliders, Lightboxes,
 * GSAP SplitText, ScrollTrigger, Counters, Marquees, and Lenis Smooth Scroll.
 */

document.addEventListener("DOMContentLoaded", function () {
  // 1. Root HTML Setup
  document.documentElement.classList.add("w-mod-js", "w-mod-ix", "w-mod-ix3", "wf-active");

  // 2. Remove Webflow Badge
  function removeWebflowBadge() {
    const badges = document.querySelectorAll(".w-webflow-badge, [href*='webflow.com?utm_campaign=brandjs']");
    badges.forEach((b) => b.remove());
  }
  removeWebflowBadge();
  setTimeout(removeWebflowBadge, 100);
  setTimeout(removeWebflowBadge, 500);
  setTimeout(removeWebflowBadge, 1500);

  // 3. Navbar Dropdowns & Mega Menu Handler
  const dropdowns = document.querySelectorAll(".w-dropdown");
  dropdowns.forEach((dd) => {
    const toggle = dd.querySelector(".w-dropdown-toggle");
    const list = dd.querySelector(".w-dropdown-list");
    const arrowHolder = dd.querySelector(".fda-nav-menu-arrow-holder");
    const menuLine = dd.querySelector(".fda-nav-menu-line");
    let closeTimeout = null;

    function openDropdown() {
      clearTimeout(closeTimeout);
      dd.classList.add("w--open");
      if (toggle) {
        toggle.classList.add("w--open");
        toggle.setAttribute("aria-expanded", "true");
      }
      if (list) {
        list.classList.add("w--open");
      }
      if (arrowHolder) {
        arrowHolder.style.transform = "rotate(180deg)";
        arrowHolder.style.transition = "transform 0.3s ease";
      }
      if (menuLine) {
        menuLine.style.width = "100%";
        menuLine.style.transition = "width 0.3s ease";
      }
    }

    function closeDropdown() {
      closeTimeout = setTimeout(() => {
        dd.classList.remove("w--open");
        if (toggle) {
          toggle.classList.remove("w--open");
          toggle.setAttribute("aria-expanded", "false");
        }
        if (list) {
          list.classList.remove("w--open");
        }
        if (arrowHolder) {
          arrowHolder.style.transform = "rotate(0deg)";
        }
        if (menuLine) {
          menuLine.style.width = "0%";
        }
      }, 150);
    }

    // Desktop Hover
    dd.addEventListener("mouseenter", openDropdown);
    dd.addEventListener("mouseleave", closeDropdown);

    // Click / Touch toggle
    if (toggle) {
      toggle.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        if (dd.classList.contains("w--open")) {
          closeDropdown();
        } else {
          dropdowns.forEach((other) => {
            if (other !== dd) {
              other.classList.remove("w--open");
              const oList = other.querySelector(".w-dropdown-list");
              if (oList) oList.classList.remove("w--open");
            }
          });
          openDropdown();
        }
      });
    }
  });

  document.addEventListener("click", function (e) {
    if (!e.target.closest(".w-dropdown")) {
      dropdowns.forEach((dd) => {
        dd.classList.remove("w--open");
        const list = dd.querySelector(".w-dropdown-list");
        const arrowHolder = dd.querySelector(".fda-nav-menu-arrow-holder");
        const menuLine = dd.querySelector(".fda-nav-menu-line");
        if (list) list.classList.remove("w--open");
        if (arrowHolder) arrowHolder.style.transform = "rotate(0deg)";
        if (menuLine) menuLine.style.width = "0%";
      });
    }
  });

  // 4. Mobile Menu Toggle
  const navButtons = document.querySelectorAll(".w-nav-button");
  navButtons.forEach((btn) => {
    btn.addEventListener("click", function () {
      const nav = btn.closest(".w-nav");
      if (!nav) return;
      const menu = nav.querySelector(".w-nav-menu");
      if (!menu) return;
      const isOpen = btn.classList.contains("w--open");
      if (isOpen) {
        btn.classList.remove("w--open");
        menu.classList.remove("w--open");
        menu.style.display = "none";
      } else {
        btn.classList.add("w--open");
        menu.classList.add("w--open");
        menu.style.display = "block";
      }
    });
  });

  // 5. FAQ Accordion Interaction
  const faqBoxes = document.querySelectorAll(".fda-faq-box, [faq]");
  faqBoxes.forEach((box) => {
    const question = box.querySelector(".fda-question-box, [faq-question]");
    const answer = box.querySelector(".fda-answer-wrapper, [faq-answer]");

    if (answer) {
      answer.style.overflow = "hidden";
      answer.style.transition = "max-height 0.4s ease, opacity 0.3s ease";
      answer.style.maxHeight = "0px";
      answer.style.opacity = "0";
    }

    const clickTarget = question || box;
    clickTarget.style.cursor = "pointer";

    clickTarget.addEventListener("click", function (e) {
      const isOpen = box.classList.contains("faq-open");

      // Close siblings if in accordion container
      const container = box.closest(".fda-faq-question-box-v2, .fda-faq-content, .fda-faq");
      if (container) {
        const siblings = container.querySelectorAll(".fda-faq-box, [faq]");
        siblings.forEach((sib) => {
          if (sib !== box) {
            sib.classList.remove("faq-open");
            const sAns = sib.querySelector(".fda-answer-wrapper, [faq-answer]");
            const sArr = sib.querySelector("[faq-arrow], .fda-arrow-two");
            if (sAns) {
              sAns.style.maxHeight = "0px";
              sAns.style.opacity = "0";
            }
            if (sArr) sArr.style.transform = "rotate(0deg)";
          }
        });
      }

      const arrow = box.querySelector("[faq-arrow], .fda-arrow-two");
      if (isOpen) {
        box.classList.remove("faq-open");
        if (answer) {
          answer.style.maxHeight = "0px";
          answer.style.opacity = "0";
        }
        if (arrow) arrow.style.transform = "rotate(0deg)";
      } else {
        box.classList.add("faq-open");
        if (answer) {
          answer.style.maxHeight = answer.scrollHeight + "px";
          answer.style.opacity = "1";
        }
        if (arrow) arrow.style.transform = "rotate(180deg)";
      }
    });
  });

  // 6. Tabs Functionality
  const tabContainers = document.querySelectorAll(".w-tabs");
  tabContainers.forEach((tabs) => {
    const tabLinks = tabs.querySelectorAll(".w-tab-link");
    const tabPanes = tabs.querySelectorAll(".w-tab-pane");

    tabLinks.forEach((link, idx) => {
      link.addEventListener("click", function (e) {
        e.preventDefault();
        const tabData = link.getAttribute("data-w-tab");

        tabLinks.forEach((l) => l.classList.remove("w--current"));
        link.classList.add("w--current");

        tabPanes.forEach((pane) => {
          if (pane.getAttribute("data-w-tab") === tabData || (!tabData && Array.from(tabPanes).indexOf(pane) === idx)) {
            pane.classList.add("w--tab-active");
            pane.style.display = "block";
            pane.style.opacity = "1";
          } else {
            pane.classList.remove("w--tab-active");
            pane.style.display = "none";
            pane.style.opacity = "0";
          }
        });
      });
    });
  });

  // 7. Sliders (Touch & Arrow support)
  const sliders = document.querySelectorAll(".w-slider");
  sliders.forEach((slider) => {
    const mask = slider.querySelector(".w-slider-mask");
    const slides = slider.querySelectorAll(".w-slide");
    const leftArrow = slider.querySelector(".w-slider-arrow-left");
    const rightArrow = slider.querySelector(".w-slider-arrow-right");
    const navDots = slider.querySelectorAll(".w-slider-dot");

    if (!mask || slides.length <= 1) return;

    let currentIndex = 0;
    const totalSlides = slides.length;

    function goToSlide(index) {
      if (index < 0) index = totalSlides - 1;
      if (index >= totalSlides) index = 0;
      currentIndex = index;

      slides.forEach((s, i) => {
        s.style.transform = `translateX(-${currentIndex * 100}%)`;
        s.style.transition = "transform 0.5s ease-out";
      });

      navDots.forEach((dot, i) => {
        if (i === currentIndex) dot.classList.add("w-active");
        else dot.classList.remove("w-active");
      });
    }

    if (rightArrow) {
      rightArrow.addEventListener("click", () => goToSlide(currentIndex + 1));
    }
    if (leftArrow) {
      leftArrow.addEventListener("click", () => goToSlide(currentIndex - 1));
    }

    navDots.forEach((dot, idx) => {
      dot.addEventListener("click", () => goToSlide(idx));
    });

    // Auto play if slider has auto-play attribute
    const autoPlayDelay = parseInt(slider.getAttribute("data-delay")) || 0;
    if (autoPlayDelay > 0) {
      let interval = setInterval(() => goToSlide(currentIndex + 1), autoPlayDelay);
      slider.addEventListener("mouseenter", () => clearInterval(interval));
      slider.addEventListener("mouseleave", () => {
        interval = setInterval(() => goToSlide(currentIndex + 1), autoPlayDelay);
      });
    }
  });

  // 8. Custom Lightbox Support
  const lightboxLinks = document.querySelectorAll(".w-lightbox");
  if (lightboxLinks.length > 0) {
    let overlay = document.getElementById("custom-lightbox-overlay");
    if (!overlay) {
      overlay = document.createElement("div");
      overlay.id = "custom-lightbox-overlay";
      overlay.style.cssText = `
        position: fixed; inset: 0; background: rgba(0,0,0,0.9); z-index: 999999;
        display: none; align-items: center; justify-content: center; opacity: 0;
        transition: opacity 0.3s ease; cursor: zoom-out;
      `;
      overlay.innerHTML = `<img id="lightbox-img" style="max-width:90%; max-height:90%; object-fit:contain; border-radius:8px;" src="" alt=""/><button style="position:absolute; top:20px; right:20px; background:none; border:none; color:#fff; font-size:35px; cursor:pointer;">&times;</button>`;
      document.body.appendChild(overlay);

      overlay.addEventListener("click", function () {
        overlay.style.opacity = "0";
        setTimeout(() => (overlay.style.display = "none"), 300);
      });
    }

    lightboxLinks.forEach((link) => {
      link.addEventListener("click", function (e) {
        e.preventDefault();
        let imgSrc = "";
        const jsonScript = link.querySelector("script.w-json");
        if (jsonScript) {
          try {
            const data = JSON.parse(jsonScript.textContent);
            if (data.items && data.items.length > 0) {
              imgSrc = data.items[0].url;
            }
          } catch (err) {}
        }
        if (!imgSrc) {
          const img = link.querySelector("img");
          if (img) imgSrc = img.src;
        }

        if (imgSrc && overlay) {
          const lbImg = overlay.querySelector("#lightbox-img");
          if (lbImg) lbImg.src = imgSrc;
          overlay.style.display = "flex";
          setTimeout(() => (overlay.style.opacity = "1"), 20);
        }
      });
    });
  }

  // 9. GSAP & ScrollTrigger Animations
  if (typeof gsap !== "undefined") {
    if (typeof ScrollTrigger !== "undefined") {
      gsap.registerPlugin(ScrollTrigger);
    }
    if (typeof SplitText !== "undefined") {
      try {
        gsap.registerPlugin(SplitText);
      } catch (e) {}
    }

    // 10. Lenis Smooth Scrolling
    if (typeof Lenis !== "undefined") {
      try {
        document.documentElement.style.height = "auto";
        const lenis = new Lenis({
          smooth: true,
          lerp: 0.1,
          wheelMultiplier: 1,
          infinite: false
        });

        if (typeof ScrollTrigger !== "undefined") {
          lenis.on("scroll", ScrollTrigger.update);
        }

        gsap.ticker.add((time) => {
          lenis.raf(time * 1000);
        });
        gsap.ticker.lagSmoothing(0);

        function raf(time) {
          lenis.raf(time);
          requestAnimationFrame(raf);
        }
        requestAnimationFrame(raf);
      } catch (e) {
        console.log("Lenis notice:", e);
      }
    }

    // 11. Hero Banner Text Appear with SplitText
    const bannerTexts = document.querySelectorAll("[banner-text-appear]");
    if (bannerTexts.length > 0) {
      if (typeof SplitText !== "undefined") {
        try {
          const tl = gsap.timeline({ defaults: { ease: "power3.out" } });
          bannerTexts.forEach((el, i) => {
            el.style.visibility = "visible";
            el.style.opacity = "1";
            const split = new SplitText(el, { type: "lines", linesClass: "split-line" });
            gsap.set(el, { perspective: 2000, visibility: "visible" });
            tl.from(
              split.lines,
              {
                opacity: 0,
                yPercent: 100,
                rotationX: -20,
                transformOrigin: "50% 100% -20",
                duration: 0.8,
                stagger: 0.08,
                force3D: true
              },
              i === 0 ? 0 : "-=0.4"
            );
          });
        } catch (err) {
          bannerTexts.forEach((el) => {
            el.style.visibility = "visible";
            gsap.fromTo(el, { opacity: 0, y: 25 }, { opacity: 1, y: 0, duration: 0.8, ease: "power2.out" });
          });
        }
      } else {
        bannerTexts.forEach((el) => {
          el.style.visibility = "visible";
          gsap.fromTo(el, { opacity: 0, y: 25 }, { opacity: 1, y: 0, duration: 0.8, ease: "power2.out" });
        });
      }
    }

    // 12. Hero Banner Appear (cards, buttons, tags)
    const bannerAppears = document.querySelectorAll("[banner-appear]");
    if (bannerAppears.length > 0) {
      gsap.fromTo(
        bannerAppears,
        { opacity: 0, y: 30 },
        {
          opacity: 1,
          y: 0,
          duration: 0.7,
          delay: 0.35,
          ease: "power2.out",
          stagger: 0.12
        }
      );
    }

    // 13. Banner Image Zoom/Scale
    const bannerImg = document.querySelector('[banner-image="1"]');
    if (bannerImg) {
      gsap.set(bannerImg, {
        scale: 1.25,
        skewX: -2,
        skewY: -1,
        transformPerspective: 2000,
        transformOrigin: "50% 50%"
      });
      gsap.to(bannerImg, {
        scale: 1.05,
        skewX: 0,
        skewY: 0,
        transformPerspective: 2000,
        duration: 2.2,
        ease: "power2.out"
      });
    }

    // 14. ScrollTrigger Text & Card Appearance
    if (typeof ScrollTrigger !== "undefined") {
      const textAppears = document.querySelectorAll("[text-appear], [story-text], [detail-text]");
      textAppears.forEach((elem) => {
        elem.style.visibility = "visible";
        gsap.fromTo(
          elem,
          { opacity: 0, y: 25 },
          {
            opacity: 1,
            y: 0,
            duration: 0.75,
            ease: "power2.out",
            scrollTrigger: {
              trigger: elem,
              start: "top 92%",
              toggleActions: "play none none none"
            }
          }
        );
      });

      const appearCards = document.querySelectorAll("[appear], [grow], [leaf-appear], .fda-about-v8-card-v2, .fda-wedding-card, [wedding-card-1], [wedding-card-2], [wedding-card-3], [wedding-card-4], [wedding-card-5]");
      appearCards.forEach((elem) => {
        elem.style.visibility = "visible";
        gsap.fromTo(
          elem,
          { opacity: 0, y: 35 },
          {
            opacity: 1,
            y: 0,
            duration: 0.85,
            ease: "power2.out",
            scrollTrigger: {
              trigger: elem,
              start: "top 90%",
              toggleActions: "play none none none"
            }
          }
        );
      });

      // Counters [data-counter]
      const counters = document.querySelectorAll("[data-counter]");
      counters.forEach((counter) => {
        const value = counter.getAttribute("data-counter");
        const target = parseFloat(value);
        const suffix = value.replace(/[0-9.]/g, "");
        const obj = { val: 0 };

        gsap.to(obj, {
          val: target,
          duration: 2,
          ease: "power1.out",
          scrollTrigger: {
            trigger: counter,
            start: "top 88%",
            toggleActions: "play none none none"
          },
          onUpdate: () => {
            counter.innerText = Math.floor(obj.val) + suffix;
          }
        });
      });
    }
  }

  // 15. Continuous Smooth Marquee Tickers with Speed Control
  const marqueeParents = new Set();
  const allMarquees = document.querySelectorAll(
    "[data-40='marquee-left'], [data-90='marquee-left'], [data-60='marquee-left'], [data-20='marquee-left'], [data-30='marquee-right'], [data-30='marquee-left'], [data-50='marquee-left'], [data-50='marquee-right'], [data-40='marquee-right'], [data-60='marquee-right']"
  );

  allMarquees.forEach((m) => {
    if (m.parentElement) {
      marqueeParents.add(m.parentElement);
    }
  });

  marqueeParents.forEach((parent) => {
    const items = Array.from(parent.children).filter((child) => {
      return (
        child.hasAttribute("data-40") ||
        child.hasAttribute("data-90") ||
        child.hasAttribute("data-60") ||
        child.hasAttribute("data-20") ||
        child.hasAttribute("data-30") ||
        child.hasAttribute("data-50")
      );
    });

    if (items.length === 0) return;

    const firstItem = items[0];
    let isRight = false;
    let speedVal = 40;

    for (let attr of ["data-20", "data-30", "data-40", "data-50", "data-60", "data-90"]) {
      if (firstItem.hasAttribute(attr)) {
        speedVal = parseInt(attr.replace("data-", "")) || 40;
        if (firstItem.getAttribute(attr) === "marquee-right") {
          isRight = true;
        }
      }
    }

    parent.style.display = "flex";
    parent.style.flexWrap = "nowrap";
    parent.style.overflow = "hidden";
    parent.style.width = "100%";

    items.forEach((it) => {
      it.style.flex = "0 0 auto";
      it.style.display = "flex";
      it.style.flexWrap = "nowrap";
      it.style.willChange = "transform";
    });

    // Control speed smoothly (duration in seconds)
    // Higher speedVal = faster (shorter duration)
    // e.g., data-40 = 35s, data-20 = 65s, data-60 = 24s, data-90 = 16s
    const duration = 1400 / speedVal;

    if (typeof gsap !== "undefined") {
      let tween;
      if (isRight) {
        gsap.set(items, { xPercent: -100 });
        tween = gsap.to(items, {
          xPercent: 0,
          repeat: -1,
          duration: duration,
          ease: "none"
        });
      } else {
        gsap.set(items, { xPercent: 0 });
        tween = gsap.to(items, {
          xPercent: -100,
          repeat: -1,
          duration: duration,
          ease: "none"
        });
      }

      parent.addEventListener("mouseenter", () => tween && tween.pause());
      parent.addEventListener("mouseleave", () => tween && tween.play());
    } else {
      // High performance requestAnimationFrame fallback with delta-time
      let x = isRight ? -100 : 0;
      let lastTime = performance.now();
      let isPaused = false;

      parent.addEventListener("mouseenter", () => (isPaused = true));
      parent.addEventListener("mouseleave", () => {
        isPaused = false;
        lastTime = performance.now();
      });

      function step(now) {
        if (!isPaused) {
          const delta = (now - lastTime) / 1000;
          const move = (100 / duration) * delta;
          if (isRight) {
            x += move;
            if (x >= 0) x = -100;
          } else {
            x -= move;
            if (x <= -100) x = 0;
          }
          items.forEach((it) => {
            it.style.transform = `translate3d(${x}%, 0px, 0px)`;
          });
        }
        lastTime = now;
        requestAnimationFrame(step);
      }
      requestAnimationFrame(step);
    }
  });

  // 16. Background Video Controls
  const videoControls = document.querySelectorAll("[data-w-bg-video-control='true']");
  videoControls.forEach((btn) => {
    btn.addEventListener("click", function () {
      const container = btn.closest(".w-background-video");
      if (!container) return;
      const vid = container.querySelector("video");
      if (!vid) return;
      const pauseIcons = btn.querySelectorAll("span:first-child");
      const playIcons = btn.querySelectorAll("span:last-child");

      if (vid.paused) {
        vid.play();
        pauseIcons.forEach((p) => (p.hidden = false));
        playIcons.forEach((p) => (p.hidden = true));
      } else {
        vid.pause();
        pauseIcons.forEach((p) => (p.hidden = true));
        playIcons.forEach((p) => (p.hidden = false));
      }
    });
  });
});