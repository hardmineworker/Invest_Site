const form = document.querySelector("form");
let name;

form.addEventListener("submit",(e)=>{
    e.preventDefault();
    name = e.target.name.value;
    e.target.name.value=""
    localStorage.setItem("name", name);

})

name = localStorage.getItem("name");

document.querySelector("h1").innerHTML = name;
if(document.querySelector("h1").innerHTML != 0){
    document.getElementById("Name").innerHTML = "<form></form>";
}