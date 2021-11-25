export default function doSelect(){
    axios.get("http://localhost/mvc/1101/crud/backend/index.php?action=getRole")
    .then(res => {
        let response = res['data'];
        switch(response['status']){
            case 200:
                const rows = response['result'];
                let str = '<table>';
                rows.forEach(element => {
                    str += "<tr>";
                    str += "<td>" + element['ID'] + "</td>";
                    str += "<td>" + element['title'] + "</td>";
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
