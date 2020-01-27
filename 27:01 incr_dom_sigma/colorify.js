var colors = ["red", "green", "blue", "yellow", "orange"];
window.colorify = function (dom_node,graph_nodes) {
  dom_node.onclick = function () {
    


    var i,
    s,
    N = 100,
    E = 500,
    g = {
      nodes: [],
      edges: []
    };

// Generate a random graph:
for (i = 0; i < graph_nodes.length; i++)
  g.nodes.push({
    id: 'n' + i,
    label: graph_nodes[i].c,
    x: Math.random(),
    y: Math.random(),
    size: 4,
    color: '#666'
  });

for (i = 0; i < (graph_nodes.length - 1); i++)
  g.edges.push({
    id: 'e' + i,
    source: 'n' + i,
    target: 'n' +(i+1),
    size: 4,
    color: '#ccc'
  });

document.getElementById("graph-container").innerHTML = "";

// Instantiate sigma:
s = new sigma({
  graph: g,
  container: 'graph-container'
});

    // var i = Math.floor(Math.random() * colors.length);
    // var foreground = colors[i];
    // var background = colors[(i + 1) % colors.length];
    // dom_node.style.color = foreground;
    // dom_node.style.backgroundColor = background;
  };
};
