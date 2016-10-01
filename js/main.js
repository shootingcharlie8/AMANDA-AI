// Gets input from index.php
function getuserinput() {
  var inputField = document.getElementById('userresponse').value;
  // Makes input UPPERCASE
  var userinput2 = inputField.toUpperCase();
  // Replaces special charicters
  var punctuationless = userinput2.replace(/[,#!$%\^&\*;:{}=\_`~()?]/g,"");
  var userinput = punctuationless.replace(/\s{2,}/g," ");
  inputField = "";
  return userinput;
}
function inputtext() {
  // Calls getuserinput() and sets returned value to userinput
  var userinput = getuserinput();
  var div = document.getElementById('response');
  //More stripping of special charicters (Its redundant)
  var punctuationless = userinput.replace(/[,#!$%\^&\*;:{}=\_`~()?]/g,"");
  var userinput = punctuationless.replace(/\s{2,}/g," ");
  if (userinput != "") {
    // Returns what you typed
    div.innerHTML = div.innerHTML + '<p>YOU: ' + userinput + '</p>';
    // Calls the getresponse function
    getresponse(userinput, div);
    // Resets input box
    var inputField = document.getElementById('userresponse');
    inputField.value = "";
  }
}
function getresponse(userinput, div){
  // Sends GET command to Utils/database.php to get a response
  $.get( "Utils/database.php", { keyword: userinput} )
  .done(function( data ) {
    // Converts the returned response to String
    data2 = data.toString();
    // Strips line endings and prints response
    div.innerHTML = div.innerHTML + '<p>AMANDA: ' + data2.replace(/(\r\n|\n|\r)/gm,"") + '</p>';
    // Scroll down text box
    div.scrollTop = div.scrollHeight;
    // Logs everything!
    $.get( "Utils/log.php", { keyword: userinput, response: data2.replace(/(\r\n|\n|\r)/gm,"") } );
  });
}
