import showInsertPage from "./showInsertPage.js";
import showUpdatePage from "./showUpdatePage.js";
import doDelete from "./doDelete.js";

export default function supplyInfo(){
    axios.get("http://localhost/mvc/1101/crud/backend/index.php?action=getSupply")
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                const rows = response['result'];
                //作畫面
                let str = `<table align = "center" cellpadding="8" >`;
                str += `<tr><td>供應商編號</td><td>供應商名稱</td><td>聯絡人</td><td>電話</td><td>住址</td><td><button id='newSupply'>新增供應商</button></td></tr>`;
                rows.forEach(element => {
                    str += `<tr>`;
                    str += `<td id='id'>` + element['supId'] + `</td>`;
                    str += `<td>` + element['supName'] + `</td>`;
                    str += `<td>` + element['contact'] + `</td>`;
                    str += `<td>` + element['phone'] + `</td>`;
                    str += `<td>` + element['address'] + `</td>`;
                    str += `<td><button id='updateSupply'>修改</button><button id='deleteSupply'>刪除</button></td>`;
                    str += `</tr>`;
                });
                str += `</table>`;
                $("#content").html(str);

                //設定事件(新增使用者, 修改, 刪除) 
                $("#newSupply").click(function (e) { 
                    showInsertPage();
                });
                const updateButtons = $("button[id=updateSupply]");
                const deleteButtons = $("button[id=deleteSupply]");
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
