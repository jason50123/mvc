import startPage from './startPage.js';
import doSelect from './doSelect.js';
import showInsertPage from './showInsertPage.js';
import {showUpdateList, showDeleteList} from './showList.js';

$(document).ready(function () {
    $("#root").html(startPage());
    $("#insert").click(function (e) {
        showInsertPage();
    });
    $("#update").click(function (e) {
        showUpdateList();
    });
    $("#delete").click(function (e) {
        showDeleteList();
    });
    $("#select").click(function (e) {
        doSelect();
    });
});
