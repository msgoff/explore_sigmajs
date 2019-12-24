
var width = 960,
    height = 500;

var tree = d3.layout.tree().size([width - 20, height - 20]);
var root = {},
	nodes = tree(root);
    root.parent = root;
    root.px = root.x;
    root.py = root.y;

var diagonal = d3.svg.diagonal();

var elements = [];


window.pushnode = function(dom_node){
	elements.push(dom_node);
	if(elements[4]){
		var svg = d3.select(elements[2]).append("svg")
	            .attr("width", width)
	            .attr("height", height)
	            .append("g")
	            .attr("transform", "translate(10,10)");

			var node = svg.selectAll(".node"),
			    link = svg.selectAll(".link");
			var duration = 750;
	}
  
	if(elements[1]){
		elements[1].onclick = function(){

		//	$("#graph-container").empty();
			var mathmlvalue = $("#node-input").val();
			$(elements[4]).html(mathmlvalue);
			$("msqrt").prepend("&radic;");
			$("mfrac").children().first().after(" / ");


		var mathmltext = $(elements[4]).text().replace(/\s+/g, '');
		    mathmltext1 = mathmltext.replace('/', '  /  ');
	      

		if (nodes.length >= 500) return clearInterval(timer);

        var n = {id: nodes.length},
            p = nodes[Math.random() * nodes.length | 0];

            
        	if (p.children)
         		p.children.push(n); 
	    	 else 
	     		p.children = [n];
	           nodes.push(n);


        node = node.data(tree.nodes(root), function (d) {
            return d.id;
        });
        link = link.data(tree.links(nodes), function (d) {
            return d.source.id + "-" + d.target.id;
        });

        var gelement = node.enter();

        gelement.append("circle")
                .attr("class", "node")
                .attr("r", 10)
                .attr("cx", function (d) {
                    return d.parent.px;
                })
                .attr("cy", function (d) {
                    return d.parent.py;
                    
                })

       //  link.enter().insert("path", ".g.node")
       //          .attr("class", "link")
       //          .attr("d", function (d) {
       //              var o = {x: d.source.px};
       //               return diagonal({source: o, target: o});

                     
       //          }).attr('pointer-events', 'none');


       node.on("mouseover", function (d) {
            var g = d3.select(gelement); // The node
            var div = d3.select("body").append("div")
                    .attr('pointer-events', 'none')
                    .attr("class", "tooltip")
                    .style("opacity", 1)
                    .html(mathmlvalue)
                    .style("left", (d.x + 20 + "px"))
                    .style("top", ((d.y + 147) +"px"));

        });

        node.on("mouseout", function (d) {
            d3.select("body").select('div.tooltip').remove();
        });

        var t = svg.transition()
                .duration(duration);

        t.selectAll(".link")
                .attr("d", diagonal);

        t.selectAll(".node")
                .attr("cx", function (d) {
                    return d.px = d.x;
                })
                .attr("cy", function (d) {
                    return d.py = d.y;
                });
		  
                $("#node-input").val("");
		}

	}

	if(elements[3]){
		elements[3].onclick = function(){
			//$("#graph-container").empty();
		}
	}
	

}


