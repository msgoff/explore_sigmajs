open Core_kernel
open Incr_dom
open Js_of_ocaml

module Model = struct
  type t = unit [@@deriving sexp]

  let init () = ()
  let cutoff _ _ = true
end

module Action = struct
  type t = unit [@@deriving sexp]

  let should_log _ = true
end

module State = struct
  type t = unit
end

let apply_action _ _ _ ~schedule_action:_ = ()
let on_startup ~schedule_action:_ _ = Async_kernel.return ()




let view_input =
  
  let widget_id =
    Type_equal.Id.create ~name:"my widget type" (fun _ -> Sexp.Atom "<my widget type>")
  in
  Vdom.Node.widget
    ~id:widget_id
    ~init:(fun () ->
      let input = Dom_html.document##createElement ("input" |> Js.string) in
     input##.id := Js.string "node-input";
     input##.className := Js.string "node-input";
      let pushnode = Js.Unsafe.get Dom_html.window ("pushnode" |> Js.string) in
          Js.Unsafe.fun_call pushnode [| Js.Unsafe.inject input |] |> ignore;
      
      (), input)
    ()
;;

let node_submit_button =
  
  let widget_id =
    Type_equal.Id.create ~name:"my widget type" (fun _ -> Sexp.Atom "<my widget type>")
  in
  Vdom.Node.widget
    ~id:widget_id
    ~init:(fun () ->
      let button = Dom_html.document##createElement ("button" |> Js.string) in
     button##.id := Js.string "node-submit-button";
     button##.innerHTML
      := "<b> submit nodes </b>"
         |> Js.string;
         let pushnode = Js.Unsafe.get Dom_html.window ("pushnode" |> Js.string) in
          Js.Unsafe.fun_call pushnode [| Js.Unsafe.inject button |] |> ignore;
      (), button)
    ()
;;



let graph_container =
  
  let widget_id =
    Type_equal.Id.create ~name:"my widget type" (fun _ -> Sexp.Atom "<my widget type>")
  in
  Vdom.Node.widget
    ~id:widget_id
    ~init:(fun () ->
      let div = Dom_html.document##createElement ("div" |> Js.string) in
     div##.id := Js.string "graph-container";
     
         let pushnode = Js.Unsafe.get Dom_html.window ("pushnode" |> Js.string) in
          Js.Unsafe.fun_call pushnode [| Js.Unsafe.inject div |] |> ignore;
      (), div)
    ()
;;

let clear_button =
  
  let widget_id =
    Type_equal.Id.create ~name:"my widget type" (fun _ -> Sexp.Atom "<my widget type>")
  in
  Vdom.Node.widget
    ~id:widget_id
    ~init:(fun () ->
      let button = Dom_html.document##createElement ("button" |> Js.string) in
     button##.id := Js.string "clear-button";
     button##.innerHTML
      := "<b> Clear </b>"
         |> Js.string;
         let pushnode = Js.Unsafe.get Dom_html.window ("pushnode" |> Js.string) in
          Js.Unsafe.fun_call pushnode [| Js.Unsafe.inject button |] |> ignore;
      (), button)
    ()
;;

let mathml_container =
  
  let widget_id =
    Type_equal.Id.create ~name:"my widget type" (fun _ -> Sexp.Atom "<my widget type>")
  in
  Vdom.Node.widget
    ~id:widget_id
    ~init:(fun () ->
      let div = Dom_html.document##createElement ("div" |> Js.string) in
     div##.id := Js.string "mathml-container";
     
         let pushnode = Js.Unsafe.get Dom_html.window ("pushnode" |> Js.string) in
          Js.Unsafe.fun_call pushnode [| Js.Unsafe.inject div |] |> ignore;
      (), div)
    ()
;;


let view _ ~inject:_ =
  Incr.return (Vdom.Node.div [] [view_input; node_submit_button;graph_container; clear_button; mathml_container])
;;

let create model ~old_model:_ ~inject =
  let open Incr.Let_syntax in
  let%map apply_action =
    let%map model = model in
    apply_action model
  and view = view model ~inject
  and model = model in
  Component.create ~apply_action model view
;;
