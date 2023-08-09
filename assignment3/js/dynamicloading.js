document.addEventListener("DOMContentLoaded", function(event){
	document.querySelector("#block1").addEventListener("click", function(){
	  var xttp = new XMLHttpRequest();
	  xttp.onreadystatechange = function(){
		if((this.readyState == 4) && (this.status == 200))
		{
		  var itemTemplate = this.responseText;
		  var xttp = new XMLHttpRequest();
		  xttp.onreadystatechange = function(){
			if((this.readyState == 4) && (this.status == 200)){
			  var entry = JSON.parse(this.responseText);
  
			  var newContent = ""; // Create an empty string to store the new content
  
			  for(var i = 0; i < entry.length; i++){
				var currentItem = itemTemplate.replace(new RegExp("{{name}}", "g"), entry[i].name);
				currentItem = currentItem.replace(new RegExp("{{description}}", "g"), entry[i].description);
				newContent += currentItem;
				console.log(entry[i]);
			  }
  
			  // Replace the entire body content with the new content
			  document.querySelector(".mainSection").innerHTML = newContent;
			  document.querySelector("header").innerHTML = ("Chicken Menu");
			}
		  };
		  xttp.open("GET", "data/chicken.json", true);
		  xttp.send(null);
		}
	 };
	  xttp.open("GET", "templates/item.html", true);
	  xttp.send(null);
	});
  });
  
  

document.addEventListener("DOMContentLoaded", function(event){
	document.querySelector("#block2").addEventListener("click", function(){
	  var xttp = new XMLHttpRequest();
	  xttp.onreadystatechange = function(){
		if((this.readyState == 4) && (this.status == 200)){
		  var itemTemplate = this.responseText;
		  var xttp = new XMLHttpRequest();
		  xttp.onreadystatechange = function(){
			if((this.readyState == 4) && (this.status == 200)){
			  var entry = JSON.parse(this.responseText);
  
			  var newContent = ""; // Create an empty string to store the new content
  
			  for(var i = 0; i < entry.length; i++){
				var currentItem = itemTemplate.replace(new RegExp("{{name}}", "g"), entry[i].name);
				currentItem = currentItem.replace(new RegExp("{{description}}", "g"), entry[i].description);
				newContent += currentItem;
				console.log(entry[i]);
			  }
  
			  // Replace the entire body content with the new content
			  document.querySelector(".mainSection").innerHTML = newContent;
			  document.querySelector("header").innerHTML = ("Beef Menu");
			}
		  };
		  xttp.open("GET", "data/beef.json", true);
		  xttp.send(null);
		}
	  };
	  xttp.open("GET", "templates/item.html", true);
	  xttp.send(null);
	});
  });



document.addEventListener("DOMContentLoaded", function(event){
	document.querySelector("#block3").addEventListener("click", function(){
	  var xttp = new XMLHttpRequest();
	  xttp.onreadystatechange = function(){
		if((this.readyState == 4) && (this.status == 200)){
		  var itemTemplate = this.responseText;
		  var xttp = new XMLHttpRequest();
		  xttp.onreadystatechange = function(){
			if((this.readyState == 4) && (this.status == 200)){
			  var entry = JSON.parse(this.responseText);
  
			  var newContent = ""; // Create an empty string to store the new content
  
			  for(var i = 0; i < entry.length; i++){
				var currentItem = itemTemplate.replace(new RegExp("{{name}}", "g"), entry[i].name);
				currentItem = currentItem.replace(new RegExp("{{description}}", "g"), entry[i].description);
				newContent += currentItem;
				console.log(entry[i]);
			  }
  
			  // Replace the entire body content with the new content
			  document.querySelector(".mainSection").innerHTML = newContent;
			  document.querySelector("header").innerHTML = ("Suchi Menu");
			}
		  };
		  xttp.open("GET", "data/fish.json", true);
		  xttp.send(null);
		}
	  };
	  xttp.open("GET", "templates/item.html", true);
	  xttp.send(null);
	});
  });



// function loadItem(){
//   //Call server to get the entriy and the items
//   var item=null;
//   var xttp=new XMLHttpRequest();
//   xttp.onreadystatechange=function(){
//     if((this.readyState==4)&&(this.status==200)){
//       item = this.responseText;
//       var xttp=new XMLHttpRequest();
//       xttp.onreadystatechange=function(){
//         if((this.readyState==4)&&(this.status==200)){
//           var entry= JSON.parse(this.responseText);
//           item = item.replace(new RegExp("{{name}}", "g"), entry.name);
//           item = item.replace(new RegExp("{{description}}", "g"), entry.description);
                 
//           document.querySelector("#content").innerHTML=document.querySelector("#content").innerHTML+item;				   
//         }
//       };
//       xttp.open("GET", "data/item.json", true);
//       xttp.send(null);//for POST only
//     }
//   };
//   xttp.open("GET", "templates/item.html", true);
//   xttp.send(null);//for POST only
// }
