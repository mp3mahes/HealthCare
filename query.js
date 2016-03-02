function initialize () {
}

function sendRequest () {
   var xhr = new XMLHttpRequest();
   xhr.open("GET", "query.php");
   xhr.onreadystatechange = function () {
       if (this.readyState == 4) {
          alert("hello");
       }
   };
   xhr.send(null);
}