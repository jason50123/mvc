export default function cal(){
    const data = {
        "w1" :$("#w1").val(),
        "h1" :$("#h1").val(),
        "w2" :$("#w2").val(),
        "h2" :$("#h2").val(),
    };
    axios.post("http://localhost/1004/test/backhend/main.php",Qs.stringify(data))
    .then(res =>{
        let response =res["data"];
        $("#content").html(response);
    })
    .catch(err => {
        console.error(err);
    })
}