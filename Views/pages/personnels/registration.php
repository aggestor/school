<section class="w-full relative flex items-center justify-center overflow-hidden h-full bg-white">
    <main class="h-[580px] z-10 block w-8/12 border-r-2 border-white border-b-2 bg-white rounded-lg shadow shadow-gray-400">
        
        <div class="w-11/12 mb-2 mx-auto">
            <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">School Archive Manager.</h2>
            <h2 class="text-black font-semibold text-lg mt-2 text-center">Identification étudiant.</h2>
        </div>
        <div class="relative menu h-10 mb-2 flex justify-between items-center w-11/12 mx-auto">
            <a href="#identity" class="w-8 h-8 hover:text-white hover:bg-sky-500 cursor-pointer transition-colors duration-500 bg-white z-10 rounded-full border-2 border-sky-500 grid place-items-center text-sky-500 text-lg font-semibold">1</a>
            <a href="#address" class="w-8 h-8 hover:text-white hover:bg-sky-500 cursor-pointer transition-colors duration-500 bg-white z-10 rounded-full border-2 border-sky-500 grid place-items-center text-sky-500 text-lg font-semibold">2</a>
            <a href="#orientation" class="w-8 h-8 hover:text-white hover:bg-sky-500 cursor-pointer transition-colors duration-500 bg-white z-10 rounded-full border-2 border-sky-500 grid place-items-center text-sky-500 text-lg font-semibold">3</a>
            <a href="#origin" class="w-8 h-8 hover:text-white hover:bg-sky-500 cursor-pointer transition-colors duration-500 bg-white z-10 rounded-full border-2 border-sky-500 grid place-items-center text-sky-500 text-lg font-semibold">4</a>
            <a href="#secondary-school" class="w-8 h-8 hover:text-white hover:bg-sky-500 cursor-pointer transition-colors duration-500 bg-white z-10 rounded-full border-2 border-sky-500 grid place-items-center text-sky-500 text-lg font-semibold">5</a>
            <a href="#parent-sponsors" class="w-8 h-8 hover:text-white hover:bg-sky-500 cursor-pointer transition-colors duration-500 bg-white z-10 rounded-full border-2 border-sky-500 grid place-items-center text-sky-500 text-lg font-semibold">6</a>
            <a href="#health" class="w-8 h-8 hover:text-white hover:bg-sky-500 cursor-pointer transition-colors duration-500 bg-white z-10 rounded-full border-2 border-sky-500 grid place-items-center text-sky-500 text-lg font-semibold">7</a>
            <a href="#docs" class="w-8 h-8 hover:text-white hover:bg-sky-500 cursor-pointer transition-colors duration-500 bg-white z-10 rounded-full border-2 border-sky-500 grid place-items-center text-sky-500 text-lg font-semibold">8</a>
            <div class="h-1 border-t-4 bottom-4 border-sky-500 w-full absolute"></div>
        </div>
          <form action="/login" method="POST" class="w-full h-[78%] overflow-auto flex justify-center flex-col">
            <div style="display: none" id="identity" class="w-full register-menu grid md:grid-cols-2 grid-cols-1">
                <div class="md:col-span-2 col-span-1 mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">1. Votre identité</h2>
                </div>
                <div class="col-span-1">
                    <div class="mx-auto h-40 w-40 rounded-full relative">
                        <img id="imageContainer" src="/assets/images/output-onlinepngtools.png" class="w-full  rounded-full h-full object-cover">
                        <span id="cameraHandle" class="w-8 h-8 cursor-pointer rounded-full text-white grid place-items-center absolute right-1 bottom-4 bg-sky-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" /></svg>
                            </span>
                        <input type="file" id="userProfile" name="user_profile" hidden>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input id="firstName" name="user_first_name" type="text" placeholder="Prénom" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_first_name'])) {echo $_POST['user_first_name'];}?>" />
                        </div>
                        <?php if (isset($_POST['login']) && !empty($params['errors']['user_first_name'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_first_name']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input id="secondName" name="user_second_name" type="text" placeholder="Nom" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_second_name'])) {echo $_POST['user_second_name'];}?>" />
                        </div>
                        <?php if (isset($_POST['login']) && !empty($params['errors']['user_second_name'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_second_name']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input id="lastName" name="user_last_name" type="text" placeholder="Postnom" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_last_name'])) {echo $_POST['user_last_name'];}?>" />
                        </div>
                        <?php if (isset($_POST['login']) && !empty($params['errors']['user_last_name'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_last_name']; ?></span>
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input name="phone_number" type="phone" placeholder="Numéro de téléphone" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['phone_number'])) {echo $_POST['phone_number'];}?>" />
                        </div>
                        <?php if (isset($_POST['login']) && !empty($params['errors']['phone_number'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['phone_number']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input name="user_email" type="text" placeholder="Adresse mail" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                        </div>
                        <?php if (isset($_POST['login']) && !empty($params['errors']['user_email'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_email']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input name="birth_place" type="text" placeholder="Lieu de naissance" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['birth_place'])) {echo $_POST['birth_place'];}?>" />
                        </div>
                        <?php if (isset($_POST['login']) && !empty($params['errors']['birth_place'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['birth_place']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input name="birth_date" type="date" placeholder="Date de naissance" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['birth_date'])) {echo $_POST['birth_date'];}?>" />
                        </div>
                        <?php if (isset($_POST['login']) && !empty($params['errors']['birth_date'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['birth_date']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input list="civil"  name="civil" type="text" placeholder="Etat civil" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                            <datalist id="civil">
                                <option value="Célibataire">Célibataire</option>
                                <option value="Marié(e)">Marié(e)</option>
                                <option value="Divorcé(e)">Divorcé(e)</option>
                                <option value="Veuf(ve)">Veuf(ve)</option>
                            </datalist>
                        </div>
                        <?php if (isset($_POST['login']) && !empty($params['errors']['user_email'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_email']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input list="sex"  name="sex" type="text" placeholder="Sexe" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['sex'])) {echo $_POST['sex'];}?>" />
                            <datalist id="sex">
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                                <option value="Binaire">Binaire</option>
                            </datalist>
                        </div>
                        <?php if (isset($_POST['login']) && !empty($params['errors']['sex'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['sex']; ?></span>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div style="display: none" id="address" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[70%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">2. Votre Adresse</h2>
                </div>
                <div class="px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3  my-3 grid grid-cols-2">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="id_type"  name="id_type" type="text" placeholder="Choisir type de pièce" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                                <datalist id="id_type">
                                    <option value="Carte d'élécteur">Carte d'élécteur</option>
                                    <option value="Permis de conduire">Permis de conduire</option>
                                    <option value="Carte Scolaire">Carte Scolaire</option>
                                    <option value="Carte se Service">Carte se Service</option>
                                    <option value="Carte consulaire">Carte consulaire</option>
                                    <option value="Carte diplomatique">Carte diplomatique</option>
                                    <option value="Certificat de nationalité">Certificat de nationalité</option>
                                    <option value="Certificat de naissance">Certificat de naissance</option>
                                    <option value="Sans carte">Sans carte</option>
                                    <option value="Pièce d'identité nationale">Pièce d'identité nationale</option>
                                </datalist>
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_type']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="id_number" type="text" placeholder="Numéro d'identité" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['id_number'])) {echo $_POST['id_number'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_number'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_number']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-3 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="id_type" type="text" placeholder="Nationalité" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_type']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="id_number" type="text" placeholder="Pronvince / Etat" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['id_number'])) {echo $_POST['id_number'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_number'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_number']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="id_number" type="text" placeholder="Térritoire / Ville" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['id_number'])) {echo $_POST['id_number'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_number'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_number']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-3 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="id_type" type="text" placeholder="Collectivité / Secteur / Commune" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_type']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="id_number" type="text" placeholder="Groupement / Quartier" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['id_number'])) {echo $_POST['id_number'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_number'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_number']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="id_number" type="text" placeholder="Adresse Physique" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['id_number'])) {echo $_POST['id_number'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_number'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_number']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid grid-cols-2">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="student_status"  name="student_status" type="text" placeholder="Status Etudiant" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                                <datalist id="student_status">
                                    <option value="Recru(e)">En cours d'admission</option>
                                    <option value="Régulier(ère)">Etudiant en classe montante</option>
                                </datalist>
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_type']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: none" id="orientation" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[60%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">3. Orientation académique</h2>
                </div>
                <div class="px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3  my-3 grid grid-cols-2">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="fac_to_study"  name="fac_to_study" type="text" placeholder="Choisir Faculté / Section" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                                <datalist id="fac_to_study">
                                    <option value="F.S.A">Factulté de Sciences Appliquées</option>
                                    <option value="F.S">Factulté de Santé</option>
                                    <option value="F.S.I.C">Factulté de Science de l'Information et Communication</option>
                                    <option value="F.S.E.G">Factulté de Sciences Economiques et Gestion</option>
                                    <option value="F.L">Factulté de Lettre</option>
                                    <option value="F.D">Factulté de Droit</option>
                                    <option value="F.P.S.E">Factulté de Pyschologiques et Sciences de l'Education</option>
                                    <option value="F.S.S.A">Factulté de Science Sociale, Politique et Administrative</option>
                                    <option value="F.M">Factulté de Médicine</option>
                                </datalist>
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_type']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="department_to_study"  name="department_to_study" type="text" placeholder="Choisir Départément / Option" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                                <datalist id="department_to_study">
                                    <option value="Carte d'élécteur">Carte d'élécteur</option>
                                    <option value="Permis de conduire">Permis de conduire</option>
                                    <option value="Carte Scolaire">Carte Scolaire</option>
                                    <option value="Carte se Service">Carte se Service</option>
                                    <option value="Carte consulaire">Carte consulaire</option>
                                    <option value="Carte diplomatique">Carte diplomatique</option>
                                    <option value="Certificat de nationalité">Certificat de nationalité</option>
                                    <option value="Certificat de naissance">Certificat de naissance</option>
                                    <option value="Sans carte">Sans carte</option>
                                    <option value="Pièce d'identité nationale">Pièce d'identité nationale</option>
                                </datalist>
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_type']; ?></span>
                            <?php endif;?>
                        </div>
                        
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="id_type" type="text" placeholder="Orientation" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_type']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="id_number" type="text" placeholder="Promotion" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['id_number'])) {echo $_POST['id_number'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_number'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_number']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: none" id="origin" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[60%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">4. Vos Origines</h2>
                </div>
                <div class="px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3  my-3 grid grid-cols-2">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="fac_to_study"  name="fac_to_study" type="text" placeholder="Choisir Province" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                                <datalist id="fac_to_study">
                                    <option value="F.S.A">Factulté de Sciences Appliquées</option>
                                    <option value="F.S">Factulté de Santé</option>
                                    <option value="F.S.I.C">Factulté de Science de l'Information et Communication</option>
                                    <option value="F.S.E.G">Factulté de Sciences Economiques et Gestion</option>
                                    <option value="F.L">Factulté de Lettre</option>
                                    <option value="F.D">Factulté de Droit</option>
                                    <option value="F.P.S.E">Factulté de Pyschologiques et Sciences de l'Education</option>
                                    <option value="F.S.S.A">Factulté de Science Sociale, Politique et Administrative</option>
                                    <option value="F.M">Factulté de Médicine</option>
                                </datalist>
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_type']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="id_type" type="text" placeholder="Territoire / Ville" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_type']; ?></span>
                            <?php endif;?>
                        </div>
                        
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="id_type" type="text" placeholder="Collectivité / Secteur / Commune" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_type']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="id_number" type="text" placeholder="Groupement / Quartier" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['id_number'])) {echo $_POST['id_number'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_number'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_number']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: none" id="secondary-school" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[90%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">5. Informations sur l'école sécondaire frequentée</h2>
                </div>
                <div class="px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-1">
                        <div class="w-8/12 focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input   name="id_type" type="text" placeholder="Nom de l'école secondaire" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                        </div>
                    </div>
                    
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="fac_to_study"  name="fac_to_study" type="text" placeholder="Choisir Province" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                                <datalist id="fac_to_study">
                                    <option value="F.S.A">Factulté de Sciences Appliquées</option>
                                    <option value="F.S">Factulté de Santé</option>
                                    <option value="F.S.I.C">Factulté de Science de l'Information et Communication</option>
                                    <option value="F.S.E.G">Factulté de Sciences Economiques et Gestion</option>
                                    <option value="F.L">Factulté de Lettre</option>
                                    <option value="F.D">Factulté de Droit</option>
                                    <option value="F.P.S.E">Factulté de Pyschologiques et Sciences de l'Education</option>
                                    <option value="F.S.S.A">Factulté de Science Sociale, Politique et Administrative</option>
                                    <option value="F.M">Factulté de Médicine</option>
                                </datalist>
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_type']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="id_type" type="text" placeholder="Territoire / Ville" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_type']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="w-8/12 focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input   name="id_type" type="text" placeholder="Section suivie (Humanité)" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="id_type" type="text" placeholder="Centre Exetat" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_type']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="id_number" type="text" placeholder="Année de l'obtension du diplome" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['id_number'])) {echo $_POST['id_number'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_number'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_number']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="id_type" type="number" placeholder="Pourcentage Exetat" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_type']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="id_number" type="text" placeholder="Numéro du diplome" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['id_number'])) {echo $_POST['id_number'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['id_number'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_number']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: none" id="parent-sponsors" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[70%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">6. Parents et sponsors</h2>
                </div>
                <div class="px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-3 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="father_name" type="text" placeholder="Nom du père" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['father_name'])) {echo $_POST['father_name'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['father_name'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['father_name']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="mother_name" type="text" placeholder="Nom du père" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['mother_name'])) {echo $_POST['mother_name'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['mother_name'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['mother_name']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="sponsoring_type"  name="sponsoring_type" type="text" placeholder="Choisir type de sponsor" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['sponsoring_type'])) {echo $_POST['sponsoring_type'];}?>" />
                                <datalist id="sponsoring_type">
                                    <option value="1">Pas de bourse</option>
                                    <option value="2">Bourse</option>
                                </datalist>
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['sponsoring_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['sponsoring_type']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-3 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="sponsor_name" type="text" placeholder="Nom Sponsor" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['sponsor_name'])) {echo $_POST['sponsor_name'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['sponsor_name'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['sponsor_name']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="sponsor_phone_number" type="tel" placeholder="Numéro de téléphone du sponsor" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['sponsor_phone_number'])) {echo $_POST['sponsor_phone_number'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['sponsor_phone_number'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['sponsor_phone_number']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: none" id="health" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[60%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">7. Informations sanitaires</h2>
                </div>
                <div class="px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3  my-3 grid grid-cols-2">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input  name="blood_type" type="text" placeholder="Groupe Sanguin" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['blood_type'])) {echo $_POST['blood_type'];}?>" />
                                
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['blood_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['blood_type']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="department_to_study"  name="height" type="text" placeholder="Taille" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['height'])) {echo $_POST['height'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['height'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['height']; ?></span>
                            <?php endif;?>
                        </div>
                        
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="allergies" type="text" placeholder="Allergies" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['allergies'])) {echo $_POST['allergies'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['allergies'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['allergies']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="handicap" type="text" placeholder="Handicap" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['handicap'])) {echo $_POST['handicap'];}?>" />
                            </div>
                            <?php if (isset($_POST['login']) && !empty($params['errors']['handicap'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['handicap']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: none" id="docs" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[90%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">8. Document et envoie des données</h2>
                </div>
                <div class="px-8 flex flex-col h-80 col-span-2">
                    <div id="draggableZone" draggable="true" dropzone="true" class="w-10/12 mx-auto h-56 rounded bg-gray-200 flex justify-center flex-col items-center">
                        <span id="handleDocumentInput" class="text-sky-500 border-2 border-sky-500 bg-transparent flex justify-between font-semibold rounded py-1 cursor-pointer px-2">Choisir un fichier <svg class="ml-2 mt-0.5 h-6 text-sm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" /></svg></span>
                            <span class="mt-4 font-semibold text-lg">Deposer ici le document</span>
                            <span class="mt-2 h-12 font-semibold"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg></span>
                    </div>
                    <input type="file" name="document" hidden id="documentInput">
                    <div class="mt-3 w-10/12 mx-auto flex justify-center items-center">
                            <button class="flex transition-all duration-500 justify-between items-center h-10 px-2 w-fit py-1 bg-sky-500 font-semibold hover:bg-sky-600 text-white rounded hover:shadow-lg hover:shadow-gray-300"> Envoyer le dossier <svg class="ml-2 h-6" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></button>
                    </div>
                </div>
            </div>
          </form>
        <!--End first section/hero-->
    </main>
    <div  class="absolute h-60 w-60 top-0 left-10">
        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <path fill="#06B6D4" d="M52.3,-47.1C66.9,-37.7,77.4,-18.8,78.2,0.8C79,20.5,70.2,41,55.6,50.6C41,60.2,20.5,58.9,-0.8,59.6C-22,60.4,-44,63.2,-54.5,53.6C-65.1,44,-64.2,22,-59.7,4.5C-55.2,-13,-47.1,-26,-36.5,-35.4C-26,-44.8,-13,-50.7,2.9,-53.6C18.8,-56.5,37.7,-56.5,52.3,-47.1Z" transform="translate(100 100)" />
        </svg>
    </div>
    <div class="w-full  absolute left-0 right-0 bottom-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#06b6d4" fill-opacity="1" d="M0,192L80,160C160,128,320,64,480,69.3C640,75,800,149,960,154.7C1120,160,1280,96,1360,64L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
    </div>
    <div class="absolute bottom-3 w-full text-white text-center" id="footer">Copyright &copy; <?=date('Y')?>, School Archive Manager | U.O.R</div>
</section>