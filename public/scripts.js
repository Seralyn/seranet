"use strict";

// TODO MAKE THIS WORK

window.onscroll = function () {
  phaseThroughContent();
};

function phaseThroughContent() {
  if (
    document.body.scrollTop > 100 ||
    document.documentElement.scrollTop > 100
  ) {
    document.querySelector("#sectionOne").className = "hidden2";
  } else {
    document.querySelector("#sectionOne").className = "";
  }
}
