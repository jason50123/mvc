import showInsertPage from "./showInsertPage.js";
import showUpdatePage from "./showUpdatePage.js";
import doDelete from "./doDelete.js";

export default function productInfo(){
    axios.get("http://localhost/mvc/1122/dbCrud/backend/index.php?action=getProd")
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                const rows = response['result'];
                //作畫面
                let str = `<table align = "center" cellpadding="8" >`;
                str += `<tr><td>產品編號</td><td>產品名稱</td><td>成本</td><td>單價</td><td>數量</td><td><button id='newProd'>新增產品</button></td></tr>`;
                rows.forEach(element => {
                    str += `<tr>`;
                    str += `<td id='id'>` + element['prodid'] + `</td>`;
                    str += `<td>` + element['prodname'] + `</td>`;
                    str += `<td>` + element['cost'] + `</td>`;
                    str += `<td>` + element['unitprice'] + `</td>`;
                    str += `<td>` + element['qty'] + `</td>`;
                    str += `<td><button id='updateProd'>修改</button><button id='deleteProd'>刪除</button></td>`;
                    str += `</tr>`;
                });
                str += `</table>`;
                $("#content").html(str);

                //設定事件(新增使用者, 修改, 刪除) 
                $("#newProd").click(function (e) { 
                    showInsertPage();
                });
                const updateButtons = $("button[id=updateProd]");
                const deleteButtons = $("button[id=deleteProd]");
                const ids = $("td[id=id]");
                updateButtons.click(function(e){
                    const idx = updateButtons.index($(this));
                    showUpdatePage(ids[idx].innerText);
                })
                deleteButtons.click(function(e){
                    const idx = deleteButtons.index($(this));
                    doDelete(ids[idx].innerText);
                })
                
                break;
            default:
                $("#content").html(response['message']);
                break;
        }
    })
    .catch(err => {
        console.error(err); 
    }) 
}
