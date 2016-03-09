console.log("Main Javascript Loaded");
function LoadDaFilez() {
    var div = document.getElementById('response');
    var oFrame = document.getElementById("frmFile");
    var strRawContents = oFrame.contentWindow.document.body.childNodes[0].innerHTML;
    while (strRawContents.indexOf("\r") >= 0)
        strRawContents = strRawContents.replace("\r", "");
    var arrLines = strRawContents.split("\n");
    //console.log(strRawContents);
    //document.getElementById('response').innerHTML = '<p>' + "1" + '</p><br>';
    //alert("File " + oFrame.src + " has " + arrLines.length + " lines");
    //console.log("Loop alert 3");
    //console.log("File " + oFrame.src + " has " + arrLines.length + " lines!");
    for (var i = 0; i < arrLines.length; i++) {
        //console.log("Loop alert 5");
        var curLine = arrLines[i];
        //alert("Line #" + (i + 1) + " is: '" + curLine + "'");
        //document.getElementById('response').innerHTML = '<p>' + curLine + '</p><br>';
        //div.innerHTML = div.innerHTML + '<p>' + curLine + '</p>';
    }
}
function inputtext() {
    //console.log("Loop alert 4");
    var div = document.getElementById('response');
    var userinput = document.getElementById('userresponse').value.toUpperCase();
    var punctuationless = userinput.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()?]/g,"");
    var userinput = punctuationless.replace(/\s{2,}/g," ");
    div.innerHTML = div.innerHTML + '<p>YOU: ' + userinput + '</p>';
    //alert("input = " + userinput)
    if (userinput != "") {
        findresponse(userinput, div);
        var inputField = document.getElementById('userresponse');
        inputField.value = "";

    }
}
function findresponse(userinput, div){
    div.scrollTop = div.scrollHeight;
    var all = document.getElementById("frmFile");
    var RawContents = all.contentWindow.document.body.childNodes[0].innerHTML;
    //console.log(RawContents);
    //var searchreturn = RawContents.match('/K' + userinput + '/g');
    //console.log("Loop alert 2");
    //while (RawContents.indexOf("\r") >= 0) 
    //RawContents = RawContents.replace("\r", "");
    var arrLines = RawContents.split("\n");
    var i = 0; 
    //console.log(arrLines.length)
    var found = false;
    console.log("userinput: " + userinput)
    while (i < arrLines.length) {
            //console.log("ran for loop!")
        //console.log("arrLines[i] = " + arrLines[i]);
        var curLine = arrLines[i];
        //console.log(arrLines[i])
        //alert(curLine)
        //console.log('K' + userinput)
        var found2 = curLine.indexOf('K' + userinput);
        console.log(found);
        if (found2 == 0) {
            var found = true;
            console.log(curLine)
            console.log(found2)
            break;
        }


        /*if (arrLines[i] == 'K' + userinput) {
            var found = true;
            //console.log("found it!");
            break;
        }*/
        i++;
    }
    //var found = curLine.match(/K + userinput + /g)
    //console.log("found = " + found)
    if (found == true) {
        var responseArray = new Array();
        //alert(curLine.substr(1));
        //console.log("maybe infinate1")
        while (curLine != "#"){
            i++;
            var curLine = arrLines[i];
            //console.log(arrLines[i])
            if (curLine != "#" & curLine.charAt(0) != "C") {
                responseArray.push(curLine.substr(1));
            };
            //alert(responseArray)
            //var found = found + 1;
            //console.log("curLine = " + curLine);
            //console.log(found);
            
        }

        //console.log(responseArray);
        //console.log(responseArray.length);
        var u = responseArray.length;
        var RandomResponceDec = ((Math.random() * u) + 0);
        //console.log("RandomResponceDec=" + RandomResponceDec);
        var RandomResponceInt = RandomResponceDec.toFixed(0);
        // console.log(RandomResponceInt);
        // CHECK IF RandomResponceInt IS OVER NUMBER OF RESPONCES
        while (RandomResponceInt >= u) {
            // console.log("RandomResponceInt IS TOO BIG! Stepping Down by 1");
            var RandomResponceInt = RandomResponceInt-1
            if (RandomResponceInt > u) {
                // console.log("YOUR CODE IS F***ED UP!");
                alert("critical error!")
            };

        }
        if (RandomResponceInt <= u) {
            // console.log("Writes 'undefined': " + responseArray[RandomResponceInt])
            if (responseArray[RandomResponceInt] == undefined) {
                //div.innerHTML = div.innerHTML + '<p>' + "*!Try Again!*" + '</p>';
                // console.log("***CALLED ERRORLOOP***")
                errorloop(responseArray[RandomResponceInt], div);

            }
            else {
                writeresponce(responseArray[RandomResponceInt].toString(), div); 
                //$.post( "log.php", { keyword: userinput, response: responseArray[RandomResponceInt].toString() } )
                //var values = $(this).serialize();
                $url = 'log.php';
                console.log("keyword: " + userinput)
                console.log("response: " + responseArray[RandomResponceInt].toString())
                $.get($url, {keyword: userinput, response: responseArray[RandomResponceInt].toString()});

            }

        }


            //div.innerHTML = div.innerHTML + '<p>' + userinput + '</p>';
        }
        else {
            // console.log("not found!")
            div.innerHTML = div.innerHTML + '<p>' + "*RESPONSE NOT FOUND*" + '</p>';
            $url = 'unknown.php';
            $.get($url, {keyword: userinput});
            //learn(div);
            div.scrollTop = div.scrollHeight;


        };
    }
function errorloop(response, div){
    writeresponce(response, div); 
}
function writeresponce(response, div) {
    // console.log("Start of 'writeresponce'");
    // console.log("Writing: " + response)
    if (response != undefined) {
        div.innerHTML = div.innerHTML + '<p>AMANDA: ' + response + '</p>';
        

    }
    else {
        // console.log("Last resort caught undefined!")
    }

div.scrollTop = div.scrollHeight;


}

function learn(div){
    var InitIntro = 'HELLO, YOU HAVE ENTERED THE LEARNING FUNCTION OF AMANDA.'
    var InitIntro2 = 'PLEASE ENTER KEYWORD'
    var userinput = document.getElementById('userresponse').value.toUpperCase();
    var punctuationless = userinput.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()?]/g,"");
    var inputfinal = punctuationless.replace(/\s{2,}/g," ");
    div.innerHTML = div.innerHTML + '<p>LEARNING: ' + InitIntro + '</p>';
    div.innerHTML = div.innerHTML + '<p>LEARNING: ' + InitIntro2 + '</p>';
    if (inputfinal == '!exit') {
        div.innerHTML = div.innerHTML + '<p>LEARNING: ' + 'CALLED "!EXIT": EXITING!' + '</p>';

    }
    else {
        var keyword = 'K' + inputfinal
        console.log("keyword = " + inputfinal);
            div.innerHTML = div.innerHTML + '<p>LEARNING: ' + "Is your keyword: " + keyword + '? (Y/n)</p>';
            var userinput = document.getElementById('userresponse').value.toUpperCase();
            var punctuationless = userinput.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()?]/g,"");
            var inputfinal = punctuationless.replace(/\s{2,}/g," ");
            if (inputfinal == "n") {
                div.innerHTML = div.innerHTML + '<p>LEARNING: ' + "Going back to beginning" + '</p>';
                learn(div);
            }
            else if (inputfinal == "y") {
                div.innerHTML = div.innerHTML + '<p>LEARNING: ' + "PLEASE ENTER RESPONSE" + '</p>';
                var userinput = document.getElementById('userresponse').value.toUpperCase();
                var punctuationless = userinput.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()?]/g,"");
                var inputResponse = punctuationless.replace(/\s{2,}/g," ");
                var KeywordResponse = 'R' + inputResponse;
                div.innerHTML = div.innerHTML + '<p>LEARNING: ' + "RESPONSE SET TO: " + inputResponse + '</p>';
                $.post( "autoadd2.php", { keyword: keyword, response: KeywordResponse } )
                //div.innerHTML = div.innerHTML + '<p>LEARNING: ' + "APPEND SCRIPT FILE WITH: " + '</p>';
                //div.innerHTML = div.innerHTML + '<p>' + keyword + '</p>';
                //div.innerHTML = div.innerHTML + '<p>' + KeywordResponse + '</p>';
                //div.innerHTML = div.innerHTML + '<p>' + "#" + '</p>';

            }
            else {
                console.log("error")
            }

    }



}
