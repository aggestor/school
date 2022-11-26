<?php $docs = $params['docs']?>

<div class="w-11/12 mx-auto p-4 bg-white">
    <div class="w-full flex justify-between">
        <h1 class="text-center font-bold text-2xl text-gray-800">
            Dossiers de l'étudiant/<span class="text-sky-500"><?=$_SESSION['student']['mat'] ?? 'ID = '.$_GET['id']?></span>
        </h1>
            <a href="/my-profile/docs/add" class="p-1.5 bg-gray-100 flex justify-between rounded hover:bg-gray-200">Ajouter un dossier <span class="fas fa-folder text-gray-500 ml-3 mt-1"></span></a>
    </div>
</div>
<div class="w-11/12 mx-auto flex mt-2 justify-between flex-col items-center py-1 mb-4 px-3 min-h-max h-auto rounded shadow bg-white">
    <div class="border border-gray-500 mb-2 rounded w-full text-gray-800 font-semibold p-2 flex justify-between">
        <span class="w-1/12 text-center">#</span>
        <span class="w-3/12 text-center">Type du dossier</span>
        <span class="w-2/12 text-center">Date d'ajout</span>
        <span class="w-2/12 text-center">Derniére Modif.</span>
        <span class="w-1/12 text-center">Action</span>
    </div>
    <?php foreach($docs as $doc) :?>
    <div class="border rounded w-full mb-3 items-center text-gray-700 font-semibold p-2 flex justify-between">
        <span class="w-1/12 text-center"><?= array_search($doc, $docs)+1?></span>
        <span class="w-3/12 text-center"><?= $doc->type?></span>
        <span class="w-1/12 text-center"><?=$doc->created_at?></span>
        <span class="w-2/12 text-center"><?= $data = $doc->last_update === $doc->created_at ? "Jamais" : $doc->last_update?></span>
        <span class="w-1/12 flex justify-center">
            <a class="mr-2 h-8 w-8 rounded bg-blue-500 text-white grid place-items-center" href="/my-profile/docs/modify/<?=$doc->id?>"><span class="fas fa-pen"></span></a>
            <a class="mr-2 h-8 w-8 rounded bg-gray-800 text-white grid place-items-center" target="_blank" href="/files/docs/<?=$doc->doc_name?>"><span class="fas fa-download"></span></a>
        </span>
    </div>
    <?php endforeach?>
</div>