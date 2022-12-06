<div  class="grid grid-cols-12  lg:space-y-0 space-y-3 mb-6 w-full h-auto text-gray-800">
    <div class="lg:col-span-5 col-span-12 h-auto md:h-80 lg:mr-3 mb-3 rounded bg-white p-2">
        <div class="p-2 font-semibold mb-2">4 Derniers étudiants enregistrés</div>
             <?php foreach($params['last4s'] as $s) : ?>
                <div class="flex justify-between border items-center mb-2 hover:bg-gray-200 rounded p-1">
                    <img class="h-12 w-12 object-cover rounded-full" src="/files/users/<?=$s->picture?>"/>
                    <span class="w-6/12 font-semibold text-sm"><?=$s->first_name." ".$s->second_name." ".$s->last_name?></span> 
                    <div class="w-1/12"><?php if($s->is_registered == 1): ?><span class="fas fa-check-circle text-green-500"></span> <?php else : ?><span class="fas fa-history text-yellow-500"></span><?php endif;?></div>
                    <a class="h-8 w-8 rounded bg-gray-600 text-white grid place-items-center" href="/admin/students/<?=$s->registration_number?>"><span class="fas fa-eye"></span></a>
                </div> 
            <?php endforeach;?>
    </div>
    <div class=" lg:col-span-7 col-span-12 md:h-80 h-auto space-y-3  rounded grid grid-cols-12">
        <div class="h-40 flex items-center justify-around md:col-span-6 col-span-12 mb-3 md:mr-3 rounded bg-white">
            <span class="w-20 h-20 grid rounded-full border-2 border-violet-600 place-items-center">
                <span class="fas fa-user-check fa-2x text-violet-600"></span>
            </span>
            <div class="h-20 flex flex-col w-[65%]">
                <span class="text-gray-700 font-semibold text-lg">Etudiants inscrits</span>
                <span class="text-violet-600 font-semibold text-2xl text-center"><?=$params['rs']?></span>
            </div>
        </div>
        <div class="h-40 flex items-center justify-around md:col-span-6 col-span-12 mb-3  rounded bg-white">
            <span class="w-20 h-20 grid rounded-full border-2 border-teal-600 place-items-center">
                <span class="fas fa-user-minus fa-2x text-teal-600"></span>
            </span>
            <div class="h-20 flex flex-col w-[65%]">
                <span class="text-gray-700 font-semibold text-lg">Etudiants non-inscrits</span>
                <span class="text-teal-600 font-semibold text-2xl text-center"><?=$params['nrs']?></span>
            </div>
        </div>
        <div class="h-36 flex justify-between col-span-12 rounded bg-white">
            <div class="w-8/12 h-full flex justify-around items-center">
                <span class="w-20 h-20 grid rounded-full border-2 border-blue-600 place-items-center">
                    <span class="fas fa-users fa-2x text-blue-600"></span>
                </span>
                <div class="h-20 flex flex-col w-[65%]">
                    <span class="text-gray-700 font-semibold text-lg">Tous les étudiants réunis</span>
                    <span class="text-blue-600 font-semibold text-2xl text-center"><?=$params['students_count']?></span>
                </div>
            </div>
            <div class="w-4/12 flex flex-col justify-around">
                <a class="p-1.5 rounded bg-gray-600 text-white flex justify-around w-7/12 hover:bg-gray-800" href="/admin/inscriptions/students">Non-inscrits <span class="fas fa-chevron-right mt-1"></span></a>
                <a class="p-1.5 rounded bg-gray-600 text-white flex justify-around w-7/12 hover:bg-gray-800" href="/admin/students">Inscrits <span class="fas fa-chevron-right mt-1"></span></a>
            </div>
        </div>
    </div>
    <div class="rounded  col-span-12 space-y-3 grid grid-cols-12 h-auto lg:h-40">
        <div class="bg-white rounded flex justify-around items-center h-full md:mr-3 col-span-12 md:col-span-6 lg:col-span-3">
             <span class="w-16 border-2 border-orange-600 h-16 grid rounded-full place-items-center">
                <span class="fas fa-list fa-2x text-orange-600"></span>
            </span>
            <div class="h-16 flex flex-col w-[65%]">
                <span class="text-gray-700 font-semibold text-lg">Facultés organisées</span>
                <span class="text-orange-600 font-semibold text-2xl text-center"><?=$params['fac']?></span>
            </div>
        </div>
        <div class="bg-white rounded flex justify-around items-center h-full col-span-12 md:col-span-6 lg:col-span-3">
             <span class="w-16 border-2 border-green-600 h-16 grid rounded-full place-items-center">
                <span class="fas fa-tasks fa-2x text-green-600"></span>
            </span>
            <div class="h-16 flex flex-col w-[65%]">
                <span class="text-gray-700 font-semibold text-lg">Départements</span>
                <span class="text-green-600 font-semibold text-2xl text-center"><?=$params['dep']?></span>
            </div>
        </div>
        <div class="bg-white rounded flex justify-around items-center h-full md:mr-3 space-y-2 col-span-12 md:col-span-6 lg:col-span-3">
             <span class="w-16 border-2 border-red-600 h-16 grid rounded-full place-items-center">
                <span class="fas fa-bars fa-2x text-red-600"></span>
            </span>
            <div class="h-16 flex flex-col w-[65%]">
                <span class="text-gray-700 font-semibold text-lg">Promotions</span>
                <span class="text-red-600 font-semibold text-2xl text-center"><?=$params['prom']?></span>
            </div>
        </div>
        <div class="bg-white rounded flex justify-around items-center h-full col-span-12 md:col-span-6 lg:col-span-3">
             <span class="w-16 border-2 border-violet-600 h-16 grid rounded-full place-items-center">
                <span class="fas fa-cogs fa-2x text-violet-600"></span>
            </span>
            <div class="h-16 flex flex-col w-[65%]">
                <span class="text-gray-700 font-semibold text-lg">Fonctions</span>
                <span class="text-violet-600 font-semibold text-2xl text-center"><?=$params['funcs']?></span>
            </div>
        </div>
    </div>
</div>
<div  class="grid grid-cols-12  lg:mt-3 md:mt-6 w-full h-auto text-gray-800">
    <div class="lg:col-span-5 col-span-12 md:h-80 h-auto lg:mr-3 mb-3 rounded bg-white p-2">
        <div class="p-2 font-semibold mb-2">4 Derniers personels enregistrés</div>
             <?php foreach($params['last4p'] as $s) : ?>
                <div class="flex justify-between border items-center mb-2 hover:bg-gray-200 rounded p-1">
                    <img class="h-12 w-12 object-cover rounded-full" src="/files/users/<?=$s->picture?>"/>
                    <span class="w-6/12 font-semibold text-sm"><?=$s->first_name." ".$s->second_name." ".$s->last_name?></span> 
                    <div class="w-1/12"><?php if($s->is_registered == 1): ?><span class="fas fa-check-circle text-green-500"></span> <?php else : ?><span class="fas fa-history text-yellow-500"></span><?php endif;?></div>
                    <a class="h-8 w-8 rounded bg-gray-600 text-white grid place-items-center" href="/admin/personals/<?=$s->registration_number?>"><span class="fas fa-eye"></span></a>
                </div> 
            <?php endforeach;?>
    </div>
    <div class="lg:col-span-7 col-span-12 md:h-80 h-auto space-y-3  mb-6 rounded grid grid-cols-12">
        <div class="h-40 flex items-center justify-around col-span-12 md:col-span-6 mb-3 lg:mr-3 rounded bg-white">
            <span class="w-20 h-20 grid rounded-full border-2 border-pink-600 place-items-center">
                <span class="fas fa-user-check fa-2x text-pink-600"></span>
            </span>
            <div class="h-20 flex flex-col w-[65%]">
                <span class="text-gray-700 font-semibold text-lg">Personels inscrits</span>
                <span class="text-pink-600 font-semibold text-2xl text-center"><?=$params['rp']?></span>
            </div>
        </div>
        <div class="h-40 flex items-center justify-around col-span-12 md:col-span-6  mb-3  rounded bg-white">
            <span class="w-20 h-20 grid rounded-full border-2 border-cyan-600 place-items-center">
                <span class="fas fa-user-minus fa-2x text-cyan-600"></span>
            </span>
            <div class="h-20 flex flex-col w-[65%]">
                <span class="text-gray-700 font-semibold text-lg">Personels non-inscrits</span>
                <span class="text-cyan-600 font-semibold text-2xl text-center"><?=$params['nrp']?></span>
            </div>
        </div>
        <div class="md:h-36 h-auto flex justify-between col-span-12 rounded bg-white">
            <div class="w-8/12 h-full flex justify-around items-center">
                <span class="w-20 h-20 grid rounded-full border-2 border-red-600 place-items-center">
                    <span class="fas fa-users fa-2x text-red-600"></span>
                </span>
                <div class="h-20 flex flex-col w-[65%]">
                    <span class="text-gray-700 font-semibold text-lg">Tous les personels réunis</span>
                    <span class="text-red-600 font-semibold text-2xl text-center"><?=$params['personals_count']?></span>
                </div>
            </div>
            <div class="w-4/12 flex flex-col justify-around">
                <a class="p-1.5 rounded bg-gray-600 text-white flex justify-around w-7/12 hover:bg-gray-800" href="/admin/inscriptions/personals">Non-inscrits <span class="fas fa-chevron-right mt-1"></span></a>
                <a class="p-1.5 rounded bg-gray-600 text-white flex justify-around w-7/12 hover:bg-gray-800" href="/admin/personals">Inscrits <span class="fas fa-chevron-right mt-1"></span></a>
            </div>
        </div>
    </div>
    <div class="rounded  col-span-12 space-y-3 grid grid-cols-4 md:grid-cols-12 h-auto md:h-40">
        <div class="bg-white rounded flex justify-around items-center h-full md:mr-3 col-span-4">
             <span class="w-16 border-2 border-sky-600 h-16 grid rounded-full place-items-center">
                <span class="fas fa-file fa-2x text-sky-600"></span>
            </span>
            <div class="h-16 flex flex-col w-[65%]">
                <span class="text-gray-700 font-semibold text-lg">Tous les documents</span>
                <span class="text-sky-600 font-semibold text-2xl text-center"><?=$params['docs']?></span>
            </div>
        </div>
        <div class="bg-white rounded flex justify-around items-center h-full md:mr-3 col-span-4">
             <span class="w-16 border-2 border-yellow-600 h-16 grid rounded-full place-items-center">
                <span class="fas fa-folder fa-2x text-yellow-600"></span>
            </span>
            <div class="h-16 flex flex-col w-[65%]">
                <span class="text-gray-700 font-semibold text-lg">Documetns des personels</span>
                <span class="text-yellow-600 font-semibold text-2xl text-center"><?=$params['p_docs']?></span>
            </div>
        </div>
        <div class="bg-white rounded flex justify-around items-center h-full col-span-4">
             <span class="w-16 border-2 border-indigo-600 h-16 grid rounded-full place-items-center">
                <span class="fas fa-book fa-2x text-indigo-600"></span>
            </span>
            <div class="h-16 flex flex-col w-[65%]">
                <span class="text-gray-700 font-semibold text-lg">Documents des etudiants</span>
                <span class="text-indigo-600 font-semibold text-2xl text-center"><?=$params['s_docs']?></span>
            </div>
        </div>
    </div>
</div>