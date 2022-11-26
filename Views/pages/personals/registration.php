<section class="w-full relative flex items-center justify-center overflow-hidden h-full bg-white">
    <main class="h-[580px] z-10 block w-8/12 border-r-2 border-white border-b-2 bg-white rounded-lg shadow shadow-gray-400">
        
        <div class="w-11/12 mb-2 mx-auto">
            <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">School Archive Manager.</h2>
            <h2 class="text-black font-semibold text-lg mt-2 text-center">Identification personnel.</h2>
        </div>
        <div class="relative menu h-10 mb-2 flex justify-between items-center w-11/12 mx-auto">
            <a href="#identity" class="w-8 h-8 hover:text-white hover:bg-sky-500 cursor-pointer transition-colors duration-500 bg-white z-10 rounded-full border-2 border-sky-500 grid place-items-center text-sky-500 text-lg font-semibold">1</a>
            <a href="#address" class="w-8 h-8 hover:text-white hover:bg-sky-500 cursor-pointer transition-colors duration-500 bg-white z-10 rounded-full border-2 border-sky-500 grid place-items-center text-sky-500 text-lg font-semibold">2</a>
            <a href="#orientation" class="w-8 h-8 hover:text-white hover:bg-sky-500 cursor-pointer transition-colors duration-500 bg-white z-10 rounded-full border-2 border-sky-500 grid place-items-center text-sky-500 text-lg font-semibold">3</a>
            <a href="#origin" class="w-8 h-8 hover:text-white hover:bg-sky-500 cursor-pointer transition-colors duration-500 bg-white z-10 rounded-full border-2 border-sky-500 grid place-items-center text-sky-500 text-lg font-semibold">4</a>
            <a href="#payment" class="w-8 h-8 hover:text-white hover:bg-sky-500 cursor-pointer transition-colors duration-500 bg-white z-10 rounded-full border-2 border-sky-500 grid place-items-center text-sky-500 text-lg font-semibold">5</a>
            <a href="#health" class="w-8 h-8 hover:text-white hover:bg-sky-500 cursor-pointer transition-colors duration-500 bg-white z-10 rounded-full border-2 border-sky-500 grid place-items-center text-sky-500 text-lg font-semibold">6</a>
            <div class="h-1 border-t-4 bottom-4 border-sky-500 w-full absolute"></div>
        </div>
          <form  method="POST" enctype="multipart/form-data" class="w-full h-[78%] overflow-auto flex justify-center flex-col">
            <div style="display: none" id="identity" class="w-full register-menu grid md:grid-cols-2 grid-cols-1">
                <div class="md:col-span-2 col-span-1 mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">1. Votre identité</h2>
                </div>
                <div class="col-span-1">
                    <div id="camera" style="display: none;" class="w-56 mx-auto h-auto rounded border-2 border-sky-500 relative">
                        <video class="object-cover" id="video" autoplay height="320" width="320"></video>
                        <span id="capture" class="w-9 h-9 cursor-pointer rounded-full text-white grid place-items-center absolute left-24  bottom-2 bg-sky-500">
                            <span class="fas fa-camera"></span>
                        </span>
                    </div>
                    <canvas hidden id="canvas" height="320" width="320"></canvas>
                    <div id="imaged" class="mx-auto h-40 w-40 rounded-full relative">
                        <img id="imageContainer" src="/assets/images/output-onlinepngtools.png" class="w-full  rounded-full h-full object-cover">
                        <span id="cameraHandle" class="w-8 h-8 cursor-pointer rounded-full text-white grid place-items-center absolute right-1 bottom-4 bg-sky-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" /></svg>
                            </span>
                        <span id="picHandle" class="w-8 h-8 cursor-pointer rounded-full text-white grid place-items-center absolute left-1 bottom-4 bg-sky-500">
                            <span class="fas fa-camera"></span>
                        </span>
                        <input type="file" id="userProfile" name="user_profile" hidden>
                    </div>
                    <?php if (isset($_POST['save']) && !empty($params['errors']['user_profile'])): ?>
                        <div class=" mt-2 md:w-10/12 w-full text-center mx-auto text-red-500 text-xs"><?php echo $params['errors']['user_profile']; ?></div>
                    <?php endif;?>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input id="registrationNumber" name="registration_number" type="text" placeholder="Matricule" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['registration_number'])) {echo $_POST['registration_number'];}?>" />
                        </div>
                        <?php if (isset($_POST['save']) && !empty($params['errors']['registration_number'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['registration_number']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input id="firstName" name="user_first_name" type="text" placeholder="Prénom" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['user_first_name'])) {echo $_POST['user_first_name'];}?>" />
                        </div>
                        <?php if (isset($_POST['save']) && !empty($params['errors']['user_first_name'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_first_name']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input id="secondName" name="user_second_name" type="text" placeholder="Nom" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['user_second_name'])) {echo $_POST['user_second_name'];}?>" />
                        </div>
                        <?php if (isset($_POST['save']) && !empty($params['errors']['user_second_name'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_second_name']; ?></span>
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input id="lastName" name="user_last_name" type="text" placeholder="Postnom" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['user_last_name'])) {echo $_POST['user_last_name'];}?>" />
                        </div>
                        <?php if (isset($_POST['save']) && !empty($params['errors']['user_last_name'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_last_name']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input name="user_phone_number" type="phone" placeholder="Numéro de téléphone" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['user_phone_number'])) {echo $_POST['user_phone_number'];}?>" />
                        </div>
                        <?php if (isset($_POST['save']) && !empty($params['errors']['user_phone_number'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_phone_number']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input name="user_email" type="text" placeholder="Adresse mail" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                        </div>
                        <?php if (isset($_POST['save']) && !empty($params['errors']['user_email'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_email']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input name="birth_place" type="text" placeholder="Lieu de naissance" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['birth_place'])) {echo $_POST['birth_place'];}?>" />
                        </div>
                        <?php if (isset($_POST['save']) && !empty($params['errors']['birth_place'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['birth_place']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input name="birth_date" type="date" placeholder="Date de naissance" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['birth_date'])) {echo $_POST['birth_date'];}?>" />
                        </div>
                        <?php if (isset($_POST['save']) && !empty($params['errors']['birth_date'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['birth_date']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="md:w-10/12 w-full mx-auto my-3 flex justify-between space-x-2">
                            <div class="md:w-10/12 w-full mx-auto">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input list="civil"  name="civilian_status" type="text" placeholder="Etat civil" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['civilian_status'])) {echo $_POST['civilian_status'];}?>" />
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
                            <input list="sex"  name="sex" type="text" placeholder="Sexe" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['sex'])) {echo $_POST['sex'];}?>" />
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
            <div style="display: none" id="address" class="w-full register-container grid grid-cols-1 md:grid-cols-2 h-[70%]">
                <div class="col-span-2  mb-2 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl mt-2 text-center">2. Votre Adresse</h2>
                </div>
                <div class="px-8 grid grid-cols-1 col-span-2">
                    <div class="col-span-2 md:space-x-3  my-3 grid grid-cols-2">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="id_type"  name="id_type" type="text" placeholder="Choisir type de pièce" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['id_type'];}?>" />
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
                                <input name="id_number" type="text" placeholder="Numéro d'identité" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['id_number'];}?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['id_number'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['id_number']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-3 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="nationality" type="text" placeholder="Nationalité" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['nationality'];}?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['nationality'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['nationality']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="state" type="text" placeholder="Pronvince / Etat" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['state'];}?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['state'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['state']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="town" type="text" placeholder="Térritoire / Ville" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['town'];}?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['town'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['town']; ?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-3 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="municipality" type="text" placeholder="Collectivité / Secteur / Commune" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['municipality'];}?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['municipality'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['municipality']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="neighborhood" type="text" placeholder="Groupement / Quartier" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['neighborhood'];}?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['neighborhood'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['neighborhood']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="physical_address" type="text" placeholder="Adresse Physique" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['physical_address'];}?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['physical_address'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['physical_address']; ?></span>
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
                    <div class="col-span-2 md:space-x-3  my-3 grid grid-cols-3">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list='fnx'   name="function" type="text" placeholder="Fonction" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['function'])) {echo $_POST['function'];}?>" />
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
                                <input list="academical_status"  name="academical_status" type="text" placeholder="Choisir Status académique" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['academical_status'])) {echo $_POST['academical_status'];}?>" />
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
                                <input list="personal_type"  name="personal_type" type="text" placeholder="Choisir Type de personnel" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['personal_type'])) {echo $_POST['personal_type'];}?>" />
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
                                <input list="academical_level"  name="academical_level" type="text" placeholder="Choisir Niveau académique" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['academical_level'])) {echo $_POST['academical_level'];}?>" />
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
                                <input   name="academical_grade" type="text" placeholder="Grade academique" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['academical_grade'])) {echo $_POST['academical_grade'];}?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['academical_grade'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['academical_grade']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="fac"  name="fac" type="text" placeholder="Choisir faculté d'attache" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['fac'])) {echo $_POST['fac'];}?>" />
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
                                <input list="fac_search_domain"  name="fac_search_domain" type="text" placeholder="Choisir faculté de domaine de recherche" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['fac_search_domain'])) {echo $_POST['fac_search_domain'];}?>" />
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
                                <input   name="search_domain_speciality" type="text" placeholder="Saisir spécialité de recherche" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['search_domain_speciality'])) {echo $_POST['search_domain_speciality'];}?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['search_domain_speciality'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['search_domain_speciality']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full relative focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="engagment_date" type="date" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['engagment_date'])) {echo $_POST['engagment_date'];}?>" />
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
                                <input list="state_origin"  name="state_origin" type="text" placeholder="Choisir Province" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['state_origin'];}?>" />
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
                                <input   name="town_origin" type="text" placeholder="Territoire / Ville" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['town_origin'];}?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['town_origin'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['town_origin']; ?></span>
                            <?php endif;?>
                        </div>

                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="municipality_origin" type="text" placeholder="Collectivité / Secteur / Commune" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['municipality_origin'];}?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['municipality_origin'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['municipality_origin']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="neighborhood_origin" type="text" placeholder="Groupement / Quartier" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save'])) {echo $_POST['neighborhood_origin'];}?>" />
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
                                <input   name="base_salary" type="text" placeholder="Salaire de base" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['base_salary'])) {echo $_POST['base_salary'];}?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['base_salary'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['base_salary']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="prime" type="text" placeholder="Prime" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['prime'])) {echo $_POST['prime'];}?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['prime'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['prime']; ?></span>
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
                                <input  name="blood_type" type="text" placeholder="Groupe Sanguin" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['blood_type'])) {echo $_POST['blood_type'];}?>" />
                                
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['blood_type'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['blood_type']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input list="department_to_study"  name="height" type="text" placeholder="Taille" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['height'])) {echo $_POST['height'];}?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['height'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['height']; ?></span>
                            <?php endif;?>
                        </div>
                        
                    </div>
                    <div class="col-span-2 md:space-x-3  my-3 grid md:grid-cols-2 grid-cols-1">
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input   name="allergies" type="text" placeholder="Allergies" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['allergies'])) {echo $_POST['allergies'];}?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['allergies'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['allergies']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-1">
                            <div class="w-full focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                                <input name="handicap" type="text" placeholder="Handicap" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save']) && empty($params['errors']['handicap'])) {echo $_POST['handicap'];}?>" />
                            </div>
                            <?php if (isset($_POST['save']) && !empty($params['errors']['handicap'])): ?>
                                <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['handicap']; ?></span>
                            <?php endif;?>
                        </div>
                        <div class="col-span-2">
                                <div class="mt-3 w-10/12 mx-auto flex justify-center items-center">
                                    <button name="save" class="flex transition-all duration-500 justify-between items-center h-10 px-2 w-fit py-1 bg-sky-500 font-semibold hover:bg-sky-600 text-white rounded hover:shadow-lg hover:shadow-gray-300"> Envoyer le dossier <svg class="ml-2 h-6" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></button>
                            </div>
                        </div>
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
    <div class="absolute bottom-3 w-full text-white text-center" id="footer"><?php include VIEWS.'includes/footer.php'?></div>
</section>