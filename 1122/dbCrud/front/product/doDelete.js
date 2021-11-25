export default function doDelete(id){
    let data = {
        "prodid": id,
    };
    axios.post("http://localhost/mvc/1122/dbCrud/backend/index.php?action=removeProd",Qs.stringify(data))
    .then(res => {
        let response = res['data'];
        $("#content").html(response['message']);
    })
    .catch(err => {
        console.error(err); 
    })          
}
