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
<div id="container">
  <style>
    #graph-container {
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      position: absolute;
    }
  </style>
  <div id="graph-container"></div>
</div>
<script>
/**
 * This example shows how to use the sigma.plugins.animate plugin. It
 * creates a random graph with two different views:
 *
 * The circular view displays the nodes on a circle, with each node
 * having a random color and a random size.
 *
 * The grid view displays every nodes with the same size, and on a grid.
 *
 * Every two seconds, the graph will be animated from a view to the other
 * one, in a one second animation.
 */
sigma.parsers.json("{{url('/nodes')}}", {
    container: 'graph-container',
    settings: {
      edgeColor: 'default',
      defaultEdgeColor: '#ccc'
    }
  }, function (s) {
var i,
    s,
    o,
    L = 10,
    N = s.graph.nodes(),
    E = s.graph.edges(),
    g = {
      nodes: s.graph.nodes(),
      edges: s.graph.edges()
    },
    step = 0;
s.graph.nodes().forEach(function (n) {
      n.originalColor = n.color;
    });

 s.graph.edges().forEach(function (e) {

      e.originalColor = e.color;

    });
// Instantiate sigma:
s = new sigma({
  graph: g,
  container: 'graph-container',
  settings: {
    animationsTime: 1000
  }
});
setInterval(function() {
  sigma.plugins.animate(
    s,
    {
      x: 'to_x',
      y: 'to_y',
      size: 'to_size',
//      color: 'to_color'
    },
    {
      nodes: s.graph.nodes(),
      easing: 'cubicInOut',
      duration: 300,
      onComplete: function() {
        // do stuff here after animation is complete
      }
    }
  );
}, 2000);
 });
</script>

