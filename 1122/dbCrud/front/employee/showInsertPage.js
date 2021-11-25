import doInsert from './doInsert.js';

export default function showInsertPage(){
    let str = `編號：<input type="text" id="id"><br>`;
    str += `姓名:<input type = "text" id = "name"><br>`;
    str += `密碼：<input type="text" id="password"><br>`;
    str += `入職日期：<input type="date" id="entrydate"><br>`;
    str += `地址：<input type="text" id="address"><br>`;
    str += `email：<input type="text" id="email"><br>`;
    str += `電話：<input type="text" id="phone"><br>`;
    str += `<button id="doinsert">新增</button>`;
    $("#content").html(str);
    $("#doinsert").click(function(){
        doInsert();
    });
}
