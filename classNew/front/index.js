import startPage from './startPage.js';
import employeeInfo from './employeeInfo.js';

$(document).ready(function () {
    $("#root").html(startPage());
    $("#employee").click(function (e) { 
        employeeInfo();
    });
});
