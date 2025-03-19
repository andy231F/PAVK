let tweets = document.querySelectorAll('.TweetContent')
let comments = document.querySelectorAll('.Comment_content');

tweets.forEach(tweet => {
    let newtxt = replaceToTwett(tweet.innerText);
    newtxt = replaceToProfil(newtxt);
    tweet.innerHTML = newtxt;
});

comments.forEach(tweet => {
    let newtxt = replaceToTwett(tweet.innerText);
    newtxt = replaceToProfil(newtxt);
    tweet.innerHTML = newtxt;
});

function replaceToTwett(input) {
    input = input.replace(/(^|\s)(#[a-z\d-]+)/ig, function(match, p1, p2) {
        let hashtag = p2.substring(1); 
        return `${p1}<a href='/search?hashtag=${hashtag}' class='text-red-500'>${p2}</a>`;
    });
    return input;
}

function replaceToProfil(input) {
    input = input.replace(/(^|\s)(@[a-z\d-]+)/ig, function(match, p1, p2) {
        let user = p2.substring(1); 
        return `${p1}<a href='/user?user=${user}' class='text-red-500'>${p2}</a>`;
    });
    return input;
}