<div class="-c">
    <form method="POST" action="/admin/offers/new" enctype="multipart/form-data">
        <div class="header-holder mb-3 bg-secondary">
            <h1 class="title h2 mb-4 text-white"> <i class="fas fa-pen ml-3"></i> Postez un nouvel offre</h1>
            <a class="btn h-btn btn-light mr-2" href="/admin/offers"> &larr; &ThickSpace; Retour </a>
        </div>
        <?php if(isset($_POST['save_post']) && isset($params['errors']) &&  is_array($params['errors'])): ?>
        <p class="h6 text-danger">Vous n'avez pas bien rempli le formulaire, voici la liste des erreurs commises :</p>
        <?php endif;?>
        <ul class="pl-5">
        <?php if(isset($_POST['save_post']) &&  isset($params['errors']) && is_array($params['errors'])) foreach($params['errors'] as $k=> $v): ?>
            <li class="text-danger"><?= $v?></li>
        <?php endforeach;?>
        </ul>
        <?php if (isset($_POST['save_post']) && isset($params[0]) && $params[0] === "success"): ?>
        <p class="h6 text-success">L'offre posté avec succès !!</p>
        <?php endif;?>
        <div class="-f-c mb-3">
                <div class="-c-t mb-3">
                    <input type="text" name="title" placeholder="Titre de l'offre" class="form-control">
                    <input type="file" style="display: none;" name="file[]" id="thumbnail">
                    <input type="text" style="display: none;" name="type" value="offre" >
                </div>
                <div class="-c-btn">
                    <button type="button" id="imagePicker" class="-btn btn btn-secondary">Fichier lié à l'offre <i class="fas fa-file"></i></button>
                </div>
        </div>
        <textarea id="editor" name="content" class="-c-e mb-3 form-control"></textarea>
        <div>
            <button type="submit" name="save_post" class="-btn mt-4 btn btn-secondary">Poster l'offre</button>
        </div>
    </form>

</div>