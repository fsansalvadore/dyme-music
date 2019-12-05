// This is where it all goes :)

$(document).ready(function(){
  $('select').formSelect();
});

const addLinkBtn = document.querySelector("#form-main-container span.add-field");
const link2 = document.getElementById("link-row-2");
const input2 = document.querySelector("input#link2");
const link3 = document.getElementById("link-row-3");
const input3 = document.querySelector("input#link3");
const removeLinks = document.querySelectorAll(".remove-link");
console.log(addLinkBtn);
console.log(link2);
let linksCount = 1;

const link1 = document.querySelector("input#link1");

link1.addEventListener("blur", () => {
  if (link1.value != "") {
      addLinkBtn.classList.remove("not-yet-abled");
    }
})

removeLinks.forEach((l, index) => {
  l.addEventListener("click", (e) => {
    if ((index + 2) == 2) {
      link = link2;
      input2.value = "";
    } else {
      link = link3;
      input3.value = "";
    }
    linksCount --;
    console.log(linksCount);
    console.log(removeLinks);
    addLinkBtn.classList.remove("hide");
    link.classList.add("disabled-link");
  })
})

addLinkBtn.addEventListener("click", (e) => {
  if (document.querySelector("input#link1").value == "") {
    alert("Aggiungi il primo link prima di aggiungerene altri 😉");
  } else if (linksCount == 1) {
    linksCount ++;
    link2.classList.remove("disabled-link");
    console.log(linksCount);
    addLinkBtn.classList.remove("hide", "not-yet-abled");
  } else if (linksCount == 2) {
    linksCount ++;
    link2.classList.remove("disabled-link");
    link3.classList.remove("disabled-link");
    console.log(linksCount);
    addLinkBtn.classList.add("hide");
  }
})
