
      <main class="h-96 flex flex-col w-5/12 bg-white rounded-lg shadow shadow-gray-400">
            <form action="/login" method="POST" class="w-full h-full flex justify-center flex-col">
                <div class="md:w-8/12 w-11/12 mx-auto">
                <h2 class="text-indigo-600 font-semibold text-xl my-4 text-left"> Connexion de l'utilisateur.</h2>
                <p class="text-gray-600 text-sm mt-1">Remplissez le formulaire ci-bas avec vous identifants pourque vous ayez accès à l'administration.</p>
            </div>
            <div class="md:w-8/12 w-full mx-auto my-2">
                <div class=" mx-auto focus-within:font-semibold text-gray-700 focus-within:text-indigo-600 group focus-within:border-indigo-600 focus-within:border-2 h-10 px-2 items-center flex rounded border  border-gray-400">
                    <input id="identifier" name="user_email" type="email" placeholder="Nom d'utilisateur ou Email" class="bg-transparent focus:text-indigo-600 focus:outline-none ml-2 w-full" autocomplete="on" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) echo $_POST['user_email'] ?>" />
                </div>
                <?php if (isset($_POST['login']) && !empty($params['errors']['user_email'])): ?>
                    <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_email']; ?></span>
                <?php endif;?>
            </div>
            <div class="md:w-8/12 w-full mx-auto my-2">
                <div class=" mx-auto focus-within:font-semibold text-gray-500 focus-within:text-indigo-600 group focus-within:border-indigo-600 focus-within:border-2 h-10 px-2 items-center flex rounded border  border-gray-400">
                    <input id="password" name="user_password" type="password" placeholder="Mot de passe" class="bg-transparent focus:text-indigo-600 focus:outline-none ml-2 w-full" autocomplete="on" />
                </div>
                <?php if (isset($_POST['login']) && !empty($params['errors']['user_password'])): ?>
                    <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_password']; ?></span>
                <?php endif;?>
            </div>
            <div class="md:w-8/12 mx-auto my-4">
                <button type="submit" name="login" class="bg-indigo-600 font-semibold text-white p-2 w-full h-10 hover:bg-indigo-800 rounded">Se connecter <i class="fas fa-sign-in ml-3"></i></button>
            </div>
            </form>
          <!--End first section/hero-->
      </main>