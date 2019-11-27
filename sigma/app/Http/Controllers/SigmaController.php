<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Nodes;
use \App\Edges;
use Illuminate\Http\Response;
use GraphAware\Neo4j\Client\ClientBuilder;

class SigmaController extends Controller {
public function __construct() {
        set_time_limit(8000000);
    }
//    public function index() {
////        $nodes = Nodes::with('category')->get();
////        $edges = Edges::get();
////        return response(['nodes'=>$nodes,'edges'=>$edges]);
//////        $response = \Response::json([$nodes,$edges]);
//
//        $app = new \Illuminate\Container\Container;
//        $document = new \Orchestra\Parser\Xml\Document($app);
//        $reader = new \Orchestra\Parser\Xml\Reader($document);
//        $xml = $reader->load(public_path() . '/sigma/data/edges.xml');
//        
//        $nodes = $xml->parse([
//'nodes' => ['uses' => 'node[::id,::label,attvalues.attvalue::for,viz:position::x,viz:position::y,viz:position::z,viz:color::b,viz:color::g,viz:color::r,viz:size::value]'],
//			]);
//       
//        
//        foreach ($nodes['nodes'] as $node) {
//           
//                $add = new Edges;
//                $add->source = $node['::source'];
//                $add->target = $node['::target'];
//                $add->save();
//            
//        }
//    }
    
//     public function index() {
//
//
//        $app = new \Illuminate\Container\Container;
//        $document = new \Orchestra\Parser\Xml\Document($app);
//        $reader = new \Orchestra\Parser\Xml\Reader($document);
//        $xml = $reader->load(public_path() . '/sigma/data/edges.xml');
//        
//        $edges = $xml->parse([
//			'edges' => ['uses' => 'edge[::source,::target,::cardinal]'],
//	]);
//       
//        
//        foreach ($edges['edges'] as $node) {
//           
//                $add = new Edges;
//                $add->source = $node['::source'];
//                $add->target = $node['::target'];
//                $add->save();
//            
//        }
//    }
    
    
//      public function index() {
//         $nodes = Nodes::with('category')->get();
//         $edges = Edges::get();
//         return response(['nodes'=>$nodes,'edges'=>$edges]);
// //        $response = \Response::json([$nodes,$edges]);


       
      
//     }

   public function index() {
//        $nodes = Nodes::with('category')->get();
//        $edges = Edges::get();
        $client = ClientBuilder::create()->setDefaultTimeout(30000)
                ->addConnection('default', 'http://neo4j:123456@localhost:7474') // Example for HTTP connection configuration (port is optional)
                ->addConnection('bolt', 'bolt://neo4j:123456@localhost:7687') // Example for BOLT connection configuration (port is optional)
                ->build();
        $result = $client->run('MATCH (n:edges) RETURN n.source,n.target LIMIT 25');
       
        $records = $result->getRecords();
//        dd($records);
//        $record = $result->getRecord();
//        dd($record->value('n.source'),$record->value('n.target'));
//
//
//$result = $client->getRows();
//

        return response()->json(['nodes' => $records]);
//        $response = \Response::json([$nodes,$edges]);
    }
    
//      public function sigmaNew() {
//         $client = ClientBuilder::create()->setDefaultTimeout(30000)
//                 ->addConnection('default', 'http://neo4j:123456@localhost:7474') // Example for HTTP connection configuration (port is optional)
//                 ->addConnection('bolt', 'bolt://neo4j:123456@localhost:7687') // Example for BOLT connection configuration (port is optional)
//                 ->build();


//         $app = new \Illuminate\Container\Container;
//         $document = new \Orchestra\Parser\Xml\Document($app);
//         $reader = new \Orchestra\Parser\Xml\Reader($document);
// //        $xml = $reader->load(public_path().'/sigma/data/node.xml');
// //			$nodes = $xml->parse([
// //			'nodes' => ['uses' => 'node[::id,::label,attvalues.attvalue::for,viz:position::x,viz:position::y,viz:position::z,viz:color::b,viz:color::g,viz:color::r,viz:size::value]'],
// //			]);
// ////		dd($nodes);
// //			       foreach ($nodes['nodes'] as $node) {
// //               $client->run('CREATE (n:nodes) SET n += {nodes}', 
// //                ['nodes' => ['id' => $node['::id'], 
// //                   'label' => $node['::label'],
// //                   'x' => $node['viz:position::x'],
// //                   'y' => $node['viz:position::y'],
// //                   'z' => 0,
// //                  'color' => 'rgb('.$node['viz:color::b'].','.$node['viz:color::g'].','.$node['viz:color::r'].')',
// //                   'size' => $node['viz:size::value']]]);
// //                  }
//         // return view('sigma');

//         $xml = $reader->load(public_path() . '/sigma/data/edges.xml');

//         $edges = $xml->parse([
//             'edges' => ['uses' => 'edge[::source,::target]'],
//         ]);
       
// //        foreach ($edges['edges'] as $node) {
// //            $client->run('CREATE (e:edges) SET e += {edges}', ['source' => ['id' => $node['::source'],
// //                    'target' => $node['::target']]]);
// //        }
//  foreach ($edges['edges'] as $node) {
    
//               $client->run('CREATE (e:edges) SET e += {edges}', 
//                 ['edges' => ['id' => 1, 
//                   'source' => $node['::source'],
//                   'target' => $node['::target']]]);

//                   }

//         $result = $client->run('MATCH (e:edges) RETURN e');
//         $records = $result->getRecords();
//         $record = $result->getRecord();

//         dd($records);
//     }

 public function sigmaNew() {
        $client = ClientBuilder::create()->setDefaultTimeout(30000)
                ->addConnection('default', 'http://neo4j:123456@localhost:7474') // Example for HTTP connection configuration (port is optional)
                ->addConnection('bolt', 'bolt://neo4j:123456@localhost:7687') // Example for BOLT connection configuration (port is optional)
                ->build();
$client->run("WITH 'https://api.stackexchange.com/2.2/questions?pagesize=100&order=desc&sort=creation&tagged=neo4j&site=stackoverflow&filter=!5-i6Zw8Y)4W7vpy91PMYsKM-k9yzEsSC1_Uxlf' AS url
CALL apoc.load.json(url) YIELD value
UNWIND value.items AS q
MERGE (question:Question {id:q.question_id}) ON CREATE
  SET question.title = q.title, question.share_link = q.share_link, question.favorite_count = q.favorite_count

FOREACH (tagName IN q.tags | MERGE (tag:Tag {name:tagName}) MERGE (question)-[:TAGGED]->(tag))
FOREACH (a IN q.answers |
   MERGE (question)<-[:ANSWERS]-(answer:Answer {id:a.answer_id})
   MERGE (answerer:User {id:a.owner.user_id}) ON CREATE SET answerer.display_name = a.owner.display_name
   MERGE (answer)<-[:PROVIDED]-(answerer)
)
WITH * WHERE NOT q.owner.user_id IS NULL
MERGE (owner:User {id:q.owner.user_id}) ON CREATE SET owner.display_name = q.owner.display_name
MERGE (owner)-[:ASKED]->(question)");
return response("success");

//        $app = new \Illuminate\Container\Container;
//        $document = new \Orchestra\Parser\Xml\Document($app);
//        $reader = new \Orchestra\Parser\Xml\Reader($document);
//        $xml = $reader->load(public_path().'/sigma/data/node.xml');
//			$nodes = $xml->parse([
//			'nodes' => ['uses' => 'node[::id,::label,attvalues.attvalue::for,viz:position::x,viz:position::y,viz:position::z,viz:color::b,viz:color::g,viz:color::r,viz:size::value]'],
//			]);
////		dd($nodes);
//			       foreach ($nodes['nodes'] as $node) {
//              $data = ('CREATE (n:nodes{name: "Shikar Dhawan", YOB: 1985, POB: "Delhi"})'); 
//              
//              $client->run("WITH 'https://api.stackexchange.com/2.2/questions?pagesize=100&order=desc&sort=creation&tagged=neo4j&site=stackoverflow&filter=!5-i6Zw8Y)4W7vpy91PMYsKM-k9yzEsSC1_Uxlf' AS url
//CALL apoc.load.json(url) YIELD value
//UNWIND value.items AS item
//RETURN item.title, item.owner, item.creation_date, keys(item)"); 
//
//             //  $client->run('CREATE (nodes [{id:'.$node['::id'].',label:'.$node['::label'].'}]) RETURN n');                    
//                                   
//                      
////               $client->run('CREATE (n:nodes) SET n ', 
////                ['nodes' => ['id' => $node['::id'], 
////                   'label' => $node['::label'],
////                   'x' => $node['viz:position::x'],
////                   'y' => $node['viz:position::y'],
////                   'z' => 0,
////                  'color' => 'rgb('.$node['viz:color::b'].','.$node['viz:color::g'].','.$node['viz:color::r'].')',
////                   'size' => $node['viz:size::value']]]);
//                  }

                
        // return view('sigma');

//        $xml = $reader->load(public_path() . '/sigma/data/edges.xml');
//
//        $edges = $xml->parse([
//            'edges' => ['uses' => 'edge[::source,::target]'],
//        ]);
       
//        foreach ($edges['edges'] as $node) {
//            $client->run('CREATE (e:edges) SET e += {edges}', ['source' => ['id' => $node['::source'],
//                    'target' => $node['::target']]]);
//        }
// foreach ($edges['edges'] as $node) {
//    
//               $client->run('CREATE (e:edges) SET e += {edges}', 
//                ['edges' => ['id' => 1, 
//                   'source' => $node['::source'],
//                   'target' => $node['::target']]]);
//
//                  }

//        $result = $client->run('MATCH (e:edges) RETURN e');
       
    }

}
