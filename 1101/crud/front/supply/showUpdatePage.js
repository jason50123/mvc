import doUpdate from './doUpdate.js';
export default function showUpdatePage(id){
    let data = {
        "supid": id,
    };
    axios.post("http://localhost/mvc/1101/crud/backend/index.php?action=getSupply",Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                //作畫面
                const rows = response['result'];
                const row = rows[0];
                let str = `供應商編號：<input type="hidden" id="supId" value="` + row['supId'] + `">` + row['supId'] + `<br>`;
                str += `供應商名稱：<input type="text" id="supName" value="` + row['supName'] + `"><br>`;
                str += `聯絡人：<input type="text" id="contact" value="` + row['contact'] + `"><br>`;
                str += `電話：<input type="text" id="phone" value="` + row['phone'] + `"><br>`;
                str += `住址：<input type="text" id="address" value="` + row['address'] + `"><br>`;
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
