export default function doInsert(){
    let data = {
        "id": $("#id").val(),
        "name":$("#name").val(),
        "password": $("#password").val(),
        "entrydate":$("#entrydate").val(),
        "address":$("#address").val(),
        "email": $("#email").val(),
        "phone": $("#phone").val()
    };
    axios.post("http://localhost/mvc/1122/dbCrud/backend/index.php?action=newUser",Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })
}
