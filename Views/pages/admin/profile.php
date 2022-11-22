<div class="w-full h-full">
    <div class="w-full  space-x-4 flex justify-evenly h-[450px]">
        <div class="w-5/12 overflow-hidden h-full rounded bg-white shadow shadow-gray-400">
            <div class="others mt-20 flex flex-col items-center justify-around">
                <div class="w-8/12 flex justify-between  mb-4 mx-auto">
                   <a href="javascript:history.back()" class="w-8 h-8 bg-sky-500 text-white rounded-full grid place-items-center"><span class="fas fa-arrow-left"></span> </a><span class="font-semibold text-sky-500">Informations de l'administrateur</span> 
                </div>
                <div class="flex w-8/12 mx-auto flex-col">
                    <div class="w-full mb-2 flex justify-between">
                        <span>Noms </span>
                        <h1 class="text-black font-semibold text-center"><?= ucfirst($_SESSION['admin']['name'])?></h1>
                    </div>
                    <div class="w-full mb-2 flex justify-between">
                        <span>Email </span>
                        <p class="text-black font-semibold text-center"><?= $_SESSION['admin']['email']?></p>                
                    </div>
                    <div class="w-full mb-2 flex justify-between">
                        <span>Téléphone </span>
                        <p class="text-black font-semibold  text-center"><?= $_SESSION['admin']['phone']?></p>                
                    </div>
                    <div class="w-full mb-2 flex justify-between">
                        <span>Status </span>
                        <span class=" my-1  px-2 py-1 w-fit text-green-600"><span class="fas fa-check-circle mr-2"></span> verifé(e)</span>
                    </div>
                </div>
                <span id="showEditForm" class="py-2 px-3 cursor-pointer rounded bg-sky-500 text-white hover:shadow shadow-sky-300 mt-4"><span class="fas fa-pen mr-2"></span> Modifier mes informations</span>
            </div>
        </div>
        <div  id="editForm" class="w-7/12 h-full block p-3 rounded bg-white shadow shadow-gray-400">
             <form  method="POST" class="w-full h-full flex justify-center flex-col">
                <div class="md:w-10/12 w-11/12 mb-8 flex mx-auto">
                    <h2 class="text-black text-center w-[90%] font-semibold text-lg">Nouvel administrateur.</h2>
                </div>
                <div class="md:w-10/12 flex justify-between space-x-1 w-full mx-auto my-2">
                    <div class="w-6/12">
                        <div class="mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input  name="name" type="text" placeholder="Noms" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['update']) && empty($params['errors']['name'])) {echo $_POST['name'];}else echo $_SESSION['admin']['name']?>" />
                        </div>
                        <?php if (isset($_POST['update']) && !empty($params['errors']['name'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['name']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="w-6/12">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                        <input  name="email" type="email" placeholder="Email" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['update']) && empty($params['errors']['email'])) {echo $_POST['email'];}else echo $_SESSION['admin']['email']?>" />
                    </div>
                    <?php if (isset($_POST['update']) && !empty($params['errors']['email'])): ?>
                        <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['email']; ?></span>
                    <?php endif;?>
                    </div>
                </div>
                <div class="md:w-10/12 mx-auto my-2">
                    <div class="w-7/12">
                        <div class="mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input  name="phone" type="phone" placeholder="Téléphone" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['update']) && empty($params['errors']['phone'])) {echo $_POST['phone'];}else echo $_SESSION['admin']['phone']?>" />
                        </div>
                        <?php if (isset($_POST['update']) && !empty($params['errors']['phone'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['phone']; ?></span>
                        <?php endif;?>
                    </div>
                </div>
                <div class="md:w-10/12 mx-auto my-2">
                    <div class="w-7/12">
                         <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                        <input autocomplete="new-password"  name="old_password" type="password" placeholder="Ancient mot de passe" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['update']) && empty($params['errors']['old_password'])) {echo $_POST['old_password'];}?>" />
                    </div>
                    <?php if (isset($_POST['update']) && !empty($params['errors']['old_password'])): ?>
                        <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['old_password']; ?></span>
                    <?php endif;?>
                    </div>
                </div>
                <div class="md:w-10/12 flex justify-between space-x-1 w-full mx-auto my-2">
                    <div class="w-6/12">
                        <div class="mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                            <input autocomplete="FALSE"  name="new_password" type="password" placeholder="Nouveau mot de passe" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['update']) && empty($params['errors']['new_password'])) {echo $_POST['new_password'];}?>" />
                        </div>
                        <?php if (isset($_POST['update']) && !empty($params['errors']['new_password'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['new_password']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="w-6/12">
                        <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                        <input  name="repeat_password" type="password" placeholder="Retaper mot de passe" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['update']) && empty($params['errors']['repeat_password'])) {echo $_POST['repeat_password'];}?>" />
                    </div>
                    <?php if (isset($_POST['register_admin']) && !empty($params['errors']['repeat_password'])): ?>
                        <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['repeat_password']; ?></span>
                    <?php endif;?>
                    </div>
                </div>
                <div class="md:w-10/12 flex justify-end mx-auto my-4">
                    <button type="submit" name="update" class="bg-sky-500 font-semibold text-white p-2 w-4/12 h-10 hover:bg-sky-600 transition-colors duration-500 justify-center items-center rounded">Enregistrer <span class="fas fa-check-circle ml-1"></span></button>
                </div>
          </form>
        </div>
    </div>
</div>
