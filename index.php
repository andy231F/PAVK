<?php 
include('Models/Connect.php');

$imgUrls = json_decode(file_get_contents('./Assets/Javascript/imgUrls.json'), true);
foreach($imgUrls as $short => $imgUrl) {
    if(isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] == "/img/$short") {
        header("Content-Type: image/jpeg");
        readfile($imgUrl);
        // $_SERVER['PATH_INFO'] = '/$short';
        // header("Content-Type: image/*; filename=$short"); //telecharge le fichier
        exit;
    }
}

include('Controllers/LogginChecker.php');

?>

<!DOCTYPE html>
<html <?php if(isset($_COOKIE['darkmode']))if($_COOKIE['darkmode']=='true')echo"class='dark'"; ?> lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Assets/css/main.css" rel="stylesheet"/>
    <link href="src/output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Pavk</title>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>   
</head>
<body class="font-mono bg-slate-100 dark:bg-black">

    <?php include('Controllers/Router.php'); ?> 

<?php if(isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '/home') {
    include('Views/wysiwygView.php'); 
    // var_dump($_SERVER);
} ?>
    
</body>
</html>


