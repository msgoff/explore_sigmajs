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


public function index() {
        
        return view('welcome');
    }


    public function sigmaNew() {


        $app = new \Illuminate\Container\Container;
        $document = new \Orchestra\Parser\Xml\Document($app);
        $reader = new \Orchestra\Parser\Xml\Reader($document);
        $xml = $reader->load(public_path() . '/sigma/data/node.xml');
       
       // data parse function
        $nodes = $xml->parse([
            'nodes' => ['uses' => 'page[title,id,ns,revision.text,redirect]'],
        ]);
       
        foreach (array_chunk($nodes['nodes'], 50) as $nodes) {
            foreach ($nodes as $node) {
                // for solving syntax errors
                $new= preg_replace('/[0-9]/', '', $node['title']);
        		$new1 = preg_replace('/:/', '', $new);
        		$new2 = preg_replace('/!/', '', $new1);
        		$new3 = preg_replace('/"/', '', $new2);
                $new4 = preg_replace('#[/]*#', '', $new3);
                $new5 = preg_replace('/–/', '', $new4);
                $new6 = preg_replace('#[.]*#', '', $new5);
                $new7 = preg_replace('#[&]*#', '', $new6);
                $new8 = preg_replace('#[(]*#', '', $new7);
		        $new9 = preg_replace('#[)]*#', '', $new8);
                $new10 = preg_replace("/'/", '', $new9);
                $new11 = preg_replace('#[,]*#', '', $new10);
                $new12 = preg_replace('/-/', '', $new11);
                $new13 = preg_replace('#[?]*#', '', $new12);
                $new14 = preg_replace('#[+]*#', '', $new13);
                $new15 = preg_replace('#[%]*#', '', $new14);
                $title = str_replace(' ', '', $new15);
                
                $client = ClientBuilder::create()->setDefaultTimeout(300000000)
                    ->addConnection('default', 'http://neo4j:123456@localhost:7474') // Example for HTTP connection configuration (port is optional)
                    ->addConnection('bolt', 'bolt://neo4j:123456@localhost:7687') // Example for BOLT connection configuration (port is optional)
                    ->build();
               // saving nodes in database
            $result = $client->run('CREATE (' . $title . ':nodes{title: "' . $title . '"}) ');
              
             foreach ($node['revision'] as $re){

                $my_url = "#REDIRECT";
		if (!preg_match("/#REDIRECT/", $re))
		{
             preg_match_all('#\[(.*?)\]#', $re, $match);
             foreach($match as $ma){
               
             foreach($ma as $key=>$m){
// for solving syntax error in link nodes
                 
             $new= preg_replace('/[0-9]/', '', $m);
        		$new1 = preg_replace('/:/', '', $new);
        		$new2 = preg_replace('/!/', '', $new1);
        		$new3 = preg_replace('/"/', '', $new2);
                $new4 = preg_replace('#[/]*#', '', $new3);
                $new5 = preg_replace('/–/', '', $new4);
                $new6 = preg_replace('#[.]*#', '', $new5);
                $new7 = preg_replace('#[&]*#', '', $new6);
                $new8 = preg_replace('#[(]*#', '', $new7);
		        $new9 = preg_replace('#[)]*#', '', $new8);
                $new10 = preg_replace("/'/", '', $new9);
                $new11 = preg_replace('#[,]*#', '', $new10);
                $new12 = preg_replace('/-/', '', $new11);
                $new13 = preg_replace('#[?]*#', '', $new12);
                $new14 = preg_replace('#[+]*#', '', $new13);
                $new15 = preg_replace('#[%]*#', '', $new14);
        		$new16 = preg_replace('#[]]*#', '', $new15);
        		$new17 = preg_replace('#[[]*#', '', $new16);
                $new18 = preg_replace('#[|]*#', '', $new17);
                $new19 = preg_replace("/#/", '', $new18);
                $new20 = preg_replace('#[_]*#', '', $new19);
                $new21 = preg_replace('#[=]*#', '', $new20);
        		$new22 = preg_replace('#[<]*#', '', $new21);
        		$new23 = preg_replace('#[>]*#', '', $new22);
                $new24 = preg_replace('#[{]*#', '', $new23);
		        $new25 = preg_replace('#[}]*#', '', $new24);
                $new26 = preg_replace('#[*]*#', '', $new25);
                $new27 = preg_replace('#[@]*#', '', $new26);
                $new28 = preg_replace('#[;]*#', '', $new27);
                $new29 = preg_replace('#[♫]*#', '', $new28);
                $str = str_replace(' ', '', $new29);
       // creating nodes relations
               $result = $client->run('CREATE (' . $str . ':edges{name: "' . $str. '"}) ');

                $result = $client->run('MATCH (n:nodes), (e:edges) 
		   WHERE n.title = "'.$title.'" AND e.name = "'.$str.'" 
		CREATE (n)-[: Relation]->(e) 
		RETURN n,e ');
               
             }
}
                          
             }

             }
        }
        }
        return response("success");
    }

}
