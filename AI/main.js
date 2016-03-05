function LoadFile() {
    var div = document.getElementById('responce');
    var oFrame = document.getElementById("frmFile");
    var strRawContents = oFrame.contentWindow.document.body.childNodes[0].innerHTML;
    while (strRawContents.indexOf("\r") >= 0)
        strRawContents = strRawContents.replace("\r", "");
    var arrLines = strRawContents.split("\n");
    //document.getElementById('responce').innerHTML = '<p>' + "1" + '</p><br>';
    //alert("File " + oFrame.src + " has " + arrLines.length + " lines");
    for (var i = 0; i < arrLines.length; i++) {
        var curLine = arrLines[i];
        //alert("Line #" + (i + 1) + " is: '" + curLine + "'");
        //document.getElementById('responce').innerHTML = '<p>' + curLine + '</p><br>';
        div.innerHTML = div.innerHTML + '<p>' + curLine + '</p>';
    }
}
function input() {
    var div = document.getElementById('responce');
    var userinput = document.getElementById('userresponce').value.toUpperCase();
    div.innerHTML = div.innerHTML + '<p>' + userinput + '</p>';
    //alert("input = " + userinput)
    if (userinput != "") {
        findresponce(userinput);
    }
}
function findresponce(userinput){
    var all = document.getElementById("frmFile");
    var RawContents = all.contentWindow.document.body.childNodes[0].innerHTML;
    //alert(RawContents);
    var searchreturn = RawContents.search("K" + userinput);
    alert(searchreturn);
}