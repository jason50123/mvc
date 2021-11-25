import doUpdate from './doUpdate.js';
export default function showUpdatePage(id){
    let data = {
        "prodid": id,
    };
    axios.post("http://localhost/mvc/1122/dbCrud/backend/index.php?action=getProd",Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                //作畫面
                const rows = response['result'];
                const row = rows[0];
                let str = `產品編號：<input type="text" id="prodid" value="` + row['prodid'] + `"><br>`;
                str += `產品名稱：<input type="text" id="prodname" value="` + row['prodname'] + `"><br>`;
                str += `成本：<input type="text" id="cost" value="` + row['cost'] + `"><br>`;
                str += `單價：<input type="text" id="unitprice" value="` + row['unitprice'] + `"><br>`;
                str += `數量：<input type="text" id="qty" value="` + row['qty'] + `"><br>`;
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
