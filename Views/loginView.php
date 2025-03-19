<form method="post" class="connexion_Form bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col dark:bg-slate-900  w-screen sm:w-fit">
    <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Login :</label>
        <input name="login" type="txt" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mail ou pseudo" required />
    </div>
    <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe :</label>
        <input name="passeword" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="******" required />
    </div>
    <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow m-auto">Connexion</button>
    <p class="text-gray-400 mt-4">Pas encore inscrit? -> 
        <a href="/subscription" class="underline text-gray-950 dark:text-white">S'inscrire</a>
    </p>
</form>
