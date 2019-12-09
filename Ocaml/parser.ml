	(*Expression Parser*)
	(*alpahbet - {number, +, *}*)
	(*2+3+4*)


type token =
Tok_Num of char
|Tok_Sum
|Tok_Mul
|Tok_End

#load "str.cma"

let re_num = Str.regexp"[0-9]"
let re_add = Str.regexp"+"
let re_mul = Str.regexp"*"

exception IllegalExpression of string 

(*Lexer*)

let tokenizer str = 
	let rec tok pos s =
	if pos >= String.length s then [Tok_End]
  else
	if (Str.string_match re_num s pos) then
	  let token = Str.matched_string s in
	  (Tok_Num token.[0])::(tok(pos+1) s)
	  else if  (Str.string_match re_add s pos) then
	    Tok_Sum ::(tok(pos+1)) s
	else if  (Str.string_match re_mul s pos) then
	    Tok_Mul ::(tok(pos+1)) s
	  else
	  raise(IllegalExpression "tokenizer")

in 
tok 0 str
;;

(*Parser*)
(*E -> T+E | T
  E -> P+T | P
  E -> 1|2|3
*)
type exp = 
Num of int
|Sum of exp*exp
|Mul of exp*exp
;;

let tok_list = ref [];;

let lookahead()=
match !tok_list with
[]-> raise (IllegalExpression "parse error")
|h::t-> h
;;

let match_tok a =
	match !tok_list with
	(h::t) when a = h -> tok_list := t
    |_-> raise(IllegalExpression "parse error")

let rec parse_E () = 
	let a1  = parse_T () in
	let t = lookahead() in
	match t with
	| Tok_Sum -> match_tok Tok_Sum;
				 let a2 = parse_E() in
				 Sum(a1, a2)
	| _ -> a1

and parse_T ()=
  let a1  = parse_P () in
  let t = lookahead() in
  match t with
   Tok_Mul-> match_tok Tok_Mul;
   			 let a2 = parse_T() in
   			 Mul(a1, a2)

   	|_-> a1

and parse_P () =
  let t = lookahead () in
  match  t with
    Tok_Num n -> let _ = match_tok(Tok_Num n) in
                 Num(int_of_string(Char.escaped n))
    |_-> raise (IllegalExpression "parseError")