import doInsert from './doInsert.js';

export default function showInsertPage(){
    let str = `產品編號：<input type="text" id="prodid"><br>`;
    str += `產品名稱:<input type = "text" id = "prodname"><br>`;
    str += `成本：<input type="text" id="cost"><br>`;
    str += `單價：<input type="text" id="unitprice"><br>`;
    str += `數量：<input type="text" id="qty"><br>`;
    str += `<button id="doinsert">新增</button>`;
    $("#content").html(str);
    $("#doinsert").click(function(){
        doInsert();
    });
}
