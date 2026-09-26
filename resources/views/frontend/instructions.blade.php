<!DOCTYPE html><!-- This site was created in Webflow. https://webflow.com --><!-- Last Published: Mon Jul 27 2026 04:27:14 GMT+0000 (Coordinated Universal Time) --><html data-wf-domain="knotcraft.webflow.io" data-wf-page="6a6305be5040b777232a1402" data-wf-site="6a6305be5040b777232a1422" lang="en"><head><meta charset="utf-8"/><link href="https://cdn.prod.website-files.com" rel="preconnect" /><title>Knotcraft - GSAP Setup Instructions</title><meta content="ead our user guide for simple, step-by-step instructions on customizing your wedding template. Learn how to edit text, swap photos, and go live fast." name="description"/><meta content="Knotcraft - GSAP Setup Instructions" property="og:title"/><meta content="ead our user guide for simple, step-by-step instructions on customizing your wedding template. Learn how to edit text, swap photos, and go live fast." property="og:description"/><meta content="{{ asset('images/6a55f9eed1559bc4c6522ae5_Site-graph-image.avif') }}" property="og:image"/><meta content="Knotcraft - GSAP Setup Instructions" name="twitter:title"/><meta content="ead our user guide for simple, step-by-step instructions on customizing your wedding template. Learn how to edit text, swap photos, and go live fast." name="twitter:description"/><meta content="{{ asset('images/6a55f9eed1559bc4c6522ae5_Site-graph-image.avif') }}" name="twitter:image"/><meta property="og:type" content="website"/><meta content="summary_large_image" name="twitter:card"/><meta content="width=device-width, initial-scale=1" name="viewport"/><meta content="Webflow" name="generator"/><link href="{{ asset('css/knotcraft.webflow.shared.3f78cfc4d.css') }}" rel="stylesheet" type="text/css"  /><style>html.w-mod-js:not(.w-mod-ix3) :is(.fda-megamenu-iocn, [banner-text="v1"], [banner-text-appear-old], .fda-wedding-top-layer, [best-wedding-description="v1"], .fda-team-data, .fda-team-bottom-strip, [loader-banner-image], [grow], .fda-gallery-inner-layer-box, .fda-gallery-icon, [nav-drop-menu], .fda-nav-menu-line, .fda-nav-menu-arrow-holder, [appear], [detail-text], .fda-details-paragraph-overflow.fda-active, .fda-planning-card.fda-2, .fda-planning-card.fda-3, .fda-planning-card-wrap, .fda-destinations-card-image, .fda-move-image, [banner-image-old="1"], .fda-story-box.fda2, [story-text-v2], [story-box-v2], .fda-story-bg-image.fda-2, .fda-story-box.fda3, [story-text], [story-box], .fda-story-bg-image.fda-3, .fda-story-line, .fda-wedding-card, [wedding-card-1], [wedding-card-3], [wedding-card-5], [wedding-card-2], [wedding-card-4], .fda-moments-image, .fda-booking-form-box, .fda-bookng-form, .fda-details-bottom-item-image, [data-30="marquee-right"], .fda-moments-bg-image-box.fda-active, .fda-moments-bg-image-box, .fda-moments-card-top-box, .fda-moments-card-top-box.fda-text-center.fda-active, .fda-monitor-box.fda-radius, .fda-monitor-box-v2.fda-radius, .fda-service-point-line, .fda-catalog-card.fda-1, .fda-catalog-card.fda-2, .fda-catalog-card-holder, .fda-footer-big-text-v2, .fda-footer-big-text-logo, [banner-text-appear-v2], [data-90="marquee-left"], [banner-flower], [ripple-1], [ripple-2], [ripple-3], [fda-button-v2-line], [data-40="marquee-left"], .fda-footer-underline, .fda-icon-1, .fda-icon-2, [data-20="marquee-left"], .fda-image-layer, .fda-venue-destinations-image, [data-60="marquee-left"], [story-box-1], .fda-story-v2-sticky, .fda-story-box.fda-1, .fda-story-content-v2, [social-hover="v1"], [appear-tab], [text-appear], .fda-moment-card.fda-radius.fda-overflow-hidden, .fda-moment-card-v2, .fda-moment-card-v3, .fda-moment-small-card.fda-3, .fda-moment-small-card.fda-2, .fda-button-overlay, .fda-button-text.fda-2, [leaf-appear], .fda-moment-inner-line-1, .fda-moment-image-1, .fda-moment-image-2, .fda-slider-number-1, .fda-slider-number-2, .fda-highlight-number, .fda-highlight-number-v2, .fda-highlight-number-v3, .fda-highlight-number-v4, .fda-moment-inner-line-2, .fda-moment-image-3, .fda-slider-number-3, .fda-moment-inner-line-3, .fda-slider-number-4, .fda-moment-image-4, [data-wf-target*='["ef6b8d15-d3d7-3de2-c054-18dcf8057628","ef6b8d15-d3d7-3de2-c054-18dcf805764f"]'], .fda-moment-inner-line-4, .fda-moment-image-5, [nav-megamenu-hover], .fda-megamenu-dot, .fda-mega-menu-font.fda-1, .fda-mega-menu-font.fda-2, [wave-text], .fda-post-item-image, .fda-button-arrow-icon-wrapper, .fda-post-card-item-image, .fda-post-item-button-icon-wrapper, .fda-upcoming-icon-box, [banner-text-appear="v1"], .fda-event-image-hover, [banner-appear-old], [faq-answer], [faq-arrow], [faq-arrow-v2], [faq-bar], [faq-arrow-icon], .fda-recent-post-image, .fda-service-paragraph-v5, .fda-service-v3-col-2.fda-tab-display-none, .fda-service-v3-col-3.fda-tab-display-none, .fda-service-v3-col-4.fda-tab-display-none, .fda-service-v3-glow-line, .fda-service-v3-card, .fda-footer-big-text.fda-1, .fda-footer-big-text.fda-2, .fda-footer-logo-text-wrapper.fda-3, .fda-footer-big-text.fda-4, .fda-footer-big-text.fda-5, .fda-footer-big-text.fda-6, .fda-footer-big-text.fda-7, .fda-footer-big-text.fda-8, .fda-footer-big-text.fda-9, .fda-recognition-line, [fill-layer]) {visibility: hidden !important;}</style><link href="https://fonts.googleapis.com" rel="preconnect"/><link href="https://fonts.gstatic.com" rel="preconnect" /><script src="{{ asset('js/webfont.js') }}" type="text/javascript"></script><script type="text/javascript">WebFont.load({  google: {    families: ["Inter:400,500,600,700,800","Manrope:300,400,500,600,700","Playfair Display:300,400,500,600,700"]  }});</script><script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script><link href="{{ asset('images/6a6305bf5040b777232a17c9_Favicon-small.png') }}" rel="icon" type="image/png" sizes="32x32" media="(prefers-color-scheme: light)"/><link href="{{ asset('images/6a6305bf5040b777232a17c9_Favicon-small.png') }}" rel="icon" type="image/png" sizes="32x32" media="(prefers-color-scheme: dark)"/><link href="{{ asset('images/6a58830862b9f974ddc7bb7d_Favicon-small.png') }}" rel="icon" type="image/png" sizes="48x48"/><link href="{{ asset('images/6a5882fd1b2dae9c09e5d13d_favicon-big.png') }}" rel="apple-touch-icon" sizes="180x180"/><link href="{{ asset('images/6a5882fc1b2dae9c09e5d122_favicon-big.png') }}" rel="icon" type="image/png" sizes="192x192"/><link href="{{ asset('images/6a6305bf5040b777232a180f_favicon-big.png') }}" rel="icon" type="image/png" sizes="512x512"/>
<meta name="robots" content="noindex"><link rel="stylesheet" href="{{ asset('css/google-fonts.css') }}">
</head><body>@include('frontend.partials.header')
  <main><section class="fda-information-hero"><div class="w-layout-blockcontainer fda-container-medium w-container"><div class="w-layout-vflex fda-information-hero-main"><h1 banner-text="v1" class="fda-gap-none fda-color-white fda-gap-medium">GSAP guide</h1><div class="fda-hero-text-wrap"><p banner-text="v1" class="fda-gap-none fda-color-white">This template uses custom-built GSAP-powered systems to create smooth, responsive, and performant animations in Webflow. You'll find two core systems powering key interactions: one for Tabs and one for Marquees.</p></div></div></div></section><section class="fda-gsap-bottom fda-section-gap-top fda-overflow-hidden"><div class="w-layout-blockcontainer fda-container-medium w-container"><div class="fda-gsap-content"><h2 class="fda-gap-none fda-tag-gap-h2 fda-text-style-h3">ðŸ”Ž Using custom attributes</h2><p class="fda-tag-gap-h2">To activate the animations and systems in this template, all logic is driven by Custom Attributes directly inside the Webflow Designer â€” no need to touch the code.</p><div class="fda-text-style-h4 fda-tag-gap-h1">What are custom attributes?</div><p class="fda-tag-gap-h2">Custom attributes are key-value pairs you can assign to any HTML element in Webflow. They allow you to add interactivity or behaviors that connect to the code.</p><div class="fda-text-style-h4 fda-tag-gap-h2">How to add one</div><ul role="list" class="fda-tag-gap-h2"><li><div>Select the element in the Webflow Designer.</div></li><li><div>Go to the <strong>Settings Panel</strong>.</div></li><li><div>Scroll down to <strong>Custom Attributes</strong>.</div></li><li><div>Click <strong>â€œ+ Add Custom Attributeâ€</strong>.</div></li><li><div>Add the attribute name and value exactly as described in the guide (e.g. &quot;heading&quot;, &quot;heading-apearence &quot;).</div></li><li><div>Publish your site â€” the code will automatically detect these elements.</div></li></ul><div class="fda-text-style-h4 fda-tag-gap-h2">Important</div><ul role="list" class="fda-gap-none"><li><div>Attribute names must be <strong>exactly</strong> as written (lowercase, dash-separated).</div></li><li><div>These attributes do not change the element visually in Webflow â€” they act as invisible hooks for animations and interactions.</div></li></ul></div></div></section><section class="fda-gsap-bottom fda-section-gap-top fda-overflow-hidden"><div class="w-layout-blockcontainer fda-container-medium w-container"><div class="fda-gsap-content"><h2 class="fda-gap-none fda-tag-gap-h2 fda-text-style-h3">âœï¸ Heading appear</h2><div class="fda-text-style-h4 fda-gap-small">How it works</div><p class="fda-gap-small">The heading animation is powered by GSAP and connected through a custom attribute applied directly to the text element.</p><p>When the attribute <strong>banner-text-appear=&quot;&quot;</strong> is added to a heading, the script automatically :</p><ul role="list" class="fda-gap-extra-small"><li><div>Detects the element on page load.</div></li><li><div>Splits the text into characters using <strong>SplitText</strong></div></li><li><div>Animates each character from <strong>translateY(100% &rarr; 0%</strong></div></li><li><div>Fades opacity from <strong>0 â†’ 1</strong></div></li></ul><p class="fda-tag-gap-h2">The animation runs in sequence with a stagger effect, creating a smooth bottom-to-top reveal.</p><div class="fda-text-style-h4 fda-gap-small">Customization options</div><ul role="list" class="fda-tag-gap-h2"><li><div>Add the attribute <strong>banner-text-appear=&quot;&quot;</strong> to any heading element only for banner.</div></li><li><div>Add the attribute <strong>appear-text=&quot;&quot;</strong> to any heading element on banner.</div></li><li><div>The script automatically targets only elements with this attribute.</div></li><li><div>You can modify the initial transform value (<strong>e.g., 120% instead of 100%</strong>) for stronger motion.</div></li><li><div><strong>ScrollTrigger</strong> settings can be updated to control when the animation starts.</div></li></ul><div class="fda-text-style-h4 fda-gap-small">Features</div><ul role="list" class="fda-gap-none"><li><div><strong>Letter-by-letter</strong> animation using <strong>SplitText.</strong></div></li><li><div><strong>Bottom-to-top</strong> smooth reveal effect.</div></li><li><div>Attribute-based targeting (no extra classes required).</div></li><li><div>Fully customizable <strong>GSAP timeline</strong> controls.</div></li><li><div>Works on any heading element (H1â€“H6).</div></li><li><div>Clean Webflow structure with no layout breakage.</div></li></ul></div></div></section><section class="fda-gsap-bottom fda-section-gap-top fda-overflow-hidden"><div class="w-layout-blockcontainer fda-container-medium w-container"><div class="fda-gsap-content"><div class="fda-gap-none fda-tag-gap-h2 fda-text-style-h3">âœ¨ Text opacity changes while scroll</div><div class="fda-text-style-h4 fda-gap-small">How it works</div><p class="fda-gap-small">This animation is powered by <strong>GSAP + ScrollTrigger </strong>and targets elements using the custom attribute <strong>fade-heading</strong>.</p><p>When an element contains the fade-heading attribute, the script :</p><ul role="list" class="fda-gap-extra-small"><li><div>Detects it inside the <strong>trigger wrapper</strong></div></li><li><div><strong>Optionally splits</strong> the text into letters</div></li><li><div>Animates opacity from a lower value (<strong>e.g., 40%</strong>) to full visibility (<strong>100%</strong>)</div></li><li><div>Links the animation progress directly to scroll position</div></li></ul><p class="fda-gap-none">As the user scrolls downward, the text gradually fades in.</p><p class="fda-gap-none">When scrolling upward, the opacity smoothly reverses.</p><p class="fda-tag-gap-h2">The animation is scroll-synced, meaning it does not rely on time-based playback but instead follows the scrollbar movement.</p><div class="fda-text-style-h4 fda-gap-small">Customization options</div><ul role="list" class="fda-tag-gap-h2"><li><div>Add the <strong>scrolling-text=&quot;1&quot;</strong> attribute to any heading or text element.</div></li><li><div>The animation automatically applies within its <strong>trigger section</strong>.</div></li></ul><p>You can adjust the following inside the <strong>GSAP timeline</strong> :</p><ul role="list" class="fda-tag-gap-h2"><li><div><strong>Starting</strong> opacity value</div></li><li><div><strong>Ending</strong> opacity value</div></li><li><div>Stagger timing (if <strong>SplitText</strong> is enabled)</div></li><li><div><strong>ScrollTrigger</strong> start and end positions</div></li><li><div>Ease type (Linear recommended for scroll-based animations)</div></li></ul><div class="fda-text-style-h4 fda-gap-small">Features</div><ul role="list" class="fda-gap-none"><li><div><strong>Scroll-controlled opacity</strong> transition.</div></li><li><div>Smooth <strong>fade-in </strong>and <strong>fade-out</strong> effect.</div></li><li><div>Fully reversible when scrolling upward.</div></li><li><div>Attribute-based targeting (<strong>fade-heading</strong>).</div></li><li><div>Compatible with <strong>Webflow </strong>structure.</div></li></ul></div></div></section><section class="fda-gsap-bottom fda-section-gap fda-overflow-hidden"><div class="w-layout-blockcontainer fda-container-medium w-container"><div class="fda-gsap-content"><div class="fda-text-style-h3 fda-tag-gap-h2">âž¡ï¸ Marquee animation</div><div class="fda-text-style-h4 fda-gap-small">How it works</div><p class="fda-gap-small">This marquee animation is powered by GSAP and targets elements using the class name : <strong>fda-marquee-train</strong><br/></p><ul role="list" class="fda-gap-extra-small"><li><div>The active image fades from opacity The element moves horizontally from : <strong>100% &rarr; 0%</strong></div></li><li><div><strong>X: 0% &rarr; -100%</strong></div></li></ul><p class="fda-tag-gap-h2">This creates a continuous right-to-left scrolling effect.</p><div class="fda-text-style-h4 fda-gap-small">Customization options</div><ul role="list" class="fda-tag-gap-h2"><li><div>The animation targets elements using the attribute <strong>data-30=&quot;marquee-left&quot;</strong></div></li><li><div>The animation targets elements using the attribute <strong>data-40=&quot;marquee-left&quot;</strong></div></li><li><div>The animation targets elements using the attribute <strong>data-60=&quot;marquee-left&quot;</strong></div></li><li><div>The animation targets elements using the attribute <strong>data-30=&quot;marquee-right&quot;</strong></div></li><li><div>Duplicate the marquee content inside the wrapper to ensure seamless looping.</div></li></ul><p class="fda-gap-none fda-gap-small">You can modify inside the GSAP timeline :</p><ul role="list" class="fda-tag-gap-h2"><li><div>Movement direction (<strong>0% &rarr; -100% or reverse</strong>)</div></li><li><div>Duration (controls scrolling speed)</div></li><li><div>Repeat value (set to infinite for continuous loop)</div></li><li><div>Ease type (Linear recommended for constant speed)</div></li></ul><div class="fda-text-style-h4 fda-gap-small">Features</div><ul role="list" class="fda-gap-none"><li><div>Here <strong>data-30</strong> defines marquee movment speed.</div></li><li><div>Smooth horizontal marquee effect.</div></li><li><div>Infinite repeat animation.</div></li><li><div>Attribute-based targeting <strong>data-30=&quot;marque-left&quot;</strong></div></li><li><div>Fully customizable speed and direction.</div></li><li><div>No layout shifting during animation.</div></li><li><div>Optimized for performance using<strong> transform (translateX).</strong></div></li></ul></div></div></section></main>@include('frontend.partials.footer')<script src="{{ asset('js/jquery-3.5.1.min.dc5e7f18c8.js?site=6a6305be5040b777232a1422') }}" type="text/javascript"  ></script><script src="{{ asset('js/webflow.schunk.eed72d374c7ba9a2.js') }}" type="text/javascript"  ></script><script src="{{ asset('js/webflow.schunk.408c304bedb55afc.js') }}" type="text/javascript"  ></script><script src="{{ asset('js/webflow.schunk.074a11371c3f382f.js') }}" type="text/javascript"  ></script><script src="{{ asset('js/webflow.8c7e90c5.844126c509e7b4ae.js') }}" type="text/javascript"  ></script><script src="{{ asset('js/gsap.min.js') }}" type="text/javascript"></script><script src="{{ asset('js/SplitText.min.js') }}" type="text/javascript"></script><script src="{{ asset('js/ScrollTrigger.min.js') }}" type="text/javascript"></script><!-- Page Smooth Scroll -->

<script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.23/bundled/lenis.min.js"></script>
<script>
   document.documentElement.style.height = "auto";
 
  const lenis = new Lenis({
 	smooth: true,
 	lerp: 0.1,
 	wheelMultiplier: 1,
 	infinite: false
   });
 
  // Sync Lenis with GSAP ScrollTrigger
   lenis.on('scroll', ScrollTrigger.update);
 
  gsap.ticker.add((time) => {
 	lenis.raf(time * 1000);
   });
 
  gsap.ticker.lagSmoothing(0);
 
  function raf(time) {
 	lenis.raf(time);
 	requestAnimationFrame(raf);
   }
   requestAnimationFrame(raf);
</script>

<!-- Page Smooth Scroll end -->

<!-- counter start-->

<script>

gsap.registerPlugin(ScrollTrigger);

const counters = document.querySelectorAll("[data-counter]");

counters.forEach((counter) => {

  // Original value
  const value = counter.getAttribute("data-counter");

  // Extract number
  const target = parseFloat(value);

  // Extract suffix
  const suffix = value.replace(/[0-9.]/g, "");

  // Counter object
  const obj = {
    val: 0
  };

  gsap.to(obj, {

    val: target,

    duration: 2,
    ease: "power1.out",

    scrollTrigger: {
      trigger: counter,
      start: "top 85%",
      toggleActions: "play none none none"
    },

    onUpdate: () => {

      counter.innerText =
        Math.floor(obj.val) + suffix;

    }

  });

});

</script>

<!------- counter end --------->



<!--Webflow custom code: banner-text-appear-->
<!--Webflow custom code: banner-text-appear-->

<script src="{{ asset('js/SplitText.min.js') }}"></script>

<script>
(function () {
  var targets = document.querySelectorAll("[banner-text-appear]");
  if (!targets.length) return;

  function revealInstantly() {
    targets.forEach(function (el) {
      el.style.visibility = "visible";
    });
  }

  if (typeof gsap === "undefined" || typeof SplitText === "undefined") {
    revealInstantly();
    return;
  }

  var prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (prefersReducedMotion) {
    revealInstantly();
    return;
  }

  gsap.registerPlugin(SplitText);

  var GAP = ">-0.3";
  var tl = gsap.timeline({
    defaults: { ease: "power3.out" },
    onComplete: revealInstantly
  });

  targets.forEach(function (el, i) {
    var split = new SplitText(el, { type: "lines", linesClass: "split-line" });
    gsap.set(el, { perspective: 2000, visibility: "visible" });
    tl.from(
      split.lines,
      {
        opacity: 0,
        yPercent: 100,
        rotationX: -30,
        transformOrigin: "50% 100% -20",
        duration: 0.7,
        stagger: 0.08,
        force3D: true
      },
      i === 0 ? 0 : GAP
    );
  });
})();
</script>





<!--
  Webflow custom code: banner appear animation
  Matches the panel's target field: [banner-appear]
-->
 


<script>
  window.Webflow ||= [];
  window.Webflow.push(() => {
    const targets = document.querySelectorAll("[banner-appear]");

    if (targets.length) {
      gsap.set(targets, { perspective: 2000 });

      gsap.fromTo(targets, 
        { opacity: 0, y: 30 }, 
        {
          opacity: 1,
          y: 0,
          duration: 0.6,
          delay: 0.5,
          ease: "power2.out",
          stagger: {
            each: 0.2,
            from: "start"
          }
        }
      );
    }
  });
</script>



<!-- Banner image load -->

<script>
const banner = document.querySelector('[banner-image="1"]');

gsap.set(banner, {
  scale: 1.3,
  skewX: -3,
  skewY: -2,
  transformPerspective: 2000,
  transformOrigin: "50% 50%"
});

gsap.to(banner, {
  scale: 1.1,
  skewX: 0,
  skewY: 0,
  transformPerspective: 2000,
  duration: 2.5,
  delay: 0,
  ease: "power2.out"
});
</script>
<script src="{{ asset('js/custom-animations.js') }}"></script>
</body></html>
