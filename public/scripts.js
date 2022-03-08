"use strict";
// document.querySelectorAll("*").forEach(function (elem) {
//   elem.addEventListener("scroll", function () {
//     console.log(this);
//   });
// });

// document.onscroll.preventDefault();

// TODO MAKE THIS WORK

// document.onscroll = function () {
//   phaseThroughContent();
// };

// function phaseThroughContent() {
//   if (document.body.scrollTop > 1 || document.documentElement.scrollTop > 1) {
//     document.querySelector("#sectionOne").className = "hidden";
//     document.querySelector("#sectionTwo").className = "";
//     console.log(`attempting to hide section one and show section two`);
//   } else if (document.body.scrollB) {
//     document.querySelector("#sectionOne").className = "";
//     console.log(`attempting to show section One`);
//   }
// }

// ---------------------ANOTHER SCROLL DETECT OPTION--------------------------------
var lastScrollTop = 0;

// element should be replaced with the actual target element on which you have applied scroll, use window in case of no target element.
window.addEventListener(
  "scroll",
  function () {
    // or window.addEventListener("scroll"....
    var st = window.pageYOffset || document.documentElement.scrollTop;
    if (st > lastScrollTop) {
      document.querySelector("#sectionOne").className = "hidden";
      document.querySelector("#sectionTwo").className = "";
    } else {
      document.querySelector("#sectionTwo").className = "hidden";
      document.querySelector("#sectionOne").className = "";
    }
    lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
  },
  false
);
