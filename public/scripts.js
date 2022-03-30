// ----------- SCROLL ANIMATION LOGIC -------------

gsap.registerPlugin(ScrollTrigger);

function init() {
  // gsap.from("#sectionOneContainer", {
  //   duration: 1,
  //   //   y: -40,
  //   opacity: 0,
  //   ease: "none",
  // });

  // CHANGE BG FROM WHITE TO GRADIENT
  const beginningTL = gsap.timeline();

  beginningTL
    // .from("body", {
    //   ease: "power1.in",
    //   duration: 2,
    //   backgroundColor: "black",
    // })
    .to("body", {
      className: "seranetBG",
      duration: 4,
    });
  // .from("#introCard", {
  //   autoAlpha: 0,
  //   ease: none,
  //   xPercent: -10,
  //   duration: 1.3,
  // });

  // FADE OUT FIRST CARD
  gsap.to("#sectionOneContentContainer", {
    autoAlpha: 0,
    className: "shadow-md",
    scrollTrigger: {
      trigger: "#sectionOneContainer",
      start: "top top", //top of trigger element (#intro in this case) is at the top of the viewport
      end: "bottom center+=100",
      scrub: true,
      markers: true,
    },
  });

  // FADE IN SERALYN PHOTO AND TEXT
  gsap.from(["#seraPhoto", "#sectionTwoContainer h1"], {
    autoAlpha: 0,
    scrollTrigger: {
      trigger: "#sectionTwoContainer",
      start: "top top", //top of trigger element (#intro in this case) is at the top of the viewport
      end: "bottom center",
      pin: true,
      scrub: true,
      markers: true,
    },
  });

  // PIN TEXT ABOUT WEBSITE EXAMPLES
  gsap.from("#sectionFourContentContainer .card", {
    opacity: 0,
    scrollTrigger: {
      trigger: "#sectionFourContainer",
      start: "top top", //top of trigger element (#intro in this case) is at the top of the viewport
      end: "bottom center",
      pin: true,
      scrub: true,
      markers: true,
    },
  });
}

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
      delay: 0.5,
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
      opacity: 0,
      // xPercent: -10,
      scale: 3,
      duration: 0.5,
      delay: 1.5,
      ease: "power1.in",
      stagger: 0.1,
      pin: true,
    }),
  // also onLeave, onEnterBack, and onLeaveBack
  // also most normal ScrollTrigger values like start, end, etc.
});

// const doCardsThumbsTL = gsap.timeline();

// doCardsThumbsTL
//   .from("#codeCard", {
//     ease: "power1.in",
//     opacity: 0,
//     duration: 0.8,
//     xPercent: -5,
//     stagger: 0.5,
//   })
//   .from("#webDesignCard", {
//     ease: "power1.in",
//     opacity: 0,
//     duration: 0.8,
//     xPercent: -5,
//     stagger: 0.5,
//   })
//   .from("#castingCard", {
//     ease: "power1.in",
//     opacity: 0,
//     duration: 0.8,
//     xPercent: -5,
//     stagger: 0.5,
//   })
//   .from("#photographyCard", {
//     ease: "power1.in",
//     opacity: 0,
//     duration: 0.8,
//     xPercent: -5,
//     stagger: 0.5,
//   });

window.addEventListener("load", function () {
  init();
});
