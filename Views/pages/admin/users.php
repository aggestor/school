      <main class="flex flex-col mx-auto w-full bg-white rounded ">
          <!--First section/hero-->
          <section class="w-full h-auto pb-4 mx-auto flex flex-col justify-center">
            <div class="w-11/12 mx-auto flex flex-col justify-center items-center mt-12">
                <h1 class="text-gray-800 w-full flex justify-between font-semibold text-xl"> <span> <span class="fas fa-tasks mr-1"></span> Liste des utilisateurs</span> <a href="/users/new" class="px-2 text-sm font-semibold py-1 hover:shadow-lg bg-indigo-600 rounded-full text-white"> <span class="fas fa-plus-circle"></span> Nouvel utilisateur</a></h1>
                <div class="w-full my-3 text-gray-800 font-semibold border border-gray-500 rounded p-2 flex justify-between">
                    <span class="w-2/12">Identifiant</span>
                    <span class="w-2/12">Nom d'utilisateur</span>
                    <span class="w-3/12">Addresse Email</span>
                    <span class="w-2/12">Date de création</span>
                    <span class="w-2/12 text-center"> Option</span>
                </div>
                <?php foreach($params['users'] as $user): ?>
                <div class="w-full my-3 text-gray-700 border rounded p-2 flex justify-between">
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