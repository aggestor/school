<?php $personal = $params['personal'] ?>
<section class="w-full flex items-center flex-col justify-center h-full ">
    <main class="h-auto  block w-11/12 border-r-2 border-white border-b-2 mt-28 mb-12 bg-white rounded-lg shadow shadow-gray-400">
        
        <div class="w-11/12 mb-2 mx-auto">
            <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">School Archive Manager.</h2>
            <h2 class="text-black font-semibold text-lg mt-2 text-center">Modification personel personnel : <span class="text-sky-500"><?=$personal->registration_number?></span></h2>
        </div>
        
          <form  method="POST" enctype="multipart/form-data" class="w-full h-auto  flex justify-center flex-col">
            <div  id="identity" class="w-full register-menu grid md:grid-cols-2 grid-cols-1">
                <div class="md:col-span-2 col-span-1 mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">1. Votre identité</h2>
                </div>
                <div class="col-span-1">
                    <div class="mx-auto h-40 w-40 rounded-full relative">
                        <img id="imageContainer" src="/files/users/<?=$personal->picture?>" class="w-full  rounded-full h-full object-cover">
                        <span id="cameraHandle" class="w-8 h-8 cursor-pointer rounded-full text-white grid place-items-center absolute right-1 bottom-4 bg-sky-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" /></svg>
                            </span>
                        <input type="file" id="userProfile" name="user_profile" hidden>
                    </div>
                    <?php if (isset($_POST['save']) && !empty($params['errors']['user_profile'])): ?>
                        <div class=" mt-2 md:w-10/12 w-full text-center mx-auto text-red-500 text-xs"><?php echo $params['errors']['user_profile']; ?></div>
                    <?php endif;?>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input id="registrationNumber" name="registration_number" type="text" placeholder="Matricule" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['registration_number'])) {echo $_POST['registration_number'];}else echo $personal->registration_number?>" />
                        </div>
                        <?php if (isset($_POST['save']) && !empty($params['errors']['registration_number'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['registration_number']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input id="firstName" name="user_first_name" type="text" placeholder="Prénom" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['user_first_name'])) {echo $_POST['user_first_name'];}else echo $personal->first_name?>" />
                        </div>
                        <?php if (isset($_POST['save']) && !empty($params['errors']['user_first_name'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_first_name']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input id="secondName" name="user_second_name" type="text" placeholder="Nom" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['user_second_name'])) {echo $_POST['user_second_name'];}else echo $personal->last_name?>" />
                        </div>
                        <?php if (isset($_POST['save']) && !empty($params['errors']['user_second_name'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_second_name']; ?></span>
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input id="lastName" name="user_last_name" type="text" placeholder="Postnom" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['user_last_name'])) {echo $_POST['user_last_name'];}else echo $personal->last_name?>" />
                        </div>
                        <?php if (isset($_POST['save']) && !empty($params['errors']['user_last_name'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_last_name']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input name="user_phone_number" type="phone" placeholder="Numéro de téléphone" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['user_phone_number'])) {echo $_POST['user_phone_number'];}else echo $personal->phone_number?>" />
                        </div>
                        <?php if (isset($_POST['save']) && !empty($params['errors']['user_phone_number'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_phone_number']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input name="user_email" type="text" placeholder="Adresse mail" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}else echo $personal->mail_address?>" />
                        </div>
                        <?php if (isset($_POST['save']) && !empty($params['errors']['user_email'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_email']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input name="birth_place" type="text" placeholder="Lieu de naissance" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['birth_place'])) {echo $_POST['birth_place'];}else echo $personal->place_of_birth?>" />
                        </div>
                        <?php if (isset($_POST['save']) && !empty($params['errors']['birth_place'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['birth_place']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input name="birth_date" type="date" placeholder="Date de naissance" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['birth_date'])) {echo $_POST['birth_date'];}else echo $personal->date_of_birth?>" />
                        </div>
                        <?php if (isset($_POST['save']) && !empty($params['errors']['birth_date'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['birth_date']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3 flex justify-between space-x-2">
                            <div class="md:w-10/12 w-full mx-auto">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input list="civil"  name="civilian_status" type="text" placeholder="Etat civil" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['civilian_status'])) {echo $_POST['civilian_status'];}else echo $personal->civilian_status?>" />
                            <datalist id="civil">
                                <option value="Célibataire">Célibataire</option>
                                <option value="Marié(e)">Marié(e)</option>
                                <option value="Divorcé(e)">Divorcé(e)</option>
                                <option value="Veuf(ve)">Veuf(ve)</option>
                            </datalist>
                        </div>
                        <?php if (isset($_POST['save']) && !empty($params['errors']['civilian_status'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['civilian_status']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input list="sex"  name="sex" type="text" placeholder="Sexe" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['sex'])) {echo $_POST['sex'];}else echo $personal->sex?>" />
                            <datalist id="sex">
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                                <option value="Binaire">Binaire</option>
                            </datalist>
                        </div>
                        <?php if (isset($_POST['save']) && !empty($params['errors']['sex'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['sex']; ?></span>
                        <?php endif;?>
                    </div>
                    </div>
                </div>
            </div>
            <div  id="address" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[70%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">2. Votre Adresse</h2>
                </div>
                <div class="px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3  my-3 grid grid-cols-2">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="id_type"  name="id_type" type="text" placeholder="Choisir type de pièce" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['id_type'];}else echo $personal->id_type?>" />
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
                            <?php if (isset($_POST['save']) && !empty($params['errors']['id_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_type']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="id_number" type="text" placeholder="Numéro d'identité" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['id_number'];}else echo $personal->id_number?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['id_number'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_number']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-3 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="nationality" type="text" placeholder="Nationalité" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['nationality'];}else echo $personal->nationality?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['nationality'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['nationality']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="state" type="text" placeholder="Pronvince / Etat" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['state'];}else echo $personal->state?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['state'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['state']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="town" type="text" placeholder="Térritoire / Ville" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['town'];}else echo $personal->town?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['town'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['town']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-3 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="municipality" type="text" placeholder="Collectivité / Secteur / Commune" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['municipality'];}else echo $personal->municipality?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['municipality'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['municipality']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="neighborhood" type="text" placeholder="Groupement / Quartier" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['neighborhood'];}else echo $personal->neighborhood?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['neighborhood'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['neighborhood']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="physical_address" type="text" placeholder="Adresse Physique" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['physical_address'];}else echo $personal->physical_address?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['physical_address'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['physical_address']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="orientation" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[60%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">3. Orientation académique</h2>
                </div>
                <div class="px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3  my-3 grid grid-cols-3">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list='fnx'   name="function" type="text" placeholder="Fonction" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['function'])) {echo $_POST['function'];}else echo $personal->fn_id?>" />
                                <datalist id="fnx">
                                    <?php foreach ($params['fnx'] as $fac): ?>
                                    <option value="<?=$fac->id?>"><?=$fac->name?></option>
                                    <?php endforeach?>
                                </datalist>
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['function'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['function']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="academical_status"  name="academical_status" type="text" placeholder="Choisir Status académique" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['academical_status'])) {echo $_POST['academical_status'];}else echo $personal->academical_status?>" />
                                <datalist id="academical_status">
                                    <option value="Permanent">1.Permanent</option>
                                    <option value="Visiteur">2. Visiteur</option>
                                    <option value="Partiel">3. Partiel</option>
                                </datalist>
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['academical_status'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['academical_status']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="personal_type"  name="personal_type" type="text" placeholder="Choisir Type de personnel" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['personal_type'])) {echo $_POST['personal_type'];}else echo $personal->personal_type?>" />
                                <datalist id="personal_type">
                                    <option value="Académique">1.Académique</option>
                                    <option value="Administratif">2. Administratif</option>
                                    <option value="Scientifiaque">3. Scientifiaque</option>
                                    <option value="Techinique et ouvrier">4. Techinique et ouvrier</option>
                                    <option value="Recherche et documentation">5. Recherche et documentation</option>
                                    <option value="En détachement">5. En détachement</option>
                                    <option value="Mise en disponibilité">6. Mise en disponibilité</option>
                                </datalist>
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['academical_status'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['academical_status']; ?></span>
                            <?php endif;?>
                        </div>
                        
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-3 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="academical_level"  name="academical_level" type="text" placeholder="Choisir Niveau académique" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['academical_level'])) {echo $_POST['academical_level'];}else echo $personal->academical_level?>" />
                                <datalist id="academical_level">
                                    <option value="Certificat des Etudes Primaires">CEP.Certificat des Etudes Primaires</option>
                                    <option value="4e Humanités">D4. 4e Humanités</option>
                                    <option value="Diplome d'état">D6. Diplome d'état</option>
                                    <option value="Doctorat">DR. Doctorat</option>
                                    <option value="Graduant">G3. Graduant</option>
                                    <option value="Licence">L2. Licence</option>
                                    <option value="Maîtrise">Msc. Maîtrise</option>
                                    <option value="Poste Primaire">PP5. Poste Primaire</option>
                                    <option value="Sans Formation Scolaire">SFS. Sans Formation Scolaire</option>
                                </datalist>
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['academical_level'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['academical_level']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="academical_grade" type="text" placeholder="Grade academique" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['academical_grade'])) {echo $_POST['academical_grade'];}else echo $personal->academical_grade?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['academical_grade'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['academical_grade']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="fac"  name="fac" type="text" placeholder="Choisir faculté d'attache" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['fac'])) {echo $_POST['fac'];}else echo $personal->f_id?>" />
                                <datalist id="fac">
                                   <?php foreach ($params['faculties'] as $fac): ?>
                                    <option value="<?=$fac->id?>"><?=$fac->name . " | " . $fac->acronym?></option>
                                    <?php endforeach?>
                                </datalist>
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['fac'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['fac']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-3 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="fac_search_domain"  name="fac_search_domain" type="text" placeholder="Choisir faculté de domaine de recherche" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['fac_search_domain'])) {echo $_POST['fac_search_domain'];}else echo $personal->fsd_id?>" />
                                <datalist id="fac_search_domain">
                                    <?php foreach ($params['fsd'] as $fac): ?>
                                    <option value="<?=$fac->id?>"><?=$fac->name . " | " . $fac->acronym?></option>
                                    <?php endforeach?>
                                </datalist>
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['fac_search_domain'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['fac_search_domain']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="search_domain_speciality" type="text" placeholder="Saisir spécialité de recherche" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['search_domain_speciality'])) {echo $_POST['search_domain_speciality'];}else echo $personal->search_domain?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['search_domain_speciality'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['search_domain_speciality']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full relative focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="engagment_date" type="date" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['engagment_date'])) {echo $_POST['engagment_date'];}else echo $personal->engagement_date?>" />
                                <span class="absolute -top-5 border text-sm left-2 rounded focus-within:border-sky-600 p-0.5 bg-gray-200">Date d'engagement</span>
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['engagment_date'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['engagment_date']; ?></span>
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
                                <input list="state_origin"  name="state_origin" type="text" placeholder="Choisir Province" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['state_origin'];}else echo $personal->state_origin?>" />
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
                            <?php if (isset($_POST['save']) && !empty($params['errors']['state_origin'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['state_origin']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="town_origin" type="text" placeholder="Territoire / Ville" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['town_origin'];}else echo $personal->town_origin?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['town_origin'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['town_origin']; ?></span>
                            <?php endif;?>
                        </div>

                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="municipality_origin" type="text" placeholder="Collectivité / Secteur / Commune" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['municipality_origin'];}else echo $personal->municipality_origin?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['municipality_origin'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['municipality_origin']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="neighborhood_origin" type="text" placeholder="Groupement / Quartier" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['neighborhood_origin'];}else echo $personal->neighborhood_origin?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['neighborhood_origin'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['neighborhood_origin']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: none" id="payment" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[90%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">5. Etat de paie</h2>
                </div>
                <div class="px-8 grid grid-cols-1 col-span-2">
                    
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="base_salary" type="text" placeholder="Salaire de base" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['base_salary'])) {echo $_POST['base_salary'];}else echo $personal->base_salary?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['base_salary'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['base_salary']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="prime" type="text" placeholder="Prime" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['prime'])) {echo $_POST['prime'];}else echo $personal->prime?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['prime'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['prime']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <div  id="health" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[60%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">7. Informations sanitaires</h2>
                </div>
                <div class="px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3  my-3 grid grid-cols-2">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input  name="blood_type" type="text" placeholder="Groupe Sanguin" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['blood_type'])) {echo $_POST['blood_type'];}else echo $personal->blood_type?>" />
                                
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['blood_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['blood_type']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="department_to_study"  name="height" type="text" placeholder="Taille" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['height'])) {echo $_POST['height'];}else echo $personal->height?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['height'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['height']; ?></span>
                            <?php endif;?>
                        </div>
                        
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="allergies" type="text" placeholder="Allergies" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['allergies'])) {echo $_POST['allergies'];}else echo $personal->allergies?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['allergies'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['allergies']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="handicap" type="text" placeholder="Handicap" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['handicap'])) {echo $_POST['handicap'];}else echo $personal->handicaps?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['handicap'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['handicap']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
             <div  id="parent-sponsors" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[70%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">8. Mot de passe</h2>
                </div>
                <div class="px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-3 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="old_password" type="text" placeholder="Ancien mot de passe" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['old_password'];}?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['old_password'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['old_password']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="new_password" type="text" placeholder="Nouveau mot de passe" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['new_password'];}?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['new_password'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['new_password']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="repeat_password" type="text" placeholder="Retaper le nouveau mot de passe" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['repeat_password'];}?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['repeat_password'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['repeat_password']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    </div>
                </div>
                    <div class="col-span-2 md:space-x-3  my-3 flex justify-center">
                        <button name="save" class="p-1.5 w-fit bg-sky-500 text-white rounded fles justify-between items-center" type="submit">Enregistrer les modification <span class="fas fa-save mt-1 mr-2"></span></button>
                    </div>
                </div>
            </div>
          </form>
        <!--End first section/hero-->
    </main>
    
    <div class=" w-full text-gray-600 text-center" id="footer"><?php include VIEWS.'includes/footer.php'?></div>
</section>