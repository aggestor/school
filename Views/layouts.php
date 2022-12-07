<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/assets/js/jquery.min.js"></script>
    <link rel="stylesheet" href="/assets/css/tailwind.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha512-L7MWcK7FNPcwNqnLdZq86lTHYLdQqZaz5YcAgE+5cnGmlw8JT03QB2+oxL100UeB6RlzZLUxCGSS4/++mNZdxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="/assets/images/128x128.png" sizes="128x128"/>
    <link rel="shortcut icon" href="/assets/images/32x32.png" sizes="32x32"/>
    <meta name="theme-color" content="#"/>
    <style>
        body{
            height: auto;
            width: 100vw;
            overflow-x:  hidden !important;
        }
    </style>
    </head>
    <body class="w-full h-full">
        <?php include VIEWS.'includes/menu.php' ?>
   <?php echo $content; ?>
    <?php include VIEWS . 'includes/footer.php';?>
        
        <script src="/assets/js/app.js"></script>
</body>
</html>