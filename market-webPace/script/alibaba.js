function showAlert() {
    window.alert("will be updated soon");
}

const search = () =>{
    const searchbox = document.getElementById("author-container").value.toUpperCase();
    const storeitems = document.getElementById("row1")
    const product = document.querySelectorAll(".content")
    const pname =storeitems.getElementsByTagName("h4")
    for( var i = 0; i < pname.length; i++){
        let match = product[i].getElementsByTagName("h4")[0];

        if(match){
            let texvalue = match.textContent || match.innerHTML

            if(texvalue.toUpperCase().indexOf(searchbox)> -1 ){
                product[i].style.display = "";

            }else{
                product[i].style.display = "none";
            }
        }
    }
}
    


          

