function clicked() {
   alert("Button Clicked!");
}

function mouseOver(id) {
   document.getElementById(id).style.fontWeight = "bold";
}

function mouseOut(id) {
   document.getElementById(id).style.fontWeight = "normal";
}

function showCreate() {
   var element = document.getElementById('createBTN');
    if(element.innerHTML == "Create New Job") {
       document.getElementById('createNew').style.visibility = "visible";
       document.getElementById('createBTN').innerHTML = "Hide Create New";
    }
 
    else {
       document.getElementById('createNew').style.visibility = "hidden";
       document.getElementById('createBTN').innerHTML = "Create New Job";
    }
 }

 function showSearch() {
   var element = document.getElementById('searchBTN');
    if(element.innerHTML == "Search") {
       document.getElementById('search').style.visibility = "visible";
       document.getElementById('searchBTN').innerHTML = "Hide Search";
    }
 
    else {
       document.getElementById('search').style.visibility = "hidden";
       document.getElementById('searchBTN').innerHTML = "Search";
    }
 }
