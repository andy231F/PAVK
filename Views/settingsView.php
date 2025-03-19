<div class="grid grid-cols-10 p-6">
    <div class="col-span-2">
        <?php include('Views/Componants/NavBar.php') ?>
    </div>

    <div class="col-span-3 border-l border-r dark:border-gray-800 flex flex-col gap-4 bg-gray-50 dark:bg-slate-900">

        <span
            class="text-3xl font-extrabold text-black dark:text-white md:text-3xl lg:text-2xl p-2 px-4 select-none">Paramètres
        </span>

        <div class="relative overflow-x-auto">
            <table class="tab w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400 ">
                    <tr>
                        <th>

                            <form class="flex items-center max-w-sm mx-auto">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">

                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="simple-search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Recherchez des paramètres..." required />
                                </div>
                        </th>
                        <th>

                            <button type="submit"
                                class="p-2.5 ms-2 text-sm font-medium text-black dark:text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                            </form>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="pb-4"></th>
                    </tr>
                    <tr class="tablinks bg-white w-full  me-2 dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600"
                        onclick="openTwitterTabs(event, 'Compte')">
                        <th scope="col"
                            class="cursor-pointer select-none w-full p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Votre compte
                        </th>
                        <th scope="col" class="w-full p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#e3e3e3">
                                <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z" />
                            </svg>
                        </th>
                    </tr>

                    <tr class="tablinks bg-white w-full dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600"
                        onclick="openTwitterTabs(event, 'Premium')">
                        <th scope="col"
                            class="cursor-pointer select-none w-full p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Premium
                        </th>
                        <th scope="col" class="w-full p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#e3e3e3">
                                <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z" />
                            </svg>
                        </th>
                    </tr>

                    <tr class="tablinks bg-white w-full dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600"
                        onclick="openTwitterTabs(event, 'Security')">
                        <th scope="col"
                            class="cursor-pointer select-none w-full p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Sécurité et accès au compte
                        </th>
                        <th scope="col" class="w-full p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#e3e3e3">
                                <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z" />
                            </svg>
                        </th>
                    </tr>

                    <tr
                        class="tablinks bg-white w-full dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="col"
                            class="cursor-pointer select-none w-full p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            onclick="openTwitterTabs(event, 'Confidentiality')">
                            Désactiver le compte
                        </th>
                        <th scope="col" class="w-full p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#e3e3e3">
                                <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z" />
                            </svg>
                        </th>
                    </tr>

                    <tr
                        class="tablinks bg-white w-full dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="col"
                            class="cursor-pointer select-none w-full p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            onclick="openTwitterTabs(event, 'Notifications')">
                            Notifications

                        </th>
                        <th scope="col" class="w-full p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#e3e3e3">
                                <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z" />
                            </svg>
                        </th>
                    </tr>


                    <tr class="tablinks bg-white w-full dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600"
                        onclick="openTwitterTabs(event, 'Help')">
                        <th scope="col"
                            class="cursor-pointer select-none w-full p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Centre d'assistance
                        </th>
                        <th scope="col" class="w-full p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#e3e3e3">
                                <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z" />
                            </svg>
                        </th>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <div class="col-span-5 border-l border-r dark:border-black flex flex-col gap-4 bg-gray-50 dark:bg-slate-900">
        <div id="Compte" class="tabcontent inline-block rounded-t-lg">
            <span
                class="text-2xl font-extrabold text-black dark:text-white md:text-2xl lg:text-2xl p-10 px-8 select-none">
                Votre compte
            </span>
            <p class="text-sm text-slate-400 px-2">Affichez les informations de votre compte ?</p>

            <span
                class="text-base font-medium text-black dark:text-white md:text-base lg:text-base pt-2 pl-2 select-none">
                Changez de mot de passe
            </span>

            <form action="/settings" method="POST">
                <div class="max-w-sm mb-5 px-8">
                    <label for="password" class="block pt-4 text-sm mb-2 text-black dark:text-white">Mot de passe
                        actuel</label>
                    <input id="password" name="password" type="password"
                        class="py-5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none bg-slate-200 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        placeholder="Mot de passe actuel">
                </div>

                <div class="max-w-sm mb-5 px-8">
                    <label for="mdpNew" class="block text-sm mb-2 text-black dark:text-white">Nouveau mot de
                        passe</label>
                    <input id="mdpNew" name="mdpNew" type="password"
                        class="py-5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none bg-slate-200 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        placeholder="Nouveau mot de passe">
                </div>

                <div class="max-w-sm mb-5 px-8">
                    <label for="mdpNewConfirmed" class="block text-sm mb-2 text-black dark:text-white">Confirmer le
                        nouveau mot de passe</label>
                    <input id="mdpNewConfirmed" name="mdpNewConfirmed" type="password"
                        class="py-5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none bg-slate-200 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        placeholder="Confirmer le nouveau mot de passe">
                </div>

                <span class="pl-5">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        Sauvegarder
                    </button>
                </span>
            </form>
        </div>

        <div id="Premium" class="tabcontent inline-block rounded-t-lg ">
            <span
                class="text-2xl font-extrabold text-black dark:text-white md:text-2xl lg:text-2xl p-10 px-8 select-none">Premium
            </span>
            <p class="text-sm text-slate-400 px-9 text-center">Découvrez bientôt toutes les nouvelles fonctionnalités
                chez PAVK</p>
            <div class="flex flex-row justify-center items-cente py-5">
                <div
                    class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">PAVK - pour la maudite somme
                        de</h5>
                    <div class="flex items-baseline text-gray-900 dark:text-white">
                        <span class="text-3xl font-semibold">€</span>
                        <span class="text-5xl font-extrabold tracking-tight">49.99</span>
                        <span class="ms-1 text-xl font-normal text-gray-500 dark:text-gray-400">/mois</span>
                    </div>
                    <ul role="list" class="space-y-5 my-7">
                        <li class="flex items-center">
                            <svg class="shrink-0 w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            <span
                                class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">Obtenez
                                un paiement pour vos posts</span>
                        </li>
                        <li class="flex">
                            <svg class="shrink-0 w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            <span
                                class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">PAVKer
                                avec plus de 600 caractères</span>
                        </li>
                        <li class="flex">
                            <svg class="shrink-0 w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            <span
                                class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">Vérification
                                du compte</span>
                        </li>

                        <li class="flex line-through decoration-gray-500">
                            <svg class="shrink-0 w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-500 ms-3">Limite de 140
                                caractère</span>
                        </li>
                        <li class="flex line-through decoration-gray-500">
                            <svg class="shrink-0 w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-500 ms-3">Bloquer des
                                comptes</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div id="Security" class="tabcontent inline-block rounded-t-lg ">
            <span
                class="text-lg font-extrabold text-black dark:text-white md:text-2xl lg:text-2xl p-10 px-8 select-none">Sécurité
                et accès au compte
            </span>
            <p class="text-sm text-slate-400 px-2 ">Gérez la sécurité de votre compte et assurez le suivi de
                son utilisation, notamment des applications qui y sont connectées.</p>

            <!-- <div onclick="toggle(this)"
                class="toggleBar pl-2 anim text-black dark:text-white sm:inline-flex items-center cursor-pointer hidden">
                <div class="relative w-16 h-6 bg-gray-200 rounded-full dark:bg-gray-700  dark:border-gray-600 ">
                    <div class="rondThemeToggler h-6 w-6 absolute rounded-full bg-gray-700 dark:bg-white"></div>
                </div>
                <p class="p-2 hidden lg:block text-gray-900 dark:text-gray-300">Compte privé</p>
            </div> -->

        </div>
        <div id="Confidentiality" class="tabcontent inline-block rounded-t-lg ">
            <span
                class="text-2xl font-extrabold text-black dark:text-white md:text-2xl lg:text-2xl p-10 px-8 select-none">Désactiver
                le compte
            </span>
            <p class="text-sm text-slate-400 px-2 ">Vous nous quittez ?</p>


            <article class="tweet bg-white dark:bg-black rounded-3xl p-1 dark:border-green-700">
                <?php $svg = '<svg width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-labelledby="retweetIconTitle" stroke="#adb5bd" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none" color="#000000"> <title id="retweetIconTitle">Retweet</title> <path d="M13 18L6 18L6 7"/> <path d="M3 9L6 6L9 9"/> <path d="M11 6L18 6L18 17"/> <path d="M21 15L18 18L15 15"/> </svg>' ?>
                <div class="flex items-center space-x-3">
                    <img alt='photo de lutilisateur'
                        src="../<?= ($myUserInfos['picture']) ? $myUserInfos['picture'] : 'Assets/img/profiles/img_1.jpg' ?>"
                        class="rounded-full w-12 h-12 sm:w-20 sm:h-20 object-cover bg-gray-300 border-1">
                    <span
                        class="text-black dark:text-white font-semibold"><?php echo $myUserInfos['display_name'] ?></span>
                    <a href=<?php echo $myUserInfos['username'] == $myUserInfos['username'] ? "/profil" : "/user?user=" . $myUserInfos['username'] ?>
                        class="text-zinc-400  font-medium hover:text-red-600 "><?php echo "@" . $myUserInfos['username'] ?></a>
                </div>
            </article>
            <div class="p-4">
                <p class="mb-3 text-lg text-gray-500 md:text-xl dark:text-gray-400">Vous nous quittez ? &#128532;</p>
                <p class="text-gray-500 dark:text-black"> Ceci désactivera votre compte
                    <?php echo $myUserInfos['username'] ?>
                </p>
                <p>
                    Vous vous apprêtez à lancer la procédure de désactivation de votre compte PAVK. <br> Votre nom
                    d'affichage, votre @nomdutilisateur et votre profil public ne seront plus visibles sur PAVK.fr, X
                    pour iOS et X pour Android.
                    <br><br>
                    Vous pouvez restaurer votre compte PAVK jusqu'à 30 jours après sa désactivation s'il a été désactivé
                    accidentellement ou par erreur.
                    Si vous voulez simplement modifier votre @nomdutilisateur, il n'est pas nécessaire de désactiver
                    votre compte. Il suffit de l'éditer dans vos Paramètres.
                    <br><br><br>

                    Nous sommes tristes de vous voir partir. À bientôt , on espère ?
                </p>
            </div>
            <div class="p-3">
                <button type="button"
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Désactiver
                    mon compte</button>
            </div>
        </div>
        <div id="Notifications" class="tabcontent inline-block rounded-t-lg ">
            <span
                class="text-2xl font-extrabold text-black dark:text-white md:text-2xl lg:text-2xl p-10 px-8 select-none">Notifications
            </span>
            <p class="text-sm text-slate-400 px-2 ">Sélectionnez les types de notifications que vous recevez sur vos
                activités, intérêts et recommandations.</p>
        </div>

        <div id="Help" class="tabcontent inline-block rounded-t-lg ">
            <span
                class="text-2xl font-extrabold text-black dark:text-white md:text-2xl lg:text-2xl p-10 px-8 select-none">Centre
                d'assistance
            </span>
            <p class="text-sm text-slate-400 px-4">Pour tout problème envoyer un email détailé.</p>

            <a href="mailto:contact@pavk.fr"
                class="pt-6 pl-4 text-red-400 underline underline-offset-2">contact@pavk.fr</a>
        </div>
    </div>
</div>


<script src="Assets/Javascript/tabsProfile.js"></script>