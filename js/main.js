function getuserinput() {
    var inputField = document.getElementById('userresponse').value;
    var userinput2 = inputField.toUpperCase();
    var punctuationless = userinput2.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()?]/g,"");
    var userinput = punctuationless.replace(/\s{2,}/g," ");
    inputField = "";
    return userinput;
}
function inputtext() {
    var learning = false;
    var userinput = getuserinput();
    var div = document.getElementById('response');
    var punctuationless = userinput.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()?]/g,"");
    var userinput = punctuationless.replace(/\s{2,}/g," ");
    if (userinput != "" && learning == false) {
        div.innerHTML = div.innerHTML + '<p>YOU: ' + userinput + '</p>';
        getresponse(userinput, div);
        var inputField = document.getElementById('userresponse');
        inputField.value = "";
    }
}
function getresponse(userinput, div){
    $.get( "Utils/database.php", { keyword: userinput} )
    .done(function( data ) {
        data2 = data.toString();
        div.innerHTML = div.innerHTML + '<p>AMANDA: ' + data2.replace(/(\r\n|\n|\r)/gm,"") + '</p>';
        div.scrollTop = div.scrollHeight;
        $.get( "Utils/log.php", { keyword: userinput, response: data2.replace(/(\r\n|\n|\r)/gm,"") } );
    });
}
