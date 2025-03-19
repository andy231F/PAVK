
let inputs = document.querySelectorAll('input');

let openned = false;
let offset = 0;
let valeur = '';
let type = ''

inputs.forEach(input => {
        //wrap les input dans une div 
        var parent = input.parentNode;
        var wrapper = document.createElement('div');
        wrapper.classList.add('relative','AutoCompleteCountainer');
        parent.replaceChild(wrapper, input);
        wrapper.appendChild(input)

    input.addEventListener( ('input') ,(e) =>{
        let lastletter = input.value[input.value.length-1];

            if(lastletter == " " && openned){
                ValidProposition(input,valeur,offset);
            }
            if(openned){
                requestAjax(input,type,wrapper)
            }
            if(lastletter == "#"){
                offset = input.value.length;
                openned = true;
                type = 'hashtag';
                requestAjax(input,type,wrapper)
            }
            if(lastletter == "@"){
                offset = input.value.length;
                openned = true;
                type = 'profil';
                requestAjax(input,type,wrapper)
            }
            if(input.selectionStart < offset){
                ValidProposition(input,'',offset);
            }
            

    })
});


function requestAjax(input,type,wrapper){

        let Entry = input.value.substr(offset,input.value.length-1);

        let xml = new XMLHttpRequest();
        xml.open("POST", "Models/AutoComplete.php", false);
        xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        if(type == 'hashtag'){
            xml.send("hashtag="+Entry);
        }
        if(type == 'profil'){
            xml.send("profil="+Entry);
        }
        let reponse = JSON.parse(xml.responseText);

        let prevs = document.querySelectorAll('.proposition');
        prevs.forEach(div => {
            div.remove();
        });


        let div = document.createElement('div');
        div.classList.add('proposition','left-0','w-full','absolute','z-10','bg-white','dark:bg-dark','dark:text-white','border',"cursor-pointer");
        for (let i = 0; i < reponse.length; i++) {
            let p = document.createElement('p');
            p.classList.add('dark:text-white','dark:bg-black','p-2','hover:bg-black',"hover:text-white","dark:hover:bg-white",'dark:hover:text-black')
            p.innerHTML+= reponse[i]['name'];
            p.onclick = () =>{
                ValidProposition(input,p.innerHTML,offset)
            }
            div.appendChild(p);
            if(i == 0){
                valeur = reponse[i]['name'];
            }
        }
        margin = input.selectionStart;
        wrapper.appendChild(div)
}


function ValidProposition(input,value,startpos){
    input.value = input.value.substr(0,startpos)+value;
    let prevs = document.querySelectorAll('.proposition');
    prevs.forEach(div => {
        div.remove();
    });
    openned = false;
}