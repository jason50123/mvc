export default function doUpdate(){
    let data = {
        "prodid": $("#prodid").val(),
        "prodname":$("#prodname").val(),
        "cost": $("#cost").val(),
        "unitprice":$("#unitprice").val(),
        "qty":$("#qty").val()
    };
    axios.post("http://localhost/mvc/1101/crud/backend/index.php?action=updateProd",Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })
}
