<!DOCTYPE html>
<html class="w-full h-full scroll-smooth">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/assets/css/tailwind.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha512-L7MWcK7FNPcwNqnLdZq86lTHYLdQqZaz5YcAgE+5cnGmlw8JT03QB2+oxL100UeB6RlzZLUxCGSS4/++mNZdxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="shortcut icon" href="/assets/images/128x128.png" sizes="128x128"/>
        <link rel="shortcut icon" href="/assets/images/32x32.png" sizes="32x32"/>
        <script src="/assets/js/jquery.min.js"></script>
        <meta name="theme-color" content="#"/>
        <!--Basic meta info -->
        <meta name="keywords" content="">
        <meta name="description" content="">

        <!--OpenGraph meta -->
        <meta property="og:description" content=""/>
        <meta property="og:title" content="ABoard" />
        <meta property="og:url" content="" />
        <title>Soft Dossier</title>
    </head>
    <body class="w-full bg-slate-200 grid overflow-hidden grid-cols-12 home-body h-full">
        <?php include VIEWS."includes/side_menu.php" ?>
        <main class="md:col-span-10 col-span-12 h-full block">
            <?php include VIEWS . 'includes/menu_admin.php';?>
            <section class="w-full h-[90vh] md:h-[96vh] lg:h-[calc(100vh-56px)] overflow-y-auto md:p-6 p-2">
                <?php echo $content; ?>
            </section>
        </main>
        <script src="/assets/js/app.js"></script>
        <script>
            const menuItems = document.querySelectorAll("#menu_list li a")
            const currentPath = window.location.href
            menuItems.forEach(item =>{
                let rgx  = new RegExp(`^(${currentPath})$`)
                if(rgx.test(item.href)){
                    $(item).addClass("bg-sky-500").css("color","white")
                }
            })
        </script>
    </body>
</html>