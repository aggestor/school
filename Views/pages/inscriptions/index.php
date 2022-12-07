<div class="w-full flex justify-between items-center py-1 mb-4 px-3 h-14 rounded shadow bg-white">
    <h1 class="text-gray-800 font-semibold text-lg flex items-center"> <a class="w-8 h-8 rounded-full bg-sky-500 text-white grid place-items-center mr-3" href="javascript:history.back()"><span class="fas fa-arrow-left"></span></a>5 derniers etudiants non-inscrits</h1>
    <a href="/admin/inscriptions/students" class="text-white bg-sky-500 rounded p-1.5"> <span class="flex md:hidden"><span class="fas fa-list"></span></span> <span class="hidden md:flex">Afficher plus</span></a>
</div>
<div class="w-full flex justify-between flex-col items-center py-1 mb-4 px-3 min-h-max h-auto rounded shadow bg-white">
    <div class="border border-gray-500 mb-2 rounded w-full text-gray-800 font-semibold p-2 flex justify-between">
        <span class="w-1/12 text-center">#</span>
        <span class="w-3/12 text-center">Noms</span>
        <span class="w-1/12 text-center">Matricule</span>
        <span class="w-1/12 hidden md:flex text-center">Verifié(e)</span>
        <span class="w-1/12 hidden md:flex text-center">Inscrit(e)</span>
        <span class="w-1/12 hidden md:flex text-center">Actif(e)</span>
        <span class="md:w-2/12 w-3/12 text-center">Action</span>
    </div>
    <?php foreach($params['students'] as $s) :?>
    <div class="border rounded w-full mb-3 items-center text-gray-700 font-semibold p-2 flex justify-between">
        <span class="w-1/12 text-center"><?= array_search($s,$params['students'])+1?></span>
         <span class="w-3/12 text-center"><?= $s->first_name." ".$s->second_name." ".$s->last_name ?></span>
        <span class="w-1/12 text-center"><?= $s->registration_number?></span>
        <span class="w-1/12 hidden md:flex text-center <?= $data = $s->is_verified == 0 ? 'text-yellow-500' : 'text-green-500' ?>"><?= $data = $s->is_verified == 0 ? 'Non' : 'Oui' ?></span>
        <span class="w-1/12 hidden md:flex text-center <?= $data = $s->is_registered == 0 ? 'text-yellow-500' : 'text-green-500' ?>"><?= $data = $s->is_registered == 0 ? 'Non' : 'Oui' ?></span>
        <span class="w-1/12 hidden md:flex text-center <?= $data = $s->is_active == 0 ? 'text-yellow-500' : 'text-green-500' ?>"><?= $data = $s->is_active == 0 ? 'Non' : 'Oui' ?></span>
        <span class="md:w-2/12 w-3/12 flex justify-around space-x-1">
            <a class="h-8 w-8 rounded bg-gray-200 text-gray-500 hover:bg-gray-300 grid place-items-center" href="/admin/students/<?=$s->registration_number?>"><span class="fas fa-eye"></span></a>
            <?php if ($s->is_active == 1): ?>
            <a class="h-8 w-8 rounded bg-red-500 text-white grid place-items-center" href="/admin/students/lock/<?=$s->registration_number?>"><span class="fas fa-lock"></span></a>
            <?php else: ?>
            <a class="h-8 w-8 rounded bg-blue-500 text-white grid place-items-center" href="/admin/students/unlock/<?=$s->registration_number?>"><span class="fas fa-unlock"></span></a>
            <?php endif;?>
            <a class="h-8 w-8 rounded bg-green-500 text-white grid place-items-center" href="/admin/students/confirm/<?=$s->registration_number?>"><span class="fas fa-check-circle"></span></a>
        </span>
    </div>
    <?php endforeach?>
</div>

<div class="w-full flex justify-between items-center py-1 mb-4 px-3 h-14 rounded shadow bg-white">
    <h1 class="text-gray-800 font-semibold text-lg">5 derniers personnels non-inscrits</h1>
    <a href="/admin/inscriptions/personals" class="text-white bg-sky-500 rounded p-1.5"><span class="flex md:hidden"><span class="fas fa-list"></span></span> <span class="hidden md:flex">Afficher plus</span></a>
</div>
<div class="w-full flex justify-between flex-col items-center py-1 mb-4 px-3 min-h-max h-auto rounded shadow bg-white">
    <div class="border border-gray-500 mb-2 rounded w-full text-gray-800 font-semibold p-2 flex justify-between">
        <span class="w-1/12 text-center">#</span>
        <span class="w-3/12 text-center">Noms</span>
        <span class="w-1/12 text-center">Matricule</span>
        <span class="w-1/12 hidden md:flex text-center">Verifié(e)</span>
        <span class="w-1/12 hidden md:flex text-center">Inscrit(e)</span>
        <span class="w-1/12 hidden md:flex text-center">Actif(e)</span>
        <span class="md:w-2/12 w-3/12 text-center">Action</span>
    </div>
     <?php foreach ($params['personals'] as $s): ?>
    <div class="border rounded w-full mb-3 items-center text-gray-700 font-semibold p-2 flex justify-between">
        <span class="w-1/12 text-center"><?=array_search($s, $params['personals']) + 1?></span>
         <span class="w-3/12 text-center"><?=$s->first_name . " " . $s->second_name . " " . $s->last_name?></span>
        <span class="w-1/12 text-center"><?=$s->registration_number?></span>
        <span class="w-1/12 hidden md:flex text-center <?= $data = $s->is_verified == 0 ? 'text-yellow-500' : 'text-green-500' ?>"><?= $data = $s->is_verified == 0 ? 'Non' : 'Oui' ?></span>
        <span class="w-1/12 hidden md:flex text-center <?= $data = $s->is_registered == 0 ? 'text-yellow-500' : 'text-green-500' ?>"><?= $data = $s->is_registered == 0 ? 'Non' : 'Oui' ?></span>
        <span class="w-1/12 hidden md:flex text-center <?= $data = $s->is_active == 0 ? 'text-yellow-500' : 'text-green-500' ?>"><?= $data = $s->is_active == 0 ? 'Non' : 'Oui' ?></span>
        <span class="md:w-2/12 w-3/12 flex justify-around space-x-1">
            <a class="h-8 w-8 rounded bg-gray-200 text-gray-500 hover:bg-gray-300 grid place-items-center" href="/admin/personals/<?=$s->registration_number?>"><span class="fas fa-eye"></span></a>
            <?php if($s->is_active == 1) : ?>
            <a class="h-8 w-8 rounded bg-red-500 text-white grid place-items-center" href="/admin/personals/lock/<?=$s->registration_number?>"><span class="fas fa-lock"></span></a>
            <?php else : ?>
            <a class="h-8 w-8 rounded bg-blue-500 text-white grid place-items-center" href="/admin/personals/unlock/<?=$s->registration_number?>"><span class="fas fa-unlock"></span></a>
            <?php endif;?>
            <a class="h-8 w-8 rounded bg-green-500 text-white grid place-items-center" href="/admin/personals/confirm/<?=$s->registration_number?>"><span class="fas fa-check-circle"></span></a>
        </span>
    </div>
    <?php endforeach?>
</div>
