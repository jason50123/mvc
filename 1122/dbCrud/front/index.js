import startPage from './startPage.js';
import employeeInfo from './employee/employeeInfo.js';
import productInfo from './product/productInfo.js';
import roleInfo from './role/roleInfo.js';
import supplyInfo from './supply/supplyInfo.js';
$(document).ready(function () {
    $("#root").html(startPage());
    $("#employee").click(function (e) { 
        employeeInfo();
    });
    $("#product").click(function(e){
        productInfo();
    })
    $("#role").click(function(e){
        roleInfo();
    })    
    $("#supply").click(function(e){
        supplyInfo();
    })
    
});
