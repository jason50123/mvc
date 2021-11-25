export default function doSelect(){
    axios.get("http://localhost/mvc/1122/dbCrud/backend/index.php?action=getProd")
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                const rows = response['result'];
                let str = '<table>';
                rows.forEach(element => {
                    str += "<tr>";
                    str += "<td>" + element['prodid'] + "</td>";
                    str += "<td>" + element['prodname'] + "</td>";
                    str += "<td>" + element['cost'] + "</td>";
                    str += "<td>" + element['unitprice'] + "</td>";
                    str += "<td>" + element['qty'] + "</td>";
                    str += "</tr>";
                });
                str += '</table>';
                $("#content").html(str);
                break;
            default:
                $("#content").html(response['message']);
                break;
        }
    })
    .catch(err => {
        console.error(err); 
    }) 
}
