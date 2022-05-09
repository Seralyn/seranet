// ----------- SCROLL ANIMATION LOGIC -------------

gsap.registerPlugin(ScrollTrigger);

function init() {
  // FADE OUT FIRST CARD
  gsap.to("#sectionOneContentContainer", {
    autoAlpha: 0,
    className: "shadow-md",
    scrollTrigger: {
      trigger: "#sectionOneContainer",
      start: "top top", //top of trigger element (#intro in this case) is at the top of the viewport
      end: "bottom center+=100",
      scrub: true,
    },
  });

  // FADE IN SERALYN PHOTO AND TEXT
  gsap.from([".seraPhoto", "#sectionTwoContainer h1"], {
    autoAlpha: 0,
    scrollTrigger: {
      trigger: "#sectionTwoContainer",
      start: "top top", //top of trigger element (#intro in this case) is at the top of the viewport
      end: "bottom center",
      pin: true,
      scrub: true,
    },
  });

  // PIN TEXT ABOUT WEBSITE EXAMPLES
  gsap.from("#sectionFourContentContainer .itsFunCard", {
    opacity: 0,
    scrollTrigger: {
      trigger: "#sectionFourContainer",
      start: "top top", //top of trigger element (#intro in this case) is at the top of the viewport
      end: "bottom center",
      pin: true,
      scrub: true,
    },
  });

  // PLACE .DOCARDS UNDER 'WHAT I DO' TEXT
  ScrollTrigger.batch(".doCard", {
    // interval: 0.1, // time window (in seconds) for batching to occur.
    // batchMax: 3,   // maximum batch size (targets)
    onEnter: (batch) =>
      gsap.from(batch, {
        autoAlpha: 0,
        stagger: 0.4,
        xPercent: -10,
        yPercent: -10,
        duration: 0.3,
        delay: 0.3,
        ease: "power1.in",
      }),
    // also onLeave, onEnterBack, and onLeaveBack
    // also most normal ScrollTrigger values like start, end, etc.
  });

  // PIN WEBSITE THUMBS AND THEN ENLARGE AND FADE THEM
  ScrollTrigger.batch([".portfolioSiteThumb", ".frameworkBadge"], {
    // interval: 0.1, // time window (in seconds) for batching to occur.
    // batchMax: 3,   // maximum batch size (targets)
    onEnter: (batch) =>
      gsap.from(batch, {
        autoAlpha: 0,
        // xPercent: -10,
        // scale: 3,
        duration: 0.5,
        delay: 0.2,
        ease: "power1.in",
        stagger: 0.1,
        pin: true,
      }),
    // also onLeave, onEnterBack, and onLeaveBack
    // also most normal ScrollTrigger values like start, end, etc.
  });

  // ANIMATE LANGUAGES SECTION
  gsap.from("#sectionSixContainer .lang-card", {
    autoAlpha: 0,
    xPercent: -20,

    scrollTrigger: {
      trigger: "#sectionSixContainer",
      start: "top center", //top of trigger element (#intro in this case) is at the top of the viewport
      end: "top top",
      scrub: true,

      // pin: true
    },
  });

  gsap.from("#sectionSevenContainer .frameworkLogo", {
    autoAlpha: 0,
    xPercent: -20,

    scrollTrigger: {
      trigger: "#sectionSevenContainer",
      start: "top center", //top of trigger element (#intro in this case) is at the top of the viewport
      end: "top top",
      scrub: true,

      // pin: true
    },
  });

  gsap.from("#sectionEightContainer", {
    autoAlpha: 0,
    xPercent: -15,

    scrollTrigger: {
      trigger: "#sectionEightContainer",
      start: "top center", //top of trigger element (#intro in this case) is at the top of the viewport
      end: "top top",
      scrub: true,

      // pin: true
    },
  });
}

window.addEventListener("load", function () {
  init();
});
