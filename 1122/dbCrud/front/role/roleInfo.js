import showInsertPage from "./showInsertPage.js";
import showUpdatePage from "./showUpdatePage.js";
import doDelete from "./doDelete.js";

export default function roleInfo(){
    axios.get("http://localhost/mvc/1122/dbCrud/backend/index.php?action=getRole")
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                const rows = response['result'];
                //作畫面
                let str = `<table align = "center" cellpadding="8" >`;
                str += `<tr><td>ID</td><td>角色名稱</td><td><button id='newRole'>新增角色</button></td></tr>`;
                rows.forEach(element => {
                    str += `<tr>`;
                    str += `<td id='id'>` + element['ID'] + `</td>`;
                    str += `<td>` + element['title'] + `</td>`;
                    str += `<td><button id='updateRole'>修改</button><button id='deleteRole'>刪除</button></td>`;
                    str += `</tr>`;
                });
                str += `</table>`;
                $("#content").html(str);

                //設定事件(新增使用者, 修改, 刪除) 
                $("#newRole").click(function (e) { 
                    showInsertPage();
                });
                const updateButtons = $("button[id=updateRole]");
                const deleteButtons = $("button[id=deleteRole]");
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
