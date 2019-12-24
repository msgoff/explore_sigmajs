

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
		        mathmltext1 = mathmltext.replace('/', '  /  ');
		        
        sigma.utils.pkg('sigma.settings');
		     var settings = {
		     drawLabels: false,
		   };
​
​
		  sigma.utils.pkg('sigma.canvas.nodes');
​
		  sigma.canvas.nodes.def = function(node, context, settings) { 
		    var prefix = settings('prefix') || '';
		    context.fillStyle = node.color || settings('defaultNodeColor');
		    context.beginPath();
		    context.arc(
		      node[prefix + 'x'],
		      node[prefix + 'y'],
		      node[prefix + 'size'],
		      0,
		      Math.PI * 2,
		      true
		    );
		    context.closePath();
		    context.fill();
		      x_pos = node[prefix + 'x'] + 10;
		      y_pos = (node[prefix + 'y'] + 4) + 147;
		      var oldlabel = document.getElementById("lbl"+node['id']);
		      if(oldlabel)
		      {
		        oldlabel.remove();
		      }  
​
		      var label = document.createElement("label");
		      label.setAttribute("id", "lbl"+node['id']);
		      label.style.position = "absolute";
		      label.style.left = x_pos+'px';
		      label.style.top = y_pos +'px';
		      label.innerHTML = node['label'];                   
		      document.body.appendChild(label);
		  };
​
​
		  sigma.utils.pkg('sigma.canvas.labels');
​
		  sigma.canvas.labels.def = function(node, context, settings) {
		    var fontSize,
		        prefix = settings('prefix') || '',
		        size = node[prefix + 'size'];
		  
​
		    if (size < settings('labelThreshold'))
		      return;
​
		    if (!node.label || typeof node.label !== 'string')
		      return;
​
		    fontSize = (settings('labelSize') === 'fixed') ?
		      settings('defaultLabelSize') :
		      settings('labelSizeRatio') * size;
​
		    context.font = (settings('fontStyle') ? settings('fontStyle') + ' ' : '') +
		      fontSize + 'px ' + settings('font');
		    context.fillStyle = (settings('labelColor') === 'node') ?
		      (node.color || settings('defaultNodeColor')) :
		      settings('defaultLabelColor');
		              
​
		    context.fillText(
		      node.label, 
		      Math.round(node[prefix + 'x'] + size + 3),
		      Math.round(node[prefix + 'y'] + fontSize / 3)
		    );
		  };
​
​
​
		nodeLabel.push(mathmlvalue);
​
			if(g.nodes.length === 0){
				var i = 0;
			}
			else{
				var i = g.nodes.length;
			}
		var newnode
			 = {
				id: 'n'+i,
				label:mathmlvalue,
				x:i*0.2,
				y:i*0.2,
				size:2,
				color:"#000"
			}
​
​
			g.nodes.push(newnode);
​
			elements[0].value = "";
			console.log(g)
			g.nodes = getUnique(g.nodes,'id');
			g.edges = getUnique(g.edges,'id');
​
​
		s = new sigma({
		  graph: g,
		  renderer: {
		    container: 'graph-container',
		    "settings" : settings,
		    type: 'canvas'
		  }
		});
​
		}
​
	}


	if(elements[3]){
		elements[3].onclick = function(){
			$("#graph-container").empty();
			g.nodes = [];
			g.edges = [];
		}
	}

    
}
