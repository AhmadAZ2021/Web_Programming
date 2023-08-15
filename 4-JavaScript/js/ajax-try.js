function loadNow() {
  //Call server to get the name
  var src=this;
  console.log(src.id);
  var xttp = new XMLHttpRequest();
  xttp.onreadystatechange = function () {
    if ((this.readyState == 4) && (this.status == 200)) {
      var name = this.responseText;
      src.innerHTML = "<h2>Hello " + name + "!</h2>";
      // document.querySelector("#content").innerHTML = "<h2>Hello " + name + "!</h2>";
    }
  };
  xttp.open("GET", "/data/name.txt", true);
  xttp.send(null);//for POST only
};
//Event handling
document.addEventListener("DOMContentLoaded", function(event){
  document.querySelector("#mine1").addEventListener("click", loadNow);
  document.querySelector("#mine2").addEventListener("click", loadNow);  
});