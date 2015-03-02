<?php
/*
	Template name: biler
*/
?>

<style>
    <?php include '/wp-content/plugins/biler/css/style.css'; ?>
</style>
<?php get_header(); ?>

<script type="text/javascript" src="../wp-content/plugins/biler/includes/js/biler.js"></script>

<body onload="myFunctionGetStatus(1,ny),myFunctionGetBrands(1,ny)">
<div id="contact">

    <div id="contacts" style="height: auto;"
         class="bar bar-type-4 colortheme-light backgroundtype-color bar-below next-bar-colortheme-dark"
         data-colortheme="white">
        <div class="triangle"></div>

        <div class="container">

            <script>
                var Audi = "Audi";
                var Mercedes = "Mercedes";
                var VW = "VW";
                var Volvo = "Volvo";
                var Porsche = "Porsche";

                var BMW = "BMW";
                var ny = "ny";
                var old = "old";
            </script>


            <div id="bp_sideBar">
                <div class="menu_simple">
                    <ul id="bp_sidelist">


                    </ul>
                </div>
            </div>


            <div id="mainContent">


                <div id="output" style="width;100%; height:auto;"></div>
            </div>


        </div>
        <!-- /container -->
    </div>
    <!-- /contacts -->

    <?php
    if (get_field('bars')) {
        foreach (get_field('bars') as $bar) {
            switch ($bar['acf_fc_layout']) {
                case "type1":
                    barType1($bar);
                    break;
                case "type2":
                    barType2($bar);
                    break;
                case "type3":
                    barType3($bar);
                    break;
                case "type4":
                    barType4($bar);
                    break;
                case "type5":
                    barType5($bar);
                    break;
            }
        }
    }
    ?>


</div>
<!-- /contact -->
</body>
<script>


</script>
<?php get_footer(); ?>
