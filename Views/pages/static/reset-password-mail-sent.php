<div class='flex flex-col w-full items-center'>
<div class="w-8/12 h-[400px] flex flex-col md:flex-row bg-white rounded shadow-md shadow-gray-300">
    <div class="w-1/2 p-2 h-full flex flex-col justify-center">
        <h1 class="text-2xl w-10/12 mx-auto text-left font-semibold my-3 text-sky-500">Le mail été envoyé avec succès.</h1>
        <p class="text-gray-700 w-10/12 mx-auto">Nous avons envoyé le liens de réinitiailisation de votre mot de passe à <b><?=$params['mail']?></b><br>
        Si vous n'avez pas fait une démande de réinitialisation ou que vous n'en voulez plus, vous pouvez ignorer le mail. <br> <br>
        <a href="/login" class="w-fit p-2 mt-6 rounded bg-sky-500 text-white text-center"> Retour </a>
    </p>

    </div>
    <div class="w-1/2 p-2 h-full grid place-items-center">
        <img src="/assets/images/abt.jpg" class="w-full h-[90%]"/>
    </div>
</div>
<?php require VIEWS . 'includes/footer.php'?>
</div>