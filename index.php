<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<style>
    divCase1:nth-child(odd),
    divCase2:nth-child(even){
            background: #F7F8E0;
    }
    divCase1:nth-child(even),
    divCase2:nth-child(odd)
    {
            background: #1c1c1c;
    }
    
</style>
<script>function test(){alert("test");}</script>
<script>
function getAndIcrementCaseNumber(increment)
{
    if(increment)
    {
        caseNb++;
    if(caseNb != 0 && (caseNb == 8 || caseNb == 18 || caseNb == 28|| caseNb == 38|| caseNb == 48|| caseNb == 58|| caseNb == 68 || caseNb == 78))
    {
        caseNb+= 2;
    }
    if(caseNb == 80)
        caseNb = 0;
    if(caseNb < 10)
        return "0" + String(caseNb);
    else
        return String(caseNb);
    }
    else
    {
        if(caseNb < 10)
            return "0" + String(caseNb);
        else
            return String(caseNb);
    }
}
</script>
<script>
var pieces = ["PN100", "PB170","TN107"];
var caseNb = -1;
function putImage(caseNumber)
{
    for(var i = 0; i < pieces.length; i++)
    {
        var caseTemp = String(pieces[i].charAt(3)) + String(pieces[i].charAt(4));
        if(caseTemp == caseNumber)
        {
            
            var img = new Image(document.createElement("img" + getAndIcrementCaseNumber(false)));
            img.setAttribute("src", getImageSource(pieces[i]));
            //alert(img.getAttribute("src")); // ./Image/PN.png
            var nom = "case" + getAndIcrementCaseNumber(false);
            var src = document.getElementById(nom);
            //alert(src.nodeName); // DIVCASE1
            img.setAttribute("height", "100%");
            img.setAttribute("width", "100%");
            src.appendChild(img);       
        }
    }

}
</script>
<script>
function getImageSource(piece)
{
    var imgsrc;
    if(piece.charAt(1) == 'N')
    {
        if(piece.charAt(0) == 'P')
            imgsrc = "./Image/PN.png";
        else if(piece.charAt(0) == 'Q')
            imgsrc = "./Image/QN.png";
        else if(piece.charAt(0) == 'K')
            imgsrc = "./Image/KN.png";
        else if(piece.charAt(0) == 'F')
            imgsrc = "./Image/FN.png";
        else if(piece.charAt(0) == 'T')
            imgsrc = "./Image/TN.png";
        else if(piece.charAt(0) == 'C')
            imgsrc = "./Image/CN.png";
    }
    else if(piece.charAt(1) == 'B')
    {
        if(piece.charAt(0) == 'P')
            imgsrc = "./Image/PB.png";
        else if(piece.charAt(0) == 'Q')
            imgsrc = "./Image/QB.png";
        else if(piece.charAt(0) == 'K')
            imgsrc = "./Image/KB.png";
        else if(piece.charAt(0) == 'F')
            imgsrc = "./Image/FB.png";
        else if(piece.charAt(0) == 'T')
            imgsrc = "./Image/TB.png";
        else if(piece.charAt(0) == 'C')
            imgsrc = "./Image/CB.png";
    }
    return imgsrc;
}
</script>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <title></title>
    </head>
    <body onresize="setSquare()" onload="setSquare()">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <div class="row" id="row">
            <divCase1 class="col-xs-1 col-xs-offset-2" id="case00"></divCase1>
            <divCase1 class="col-xs-1" id="case01"></divCase1>
            <divCase1 class="col-xs-1" id="case02"></divCase1>
            <divCase1 class="col-xs-1" id="case03"></divCase1>
            <divCase1 class="col-xs-1" id="case04"></divCase1>
            <divCase1 class="col-xs-1" id="case05"></divCase1>
            <divCase1 class="col-xs-1" id="case06"></divCase1>
            <divCase1 class="col-xs-1" id="case07"></divCase1>
        </div>
        <div class="row">
            <divCase2 class="col-xs-1 col-xs-offset-2" id="case10"></divCase2>
            <divCase2 class="col-xs-1" id="case11"></divCase2>
            <divCase2 class="col-xs-1" id="case12"></divCase2>
            <divCase2 class="col-xs-1" id="case13"></divCase2>
            <divCase2 class="col-xs-1" id="case14"></divCase2>
            <divCase2 class="col-xs-1" id="case15"></divCase2>
            <divCase2 class="col-xs-1" id="case16"></divCase2>
            <divCase2 class="col-xs-1" id="case17"></divCase2>
        </div>
        <div class="row">
            <divCase1 class="col-xs-1 col-xs-offset-2" id="case20"></divCase1>
            <divCase1 class="col-xs-1" id="case21"></divCase1>
            <divCase1 class="col-xs-1" id="case22"></divCase1>
            <divCase1 class="col-xs-1" id="case23"></divCase1>
            <divCase1 class="col-xs-1" id="case24"></divCase1>
            <divCase1 class="col-xs-1" id="case25"></divCase1>
            <divCase1 class="col-xs-1" id="case26"></divCase1>
            <divCase1 class="col-xs-1" id="case27"></divCase1>
        </div>
         <div class="row">
            <divCase2 class="col-xs-1 col-xs-offset-2" id="case30"></divCase2>
            <divCase2 class="col-xs-1" id="case31"></divCase2>
            <divCase2 class="col-xs-1" id="case32"></divCase2>
            <divCase2 class="col-xs-1" id="case33"></divCase2>
            <divCase2 class="col-xs-1" id="case34"></divCase2>
            <divCase2 class="col-xs-1" id="case35"></divCase2>
            <divCase2 class="col-xs-1" id="case36"></divCase2>
            <divCase2 class="col-xs-1" id="case37"></divCase2>
        </div>
        <div class="row">
             <divCase1 class="col-xs-1 col-xs-offset-2" id="case40"></divCase1>
            <divCase1 class="col-xs-1" id="case41"></divCase1>
            <divCase1 class="col-xs-1" id="case42"></divCase1>
            <divCase1 class="col-xs-1" id="case43"></divCase1>
            <divCase1 class="col-xs-1" id="case44"></divCase1>
            <divCase1 class="col-xs-1" id="case45"></divCase1>
            <divCase1 class="col-xs-1" id="case46"></divCase1>
            <divCase1 class="col-xs-1" id="case47"></divCase1>
        </div>
        <div class="row">
            <divCase2 class="col-xs-1 col-xs-offset-2" id="case50"></divCase2>
            <divCase2 class="col-xs-1" id="case51"></divCase2>
            <divCase2 class="col-xs-1" id="case52"></divCase2>
            <divCase2 class="col-xs-1" id="case53"></divCase2>
            <divCase2 class="col-xs-1" id="case54"></divCase2>
            <divCase2 class="col-xs-1" id="case55"></divCase2>
            <divCase2 class="col-xs-1" id="case56"></divCase2>
            <divCase2 class="col-xs-1" id="case57"></divCase2>
        </div>
        <div class="row">
            <divCase1 class="col-xs-1 col-xs-offset-2" id="60"></divCase1>
            <divCase1 class="col-xs-1" id="case61"></divCase1>
            <divCase1 class="col-xs-1" id="case62"></divCase1>
            <divCase1 class="col-xs-1" id="case63"></divCase1>
            <divCase1 class="col-xs-1" id="case64"></divCase1>
            <divCase1 class="col-xs-1" id="case65"></divCase1>
            <divCase1 class="col-xs-1" id="case66"></divCase1>
            <divCase1 class="col-xs-1" id="case67"></divCase1>
        </div>
        <div class="row">
            <divCase2 class="col-xs-1 col-xs-offset-2" id="case70"></divCase2>
            <divCase2 class="col-xs-1" id="case71"></divCase2>
            <divCase2 class="col-xs-1" id="case72"></divCase2>
            <divCase2 class="col-xs-1" id="case73"></divCase2>
            <divCase2 class="col-xs-1" id="case74"></divCase2>
            <divCase2 class="col-xs-1" id="case75"></divCase2>
            <divCase2 class="col-xs-1" id="case76"></divCase2>
            <divCase2 class="col-xs-1" id="case77"></divCase2>
        </div>
        
        <script>
            for(var i = 0; i < 64; i++)
            {
                putImage(getAndIcrementCaseNumber(true));
            }
        </script>
  <script>
    function getElementsByIdStartsWith(container, selectorTag, prefix) {
    var items = [];
    var myPosts = document.getElementById(container).getElementsByTagName(selectorTag);
    for (var i = 0; i < myPosts.length; i++) {
        //omitting undefined null check for brevity
        if (myPosts[i].id.lastIndexOf(prefix, 0) === 0) {
            items.push(myPosts[i]);
        }
    }
    return items;
}
function setSquare() {
    var all = document.getElementsByTagName("divCase1");
    var all2 = document.getElementsByTagName("divCase2");
    var largeurTest = getElementsByIdStartsWith("row", "divCase1", "case");
    var largeur = largeurTest[0].clientWidth; 
    for (var element in all) {
    all[element].style.height = largeur + "px";
    all2[element].style.height = largeur + "px";
  }
}
</script>

    </body>
</html>
