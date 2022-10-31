var check = true;
document.querySelector("body").addEventListener("click", decoration, true);
document.querySelector("form").addEventListener("click", stopClick, true);
document.querySelector(".social").addEventListener("click", stopClick, true);

let men = document.getElementById("sas");
let p = document.getElementById("p");
let p1 = document.getElementById("p1");
let ennesimo = document.getElementById("crosshair");
function show() {
    if (check == true) {
        document.getElementById('password').type = 'text';
        document.getElementById('btn').innerHTML = "Nascondi password";
        check = false;
    } else if (check == false) {
        document.getElementById('password').type = 'password';
        document.getElementById('btn').innerHTML = "Mostra password";
        check = true;
    }
}

function decoration(ev) { 
    const { clientX: mouseX, clientY: mouseY } = ev; 
    //men.style.top = `${mouseY}px`;
    //men.style.left = `${mouseX}px`; 
    ennesimo.style.top = `${mouseY}px`;
    ennesimo.style.left = `${mouseX}px`;
    ennesimo.style.display = "block";
    //ennesimo.style.width = "1000%";
    //ennesimo.style.transition = "all 0.2s";   
    ennesimo.classList.add("add");         
    ennesimo.style.transform = "translate(-50%, -30%)";
    
    p.innerHTML = mouseX.toString() + " " + mouseY.toString();
    p.style.display = "block";
    //men.style.display = "block";
    //men.style.transform = "translate(-50%, -50%)";
    
    p.style.top = `${mouseY}px`;
    p.style.left = `${mouseX}px`; 
    p.style.transform = "translate(40%, 95%)";
    p.style.transition = "all 0.2s";  


    p1.style.display = "block";
    p1.style.top = `${mouseY}px`;
    p1.style.left = `${mouseX}px`; 
    p1.style.transform = "translate(25%, -400%)";
    p1.style.transition = "all 0.2s";  

} 

function stopClick(e) {
    e.stopPropagation();
    const { clientX: mouseX, clientY: mouseY } = e; 
    //men.style.display = "none";
    ennesimo.style.display = "none";
    p.style.display = "none";
    p1.style.display = "none";
}