import doUpdate from './doUpdate.js';
export default function showUpdatePage(id){
    let data = {
        "ID": id,
    };
    axios.post("http://localhost/mvc/1101/crud/backend/index.php?action=getRole",Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                //作畫面
                const rows = response['result'];
                const row = rows[0];
                let str = `角色編號：<input type="hidden" id="ID" value="` + row['ID'] + `">` + row['ID'] + `<br>`; 
                str += `角色名稱：<input type="text" id="role" value="` + row['title'] + `"><br>`;
                str += `<button id="doUpdate">修改</button>`;

                $("#content").html(str);
                $("#doUpdate").click(function(){
                    doUpdate();
                });
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
