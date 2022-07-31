<div class="w-full h-full">
    <div class="w-full  space-x-4 grid grid-cols-12 h-[430px]">
        <div class="col-span-3 overflow-hidden h-full rounded bg-white shadow shadow-gray-400">
            <div class="h-40 relative bg-indigo-600 w-full">
                <div class="icons text-gray-200 h-30 justify-between flex flex-col absolute right-2 top-3  overflow-hidden">
                    <a href="#" class="w-6 h-6 hover:text-indigo-600 hover:bg-white duration-500 transition-colors mb-2 rounded-full bg-gray-300 bg-opacity-50 grid place-items-center">
                        <span class="fab  fa-whatsapp"></span>
                    </a>
                    <a href="#" class="w-6 h-6 hover:text-indigo-600 hover:bg-white duration-500 transition-colors mb-1 rounded-full bg-gray-300 bg-opacity-50 grid place-items-center">
                        <span class="fas text-sm fa-phone-alt"></span>
                    </a>
                    <a href="#" class="w-6 h-6 hover:text-indigo-600 hover:bg-white duration-500 transition-colors mb-1 rounded-full bg-gray-300 bg-opacity-50 grid place-items-center">
                        <span class="fas text-sm fa-envelope"></span>
                    </a>
                </div>
                <div class="w-36 h-36 bg-white p-1.5 border-4 border-indigo-600 top-full left-1/2 right-1/2 transform -translate-x-1/2 -translate-y-1/2 absolute rounded-full overflow-hidden ">
                    <img src="/assets/images/aggestor2.png" class="w-full h-full object-cover rounded-full" alt="">
                </div>
            </div>
            <div class="others mt-20 flex flex-col items-center justify-around">
                <h1 class="text-black font-bold text-2xl text-center"><?= ucfirst($params['user']['name'])?></h1>
                <p class="text-gray-600  text-center"><?= $params['user']['email']?></p>
                <p class="text-gray-500 text-sm text-center">Créé(e) le <?php $date = explode("-", $params['user']['record_date']);$real_date = $date[2] . "/" . $date[1] . "/" . $date[0];echo $real_date;?></p>
                
                <span class=" rounded border-2 my-1 border-green-600 px-2 py-1 w-fit text-green-600"><span class="fas fa-check-circle mr-2"></span> verifé(e)</span>
                <a class="py-2 px-3 rounded bg-indigo-600 text-white hover:shadow shadow-gray-500 mt-4" href="/users/update/<?=$params['user']['id']?>"><span class="fas fa-pen mr-2"></span> Modifier mes informations</a>
            </div>
        </div>
        <div class="col-span-9 h-full block p-3 rounded bg-white shadow shadow-gray-400">
            <h1 class="font-semibold text-indigo-600 text-xl mb-2">Vos 3 dernièrs posts</h1>
        </div>
    </div>
    <div class="w-full mt-4 h-32 rounded bg-white shadow shadow-gray-400"></div>
</div>
