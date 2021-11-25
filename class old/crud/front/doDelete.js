export default function doDelete(){
    let data = {
        "id": $("input[name=id]:checked").val(),
    };
    axios.post("http://localhost/mvc/1025/crud/backend/index.php?action=removeUser",Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })          
}
