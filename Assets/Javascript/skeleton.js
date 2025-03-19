

document.addEventListener("DOMContentLoaded", () => {
    const skeletons = document.getElementsByClassName("skeleton");
   


    setTimeout(() => {
        for(let skeleton of skeletons){
          skeleton.classList.add('hidden');
          
        }
      }, 1000); 
});
