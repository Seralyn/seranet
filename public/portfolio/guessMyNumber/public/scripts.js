"use strict";

// VARIABLE DECLARATIONS BEGIN
let secretNumber = Math.trunc(Math.random() * 20 + 1);
let score = 20;
let highScore = 0;
// VARIABLE DECLARATIONS END

// FUNCTION DEFS START
const displayMessage = function (message) {
  document.querySelector(".message").textContent = message;
};

const guessNumber = function () {
  const guess = Number(document.querySelector(".guess").value);

  // When there is no input
  if (!guess) {
    displayMessage(`No number entered 💔`);

    //If the player wins
  } else if (guess === secretNumber) {
    document.querySelector(
      ".message"
    ).textContent = `Good job, you got it~! 💜💙💛💚`;
    document.querySelector("body").style.backgroundColor = "#60b347";
    document.querySelector(".number").style.width = "30rem";
    document.querySelector(".number").textContent = secretNumber;
    if (score > highScore) {
      highScore = score;
      document.querySelector(".highscore").textContent = highScore;
    }
  } else if (guess !== secretNumber) {
    if (score > 1) {
      document.querySelector(".message").textContent =
        guess > secretNumber
          ? `Too High, dayo. 📈`
          : `Tooooo low. Up you goooo~ 📉`;
      score--;
      document.querySelector(".score").textContent = score;
    } else {
      displayMessage(`You Lost... 😩`);
      document.querySelector("body").style.backgroundColor = "red";
      document.querySelector(".score").textContent = 0;
    }
  }
};

const restoreToDefault = function () {
  document.querySelector(".number").style.width = "15rem";
  document.querySelector(".number").textContent = "?";
  document.querySelector("body").style.backgroundColor = "#222";
  displayMessage("Start guessing...");
  document.querySelector(".guess").value = "";
  secretNumber = Math.trunc(Math.random() * 20 + 1);
  score = 20;
  document.querySelector(".score").textContent = score;
};

// FUNCTION DEFS END

document.querySelector(".check").addEventListener("click", guessNumber);
document.querySelector(".again").addEventListener("click", restoreToDefault);
