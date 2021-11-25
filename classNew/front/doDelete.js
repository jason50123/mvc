export default function doDelete(id){
    let data = {
        "id": id,
    };
    axios.post("http://localhost/mvc/classNew/backend/index.php?action=removeUser",Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })          
}
