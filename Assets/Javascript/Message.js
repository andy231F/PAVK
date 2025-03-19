let sendButton = document.querySelector('#messageSendButton');
let inputField = document.querySelector('#messageInputField');
let inputBox = document.querySelector('.messageInput');

let messageCountainer = document.querySelector('.AllMessages');
let contactCountainer = document.querySelector('.AllContact');
let returnArrow = document.querySelector('.ReturnArrow');




let myid = document.querySelector('#myId').innerHTML;
let dest = document.querySelector('#Dest').innerHTML;

if(dest == ""){
    inputBox.style.display = "none";
    messageCountainer.style.display = "none";
    returnArrow.style.display = "none";


    contactCountainer.classList.remove('hidden')
}

sendButton.onclick = () => {
    sendmessage();
}

async function GetMessage() {
    let body = {myId : myid,
                dest : dest
    };
    let data = await fetch("Models/MessageAPI.php",{
        method: "POST",
        body: JSON.stringify(body),
        headers: {
            "Content-Type": "application/json; charset=UTF-8"
        }})
    .then((data)=>data.json())
    .then((data)=>{
        messageCountainer.innerHTML = '';

        let allMsg = data['res']
        for (let i = 0; i < allMsg.length; i++) {
            let message = document.createElement('p')
            message.classList.add('message',"w-fit","p-2","m-2");

            if(allMsg[i]['id_sender'] == myid){
                message.classList.add("self-end","bg-red-600",'text-white');
            }else{
                message.classList.add("bg-green-600","text-white",'text-white');
            }

            message.innerHTML = allMsg[i]['content']
            messageCountainer.appendChild(message)
        }

    })
}

//fetch auto
GetMessage();
// toute les 5sec
setInterval(() => {
    GetMessage();
}, 5000);


async function sendmessage() {
    let msg = inputField.value;
    let body = {message : msg,
                myId : myid,
                dest : dest,
                methode:"POST"};

    let reponse = await fetch("Models/MessageAPI.php", {
        method: "POST",
        body: JSON.stringify(body),
        headers: {
            "Content-Type": "application/json; charset=UTF-8"
        }})
        .then((res)=>res.json())
        .then((res)=>{
            inputField.value = "";
            GetMessage();

        })
        .catch((data)=>{
            console.log("error",data);
        })
}

inputField.addEventListener("keydown", (e) => {
    if(e.key == "Enter" && inputField.value != ""){
        sendmessage();
    }
})
