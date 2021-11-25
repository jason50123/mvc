export default function doDelete(id){
    let data = {
        "ID": id,
    };
    axios.post("http://localhost/mvc/1101/crud/backend/index.php?action=removeRole",Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })          
}
