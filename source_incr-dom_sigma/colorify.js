

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
	  


window.pushnode = function(dom_node){
	elements.push(dom_node);

	console.log(elements)
	if(elements[1]){
		elements[1].onclick = function(){

			$("#graph-container").empty();
			var mathmlvalue = $("#node-input").val();
			$(elements[4]).html(mathmlvalue);
			var mathmltext = $(elements[4]).text().replace(/\s+/g, '');




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

		s = new sigma({
		  graph: g,
		  container: 'graph-container'
		});

		}

	}

	if(elements[3]){
		elements[3].onclick = function(){
			$("#graph-container").empty();
			g.nodes = [];
			g.edges = [];
		}
	}

    
}