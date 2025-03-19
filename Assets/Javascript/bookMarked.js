let bookMarkedButtons = document.querySelectorAll(".bookMarked");

bookMarkedButtons.forEach((e) => {
  e.addEventListener("click", () => {
    bookmark(e);
  });
  checkBookmark(e);
});


function checkBookmark(tweet) {
  let xml = new XMLHttpRequest();
  let id = tweet.querySelector("span").innerText;
  xml.open("GET", "Models/bookmarkedModel.php?id=" + id, false);
  xml.send();
  if (xml.responseText != "false") {
    tweet.classList.add("clickedBlue");
  }
}

function bookmark(bouton) {
  let xml = new XMLHttpRequest();
  let id = bouton.querySelector("span").innerText;
  xml.open("POST", "Models/bookmarkedModel.php", false);
  xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  if (bouton.classList.contains("clickedBlue")) {
    xml.send("supprimer=" + id);
    let resp = xml.responseText;
    bouton.classList.remove("clickedBlue");
  } else {
    xml.send("add=" + id);
    let resp = xml.responseText;

    bouton.classList.add("clickedBlue");
  }
}
