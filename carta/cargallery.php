<?php
/*
	Template name: biler
*/
?>

<style>
    <?php include '/wp-content/plugins/biler/css/style.css'; ?>

</style>
<?php get_header(); ?>
<body onload="myFunctionGetBrand(1,'ny')">
<div id="contact">

    <div id="contacts" style="height: auto;" class="bar bar-type-4 colortheme-light backgroundtype-color bar-below next-bar-colortheme-dark" data-colortheme="white">
        <div class="triangle"></div>

        <div class="container" >

        <script>
            var audi="audi";
            var merc="merc";
            var vw="vw";
            var vw="volvo";
            var porsche="porsche";
            var bmw="bmw";
            var ny="ny";
            var old="old";
        </script>


                <div id="bp_sideBar">
                    <div class="menu_simple">
                        <ul>
                            <li>
                                <a type="button" href="#" onclick="myFunctionGetStatus(1,'ny')" style="font-size: 12px; color: black;">Nye Biller </a><br />
                            </li>
                            <li>
                                <a type="button" href="#" onclick="myFunctionGetStatus(1,'old')" style="font-size: 12px; color: black;">Brugte Biller </a><br />
                            </li>
                            <li>

                                <a type="button" href="#" onclick="myFunctionGetBrand(1,'audi')">Audi </a>
                            </li>

                            <li>
                                <a type="button" href="#" onclick="myFunctionGetBrand(1,'merc')">Merc </a>
                            </li>
                            <li>
                                <a type="button" href="#" onclick="myFunctionGetBrand(1,'bmw')">BMW </a>
                            </li>
                            <li>

                                <a type="button" href="#" onclick="myFunctionGetBrand(1,'volvo')">Volvo </a>
                            </li>

                            <li>
                                <a type="button" href="#" onclick="myFunctionGetBrand(1,'porsche')">Porsche </a>
                            </li>
                            <li>
                                <a type="button" href="#" onclick="myFunctionGetBrand(1,'vw')">VW </a>
                            </li>




                        </ul>
                    </div>
                </div>


                <div id="mainContent" >


                    <div id="output" style="width;100%; height:auto;"></div>
                </div>


        </div><!-- /container -->
    </div><!-- /contacts -->

    <?php
    if(get_field('bars')) {
        foreach(get_field('bars') as $bar) {
            switch($bar['acf_fc_layout']) {
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



</div><!-- /contact -->
</body>
<script>
    function myFunctionGet(id){

        var test1 = id;



        url = "http://Localhost:8080/bil/?id=" + test1;

        window.open(url,'_self');
    }

    function myFunctionGetPage(page,type) {
        getRequestpage(

            '../wp-content/plugins/biler/getbystatus.php', // URL for the PHP file
            page,
            type,
            drawOutputpage,  // handle successful request
            drawErrorpage    // handle error
        );
    }
    function getRequestpage(url, page,type ,success, error) {
        var req = false;
        try{
            // most browsers
            req = new XMLHttpRequest();
        } catch (e){
            // IE
            try{
                req = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                // try an older version
                try{
                    req = new ActiveXObject("Microsoft.XMLHTTP");
                } catch(e) {
                    return false;
                }
            }
        }
        if (!req) return false;
        if (typeof success != 'function') success = function () {};
        if (typeof error!= 'function') error = function () {};
        req.onreadystatechange = function(){
            if(req.readyState == 4) {
                return req.status === 200 ?
                    success(req.responseText) : error(req.status);
            }
        }
        var formData = {type:type,page:page}; //Array
        var jsonString = JSON.stringify(formData);
        req.open("POST", url, true);
        req.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        req.send("data="+ jsonString);
        return req;
    }
    function drawErrorpage() {
        var container = document.getElementById('output');
        container.innerHTML = 'Bummer: there was an error!';
    }
    // handles the response, adds the html
    function drawOutputpage(responseText) {
        var container = document.getElementById('output');
        container.innerHTML = responseText;
    }

    function myFunctionGetBrand(page,type) {

        getRequest1(

            '../wp-content/plugins/biler/getbystatus.php', // URL for the PHP file
            type,
            page,
            drawOutput1,  // handle successful request
            drawError1    // handle error
        );
    }
    function getRequest1(url, type ,page,success, error) {
        var req = false;
        try{
            // most browsers
            req = new XMLHttpRequest();
        } catch (e){
            // IE
            try{
                req = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                // try an older version
                try{
                    req = new ActiveXObject("Microsoft.XMLHTTP");
                } catch(e) {
                    return false;
                }
            }
        }
        if (!req) return false;
        if (typeof success != 'function') success = function () {};
        if (typeof error!= 'function') error = function () {};
        req.onreadystatechange = function(){
            if(req.readyState == 4) {
                return req.status === 200 ?
                    success(req.responseText) : error(req.status);
            }
        }

        var formData = {type:type,page:page}; //Array
        var jsonString = JSON.stringify(formData);
        req.open("POST", url, true);
        req.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        req.send("data="+ jsonString);
        return req;
    }
    function drawError1() {
        var container = document.getElementById('output');
        container.innerHTML = 'Bummer: there was an error!';
    }
    // handles the response, adds the html
    function drawOutput1(responseText) {
        var container = document.getElementById('output');
        container.innerHTML = responseText;
    }
    function myFunctionGetStatus(page,type) {
        getRequestStatus(

            '../wp-content/plugins/biler/getbystatus.php', // URL for the PHP file
            type,
            page,
            drawOutputStatus,  // handle successful request
            drawErrorStatus    // handle error
        );
    }
    function getRequestStatus(url, type ,page,success, error) {
        var req = false;
        try{
            // most browsers
            req = new XMLHttpRequest();
        } catch (e){
            // IE
            try{
                req = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                // try an older version
                try{
                    req = new ActiveXObject("Microsoft.XMLHTTP");
                } catch(e) {
                    return false;
                }
            }
        }
        if (!req) return false;
        if (typeof success != 'function') success = function () {};
        if (typeof error!= 'function') error = function () {};
        req.onreadystatechange = function(){
            if(req.readyState == 4) {
                return req.status === 200 ?
                    success(req.responseText) : error(req.status);
            }
        }
        var formData = {type:type,page:page}; //Array
        var jsonString = JSON.stringify(formData);
        req.open("POST", url, true);
        req.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        req.send("data="+ jsonString);
        return req;
    }
    function drawErrorStatus() {
        var container = document.getElementById('output');
        container.innerHTML = 'Bummer: there was an error!';
    }
    // handles the response, adds the html
    function drawOutputStatus(responseText) {
        var container = document.getElementById('output');
        container.innerHTML = responseText;
    }


</script>
<?php get_footer(); ?>
