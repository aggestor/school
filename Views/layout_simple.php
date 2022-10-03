<!DOCTYPE html>
<html class="w-full h-full scroll-smooth">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/assets/css/tailwind.css">
        <link rel="stylesheet" href="/assets/fontawesome/css/all.min.css">
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
        <title>ABoard</title>
    </head>
    <body class="w-full bg-slate-200 grid overflow-hidden grid-cols-12 home-body h-full">
        <main class="col-span-12 h-full block">
            <?php include VIEWS . 'includes/menu.php';?>
            <section style="height: calc(100vh - 56px);" class="w-full overflow-y-auto p-6">
                <?php echo $content; ?>
            </section>
        </main>
        <script>
            const menuItems = document.querySelectorAll("#menu_list li a")
            const currentPath = window.location.href
            console.log(menuItems)
            menuItems.forEach(item =>{
                let rgx  = new RegExp(currentPath)
                if(rgx.test(item.href)){
                    $(item).addClass("bg-indigo-600").addClass('text-white')
                }
            })
        </script>
    </body>
</html>