<div class="w-full flex justify-between items-center py-1 mb-4 px-3 h-14 rounded shadow bg-white">
    <h1 class="text-gray-800 font-semibold flex items-center text-lg"> <a class="w-8 h-8 rounded-full bg-sky-500 text-white grid place-items-center mr-3" href="javascript:history.back()"><span class="fas fa-arrow-left"></span></a> <span>Liste des administrateurs</span></h1>
    <a class="p-1.5 bg-sky-500 text-white flex justify-between items-center rounded text-sm hover:shadow-sky-300 hover:shadow" href="/admin/register"><span class="fas fa-plus-circle mr-1"></span> Ajouter </a>
</div>
<div class="w-full flex justify-between flex-col items-center py-1 mb-4 px-3 h-auto min-h-max rounded shadow bg-white">
    <div class="border border-gray-500 mb-2 rounded w-full text-gray-800 font-semibold p-2 flex justify-between">
        <span class="w-2/12 text-center">#</span>
        <span class="w-3/12 text-center">Nom</span>
        <span class="w-3/12 text-center">Email</span>
        <span class="w-2/12 text-center">Téléphone.</span>
        <span class="w-2/12 text-center">Action</span>
    </div>
    <?php foreach($params['admins'] as $admin) :?>
    <div class="border rounded w-full mb-3 items-center text-gray-600 font-semibold p-2 flex justify-between">
        <span class="w-2/12 text-center"><?=array_search($admin,$params['admins'])+1?></span>
        <span class="w-3/12 text-center"><?= $admin->name?></span>
        <span class="w-3/12 text-center"><?= $admin->email?></span>
        <span class="w-2/12 text-center"><?= $admin->phone ?></span>
        <span class="w-2/12 flex justify-center">
            <a style="display: none;" class="mr-2 h-8 w-8 rounded bg-blue-500 text-white grid place-items-center" href="/admin/update/<?=$admin->id?>"><span class="fas fa-pen"></span></a>
            <?php if($_SESSION['admin']['id'] !== $admin->id) : ?>
                <a class="mr-2 h-8 w-8 rounded bg-red-500 text-white grid place-items-center" href="/admin/delete/<?=$admin->id?>"><span class="fas fa-trash"></span></a>
            <?php endif;?>
        </span>
    </div>
    <?php endforeach?>
</div>