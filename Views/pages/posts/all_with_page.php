
<?php
$limit = $params['limit'];
$total = (int) $params['total'];

$page = (int) $_GET['index'];
$page_count = $total % $limit;
?>
<!--Basic meta info -->
    <meta name="keywords" content="CDC/RN Ituri">
    <meta name="description" content="">

    <!--OpenGraph meta -->
    <meta property="og:description" content=""/>
    <meta property="og:title" content="CdC/RN Ituri" />
    <meta property="og:url" content="" />
    <title>FOMI | Blog - page <?= (int)$_GET['index'] ?></title>
</head>

<body id="home-body" class="w-full h-full">
      <?php include VIEWS . 'includes/menu.php';?>
      <main class="flex flex-col mx-auto w-11/12 ">
          <!---Section recent post-->
          <section class="w-full h-auto pb-6 mx-auto flex flex-col justify-center">
              <div class="w-full mx-auto flex items-center flex-col pt-8 mb-6 ">
                  <span class="text-green-600 text-center font-semibold text-lg">Page <?= $page ?> sur <?= $page_count ?> de <?= $total ?> posts</span>
                  <h3 class="md:text-4xl text-2xl font-bold text-center mb-3 text-gray-800">Depuis le blog</h3>
              </div>
              <div class="w-full mx-auto grid lg:grid-cols-3 col-span-1 mt-6">
                  <?php if (isset($params['posts']) and count($params['posts']) > 0):
                        foreach ($params['posts'] as $post):?>

		                  <div class="col-span-1 h-[450px] md:px-6 py-1">
                                <div class="h-full rounded-t-xl overflow-hidden bg-white shadow-xl shadow-gray-400 group w-full transition-all duration-500 cursor-pointer border flex items-center rounded hover:shadow-xl flex-col">
                                    <img class="h-48 object-cover w-full rounded-t-xl" src="<?= $data = $post['_type'] === 'article' ? '/files/images/'.$post['_thumbnail'] : '/assets/images/document.jpg' ?>" alt="<?=$post['_title']?>">
                                    <div class="w-full p-3 h-full flex flex-col justify-between">
                                          <span class="<?= $color = $post['_type'] === 'article' ? 'bg-green-600' : 'bg-pink-600'?> px-2 rounded-full py-1 text-white w-fit font-semibold text-sm"><?= ucfirst($post['_type'])?></span>
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
                  <div class="my-2">Page <?= $page ?> sur <span class="text-green-600 font-semibold"><?= $page_count ?></span></div>
                  <?php if($page_count > 1 && $page  !== 1 && $page < $page_count ) :  ?>
                  <div class="w-3/12 flex justify-between">
                      <a href="/blog/pages/<?= $page - 1 ?>" class="px-3  font-semibold py-1 hover:shadow-lg bg-green-600 rounded-full text-white">&larr; Precedent </a>
                      <a href="/blog/pages/2" class="px-3  font-semibold py-1 hover:shadow-lg bg-green-600 rounded-full text-white">Suivant &rarr;</a>
                  </div>
                  <?php elseif( $page === 1): ?>
                    <div class="w-full flex justify-center">
                      <a href="/blog/pages/2" class="px-3  font-semibold py-1 hover:shadow-lg bg-green-600 rounded-full text-white">Suivant &rarr;</a>
                    </div>
                  <?php elseif( $page  === $page_count && $page != 1): ?>
                    <div class="w-full flex justify-center">
                      <a href="/blog/pages/<?= $page-1 ?>" class="px-3  font-semibold py-1 hover:shadow-lg bg-green-600 rounded-full text-white">&larr; Précédent </a>
                    </div>
                  <?php endif; ?>
              </div>
          </section>
          <!---End Section recent post-->

      </main>