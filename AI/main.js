function LoadFile() {
    var div = document.getElementById('response');
    var oFrame = document.getElementById("frmFile");
    var strRawContents = oFrame.contentWindow.document.body.childNodes[0].innerHTML;
    while (strRawContents.indexOf("\r") >= 0)
        strRawContents = strRawContents.replace("\r", "");
    var arrLines = strRawContents.split("\n");
    //document.getElementById('response').innerHTML = '<p>' + "1" + '</p><br>';
    //alert("File " + oFrame.src + " has " + arrLines.length + " lines");
    for (var i = 0; i < arrLines.length; i++) {
        var curLine = arrLines[i];
        //alert("Line #" + (i + 1) + " is: '" + curLine + "'");
        //document.getElementById('response').innerHTML = '<p>' + curLine + '</p><br>';
        div.innerHTML = div.innerHTML + '<p>' + curLine + '</p>';
    }
}
function input() {
    var div = document.getElementById('response');
    var userinput = document.getElementById('userresponse').value.toUpperCase();
    div.innerHTML = div.innerHTML + '<p>' + userinput + '</p>';
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
    while (RawContents.indexOf("\r") >= 0)
        RawContents = RawContents.replace("\r", "");
    var arrLines = RawContents.split("\n");
    for (var i = 0; i < arrLines.length; i++) {
        var curLine = arrLines[i];
        var found = curLine.search("K" + userinput)
        if (found != "-1") {
                var responseArray = new Array();
            //alert(curLine.substr(1));
            while (curLine != "#"){
                var curLine = arrLines[found];
                responseArray.push(curLine.substr(1));
                alert(responseArray)
                var found = found + 1;
                console.log(curLine);
                console.log(found);

            }
            console.log(responseArray);
            //div.innerHTML = div.innerHTML + '<p>' + userinput + '</p>';
        }
        /*else {
            alert("response not found. I guess you broke the internet.");
        };*/
    }
}