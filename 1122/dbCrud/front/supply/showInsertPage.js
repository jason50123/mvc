import doInsert from './doInsert.js';

export default function showInsertPage(){
    let str = `供應商名稱:<input type = "text" id = "supName"><br>`;
    str += `聯絡人：<input type="text" id="contact"><br>`;
    str += `電話：<input type="text" id="phone"><br>`;
    str += `地址：<input type="text" id="address"><br>`;
    str += `<button id="doinsert">新增</button>`;
    $("#content").html(str);
    $("#doinsert").click(function(){
        doInsert();
    });
}
