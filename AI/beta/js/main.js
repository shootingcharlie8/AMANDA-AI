var lastresponse = "";
//console.log("reset lastresponse")
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
    $.get( "Utils/database.php", { keyword: userinput, lastsaid: lastresponse} )
    .done(function( data ) {
        data2 = data.toString();
        div.innerHTML = div.innerHTML + '<p>AMANDA: ' + data2.replace(/(\r\n|\n|\r)/gm,"") + '</p>';
        div.scrollTop = div.scrollHeight;
        $.get( "Utils/log.php", { keyword: userinput, response: data2.replace(/(\r\n|\n|\r)/gm,"") } );
        var lastresponse = data2;
      //console.log("lastresponse set to: " + lastresponse)
    });
}
/*
function learn(div){
    var InitIntro = 'HELLO, YOU HAVE ENTERED THE LEARNING FUNCTION OF AMANDA.'
    var InitIntro2 = 'PLEASE ENTER KEYWORD'
    var userinput = getuserinput();
    console.log("Userinput:" + userinput + ";")

    div.innerHTML = div.innerHTML + '<p>LEARNING: ' + InitIntro + '</p>';
    div.innerHTML = div.innerHTML + '<p>LEARNING: ' + InitIntro2 + '</p>';
    while (userinput == "") {
        var userinput = getuserinput();
        console.log("loop1")
    }
    console.log("Userinput" + userinput)
    if (userinput == 'EXIT') {
            console.log("Called EXIT")
            div.innerHTML = div.innerHTML + '<p>LEARNING: ' + 'CALLED "!EXIT": EXITING!' + '</p>';
        }
        else {
            var keyword = inputfinal
            console.log("keyword = " + inputfinal);
            div.innerHTML = div.innerHTML + '<p>LEARNING: ' + "Is your keyword: " + keyword + '? (Y/n)</p>';
            var userinput = getuserinput();
            var punctuationless = userinput.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()?]/g,"");
            var inputfinal = punctuationless.replace(/\s{2,}/g," ");
            if (inputfinal == "n") {
                div.innerHTML = div.innerHTML + '<p>LEARNING: ' + "Going back to beginning" + '</p>';
                learn(div);
            }
            else if (inputfinal == "y") {
                div.innerHTML = div.innerHTML + '<p>LEARNING: ' + "PLEASE ENTER RESPONSE" + '</p>';
                var userinput = getuserinput();
                var punctuationless = userinput.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()?]/g,"");
                var inputResponse = punctuationless.replace(/\s{2,}/g," ");
                var KeywordResponse = inputResponse;
                div.innerHTML = div.innerHTML + '<p>LEARNING: ' + "RESPONSE SET TO: " + inputResponse + '</p>';
                $.get( "Utils/learn.php", { keyword: keyword, response: KeywordResponse } );

            }
            else {
                console.log("error")
            }
    
        } 
    



}
*/