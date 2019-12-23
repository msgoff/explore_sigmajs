

var g = {
	nodes : [],
	edges: []
}

	var i,
    s;

var elements = [];

function getUnique(arr, comp) {

	  const unique = arr
		   .map(e => e[comp])

		 // store the keys of the unique objects
		.map((e, i, final) => final.indexOf(e) === i && i)

		// eliminate the dead keys & store unique objects
		.filter(e => arr[e]).map(e => arr[e]);

	   return unique;
	}
	
function getDOM(xmlstring) {
    parser=new DOMParser();
    return parser.parseFromString(xmlstring, "text/xml");
}

function remove_tags(node) {
    var result = "";
    var nodes = node.childNodes;
    var tagName = node.tagName;
    if (!nodes.length) {
        if (node.nodeValue == "π") result = "pi";
        else if (node.nodeValue == " ") result = "";
        else result = node.nodeValue;
    } else if (tagName == "mfrac") {
        result = "("+remove_tags(nodes[0])+")/("+remove_tags(nodes[1])+")";
    } else if (tagName == "msup") {
        result = "Math.pow(("+remove_tags(nodes[0])+"),("+remove_tags(nodes[1])+"))";
    } else for (var i = 0; i < nodes.length; ++i) {
        result += remove_tags(nodes[i]);
    }

    if (tagName == "mfenced") result = "("+result+")";
    if (tagName == "msqrt") result = "Math.sqrt("+result+")";

    return result;
}
function stringifyMathML(mml) {
   xmlDoc = getDOM(mml);
   return remove_tags(xmlDoc.documentElement);
}

	  
window.pushnode = function(dom_node){
	elements.push(dom_node);

	console.log(elements)
	if(elements[1]){
		elements[1].onclick = function(){

			$("#graph-container").empty();
			var mathmlvalue = $("#node-input").val();
			$(elements[4]).html(mathmlvalue);
// start using parsing
/*
            var mathmltext1 = stringifyMathML(mathmlvalue).replace(/\s+/g, '');
		    console.log(mathmltext1);
*/
// end using parsing

//start using js

			$("msqrt").prepend("&radic;");
			$("mfrac").children().first().after(" / ");
			$("mrow").append(")").prepend("(");
			var mathmltext = $(elements[4]).text().replace(/\s+/g, '');
		        mathmltext1 = mathmltext.replace('/', '  /  ');
//end using js		      

			var newnode = {
				id: 'n'+mathmltext,
				label:mathmltext,
				x:Math.random(),
				y:Math.random(),
				size:2,
				color:"#000"
			}

			g.nodes.push(newnode);

			elements[0].value = "";
		console.log(g)
		g.nodes = getUnique(g.nodes,'id');
		g.edges = getUnique(g.edges,'id');

	/*	s = new sigma({
		  graph: g,
		  container: 'graph-container'
		});*/
		


	if(elements[3]){
		elements[3].onclick = function(){
			$("#graph-container").empty();
			g.nodes = [];
			g.edges = [];
		}
	}

    
}
