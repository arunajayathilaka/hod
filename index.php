<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
//ob_start();
require_once'init.php';
//$_SESSION['username']="";
$_SESSION['N2'] = $_SESSION['N3'] = $_SESSION['N4'] = $_SESSION['N5'] = "";
$_SESSION['N1'] = "activenav";
?>
<html>
    <head>
        <title>HOD</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">


        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/slider.css">
        <link href="css/slick.css" rel="stylesheet">
        <link href="css/slick-theme.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Dosis|Pacifico|Belleza|Domine|Slabo+27px" rel="stylesheet">
        <style type="text/css">
            html, body {
                margin: 0;
                padding: 0;
            }

            * {
                box-sizing: border-box;
            }

            .slider {
                width: 50%;
                margin: 10px auto;
            }

            .slick-slide {
                margin: 10px 20px;
            }

            .slick-slide img {
                width: 100%;
            }

            .slick-prev:before,
            .slick-next:before {
                color: black;
            }
            .s{}
        </style>

    </head>
    <body style="/*background-image:url(img/bg5.jpg);*/ background-color:#FFF6;background-size: 100% 100%;">


        <?php
        if (isset($_SESSION['er']) && $_SESSION['er'] == "true") {
            $_SESSION['er1'] = "true";
        } else {
            $_SESSION['er1'] = "false";
        }
        ?>
        <?php include("template/menu.php"); ?>


        <?php include 'template/headnav.php'; ?>





        <div class="row">
            <?php include("template/slider.php"); ?>

        </div>


        <?php include("alert.php"); ?>


        <div class="row">
            <div class="text-center" style="">
                <h1 style="font-family: 'Belleza', sans-serif;">Our Service<h1> 
                        </div>
                        </div>
                        <div class="row row-centered" id="detail">
                            <div class="col-sm-4 text-center"  id="photohubdetail">
                                <h2 class="text-center" style="color:#100c3e;font-family: 'Belleza', sans-serif;">Photohub</h2>
                                <p class="text-center"style="font-family: 'Slabo 27px',serif;font-size:20px; padding-left:0px; color:#1b1464;">
                                    Photohub is the place where people can upload images to it.and knowing about new jewellery trends.
                                </p>
                                <a value="photohub.php" style="cursor:pointer;"><img src="img/photohubs.png" style="height:30%; opacity:0.8;visibility:visible;animation-name:bounceIn;animation-duration: 4s;" class="img-responsive center-block" id="imgs"/></a>
                            </div>

                            <div class="col-sm-4 "  id="designdetail">
                                <h2 class="text-center" style="color:#100c3e; font-family: 'Belleza', sans-serif;">Design</h2>
                                <p class="text-center" style="font-family: 'Slabo 27px',serif; padding-left:0px;font-size:20px; color:#1b1464;">
                                    Design is the platform that people can recreate jewellery as they prefered.
                                </p>
                                <a value="design.php" style="cursor:pointer;"><img src="img/design.png" style="font-family: 'Belleza', sans-serif; height:30%; opacity:0.8;visibility:visible;animation-name:bounceIn;animation-duration: 4s;" class="img-responsive center-block" id="imgs"/></a>
                            </div>
                            <div class="col-sm-4 text-center"  id="vrdetail">
                                <h2 class="text-center" style=" font-family: 'Belleza', sans-serif; color:#100c3e;">Vitual Mirror</h2>
                                <p class="text-center" style="font-family: 'Slabo 27px',serif;font-size:20px; padding-left:0px;color:#1b1464;">
                                    Vmirror is the place where people can try out jewellery in virtual enviroment.</p>
                                <a value="vr1.php" style="cursor:pointer;"><img src="img/vr.png" style="height:30%; opacity:0.8;visibility:visible;animation-name:bounceIn;animation-duration: 4s;" class="img-responsive center-block"id="imgs" /></a>

                            </div>
                        </div>

                        <div class="row">
                            <div class="text-center" style="padding-top:30px;">
                                <h1 style="font-family: 'Belleza', sans-serif;">Popular Brands<h1> 
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div id="content1"  class="center slider"  style="height:auto; width:80%;">
                                                <?php
                                                $sql3q2 = mysqli_query($link, "SELECT * FROM vendor");
                                                while ($row = mysqli_fetch_array($sql3q2)) {
                                                    $vendors[] = $row;
                                                }
                                                ?>
                                                <?php foreach ($vendors as $vendor): ?>
                                                    <div class="s" value="<?php echo $vendor['vendor_name']; ?>" style="cursor:pointer; height:auto;padding-top:24px; padding-bottom:24px;padding-left:15px;padding-right:15px;">
                                                        <img value="<?php echo $vendor['vendor_username']; ?>"  src="<?php echo $vendor['image_url']; ?>">
                                                    </div>        

                                                <?php endforeach; ?>

                                            </div>
                                        </div>


                                        <footer class="container1" style="">
                                            <?php include 'template/footer.php'; ?>	
                                        </footer>

                                        <script src="js/jquery.js"></script>
                                        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
                                        <script src="js/slider.js"></script>
                                        <script src="js/scroll.js"></script>
                                        <script src="js/slick.js"></script>
                                        <script src="js/routes.js"></script>
                                        <script type="text/javascript">
                                            $(function () {
                                                //$('#bs-carousel').carousel();
                                            });

                                            $('#detail .col-sm-4 a').on('click', function () {
                                                var ref = $(this).attr('value');
                                                //alert(ref);
                                                if (ref === "photohub.php" || ref === "design.php") {
                                                    $.ajax({
                                                        url: 'usersessioncheck.php',
                                                        method: 'GET',
                                                        success: function (data) {
                                                            //alert(data);
                                                            if (data === "YES") {
                                                                //alert("erw");
                                                                $('#loginalert').modal('show');
                                                            }
                                                            else if (data === "NO") {
                                                                window.location.href = ref;

                                                            }

                                                        }
                                                    });
                                                } else {

                                                    window.location.href = ref;
                                                }
                                            });
                                            $(document).ready(function () {
                                                sessionStorage.setItem('vendorName', "");
                                                $('#content1 .s').on('click', function () {
                                                    var vname = $(this).find("img").attr('value');
                                                    //alert(vname);
                                                    sessionStorage.setItem('vendorName', vname);
                                                    window.location.href = "showcase.php";
                                                    //$('#vendorname').val(vname);
                                                });

                                                $(".center").slick({
                                                    slidesToShow: 4,
                                                    slidesToScroll: 1,
                                                    autoplay: true,
                                                    autoplaySpeed: 2000,
                                                    responsive: [
                                                        {
                                                            breakpoint: 1024,
                                                            settings: {
                                                                slidesToShow: 3,
                                                                slidesToScroll: 3,
                                                                infinite: true

                                                            }
                                                        },
                                                        {
                                                            breakpoint: 600,
                                                            settings: {
                                                                slidesToShow: 2,
                                                                slidesToScroll: 2
                                                            }
                                                        },
                                                        {
                                                            breakpoint: 480,
                                                            settings: {
                                                                slidesToShow: 1,
                                                                slidesToScroll: 1
                                                            }
                                                        }
                                                        // You can unslick at a given breakpoint now by adding:
                                                        // settings: "unslick"
                                                        // instead of a settings object
                                                    ]
                                                });

                                            });

                                        </script>

    </body>
</html>

