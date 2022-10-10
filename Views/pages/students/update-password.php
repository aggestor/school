<div class="w-6/12 h-[500px] my-auto shadow rounded mt-10 flex flex-col mx-auto p-6 bg-white">
     <h2 class="text-sky-500 font-semibold text-xl my-2">School Archive Manager.</h2>
     <h3 class="text-gray-800 font-semibold text-lg my-2">Modification mot de passe</h3>
    <p class="text-gray-700 text-sm w-full">Note : Après modification de votre mot de passe, nous fermeront votre session pour que vous soyez re-authentifier avec le nouveau mot de passe.</p>
    <div class="w-full">
        <form action="/login" method="POST" class="w-full mt-6 h-full flex justify-center flex-col">
            <div class=" w-full my-2">
                <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                    <input id="identifier" name="user_email" type="email" placeholder="Ancien mot de passe" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                </div>
                <?php if (isset($_POST['login']) && !empty($params['errors']['user_email'])): ?>
                    <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_email']; ?></span>
                <?php endif;?>
            </div>
            <div class=" w-full  my-2">
                <div class=" mx-auto focus-within:font-semibold transition-colors duration-500  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 border-transparent bg-slate-200 h-10 items-center flex rounded">
                    <input id="identifier" name="new_user_password_1" type="password" placeholder="Nouveau mot de passe" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['new_user_password_1'])) {echo $_POST['user_password'];}?>" />
                </div>
                <?php if (isset($_POST['login']) && !empty($params['errors']['new_user_password_1'])): ?>
                    <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['new_user_password_1']; ?></span>
                <?php endif;?>
            </div>
            <div class=" w-full  my-2">
                <div class=" mx-auto focus-within:font-semibold transition-colors duration-500  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 border-transparent bg-slate-200 h-10 items-center flex rounded">
                    <input id="identifier" name="user_password" type="password" placeholder="Confirmer nouveau mot de passe" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_password'])) {echo $_POST['user_password'];}?>" />
                </div>
                <?php if (isset($_POST['login']) && !empty($params['errors']['user_password'])): ?>
                    <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_password']; ?></span>
                <?php endif;?>
            </div>
            <div class="w-full flex justify-between my-4">
                <button type="submit" name="login" class="bg-sky-500 font-semibold text-white p-2 w-4/12 h-10 hover:bg-sky-600 transition-colors duration-500 justify-center items-center rounded">Enregister</button>
                <a href="history.go(-1)" class="text-sky-500 font-semibold border-2 border-sky-500 hover:text-white transition-colors duration-500 bg-white flex justify-center items-center w-4/12 h-10 hover:bg-sky-600 rounded">Annuler</a>
            </div>
        </form>
    </div>
</div>