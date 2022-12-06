<div class="w-full flex justify-between items-center py-1 mb-4 px-3 h-14 rounded shadow bg-white">
    <h1 class="text-gray-800 font-semibold text-lg flex items-center"> <a class="w-8 h-8 rounded-full bg-sky-500 text-white grid place-items-center mr-3" href="javascript:history.back()"><span class="fas fa-arrow-left"></span></a>Liste des étudiants non-inscrits</h1>
    <span class="px-1 py-1.5 bg-gray-200 text-black flex text-sm justify-between items-center rounded hover:shadow">Total :&nbsp;<b><?= count($params['students']) ?></b></span>
</div>
<div class="w-full flex justify-between flex-col items-center py-1 mb-4 px-3 min-h-max h-auto rounded shadow bg-white">
    <div class="border hidden border-gray-500 mb-2 rounded w-full text-gray-800 font-semibold p-2 md:flex justify-between">
        <span class="w-1/12 text-center">#</span>
        <span class="w-3/12 text-center">Noms</span>
        <span class="w-1/12 text-center">Matricule</span>
        <span class="w-2/12 text-center">Départément</span>
        <span class="w-2/12 text-center">Promotion</span>
        <span class="w-1/12 text-center">Action</span>
    </div>
    <?php foreach($params['students'] as $s) :?>
    <div class="border rounded w-full mb-3 items-center text-gray-700 font-semibold p-2 hidden md:flex justify-between">
        <span class="w-1/12 text-center"><?= array_search($s,$params['students'])+1?></span>
        <span class="w-3/12 text-center"><?= $s->first_name.' '.$s->second_name.' '.$s->last_name?></span>
        <span class="w-1/12 text-center"><?=$s->registration_number?></span>
        <span class="w-2/12 text-center"><?= $s->d_name?></span>
        <span class="w-2/12 text-center"><?= $s->p_name?></span>
        <span class="w-1/12 flex justify-center">
            <a class="mr-2 h-8 w-8 rounded bg-gray-200 text-gray-600 hover:bg-gray-300 grid place-items-center" href="/admin/students/<?=$s->registration_number?>"><span class="fas fa-eye"></span></a>
            <a class="mr-2 h-8 w-8 rounded bg-green-500 text-white grid place-items-center" href="/admin/students/confirm/<?=$s->registration_number?>"><span class="fas fa-check-circle"></span></a>
        </span>
    </div>
    <div class="md:border border-b md:border-b-0 space-y-2 md:space-y-0 rounded w-full mb-3 items-center text-gray-700 font-semibold p-2 md:hidden grid grid-cols-2">
        <span class="col-span-1"><?= array_search($s,$params['students'])+1?></span>
        <span class="col-span-1 text-cyan-500"><?= $s->first_name.' '.$s->second_name.' '.$s->last_name?></span>
        <span class="col-span-1 text-cyan-500"><?=$s->registration_number?></span>
        <span class="col-span-1 "><?= $s->d_name?></span>
        <span class="col-span-1"><?= $s->p_name?></span>
        <span class="col-span-1 flex justify-center">
            <a class="mr-2 h-8 w-8 rounded bg-gray-200 text-gray-600 hover:bg-gray-300 grid place-items-center" href="/admin/students/<?=$s->registration_number?>"><span class="fas fa-eye"></span></a>
            <a class="mr-2 h-8 w-8 rounded bg-green-500 text-white grid place-items-center" href="/admin/students/confirm/<?=$s->registration_number?>"><span class="fas fa-check-circle"></span></a>
        </span>
    </div>
    <?php endforeach?>
</div>