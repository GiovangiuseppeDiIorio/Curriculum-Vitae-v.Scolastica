// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {
  var input = document.createElement("input");
  var inputPass = document.createElement("input");

  inputPass.type = "password";
  inputPass.name = "password[]";
  var inputPassValue = document.getElementById("myInputPass").value;
  inputPass.classList.add('password');

  inputPass.value = inputPassValue;
  var inputValue = document.getElementById("myInput").value;
  input.type = "text";
  input.name = "username[]";  
  input.value = inputValue;

  var t = document.createTextNode(inputValue);
  input.appendChild(t);

  if (inputValue === '') {
    alert("Non lasciare il campo vuoto!");
  } else {
    document.getElementById("myUL").appendChild(input);
    document.getElementById("myUL").appendChild(inputPass);
  }
  document.getElementById("myInput").value = "";
  document.getElementById("myInputPass").value = "";
 /* var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  document.getElementById("myUL").appendChild(span);
*/
  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}