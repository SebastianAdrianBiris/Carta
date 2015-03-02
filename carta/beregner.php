<?php
/*
    Template name: Beregner
*/
?>
<?php get_header(); ?>
<div id="beregner">
    <div class="container">
    <?php
        if(have_posts()) {
            while(have_posts()) {
                the_post();
                the_content();
            }
        }
    ?>
    </div>
</div>
<script>
    function printIframe() {
        // this is how you do it using jquery:


        // and this is how you do it using native javascript:
        document.getElementById("beregnerframe").contentWindow.print();
    }
    function SendEmail(){

        var form = document.createElement("form");


        form.setAttribute("method", "post");
        form.setAttribute("action", "http://localhost:8080/sendemail.php");//ths is where it is sent

// setting form target to a window named 'formresult'
        form.setAttribute("target", "formresult");



        var html = getSaveIndtastToPDF();


        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("name", "id");
        hiddenField.setAttribute("value", unescape( encodeURIComponent( html ) ));
        hiddenField.setAttribute("type", "hidden");
//hiddenField.setAttribute("style", "display:none;");
        form.appendChild(hiddenField);
        document.body.appendChild(form);

// creating the 'formresult' window with custom features prior to submitting the form
        window.open("", 'formresult', 'scrollbars=no,menubar=no,height=600,width=800,resizable=yes,toolbar=no,status=no');

        form.submit();
        form.innerHTML = '';
    }
    function saveindtasttopdf(){

        var form = document.createElement("form");

        form.setAttribute("method", "post");
        form.setAttribute("action", "http://localhost:8080/printToPdf.php");//ths is where it is sent

// setting form target to a window named 'formresult'
        form.setAttribute("target", "formresult");



        var html = getSaveIndtastToPDF();


        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("name", "id");
        hiddenField.setAttribute("value", unescape( encodeURIComponent( html ) ));
        hiddenField.setAttribute("type", "hidden");
//hiddenField.setAttribute("style", "display:none;");
        form.appendChild(hiddenField);
        document.body.appendChild(form);

// creating the 'formresult' window with custom features prior to submitting the form
        window.open("", 'formresult', 'scrollbars=no,menubar=no,height=600,width=800,resizable=yes,toolbar=no,status=no');

        form.submit();
        form.innerHTML = '';
    }
    function getSaveIndtastToPDF()
    {      // document.getElementById("beregnerframe")
        //updateAllDOMFields(document.form1);
        var iframe = document.getElementById('beregnerframe');
        var innerDoc = iframe.contentDocument || iframe.contentWindow.document;


        updateAllDOMFields(innerDoc.form1);
        var form = document.createElement("form");
        var pagebreak = '<div class="page-break"><\/div>';



        $tempvar=innerDoc.getElementById('print0');
        var save = $tempvar.innerHTML;





        var content = $tempvar.innerHTML;







        var html = "<h1>Indtastninger<\/h1>" + content;
        return html;
    }
    function updateAllDOMFields(theForm){
        var inputNodes = getAllFormFields(theForm);
        for(x=0; x < inputNodes.length; x++){
            var theNode = inputNodes[x];
            updateDOM(theNode)
        }
    }

    function getAllFormFields(theForm){
        try{
            var inputFields = theForm.getElementsByTagName("input");
            var selectFields = theForm.getElementsByTagName("select");
            var textFields = theForm.getElementsByTagName("textarea");
            var array = new Array(inputFields + selectFields + textFields);
            for(i=0; i < array.length; i++){
                for(x=0; x < inputFields.length; x++){
                    array[i] = inputFields[x];
                    i++
                }
                for(a=0; a < selectFields.length; a++){
                    array[i] = selectFields[a];
                    i++
                }
                for(t=0; t < textFields.length; t++){

                    array[i] = textFields[t];
                    i++
                }
            }
        }
        catch(e){alert("Error when evoking getAllFormFields(): \nSomething is probably wrong with the form you passed in\n\n"+e.message)}
        return array;
    }

    function updateDOM(inputField) {
        if (typeof inputField == "string") {
            inputField = document.getElementById(inputField);
        }
        if (inputField.type == "select-one") {
            for (var i=0; i<inputField.options.length; i++) {
                if (i == inputField.selectedIndex) {
                    inputField.options[inputField.selectedIndex].setAttribute("selected","selected");            }
            }
        } else if (inputField.type == "select-multiple") {
            for (var i=0; i<inputField.options.length; i++) {
                if (inputField.options[i].selected) {                inputField.options[i].setAttribute("selected","selected");
                } else {                inputField.options[i].removeAttribute("selected");            }        }
        } else if (inputField.type == "text") {        inputField.setAttribute("value",inputField.value);    }
        else if (inputField.type == "textarea") {        inputField.setAttribute("value",inputField.value);
            inputField.innerHTML = inputField.value;    }
        else if (inputField.type == "checkbox") {
            if (inputField.checked) {            inputField.setAttribute("checked","checked");
            } else {            inputField.removeAttribute("checked");        }
        } else if (inputField.type == "radio") {
            var radioNames = document.getElementsByName(inputField.name);
            for(var j=0; j < radioNames.length; j++) {
                if (radioNames[j].checked) {
                    radioNames[j].setAttribute("checked","checked");
                } else {
                    radioNames[j].removeAttribute("checked");
                }        }    }}

    function updateAllDOMFields(theForm){
        var inputNodes = getAllFormFields(theForm);
        for(x=0; x < inputNodes.length; x++){
            var theNode = inputNodes[x];
            updateDOM(theNode)
        }
    }

    function getAllFormFields(theForm){
        try{
            var inputFields = theForm.getElementsByTagName("input");
            var selectFields = theForm.getElementsByTagName("select");
            var textFields = theForm.getElementsByTagName("textarea");
            var array = new Array(inputFields + selectFields + textFields);
            for(i=0; i < array.length; i++){
                for(x=0; x < inputFields.length; x++){
                    array[i] = inputFields[x];
                    i++
                }
                for(a=0; a < selectFields.length; a++){
                    array[i] = selectFields[a];
                    i++
                }
                for(t=0; t < textFields.length; t++){

                    array[i] = textFields[t];
                    i++
                }
            }
        }
        catch(e){alert("Error when evoking getAllFormFields(): \nSomething is probably wrong with the form you passed in\n\n"+e.message)}
        return array;
    }

</script>
<?php get_footer(); ?>
