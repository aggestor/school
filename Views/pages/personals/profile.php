<?php $personal = $params['personal']?>
<div class="<?=$data = isset($_SESSION['admin']) ?'w-[98%]' : 'w-11/12' ?> rounded-shadow mx-auto p-4 bg-white">
    <div class="w-full flex justify-between">

        <h1 class="text-center font-bold text-2xl text-gray-800">
            Fiche personel/<span class="text-sky-500"><?=$personal->registration_number?></span>
        </h1>

       <?php if(isset($_SESSION['admin']) AND $params['personal']->is_registered != 1) :?> <div class="flex w-4/12 items-center justify-between"> <?php else : ?>
        <div class="flex w-3/12 items-center justify-between"> <?php endif ; ?>
        <?php if(isset($_SESSION['admin'])) : ?>
            <a href="/admin/personals/modify/<?=$personal->registration_number?>" class="p-1.5 bg-gray-100 flex justify-between rounded hover:bg-gray-200">Modifier <span class="fas fa-pen text-gray-500 ml-3 mt-1"></span></a>
            <?php else : ?>
                <a href="/profile/modify" class="p-1.5 bg-gray-100 flex justify-between rounded hover:bg-gray-200">Modifier <span class="fas fa-pen text-gray-500 ml-3 mt-1"></span></a>
                <?php endif;?>
           <a href="<?=$d =isset($_SESSION['admin']) ?  '/admin/personals/docs/'.$personal->id:'/profile/docs'?>" class="p-1.5 bg-gray-100 flex justify-between rounded hover:bg-gray-200">Mes dossiers <span class="fas fa-folder text-gray-500 ml-3 mt-1"></span></a>
            <?php if(isset($_SESSION['admin']) AND $params['personal']->is_registered != 1) : ?><a href="/admin/personals/confirm/<?=$personal->registration_number?>" class="p-1.5 bg-green-500 flex justify-between rounded hover:bg-green-600 text-white">Confirmer<span class="fas fa-check-circle ml-3 mt-1"></span></a> <?php endif;?>
        </div>
    </div>
    <!--First section-->
    <div class="w-full mt-4 h-72 space-x-3 grid grid-cols-12">
        <div class="col-span-3 flex items-center h-ful">
            <div class="w-60 rounded overflow-hidden h-60">
                <img class="w-full h-full object-cover" src="/files/users/<?=$personal->picture?>" alt="<?=$personal->first_name.' '.$personal->second_name.' '.$personal->last_name?>">
            </div>
        </div>
        <div class="col-span-3 py-2 h-full">
            <div class="w-full flex flex-col justify-between">
                <span class="text-sky-500 font-semibold border-b-2 w-fit border-sky-500 pb-1">Identification</span>
                <div class="w-full border-l-2 pl-2 border-sky-500 h-56 mb-2 flex flex-col justify-around">
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Nom</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->first_name?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Postnom</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->second_name?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Prénom</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->last_name?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Numéro de téléphone</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->phone_number?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Addresse e-mail</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->mail_address?></span>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-span-3 py-2 h-full">
            <div class="w-full flex h-full items-center">
                <div class="w-full h-48 mb-2 flex flex-col justify-around">
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Lieu de naissance</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->place_of_birth?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Date de naissanace</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?php 
                        $default = explode("-",$personal->date_of_birth);
                        $date = $default[2]."/".$default[1]."/".$default[0];
                        echo $date;
                        ?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Etat civil</span>
                        <span class="font-semibold text-green-600 -mt-2"><?=$personal->civilian_status?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Sexe</span>
                        <span class="font-semibold text-blue-600 -mt-2"><?=$personal->sex?></span>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-span-3 py-2 h-full">
            <div class="w-full flex flex-col justify-between">
                <span class="text-sky-500 font-semibold border-b-2 w-fit border-sky-500 pb-1">Etat de paie</span>
                <div class="w-full border-l-2 pl-2 border-sky-500 h-56 mb-2 flex flex-col justify-around">
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Salaire de base</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->base_salary?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Prime</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->prime?></span>
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
                        <span class="font-semibold text-sky-500 -mt-2"><?=$personal->id_type?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Numéro d'identité</span>
                        <span class="font-semibold text-sky-500 -mt-2"><?=$personal->id_number?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Nationalité</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->nationality?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Province/Etat</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->state?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Territoire/Ville</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->town?></span>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-span-3 py-2 h-full">
            <div class="w-full flex h-full items-center">
                <div class="w-full h-48 mb-2 flex flex-col justify-around">
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Collectivité/Secteur/Commune</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->municipality?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Groupement/Quartier</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->neighborhood ?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Addresse Physique</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->physical_address?></span>
                    </div>
                    
                </div>
            </div>
            
        </div>
        <div class="col-span-3 py-2 h-full">
            <div class="w-full flex flex-col justify-between">
                <span class="text-sky-500 font-semibold border-b-2 w-fit border-sky-500 pb-1">Orientation académique</span>
                <div class="w-full border-l-2 pl-2 border-sky-500 h-56 mb-2 flex flex-col justify-around">
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Faculté/Section d'attache</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->f_name?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Fonction</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->fn_name?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Type de personel</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->personal_type?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Status Academique</span>
                        <span class="font-semibold text-sky-500 -mt-2"><?=$personal->academical_status?></span>
                    </div>
                    
                </div>
            </div>
            
        </div>
        <div class="col-span-3 py-2 h-full">
            <div class="w-full flex h-full items-center">
                <div class="w-full h-48 mb-2 flex flex-col justify-around">
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Niveau académique</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->academical_level?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Grade académique</span>
                        <span class="font-semibold text-indigo-600 -mt-2"><?=$personal->academical_grade ?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Domaine de recherche</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->fsd_name?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Spécialité de recherche</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->search_domain?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Date d'engagement</span>
                        <span class="font-semibold text-orange-600 -mt-2"><?=$personal->engagement_date?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Third Section-->
    <div class="w-full mt-4 h-72 space-x-3 grid grid-cols-12">
        <div class="col-span-3 py-2 h-full">
            <div class="w-full flex flex-col justify-between">
                <span class="text-sky-500 font-semibold border-b-2 w-fit border-sky-500 pb-1">Origines</span>
                <div class="w-full border-l-2 pl-2 border-sky-500 h-56 mb-2 flex flex-col justify-around">
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Province/Etat</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->state_origin?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Térritoire/Ville</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->town_origin?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Collectivité/Secteur/Commune</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->municipality_origin?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Groupement/Quartier</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->neighborhood_origin?></span>
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
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->blood_type?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Taille</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$personal->height?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Allergies</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$allergies = $personal->allergies == "" ? "Aucune": $personal->allergies ?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Handicapes</span>
                        <span class="font-semibold text-gray-800 -mt-2"><?=$handicaps = $personal->handicaps == '' ? "Aucun" :$personal->handicaps ?></span>
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
                        <span class="font-semibold <?= $c = $personal->is_verified == 0 ? 'text-red-500': 'text-green-500'?> -mt-2"><?=$e = $personal->is_verified == 0 ?'Non' : "Oui"?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Inscrit(e)</span>
                        <span class="font-semibold <?= $c = $personal->is_registered == 0 ? 'text-red-500': 'text-green-500'?> -mt-2"><?=$e = $personal->is_registered == 0 ?'Non' : "Oui"?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Actif(ve)</span>
                        <span class="font-semibold <?= $c = $personal->is_active == 0 ? 'text-red-500': 'text-green-500'?> -mt-2"><?=$e = $personal->is_active == 0 ?'Non' : "Oui"?></span>
                    </div>
                    <?php 
                        $checkup = explode(" ", $personal->last_update)[0]
                    ?>
                    <div class="flex flex-col">
                        <span class="text-gray-700 text-sm">Dernière Modification</span>
                        <span class="font-semibold text-sky-500 -mt-2"><?=$e = $checkup == $personal->created_at ?'Jamais' : $checkup?></span>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>