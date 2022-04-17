async function getData() {
  let response = await fetch("https://icanhazdadjoke.com/", {
    method: "GET",
    headers: {
      Accept: "text/plain",
      "Content-Type": "text/plain",
    },
  });
  if (response.status === 200) {
    let data = await response.text();
    console.log(data);
    const app = document.querySelector(".root");
    app.textContent = data;
  }
}

getData();

document.querySelector("#runAgain").addEventListener("click", getData);
