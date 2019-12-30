Example 1

#ocamllex main.mll

#ocamlopt -o main main.ml

add expressions to data.cl  
   such as 1+2  
   
./main data.cl  

Example 2.

open in ocaml shell using  #use "parser.ml";;
 let t =  tokenizer "3+4+5";;

#tok_list = t;;


(*check tok_list*)

!tok_list;;

let x  = parse_E();;

In result you will see tree structure of expression passed (3+4+5)
