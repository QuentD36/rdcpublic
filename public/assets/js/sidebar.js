let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".sidebar");

btn.onclick = function (){
    console.log("test")
    sidebar.classList.toggle("active")
}

