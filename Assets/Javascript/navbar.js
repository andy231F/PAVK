let navbar = document.querySelector('.navbar');
let lignes = navbar.querySelectorAll('a');

for (let i = 0; i < lignes.length; i++) {
    lignes[i].style.animationDelay = (i*0.1)+"s";
}
navbar.querySelector('.toggleBar').style.animationDelay = (lignes.length*0.1)+"s";