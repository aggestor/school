<div class="w-full h-full flex justify-center items-center">
    <div class="md:w-6/12 w-full  shadow bg-white h-[400px] rounded">
    <form method="POST" enctype="multipart/form-data" class="md:w-full w-11/12 mx-auto h-full flex justify-center flex-col">
                <div class="md:w-10/12 w-11/12 mb-8 flex mx-auto">
                    <a class="h-8 w-8 rounded-full bg-sky-500 text-white grid place-items-center" href="javascript:history.go(-1)"><span class="fas fa-arrow-left"></span></a><h2 class="text-black text-center w-[90%] font-semibold text-lg">Modifier votre <?=$params['doc']->type?>.</h2>
                </div>
                <div class="md:w-10/12 w-full mx-auto my-2">
                    <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                        <input  name="type" type="text" list='types' placeholder="Type du dossier" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['add-doc']) && empty($params['errors']['type'])) {echo $_POST['type'];} else echo $params['doc']->type?>" />
                        <datalist id="types">
                                    <option value="Attestation de naissance">Attestation de naissance</option>
                                    <option value="Diplome d'état">Diplome d'état</option>
                                    <option value="Certificat Ecole primaire">Certificat Ecole primaire</option>
                                </datalist>
                    </div>
                    <?php if (isset($_POST['add-doc']) && !empty($params['errors']['type'])): ?>
                        <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['type']; ?></span>
                    <?php endif;?>
                </div>
                <input accept="application/pdf" type="file" hidden id="fileHolder" name="document">
                <div class="md:w-10/12 w-full flex justify-between mx-auto my-4">
                    <button type="button" id="docPicker"  class="bg-white font-semibold text-sky-500 p-2 md:w-4/12 w-fit h-10 hover:bg-sky-600 transition-colors border-2 hover:text-white border-sky-500 duration-500 justify-center items-center rounded">Choisir le dossier <span class="fas fa-folder ml-1"></span></button>
                    <button type="submit" name="add-doc" class="bg-sky-500 font-semibold text-white p-2 md:w-4/12 w-fit h-10 hover:bg-sky-600 transition-colors duration-500 justify-center items-center rounded">Enregistrer <span class="fas fa-check-circle ml-1"></span></button>
                </div>
                <div class="md:w-10/12 mx-auto">
                    <?php if (isset($_POST['add-doc']) && !empty($params['errors']['document'])): ?>
                        <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['document']; ?></span>
                    <?php endif;?>
                </div>
          </form>
</div>

</div>