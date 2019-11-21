<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Nodes;
use \App\Edges;
use Illuminate\Http\Response;

class SigmaController extends Controller {

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
        $nodes = Nodes::with('category')->get();
        $edges = Edges::get();
        return response(['nodes'=>$nodes,'edges'=>$edges]);
//        $response = \Response::json([$nodes,$edges]);


       
      
    }

}
