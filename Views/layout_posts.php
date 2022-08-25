<!DOCTYPE html>
<html class="w-full h-full scroll-smooth">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/assets/css/tailwind.css">
         <!-- Theme included stylesheets -->
        <link rel="shortcut icon" href="/assets/images/128x128.png" sizes="128x128"/>
        <link rel="shortcut icon" href="/assets/images/32x32.png" sizes="32x32"/>
        <meta name="theme-color" content="#"/>
        <!--Basic meta info -->
        <meta name="keywords" content="">
        <meta name="description" content="">

        <!--OpenGraph meta -->
        <meta property="og:description" content=""/>
        <meta property="og:title" content="FOMI | Administration" />
        <meta property="og:url" content="" />
        <title>Ecrire un post</title>
    </head>
    <body class="w-full bg-slate-200 grid overflow-hidden grid-cols-12 home-body h-full">
        <?php include VIEWS."includes/side_menu.php" ?>
        <main class="col-span-10 h-full block">
            <?php include VIEWS . 'includes/menu_admin.php';?>
            <section style="height: calc(100vh - 56px);" class="w-full overflow-y-auto p-6">
                <?php echo $content; ?>
            </section>
        </main>
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/summernote-lite.min.js"></script>
        <script>
           $('#editor').summernote({
                placeholder: 'Contenu du post',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            $(document).ready(()=>{
                $("#error-panel-hider").on("click", ()=> $("#error-panel").slideUp(500))
                $("#types_selector").on("change", function() {
                    console.log($(this).val())
                    if($(this).val() === "gallery"){
                        $("#cnt").slideUp(500)
                        $("#drag_drop_area").slideDown(500)
                    }else{
                        $("#drag_drop_area").slideUp(500)
                        $("#cnt").slideDown(500)
                    }
                })

            })
        </script>

    </body>
</html>