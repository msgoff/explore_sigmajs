

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


			var newnode = {
				id: 'n'+elements[0].value,
				label:elements[0].value,
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


	if(elements[4]){
		elements[4].onclick = function(){
			g.nodes = [];
			g.edges = [];
			$("#graph-container").empty();
			var nbNode = 50000;
			var nbEdge = 20000;

			for (i = 0; i < nbNode; i++)
			  g.nodes.push({
			    id:  i,
			    label: 'Node ' + i,
			    x: Math.random(),
			    y: Math.random(),
			    size: 1,
			    color: '#EE651D'
			  });
			for (i = 0; i < nbEdge; i++)
			  g.edges.push({
			    id: i,
			    source: '' + (Math.random() * nbNode | 0),
			    target: '' + (Math.random() * nbNode | 0),
			    color: '#202020',
			    type: 'curvedArrow'
			  });
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



}