<!--Basic meta info -->
<?php
$post = $params['post'] ?>
    <meta name="keywords" content="CDC/RN Ituri">
    <meta name="description" content="">

    <!--OpenGraph meta -->
    <meta property="og:description" content="<?= $post['_title']?>"/>
    <meta property="og:title" content="<?= $post['_title']?>" />
    <meta property="og:url" content="https://fomibunia.org/blog/post/<?=$post['_id']?>" />
    <meta property="og:image" content="/files/images/<?= $post['_thumbnail']?>">
    <title>Blog | <?= $post['_title']?></title>
</head>

<body class="w-full home-body h-full">
      <?php include VIEWS . 'includes/menu.php';?>
      <main class="flex flex-col mx-auto w-11/12 ">
          <!--First section/hero-->
            <section class="w-full mt-3 flex flex-col">
                <h1 class="text-blue-500 lg:w-7/12 w-full font-semibold md:text-2xl text-lg"><?= $post['_title']?></h1>
                <div class=" my-5 overflow-hidden md:w-3/12 w-full  flex justify-between">
                    <span class="md:h-12 h-8/12 md:w-12 w-8/12 rounded md:text-2xl hover:bg-blue-600 text-gray-700 hover:text-white grid place-items-center"><a href="https://www.facebook.com/sharer/sharer.php?u=https://fomibunia.org/blog/post/<?= $post['_id']?>" target="_blank"><i class="fab fa-facebook   "></i></a></span>
                    <span class="md:h-12 h-8/12 md:w-12 w-8/12 rounded md:text-2xl hover:bg-blue-600 text-gray-700 hover:text-white grid place-items-center"><a href="https://telegram.me/share/url?url=https://fomibunia.org/blog/post/<?= $post['_id']?>&text=<?=$post['_title']?>" target="_blank"><i class="fab fa-telegram "></i></a></span>
                    <span class="md:h-12 h-8/12 md:w-12 w-8/12 rounded md:text-2xl hover:bg-blue-600 text-gray-700 hover:text-white grid place-items-center"><a href="https://twitter.com/intent/tweet?text=https://fomibunia.org/blog/post/<?= $post['_id']?>" target="_blank"><i class="fab fa-twitter"></i></a></span>
                    <span class="md:h-12 h-8/12 md:w-12 w-8/12 rounded md:text-2xl hover:bg-blue-600 text-gray-700 hover:text-white grid place-items-center"><a href="https://api.whatsapp.com/send?text=https://fomibunia.org/blog/post/<?= $post['_id']?>" target="_blank""><i class="fab fa-whatsapp"></i></a></span>
                </div>
                <div class="flex flex-col w-full my-2">
                    <span class="text-gray-500 w-10/12"><i class="fas fa-calendar-alt mr-1"></i> Posté le <?php
                     ;
                    $date = explode("-",$post['_record_date']);
                    $real_date = $date[2]."/".$date[1]."/".$date[0];
                    echo $real_date;
                    ?></span>
                    <div class="md:w-4/12 my-3 w-full p-2 border rounded flex justify-between group">
                        <span class="fas fa-file fa-2x text-gray-600"></span> <a class="group-hover:text-blue-600 md:text-base text-sm my-auto font-semibold" href="/files/attached/<?=$params['post']['_file']?>" download="/files/attached/<?=$params['post']['_file']?>">Fichier lié à cette offre, Telechargez-le ici </a><a class="group-hover:text-blue-600 my-auto font-semibold" href="/files/docs/<?=$params['post']['_thumbnail']?>" download="/files/docs/<?=$params['post']['_thumbnail']?>"> <span class="fas fa-download fa-2x text-gray-600"></span></a>
                    </div>
                    <div id="postContainer" data-content="<?= $params['post']['_content'] ?>" class="w-full overflow-auto my-3">
                    </div>
                </div>

            </section>
            <section class="w-full mt-4 flex flex-col">
                <h2 class="text-black pb-2 border-b font-semibold text-2xl">
                    Commentaires.
                </h2>
                <p id="add-comment" class="text-gray-700 my-3 p-1 rounded hover:bg-slate-200 cursor-pointer transition-all duration-500 items-center md:w-4/12 w-full flex justify-between font-semibold text-lg">Ajouter votre commentaire. <span class="fas fa-chevron-circle-right transform transition-all duration-500 "></span> </p>
                <form id="comment-form" style="display: none;" action="/blog/post/<?= $post['_id'] ?>" method="POST" class="md:w-4/12 w-full h-full flex justify-center flex-col">
                    <div class="w-full mx-auto my-2">
                        <div class=" mx-auto focus-within:font-semibold text-gray-500 focus-within:text-blue-600 group focus-within:border-blue-500 h-10 px-2 items-center flex rounded border  border-gray-400">
                            <input id="identifier" name="username" type="text" placeholder="Votre nom" class="bg-transparent focus:text-blue-500 focus:outline-none placeholder-slate-600  ml-2 w-full" value="" />
                        </div>
                        <?php if (isset($_POST['save_comment']) && !empty($params['errors']['username'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['username']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="w-full mx-auto my-2">
                        <div class=" mx-auto focus-within:font-semibold text-gray-500 focus-within:text-blue-600 group focus-within:border-blue-500 h-10 px-2 items-center flex rounded border  border-gray-400">
                                <input id="identifier" name="user_email" type="email" placeholder="Votre addresse mail" class="bg-transparent placeholder-slate-600 focus:text-blue-500 focus:outline-none ml-2 w-full" value="" />
                        </div>
                        <?php if (isset($_POST['save_comment']) && !empty($params['errors']['user_email'])): ?>
                            <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['user_email']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="w-full mx-auto my-2">
                        <div class=" mx-auto focus-within:font-semibold text-gray-500 focus-within:text-blue-600 group focus-within:border-blue-500 h-48 px-2 items-center flex rounded border  border-gray-400">
                        <textarea name="content" placeholder="Votre commentaire" class="bg-transparent placeholder-slate-600 focus:text-blue-500 focus:outline-none h-full resize-none ml-2 w-full" ></textarea>
                        </div>
                        <?php if (isset($_POST['save_comment']) && !empty($params['errors']['content'])): ?>
                        <span class="-mt-2 text-red-500 text-xs"><?php echo $params['errors']['content']; ?></span>
                        <?php endif;?>
                    </div>
                    <div class="w-full my-4">
                        <button type="submit" name="save_comment" class="bg-blue-600 text-white p-2 w-full h-10 hover:bg-blue-600 rounded">Envoyer votre commentaire &rarr;</button>
                    </div>
                </form>
                <div>
                    <p class="text-blue-600 font-semibold text-lg"> Les commentaire... (<?= count($params['comments'])?>)</p>
                    <?php foreach($params['comments'] as $c) : ?>
                        <div class="md:w-4/12 w-full shadow h-auto rounded my-2 p-2 border-b">
                           <p class=" flex items-center"> <span class="font-semibold text-blue-600"><?= ucfirst($c['_username'])?></span> . <span class="text-gray-600 ml-2 text-xs"> Posté le <?php
;
$date = explode("-", $c['_record_date']);
$time = explode(":", $c['_record_time']);
$real_time = $time[0].":".$time[1];
$real_date = $date[2] . "/" . $date[1] . "/" . $date[0];
echo $real_date;
?> à <?= $real_time ?></span></p>
                            <p class="text-gray-800"><?= $c['_content']?></p>
                        </div>
                    <?php endforeach;?>
                </div>
            </section>
          <!--End first section/hero-->
          
      </main>