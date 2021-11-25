export default function doDelete(id){
    let data = {
        "supid": id,
    };
    axios.post("http://localhost/mvc/1101/crud/backend/index.php?action=removeSupply",Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })          
}
