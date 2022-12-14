<div class="w-full flex justify-between items-center py-1 mb-4 px-3 h-14 rounded shadow bg-white">
    <h1 class="text-gray-800 font-semibold text-lg flex items-center"> <a class="w-8 h-8 rounded-full bg-sky-500 text-white grid place-items-center mr-3" href="javascript:history.back()"><span class="fas fa-arrow-left"></span></a><span>Liste des facultés</span> </h1>
    <a class="p-1.5 bg-sky-500 text-white flex justify-between items-center rounded text-sm hover:shadow-sky-300 hover:shadow" href="/admin/faculties/new"><span class="fas fa-plus-circle mr-1"></span> Nouvelle </a>
</div>
<div class="w-full flex justify-between flex-col items-center py-1 mb-4 px-3 h-auto min-h-max rounded shadow bg-white">
    <div class="border border-gray-500 mb-2 rounded w-full text-gray-800 font-semibold p-2 flex justify-between">
        <span class="w-1/12 text-center">#</span>
        <span class="w-3/12 text-center">Nom</span>
        <span class=" w-1/12 text-center">Acronyme</span>
        <span class="hidden md:flex w-2/12 text-center">Derniére Modif.</span>
        <span class="w-2/12 text-center">Action</span>
    </div>
    <?php foreach($params['fac'] as $fac) :?>
    <div class="border rounded w-full mb-3 items-center text-gray-600 font-semibold p-2 flex justify-between">
        <span class="w-1/12 text-center"><?= array_search($fac,$params['fac'])+1?></span>
        <span class="w-3/12 text-center"><?= $fac->name?></span>
        <span class="w-1/12 text-center"><?= $fac->acronym?></span>
        <span class="hidden md:flex w-2/12 text-center text-green-500">Jamais</span>
        <span class="w-2/12 flex justify-center">
            <a class="mr-2 h-8 w-8 rounded bg-blue-500 text-white grid place-items-center" href="/admin/faculties/update/<?=$fac->id?>"><span class="fas fa-pen"></span></a>
            <a class="mr-2 h-8 w-8 rounded bg-red-500 text-white grid place-items-center" href="/admin/faculties/delete/<?=$fac->id?>"><span class="fas fa-trash"></span></a>
        </span>
    </div>
    <?php endforeach?>
</div>