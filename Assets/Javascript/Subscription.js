let panneauInscription = document.querySelector('#panneauInscription');
let panneauLogo = document.querySelector('#panneauLogo');
let suivantButton = document.querySelector('#suivantButton');

let allPanneau1 = document.querySelectorAll('.panneau1');
let allPanneau2 = document.querySelectorAll('.panneau2');

let h2Inscription = document.querySelector('#h2Inscription');
document.body.style.backgroundColor ="white";


suivantButton.onclick = () => {
    panneauInscription.classList.remove('gauche')
    panneauLogo.classList.remove('droite')
    panneauInscription.classList.add('droite')
    panneauLogo.classList.add('gauche')

    document.body.style.backgroundColor ="black";
    panneauInscription.style.backgroundColor ="white";
    panneauLogo.style.backgroundColor ="white";

    h2Inscription.style.color ="black";



    setTimeout(() => {
        allPanneau1.forEach(element => {
            element.classList.add('hidden')
        });
        allPanneau2.forEach(element => {
            element.classList.remove('hidden')
        });
    }, 300);
    


}

allPanneau2.forEach(element => {
    element.classList.add('hidden')
});


