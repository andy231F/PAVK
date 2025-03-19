allLink = document.querySelectorAll("a");
panel = document.querySelector(".AnimationPannel");

console.log(panel);

panel.classList.remove("pannelIn");
panel.classList.add("pannelOut");

allLink.forEach((link) => {
  link.onclick = (e) => {
    e.preventDefault();

    panel.classList.remove("pannelIn");
    panel.classList.add("pannelIn");

    setTimeout(function () {
      window.location.href = link.href;
    }, 400);
  };
});

