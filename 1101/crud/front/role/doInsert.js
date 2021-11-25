export default function doInsert(){
    let data = {
        "ID": $("#ID").val(),   
        "title": $("#title").val()   
    };
    axios.post("http://localhost/mvc/1101/crud/backend/index.php?action=newRole",Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })
}
