function LoadFile() {
    var div = document.getElementById('response');
    var oFrame = document.getElementById("frmFile");
    var strRawContents = oFrame.contentWindow.document.body.childNodes[0].innerHTML;
    while (strRawContents.indexOf("\r") >= 0)
        strRawContents = strRawContents.replace("\r", "");
    var arrLines = strRawContents.split("\n");
    console.log(strRawContents);
    //document.getElementById('response').innerHTML = '<p>' + "1" + '</p><br>';
    //alert("File " + oFrame.src + " has " + arrLines.length + " lines");
    console.log("Loop alert 3");
    console.log("File " + oFrame.src + " has " + arrLines.length + " lines!");
    for (var i = 0; i < arrLines.length; i++) {
        console.log("Loop alert 5");
        var curLine = arrLines[i];
        //alert("Line #" + (i + 1) + " is: '" + curLine + "'");
        //document.getElementById('response').innerHTML = '<p>' + curLine + '</p><br>';
        //div.innerHTML = div.innerHTML + '<p>' + curLine + '</p>';
    }
}
function input() {
    console.log("Loop alert 4");
    var div = document.getElementById('response');
    var userinput = document.getElementById('userresponse').value.toUpperCase();
    div.innerHTML = div.innerHTML + '<p>YOU: ' + userinput + '</p>';
    //alert("input = " + userinput)
    if (userinput != "") {
        findresponse(userinput, div);
    }
}
function findresponse(userinput, div){
    var all = document.getElementById("frmFile");
    var RawContents = all.contentWindow.document.body.childNodes[0].innerHTML;
    //alert(RawContents);
    var searchreturn = RawContents.search("K" + userinput);
    console.log("Loop alert 2");
    while (RawContents.indexOf("\r") >= 0)
        RawContents = RawContents.replace("\r", "");
    var arrLines = RawContents.split("\n");
    for (var i = 0; i < arrLines.length; i++) {
        //console.log("Loop alert 1");
        var curLine = arrLines[i];
        var found = curLine.search("K" + userinput)
        //console.log("found = " + found)
        if (found != "-1") {
            var responseArray = new Array();
            //alert(curLine.substr(1));
            console.log("maybe infinate1")
            while (curLine != "#"){
                var curLine = arrLines[i];
                console.log(arrLines[i])
                if (curLine != "#" & curLine.charAt(0) != "C") {
                    responseArray.push(curLine.substr(1));
                };
                //alert(responseArray)
                var found = found + 1;
                console.log("curLine = " + curLine);
                //console.log(found);
                i++;
            }

            console.log(responseArray);
            console.log(responseArray.length);
            var u = responseArray.length;
            var RandomResponceDec = ((Math.random() * u) + 1);
            console.log("RandomResponceDec=" + RandomResponceDec);
            var RandomResponceInt = RandomResponceDec.toFixed(0);
            console.log(RandomResponceInt);
            // CHECK IF RandomResponceInt IS OVER NUMBER OF RESPONCES
            if (RandomResponceInt > u) {
                console.log("RandomResponceInt IS TOO BIG! Stepping Down by 1");
                var RandomResponceInt = RandomResponceInt-1
                if (RandomResponceInt > u) {
                    console.log("YOUR CODE IS F***ED UP!");
                    alert("critical error!")
                };

            }
            else if (RandomResponceInt <= u) {
                console.log("Writes 'undefined': " + responseArray[RandomResponceInt])
                if (responseArray[RandomResponceInt] == undefined) {
                    div.innerHTML = div.innerHTML + '<p>' + "*!Try Again!*" + '</p>';
                }
                else {
                    writeresponce(responseArray[RandomResponceInt], div); 

                }

            }
            else {
                console.log("not found!")
                div.innerHTML = div.innerHTML + '<p>' + "*RESPONCE NOT FOUND*" + '</p>';


            //div.innerHTML = div.innerHTML + '<p>' + userinput + '</p>';
        }
    }
}


}
function writeresponce(response, div) {
    console.log("Start of 'writeresponce'");
    console.log("Writing: " + response)
    if (response != undefined) {
        div.innerHTML = div.innerHTML + '<p>AMANDA: ' + response + '</p>';

    };

}