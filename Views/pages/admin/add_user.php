        <main class="flex flex-col mx-auto w-11/12 ">
          <!--First section/hero-->
                <section class="w-full h-[500px] bg-white rounded shadow shadow-gray-400 mx-auto flex justify-center">
                  <form action="/users/new" method="POST" class="w-1/2 h-full flex justify-center flex-col">
                      <div class="md:w-8/12 w-11/12 mx-auto">
                          <h2 class="text-indigo-600 font-semibold text-xl my-4 text-left"><span class="fas fa-plus-circle mr-1"></span> Nouvel utilisateur Admin.</h2>
                          <p class="text-gray-600 mt-1 text-sm">Remplissez le formulaire ci-bas pour faire l'inscription d'un nouvel utilisateur de cette administration.</p>
                      </div>
                      <div class="md:w-8/12 w-full mx-auto my-2">
                          <div class=" mx-auto focus-within:font-semibold text-gray-500 focus-within:text-indigo-600 group focus-within:border-indigo-600  focus-within:border-2 border-2 border-transparent transition-all duration-500 h-10 px-2 items-center flex rounded bg-slate-200">
                              <input id="identifier" name="username" type="text" placeholder="Nom d'utilisateur" class="bg-transparent focus:text-indigo-600 focus:outline-none  placeholder:text-gray-700 ml-2 w-full" value="" />
                          </div>
                          <?php if (isset($_POST['save_user']) && !empty($params['errors']['username'])): ?>
                              <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['username']; ?></span>
                          <?php endif;?>
                      </div>
                      <div class="md:w-8/12 w-full mx-auto my-2">
                          <div class=" mx-auto focus-within:font-semibold text-gray-500 focus-within:text-indigo-600 group focus-within:border-indigo-600  focus-within:border-2 border-2 border-transparent transition-all duration-500 h-10 px-2 items-center flex rounded bg-slate-200">
                              <input id="identifier" name="user_email" type="email" placeholder="Addresse mail" class="bg-transparent focus:text-indigo-560 focus:outline-none  placeholder:text-gray-700 ml-2 w-full" value="" />
                          </div>
                          <?php if (isset($_POST['save_user']) && !empty($params['errors']['user_email'])): ?>
                              <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_email']; ?></span>
                          <?php endif;?>
                      </div>
                      <div class="md:w-8/12 w-full mx-auto my-2">
                          <div class=" mx-auto focus-within:font-semibold text-gray-500 focus-within:text-indigo-600 group focus-within:border-indigo-600  focus-within:border-2 border-2 border-transparent transition-all duration-500 h-10 px-2 items-center flex rounded bg-slate-200">
                              <input id="password" name="user_password" type="password" placeholder="Mot de passe" class="bg-transparent focus:text-indig6-500 focus:outline-none  placeholder:text-gray-700 ml-2 w-full" />
                          </div>
                          <?php if (isset($_POST['save_user']) && !empty($params['errors']['user_password'])): ?>
                              <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_password']; ?></span>
                          <?php endif;?>
                      </div>
                      <div class="md:w-8/12 mx-auto my-4">
                          <button type="submit" name="save_user" class="bg-indigo-600 text-white p-2 w-full h-10 hover:bg-indigo-600 rounded">Enregistrer <i class="fas fa-check-circle"></i></button>
                      </div>
                  </form>
                  <div class="w-1/2 flex h-full items-center justify-center">
                       <div class="w-9/12  h-96 object-cover">
                          <img class="w-full h-full rounded" src="/assets/images/add-user.png" alt="Add user illustration">
                       </div>
                  </div>
                </section>
          <!--End first section/hero-->
      </main>