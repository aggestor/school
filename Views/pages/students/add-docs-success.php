<div class="w-full h-full flex justify-center items-center">
    <div class="md:w-6/12 w-11/12 flex-col md:flex-row flex justify-between  shadow bg-white h-auto p-3 md:p-0 md:h-[350px] rounded">
        <div class="md:w-1/2 flex flex-col h-full items-center justify-center">
            <h1 class="text-green-500 text-center md:text-left text-xl md:w-11/12 w-full font-semibold mb-3">Enregistrement éffectué !</h1>
            <div class="md:w-1/2 w-full md:hidden flex flex-col h-full items-center justify-center">
                <span class="fas fa-check-circle border-4 rounded-full border-green-500 p-3 fa-5x text-green-500"></span>
            </div>
            <p class="w-10/12 text-center md:text-left md:mx-0 mx-auto text-gray-500">Le nouveau dossier a été ajouté avec succès. Il est maintenant parmis les dossiers que vous possedez !</p>
            <div class="mt-3 w-10/12 flex justify-center md:justify-start">
                <?php if (isset($_SESSION['admin'])): ?>
                <a href="/admin/students/docs/<?=$_SESSION['mod-user']['id']?>" class="p-2 bg-sky-500 hover:bg-sky-600 hover:ring-2 hover:ring-sky-300 text-white rounded "><i class="fas fa-arrow-left mr-2"></i> Retour</a>
                <?php else: ?>
                <a href="/my-profile/docs" class="p-2 bg-sky-500 hover:bg-sky-600 hover:ring-2 hover:ring-sky-300 text-white rounded "><i class="fas fa-arrow-left mr-2"></i> Retour</a>
                <?php endif;?>
            </div>
        </div>
        <div class="w-1/2 hidden md:flex flex-col h-full items-center justify-center">
            <span class="fas fa-check-circle border-4 rounded-full border-green-500 p-3 fa-5x text-green-500"></span>
        </div>
    </div>
</div>