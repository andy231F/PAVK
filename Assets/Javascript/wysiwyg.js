let submit = document.getElementById('wysiwyg');
submit = submit.querySelector('button[type="submit"]');

const style = {
    newTweet: ["relative", "flex", "flex-wrap", "items-start", "text-black", "dark:text-white"],
    avatar: ["relative", "rounded-full", "min-w-[45px]", "h-[45px]", "mr-4", "bg-emerald-50", "dark:bg-emerald-900", "text-xl", "leading-none", "font-semibold"],
    tweetArea: ["grow-1", "w-[80%]", "min-h-[80px]"],
    p: ['p-2', 'focus-visible:outline-none', "bg-emerald-50", "rounded-lg", "dark:bg-emerald-900"],
    close: ["absolute", "right-1"],
    toolbar: ['toolbar', 'flex', 'gap-2', 'mb-2', 'w-full'],
    button: ["p-2", "cursor-pointer", "rounded-full", "hover:bg-red-600/20", "active:bg-red-600/40"]
};

let mediasArray = {};
let schedule = "";

const formTweet = new FormData();

function createToolbar(active, buttons, tailwind = style) {

    let modifying = document.getElementById(active);

    let toolbar = document.createElement('div');
    toolbar.classList.add(...tailwind['toolbar']);

    for (const [button, svg] of Object.entries(buttons)) {
        if(button != 'close') {
            let newButton = document.createElement('button');
            newButton.innerHTML = svg;
            newButton.type = 'button';
            newButton.classList.add(button, ...tailwind['button']);
            toolbar.appendChild(newButton);
        }
    }

    modifying.appendChild(toolbar);

    let twtArea = modifying.querySelector('.tweetArea');

    //add date picker

    // let datetimeInput = document.createElement('input');
    // datetimeInput.id = `${active}Creation`;
    // datetimeInput.name = 'creation_date';
    // datetimeInput.type = 'datetime-local';

    // let dt = new Date();
    // let minDT = dt.toISOString();
    // minDT = minDT.substring(0, minDT.lastIndexOf("."));

    // datetimeInput.min = minDT;
    // console.log(minDT);

    // let addSchedule = modifying.getElementsByClassName('schedule')[0];
    // addSchedule.addEventListener('click', function() {
    //     datetimeInput.click();
    //     datetimeInput.onchange = () => {
    //         schedule = datetimeInput.value;
    //         console.log(schedule);
    //     }
    // });

    //add emojis

    // add images or videos or GIF

    let mediaInput = document.createElement('input');
    mediaInput.id = `${active}Medias`;
    mediaInput.name = 'medias[]';
    mediaInput.type = 'file';
    mediaInput.multiple = true;

    let addMedia = modifying.getElementsByClassName('medias')[0];

    mediasArray[active] = []; 

    let twtMedia = document.createElement('div');
    twtMedia.classList.add('tweetMedia', 'relative', 'flex', 'flex-wrap', 'py-2');
    modifying.insertBefore(twtMedia, modifying.lastElementChild);
    
    let removeMedias = close();

    addMedia.addEventListener('click', function() {
        if (mediaInput.files && mediasArray[active].length < 4) {
            mediaInput.click();
            mediaInput.onchange = (event) => {
                // console.log(mediaInput.files);

                let mediaFiles = event.target.files;
                // console.log(file);

                if(mediaFiles) {
                    for(let file of mediaFiles) {
                        mediasArray[active].push(file);
                    }
                    console.log(mediasArray);
                    for(let i = 0; i < mediaFiles.length; i++) {
                        // console.log(i);

                        let img = document.createElement('img');
                        img.src = URL.createObjectURL(mediaFiles[i]);
                        img.alt = mediaFiles.name;
                        img.style.width = '50%';
                        img.style.objectFit = 'contain';

                        twtMedia.appendChild(img);
                        console.log(mediasArray);

                    }
                    if(mediasArray[active].length > 0) {
                        twtMedia.appendChild(removeMedias);
                        removeMedias.classList.add('top-1', 'z-99');
                        removeMedias.onclick = () => {
                            mediasArray[active] = [];
                            console.log(mediasArray);
                            let imgs = twtMedia.getElementsByTagName('img');
                            imgs = Array.from(imgs);
                            imgs.forEach((img) => {
                                URL.revokeObjectURL(img.src);
                                img.remove();
                            }); //with for (let img of imgs) only one img was removed at click
                            removeMedias.remove();
                        }
                    } 
                }
            }
        }
    });

    

}

const buttons = {
    medias: '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323"><path d="M480-480ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h320v80H200v560h560v-320h80v320q0 33-23.5 56.5T760-120H200Zm40-160h480L570-480 450-320l-90-120-120 160Zm440-320v-80h-80v-80h80v-80h80v80h80v80h-80v80h-80Z"/></svg>',
    gif: '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm240-160h60v-240h-60v240Zm-160 0h80q17 0 28.5-11.5T400-400v-80h-60v60h-40v-120h100v-20q0-17-11.5-28.5T360-600h-80q-17 0-28.5 11.5T240-560v160q0 17 11.5 28.5T280-360Zm280 0h60v-80h80v-60h-80v-40h120v-60H560v240ZM200-200v-560 560Z"/></svg>',
    emojis: '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323"><path d="M620-520q25 0 42.5-17.5T680-580q0-25-17.5-42.5T620-640q-25 0-42.5 17.5T560-580q0 25 17.5 42.5T620-520Zm-280 0q25 0 42.5-17.5T400-580q0-25-17.5-42.5T340-640q-25 0-42.5 17.5T280-580q0 25 17.5 42.5T340-520Zm140 260q68 0 123.5-38.5T684-400H276q25 63 80.5 101.5T480-260Zm0 180q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Z"/></svg>',
    schedule: '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323"><path d="M120-160v-640l572 240h-12q-35 0-66 8t-60 22L200-680v140l240 60-240 60v140l216-92q-8 23-12 45.5t-4 46.5v2L120-160Zm560 80q-83 0-141.5-58.5T480-280q0-83 58.5-141.5T680-480q83 0 141.5 58.5T880-280q0 83-58.5 141.5T680-80Zm66-106 28-28-74-74v-112h-40v128l86 86ZM200-372v-308 400-92Z"/></svg>',
    close: '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>',
};

export function createNewTweet(wysiwyg, i, tailwind = style, dpLink = 'Assets/img/profiles/img_1.jpg') {

    let editor = document.getElementById(wysiwyg);

    let newTweet = document.createElement('div');
    newTweet.id = `tweet${i}`;
    newTweet.classList.add('tweetBox');
    newTweet.classList.add(...tailwind.newTweet);

    let avatar = document.createElement('div');
    avatar.classList.add('avatar');
    avatar.classList.add(...tailwind['avatar']);
    avatar.classList.add(`bg-[url(${dpLink})]`, 'bg-cover', 'bg-norepeat');
    
    newTweet.appendChild(avatar);

    let tweetArea = document.createElement('div');
    tweetArea.classList.add('relative', 'tweetArea');
    tweetArea.classList.add(...tailwind['tweetArea']);
    
    newTweet.appendChild(tweetArea);

    let p = document.createElement('p');
    p.contentEditable = 'true';
    p.classList.add(...tailwind['p']);
    tweetArea.appendChild(p);

    // let placeholder = document.createElement('span');
    // placeholder.classList.add('placeholder', 'absolute', 'top-0', 'left-0', 'p-2');
    // placeholder.innerHTML = 'Quoi de neuf ?';
    
    // tweetArea.appendChild(placeholder);

    let closeBox = close();
    newTweet.appendChild(closeBox);
    closeBox.classList.add('hidden');
    closeBox.onclick = () => { // à améliorer !
        if (tweetArea.textContent == '' && editor.childElementCount > 0) {
        // if (tweetArea.textContent == '' && newTweet.id != 'tweet1') {
            newTweet.remove();
            delete mediasArray[newTweet.id];
        }
    }

    editor.insertBefore(newTweet, editor.lastElementChild);
    p.focus();
    createToolbar(newTweet.id, buttons, style);
    togglePara(tailwind);
    setEditing(wysiwyg);
    // if(newTweet == editor.children[1]) {closeBox.classList.add('hidden'); }

    // mention(tweetArea);
}

// let openned = false;
// let offset = 0;
// let valeur = '';
// let type = '';
let inputTwt = document.createElement('input');
    inputTwt.type = 'text';

function mention(list, array) {
    
    inputTwt.list = list;

    let datalist = document.createElement('datalist');
    datalist.id = list;


    let paragraphs = document.getElementsByClassName('tweetArea')[0]
    paragraphs = paragraphs.getElementsByTagName('p');
    for (let p of paragraphs) {
        p.addEventListener( ('input') ,(e) =>{
            inputTwt.value = p.innerText
            let lastletter = inputTwt.value[inputTwt.value.length-1];
            console.log(lastletter);

//                 // if(lastletter == " " && openned){
//                 //     ValidProposition(p,valeur,offset);
//                 // }
//                 // if(openned){
//                 //     requestAjax(p,type,wrapper)
//                 // }
//                 // if(lastletter == "#"){
//                 //     offset = p.value.length;
//                 //     openned = true;
//                 //     type = 'hashtag';
//                 //     requestAjax(p,type,wrapper)
//                 // }
//                 // if(lastletter == "@"){
//                 //     offset = p.value.length;
//                 //     openned = true;
//                 //     type = 'profil';
//                 //     requestAjax(p,type,wrapper)
//                 // }
//                 // if(p.selectionStart < offset){
//                 //     ValidProposition(p,'',offset);
//                 // }
        });
    }
}

function close(tailwind = style, svg = buttons.close) {
    let close = document.createElement('button');
    close.type = 'button';
    close.innerHTML = svg;
    close.classList.add('close', ...tailwind['close'], ...tailwind['button']);
    return close;
}

function sendForm(toPost) {
    let form = document.getElementById(toPost);
    let tweets = form.getElementsByClassName('tweetBox');

    let t = 1;
    for (let newTweet of tweets) {
        // let user = newTweet.getElementsByClassName('avatar')[0].innerText;

        let content = '';
        let tweetArea = newTweet.getElementsByClassName('tweetArea')[0];
        tweetArea = tweetArea.getElementsByTagName('p');
        for (let p of tweetArea) {
            content = content + p.innerText + "\t";
        }
        // console.log(content);
        // formTweet.append(`${newTweet.id}[content]`, content);
        formTweet.append(`tweet${t}[content]`, content);

        if(mediasArray[newTweet.id].length > 0) {
            for (let i = 0; i < mediasArray[newTweet.id].length; i++) {
                // formTweet.append(`${newTweet.id}_medias[]`, mediasArray[newTweet.id][i]);
                formTweet.append(`tweet${t}_medias[]`, mediasArray[newTweet.id][i]);
            }
        }
        
        // if(schedule != "") {
            // formTweet.append(`${newTweet.id}[schedule]`, schedule);
            // formTweet.append(`tweet${t}[schedule]`, schedule);
        // }

        // console.log(formTweet);
        // for (const entry of formTweet.entries()) {
        //     console.log(entry);
        // }
        t = t + 1;
    }

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controllers/wysiwygController.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.response);
                console.log('Votre tweet a été posté !');
                submit.classList.add('opacity-50', 'cursor-not-allowed');
                setTimeout(() => {
                    if(Object.keys(mediasArray).length) {mediasArray = {};}
                    window.location.href = "/home";
                }, 1000);
            } else if (xhr.status === 500) {
                console.error('Erreur 500');
                alert('Erreur 500');
            }
        }
    };
    xhr.send(formTweet);
}

submit.onclick = () => {
    sendForm('wysiwyg');
}


// createNewTweet('wysiwyg', 1, style);

// anotherTweet('add_tweet');

// togglePara();

export function anotherTweet(button, dpLink) {
    let twtBox = document.getElementsByClassName('tweetBox');
    
    let i = 2;
    let oneMoreTweet = document.getElementById(button);
    oneMoreTweet.onclick = () => {
        for (let box of twtBox) {
            let tools = box.getElementsByClassName('toolbar')[0];
            if(tools) {tools.classList.add('hidden');}
            let close = box.getElementsByClassName('close')[0];
            close.classList.remove('hidden');
        }
        createNewTweet('wysiwyg', i, undefined, dpLink);
        i++;
    }

    // let allToolbars = twtBox.getElementsByClassName('toolbar')[0];

    // for (let box of twtBox) {
    //     let area = box.getElementsByClassName('tweetArea')[0];
    //     area.onclick = () => {
    //         allToolbars.remove();
    //         for (let toolbar of allToolbars){
    //             box.appendChild(toolbar);
    //         }
    //     }
    // }
}

function setEditing(wysiwyg) {
    let editor = document.getElementById(wysiwyg);
    let twtBoxes = editor.getElementsByClassName('tweetBox');
    let toolBars = editor.getElementsByClassName('toolbar');
    for (let twtBox of twtBoxes) {
        twtBox.onclick = () => {
            toolBars = Array.from(toolBars);
            toolBars.forEach((toolbar) => {
                toolbar.classList.add('hidden');
            });
            twtBox.getElementsByClassName('toolbar')[0].classList.remove('hidden');
        }
    }
}


export function togglePara(tailwind) {

    let tweetArea = document.getElementsByClassName("tweetArea")[0];

    tweetArea.onkeydown = (event) => {

        // tweetArea.removeChild().classList.contains('placeholder');

        if(event.key == "Enter" && event.shiftKey) 
        {
            return;
        }
        else if(event.key === "Enter")
        {
            event.preventDefault();
            let p = document.createElement('p');
            p.contentEditable = "true";
            p.classList.add(...tailwind['p']);
            tweetArea.appendChild(p);
            p.focus();
        } 
        let p = tweetArea.getElementsByTagName('p');
        for (let i = 0; i < p.length; i++) {
            p[i].onkeydown = (event) => {
                if(event.key === "Backspace" && p[i].textContent.trim() == '' && i != 0) {
                    // event.preventDefault;
                    p[i].remove();
                    let previous = p[i-1];

                    let selection = window.getSelection();
                    selection.removeAllRanges();

                    // let range = document.createRange();
                    // range.selectNodeContents(previous);
                    // selection.addRange(range);

                    selection.selectAllChildren(previous);//remplace les 3 précédentes
                    selection.collapseToEnd();            
                }
            }
        }
    }
}





