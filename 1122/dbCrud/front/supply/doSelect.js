export default function doSelect(){
    axios.get("http://localhost/mvc/1122/dbCrud/backend/index.php?action=getSupply")
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                const rows = response['result'];
                let str = '<table>';
                rows.forEach(element => {
                    str += "<tr>";
                    str += "<td>" + element['supId'] + "</td>";
                    str += "<td>" + element['supName'] + "</td>";
                    str += "<td>" + element['contact'] + "</td>";
                    str += "<td>" + element['phone'] + "</td>";
                    str += "<td>" + element['address'] + "</td>";
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
