var c = true;
var ch = true;
var sm = true;
let text = "";
document.querySelector("body").addEventListener("click", hideMenu);
const contextMenu = document.getElementById("context-menu");
const secondContextMenu = document.getElementById("second-context-menu");
const createFolder = document.getElementById("nameFolder");

document.querySelectorAll("a")
.forEach(a=>a.addEventListener("contextmenu", ContextMenu));

document.querySelectorAll('a p').forEach(p=>p.addEventListener("contextmenu", (evnt)=> {
  evnt.preventDefault();
  text = evnt.target.textContent;
  console.log(text);
}));

document.querySelector("body").addEventListener("contextmenu", secondMenu, false);
document.querySelector(".folder").addEventListener("click", inpt, true);
document.getElementById("rename").addEventListener("click", newName, true);

let renameFile = document.getElementById("new_name");

function getName(ev) {
  ev.stopPropagation();
  const { clientX: mouseX, clientY: mouseY } = ev;
  pos = ev;
  text = pos.textContent;
  console.log(text);
}

function hideMenu() {
  contextMenu.style.display = "none";
  secondContextMenu.style.display = "none";
}

function newName(ez) {
  event.stopPropagation();
  const { clientX: mouseX, clientY: mouseY } = ez;
  renameFile.style.top = `${mouseY}px`;
  renameFile.style.left = `${mouseX}px`;
  renameFile.style.display = "block";
  
}

function inpt(ev) {
  let doc = document.getElementById("nameFolder");
  console.log(sm);
  event.stopPropagation();
  const { clientX: mouseX, clientY: mouseY } = ev;
  doc.style.top = `${mouseY}px`;
  doc.style.left = `${mouseX}px`;
  doc.style.display = "block";
}

function ContextMenu(event) {
      event.preventDefault();
      event.stopPropagation();
      const { clientX: mouseX, clientY: mouseY } = event;
      console.log("Right click");
      contextMenu.style.top = `${mouseY}px`;
      contextMenu.style.left = `${mouseX}px`;
      contextMenu.style.display = "block";
      c = false;         
  }

function secondMenu(e) {
  e.preventDefault();
  e.stopPropagation();
  const { clientX: mouseX, clientY: mouseY } = e;
    secondContextMenu.style.top = `${mouseY}px`;
    secondContextMenu.style.left = `${mouseX}px`;
    secondContextMenu.style.display = "block";
}

function del() {
    window.open("delete.php?file="+text.toString(), "_self");
    text = "";
}

function download() {
  window.open("download.php?file="+text.toString(), "_self");
  text = "";
}

function rename() {
  let inputText = document.getElementById("new_name").value;
  console.log(inputText);
  console.log(text);
  window.open("rename.php?file="+text.toString()+"&newName="+inputText.toString(), "_self");
  text = "";
}
