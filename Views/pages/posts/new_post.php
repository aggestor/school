<div class="w-[99%] p-6 min-h-[550px] bg-white mx-auto rounded shadow shadow-gray-400">
    <form method="POST" action="/posts/new" enctype="multipart/form-data">
            <h1 class="text-indigo-600 text-3xl font-semibold flex"> <span class="w-10 h-10 rounded-full grid place-items-center bg-indigo-600 text-white mr-3"><i class="fas fa-pen text-xl"></i></span> Ecrivez un article</h1>
        <?php if(isset($_POST['save_post']) && isset($params['errors']) &&  is_array($params['errors'])): ?>
            <div id="error-panel" class="bg-slate-200 rounded relative my-3 p-3 w-fit flex flex-col">
                <p class="font-semibold mb-2">Voici  les erreurs commises :</p>
        
                <ul class="pl-3">
                <?php if(isset($_POST['save_post']) &&  isset($params['errors']) && is_array($params['errors'])) foreach($params['errors'] as $k=> $v): ?>
                    <li class="text-red-600"> <span class="fa-times-circle fas mr-2"></span><?= $v?></li>
                <?php endforeach;?>
                </ul>
                <span id="error-panel-hider" class="w-8 h-8 grid place-items-center cursor-pointer rounded bg-slate-100 absolute right-1 top-1"><span class="fa fa-minus text-gray-800 text-lg"></span></span>
            </div>
        <?php endif;?>
        <div class="my-3 flex flex-col">
                <div class="flex my-3">
                    <div class="focus-within:font-semibold text-gray-800 focus-within:text-indigo-600 group focus-within:border-indigo-600 h-10 px-2 items-center flex rounded border-2 bg-slate-200 transition-all duration-500 w-7/12  border-transparent">
                        <input id="title" name="title" type="text" placeholder="Titre de votre post" class="bg-transparent placeholder:text-gray-600 focus:text-indigo-600 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['save_post']) && empty($params['errors']['title'])) { echo $_POST['title'];}?>" />
                    </div>
                    <input type="file" style="display: none;" name="file[]" id="thumbnail">
                    <input type="file" style="display: none;" name="post_file" id="file">
                </div>
                <div class="focus-within:font-semibold text-gray-800 focus-within:text-indigo-600 group focus-within:border-indigo-600 h-10 px-2 items-center flex rounded border-2 bg-slate-200 transition-all duration-500 w-5/12  border-transparent">
                      <select id="types_selector" name="type" class=" text-gray-700 bg-transparent scroll outline-none w-full">
                        <option  value="" Selected>Choisir type de post</option>
                        <!-- <option  value="1">USA (+1)</option> -->
                        <optgroup class="bg-slate-200 hover:bg-indigo-600" label="Types de post">
                            <option value="article">Article</option>
                            <option value="offer">Offre</option>                                        
                            <option value="gallery">Galerie</option>                                        
                        </optgroup>
                    </select>  
                </div>
                <div class="flex buttons w-3/12 my-3 justify-between">
                    <button type="button" id="imagePicker" class="bg-indigo-600 text-white px-3 py-2 rounded hover:shadow hover:shadow-gray-500 hover:bg-indigo-800 duration-500 transition-colors  flex items-center font-semibold justify-between">Baniere <i class="fas fa-images ml-3"></i></button>
                    <button type="button" id="filePicker" class="bg-white border-2 border-indigo-600 px-3 py-2 rounded font-semibold text-indigo-600 hover:shadow hover:shadow-gray-500 transition-all duration-500 flex items-center justify-between">Fichier <i class="fas fa-file ml-3"></i></button>
                </div>
        </div>
        <div id="cnt">
            <textarea name="content" class="bg-slate-200" id="editor" cols="30" rows="10"></textarea>
        </div>
            <div style="display:none;" id="drag_drop_area" class=" h-72 w-8/12 flex items-center justify-center bg-slate-200 rounded">
                    <div class="flex flex-col">
                            <span class="fas fa-image mx-auto text-2xl"></span>
                            <span class="mt-1 font-semibold text-gray-800 text-center">Deposer ou coller une ou plusieurs images ici !</span>
                    </div>
            </div>
        <div class="my-3">
            <button type="submit" name="save_post" class="bg-indigo-600 text-white px-3 py-2 rounded hover:shadow hover:shadow-gray-500 hover:bg-indigo-800 duration-500 transition-colors  flex items-center font-semibold justify-between">Enregistrer <span class="fas fa-save ml-3"></span></button>
        </div>
    </form>

</div>