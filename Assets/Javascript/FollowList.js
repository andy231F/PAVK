let AbonneButton = document.querySelector('#abonnés');
let AbonnementButton = document.querySelector('#abonnement');

let listAbonnement = document.querySelector('#listabonnement');
let listAbonnee = document.querySelector('#listabonne');

let Modal = document.querySelector('#FollowModal');


AbonneButton.onclick = () => {
    openModal(1)
};
AbonnementButton.onclick = () => {
    openModal(2)
};



function openModal(int){
    if(int == 1){
        Modal.querySelector('h3').innerText = "Abonné.es";
        listAbonnee.classList.remove('hidden');
        listAbonnement.classList.add('hidden');
    }else{
        Modal.querySelector('h3').innerText = "Abonnement"
        listAbonnement.classList.remove('hidden');
        listAbonnee.classList.add('hidden');
    }
    Modal.classList.remove('hidden')
}

function closeModal(){
    Modal.classList.add('hidden');
}

document.body.addEventListener('click',(e) =>{
    if(e.target.id == "FollowModal"){
        closeModal()
    }
})
