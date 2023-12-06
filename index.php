<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href='./css/style1.css' />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<?php include_once('./pages/classes.php'); session_start(); ?>
    <div class="container">
        <div class="row">
        <div class="header">header</div>
        </div>
        <div class="row">
            <div class="col-md-2 col-lg-2 col-sm-3">
                <div class="menu">
                    <?php include_once('./pages/menu.php'); ?>
                </div>
            </div>
            <div class="col-md-10 col-lg-10 col-sm-9">
                <div class="content">
                    <?php
                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                            if($page == 1)include_once('./pages/list.php');
                            if($page == 2)include_once('./pages/add_country.php');
                            if($page == 3)include_once('./pages/gallery.php');
                            if($page == 4)include_once('./pages/login.php');
                            if($page == 5)include_once('./pages/register.php');
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="footer">footer</div>
        </div>
    </div>







</body>
</html>
