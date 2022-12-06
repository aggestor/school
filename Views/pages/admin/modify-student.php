<?php $student = $params['student']?>
<section class="w-full flex items-center justify-center">
    <main class="h-full block w-11/12 border-r-2 border-white border-b-2 bg-white rounded-lg shadow shadow-gray-400">
        <div class="w-11/12 mb-2 mx-auto">
            <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">School Archive Manager.</h2>
            <h2 class="text-black font-semibold text-lg mt-2 text-center">Modification étudiant : <span class="text-sky-500"><?=$student->registration_number?></span></h2>
        </div>
          <form enctype="multipart/form-data" method="POST" class="md:w-full w-11/12 mx-auto h-auto overflow-auto flex justify-center flex-col">
            <!---Identity section beginning--->
            <div  id="identity" class="w-full register-menu grid md:grid-cols-2 grid-cols-1">
                <div class="md:col-span-2 col-span-1 mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">1. Votre identité</h2>
                </div>
                <div class="col-span-1">
                    <div class="mx-auto h-40 w-40 rounded-full relative">
                        <img id="imageContainer" src="/files/users/<?=$student->picture?>" class="w-full  rounded-full h-full object-cover">
                        <span id="cameraHandle" class="w-8 h-8 cursor-pointer rounded-full text-white grid place-items-center absolute right-1 bottom-4 bg-sky-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" /></svg>
                            </span>
                        <input value="/files/users/<?=$student->picture?>" type="file" id="userProfile" name="user_profile" hidden>
                    </div>
                    <?php if (isset($_POST['register_student']) && !empty($params['errors']['user_profile'])): ?>
                        <div class=" mt-2 md:w-10/12 w-full text-center mx-auto text-red-500 text-xs"><?php echo $params['errors']['user_profile']; ?></div>
                    <?php endif;?>
                    <div class="md:w-10/12 w-full mx-auto my-2">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input id="firstName" name="user_first_name" type="text" placeholder="Prénom" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['user_first_name'];} else echo $student->first_name?>" />
                        </div>
                        <?php if (isset($_POST['register_student']) && !empty($params['errors']['user_first_name'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_first_name']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-2">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input id="secondName" name="user_second_name" type="text" placeholder="Nom" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['user_second_name'];}else echo $student->second_name?>" />
                        </div>
                        <?php if (isset($_POST['register_student']) && !empty($params['errors']['user_second_name'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_second_name']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-2">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input id="lastName" name="user_last_name" type="text" placeholder="Postnom" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['user_last_name'];}else echo $student->last_name?>" />
                        </div>
                        <?php if (isset($_POST['register_student']) && !empty($params['errors']['user_last_name'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_last_name']; ?></span>
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="md:w-10/12 w-full mx-auto my-2">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input name="user_phone_number" type="phone" placeholder="Numéro de téléphone" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['user_phone_number'];}else echo $student->phone_number?>" />
                        </div>
                        <?php if (isset($_POST['register_student']) && !empty($params['errors']['user_phone_number'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_phone_number']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-2">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input name="user_email" type="text" placeholder="Adresse mail" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['user_email'];}else echo $student->mail_address?>" />
                        </div>
                        <?php if (isset($_POST['register_student']) && !empty($params['errors']['user_email'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_email']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-2">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input name="birth_place" type="text" placeholder="Lieu de naissance" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['birth_place'];} else echo $student->place_of_birth?>" />
                        </div>
                        <?php if (isset($_POST['register_student']) && !empty($params['errors']['birth_place'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['birth_place']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-2">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input name="birth_date" type="date" placeholder="Date de naissance" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['birth_date'];}else echo $student->date_of_birth?>" />
                        </div>
                        <?php if (isset($_POST['register_student']) && !empty($params['errors']['birth_date'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['birth_date']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-2">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input list="civil"  name="civilian_status" type="text" placeholder="Etat civil" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['civilian_status'];}else echo $student->civilian_status?>" />
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
                            <input list="sex"  name="sex" type="text" placeholder="Sexe" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['sex'];}else echo $student->sex?>" />
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
            <div  id="address" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[70%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">2. Votre Adresse</h2>
                </div>
                <div class="md:px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3 space-y-2 md:space-y-0  grid-cols-1 my-3 grid md:grid-cols-2">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="id_type"  name="id_type" type="text" placeholder="Choisir type de pièce" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['id_type'];}else echo $student->id_type?>" />
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
                                <input name="id_number" type="text" placeholder="Numéro d'identité" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['id_number'];}else echo $student->id_number?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['id_number'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_number']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3 space-y-2 md:space-y-0  my-3 grid md:grid-cols-3 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="nationality" type="text" placeholder="Nationalité" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['nationality'];}else echo $student->nationality?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['nationality'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['nationality']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="state" type="text" placeholder="Pronvince / Etat" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['state'];}else echo $student->state?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['state'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['state']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="town" type="text" placeholder="Térritoire / Ville" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['town'];}else echo $student->town?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['town'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['town']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3 space-y-2 md:space-y-0  my-3 grid md:grid-cols-3 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="municipality" type="text" placeholder="Collectivité / Secteur / Commune" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['municipality'];}else echo $student->municipality?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['municipality'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['municipality']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="neighborhood" type="text" placeholder="Groupement / Quartier" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['neighborhood'];}else echo $student->neighborhood?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['neighborhood'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['neighborhood']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="physical_address" type="text" placeholder="Adresse Physique" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['physical_address'];}else echo $student->physical_address?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['physical_address'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['physical_address']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3 space-y-2 md:space-y-0  my-3 grid  grid-cols-1 md:grid-cols-2">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="student_status"  name="student_status" type="text" placeholder="Status Etudiant" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['student_status'];}else echo $student->student_status?>" />
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
            <div  id="orientation" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[60%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">3. Orientation académique</h2>
                </div>
                <div class="md:px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3 space-y-2 md:space-y-0  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="fac_to_study"  name="fac_to_study" type="text" placeholder="Choisir Faculté / Section" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['fac_to_study'];}else echo $student->f_id?>" />
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
                                <input list="department_to_study"  name="department_to_study" type="text" placeholder="Choisir Départément / Option" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['department_to_study'];}else echo $student->d_id?>" />
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
                    <div class="col-span-2 md:space-x-3  space-y-2 md:space-y-0 my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="orientation_to_study" type="text" placeholder="Orientation" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['orientation_to_study'];}else echo $student->orientation?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['orientation_to_study'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['orientation_to_study']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="promotion_to_study" name="promotion_to_study" type="text" placeholder="Promotion" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['promotion_to_study'];}else echo $student->p_id?>" />
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
            <div  id="origin" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[60%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">4. Vos Origines</h2>
                </div>
                <div class="md:px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3 space-y-2 md:space-y-0  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="state_origin"  name="state_origin" type="text" placeholder="Choisir Province" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['state_origin'];}else echo $student->state_origin?>" />
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
                                <input   name="town_origin" type="text" placeholder="Territoire / Ville" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['town_origin'];}else echo $student->town_origin?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['town_origin'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['town_origin']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3 space-y-2 md:space-y-0  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="municipality_origin" type="text" placeholder="Collectivité / Secteur / Commune" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['municipality_origin'];}else echo $student->municipality_origin?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['municipality_origin'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['municipality_origin']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="neighborhood_origin" type="text" placeholder="Groupement / Quartier" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['neighborhood_origin'];}else echo $student->neighborhood_origin?>" />
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
            <div id="secondary-school" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[90%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">5. Informations sur l'école sécondaire frequentée</h2>
                </div>
                <div class="md:px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-1 md:col-span-2">
                        <div class="md:w-8/12 w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input   name="name_ss" type="text" placeholder="Nom de l'école secondaire" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['name_ss'];}else echo $student->clg_name?>" />
                        </div>
                        <?php if (isset($_POST['register_student']) && !empty($params['errors']['name_ss'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['name_ss']; ?></span>
                            <?php endif;?>
                    </div>
                    <div class="col-span-2 md:space-x-3 space-y-2 md:space-y-0  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="state_ss"  name="state_ss" type="text" placeholder="Choisir Province" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['state_ss'];}else echo $student->clg_state?>" />
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
                                <input   name="town_ss" type="text" placeholder="Territoire / Ville" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['town_ss'];}else echo $student->clg_town?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['town_ss'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['town_ss']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-1 md:col-span-2">
                        <div class="md:w-8/12 w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input   name="section_ss" type="text" placeholder="Section suivie (Humanité)" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['section_ss'];}else echo $student->clg_section_studied?>" />
                        </div>
                        <?php if (isset($_POST['register_student']) && !empty($params['errors']['section_ss'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['section_ss']; ?></span>
                            <?php endif;?>
                    </div>
                    <div class="col-span-2 md:space-x-3 space-y-2 md:space-y-0  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="exetat_center" type="text" placeholder="Centre Exetat" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['exetat_center'];}else echo $student->clg_l_e_center?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['exetat_center'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['exetat_center']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="diploma_year" type="text" placeholder="Année de l'obtension du diplome" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['diploma_year'];}else echo $student->clg_l_e_year?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['diploma_year'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['diploma_year']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3 space-y-2 md:space-y-0  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="exetat_pourcentage" type="number" placeholder="Pourcentage Exetat" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['exetat_pourcentage'];}else echo $student->clg_l_e_percentage?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['exetat_pourcentage'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['exetat_pourcentage']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="diploma_number" type="text" placeholder="Numéro du diplome" class="bg-transparent transition-colors duration-diploma_number500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student']) && empty($params['errors']['diploma_number'])) {echo $_POST['diploma_number'];}else echo $student->clg_diploma_number?>" />
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
            <div  id="parent-sponsors" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[70%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">6. Parents et sponsors</h2>
                </div>
                <div class="md:px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3 md:space-y-0 space-y-2  my-3 grid md:grid-cols-3 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="father_name" type="text" placeholder="Nom du père" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['father_name'];}else echo $student->ps_father?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['father_name'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['father_name']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="mother_name" type="text" placeholder="Nom de la mère" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['mother_name'];}else echo $student->ps_mother?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['mother_name'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['mother_name']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="sponsoring_type"  name="sponsoring_type" type="text" placeholder="Choisir type de sponsor" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['sponsoring_type'];}else echo $student->ps_type_sponsor?>" />
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
                    <div class="col-span-2 md:space-x-3 md:space-y-0 space-y-2  my-3 grid md:grid-cols-3 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="sponsor_name" type="text" placeholder="Nom Sponsor" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['sponsor_name'];}else echo $student->ps_sponsor?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['sponsor_name'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['sponsor_name']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="sponsor_phone_number" type="tel" placeholder="Numéro de téléphone du sponsor" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['sponsor_phone_number'];}else echo $student->ps_phone_number?>" />
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
            <div  id="health" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[60%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">7. Informations sanitaires</h2>
                </div>
                <div class="md:px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3 md:space-y-0 space-y-2  my-3 grid grid-cols-1 md:grid-cols-2">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input  name="blood_type" type="text" placeholder="Groupe Sanguin" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if(isset($_POST['register_student'])){echo $_POST['blood_type'];}else echo $student->blood_type?>"/>
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['blood_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['blood_type']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input  name="height" type="text" placeholder="Taille" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if(isset($_POST['register_student'])){echo $_POST['height'];}else echo $student->height?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['height'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['height']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3 md:space-y-0 space-y-2  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="allergies" type="text" placeholder="Allergies" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['allergies'];}else echo $student->allergies?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['allergies'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['allergies']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="handicap" type="text" placeholder="Handicap" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['handicap'];}else echo $student->handicaps?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['handicap'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['handicap']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>

            <div  id="parent-sponsors" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[70%]">
                <!-- <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">8. Mot de passe</h2>
                </div> -->
                <div style="display:none ;" class="px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-3 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="old_password" type="text" placeholder="Ancien mot de passe" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['old_password'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['old_password'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['old_password']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="new_password" type="text" placeholder="Nouveau mot de passe" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['new_password'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['new_password'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['new_password']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="repeat_password" type="text" placeholder="Retaper le nouveau mot de passe" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_student'])) {echo $_POST['repeat_password'];}?>" />
                            </div>
                            <?php if (isset($_POST['register_student']) && !empty($params['errors']['repeat_password'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['repeat_password']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    </div>
                </div>
                    <div class="col-span-2 md:space-x-3  my-3 flex justify-center">
                        <button name="register_student" class="p-1.5 w-fit bg-sky-500 text-white rounded fles justify-between items-center" type="submit">Enregistrer les modification <span class="fas fa-save mt-1 mr-2"></span></button>
                    </div>
                </div>
            </div>
          </form>
        <!--End first section/hero-->
    </main>
</section>