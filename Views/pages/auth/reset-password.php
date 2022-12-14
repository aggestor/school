<section class="w-full relative flex items-center justify-center h-full bg-white">
    <main class="h-[480px] z-10 flex md:flex-row w-8/12 border-r-2 border-white border-b-2 bg-white rounded-lg shadow shadow-gray-400">
          <form action="/login" method="POST" class="w-6/12 h-full flex justify-center flex-col">
                <div class="md:w-10/12 w-11/12 mb-8 mx-auto">
                    <h2 class="text-sky-500 font-semibold text-xl my-4 text-center">School Archive Manager.</h2>
                    <h2 class="text-black font-semibold text-lg my-2 text-center"> Réinitialisation mot de passe.</h2>
                    <p class="text-gray-800 font-semibold text-center text-sm mt-1">Entrer l'addresse e-mail que vous avez utilisée à la création de votre compte pour réinitialiser votre mot de passe. </p>
                </div>
                <div class="md:w-10/12 w-full mx-auto my-2">
                    <div class=" mx-auto focus-within:font-semibold  text-gray-700 focus-within:text-sky-500 focus-within:border-sky-500 border-2 transition-colors duration-500 border-transparent bg-slate-200 h-10 items-center flex rounded">
                        <input id="identifier" name="user_email" type="email" placeholder="Addresse e-mail" class="bg-transparent transition-colors duration-500 placeholder:text-sm placeholder:text-gray-600 focus:text-sky-500 focus:outline-none ml-2 w-full" value="<?php if (isset($_POST['login']) && empty($params['errors']['user_email'])) {echo $_POST['user_email'];}?>" />
                    </div>
                    <?php if (isset($_POST['login']) && !empty($params['errors']['user_email'])): ?>
                        <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_email']; ?></span>
                    <?php endif;?>
                </div>

                <div class="md:w-10/12 flex justify-between mx-auto my-4">
                    <button type="submit" name="reset-password" class="bg-sky-500 font-semibold text-white p-2 w-4/12 h-10 hover:bg-sky-600 transition-colors duration-500 justify-center items-center rounded">Envoyer le mail</button>
                    <a href="/login" class="text-sky-500 font-semibold border-2 border-sky-500 hover:text-white transition-colors duration-500 bg-white flex justify-center items-center w-4/12 h-10 hover:bg-sky-600 rounded">Connexion</a>
                </div>
          </form>
          <div class="w-6/12 overflow-hidden rounded-r-lg h-full grid place-items-center">
            <div class="w-80 h-80">
                <img class="w-full h-full object-cover" src="/assets/illustrations/reset-pwd.png" alt="Password illustration">
            </div>
          </div>
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
    <div class="absolute bottom-3 w-full text-white text-center" id="footer"><?=date('Y')?> &copy; School Archive Manager</div>
</section>