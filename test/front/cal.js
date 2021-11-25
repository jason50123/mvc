export default function cal(){
    const data = {
        "w1": $("#w1").val(),
        "h1": $("#h1").val(),
        "w2": $("#w2").val(),
        "h2": $("#h2").val(),
    }; 
    axios.post("http://localhost/mvc/test/backend/index.php?action=TwoRectArea",Qs.stringify(data))
    .then(res => {
        const response = res['data'];
        if(response['status']==200){
            let html = '長方形1的面積：' + response['result'][0];
            html += '長方形2的面積：' + response['result'][1];
            $("#content").html(html);
        }
    })
    .catch(err => {
        console.error(err); 
    })
}

