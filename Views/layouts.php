<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/tailwind.css">
    <link rel="stylesheet" href="/assets/fontawesome/css/all.min.css">
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
   <?php echo $content; ?>
        <script src="/assets/js/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
            let $postContainer = $("#postContainer");
            $postContainer.html($postContainer.data("content"));

            $("#hamburger").click(()=>{
                $("#mobile-nav-items").slideToggle(500)
                $("#hamburger").toggleClass("fa-times")
                $("header").toggleClass("h-96")
            })

            $("#add-comment").click(()=>{
                $("#add-comment span").toggleClass('-rotate-90')
                $("#comment-form").slideToggle(500)
            })
            const briefContainer = $(".briefContainer")
            let content = briefContainer.data("html")
            content = content ? content.toString().match(/\<p\s.*\<\/p\>/g) : ""
            console.log(content)
            if(content){
                let contentAsText =  $(content[0]).text()
                 
                let textLength = contentAsText.length
                if(textLength < 200){
                    briefContainer.html(contentAsText.slice(0, textLength/2).concat("..."))
                }else if(textLength < 200 && textLength < 800){
                    briefContainer.html(contentAsText.slice(0, textLength/6).concat("..."))
                }else{
                    briefContainer.html(contentAsText.slice(0, textLength/10).concat("..."))
                }
            }
            
            const langSwitcher = document.querySelector("#lang")
            langSwitcher.addEventListener("change", function(){
                const lang = langSwitcher.value
                window.location.href = lang ? "/switch/"+lang : '/switch/en'
            })
            
        });
        </script>
<?php if(isset($_SESSION['lang'])){
    if($_SESSION['lang'] === "fr")
    include VIEWS . 'includes/footer.php';
    if($_SESSION['lang'] === "en")
    include VIEWS . 'includes/en/footer.php';
}else{
    include VIEWS . 'includes/footer.php';
}
?>
</body>
</html>