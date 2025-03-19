let followButton = document.querySelector('#FollowButtton')
let myId = parseInt(document.querySelector('#MyId').innerHTML);
let FollowId = parseInt(document.querySelector('#FollowId').innerHTML);

let followed = false;

async function Follow() {
    const body = [myId,FollowId];
    if(!followed){
        body[2] = "Follow";
    }else{
        body[2] = "UnFollow";
    }
    // console.log(JSON.stringify(body));
    let data = await fetch("Models/Follow.php", {
    method: "POST",
    body: JSON.stringify(body),
    headers: {
        "Content-Type": "application/json; charset=UTF-8"
    }
    })
    // let response = data.json();
    // console.log(response);
    getInfo();

}
followButton.onclick = Follow;

function changeButton(){
    if(followed){
        followButton.innerHTML = "UnFollow";
    }else{
        followButton.innerHTML = "Follow";
    }
}
async function getInfo() {
    const body = [myId,FollowId,"GET"];

    let data = await fetch("Models/Follow.php", {
    method: "POST",
    body: JSON.stringify(body),
    headers: {
        "Content-Type": "application/json; charset=UTF-8"
    }
    })
    let response = data.json();
    response.then((data)=>{
        if(data['response'] != false){
            followed = true;
        }else{
            followed = false;
        }
        changeButton();
    })    

}

getInfo();
