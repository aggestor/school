<div class="w-full h-full flex justify-center items-center">
    <div class="md:w-6/12 w-full  shadow bg-white h-[400px] rounded">
    <form method="POST" class="md:w-full w-11/12 mx-auto h-full flex justify-center flex-col">
                <div class="md:w-10/12 w-11/12 mb-8 flex mx-auto">
                    <a class="h-8 w-8 rounded-full bg-sky-500 text-white grid place-items-center" href="javascript:history.go(-1)"><span class="fas fa-arrow-left"></span></a><h2 class="text-black text-center w-[90%] font-semibold text-lg">Modifier une promotion.</h2>
                </div>
                <div class="md:w-10/12 w-full mx-auto my-2">
                    <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                        <input  name="name" type="text" placeholder="Nom" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_admin']) && empty($params['errors']['name'])) {echo $_POST['name']; }else echo $params['data']->name;?>" />
                    </div>
                    <?php if (isset($_POST['register_admin']) && !empty($params['errors']['name'])): ?>
                        <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['name']; ?></span>
                    <?php endif;?>
                </div>
                <div class="md:w-10/12 w-full mx-auto my-2">
                    <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                        <input  name="acronym" type="text" placeholder="Acronyme" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_admin']) && empty($params['errors']['acronym'])) {echo $_POST['acronym'];} else echo $params['data']->acronym?>" />
                    </div>
                    <?php if (isset($_POST['register_admin']) && !empty($params['errors']['acronym'])): ?>
                        <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['acronym']; ?></span>
                    <?php endif;?>
                </div>
                <div class="md:w-10/12 w-full mx-auto my-2">
                    <div class=" mx-auto focus-within:font-semibold transition-colors duration-500  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 border-transparent bg-slate-200 h-10 items-center flex rounded">
                        <input list="dep" name="department" type="text" placeholder="D??partement" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['register_admin']) && empty($params['errors']['department'])) {echo $_POST['department'];} else echo $params['data']->department_id?>" />
                        <datalist id="dep">
                            <?php foreach($params['dep'] as $dep): ?>
                            <option value="<?= $dep->id?>"><?=$dep->name?></option>
                            <?php endforeach ; ?>
                        </datalist>
                    </div>
                    <?php if (isset($_POST['register_admin']) && !empty($params['errors']['department'])): ?>
                        <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['department']; ?></span>
                    <?php endif;?>
                </div>
                <div class="md:w-10/12 flex justify-end md:mx-auto my-4">
                    <button type="submit" name="register_admin" class="bg-sky-500 font-semibold text-white p-2 w-fit h-10 hover:bg-sky-600 transition-colors duration-500 justify-center items-center rounded">Enregistrer <span class="fas fa-check-circle ml-1"></span></button>
                </div>
          </form>
</div>

</div>