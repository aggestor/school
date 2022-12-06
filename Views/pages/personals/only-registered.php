<div class="w-full flex justify-between items-center py-1 mb-4 px-3 h-14 rounded shadow bg-white">
    <h1 class="text-gray-800 flex items-center font-semibold text-lg"> <a class="w-8 h-8 rounded-full bg-sky-500 text-white grid place-items-center mr-3" href="javascript:history.back()"><span class="fas fa-arrow-left"></span></a><span>Liste des personels inscrits</span> </h1>
    <div>
        <select class="border-2 hidden md:flex rounded border-sky-500 p-1.5 text-sky-500 outline-none personalFilter">
            <option value='0'>Tous</option>
            <?php foreach($params['fnx'] as $fn) : ?>
            <option value="<?=$fn->name.'/'.$fn->id?>"><?=$fn->name?></option>
            <?php endforeach;?>
        </select>
        <span class="text-black bg-gray-200 rounded px-1 py-1.5">Total : &nbsp; <b><?=count($params['personals'])?></b></span>
    </div>
</div>
<div class="w-full flex justify-between flex-col items-center py-1 mb-4 px-3 min-h-max h-auto rounded shadow bg-white">
    <div class="border hidden border-gray-500 mb-2 rounded w-full text-gray-800 font-semibold p-2 md:flex justify-between">
        <span class="w-1/12 text-center">#</span>
        <span class="w-3/12 text-center">Noms</span>
        <span class="w-1/12 text-center">Matricule</span>
        <span class="w-2/12 text-center">Fonction</span>
        <span class="w-2/12 text-center">Type de personel</span>
        <span class="w-1/12 text-center">Action</span>
    </div>
     <div class="w-full flex md:hidden">
        <select class="border-2 w-full mb-3 flex rounded border-sky-500 p-1.5 text-sky-500 outline-none personalFilter">
            <option value='0'>Tous</option>
            <?php foreach($params['fnx'] as $fn) : ?>
            <option value="<?=$fn->name.'/'.$fn->id?>"><?=$fn->name?></option>
            <?php endforeach;?>
        </select>
    </div>
    <?php foreach($params['personals'] as $s) :?>
    <div class="border rounded w-full mb-3 items-center text-gray-700 font-semibold p-2 hidden md:flex justify-between">
        <span class="w-1/12 text-center"><?= array_search($s,$params['personals'])+1?></span>
        <span class="w-3/12 text-center"><?= $s->first_name.' '.$s->second_name.' '.$s->last_name?></span>
        <span class="w-1/12 text-center"><?=$s->registration_number?></span>
        <span class="w-2/12 text-center"><?= $s->f_name?></span>
        <span class="w-2/12 text-center"><?= $s->personal_type?></span>
        <span class="w-1/12 flex justify-center">
            <a class="mr-2 h-8 w-8 rounded bg-gray-200 text-gray-500 hover:bg-gray-300 grid place-items-center" href="/admin/personals/<?=$s->registration_number?>"><span class="fas fa-eye"></span></a>
           <?php if ($s->is_active == 1): ?>
            <a class="h-8 w-8 rounded bg-red-500 text-white grid place-items-center" href="/admin/personals/lock/<?=$s->registration_number?>"><span class="fas fa-lock"></span></a>
            <?php else: ?>
            <a class="h-8 w-8 rounded bg-blue-500 text-white grid place-items-center" href="/admin/personals/unlock/<?=$s->registration_number?>"><span class="fas fa-unlock"></span></a>
            <?php endif;?>
        </span>
    </div>
    <div class="md:border border-b md:border-b-0 space-y-2 md:space-y-0 rounded w-full mb-3 items-center text-gray-700 font-semibold p-2 grid grid-cols-2">
        <span class="col-span-1"><?= array_search($s,$params['personals'])+1?></span>
        <span class="col-span-1 text-cyan-500"><?= $s->first_name.' '.$s->second_name.' '.$s->last_name?></span>
        <span class="col-span-1 text-cyan-500"><?=$s->registration_number?></span>
        <span class="col-span-1"><?= $s->f_name?></span>
        <span class="col-span-1"><?= $s->personal_type?></span>
        <span class="col-span-1 flex justify-center">
            <a class="mr-2 h-8 w-8 rounded bg-gray-200 text-gray-500 hover:bg-gray-300 grid place-items-center" href="/admin/personals/<?=$s->registration_number?>"><span class="fas fa-eye"></span></a>
           <?php if ($s->is_active == 1): ?>
            <a class="h-8 w-8 rounded bg-red-500 text-white grid place-items-center" href="/admin/personals/lock/<?=$s->registration_number?>"><span class="fas fa-lock"></span></a>
            <?php else: ?>
            <a class="h-8 w-8 rounded bg-blue-500 text-white grid place-items-center" href="/admin/personals/unlock/<?=$s->registration_number?>"><span class="fas fa-unlock"></span></a>
            <?php endif;?>
        </span>
    </div>
    <?php endforeach?>
</div>