import startPage from "./startPage.js";
import cal from"./cal.js";

$(document).ready(function(){
    $("#root").html(startPage());
    $("#cal").click(function(e){
        cal();
    });
});
