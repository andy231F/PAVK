let likesButtons = document.querySelectorAll('.compteur_like');
let retweetButtons = document.querySelectorAll('.compteur_retweet');



likesButtons.forEach(e => {
        e.addEventListener("click", () => {
            like(e);
        })
        checkLike(e);
});


retweetButtons.forEach(e => {
    e.addEventListener("click", () => {
        retweet(e);
    })
    checkRetweet(e);
});




function checkRetweet(tweet){
    let xml = new XMLHttpRequest();
    let id = tweet.querySelector('span').innerText;
    xml.open("GET", "Models/retweetModel.php?id="+id, false);
    xml.send();
    if(xml.responseText != "false"){
        tweet.classList.add('clickedGreen')
    }
}

function checkLike(tweet){
    let xml = new XMLHttpRequest();
    let id = tweet.querySelector('span').innerText;
    xml.open("GET", "Models/likeModel.php?id="+id, false);
    xml.send();
    if(xml.responseText != "false"){
        tweet.classList.add('clicked')
    }
}



function retweet(bouton){

    let xml = new XMLHttpRequest();
    let id = bouton.querySelector('span').innerText;
    xml.open("POST", "Models/retweetModel.php", false);
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    
    let p = bouton.querySelector('p');
    let compte = parseInt(p.innerText);
    if(bouton.classList.contains('clickedGreen')){
        xml.send("supp="+id);
        let resp = xml.responseText;
        bouton.classList.remove('clickedGreen')
        p.innerText = compte-1;
    }else{
        xml.send("add="+id);
        let resp = xml.responseText;
        
        bouton.classList.add('clickedGreen')
        p.innerText = compte+1;
    }
}


function like(bouton){

    let xml = new XMLHttpRequest();
    let id = bouton.querySelector('span').innerText;
    xml.open("POST", "Models/likeModel.php", false);
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    
    let p = bouton.querySelector('p');
    let compte = parseInt(p.innerText);
    if(bouton.classList.contains('clicked')){
        xml.send("supp="+id);
        let resp = xml.responseText;
        bouton.classList.remove('clicked')
        p.innerText = compte-1;
    }else{
        xml.send("add="+id);
        let resp = xml.responseText;
        
        bouton.classList.add('clicked')
        p.innerText = compte+1;
    }
}

