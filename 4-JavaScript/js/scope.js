let msg="In global";
console.log("gloabal: message= "+msg);

let a=function(){
	let msg="Inside a";
	console.log("a: message= "+msg);
	function b(){
		console.log("b: message= "+msg);
	}
	b();
};
function b(){
    let msg = 'hi from b';
	console.log("b: message= "+msg);
}

a();
b();