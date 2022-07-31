      <main class="flex flex-col w-full">
        <section class="w-full grid space-x-4 grid-cols-4 h-60  mb-3">
          <div class="col-span-1 items-center text-white justify-center rounded shadow shadow-gray-400 bg-indigo-600 flex flex-col h-full">
            <span class="fas fa-users fa-2x mx-auto"></span>
            <h2 class="font-semibold text-xl">Tous les utilisateurs</h2>
            <h2 class="font-semibold text-3xl">3453</h2>
          </div>
          <div class="col-span-1 items-center text-white justify-center rounded shadow shadow-gray-400 bg-pink-600 flex flex-col h-full">
            <span class="fas fa-comments fa-2x mx-auto"></span>
            <h2 class="font-semibold text-xl">Tous les commentaires</h2>
            <h2 class="font-semibold text-3xl">451</h2>
          </div>
          <div class="col-span-1 items-center text-white justify-center rounded shadow shadow-gray-400 bg-green-600 flex flex-col h-full">
            <span class="fas fa-envelope fa-2x mx-auto"></span>
            <h2 class="font-semibold text-xl">Tous les messages</h2>
            <h2 class="font-semibold text-3xl">33</h2>
          </div>
          <div class="col-span-1 items-center text-white justify-center rounded shadow shadow-gray-400 bg-yellow-600 flex flex-col h-full">
            <span class="fas fa-open-book fa-2x mx-auto"></span>
            <h2 class="font-semibold text-xl">Tous les posts</h2>
            <h2 class="font-semibold text-3xl">120</h2>
          </div>
        </section>
          <!--First section/hero-->
          <section class="bg-white shadow w-full shadow-gray-400 rounded h-auto p-8  mx-auto flex flex-col justify-center">
            <div class="w-full flex flex-col justify-center items-center">
                <h1 class="text-gray-800 w-full flex justify-between font-semibold text-xl"> <span> <span class="fas fa-tasks mr-1"></span> Liste des utilisateurs</span> <a href="/users/new" class="px-2 text-sm font-semibold py-1 hover:shadow-lg bg-indigo-600 rounded-full text-white"> <span class="fas fa-plus-circle"></span> Nouvel utilisateur</a></h1>
                <div class="w-full my-3 text-gray-900 font-semibold border border-gray-500 rounded p-2 flex justify-between">
                    <span class="w-2/12">Identifiant</span>
                    <span class="w-2/12">Nom d'utilisateur</span>
                    <span class="w-3/12">Addresse Email</span>
                    <span class="w-2/12">Date de création</span>
                    <span class="w-2/12"> Option</span>
                </div>
                <?php foreach($params['users'] as $user): ?>
                <div class="w-full my-1 text-gray-700 border rounded p-2 flex justify-between">
                    <span class="w-2/12"><?= $user['_id']?></span>
                    <span class="w-2/12"><?= $user['_names']?></span>
                    <span class="w-3/12"><?= $user['_email']?></span>
                    <span class="w-2/12"><?php $date = explode("-", $user['_record_date']);$real_date = $date[2] . "/" . $date[1] . "/" . $date[0];echo $real_date;?></span>
                    <span class="w-2/12 flex justify-center"><?php  if($_SESSION['admin']['id'] == $user['_id']) {  ?> <a href="/users/update/<?=$user['_id']?>" class="w-6 h-6 rounded grid place-items-center hover:shadow-lg bg-gray-200 text-black"><span class="fa fa-pen"></span></a> <?php } else { ?> <div class="flex justify-between w-2/3"><a href="/users/delete/<?=$user['_id']?>" class="w-6 h-6 rounded grid place-items-center hover:shadow-lg bg-red-600 text-white"><span class="fa fa-times"></span></a><a href="/users/update/<?=$user['_id']?>" class="w-6 h-6 rounded grid place-items-center hover:shadow-lg bg-gray-200 text-black"><span class="fa fa-pen"></span></a> <a href="/users/ban/<?=$user['_id']?>" class="w-6 h-6 rounded grid place-items-center hover:shadow-lg bg-black text-white"><span class="fa fa-lock"></span></a></div> <?php } ?></span>
                </div>
                <?php endforeach;?>
            </div>
          </section>
          <!--End first section/hero-->
      </main>

        <main class="flex flex-col mx-auto w-full">
          <!--First section/hero-->
          <section class="w-full h-auto pb-4 mx-auto flex flex-col justify-center">
            <div class="w-full flex flex-col justify-center items-center mt-6">
                <h1 class="text-gray-800 bg-white px-6 py-2  w-full rounded shadow shadow-gray-400 flex justify-between font-semibold text-xl"> <span> <span class="fas fa-tasks mr-1"></span> Dernièrs posts</span> <a href="/posts/new" class="px-2 text-sm font-semibold py-1 hover:shadow-lg bg-gray-800 rounded-full text-white"> <span class="fas fa-pen"></span> Ecrire un post</a></h1>
                <div class="w-full mx-auto grid md:space-x-2 space-y-6 md:space-y-0 grid-cols-3 mt-6">
                  <?php if (isset($params['posts']) and count($params['posts']) > 0):
                    foreach ($params['posts'] as $post):?>
	                    <div class="col-span-1 h-[450px] p-2 rounded overflow-hidden bg-white shadow shadow-gray-400 group w-full transition-all duration-500 cursor-pointer flex items-center hover:shadow-xl flex-col">
                          <img class="h-48 object-cover w-full rounded-lg" src="<?= $data = $post['_type'] === 'article' ? '/files/images/'.$post['_thumbnail'] : '/assets/images/document.jpg' ?>" alt="<?=$post['_title']?>">                                    
                          <div class="w-full p-3 h-full flex flex-col justify-between">
                            <span class="<?= $color = $post['_type'] === 'article' ? 'bg-blue-600' : 'bg-pink-600'?> px-2 rounded-full py-1 text-white w-fit font-semibold text-sm"><?= ucfirst($post['_type'])?></span>
                            <p class="text-gray-800  mt-1 font-semibold transition-all duration-500  w-11/12"><?=$post['_title']?></p>
                            <p data-html="<?= $post['_content']?>" class="briefContainer text-sm"></p>
                            <div class=" flex justify-between items-center">
                              <a href="/blog/post/<?= $post['_id']?>" class="px-2 py-1 rounded-full w-fit text-white bg-indigo-600  font-semibold text-sm">Lire plus <span class="fas fa-link ml-1"></span></a>
                              <a href="/blog/edit/<?= $post['_id']?>" class="px-2 py-1 rounded-full w-fit text-white bg-gray-800  font-semibold text-sm">Editer <span class="fas fa-pen ml-1"></span> </a>
                              <a href="/blog/delete/<?= $post['_id']?>" class="px-2 py-1 rounded-full w-fit text-white bg-red-600  font-semibold text-sm">Supprimer <span class="fas fa-trash ml-1"></span> </a>
                            </div>
                          </div>
                      </div>
	                  <?php endforeach;else: ?>
                  <div>
                      No data here
                  </div>
                  <?php endif;?>
              </div>
            </div>
          </section>
          <!--End first section/hero-->
      </main>