      <main class="flex flex-col mx-auto w-11/12 ">
          <!--First section/hero-->
          <section class="w-full h-auto pb-4 mx-auto flex flex-col justify-center">
            <div class="w-full flex flex-col justify-center items-center mt-12">
                <h1 class="text-gray-800 w-full border-b pb-5 flex justify-between font-semibold text-xl"> <span> <span class="fas fa-tasks mr-1"></span> Toutes les publications</span> <a href="/admin/blog/write" class="px-2 text-sm font-semibold py-1 hover:shadow-lg bg-gray-800 rounded-full text-white"> <span class="fas fa-pen"></span> Ecrire un article</a></h1>
                <div class="w-full mx-auto grid grid-cols-3 mt-6">
                  <?php if (isset($params['posts']) and count($params['posts']) > 0):
    foreach ($params['posts'] as $post):
    ?>

	                  <div class="col-span-1 relative h-96 px-4 py-1">
	                      <div class="h-full rounded-t-xl overflow-hidden shadow-xl group w-full transition-all duration-500 cursor-pointer border flex items-center rounded hover:shadow-xl shadow-gray-300 flex-col">
	                          <img class="h-60 object-cover rounded-t-xl" src="/files/images/<?=$post['_thumbnail']?>" alt="<?=$post['_title']?>">
	                            <a class="text-gray-800 group-hover:text-blue-600 mt-1 font-semibold transition-all duration-500  w-11/12" href="/blog/post/<?=$post['_id']?>"><?=$post['_title']?></a>
	                      </div>
                          <a href="/blog/delete/<?= $post['_id']?>" class="px-2 text-sm absolute right-1 top-1 font-semibold py-1 hover:shadow-lg bg-red-600 rounded-full text-white"> <span class="fas fa-trash"></span> Supprimer</a>

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