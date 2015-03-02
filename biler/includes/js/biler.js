
function ShowLablesFlex(){
    if(document.getElementById("checkboxFlex").checked){
        var temp= document.getElementById("beskatningsgrundlag_flex");
        temp.disabled = false;
        temp.style.backgroundColor = "white";

        temp= document.getElementById("Ydelse_flex");
        temp.disabled = false;
        temp.style.backgroundColor = "white";



        temp= document.getElementById("1_ydelse_flex");
        temp.disabled = false;
        temp.style.backgroundColor = "white";


    }
    else{
        temp= document.getElementById("beskatningsgrundlag_flex");
        temp.disabled = true;
        temp.style.backgroundColor = "#ccc";

        temp= document.getElementById("Ydelse_flex");
        temp.disabled = true;
        temp.style.backgroundColor = "#ccc";

        temp= document.getElementById("1_ydelse_flex");
        temp.disabled = true;
        temp.style.backgroundColor = "#ccc";



    }
}

function ShowLablesDele(){
    if(document.getElementById("checkboxDele").checked){
        var temp= document.getElementById("Ydelse_dele");
        temp.disabled = false;
        temp.style.backgroundColor = "white";

        temp= document.getElementById("driftstillæg");
        temp.disabled = false;
        temp.style.backgroundColor = "white";
        var temp= document.getElementById("1_ydelse_dele");
        temp.disabled = false;
        temp.style.backgroundColor = "white";


        temp= document.getElementById("beskatningsgrundlag_dele");
        temp.disabled = false;
        temp.style.backgroundColor = "white";

        temp= document.getElementById("skat_af_fri_bil");
        temp.disabled = false;
        temp.style.backgroundColor = "white";
    }else{
        var temp= document.getElementById("1_ydelse_dele");
        temp.disabled = true;
        temp.style.backgroundColor = "#ccc";

        temp= document.getElementById("Ydelse_dele");
        temp.disabled = true;
        temp.style.backgroundColor = "#ccc";

        temp= document.getElementById("driftstillæg");
        temp.disabled = true;
        temp.style.backgroundColor = "#ccc";

        temp= document.getElementById("beskatningsgrundlag_dele");
        temp.disabled = true;
        temp.style.backgroundColor = "#ccc";

        temp= document.getElementById("skat_af_fri_bil");
        temp.disabled = true;
        temp.style.backgroundColor = "#ccc";
    }
}


function GetBrands() {
    $.post("../wp-content/plugins/biler/includes/GetBrands.php",
        {
            Brand:12

        },
        function(elementTo,status)
        {

            var y=document.getElementById("Brand");
            var brandarray = JSON.parse(elementTo);
            for (index = 0; index < brandarray.length; ++index)
            {
                var option = document.createElement("option");
                option.text = brandarray[index];
                option.value = brandarray[index];
                y.appendChild(option);
            }
        });
}

function createBrand(){
    var brandd= prompt("Indtaste Mærke","");
    if(brandd!=null){
        SaveCars(brandd)
    }
}
function SaveCars(brandd){


    $.post("../wp-content/plugins/biler/includes/UpdateBrands.php",
        {
            Brand:  brandd

        },
        function(elementTo,status){

            if(elementTo=="not updated"){
                alert("not updated");
            }else{
                alert("updated");
                var testtemp=brandd;

                var y=document.getElementById("Brand");

                var option = document.createElement("option");
                option.text = testtemp;
                option.value = testtemp;
                y.appendChild(option);
            }





        });

}
function Loadposts(){


    $.post("../wp-content/plugins/biler/includes/LoadFromDB.php",
        {
            cardetails:  1404

        },
        function(data,status){


            var container = document.getElementById("testdiv");
            container.innerHTML = data;
        });


}
function getbyid(elementTo){


    $.post("../wp-content/plugins/biler/EditDB.php",
        {
            element:  elementTo

        },
        function(elementTo,status){


            var jArray = JSON.parse(elementTo);




            document.getElementById("checkboxFlex").checked=true;
            document.getElementById("checkboxDele").checked=true;
            ShowLablesFlex();
            ShowLablesDele();

            document.getElementById("Brand").value = jArray[0];
            document.getElementById("title").value = jArray[1];
            document.getElementById("title_long").value = jArray[2];
            document.getElementById("New_old").value = jArray[3];
            document.getElementById("production").value = jArray[4];
            document.getElementById("kilometer").value = jArray[5];

            document.getElementById("fuel").value = jArray[6];
            document.getElementById("colour").value = jArray[7];
            document.getElementById("besparelse").value = jArray[8];
            document.getElementById("periode").value = jArray[9];
            document.getElementById("korsel").value = jArray[10];

            document.getElementById("Ydelse_flex").value = jArray[11];
            document.getElementById("1_ydelse_flex").value = jArray[12];
            document.getElementById("beskatningsgrundlag_flex").value = jArray[13];
            document.getElementById("Ydelse_dele").value = jArray[14];
            document.getElementById("1_ydelse_dele").value = jArray[15];
            document.getElementById("driftstillæg").value = jArray[16];
            document.getElementById("beskatningsgrundlag_dele").value = jArray[17];
            document.getElementById("skat_af_fri_bil").value = jArray[18];
            document.getElementById("description").value = jArray[19];


            /*  thi is date     var container = document.getElementById("date").value = jArray[15]; */
            document.getElementById("Image1").value =  jArray[21];
            document.getElementById("Image2").value =  jArray[22];
            document.getElementById("Image3").value = jArray[23];
            document.getElementById("Image4").value =  jArray[24];
            document.getElementById("blah").src =  "../wp-content/plugins/biler/includes/test/"+jArray[21];
            document.getElementById("blah1").src =  "../wp-content/plugins/biler/includes/test/"+jArray[22];
            document.getElementById("blah2").src =  "../wp-content/plugins/biler/includes/test/"+jArray[23];
            document.getElementById("blah3").src =  "../wp-content/plugins/biler/includes/test/"+jArray[24];
            document.getElementById("currentID").value = jArray[25];
        });
}
function DeleteAll()
{
    var x = confirm("Are you sure you want to delete this post?");
    if (x==true){
        var deleteArray = [];
        $(":checkbox:checked[name^=checkboxDelete]").val(function() {
            deleteArray.push(JSON.parse(this.id));});
        if(deleteArray.length != 0)
        {
            $.post("../wp-content/plugins/biler/DeleteFromDB.php",
                {
                    deleteValues:deleteArray
                });
            setTimeout("location.reload(true);",200);
        }
        else {alert("Nothing is selected");
        }
    }
}
function deletebyid(elementTo){

    var x = confirm("Are you sure you want to delete this post?");
    if (x==true)
    {
        $.post("../wp-content/plugins/biler/DeleteFromDB.php",
            {
                element:elementTo
            });

    }
    setTimeout("location.reload(true);",200);
}


function myFunctionGetBrands(page, type) {

    getRequestpageBrands(
        '../wp-content/plugins/biler/GetBrandsSide.php', // URL for the PHP file
        page,
        type,
        drawOutputpageBrands,  // handle successful request
        drawErrorpageBrands    // handle error
    );
}

function getRequestpageBrands(url, page, type, success, error) {
    var req = false;
    try {
        // most browsers
        req = new XMLHttpRequest();
    } catch (e) {
        // IE
        try {
            req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            // try an older version
            try {
                req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                return false;
            }
        }
    }
    if (!req) return false;
    if (typeof success != 'function') success = function () {
    };
    if (typeof error != 'function') error = function () {
    };
    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            return req.status === 200 ?
                success(req.responseText) : error(req.status);
        }
    }
    var formData = {type: type, page: page}; //Array
    var jsonString = JSON.stringify(formData);
    req.open("POST", url, true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send("data=" + jsonString);
    return req;
}
function drawErrorpageBrands() {
    var container = document.getElementById('bp_sidelist');
    container.innerHTML = 'Bummer: there was an error!';
}
// handles the response, adds the html
function drawOutputpageBrands(responseText) {
    var container = document.getElementById('bp_sidelist');
    container.innerHTML = responseText;
}


function myFunctionGet(id) {

    var test1 = id;


    url = "http://localhost:8080/bil/?id=" + test1;

    window.open(url, '_self');
}



function myFunctionGetPage(page, type) {
    getRequestpage(
        '../wp-content/plugins/biler/getbystatus.php', // URL for the PHP file
        page,
        type,
        drawOutputpage,  // handle successful request
        drawErrorpage    // handle error
    );
}




function getRequestpage(url, page, type, success, error) {
    var req = false;
    try {
        // most browsers
        req = new XMLHttpRequest();
    } catch (e) {
        // IE
        try {
            req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            // try an older version
            try {
                req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                return false;
            }
        }
    }
    if (!req) return false;
    if (typeof success != 'function') success = function () {
    };
    if (typeof error != 'function') error = function () {
    };
    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            return req.status === 200 ?
                success(req.responseText) : error(req.status);
        }
    }
    var formData = {type: type, page: page}; //Array
    var jsonString = JSON.stringify(formData);
    req.open("POST", url, true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send("data=" + jsonString);
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

function myFunctionGetBrand(page, type) {

    getRequest1(
        '../wp-content/plugins/biler/getbystatus.php', // URL for the PHP file
        type,
        page,
        drawOutput1,  // handle successful request
        drawError1    // handle error
    );
}
function getRequest1(url, type, page, success, error) {
    var req = false;
    try {
        // most browsers
        req = new XMLHttpRequest();
    } catch (e) {
        // IE
        try {
            req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            // try an older version
            try {
                req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                return false;
            }
        }
    }
    if (!req) return false;
    if (typeof success != 'function') success = function () {
    };
    if (typeof error != 'function') error = function () {
    };
    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            return req.status === 200 ?
                success(req.responseText) : error(req.status);
        }
    }

    var formData = {type: type, page: page}; //Array
    var jsonString = JSON.stringify(formData);
    req.open("POST", url, true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send("data=" + jsonString);
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

function myFunctionGetStatus(page, type) {
    getRequestStatus(
        '../wp-content/plugins/biler/getbystatus.php', // URL for the PHP file
        type,
        page,
        drawOutputStatus,  // handle successful request
        drawErrorStatus    // handle error
    );
}
function getRequestStatus(url, type, page, success, error) {
    var req = false;
    try {
        // most browsers
        req = new XMLHttpRequest();
    } catch (e) {
        // IE
        try {
            req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            // try an older version
            try {
                req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                return false;
            }
        }
    }
    if (!req) return false;
    if (typeof success != 'function') success = function () {
    };
    if (typeof error != 'function') error = function () {
    };
    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            return req.status === 200 ?
                success(req.responseText) : error(req.status);
        }
    }

    var formData = {type: type, page: page}; //Array
    var jsonString = JSON.stringify(formData);
    req.open("POST", url, true);
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send("data=" + jsonString);
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

function Check(){
    $.post("../wp-content/plugins/biler/includes/check.php",
        {
            cardetails:  1404

        },
        function(data,status){


            var container = document.getElementById("bptestcheck");
            container.innerHTML = data;
        });

}