
<div class="bg-white-100 flex justify-center items-center min-h-screen">
    <section class="flex justify-between items-center w-full h-screen">

        <div id="panneauInscription" class="absolute gauche bg-black p-8 rounded-lg shadow-lg md:w-1/2 m-0 w-screen max-w-screen md:max-w-md lg:m-[5%] xl:m-[9%] ">
            <h2 id="h2Inscription" class="text-2xl font-semibold text-center text-white mb-6">Inscription</h2>

            <form method="POST" enctype="multipart/form-data" class="w-[430] ">

                <div class="panneau2 text-black">
                    <label for="email" class="block  font-medium">Email</label>
                    <input type="email" name="email"  placeholder="lim.candice@gmail.eu" id="email" required class="w-full px-4 py-2 border rounded-lg focus:ring-2  focus:bg-red-600">
                </div>

                <div class="panneau2 text-black">
                    <label for="firstname" class="block font-medium">Prénom</label>
                    <input type="text" name="firstname"  placeholder="Candice" id="firstname" required class="w-full px-4 py-2 border rounded-lg focus:ring-2  focus:bg-red-600">
                </div>
                
                <div class="panneau2 text-black">
                    <label for="lastname" class="block font-medium">Nom</label>
                    <input type="text" name="lastname" placeholder="Limpin" id="lastname" required class="w-full px-4 py-2 border rounded-lg focus:ring-2  focus:bg-red-600">
                </div>

                <div class="panneau2 text-black">
                    <label for="username" class="block  font-medium">Pseudo</label>
                    <input type="text" name="username" placeholder="strab3rrybini"  id="username" required class="w-full px-4 py-2 border rounded-lg focus:ring-2  focus:bg-red-600">
                </div>

                <div class="panneau2 text-black">
                    <label for="password" class="block font-medium">Mot de passe</label>
                    <input type="password" name="password" placeholder="password"  id="password" required class="w-full px-4 py-2 border rounded-lg focus:ring-2  focus:bg-red-600">
                </div>

                <div class="panneau2 text-black">
                    <label for="birthdate" class="block font-medium">Date de naissance</label>
                    <input type="date" name="birthdate" id="birthdate" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:bg-red-600">
                </div>
                
                <div class="panneau1">
                    <label for="city" class="block text-white font-medium m-1">Ville</label>
                    <input type="text" name="city" id="city" placeholder="Paris"   class="w-full text-white px-4 py-2 border rounded-lg focus:ring-2 focus:bg-red-600">
                </div>

                <div class="panneau1">
                    <label for="country" class="block text-white font-medium m-1">Pays</label>
                    <input type="text" name="country" placeholder="France"  id="country" class="w-full px-4 py-2 text-white border rounded-lg focus:ring-2 focus:bg-red-600">
                </div>


                <div class="panneau1">
                    <label for="genre" class="block text-white font-medium m-1">Genre</label>
                    <select name="genre" id="genre" class="w-full text-white px-4 py-2 border rounded-lg focus:ring-2 focus:bg-red-600">
                        <option value="1" class="text-black">Homme</option>
                        <option value="2" class="text-black">Femme</option>
                        <option value="3" class="text-black">Autre</option>
                    </select>
                </div>

                <div class="panneau1">
                    <label for="profile_picture" class="block text-white font-medium m-1">Photo de profil</label>
                    <input type="file" name="picture"  id="profile_picture" accept="image/*" class="w-full px-4 py-2 border text-white rounded-lg">
                </div>

                <div id="suivantButton" class=" panneau1 text-center w-full bg-white text-black py-2 mt-6 rounded-lg hover:bg-red-600 hover:text-white transition duration-300">Suivant</div>

                <div class="panneau2">
                    <input type="submit" name="input" value="M'inscrire" class="w-full cursor-pointer bg-white text-black py-2 mt-6 rounded-lg  hover:bg-red-600 hover:text-white transition duration-300">
                </div>
            </form>
        </div>


        <div id="panneauLogo" class="animSub absolute droite h-screen bg-black hidden md:flex">
            <img src="Assets/img/Logo.png"class="h-full w-full object-cover">
        </div>
    </section>
</div>
<script src="Assets/Javascript/Subscription.js"></script>
