<?php $student = $params['student']?>
<div class="w-11/12 mx-auto p-4 bg-white">
    <div class="w-full flex justify-between">

        <h1 class="text-center font-bold text-2xl text-gray-800">
            Fiche étudiant/<span class="text-sky-500"><?=$student->registration_number?></span>
        </h1>
        <div class="flex w-3/12 items-center justify-between">
            <a href="/my-profile/modify" class="p-1.5 bg-gray-100 flex justify-between rounded hover:bg-gray-200">Modifier <span class="fas fa-pen text-gray-500 ml-3 mt-1"></span></a>
            <a href="/my-profile/docs" class="p-1.5 bg-gray-100 flex justify-between rounded hover:bg-gray-200">Mes dossiers <span class="fas fa-folder text-gray-500 ml-3 mt-1"></span></a>
        </div>
    </div>
    <!--First section-->
    <div class="w-full mt-4 h-72 space-x-3 grid grid-cols-12">
        <div class="col-span-3 h-ful">
            <div class="w-64 h-64">
                <img class="w-full h-full object-cover" src="/files/users/<?=$student->picture?>" alt="<?=$student->first_name.' '.$student->second_name.' '.$student->last_name?>">
            </div>
        </div>
        <div class="col-span-3 py-2 h-full">
            <div class="w-full flex flex-col justify-between">
                <span class="text-sky-500 font-semibold border-b-2 w-fit border-sky-500 pb-1">Identification</span>
                <div class="w-full border-l-2 pl-2 border-sky-500 h-56 mb-2 flex flex-col justify-around">
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Nom</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->first_name?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Postnom</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->second_name?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Prénom</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->last_name?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Numéro de téléphone</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->phone_number?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Addresse e-mail</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->mail_address?></span>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-span-3 py-2 h-full">
            <div class="w-full flex h-full items-center">
                <div class="w-full h-48 mb-2 flex flex-col justify-around">
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Lieu de naissance</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->place_of_birth?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Date de naissanace</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?php 
                        $default = explode("-",$student->date_of_birth);
                        $date = $default[2]."/".$default[1]."/".$default[0];
                        echo $date;
                        ?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Etat civil</span>
                        <span class="font-semibold text-green-600 -mt-2"><?=$student->civilian_status?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Sexe</span>
                        <span class="font-semibold text-blue-600 -mt-2"><?=$student->sex?></span>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-span-3 py-2 h-full">
            <div class="w-full flex flex-col justify-between">
                <span class="text-sky-500 font-semibold border-b-2 w-fit border-sky-500 pb-1">Parents et Sponsors</span>
                <div class="w-full border-l-2 pl-2 border-sky-500 h-56 mb-2 flex flex-col justify-around">
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Nom du père</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->ps_father?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Nom de la mère</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->ps_mother?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Nom du sponsor</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->ps_sponsor?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Numéro de téléphone du sponsor</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->ps_phone_number?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Type de sponsor</span>
                        <span class="font-semibold text-blue-600 -mt-2"><?=$type = $student->ps_type_sponsor == '1' ?"Pas de bourse" : "Bourse"?></span>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!--Second section-->
    <div class="w-full mt-4 h-72 space-x-3 grid grid-cols-12">
        <div class="col-span-3 py-2 h-full">
            <div class="w-full flex flex-col justify-between">
                <span class="text-sky-500 font-semibold border-b-2 w-fit border-sky-500 pb-1">Addresse</span>
                <div class="w-full border-l-2 pl-2 border-sky-500 h-56 mb-2 flex flex-col justify-around">
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Type de piece</span>
                        <span class="font-semibold text-sky-500 -mt-2"><?=$student->id_type?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Numéro d'identité</span>
                        <span class="font-semibold text-sky-500 -mt-2"><?=$student->id_number?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Nationalité</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->nationality?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Province/Etat</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->state?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Territoire/Ville</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->town?></span>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-span-3 py-2 h-full">
            <div class="w-full flex h-full items-center">
                <div class="w-full h-48 mb-2 flex flex-col justify-around">
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Collectivité/Secteur/Commune</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->municipality?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Groupement/Quartier</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->neighborhood ?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Addresse Physique</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->physical_address?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Status Etudiant</span>
                        <span class="font-semibold text-green-600 -mt-2"><?=$student->student_status?></span>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-span-3 py-2 h-full">
            <div class="w-full flex flex-col justify-between">
                <span class="text-sky-500 font-semibold border-b-2 w-fit border-sky-500 pb-1">Orientation académique</span>
                <div class="w-full border-l-2 pl-2 border-sky-500 h-56 mb-2 flex flex-col justify-around">
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Faculté/Section</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->f_name?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Département/Option</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->d_name?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Orientation</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->orientation?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Promotion</span>
                        <span class="font-semibold text-sky-500 -mt-2"><?=$student->p_name?></span>
                    </div>
                    
                </div>
            </div>
            
        </div>
        <div class="col-span-3 py-2 h-full">
            <div class="w-full flex flex-col justify-between">
                <span class="text-sky-500 font-semibold border-b-2 w-fit border-sky-500 pb-1">Origines</span>
                <div class="w-full border-l-2 pl-2 border-sky-500 h-56 mb-2 flex flex-col justify-around">
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Province/Etat</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->state_origin?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Térritoire/Ville</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->town_origin?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Collectivité/Secteur/Commune</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->municipality_origin?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Groupement/Quartier</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->neighborhood_origin?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Type de sponsor</span>
                        <span class="font-semibold text-blue-600 -mt-2"><?=$type = $student->ps_type_sponsor == '1' ?"Pas de bourse" : "Bourse"?></span>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!--Third Section-->
    <div class="w-full mt-4 h-72 space-x-3 grid grid-cols-12">
        <div class="col-span-3 py-2 h-full">
            <div class="w-full flex flex-col justify-between">
                <span class="text-sky-500 font-semibold border-b-2 w-fit border-sky-500 pb-1">Ecole secondaire fréquentée</span>
                <div class="w-full border-l-2 pl-2 border-sky-500 h-56 mb-2 flex flex-col justify-around">
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Nom de l'école</span>
                        <span class="font-semibold text-sky-500 -mt-2"><?=$student->clg_name?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Province/Etat</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->clg_state?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Territoire/Ville</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->clg_town?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Section suivie (Humanité)</span>
                        <span class="font-semibold text-green-500 -mt-2"><?=$student->clg_section_studied?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Centre EXETAT</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->clg_l_e_center?></span>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-span-3 py-2 h-full">
            <div class="w-full flex h-full items-center">
                <div class="w-full h-48 mb-2 flex flex-col justify-around">
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Année de l'obtension du diplôme</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->clg_l_e_year?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Pourcentage EXETAT</span>
                        <span class="font-semibold text-indigo-600 -mt-2"><?=$student->clg_l_e_percentage ?>%</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Numéro du diplôme</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->clg_diploma_number?></span>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-span-3 py-2 h-full">
            <div class="w-full flex flex-col justify-between">
                <span class="text-sky-500 font-semibold border-b-2 w-fit border-sky-500 pb-1">Santé</span>
                <div class="w-full border-l-2 pl-2 border-sky-500 h-56 mb-2 flex flex-col justify-around">
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Groupe sanguin</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->blood_type?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Taille</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$student->height?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Allergies</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$allergies = $student->allergies == "" ? "Aucune": $student->allergies ?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Handicapes</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$handicaps = $student->handicaps == '' ? "Aucun" :$student->handicaps ?></span>
                    </div>
                    
                </div>
            </div>
            
        </div>
        <div class="col-span-3 py-2 h-full">
            <div class="w-full flex flex-col justify-between">
                <span class="text-sky-500 font-semibold border-b-2 w-fit border-sky-500 pb-1">Variables</span>
                <div class="w-full border-l-2 pl-2 border-sky-500 h-56 mb-2 flex flex-col justify-around">
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Vérifié(e)</span>
                        <span class="font-semibold <?= $c = $student->is_verified == 0 ? 'text-red-500': 'text-green-500'?> -mt-2"><?=$e = $student->is_verified == 0 ?'Non' : "Oui"?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Inscrit(e)</span>
                        <span class="font-semibold <?= $c = $student->is_registered == 0 ? 'text-red-500': 'text-green-500'?> -mt-2"><?=$e = $student->is_registered == 0 ?'Non' : "Oui"?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Actif(ve)</span>
                        <span class="font-semibold <?= $c = $student->is_active == 0 ? 'text-red-500': 'text-green-500'?> -mt-2"><?=$e = $student->is_active == 0 ?'Non' : "Oui"?></span>
                    </div>
                    <?php 
                        $checkup = explode(" ", $student->last_update)[0]
                    ?>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Dernière Modification</span>
                        <span class="font-semibold text-sky-500 -mt-2"><?=$e = $checkup == $student->created_at ?'Jamais' : $checkup?></span>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>