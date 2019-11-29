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


    public function index() {
//        $nodes = Nodes::with('category')->get();
//        $edges = Edges::get();
        $client = ClientBuilder::create()->setDefaultTimeout(30000)
                ->addConnection('default', 'http://neo4j:123456@localhost:7474') // Example for HTTP connection configuration (port is optional)
                ->addConnection('bolt', 'bolt://neo4j:123456@localhost:7687') // Example for BOLT connection configuration (port is optional)
                ->build();
//        $result = $client->run('MATCH (e:edges) Match (n:nodes) RETURN n,e');
       $result = $client->run('MATCH (n:nodes) RETURN n');
        $records = $result->getRecords();
     
        $record = $result->getRecord();
        dd($record->value('x'));
//        dd($record->value('n.source'),$record->value('n.target'));
//
//
//$result = $client->getRows();
//

        return response()->json(['nodes' => $records]);
//        $response = \Response::json([$nodes,$edges]);
    }

    public function sigmaNew() {
        $client = ClientBuilder::create()->setDefaultTimeout(30000)
                ->addConnection('default', 'http://neo4j:123456@localhost:7474') // Example for HTTP connection configuration (port is optional)
                ->addConnection('bolt', 'bolt://neo4j:123456@localhost:7687') // Example for BOLT connection configuration (port is optional)
                ->build();
//$client->run("WITH 'https://api.stackexchange.com/2.2/questions?pagesize=100&order=desc&sort=creation&tagged=neo4j&site=stackoverflow&filter=!5-i6Zw8Y)4W7vpy91PMYsKM-k9yzEsSC1_Uxlf' AS url
//CALL apoc.load.json(url) YIELD value
//UNWIND value.items AS q
//MERGE (question:Question {id:q.question_id}) ON CREATE
//  SET question.title = q.title, question.share_link = q.share_link, question.favorite_count = q.favorite_count
//
//FOREACH (tagName IN q.tags | MERGE (tag:Tag {name:tagName}) MERGE (question)-[:TAGGED]->(tag))
//FOREACH (a IN q.answers |
//   MERGE (question)<-[:ANSWERS]-(answer:Answer {id:a.answer_id})
//   MERGE (answerer:User {id:a.owner.user_id}) ON CREATE SET answerer.display_name = a.owner.display_name
//   MERGE (answer)<-[:PROVIDED]-(answerer)
//)
//WITH * WHERE NOT q.owner.user_id IS NULL
//MERGE (owner:User {id:q.owner.user_id}) ON CREATE SET owner.display_name = q.owner.display_name
//MERGE (owner)-[:ASKED]->(question)");
        
        $client->run('CREATE (TheMatrix:Movie {title:"The Matrix", released:1999, tagline:"Welcome to the Real World"})
CREATE (Keanu:Person {name:"Keanu Reeves", born:1964})
CREATE (Carrie:Person {name:"Carrie-Anne Moss", born:1967})
CREATE (Laurence:Person {name:"Laurence Fishburne", born:1961})
CREATE (Hugo:Person {name:"Hugo Weaving", born:1960})
CREATE (LillyW:Person {name:"Lilly Wachowski", born:1967})
CREATE (LanaW:Person {name:"Lana Wachowski", born:1965})
CREATE (JoelS:Person {name:"Joel Silver", born:1952})
CREATE
  (Keanu)-[:ACTED_IN {roles:["Neo"]}]->(TheMatrix),
  (Carrie)-[:ACTED_IN {roles:["Trinity"]}]->(TheMatrix),
  (Laurence)-[:ACTED_IN {roles:["Morpheus"]}]->(TheMatrix),
  (Hugo)-[:ACTED_IN {roles:["Agent Smith"]}]->(TheMatrix),
  (LillyW)-[:DIRECTED]->(TheMatrix),
  (LanaW)-[:DIRECTED]->(TheMatrix),
  (JoelS)-[:PRODUCED]->(TheMatrix)

CREATE (Emil:Person {name:"Emil Eifrem", born:1978})
CREATE (Emil)-[:ACTED_IN {roles:["Emil"]}]->(TheMatrix)

CREATE (TheMatrixReloaded:Movie {title:"The Matrix Reloaded", released:2003, tagline:"Free your mind"})
CREATE
  (Keanu)-[:ACTED_IN {roles:["Neo"]}]->(TheMatrixReloaded),
  (Carrie)-[:ACTED_IN {roles:["Trinity"]}]->(TheMatrixReloaded),
  (Laurence)-[:ACTED_IN {roles:["Morpheus"]}]->(TheMatrixReloaded),
  (Hugo)-[:ACTED_IN {roles:["Agent Smith"]}]->(TheMatrixReloaded),
  (LillyW)-[:DIRECTED]->(TheMatrixReloaded),
  (LanaW)-[:DIRECTED]->(TheMatrixReloaded),
  (JoelS)-[:PRODUCED]->(TheMatrixReloaded)

CREATE (TheMatrixRevolutions:Movie {title:"The Matrix Revolutions", released:2003, tagline:"Everything that has a beginning has an end"})
CREATE
  (Keanu)-[:ACTED_IN {roles:["Neo"]}]->(TheMatrixRevolutions),
  (Carrie)-[:ACTED_IN {roles:["Trinity"]}]->(TheMatrixRevolutions),
  (Laurence)-[:ACTED_IN {roles:["Morpheus"]}]->(TheMatrixRevolutions),
  (Hugo)-[:ACTED_IN {roles:["Agent Smith"]}]->(TheMatrixRevolutions),
  (LillyW)-[:DIRECTED]->(TheMatrixRevolutions),
  (LanaW)-[:DIRECTED]->(TheMatrixRevolutions),
  (JoelS)-[:PRODUCED]->(TheMatrixRevolutions)

CREATE (TheDevilsAdvocate:Movie {title:"The Devils Advocate", released:1997, tagline:"Evil has its winning ways"})
CREATE (Charlize:Person {name:"Charlize Theron", born:1975})
CREATE (Al:Person {name:"Al Pacino", born:1940})
CREATE (Taylor:Person {name:"Taylor Hackford", born:1944})
CREATE
  (Keanu)-[:ACTED_IN {roles:["Kevin Lomax"]}]->(TheDevilsAdvocate),
  (Charlize)-[:ACTED_IN {roles:["Mary Ann Lomax"]}]->(TheDevilsAdvocate),
  (Al)-[:ACTED_IN {roles:["John Milton"]}]->(TheDevilsAdvocate),
  (Taylor)-[:DIRECTED]->(TheDevilsAdvocate)

CREATE (AFewGoodMen:Movie {title:"A Few Good Men", released:1992, tagline:"In the heart of the nation  capital, in a courthouse of the U.S. government, one man will stop at nothing to keep his honor, and one will stop at nothing to find the truth."})
CREATE (TomC:Person {name:"Tom Cruise", born:1962})
CREATE (JackN:Person {name:"Jack Nicholson", born:1937})
CREATE (DemiM:Person {name:"Demi Moore", born:1962})
CREATE (KevinB:Person {name:"Kevin Bacon", born:1958})
CREATE (KieferS:Person {name:"Kiefer Sutherland", born:1966})
CREATE (NoahW:Person {name:"Noah Wyle", born:1971})
CREATE (CubaG:Person {name:"Cuba Gooding Jr.", born:1968})
CREATE (KevinP:Person {name:"Kevin Pollak", born:1957})
CREATE (JTW:Person {name:"J.T. Walsh", born:1943})
CREATE (JamesM:Person {name:"James Marshall", born:1967})
CREATE (ChristopherG:Person {name:"Christopher Guest", born:1948})
CREATE (RobR:Person {name:"Rob Reiner", born:1947})
CREATE (AaronS:Person {name:"Aaron Sorkin", born:1961})
CREATE
  (TomC)-[:ACTED_IN {roles:["Lt. Daniel Kaffee"]}]->(AFewGoodMen),
  (JackN)-[:ACTED_IN {roles:["Col. Nathan R. Jessup"]}]->(AFewGoodMen),
  (DemiM)-[:ACTED_IN {roles:["Lt. Cdr. JoAnne Galloway"]}]->(AFewGoodMen),
  (KevinB)-[:ACTED_IN {roles:["Capt. Jack Ross"]}]->(AFewGoodMen),
  (KieferS)-[:ACTED_IN {roles:["Lt. Jonathan Kendrick"]}]->(AFewGoodMen),
  (NoahW)-[:ACTED_IN {roles:["Cpl. Jeffrey Barnes"]}]->(AFewGoodMen),
  (CubaG)-[:ACTED_IN {roles:["Cpl. Carl Hammaker"]}]->(AFewGoodMen),
  (KevinP)-[:ACTED_IN {roles:["Lt. Sam Weinberg"]}]->(AFewGoodMen),
  (JTW)-[:ACTED_IN {roles:["Lt. Col. Matthew Andrew Markinson"]}]->(AFewGoodMen),
  (JamesM)-[:ACTED_IN {roles:["Pfc. Louden Downey"]}]->(AFewGoodMen),
  (ChristopherG)-[:ACTED_IN {roles:["Dr. Stone"]}]->(AFewGoodMen),
  (AaronS)-[:ACTED_IN {roles:["Man in Bar"]}]->(AFewGoodMen),
  (RobR)-[:DIRECTED]->(AFewGoodMen),
  (AaronS)-[:WROTE]->(AFewGoodMen)

CREATE (TopGun:Movie {title:"Top Gun", released:1986, tagline:"I feel the need, the need for speed."})
CREATE (KellyM:Person {name:"Kelly McGillis", born:1957})
CREATE (ValK:Person {name:"Val Kilmer", born:1959})
CREATE (AnthonyE:Person {name:"Anthony Edwards", born:1962})
CREATE (TomS:Person {name:"Tom Skerritt", born:1933})
CREATE (MegR:Person {name:"Meg Ryan", born:1961})
CREATE (TonyS:Person {name:"Tony Scott", born:1944})
CREATE (JimC:Person {name:"Jim Cash", born:1941})
CREATE
  (TomC)-[:ACTED_IN {roles:["Maverick"]}]->(TopGun),
  (KellyM)-[:ACTED_IN {roles:["Charlie"]}]->(TopGun),
  (ValK)-[:ACTED_IN {roles:["Iceman"]}]->(TopGun),
  (AnthonyE)-[:ACTED_IN {roles:["Goose"]}]->(TopGun),
  (TomS)-[:ACTED_IN {roles:["Viper"]}]->(TopGun),
  (MegR)-[:ACTED_IN {roles:["Carole"]}]->(TopGun),
  (TonyS)-[:DIRECTED]->(TopGun),
  (JimC)-[:WROTE]->(TopGun)

CREATE (JerryMaguire:Movie {title:"Jerry Maguire", released:2000, tagline:"The rest of his life begins now."})
CREATE (ReneeZ:Person {name:"Renee Zellweger", born:1969})
CREATE (KellyP:Person {name:"Kelly Preston", born:1962})
CREATE (JerryO:Person {name:"Jerry O Connell", born:1974})
CREATE (JayM:Person {name:"Jay Mohr", born:1970})
CREATE (BonnieH:Person {name:"Bonnie Hunt", born:1961})
CREATE (ReginaK:Person {name:"Regina King", born:1971})
CREATE (JonathanL:Person {name:"Jonathan Lipnicki", born:1996})
CREATE (CameronC:Person {name:"Cameron Crowe", born:1957})

MATCH (a)-[:ACTED_IN]->(m)<-[:DIRECTED]-(d) RETURN a,m,d LIMIT 10
');
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
        $records = $result->getRecords();
        $record = $result->getRecord();

        dd($records);
    }

}
