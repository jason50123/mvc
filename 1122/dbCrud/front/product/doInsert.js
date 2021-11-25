export default function doInsert(){
    let data = {
        "prodid": $("#prodid").val(),
        "prodname":$("#prodname").val(),
        "cost": $("#cost").val(),
        "unitprice":$("#unitprice").val(),
        "qty":$("#qty").val()        
    };
    axios.post("http://localhost/mvc/1122/dbCrud/backend/index.php?action=newProd",Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })
}
