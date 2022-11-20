<div class="w-full flex justify-between items-center py-1 mb-4 px-3 h-14 rounded shadow bg-white">
    <h1 class="text-gray-800 font-semibold text-lg">Liste des etudiants inscrits</h1>
    <span class="text-white bg-sky-500 rounded p-1.5"><?=count($params['personals'])?></span>
</div>
<div class="w-full flex justify-between flex-col items-center py-1 mb-4 px-3 min-h-max h-auto rounded shadow bg-white">
    <div class="border border-gray-500 mb-2 rounded w-full text-gray-800 font-semibold p-2 flex justify-between">
        <span class="w-1/12 text-center">#</span>
        <span class="w-3/12 text-center">Noms</span>
        <span class="w-1/12 text-center">Matricule</span>
        <span class="w-2/12 text-center">Fonction</span>
        <span class="w-2/12 text-center">Type de personel</span>
        <span class="w-1/12 text-center">Action</span>
    </div>
    <?php foreach($params['personals'] as $s) :?>
    <div class="border rounded w-full mb-3 items-center text-gray-700 font-semibold p-2 flex justify-between">
        <span class="w-1/12 text-center"><?= array_search($s,$params['personals'])+1?></span>
        <span class="w-3/12 text-center"><?= $s->first_name.' '.$s->second_name.' '.$s->last_name?></span>
        <span class="w-1/12 text-center"><?=$s->registration_number?></span>
        <span class="w-2/12 text-center"><?= $s->f_name?></span>
        <span class="w-2/12 text-center"><?= $s->personal_type?></span>
        <span class="w-1/12 flex justify-center">
            <a class="mr-2 h-8 w-8 rounded bg-gray-800 text-white grid place-items-center" href="/admin/personals/<?=$s->registration_number?>"><span class="fas fa-eye"></span></a>
            <a class="mr-2 h-8 w-8 rounded bg-red-500 text-white grid place-items-center" href="/admin/personals/lock/<?=$s->registration_number?>"><span class="fas fa-lock"></span></a>
        </span>
    </div>
    <?php endforeach?>
</div>