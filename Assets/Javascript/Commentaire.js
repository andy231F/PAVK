let allTweets = document.querySelectorAll('.tweet');


allTweets.forEach(tweet => {
    tweet.querySelector('.compteur_reponse').addEventListener('click',()=>{
        OpenModal(tweet);
    })
    tweet.querySelector('.reponse_input').addEventListener('keypress',(e)=>{
        if(e.key == 'Enter'){
            if(tweet.querySelector('.reponse_input').value != ''){
                sendComment(tweet.querySelector('.reponse_input'),tweet)
            }
        }
    })
});



for (let i = 0; i < allTweets.length; i++) {
    allTweets[i].style.animationDelay = i/10+"s";
}

function OpenModal(tweet) {
    box = tweet.querySelector('.tweet_response');
    if(box.classList.contains('hidden')){
        box.classList.remove('hidden');
    }else{
        box.classList.add('hidden');
    }
}

function sendComment(input,tweet){
    let comment = input.value;
    let id = tweet.querySelector('.compteur_retweet').querySelector('span').innerText;

    let xml = new XMLHttpRequest();
    xml.open("POST", "Models/CommentaireModel.php", false);
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send("id="+id+"&content="+comment);
    let reponse = (xml.responseText);

    reponseBox = tweet.querySelector('.tweet_response');

    addCommentHTML(reponse,reponseBox);
    
    nombreBox = tweet.querySelector('.compteur_reponse').querySelector('p');
    nombreBox.innerText = parseInt(nombreBox.innerText)+1;


    input.value = "";

}

function addCommentHTML(reponse,reponseBox){

    data = JSON.parse(reponse);

    let myComment = document.createElement('div');
    myComment.classList.add('infouser', 'flex', 'items-end', 'gap-5','mt-8');

        let imgProfil = document.createElement('img');
        imgProfil.alt = "photo de lutilisateur";
        imgProfil.classList.add('rounded-full', 'w-8', 'h-8', 'object-cover', 'bg-gray-300' ,'border-1');
        imgProfil.src = data.picture;

        let span = document.createElement('span');
        span.classList.add('text-black', 'dark:text-white', 'font-semibold');
        span.innerHTML = data.displayname ?? "";

        let a = document.createElement('a');
        a.classList.add('text-zinc-400',  'font-medium','hover:text-red-600');
        a.href = "/user?user="+data.username;
        a.innerHTML = "@"+data.username;

        myComment.appendChild(imgProfil);
        myComment.appendChild(span);
        myComment.appendChild(a);

    let reponseDiv = document.createElement('div');
    reponseDiv.classList.add('reponse');
        
        let p = document.createElement('p');
        p.classList.add('text-sm', 'm-4','dark:text-white');
        p.innerHTML = data.comment;

        reponseDiv.appendChild(p)

    reponseBox.appendChild(myComment);
    reponseBox.appendChild(reponseDiv);
    
}
