<div class="w-5/12 shadow bg-white h-[430px] rounded">
    <form  method="POST" class="w-full h-full flex justify-center flex-col">
                <div class="md:w-10/12 w-11/12 mb-8 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl my-4 text-center">School Archive Manager.</h2>
                    <h2 class="text-black font-semibold text-lg my-2 text-center"> Connexion administrateur.</h2>
                    <p class="text-gray-800 font-semibold text-center text-sm mt-1">Acceder à l'administration S.A.M</p>
                </div>
                <div class="md:w-10/12 w-full mx-auto my-2">
                    <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                        <input name="email" type="email" placeholder="Email" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['email'])) {echo $_POST['email'];}?>" />
                    </div>
                    <?php if (isset($_POST['login']) && !empty($params['errors']['email'])): ?>
                        <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['email']; ?></span>
                    <?php endif;?>
                </div>
                <div class="md:w-10/12 w-full mx-auto my-2">
                    <div class=" mx-auto focus-within:font-semibold transition-colors duration-500  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 border-transparent bg-slate-200 h-10 items-center flex rounded">
                        <input id="identifier" name="password" type="password" placeholder="Mot de passe" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['password'])) {echo $_POST['password'];}?>" />
                    </div>
                    <?php if (isset($_POST['login']) && !empty($params['errors']['password'])): ?>
                        <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['password']; ?></span>
                    <?php endif;?>
                </div>
                <div class="md:w-10/12 mx-auto my-2">
                    <label for="remember" class="flex items-center">
                        <input id="remember" class=" bg-slate-200 rounded-lg w-5 mr-4 h-5 accent-sky-500 text-2xl "  type="checkbox">  <span class="mb-0.5 text-sm text-gray-600">Se souvenir de moi</span>
                    </label>
                </div>
                <div class="md:w-10/12 flex justify-between mx-auto my-4">
                    <button type="submit" name="login" class="bg-sky-500 font-semibold text-white p-2 w-4/12 h-10 hover:bg-sky-600 transition-colors duration-500 justify-center items-center rounded">Connexion</button>
                    <a href="javascript:history.go(-1)" class="text-sky-500 font-semibold border-2 border-sky-500 hover:text-white transition-colors duration-500 bg-white flex justify-center items-center w-4/12 h-10 hover:bg-sky-600 rounded">Retour</a>
                </div>
          </form>
</div>