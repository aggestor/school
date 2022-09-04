<div class="w-full h-[600px] grid place-items-center">
 <div class="w-8/12 h-80 flex flex-col  md:flex-row">
    <div class="md:w-1/2 flex-col justify-center  flex p-6  w-full h-full">
        <h1 class="text-2xl font-bold mb-3 text-sky-500">School Archive Manager</h1>
        <h3 class="text-gray-600 mb-2 font-semibold text-lg"><span class="text-gray-900 mb-3 font-bold">404. </span> Il y a eu une erreur.</h3>
        <p class="text-gray-900">L'URL demandée <span class="font-semibold"><?= "/".$_GET['url']?></span> n'a pas été retrouvée sur notre serveur.</p>
        <p class="text-gray-600 mt-2">C'est tout ce que nous savons.</p>
        <p><?= $params['message'] ?></p>
    </div>
    <div class="md:w-1/2 w-full flex justify-center items-center h-full">
        <img class="h-[90%] w-[90%] object-cover" src="/assets/images/404.png" alt="Page not found from storyset.com">
    </div>
 </div>
</div>