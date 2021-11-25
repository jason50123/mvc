import doInsert from './doInsert.js';

export default function showInsertPage(){
    let str = `角色名稱:<input type = "text" id = "title"><br>`;
    str += `<button id="doinsert">新增</button>`;
    $("#content").html(str);
    $("#doinsert").click(function(){
        doInsert();
    });
}
