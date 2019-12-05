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
<script src="{{url('/sigma/plugins/sigma.neo4j.cypher/sigma.neo4j.cypher.js')}}"></script>

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
 #control-panel {
            top: 10px;
            /*bottom: 10px;*/
/*            right: 10px;*/
            position: absolute;
            width: 230px;
            padding: 22px;
/*            background-color: rgb(249, 247, 237);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);*/
        }

        #control-panel>div {
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
        .person{
                background-color: rgb(141, 204, 147);
    color: rgb(96, 74, 14);
    display: inline-block;
    font-weight: bold;
    line-height: 1em;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    user-select: none;
    font-size: 12px;
    margin-right: 5px;
    cursor: pointer;
    padding: 4px 7px 4px 9px;
    border-radius: 20px;
    border: 1px;
        }
        .movie{
                background-color: rgb(255, 196, 84);
    color: rgb(96, 74, 14);
    display: inline-block;
    font-weight: bold;
    line-height: 1em;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    user-select: none;
    font-size: 12px;
    margin-right: 5px;
    cursor: pointer;
    padding: 4px 7px 4px 9px;
    border-radius: 20px;
    border: 1px;
        margin-top: 11px;

        }
    </style>
    <div class="buttons">

        <div id="graph-container"></div>
    </div>
    <div id="control-panel">
         <button class="person">Person</button><br>
          <button class="movie">movie</button>
          
          <button class="button1">Button1</button><br>
           <button class="button2">Button2</button><br>
            <button class="button3">Button3</button><br>
             <button class="button4">Button4</button><br>
          
          
     </div>
      <div id="control-pane">
        <h2 class="underline">filters</h2>
         

        <div>
          <h3>min degree <span id="min-degree-val">0</span></h3>
          0 <input id="min-degree" type="range" min="0" max="0" value="0"> <span id="max-degree-value">0</span><br>
        </div>
<!--        <div>
          <h3>node category</h3>
          <select id="node-category">
            <option value="" selected>All categories</option>
          </select>
        </div>-->
        <span class="line"></span>
        <div>
          <button id="reset-btn">Reset filters</button>
          <button id="export-btn btn-success">Export</button>
        </div>
            <div id="dump" class="hidden"></div>
      </div>
</div>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


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

    // reset button
    id('reset-btn').addEventListener("click", function (e) {
      id('min-degree').value = 0;
      id('min-degree-val').textContent = '0';
      id('node-category').selectedIndex = 0;
      filter.undo().apply();

    });

  }
  
    function loaddata(val){
        sigma.neo4j.cypher(
    { url: 'http://localhost:7474', user: 'neo4j', password: '123456' },


val,
{ container: 'graph-container' },
        function(s) {
      //  console.log(s.graph.nodes());
//      console.log(s.graph.nodes());
        var moviecount = [];
        var personcount = [];
        s.graph.nodes().forEach(function (node){
          //      console.log(node.neo4j_data);
          if(node.neo4j_labels[0] === 'Movie'){
              moviecount.push(node);
          }
          else if(node.neo4j_labels[0] === 'Person'){
              personcount.push(node);
          }
        });
        
        $(".person").text("person ("+personcount.length+")");
         $(".Movie").text("movie ("+moviecount.length+")");
        
     
        
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

}  

   
  
  $(document).ready(function(){
      
  
    var def = 'MATCH p=()-->() RETURN p'; 
    var one = 'MATCH p=()-->() RETURN p'; 
    var two = 'MATCH p=()-->() RETURN p'; 
    var three = 'MATCH p=()-->() RETURN p'; 
    var four = 'MATCH p=()-->() RETURN p'; 

      loaddata(def);


    $(".button1").click(function(){
        $("#graph-container").empty();
        loaddata(one);
    });
    $(".button2").click(function(){
        $("#graph-container").empty();
        loaddata(two);
    });
    $(".button3").click(function(){
        $("#graph-container").empty();
        loaddata(three);
    });
    $(".button4").click(function(){
        $("#graph-container").empty();
        loaddata(four);
    });
  });
  
  
  
</script>