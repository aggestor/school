<?php
$limit = $params['limit'];
$total = (int) $params['total'];

$page = 0;
if (isset($_GET['index'])) {
    $page = (int) $_GET['index'];

}
$page_count = $total % $limit;
?>
<!--Basic meta info -->
    <meta name="keywords" content="fomi, formi actualite, fomi bunia">
    <meta name="description" content="Actualité sur FOMI">

    <!--OpenGraph meta -->
    <meta property="og:description" content="Actualité sur FOMI"/>
    <meta property="og:title" content="Actualités | FOMI" />
    <meta property="og:url" content="" />
    <title> Actualités | FOMI</title>
</head>

<body id="home-body" class="w-full bg-white h-full">
      <?php include VIEWS . 'includes/menu.php';?>
      <main class="flex flex-col mx-auto w-11/12 ">
          <!--First section/hero-->
          <section class="w-full h-[500px] mx-auto flex justify-center">
            <div class="md:w-1/2 w-full h-full flex justify-center flex-col">
                <h1 class="md:text-5xl text-2xl w-10/12 font-bold text-green-600">Bienvenue sur notre blog,<span class="text-black">les mises en jour de ce que nous faisons.</span> </h1>
                <div class="w-9/12 mx-auto md:hidden flex h-96 object-cover p-0.5">
                    <img class="w-full h-full rounded" src="/assets/images/blog.png" alt="Home">
                 </div>
                <p class="md:w-10/12 w-full text-gray-700 mt-3"></p>
                <div class="w-80 flex justify-between mt-4">
                    <a href="/admin/blog/write" class="px-3 font-semibold py-2 hover:shadow-lg bg-green-600 rounded-full text-white text-lg">Ecrire un post</a>
                </div>
            </div>
            <div class="md:w-1/2 hidden md:flex h-full items-center justify-end">
                 <div class="w-9/12 h-[450px] object-cover p-0.5">
                    <img class="w-full h-full rounded" src="/assets/images/Blogging.gif" alt="Home">
                 </div>
            </div>
          </section>
          <!--End first section/hero-->
          <!---End Section resources naturelles-->
          <!---Section recent post-->
          <section class="w-full h-auto pb-6 mx-auto flex flex-col justify-center">
              <div class="w-full mx-auto flex items-center flex-col pt-8 mb-6 ">
                  <span class="text-green-600 text-center font-semibold text-lg">Tous nos posts</span>
                  <h3 class="md:text-4xl text-2xl font-bold text-center mb-3 text-gray-800">Depuis le blog</h3>
                  <p class="md:w-6/12 w-full text-lg text-center text-gray-600 font-semibold">There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form</p>
              </div>
              <div class="w-full mx-auto grid lg:grid-cols-3 col-span-1 mt-6">
                  <?php if (isset($params['posts']) and count($params['posts']) > 0):
                        foreach ($params['posts'] as $post):?>

		                  <div class="col-span-1 h-[450px] px-6 py-1">
		                      <div class="h-full rounded-t-xl overflow-hidden bg-white shadow-xl group w-full transition-all duration-500 cursor-pointer border flex items-center rounded hover:shadow-xl shadow-gray-300 flex-col">
		                          <img class="h-48 object-cover w-full rounded-t-xl" src="/files/images/<?=$post['_thumbnail']?>" alt="">
                                  <div class="w-full p-3 h-full flex flex-col justify-between">
                                        <span class="<?= $color = $post['_type'] === 'article' ? 'bg-blue-600' : 'bg-pink-600'?> px-2 rounded-full py-1 text-white w-fit font-semibold text-sm"><?= ucfirst($post['_type'])?></span>
                                      <p class="text-gray-800  mt-1 font-semibold transition-all duration-500  w-11/12"><?=$post['_title']?></p>
                                      <p data-html="<?= $post['_content']?>" class="briefContainer text-sm"></p>
                                      <a href="/blog/post/<?= $post['_id']?>" class="px-2 rounded-full py-1 text-white bg-green-600 w-24 font-semibold text-sm">Lire plus &rarr; </a>
                                  </div>
		                      </div>
		                  </div>
		                  <?php endforeach;?>
                          
                          <?php else : ?>
                  <div>
                      No data here
                  </div>
                  <?php endif;?>
              </div>
              <div class="w-full flex flex-col justify-center items-center mx-auto ">
                              <?php 
                                $limit = $params['limit'];
                                $total = (int)$params['total'];

                                $page_count = $total % $limit;

                                if($page_count > 1) : 

                              ?>
                              <div class="my-2">Page 1 sur <span class="text-green-600 font-semibold"><?= $page_count ?></span></div>
                                <a href="/blog/pages/2" class="px-3  font-semibold py-1 hover:shadow-lg bg-green-600 rounded-full text-white">Suivant &rarr;</a>
                                    
                              <?php endif; ?>
                          </div>
          </section>
          <!---End Section recent post-->

      </main>