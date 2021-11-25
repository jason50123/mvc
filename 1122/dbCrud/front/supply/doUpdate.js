export default function doUpdate(){
    let data = {
        "supId": $("#supId").val(),
        "supName":$("#supName").val(),
        "contact": $("#contact").val(),
        "phone":$("#phone").val(),
        "address":$("#address").val()
    };
    axios.post("http://localhost/mvc/1122/dbCrud/backend/index.php?action=updateSupply",Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })
}