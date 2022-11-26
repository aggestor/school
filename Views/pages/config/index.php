<?php $config = $params['config'] ?>
<div class="w-11/12 flex p-3 justify-between mx-auto h-96 rounded shadow bg-white">
    <div class="w-4/12 flex justify-center items-center h-full">
        <img class="w-80 h-80 object-contain" src="/assets/images/<?=$config->logo?>" alt="Logo UOR">
    </div>
    <div class="w-7/12 p-2 h-full flex flex-col justify-around ">
        <div class="flex justify-between"><span>Nom</span> <span class="font-semibold text-sky-500"><?=$config->name?></span></div>
        <div class="flex justify-between"><span>Sigle</span> <span class="font-semibold"><?=$config->acronym?></span></div>
        <div class="flex justify-between"><span>Siège sociail</span> <span class="font-semibold"><?=$config->headquarter?></span></div>
        <div class="flex justify-between"><span>Téléphones</span> <span class="font-semibold"><?=$config->phones?></span></div>
        <div class="flex justify-between"><span>Addresses Emails</span> <span class="font-semibold"><?=$config->emails?></span></div>
        <div class="flex justify-between"><span>Site web</span> <a href="<?=$config->website?>" target="_blank" class="font-semibold underline"><?=$config->website?></a></div>
        <div class="flex justify-between"><span>Dévise</span> <span class="font-semibold"><?=$config->motto?></span></div>
    </div>
</div>