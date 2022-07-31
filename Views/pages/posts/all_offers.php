
<?php
$limit = $params['limit'];
$total = (int) $params['total'];

$page = 1;
if (isset($_GET['index'])) {
    $page = (int) $_GET['index'];

}

$page_count = $total % $limit;
?>
<!--Basic meta info -->
    <meta name="keywords" content="CDC/RN Ituri">
    <meta name="description" content="">

    <!--OpenGraph meta -->
    <meta property="og:description" content=""/>
    <meta property="og:title" content="CdC/RN Ituri" />
    <meta property="og:url" content="" />
    <title>CdC/RN Ituri | Offres d'emploie</title>
</head>

<body id="home-body" class="w-full h-full">
      <?php include VIEWS . 'includes/menu.php';?>
      <main class="flex flex-col mx-auto w-11/12 ">
          <!--First section/hero-->
          <section class="w-full h-[500px] mx-auto flex justify-center">
            <div class="md:w-1/2 w-full h-full flex justify-center flex-col">
                <h1 class="md:text-5xl text-xl w-10/12 font-bold text-blue-600">Bienvenue sur notre page<span class="text-black"> des offres d'empolie</span> </h1>
                <div class="w-9/12 mx-auto md:hidden flex h-80 object-cover p-0.5">
                    <img class="w-full h-full rounded" src="/assets/images/blog.png" alt="Home">
                 </div>
                <p class="md:w-10/12 w-full text-gray-700 mt-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Adipisci nulla error ipsam accusamus quidem alias vitae molestiae tempora molestias repellat nobis aspernatur corrupti.</p>
                <div class="w-80 flex justify-between mt-4">
                    <a href="/admin/offers/new" class="px-3 font-semibold py-2 hover:shadow-lg bg-blue-600 rounded-full text-white text-lg">Nouvelle offre</a>
                </div>
            </div>
            <div class="md:w-1/2 hidden md:flex h-full items-center justify-end">
                 <div class="w-9/12 h-96 object-cover p-0.5">
                    <img class="w-full h-full rounded" src="/assets/images/blog.png" alt="Home">
                 </div>
            </div>
          </section>
          <!--End first section/hero-->
          <!---End Section resources naturelles-->
          <!---Section recent post-->
          <section class="w-full h-auto pb-6 mx-auto flex flex-col justify-center">
              <div class="w-full mx-auto flex items-center flex-col pt-8 mb-6 ">
                  <span class="text-blue-600 text-center font-semibold text-lg">Toutes nos offres d'emploie</span>
                  <h3 class="md:text-4xl text-2xl font-bold text-center mb-3 text-gray-800">Depuis nos offres d'emploies</h3>
                  <p class="md:w-6/12 w-full text-lg text-center text-gray-600 font-semibold">There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form</p>
              </div>
              <div class="w-full mx-auto grid lg:grid-cols-4 col-span-1 mt-6">
                  <?php if (isset($params['posts']) and count($params['posts']) > 0):
    foreach ($params['posts'] as $post): ?>

				                <div class="col-span-1 relative h-60 px-4 py-1">
                          <div class="h-full rounded-t-xl overflow-hidden shadow-xl group w-full justify-center transition-all duration-500 cursor-pointer border flex items-center rounded hover:shadow-xl shadow-gray-300 flex-col">
                              <span class="fas fa-file fa-3x text-gray-700"></span>
                                <a class="text-gray-800 group-hover:text-blue-600 mt-1 font-semibold transition-all duration-500  w-11/12" href="/offres-d-emploie/post/<?=$post['_id']?>"><?=$post['_title']?></a>
                          </div>
                      </div>
				                  <?php endforeach;?>

                          <?php else: ?>
                  <div>
                      No data here
                  </div>
                  <?php endif;?>
              </div>
            <div class="w-full flex flex-col justify-center items-center mx-auto ">
                  <div class="my-2">Page <?=$page?> sur <span class="text-blue-600 font-semibold"><?=$page_count?></span></div>
                  <?php if ($page_count > 1 && $page !== 1 && $page < $page_count): ?>
                  <div class="w-3/12 flex justify-between">
                      <a href="/offres-d-emploie/pages/<?=$page - 1?>" class="px-3  font-semibold py-1 hover:shadow-lg bg-blue-600 rounded-full text-white">&larr; Precedent </a>
                      <a href="/offres-d-emploie/pages/2" class="px-3  font-semibold py-1 hover:shadow-lg bg-blue-600 rounded-full text-white">Suivant &rarr;</a>
                  </div>
                  <?php elseif ($page === 1 && $page_count > 1): ?>
                    <div class="w-full flex justify-center">
                      <a href="/offres-d-emploie/pages/2" class="px-3  font-semibold py-1 hover:shadow-lg bg-blue-600 rounded-full text-white">Suivant &rarr;</a>
                    </div>
                  <?php elseif ($page === $page_count && $page != 1): ?>
                    <div class="w-full flex justify-center">
                      <a href="/offres-d-emploie/pages/<?=$page - 1?>" class="px-3  font-semibold py-1 hover:shadow-lg bg-blue-600 rounded-full text-white">&larr; Précédent </a>
                    </div>
                  <?php endif;?>
              </div>
          </section>
          <!---End Section recent post-->

      </main>