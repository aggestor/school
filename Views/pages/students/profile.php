<?php $student = $params['student']; var_dump($student)?>
<div class="w-11/12 mx-auto h-[600px] p-4 bg-white">
    <h1 class="text-center font-bold text-2xl text-gray-800">
        Fiche Etudiant
    </h1>
    <div class="w-full mt-4 h-72 grid grid-cols-12">
        <div class="col-span-3 h-ful">
            <div class="w-64 h-64">
                <img class="w-full h-full object-cover" src="/files/users/<?=$student->picture?>" alt="<?=$student->first_name.' '.$student->second_name.' '.$student->last_name?>">
            </div>
        </div>
        <div class="col-span-3 py-2 h-full border-red-500 border">
            <div class="w-full">
                <p class="font-semibold text-xl text-gray-800"><?=$student->first_name.' '.$student->second_name.' '.$student->last_name?></p>
                <p class="text-sky-500 font-semibold text-lg">Genie Info, L2</p>
                <div class="w-full h-48 mb-2 flex flex-col justify-around">
                    <span>ok</span>
                    <span>ok</span>
                    <span>ok</span>
                    <span>ok</span>
                    <span>ok</span>
                </div>
            </div>
            
        </div>
    </div>
</div>