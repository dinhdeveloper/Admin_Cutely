<!DOCTYPE html>
<html lang="en">
<?php
    $page = 0;
    if (isset($_GET['page'])){
        $page = $_GET['page'];
        settype($page, "int");
    }
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Hình Nền</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container">
    <?php
        include('Pages/Header.php');
        include('Pages/MenuLeft.php');
    ?>
    <section id="main-content">
        <section class="wrapper">
            <?php
            switch ($page){
                case 0:
                    include_once('Pages/MenuContent.php');
                    break;
                case 1:
                    include_once ('TaoTaiKhoan.php');
                    break;
                case 2:
                    include_once('SanPham/SanPham.php');
                    break;
                case 3:
                    include_once('SanPham/TaoSanPham.php');
                    break;
                case 4:
                    include_once('LoaiSanPham/LoaiSanPham.php');
                    break;
                case 5:
                    include_once('LoaiSanPham/TaoLSP.php');
                    break;
                case 6:
                    include_once ('TrangCaNhan.php');
                    break;
                case 20:
                    include_once('SanPham/SuaSanPham.php');
                    break;
                case 21:
                    include_once('SanPham/XoaSanPham.php');
                    break;
                case 22:
                    include_once('LoaiSanPham/SuaLSP.php');
                    break;
                case 23:
                    include_once('LoaiSanPham/XoaLSP.php');
                    break;
                case 24:
                    include_once ('SanPham/DanhMucSP.php');
                    break;
                default:
                    include_once('Pages/MenuContent.php');
                    break;
            }
            ?>
        </section>
        <!--footer end-->
    </section>
</section>
<!--<footer class="site-footer">-->
<!--    <div class="text-center">-->
<!--        2019 - Alfa wallpaper-->
<!--        <a href="index.php" class="go-top">-->
<!--            <i class="fa fa-angle-up"></i>-->
<!--        </a>-->
<!--    </div>-->
<!--</footer>-->
<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery-1.8.3.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="assets/js/jquery.sparkline.js"></script>


<!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script>

<script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="assets/js/gritter-conf.js"></script>

<!--script for this page-->
<script src="assets/js/sparkline-chart.js"></script>
<script src="assets/js/zabuto_calendar.js"></script>
<script type="application/javascript">
    $(document).ready(function () {
        $("#date-popover").popover({ html: true, trigger: "manual" });
        $("#date-popover").hide();
        $("#date-popover").click(function (e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function () {
                return myDateFunction(this.id, false);
            },
            action_nav: function () {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            legend: [
                { type: "text", label: "Special event", badge: "00" },
                { type: "block", label: "Regular event", }
            ]
        });
    });


    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>


</body>

</html>