<div class="w-full h-full flex justify-center items-center">
    <div class="w-6/12 flex justify-between  shadow bg-white h-[350px] rounded">
        <div class="w-1/2 flex flex-col h-full items-center justify-center">
            <h1 class="text-green-500 text-xl w-10/12 font-semibold mb-3">Enregistrement éffectué !</h1>
            <p class="w-10/12 text-gray-500">Le nouveau dossier a été ajouté avec succès. Il est maintenant parmis les dossiers que vous possedez !</p>
            <div class="mt-3 w-10/12 flex justify-start">
                <?php if(isset($_SESSION['admin'])) : ?>
                <a href="/admin/personals/docs/<?=$_SESSION['mod-user']['id']?>" class="p-2 bg-sky-500 hover:bg-sky-600 hover:ring-2 hover:ring-sky-300 text-white rounded "><i class="fas fa-arrow-left mr-2"></i> Retour</a>
                <?php else : ?>
                <a href="/profile/docs" class="p-2 bg-sky-500 hover:bg-sky-600 hover:ring-2 hover:ring-sky-300 text-white rounded "><i class="fas fa-arrow-left mr-2"></i> Retour</a>
                <?php endif;?>
            </div>
        </div>
        <div class="w-1/2 flex flex-col h-full items-center justify-center">
            <span class="fas fa-check-circle border-4 rounded-full border-green-500 p-3 fa-5x text-green-500"></span>
        </div>
    </div>
</div>