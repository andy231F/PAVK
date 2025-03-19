function emojisBtn() {
  fetch(
    "https://emoji-api.com/emojis?access_key=3fc7b05959e5bcf0c0e635d22850d9c46bc9ed7c"
  )
    .then((response) => response.json())
    .then((data) => {
      const emojiContainer = document.getElementById("emoji-container");
      emojiContainer.innerHTML = "";
      emojiContainer.classList.add("max-h-90", "overflow-y-scroll", "p-2");

      data.slice(0, 200).forEach((emoji) => { 
        const emojiElement = document.createElement("div");
        emojiElement.innerHTML = `${emoji.character}`; 

        emojiElement.classList.add(
          "text-2xl",
          "cursor-pointer",
          "hover:bg-gray-200",
          "rounded",
          "p-2",
          "inline-block"
        );

        emojiElement.onclick = () => {
          console.log(`&#x${emoji.codePoint};`); 
          console.log(`${emoji.character}`); 
          // console.log(`Code Point: ${emoji.codePoint}`); 
        };

        emojiContainer.appendChild(emojiElement);
      });

      const modal = document.getElementById("emoji-modal");
      modal.classList.remove("hidden");
    })
    .catch((error) => console.error("Error:", error));
}

// Gestion de la fermeture du modal
const modal = document.getElementById("emoji-modal");
const closeButtons = document.querySelectorAll('[data-modal-hide="emoji-modal"]');

closeButtons.forEach((button) => {
  button.onclick = () => {
    modal.classList.add("hidden");
  };
});

window.onclick = function (event) {
  if (event.target == modal) {
    modal.classList.add("hidden");
  }
};


