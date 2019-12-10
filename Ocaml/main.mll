{
let line_number = ref 1

type token =
  |Integer of int
  |Plus
  |Minus
  |Alphabet of char

exception Eof
}
rule token = parse
  [' ' '\t']     { token lexbuf }     (* skip blanks *)
| ['\n' ]        {incr line_number ; token lexbuf }
| ['0'-'9']+ as lxm { Integer (int_of_string lxm) }
| '+'            { Plus }
|'-'	           {Minus}
|['a'- 'z']|['A'-'Z']	as a {Alphabet a}
| eof            { raise Eof }


{
  
let main () = begin

  try
    let filename = Sys.argv.(1) in
    let file_handle = open_in filename in
    let lexbuf = Lexing.from_channel file_handle in
    while true do
      let result = token lexbuf in
      match result with
      |Plus-> Printf.printf "Plus \n"
      |Minus-> Printf.printf "Minus \n"
      |Alphabet (s) -> Printf.printf "Alphabet\n%c\n" s 
      |Integer (i) -> Printf.printf "Integer\n%d\n" i
    done
  with  Eof ->
    exit 0


end ;;
main() ;;

}