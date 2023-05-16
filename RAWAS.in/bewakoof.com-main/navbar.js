
// let url = "https://fakestoreapi.com/products";

//     async function fetchData(){
//         try{
//             let res = await fetch(url);
//             let data = await res.json();

//             console.log("Data :", data);
//         }catch(err){
//             console.log("err:",err);
//         }

//     }

//     fetchData();





function navbar() {
    return `


    <div id="navbar">
        <div>
            <div class="sanket">
                <img id="logo_1" src="logotest-fDjSHvee5-transformed.svg" alt="logo">
            </div>
            <div>
                <p>MEN</p>
                <p>ACCESORIES</p>

            </div>
            <div id="icons">
                <div id="livesearch">

                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" id="query"
                        onkeyup="showResult(this.value)"
                        placeholder="seaarch" />

                </div>
                <div>
                    <div></div>
                    <a href="./loginmain.html"><i class="fa-regular fa-user"></i></a>
                    <i class="fa-regular fa-heart"></i>
                    <a href="./addtocart.html"><i class="fa-solid fa-bag-shopping"></i></a>

                </div>
            </div>
        </div>
    </div>
       ` ;

}

function showResult(str) {
    if (str.length == 0) {
        document.getElementById("livesearch").innerHTML = "";
        document.getElementById("livesearch").style.border = "0px";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("livesearch").innerHTML = this.responseText;
            document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
        }
    }
    xmlhttp.open("GET", "livesearch.php?q=" + str, true);
    xmlhttp.send();
}




export default navbar;