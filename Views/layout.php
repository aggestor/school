<!DOCTYPE html>
<html class="h-full w-full scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/tailwind.css">
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/app.js" async></script>
    <link rel="shortcut icon" href="/assets/images/128x128.png" sizes="128x128"/>
    <link rel="shortcut icon" href="/assets/images/32x32.png" sizes="32x32"/>
    <meta name="theme-color" content="#"/>
    <title>UOR | School Archive Manager</title>
    <style>
        /* width */
        ::-webkit-scrollbar {
        width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
        background: #fff; 
        }
        
        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #94a3b8;
            border-radius:10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
        background: #64748b; 
        }
        </style>
</head>
<body class="bg-slate-200 w-full h-full flex flex-col justify-center items-center">
<?= $content ?>
<div class=" mt-10 hidden w-full">
    <?php include VIEWS . 'includes/footer.php'; ?>
</div>

</body>
</html>