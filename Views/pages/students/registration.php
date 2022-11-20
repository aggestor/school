
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
            <div class="h-1 border-t-4 bottom-4 border-sky-500 w-full absolute"></div>
        </div>
          <form enctype="multipart/form-data" method="POST" class="w-full h-[78%] overflow-auto flex justify-center flex-col">
            <!---Identity section beginning--->
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
                    <?php if (isset($_POST['register_student']) && !empty($params['errors']['user_profile'])): ?>
                        <div class=" mt-2 md:w-10/12 w-full text-center mx-auto text-red-500 text-xs"><?php echo $params['errors']['user_profile']; ?></div>
                    <?php endif;?>
                    <div class="md:w-10/12 w-full mx-auto my-2">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input id="firstName" name="user_first_name" type="text" placeholder="Prénom" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['user_first_name'];}?>" />
                        </div>
                        <?php if (isset($_POST['register_student']) && !empty($params['errors']['user_first_name'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_first_name']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-2">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input id="secondName" name="user_second_name" type="text" placeholder="Nom" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['user_second_name'];}?>" />
                        </div>
                        <?php if (isset($_POST['register_student']) && !empty($params['errors']['user_second_name'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_second_name']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-2">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input id="lastName" name="user_last_name" type="text" placeholder="Postnom" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['user_last_name'];}?>" />
                        </div>
                        <?php if (isset($_POST['register_student']) && !empty($params['errors']['user_last_name'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_last_name']; ?></span>
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="md:w-10/12 w-full mx-auto my-2">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input name="user_phone_number" type="phone" placeholder="Numéro de téléphone" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['user_phone_number'];}?>" />
                        </div>
                        <?php if (isset($_POST['register_student']) && !empty($params['errors']['user_phone_number'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_phone_number']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-2">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input name="user_email" type="text" placeholder="Adresse mail" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['user_email'];}?>" />
                        </div>
                        <?php if (isset($_POST['register_student']) && !empty($params['errors']['user_email'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_email']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-2">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input name="birth_place" type="text" placeholder="Lieu de naissance" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['birth_place'];}?>" />
                        </div>
                        <?php if (isset($_POST['register_student']) && !empty($params['errors']['birth_place'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['birth_place']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-2">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input name="birth_date" type="date" placeholder="Date de naissance" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['birth_date'];}?>" />
                        </div>
                        <?php if (isset($_POST['register_student']) && !empty($params['errors']['birth_date'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['birth_date']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-2">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input list="civil"  name="civilian_status" type="text" placeholder="Etat civil" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['civilian_status'];}?>" />
                            <datalist id="civil">
                                <option value="Célibataire">Célibataire</option>
                                <option value="Marié(e)">Marié(e)</option>
                                <option value="Divorcé(e)">Divorcé(e)</option>
                                <option value="Veuf(ve)">Veuf(ve)</option>
                            </datalist>
                        </div>
                        <?php if (isset($_POST['register_student']) && !empty($params['errors']['civilian_status'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['civilian_status']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-2">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input list="sex"  name="sex" type="text" placeholder="Sexe" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['sex'];}?>" />
                            <datalist id="sex">
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                                <option value="Binaire">Binaire</option>
                            </datalist>
                        </div>
                        <?php if (isset($_POST['register_student']) && !empty($params['errors']['sex'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['sex']; ?></span>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <!---Identity section end--->

            <!---Address section beginning--->
            <div style="display: none" id="address" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[70%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">2. Votre Adresse</h2>
                </div>
                <div class="px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3  my-3 grid grid-cols-2">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="id_type"  name="id_type" type="text" placeholder="Choisir type de pièce" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['id_type'];}?>" />
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
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['id_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_type']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="id_number" type="text" placeholder="Numéro d'identité" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['id_number'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['id_number'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_number']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-3 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="nationality" type="text" placeholder="Nationalité" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['nationality'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['nationality'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['nationality']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="state" type="text" placeholder="Pronvince / Etat" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['state'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['state'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['state']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="town" type="text" placeholder="Térritoire / Ville" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['town'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['town'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['town']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-3 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="municipality" type="text" placeholder="Collectivité / Secteur / Commune" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['municipality'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['municipality'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['municipality']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="neighborhood" type="text" placeholder="Groupement / Quartier" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['neighborhood'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['neighborhood'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['neighborhood']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="physical_address" type="text" placeholder="Adresse Physique" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['physical_address'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['physical_address'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['physical_address']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid grid-cols-2">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="student_status"  name="student_status" type="text" placeholder="Status Etudiant" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['student_status'];}?>" />
                                <datalist id="student_status">
                                    <option value="Recru(e)">En cours d'admission</option>
                                    <option value="Régulier(ère)">Etudiant en classe montante</option>
                                </datalist>
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['student_status'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['student_status']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <!---Address section end--->

            <!---Orientation section beginning--->
            <div style="display: none" id="orientation" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[60%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">3. Orientation académique</h2>
                </div>
                <div class="px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3  my-3 grid grid-cols-2">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="fac_to_study"  name="fac_to_study" type="text" placeholder="Choisir Faculté / Section" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['fac_to_study'];}?>" />
                                <datalist id="fac_to_study">
                                    <?php foreach ($params['faculties'] as $fac): ?>
                                    <option value="<?=$fac->id?>"><?=$fac->name . " | " . $fac->acronym?></option>
                                    <?php endforeach?>
                                </datalist>
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['fac_to_study'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['fac_to_study']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="department_to_study"  name="department_to_study" type="text" placeholder="Choisir Départément / Option" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['department_to_study'];}?>" />
                                <datalist id="department_to_study">
                                    <?php foreach($params['departments'] as $dep) :?>
                                    <option value="<?=$dep->id?>"><?= $dep->name." | ". $dep->acronym?></option>
                                    <?php endforeach;?>
                                </datalist>
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['department_to_study'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['department_to_study']; ?></span>
                            <?php endif;?>
                        </div>

                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="orientation_to_study" type="text" placeholder="Orientation" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['orientation_to_study'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['orientation_to_study'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['orientation_to_study']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="promotion_to_study" name="promotion_to_study" type="text" placeholder="Promotion" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['promotion_to_study'];}?>" />
                                <datalist id="promotion_to_study">
                                    <?php foreach($params['promotions'] as $prom) :?>
                                    <option value="<?=$prom->id?>"><?= $prom->name." | ". $prom->acronym?></option>
                                    <?php endforeach;?>
                                </datalist>
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['promotion_to_study'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['promotion_to_study']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <!---Orientation section end--->

            <!---Origin section beginning--->
            <div style="display: none" id="origin" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[60%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">4. Vos Origines</h2>
                </div>
                <div class="px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3  my-3 grid grid-cols-2">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="state_origin"  name="state_origin" type="text" placeholder="Choisir Province" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['state_origin'];}?>" />
                                <datalist id="state_origin">
                                    <option value="Bas-Uele">Bas-Uele</option>
                                    <option value="Équateur">Équateur</option>
                                    <option value="Haut-Katanga">Haut-Katanga</option>
                                    <option value="Haut-Lomami">Haut-Lomami</option>
                                    <option value="Haut-Uele">Haut-Uele</option>
                                    <option value="Ituri">Ituri</option>
                                    <option value="Kasaï">Kasaï</option>
                                    <option value="Kasaï central">Kasaï central</option>
                                    <option value="Kasaï oriental">Kasaï oriental</option>
                                    <option value="Kinshasa">Kinshasa</option>
                                    <option value="Kongo-Central">Kongo-Central</option>
                                    <option value="Kwango">Kwango</option>
                                    <option value="Kwilu">Kwilu</option>
                                    <option value="Lomami">Lomami</option>
                                    <option value="Lualaba">Lualaba</option>
                                    <option value="Mai-Ndombe">Mai-Ndombe</option>
                                    <option value="Maniema">Maniema</option>
                                    <option value="Mongala">Mongala</option>
                                    <option value="Nord-Kivu">Nord-Kivu</option>
                                    <option value="Nord-Ubangi">Nord-Ubangi</option>
                                    <option value="Sankuru">Sankuru</option>
                                    <option value="Sud-Kivu">Sud-Kivu</option>
                                    <option value="Sud-Ubangi">Sud-Ubangi</option>
                                    <option value="Tanganyika">Tanganyika</option>
                                    <option value="Tshopo">Tshopo</option>
                                    <option value="Tshuapa">Tshuapa</option>
                                </datalist>
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['state_origin'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['state_origin']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="town_origin" type="text" placeholder="Territoire / Ville" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['town_origin'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['town_origin'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['town_origin']; ?></span>
                            <?php endif;?>
                        </div>

                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="municipality_origin" type="text" placeholder="Collectivité / Secteur / Commune" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['municipality_origin'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['municipality_origin'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['municipality_origin']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="neighborhood_origin" type="text" placeholder="Groupement / Quartier" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['neighborhood_origin'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['neighborhood_origin'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['neighborhood_origin']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <!---Origin section end--->

            <!---Secondary School section beginning--->
            <div style="display: none" id="secondary-school" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[90%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">5. Informations sur l'école sécondaire frequentée</h2>
                </div>
                <div class="px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-1">
                        <div class="w-8/12 focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input   name="name_ss" type="text" placeholder="Nom de l'école secondaire" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['name_ss'];}?>" />
                        </div>
                        <?php if (isset($_POST['register_student']) && !empty($params['errors']['name_ss'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['name_ss']; ?></span>
                            <?php endif;?>
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="state_ss"  name="state_ss" type="text" placeholder="Choisir Province" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['state_ss'];}?>" />
                                <datalist id="state_ss">
                                    <option value="Bas-Uele">Bas-Uele</option>
                                    <option value="Équateur">Équateur</option>
                                    <option value="Haut-Katanga">Haut-Katanga</option>
                                    <option value="Haut-Lomami">Haut-Lomami</option>
                                    <option value="Haut-Uele">Haut-Uele</option>
                                    <option value="Ituri">Ituri</option>
                                    <option value="Kasaï">Kasaï</option>
                                    <option value="Kasaï central">Kasaï central</option>
                                    <option value="Kasaï oriental">Kasaï oriental</option>
                                    <option value="Kinshasa">Kinshasa</option>
                                    <option value="Kongo-Central">Kongo-Central</option>
                                    <option value="Kwango">Kwango</option>
                                    <option value="Kwilu">Kwilu</option>
                                    <option value="Lomami">Lomami</option>
                                    <option value="Lualaba">Lualaba</option>
                                    <option value="Mai-Ndombe">Mai-Ndombe</option>
                                    <option value="Maniema">Maniema</option>
                                    <option value="Mongala">Mongala</option>
                                    <option value="Nord-Kivu">Nord-Kivu</option>
                                    <option value="Nord-Ubangi">Nord-Ubangi</option>
                                    <option value="Sankuru">Sankuru</option>
                                    <option value="Sud-Kivu">Sud-Kivu</option>
                                    <option value="Sud-Ubangi">Sud-Ubangi</option>
                                    <option value="Tanganyika">Tanganyika</option>
                                    <option value="Tshopo">Tshopo</option>
                                    <option value="Tshuapa">Tshuapa</option>
                                </datalist>
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['state_ss'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['state_ss']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="town_ss" type="text" placeholder="Territoire / Ville" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['town_ss'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['town_ss'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['town_ss']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="w-8/12 focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input   name="section_ss" type="text" placeholder="Section suivie (Humanité)" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['section_ss'];}?>" />
                        </div>
                        <?php if (isset($_POST['register_student']) && !empty($params['errors']['section_ss'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['section_ss']; ?></span>
                            <?php endif;?>
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="exetat_center" type="text" placeholder="Centre Exetat" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['exetat_center'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['exetat_center'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['exetat_center']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="diploma_year" type="text" placeholder="Année de l'obtension du diplome" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['diploma_year'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['diploma_year'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['diploma_year']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="exetat_pourcentage" type="number" placeholder="Pourcentage Exetat" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['exetat_pourcentage'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['exetat_pourcentage'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['exetat_pourcentage']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="diploma_number" type="text" placeholder="Numéro du diplome" class="bg-transparent transition-colors duration-diploma_number500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student']) && empty($params['errors']['diploma_number'])) {echo $_POST['diploma_number'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['diploma_number'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['diploma_number']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <!---Secondary School section end--->

            <!---Parents and sponsors section beginning--->
            <div style="display: none" id="parent-sponsors" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[70%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">6. Parents et sponsors</h2>
                </div>
                <div class="px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-3 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="father_name" type="text" placeholder="Nom du père" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['father_name'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['father_name'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['father_name']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="mother_name" type="text" placeholder="Nom de la mère" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['mother_name'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['mother_name'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['mother_name']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="sponsoring_type"  name="sponsoring_type" type="text" placeholder="Choisir type de sponsor" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['sponsoring_type'];}?>" />
                                <datalist id="sponsoring_type">
                                    <option value="1">Pas de bourse</option>
                                    <option value="2">Bourse</option>
                                </datalist>
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['sponsoring_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['sponsoring_type']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-3 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="sponsor_name" type="text" placeholder="Nom Sponsor" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['sponsor_name'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['sponsor_name'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['sponsor_name']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="sponsor_phone_number" type="tel" placeholder="Numéro de téléphone du sponsor" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['sponsor_phone_number'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['sponsor_phone_number'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['sponsor_phone_number']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <!---Parents and sponsors section end--->

            <!---Health section beginning--->
            <div style="display: none" id="health" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[60%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">7. Informations sanitaires</h2>
                </div>
                <div class="px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3  my-3 grid grid-cols-2">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input  name="blood_type" type="text" placeholder="Groupe Sanguin" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['blood_type'];}?>" />

                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['blood_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['blood_type']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input  name="height" type="text" placeholder="Taille" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['height'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['height'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['height']; ?></span>
                            <?php endif;?>
                        </div>

                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="allergies" type="text" placeholder="Allergies" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['allergies'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['allergies'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['allergies']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="handicap" type="text" placeholder="Handicap" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['handicap'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['handicap'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['handicap']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 flex justify-center">
                        <button name="register_student" class="p-1.5 w-fit bg-sky-500 text-white rounded" type="submit">Envoyer le dossier</button>
                    </div>
                </div>
            </div>
            <!---Health section beginning--->

            <!---Docs section beginning--->
            <!---Docs section end--->
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
    <div class="absolute bottom-3 w-full text-white text-center" id="footer">
        <?php include VIEWS.'includes/footer.php'?>
    </div>
</section>