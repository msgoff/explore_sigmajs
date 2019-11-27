<!-- START SIGMA IMPORTS -->

<script src="{{url('/sigma/src/sigma.core.js')}}"></script>

<script src="{{url('/sigma/src/conrad.js')}}"></script>

<script src="{{url('/sigma/src/utils/sigma.utils.js')}}"></script>

<script src="{{url('/sigma/src/utils/sigma.polyfills.js')}}"></script>

<script src="{{url('/sigma/src/sigma.settings.js')}}"></script>

<script src="{{url('/sigma/src/classes/sigma.classes.dispatcher.js')}}"></script>

<script src="{{url('/sigma/src/classes/sigma.classes.configurable.js')}}"></script>

<script src="{{url('/sigma/src/classes/sigma.classes.graph.js')}}"></script>

<script src="{{url('/sigma/src/classes/sigma.classes.camera.js')}}"></script>

<script src="{{url('/sigma/src/classes/sigma.classes.quad.js')}}"></script>

<script src="{{url('/sigma/src/classes/sigma.classes.edgequad.js')}}"></script>

<script src="{{url('/sigma/src/captors/sigma.captors.mouse.js')}}"></script>

<script src="{{url('/sigma/src/captors/sigma.captors.touch.js')}}"></script>

<script src="{{url('/sigma/src/renderers/sigma.renderers.canvas.js')}}"></script>

<script src="{{url('/sigma/src/renderers/sigma.renderers.webgl.js')}}"></script>

<script src="{{url('/sigma/src/renderers/sigma.renderers.svg.js')}}"></script>

<script src="{{url('/sigma/src/renderers/sigma.renderers.def.js')}}"></script>

<script src="{{url('/sigma/src/renderers/webgl/sigma.webgl.nodes.def.js')}}"></script>

<script src="{{url('/sigma/src/renderers/webgl/sigma.webgl.nodes.fast.js')}}"></script>

<script src="{{url('/sigma/src/renderers/webgl/sigma.webgl.edges.def.js')}}"></script>

<script src="{{url('/sigma/src/renderers/webgl/sigma.webgl.edges.fast.js')}}"></script>

<script src="{{url('/sigma/src/renderers/webgl/sigma.webgl.edges.arrow.js')}}"></script>

<script src="{{url('/sigma/src/renderers/canvas/sigma.canvas.labels.def.js')}}"></script>

<script src="{{url('/sigma/src/renderers/canvas/sigma.canvas.hovers.def.js')}}"></script>

<script src="{{url('/sigma/src/renderers/canvas/sigma.canvas.nodes.def.js')}}"></script>

<script src="{{url('/sigma/src/renderers/canvas/sigma.canvas.edges.def.js')}}"></script>

<script src="{{url('/sigma/src/renderers/canvas/sigma.canvas.edges.curve.js')}}"></script>

<script src="{{url('/sigma/src/renderers/canvas/sigma.canvas.edges.arrow.js')}}"></script>

<script src="{{url('/sigma/src/renderers/canvas/sigma.canvas.edges.curvedArrow.js')}}"></script>

<script src="{{url('/sigma/src/renderers/canvas/sigma.canvas.edgehovers.def.js')}}"></script>

<script src="{{url('/sigma/src/renderers/canvas/sigma.canvas.edgehovers.curve.js')}}"></script>

<script src="{{url('/sigma/src/renderers/canvas/sigma.canvas.edgehovers.arrow.js')}}"></script>

<script src="{{url('/sigma/src/renderers/canvas/sigma.canvas.edgehovers.curvedArrow.js')}}"></script>

<script src="{{url('/sigma/src/renderers/canvas/sigma.canvas.extremities.def.js')}}"></script>

<script src="{{url('/sigma/src/renderers/svg/sigma.svg.utils.js')}}"></script>

<script src="{{url('/sigma/src/renderers/svg/sigma.svg.nodes.def.js')}}"></script>

<script src="{{url('/sigma/src/renderers/svg/sigma.svg.edges.def.js')}}"></script>

<script src="{{url('/sigma/src/renderers/svg/sigma.svg.edges.curve.js')}}"></script>

<script src="{{url('/sigma/src/renderers/svg/sigma.svg.labels.def.js')}}"></script>

<script src="{{url('/sigma/src/renderers/svg/sigma.svg.hovers.def.js')}}"></script>

<script src="{{url('/sigma/src/middlewares/sigma.middlewares.rescale.js')}}"></script>

<script src="{{url('/sigma/src/middlewares/sigma.middlewares.copy.js')}}"></script>

<script src="{{url('/sigma/src/misc/sigma.misc.animation.js')}}"></script>

<script src="{{url('/sigma/src/misc/sigma.misc.bindEvents.js')}}"></script>

<script src="{{url('/sigma/src/misc/sigma.misc.bindDOMEvents.js')}}"></script>

<script src="{{url('/sigma/src/misc/sigma.misc.drawHovers.js')}}"></script>

<!-- END SIGMA IMPORTS -->
<script src="{{url('/sigma/lib/sigma.min.js')}}"></script>

<script src="{{url('/sigma/lib/sigma.layout.forceAtlas2.min.js')}}"></script>

<script src="{{url('/sigma/plugins/sigma.parsers.gexf/gexf-parser.js')}}"></script>

<script src="{{url('/sigma/plugins/sigma.parsers.gexf/sigma.parsers.gexf.js')}}"></script>

<script src="{{url('/sigma/plugins/sigma.plugins.filter/sigma.plugins.filter.js')}}"></script>

<link href='https://fonts.googleapis.com/css?family=Lato:300,700' rel='stylesheet' type='text/css'>

<script src="{{url('/sigma/plugins/sigma.plugins.dragNodes/sigma.plugins.dragNodes.js')}}"></script>

<script
  src="{{url('/sigma/plugins/sigma.plugins.neighborhoods/sigma.plugins.neighborhoods.js')}}"></script>
  
<script src="{{url('/sigma/plugins/sigma.layout.forceAtlas2/worker.js')}}"></script>

<script src="{{url('/sigma/plugins/sigma.layout.forceAtlas2/supervisor.js')}}"></script>

<script src="{{url('/sigma/plugins/sigma.plugins.animate/sigma.plugins.animate.js')}}"></script>
<script src="{{url('/sigma/plugins/sigma.parsers.json/sigma.parsers.json.js')}}"></script>

<div id="container">
  <style>
    body {
      color: #333;
      font-size: 14px;
      font-family: Lato, sans-serif;
    }

    #graph-container {
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      position: absolute;
    }

    #control-pane {
      top: 10px;
      /*bottom: 10px;*/
      right: 10px;
      position: absolute;
      width: 230px;
      background-color: rgb(249, 247, 237);
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }

    #control-pane>div {
      margin: 10px;
      overflow-x: auto;
    }

    .line {
      clear: both;
      display: block;
      width: 100%;
      margin: 0;
      padding: 12px 0 0 0;
      border-bottom: 1px solid #aac789;
      background: transparent;
    }

    h2,
    h3,
    h4 {
      padding: 0;
      font-variant: small-caps;
    }

    .green {
      color: #437356;
    }

    h2.underline {
      color: #437356;
      background: #f4f0e4;
      margin: 0;
      border-radius: 2px;
      padding: 8px 12px;
      font-weight: 700;
    }

    .hidden {
      display: none;
      visibility: hidden;
    }

    input[type=range] {
      width: 160px;
    }
  </style>
  <div class="buttons">
    
    <div id="graph-container"></div>
  </div>
  <div id="control-pane">
    <h2 class="underline">filters</h2>

    <div>
      <h3>min degree <span id="min-degree-val">0</span></h3>
      0 <input id="min-degree" type="range" min="0" max="0" value="0"> <span id="max-degree-value">0</span><br>
    </div>
    <!--<div>-->
    <!--  <h3>node category</h3>-->
    <!--  <select id="node-category">-->
    <!--    <option value="" selected>All categories</option>-->
    <!--  </select>-->
    <!--</div>-->
    <span class="line"></span>
    <div>
      <button id="reset-btn">Reset filters</button>
      <!--      <button id="export-btn">Export</button>-->
    </div>
    <!--    <div id="dump" class="hidden"></div>-->
  </div>
</div>
// <script>
//   /**
//   * This is an example on how to use sigma filters plugin on a real-world graph.
//   */
//   sigma.classes.graph.addMethod('neighbors', function (nodeId) {
//     var k,
//       neighbors = {},
//       index = this.allNeighborsIndex[nodeId] || {};

//     for (k in index)
//       neighbors[k] = this.nodesIndex[k];

//     return neighbors;
//   });
//   var filter;
//   /**
//   * DOM utility functions
//   */

//   function id(id) {

//     return document.getElementById(id);
//   }
//   function selectors(selectors) {
//     return document.querySelectorAll(selectors);
//   }


//   function updatePane(graph, filter) {
//     // get max degree
//     var maxDegree = 0,
//       categories = {};

//     // read nodes
//     graph.nodes().forEach(function (n) {
//       maxDegree = Math.max(maxDegree, graph.degree(n.id));
//       categories[n.category.name] = true;
//     })

//     // min degree
//     id('min-degree').max = maxDegree;
//     id('max-degree-value').textContent = maxDegree;

//     // node category
//     var nodecategoryElt = id('node-category');


//     Object.keys(categories).forEach(function (c) {
//       var optionElt = document.createElement("option");
//       optionElt.text = c;
//       nodecategoryElt.add(optionElt);
//     });
//     // reset button
//     id('reset-btn').addEventListener("click", function (e) {
//       id('min-degree').value = 0;
//       id('min-degree-val').textContent = '0';
//       id('node-category').selectedIndex = 0;
//       filter.undo().apply();

//     });

//   }
  
//   sigma.neo4j.cypher(
//             { url: 'http://neo4j:123456@localhost:7474', user: 'neo4j', password: '123456' },
//             'MATCH (n) MATCH (n) RETURN n LIMIT 25',
//             { container: 'graph-container' } ,
//             function(s) {
//                 console.log(s.graph.nodes())
                
//             }
//     );

//   sigma.parsers.json("{{url('/nodes')}}", {
//     container: 'graph-container',
//     settings: {
//       edgeColor: 'default',
//       defaultEdgeColor: '#ccc'
//     }
//   }, function (s) {

//     s.graph.nodes().forEach(function (n) {
//       n.originalColor = n.color;
//     });
//     s.graph.edges().forEach(function (e) {

//       e.originalColor = e.color;

//     });

//     var dragListener = sigma.plugins.dragNodes(s, s.renderers[0]);
//     dragListener.bind('startdrag', function (event) {
     
//     });
//     dragListener.bind('drag', function (event) {
     
//     });
//     dragListener.bind('drop', function (event) {
    
//     });
//     dragListener.bind('dragend', function (event) {
      
//     });


//     // Initialize the Filter API
//     filter = new sigma.plugins.filter(s);
//     updatePane(s.graph, filter);
//     function applyMinDegreeFilter(e) {

//       var v = e.target.value;

//       id('min-degree-val').textContent = v;
//       filter
//         .undo('min-degree')
//         .nodesBy(function (n) {
//           return this.degree(n.id) >= v;
//         }, 'min-degree')
//         .apply();
//     }
//     function applyCategoryFilter(e) {
//       var c = e.target[e.target.selectedIndex].value;
//       filter
//         .undo('node-category')
//         .nodesBy(function (n) {
//           return !c.length || n.category.name === c;
//         }, 'node-category')
//         .apply();
//     }
//     id('min-degree').addEventListener("input", applyMinDegreeFilter);  // for Chrome and FF
//     id('min-degree').addEventListener("change", applyMinDegreeFilter); // for IE10+, that sucks
//     id('node-category').addEventListener("change", applyCategoryFilter);
   
//   //this for animation
   
// //   var i,
// //     s,
// //     o,
// //     L = 10,
// //     N = 100,
// //     E = 500,
// //     g = {
// //       nodes: [],
// //       edges: []
// //     },
// //     step = 0;
// // // Generate a random graph:
// // for (i = 0; i < N; i++) {
// //   o = {
// //     id: 'n' + i,
// //     label: 'Node ' + i,
// //     circular_x: L * Math.cos(Math.PI * 2 * i / N - Math.PI / 2),
// //     circular_y: L * Math.sin(Math.PI * 2 * i / N - Math.PI / 2),
// //     circular_size: Math.random(),
// //     circular_color: '#' + (
// //       Math.floor(Math.random() * 16777215).toString(16) + '000000'
// //     ).substr(0, 6),
// //     grid_x: i % L,
// //     grid_y: Math.floor(i / L),
// //     grid_size: 1,
// //     grid_color: '#ccc'
// //   };
// //   ['x', 'y', 'size', 'color'].forEach(function(val) {
// //     o[val] = o['grid_' + val];
// //   });
// //   g.nodes.push(o);
// // }
// // for (i = 0; i < E; i++)
// //   g.edges.push({
// //     id: 'e' + i,
// //     source: 'n' + (Math.random() * N | 0),
// //     target: 'n' + (Math.random() * N | 0)
// //   });
// // // Instantiate sigma:
// // s = new sigma({
// //   graph: g,
// //   container: 'graph-container',
// //   settings: {
// //     animationsTime: 1000
// //   }
// // });
// // setInterval(function() {
// //   var prefix = ['grid_', 'circular_'][step = +!step];
// //   sigma.plugins.animate(
// //     s,
// //     {
// //       x: prefix + 'x',
// //       y: prefix + 'y',
// //       size: prefix + 'size',
// //       color: prefix + 'color'
// //     }
// //   );
// // }, 2000);
//   });
// </script>

<script>
  sigma.classes.graph.addMethod('neighbors', function (nodeId) {
    var k,
      neighbors = {},
      index = this.allNeighborsIndex[nodeId] || {};

    for (k in index)
      neighbors[k] = this.nodesIndex[k];

    return neighbors;
  });
  var filter;
  /**
   * DOM utility functions
   */

  function id(id) {

    return document.getElementById(id);
  }
  function selectors(selectors) {
    return document.querySelectorAll(selectors);
  }


  function updatePane(graph, filter) {
    // get max degree
    var maxDegree = 0,
      categories = {};

    // read nodes
    graph.nodes().forEach(function (n) {
      //  console.log(graph.nodes());
      maxDegree = Math.max(maxDegree, graph.degree(n.id));
//      categories[n.category.name] = true;
    })

    // min degree
    id('min-degree').max = maxDegree;
    id('max-degree-value').textContent = maxDegree;

    // node category
//    var nodecategoryElt = id('node-category');


//    Object.keys(categories).forEach(function (c) {
//      var optionElt = document.createElement("option");
//      optionElt.text = c;
//      nodecategoryElt.add(optionElt);
//    });
    // reset button
    id('reset-btn').addEventListener("click", function (e) {
      id('min-degree').value = 0;
      id('min-degree-val').textContent = '0';
      id('node-category').selectedIndex = 0;
      filter.undo().apply();

    });

  }
sigma.neo4j.cypher(
{ url: 'http://localhost:7474', user: 'neo4j', password: '123456' },
        'MATCH p=()-[r:PROVIDED]->() RETURN p',
  
{ container: 'graph-container' },
        function(s) {
            console.log(s.graph.nodes());
        s.graph.nodes().forEach(function (node){
//                console.log(node.neo4j_data);

        });
        // drag and drop function
         var dragListener = sigma.plugins.dragNodes(s, s.renderers[0]);
        dragListener.bind('startdrag', function (event) {

        });
        dragListener.bind('drag', function (event) {

        });
        dragListener.bind('drop', function (event) {

        });
        dragListener.bind('dragend', function (event) {

        });
        filter = new sigma.plugins.filter(s);
    updatePane(s.graph, filter);
    function applyMinDegreeFilter(e) {

      var v = e.target.value;

      id('min-degree-val').textContent = v;
      filter
        .undo('min-degree')
        .nodesBy(function (n) {
          return this.degree(n.id) >= v;
        }, 'min-degree')
        .apply();
    }
    function applyCategoryFilter(e) {
      var c = e.target[e.target.selectedIndex].value;
      filter
        .undo('node-category')
        .nodesBy(function (n) {
          return !c.length || n.category.name === c;
        }, 'node-category')
        .apply();
    }
    id('min-degree').addEventListener("input", applyMinDegreeFilter);  // for Chrome and FF
    id('min-degree').addEventListener("change", applyMinDegreeFilter); // for IE10+, that sucks
//    id('node-category').addEventListener("change", applyCategoryFilter);
        });

   
</script>