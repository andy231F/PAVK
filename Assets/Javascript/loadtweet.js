document.addEventListener("DOMContentLoaded", function () {
    let page = 1;
    const loadMoreBtn = document.querySelector("#loadMore");

    loadMoreBtn.addEventListener("click", function () {
        fetch("loadTweets.php?page=" + page)
            .then(response => response.text())
            .then(data => {
                if (data.trim() !== "") {
                    document.querySelector("#tweetContainer").innerHTML += data;
                    page++;
                } else {
                    loadMoreBtn.style.display = "none"; 
                }
            });
    });
});