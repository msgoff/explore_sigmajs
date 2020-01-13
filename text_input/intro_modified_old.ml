(* ========================================================================= *)
(* Simple algebraic expression example from the introductory chapter.        *)
(*                                                                           *)
(* Copyright (c) 2003-2007, John Harrison. (See "LICENSE.txt" for details.)  *)
(* ========================================================================= *)

open Format

type expression =
   Var of string
 | Const of int
 | Add of expression * expression
 | Sub of expression * expression
 | Div of expression * expression
 | Mul of expression * expression;;

(* ------------------------------------------------------------------------- *)
(* Trivial example of using the type constructors.                           *)
(* ------------------------------------------------------------------------- *)

 
 let rec string_of_exp e =
  match e with
    Var s -> s
  | Const n -> string_of_int n
  | Add(e1,e2) -> "("^(string_of_exp e1)^" + "^(string_of_exp e2)^")"
  | Mul(e1,e2) -> "("^(string_of_exp e1)^" * "^(string_of_exp e2)^")"
  | Sub(e1,e2) -> "("^(string_of_exp e1)^" - "^(string_of_exp e2)^")"
  | Div(e1,e2) -> "("^(string_of_exp e1)^" / "^(string_of_exp e2)^")";;


(* ------------------------------------------------------------------------- *)
(* Simplification example.                                                   *)
(* ------------------------------------------------------------------------- *)

let simplify1 expr =
  match expr with
    Add(Const(m),Const(n)) -> Const(m + n)
  | Mul(Const(m),Const(n)) -> Const(m * n)
  | Div(Const(m),Const(n)) -> Const(m / n)
  | Sub(Const(m),Const(n)) -> Const(m - n)
  | Sub(x,Const(0)) -> x
  | Add(Const(0),x) -> x
  | Add(x,Const(0)) -> x
  | Mul(Const(0),x) -> Const(0)
  | Mul(x,Const(0)) -> Const(0)
  | Mul(Const(1),x) -> x
  | Mul(x,Const(1)) -> x
  | Div(x,Const(1)) -> x
  | Div(Const(0),x) -> Const(0)
  | Div(x,Const(0)) -> failwith "Division by 0 exception"
  | _ -> expr;;


let rec simplify expr =
  match expr with
    Add(e1,e2) -> simplify1(Add(simplify e1,simplify e2))
  | Mul(e1,e2) -> simplify1(Mul(simplify e1,simplify e2))
  | Sub(e1,e2) -> simplify1(Sub(simplify e1,simplify e2))
  | Div(e1,e2) -> simplify1(Div(simplify e1,simplify e2))
  | _ -> simplify1 expr;;


  let simplify2 expr =
  match expr with
    Add(Const(m),Const(n)) -> Const(m + n)
  | Mul(Const(m),Const(n)) -> Const(m * n)
  | Div(Const(m),Const(n)) -> Const(m / n)
  | Sub(Const(m),Const(n)) -> Const(m - n)
  | Sub(x,Const(0)) -> x
  | Add(Const(0),x) -> x
  | Add(x,Const(0)) -> x
  | Mul(Const(0),x) -> Const(0)
  | Mul(x,Const(0)) -> Const(0)
  | Mul(Const(1),x) -> x
  | Mul(x,Const(1)) -> x
  | Div(x,Const(1)) -> x
  | Div(Const(0),x) -> Const(0)
  | Div(x,Const(0)) -> failwith "Division by 0 exception"
  | _ -> expr;;


let rec simplify_new expr =
  match expr with
   Add(Const(m),Const(n)) -> Const(m + n)
  | Sub(Const(m),Const(n)) -> Const(m - n)
  | Mul(Const(m),Const(n)) -> Const(m * n)
  | Div(Const(m),Const(n)) -> Const(m / n)
  | Add(e1,e2) -> Add(simplify_new e1,simplify_new e2)
  | Sub(e1,e2) -> Sub(simplify_new e1,simplify_new e2)
  | Mul(e1,e2) -> Mul(simplify_new e1,simplify_new e2)
  | Div(e1,e2) -> Div(simplify_new e1,simplify_new e2)
  | Const(m) -> Const(m)
  | Var(x) -> Var(x)
    ;;

let rec simplification lst expr =  
    let sim = simplify_new expr in
    if sim = expr  then List.rev lst
    else simplification (string_of_exp (sim)::lst) sim;;


(* ------------------------------------------------------------------------- *)
(* Example.                                                                  *)
(* ------------------------------------------------------------------------- *)
 

(* ------------------------------------------------------------------------- *)
(* Lexical analysis.                                                         *)
(* ------------------------------------------------------------------------- *)

let explode s =
  let rec exap n l =
     if n < 0 then l else
      exap (n - 1) ((String.sub s n 1)::l) in
  exap (String.length s - 1) [];;


let matches s = let chars = explode s in fun c -> List.mem c chars;;

 

let space = matches " \t\n\r"
and punctuation = matches "()[]{},"
and symbolic = matches "~`!@#$%^&*-+=|\\:;<>.?/"
and numeric = matches "0123456789"
and alphanumeric = matches
  "abcdefghijklmnopqrstuvwxyz_'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";;

let rec lexwhile prop inp =
  match inp with
    c::cs when prop c -> let tok,rest = lexwhile prop cs in c^tok,rest
  | _ -> "",inp;;

let rec lex inp =
  match snd(lexwhile space inp) with
    [] -> []
  | c::cs -> let prop = if alphanumeric(c) then alphanumeric
                        else if symbolic(c) then symbolic
                        else fun c -> false in
             let toktl,rest = lexwhile prop cs in
             (c^toktl)::lex rest;;

 

(* ------------------------------------------------------------------------- *)
(* Parsing.                                                                  *)
(* ------------------------------------------------------------------------- *)

(* Original

let rec forall p l =
  match l with
    [] -> true
  | h::t -> p(h) & forall p t;;

let rec parse_expression i =
  match parse_product i with
    e1,"+"::i1 -> let e2,i2 = parse_expression i1 in Add(e1,e2),i2
  | e1,"-"::i1 -> let e2,i2 = parse_expression i1 in Sub(e1,e2),i2
  | e1,i1 -> e1,i1

and parse_product i =
  match parse_atom i with
    e1,"*"::i1 -> let e2,i2 = parse_product i1 in Mul(e1,e2),i2
  | e1,i1 -> e1,i1

and parse_atom i =  
  match i with
    [] -> failwith "Expected an expression at end of input"
  | "("::i1 -> (match parse_expression i1 with
                  e2,")"::i2 -> e2,i2
                | _ -> failwith "Expected closing bracket")
  | tok::i1 -> if forall numeric (explode tok)
               then Const(int_of_string tok),i1
               else Var(tok),i1;;

*) 

(* Customized *)

let rec forall p l =
  match l with
    [] -> true
  | h::t -> p(h) && forall p t;;

let rec parse_expression i =
  match parse_product i with
    e1,"+"::i1 -> let e2,i2 = parse_expression i1 in Add(e1,e2),i2
  | e1,"-"::i1 -> let e2,i2 = parse_expression i1 in Sub(e1,e2),i2
  | e1,i1 -> e1,i1

and parse_product i =
  match parse_atom i with
    e1,"*"::i1 -> let e2,i2 = parse_product i1 in Mul(e1,e2),i2
  | e1,"/"::i1 -> let e2,i2 = parse_product i1 in Div(e1,e2),i2  
  | e1,i1 -> e1,i1

and parse_atom i =  
  match i with
    [] -> failwith "Expected an expression at end of input"
  | "("::i1 -> (match parse_expression i1 with
                  e2,")"::i2 -> e2,i2
                | _ -> failwith "Expected closing bracket")
  | tok::i1 -> if forall numeric (explode tok)
               then Const(int_of_string tok),i1
               else Var(tok),i1;;


let parse_exp lst = parse_expression (List.rev lst);; 

(* ------------------------------------------------------------------------- *)
(* Generic function to impose lexing and exhaustion checking on a parser.    *)
(* ------------------------------------------------------------------------- *)

let make_parser pfn s =
  let expr,rest = pfn (lex(explode s)) in
  if rest = [] then expr else failwith "Unparsed input";;

(* ------------------------------------------------------------------------- *)
(* Our parser.                                                               *)
(* ------------------------------------------------------------------------- *)

let default_parser = make_parser parse_expression;;

 

(* ------------------------------------------------------------------------- *)
(* Conservatively bracketing first attempt at printer.                       *)
(* ------------------------------------------------------------------------- *)

let rec string_of_exp e =
  match e with
    Var s -> s
  | Const n -> string_of_int n
  | Add(e1,e2) -> "("^(string_of_exp e1)^" + "^(string_of_exp e2)^")"
  | Mul(e1,e2) -> "("^(string_of_exp e1)^" * "^(string_of_exp e2)^")"
  | Sub(e1,e2) -> "("^(string_of_exp e1)^" - "^(string_of_exp e2)^")"
  | Div(e1,e2) -> "("^(string_of_exp e1)^" / "^(string_of_exp e2)^")";;

(* ------------------------------------------------------------------------- *)
(* Examples.                                                                 *)
(* ------------------------------------------------------------------------- *)

  
(* ------------------------------------------------------------------------- *)
(* Somewhat better attempt.                                                  *)
(* ------------------------------------------------------------------------- *)

(*
let rec string_of_exp pr e =
  match e with
    Var s -> s
  | Const n -> string_of_int n
  | Add(e1,e2) ->
        let s = (string_of_exp 3 e1)^" + "^(string_of_exp 2 e2) in
        if 2 < pr then "("^s^")" else s
  | Mul(e1,e2) ->
        let s = (string_of_exp 5 e1)^" * "^(string_of_exp 4 e2) in
        if 4 < pr then "("^s^")" else s;;
*)

(* ------------------------------------------------------------------------- *)
(* Install it.                                                               *)
(* ------------------------------------------------------------------------- *)

 
