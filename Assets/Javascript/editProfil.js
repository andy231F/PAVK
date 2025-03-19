function imgPreview (preview, upload) {

    let display = document.getElementById(preview);
    let input = document.getElementById(upload);

    input.onchange = (event) => {
        let img = event.target.files[0];
        console.log(img);
        
        let imgUrl = URL.createObjectURL(img);
        display.classList.add(`bg-[url(${imgUrl})]`);
    
        console.log(imgUrl);
    }
    
}

function modal(content, open) {
    let modal = document.getElementById(content);
    let show = document.getElementById(open);
    let hide = modal.getElementsByClassName('close')[0];

    show.onclick = () => {
        modal.classList.remove('hidden');
        // modal.classList.add('block');
        // modal.classList.replace('hidden', 'block');
    }

    hide.onclick = () => {
        // modal.classList.replace('block', 'hidden');
        // modal.classList.remove('block');
        modal.classList.add('hidden');
    }

    window.onclick = (e) => {
        if(e.target == modal) {
            // modal.classList.replace('block', 'hidden');
            // modal.classList.remove('block');
            modal.classList.add('hidden');
        }
    } 
}


// modal('profilForm','editProfil');
// imgPreview('header_display', 'header_picture');
// imgPreview('profile_display', 'profile_picture');

