<?php
    $user = seeProfil();
    $buttonStyle = "p-2 cursor-pointer rounded-full hover:bg-red-600/10 active:bg-red-600/30";
?>

<div id="composeTweet" class="h-full sm:w-dvw min-w-full bg-black sm:bg-opacity-50 sm:backdrop-blur-sm fixed top-[0px] z-99 hidden">

<div id="wysiwyg" class="absolute top-0 sm:top-[50%] sm:left-[50%] sm:!-translate-[50%] bg-slate-100 dark:bg-black text-black dark:text-white sm: border-2 sm:rounded-2xl sm:w-[600px] max-w-full h-full sm:h-[600px] sm:px-10 px-2 py-6 overflow-y-scroll">

<!-- <main class="modal bg-black w-dvw h-dvh sm:pt-[5%] px-4"> sm:bg-opacity-50 -->
    <!-- <div id="wysiwyg" class="w-[600px] max-w-full sm:mx-auto relative"> -->
    <header class="flex justify-between">
        <button class="close" type="button">Retour</button>
        <button id="save" type="button">Brouillons</button>
    </header>
    <footer class="w-full pt-2 mt-4 border-t flex justify-between item-center">
        <div>
            <ul class="flex gap-1">
                <li class="w-fit">
                    <button id="add_tweet" type="button" class="<?=$buttonStyle?>" title="Ajouter">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323">
                            <path d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160Zm40 200q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/>
                        </svg>
                    </button> 
                </li>
                <li class="w-fit">
                    <button id="save_tweet" type="button" class="<?=$buttonStyle?>" title="Sauvegarder">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323">
                            <path d="M840-680v480q0 33-23.5 56.5T760-120H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h480l160 160Zm-80 34L646-760H200v560h560v-446ZM480-240q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35ZM240-560h360v-160H240v160Zm-40-86v446-560 114Z"/>
                        </svg>
                    </button>
                </li>
                <li>
                    <button type="submit" class="w-fit block cursor-pointer dark:bg-white dark:text-black bg-black text-white px-4 py-2 rounded-3xl  hover:bg-red-600 hover:text-white transition duration-300">
                        Poster
                    </button>
                </li>
            </ul>
        </div>
    </footer>
</div>
</div>
    
<!-- </main> -->
<script type="module" src="Assets/Javascript/wysiwyg.js"></script>
<script type="module">
    import {createNewTweet, anotherTweet, togglePara} from "/Assets/Javascript/wysiwyg.js";
    document.addEventListener('DOMContentLoaded', () => {
        // modal('composeTweet', 'openTwtBox');
        <?php if($user['picture']): ?>
            let dpLink = "./<?=$user['picture']?>";
            createNewTweet('wysiwyg', 1, undefined, dpLink);
            anotherTweet('add_tweet', dpLink);
        <?php else: ?>
            createNewTweet('wysiwyg', 1, undefined);
            anotherTweet('add_tweet');
        <?php endif; ?>
    }); 
</script>
<script>
    let composeTweet = document.getElementById('composeTweet');
    let showIt = document.getElementById('openTwtBox');
    let hideIt = composeTweet.getElementsByClassName('close')[0];

    showIt.onclick = () => {
        composeTweet.classList.remove('hidden');
    }

    hideIt.onclick = () => {
        composeTweet.classList.add('hidden');
    }

    window.onclick = (e) => {
        if(e.target == composeTweet) {
            composeTweet.classList.add('hidden');
        }
    }
</script>
<!-- <script type="module" src="Assets/Javascript/editProfil.js"></script> --> -->
<!-- <script type="module"> -->
    <!-- import {modal} from "Assets/Javascript/editProfil.js"; -->
    <!-- document.addEventListener('DOMContentLoaded', () => { -->
        <!-- modal('composeTweet', 'openTwtBox'); -->
    <!-- }); -->
<!-- </script> -->