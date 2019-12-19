(function(joo_global_object)
   {"use strict";
    var
     runtime=joo_global_object.jsoo_runtime,
     caml_new_string=runtime.caml_new_string;
    function caml_call1(f,a0)
     {return f.length == 1?f(a0):runtime.caml_call_gen(f,[a0])}
    function caml_call2(f,a0,a1)
     {return f.length == 2?f(a0,a1):runtime.caml_call_gen(f,[a0,a1])}
    function caml_call3(f,a0,a1,a2)
     {return f.length == 3?f(a0,a1,a2):runtime.caml_call_gen(f,[a0,a1,a2])}
    function caml_call5(f,a0,a1,a2,a3,a4)
     {return f.length == 5
              ?f(a0,a1,a2,a3,a4)
              :runtime.caml_call_gen(f,[a0,a1,a2,a3,a4])}
    var
     global_data=runtime.caml_get_global_data(),
     cst_my_widget_type=caml_new_string("my widget type"),
     cst_my_widget_type$0=caml_new_string("my widget type"),
     cst_my_widget_type$1=caml_new_string("my widget type"),
     cst_my_widget_type$2=caml_new_string("my widget type"),
     Incr_dom_Component=global_data.Incr_dom__Component,
     Incr_dom_Incr=global_data.Incr_dom__Incr,
     Virtual_dom_Node=global_data.Virtual_dom__Node,
     Js_of_ocaml_Dom_html=global_data.Js_of_ocaml__Dom_html,
     Async_kernel=global_data.Async_kernel,
     Core_kernel=global_data.Core_kernel,
     Core_kernel_Type_equal=global_data.Core_kernel__Type_equal,
     t_of_sexp=Core_kernel[492],
     sexp_of_t=Core_kernel[491],
     _n_=[0,caml_new_string("<my widget type>")],
     _j_=[0,caml_new_string("<my widget type>")],
     _f_=[0,caml_new_string("<my widget type>")],
     _b_=[0,caml_new_string("<my widget type>")];
    function init(param){return 0}
    function cutoff(param,_D_){return 1}
    var
     Model=[0,t_of_sexp,sexp_of_t,init,cutoff],
     t_of_sexp$0=Core_kernel[492],
     sexp_of_t$0=Core_kernel[491];
    function should_log(param){return 1}
    var Action=[0,t_of_sexp$0,sexp_of_t$0,should_log],State=[0];
    function apply_action(param,_C_,_B_,_A_){return 0}
    function on_startup(param,_z_){return caml_call1(Async_kernel[19],0)}
    function _a_(param){return _b_}
    var
     widget_id=caml_call2(Core_kernel_Type_equal[8][3],cst_my_widget_type,_a_),
     _c_=0;
    function _d_(param)
     {var input=Js_of_ocaml_Dom_html[2].createElement("input");
      input.id = "node-input";
      input.className = "node-input";
      var pushnode=Js_of_ocaml_Dom_html[8].pushnode;
      pushnode(input);
      return [0,0,input]}
    var view_input=caml_call5(Virtual_dom_Node[43],0,0,widget_id,_d_,_c_);
    function _e_(param){return _f_}
    var
     widget_id$0=
      caml_call2(Core_kernel_Type_equal[8][3],cst_my_widget_type$0,_e_),
     _g_=0;
    function _h_(param)
     {var button=Js_of_ocaml_Dom_html[2].createElement("button");
      button.id = "node-submit-button";
      button.innerHTML = "<b> submit nodes <\/b>";
      var pushnode=Js_of_ocaml_Dom_html[8].pushnode;
      pushnode(button);
      return [0,0,button]}
    var
     node_submit_button=
      caml_call5(Virtual_dom_Node[43],0,0,widget_id$0,_h_,_g_);
    function _i_(param){return _j_}
    var
     widget_id$1=
      caml_call2(Core_kernel_Type_equal[8][3],cst_my_widget_type$1,_i_),
     _k_=0;
    function _l_(param)
     {var div=Js_of_ocaml_Dom_html[2].createElement("div");
      div.id = "graph-container";
      var pushnode=Js_of_ocaml_Dom_html[8].pushnode;
      pushnode(div);
      return [0,0,div]}
    var
     graph_container=
      caml_call5(Virtual_dom_Node[43],0,0,widget_id$1,_l_,_k_);
    function _m_(param){return _n_}
    var
     widget_id$2=
      caml_call2(Core_kernel_Type_equal[8][3],cst_my_widget_type$2,_m_),
     _o_=0;
    function _p_(param)
     {var button=Js_of_ocaml_Dom_html[2].createElement("button");
      button.id = "clear-button";
      button.innerHTML = "<b> Clear <\/b>";
      var pushnode=Js_of_ocaml_Dom_html[8].pushnode;
      pushnode(button);
      return [0,0,button]}
    var clear_button=caml_call5(Virtual_dom_Node[43],0,0,widget_id$2,_p_,_o_);
    function view(param,_x_)
     {var
       _y_=
        caml_call3
         (Virtual_dom_Node[9],
          0,
          0,
          [0,
           view_input,
           [0,node_submit_button,[0,graph_container,[0,clear_button,0]]]]);
      return caml_call1(Incr_dom_Incr[9],_y_)}
    function create(model,param,inject)
     {function _q_(model){return function(_u_,_v_,_w_){return 0}}
      var
       let_syntax_001=caml_call2(Incr_dom_Incr[73][4][2],model,_q_),
       let_syntax_002=view(model,inject);
      function _r_(param)
       {var match=param[2],model=match[2],view=match[1],apply_action=param[1];
        return caml_call5
                (Incr_dom_Component[6],[0,apply_action],0,0,model,view)}
      var
       _s_=caml_call2(Incr_dom_Incr[73][4][3],let_syntax_002,model),
       _t_=caml_call2(Incr_dom_Incr[73][4][3],let_syntax_001,_s_);
      return caml_call2(Incr_dom_Incr[73][4][2],_t_,_r_)}
    var
     App=
      [0,
       Model,
       Action,
       State,
       apply_action,
       on_startup,
       view_input,
       node_submit_button,
       graph_container,
       clear_button,
       view,
       create];
    runtime.caml_register_global(41,App,"App");
    return}
  (function(){return this}()));

//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLjAsImZpbGUiOiIubWFpbi5lb2Jqcy9ieXRlL2FwcC5jbW8uanMiLCJzb3VyY2VSb290IjoiIiwibmFtZXMiOlsidF9vZl9zZXhwIiwic2V4cF9vZl90IiwiaW5pdCIsImN1dG9mZiIsInRfb2Zfc2V4cCQwIiwic2V4cF9vZl90JDAiLCJzaG91bGRfbG9nIiwiYXBwbHlfYWN0aW9uIiwib25fc3RhcnR1cCIsIndpZGdldF9pZCIsImlucHV0IiwicHVzaG5vZGUiLCJ2aWV3X2lucHV0Iiwid2lkZ2V0X2lkJDAiLCJidXR0b24iLCJub2RlX3N1Ym1pdF9idXR0b24iLCJ3aWRnZXRfaWQkMSIsImRpdiIsImdyYXBoX2NvbnRhaW5lciIsIndpZGdldF9pZCQyIiwiY2xlYXJfYnV0dG9uIiwidmlldyIsImNyZWF0ZSIsIm1vZGVsIiwiaW5qZWN0IiwibGV0X3N5bnRheF8wMDEiLCJsZXRfc3ludGF4XzAwMiJdLCJtYXBwaW5ncyI6Ijs7STs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7S0FLRUE7Ozs7OzthQUVJRSxZQUFVLFFBQUU7YUFDWkMsa0JBQWEsUUFBSTs7Y0FIckJILG9CQUVJRSxLQUNBQztLQUlKQzs7YUFFSUUsa0JBQWUsUUFBSTtrQkFGdkJGLHdCQUVJRTthQU9GQyxnQ0FBd0MsUUFBRTthQUMxQ0Msc0JBQWtDLHFDQUFzQjt3QkFRRixVQUE0QjtJQUFsRjs7OztNQUtjLElBQVJFLE1BQVE7TUFDYjtNQUNBO01BRmEsSUFHUkM7TUFDQSxTQUpBRDtNQUlBLFlBSkFBLE1BTUs7SUFUYixJQUxFRSxXQUtGLG9DQUhJSDtJQUdKLG9CQWdCd0QsVUFBNEI7SUFBbEY7Ozs7O01BS2UsSUFBVEssT0FBUztNQUNkO01BQ0E7TUFGYyxJQUtOSDtNQUNILFNBTkFHO01BTUEsWUFOQUEsT0FPTTtJQVZkO0tBTEVDO01BS0Ysb0NBSElGO0lBR0osb0JBbUJ3RCxVQUE0QjtJQUFsRjs7Ozs7TUFLWSxJQUFOSSxJQUFNO01BQ1g7TUFEVyxJQUdITjtNQUNILFNBSkFNO01BSUEsWUFKQUEsSUFLRztJQVJYO0tBTEVDO01BS0Ysb0NBSElGO0lBR0osb0JBZXdELFVBQTRCO0lBQWxGOzs7OztNQUtlLElBQVRGLE9BQVM7TUFDZDtNQUNBO01BRmMsSUFLTkg7TUFDSCxTQU5BRztNQU1BLFlBTkFBLE9BT007SUFWZCxJQUxFTSxhQUtGLG9DQUhJRDtJQUdKLFNBaUJFRTtNQUNVOzs7Ozs7O1dBL0VWVDtjQWtCQUcsc0JBcUJBRyxtQkFpQkFFO01BdUJVLHVDQUFpRjtJQWxCN0YsU0FxQkVFLE9BQU9DLFlBQW9CQztNQUM3QixhQUVVRCxPQUNSLDZCLFNBQWtCO01BRGxCO3lEQUhPQTtPQUtFLG9CQUxGQSxNQUFvQkM7TUFLbEI7UUFIWDs7MENBQVFqQixrQkFJSmdCLE1BREFGLEtBRXFDO01BRjlCOzhDQUFQSyxlQUxLSDs4Q0FFREU7d0RBS2lDO0lBNUJ6Qzs7Ozs7O09BbkVFbEI7T0FDQUM7T0FLQUk7T0FrQkFHO09BcUJBRztPQWlCQUU7T0FzQkFDO09BSUFDO0lBckJGO1UiLCJzb3VyY2VzIjpbIi9Vc2Vycy9jcmFmdGFuZGNvZGUvRGVza3RvcC9pbmNyX2RvbS1tYXN0ZXIvX2J1aWxkL2RlZmF1bHQvZXhhbXBsZS93aWRnZXRfcmF3X2h0bWwvYXBwLm1sIl0sInNvdXJjZXNDb250ZW50IjpbIm9wZW4gQ29yZV9rZXJuZWxcbm9wZW4gSW5jcl9kb21cbm9wZW4gSnNfb2Zfb2NhbWxcblxubW9kdWxlIE1vZGVsID0gc3RydWN0XG4gIHR5cGUgdCA9IHVuaXQgW0BAZGVyaXZpbmcgc2V4cF1cblxuICBsZXQgaW5pdCAoKSA9ICgpXG4gIGxldCBjdXRvZmYgXyBfID0gdHJ1ZVxuZW5kXG5cbm1vZHVsZSBBY3Rpb24gPSBzdHJ1Y3RcbiAgdHlwZSB0ID0gdW5pdCBbQEBkZXJpdmluZyBzZXhwXVxuXG4gIGxldCBzaG91bGRfbG9nIF8gPSB0cnVlXG5lbmRcblxubW9kdWxlIFN0YXRlID0gc3RydWN0XG4gIHR5cGUgdCA9IHVuaXRcbmVuZFxuXG5sZXQgYXBwbHlfYWN0aW9uIF8gXyBfIH5zY2hlZHVsZV9hY3Rpb246XyA9ICgpXG5sZXQgb25fc3RhcnR1cCB+c2NoZWR1bGVfYWN0aW9uOl8gXyA9IEFzeW5jX2tlcm5lbC5yZXR1cm4gKClcblxuXG5cblxubGV0IHZpZXdfaW5wdXQgPVxuICBcbiAgbGV0IHdpZGdldF9pZCA9XG4gICAgVHlwZV9lcXVhbC5JZC5jcmVhdGUgfm5hbWU6XCJteSB3aWRnZXQgdHlwZVwiIChmdW4gXyAtPiBTZXhwLkF0b20gXCI8bXkgd2lkZ2V0IHR5cGU+XCIpXG4gIGluXG4gIFZkb20uTm9kZS53aWRnZXRcbiAgICB+aWQ6d2lkZ2V0X2lkXG4gICAgfmluaXQ6KGZ1biAoKSAtPlxuICAgICAgbGV0IGlucHV0ID0gRG9tX2h0bWwuZG9jdW1lbnQjI2NyZWF0ZUVsZW1lbnQgKFwiaW5wdXRcIiB8PiBKcy5zdHJpbmcpIGluXG4gICAgIGlucHV0IyMuaWQgOj0gSnMuc3RyaW5nIFwibm9kZS1pbnB1dFwiO1xuICAgICBpbnB1dCMjLmNsYXNzTmFtZSA6PSBKcy5zdHJpbmcgXCJub2RlLWlucHV0XCI7XG4gICAgICBsZXQgcHVzaG5vZGUgPSBKcy5VbnNhZmUuZ2V0IERvbV9odG1sLndpbmRvdyAoXCJwdXNobm9kZVwiIHw+IEpzLnN0cmluZykgaW5cbiAgICAgICAgICBKcy5VbnNhZmUuZnVuX2NhbGwgcHVzaG5vZGUgW3wgSnMuVW5zYWZlLmluamVjdCBpbnB1dCB8XSB8PiBpZ25vcmU7XG4gICAgICBcbiAgICAgICgpLCBpbnB1dClcbiAgICAoKVxuOztcblxubGV0IG5vZGVfc3VibWl0X2J1dHRvbiA9XG4gIFxuICBsZXQgd2lkZ2V0X2lkID1cbiAgICBUeXBlX2VxdWFsLklkLmNyZWF0ZSB+bmFtZTpcIm15IHdpZGdldCB0eXBlXCIgKGZ1biBfIC0+IFNleHAuQXRvbSBcIjxteSB3aWRnZXQgdHlwZT5cIilcbiAgaW5cbiAgVmRvbS5Ob2RlLndpZGdldFxuICAgIH5pZDp3aWRnZXRfaWRcbiAgICB+aW5pdDooZnVuICgpIC0+XG4gICAgICBsZXQgYnV0dG9uID0gRG9tX2h0bWwuZG9jdW1lbnQjI2NyZWF0ZUVsZW1lbnQgKFwiYnV0dG9uXCIgfD4gSnMuc3RyaW5nKSBpblxuICAgICBidXR0b24jIy5pZCA6PSBKcy5zdHJpbmcgXCJub2RlLXN1Ym1pdC1idXR0b25cIjtcbiAgICAgYnV0dG9uIyMuaW5uZXJIVE1MXG4gICAgICA6PSBcIjxiPiBzdWJtaXQgbm9kZXMgPC9iPlwiXG4gICAgICAgICB8PiBKcy5zdHJpbmc7XG4gICAgICAgICBsZXQgcHVzaG5vZGUgPSBKcy5VbnNhZmUuZ2V0IERvbV9odG1sLndpbmRvdyAoXCJwdXNobm9kZVwiIHw+IEpzLnN0cmluZykgaW5cbiAgICAgICAgICBKcy5VbnNhZmUuZnVuX2NhbGwgcHVzaG5vZGUgW3wgSnMuVW5zYWZlLmluamVjdCBidXR0b24gfF0gfD4gaWdub3JlO1xuICAgICAgKCksIGJ1dHRvbilcbiAgICAoKVxuOztcblxuXG5cbmxldCBncmFwaF9jb250YWluZXIgPVxuICBcbiAgbGV0IHdpZGdldF9pZCA9XG4gICAgVHlwZV9lcXVhbC5JZC5jcmVhdGUgfm5hbWU6XCJteSB3aWRnZXQgdHlwZVwiIChmdW4gXyAtPiBTZXhwLkF0b20gXCI8bXkgd2lkZ2V0IHR5cGU+XCIpXG4gIGluXG4gIFZkb20uTm9kZS53aWRnZXRcbiAgICB+aWQ6d2lkZ2V0X2lkXG4gICAgfmluaXQ6KGZ1biAoKSAtPlxuICAgICAgbGV0IGRpdiA9IERvbV9odG1sLmRvY3VtZW50IyNjcmVhdGVFbGVtZW50IChcImRpdlwiIHw+IEpzLnN0cmluZykgaW5cbiAgICAgZGl2IyMuaWQgOj0gSnMuc3RyaW5nIFwiZ3JhcGgtY29udGFpbmVyXCI7XG4gICAgIFxuICAgICAgICAgbGV0IHB1c2hub2RlID0gSnMuVW5zYWZlLmdldCBEb21faHRtbC53aW5kb3cgKFwicHVzaG5vZGVcIiB8PiBKcy5zdHJpbmcpIGluXG4gICAgICAgICAgSnMuVW5zYWZlLmZ1bl9jYWxsIHB1c2hub2RlIFt8IEpzLlVuc2FmZS5pbmplY3QgZGl2IHxdIHw+IGlnbm9yZTtcbiAgICAgICgpLCBkaXYpXG4gICAgKClcbjs7XG5cbmxldCBjbGVhcl9idXR0b24gPVxuICBcbiAgbGV0IHdpZGdldF9pZCA9XG4gICAgVHlwZV9lcXVhbC5JZC5jcmVhdGUgfm5hbWU6XCJteSB3aWRnZXQgdHlwZVwiIChmdW4gXyAtPiBTZXhwLkF0b20gXCI8bXkgd2lkZ2V0IHR5cGU+XCIpXG4gIGluXG4gIFZkb20uTm9kZS53aWRnZXRcbiAgICB+aWQ6d2lkZ2V0X2lkXG4gICAgfmluaXQ6KGZ1biAoKSAtPlxuICAgICAgbGV0IGJ1dHRvbiA9IERvbV9odG1sLmRvY3VtZW50IyNjcmVhdGVFbGVtZW50IChcImJ1dHRvblwiIHw+IEpzLnN0cmluZykgaW5cbiAgICAgYnV0dG9uIyMuaWQgOj0gSnMuc3RyaW5nIFwiY2xlYXItYnV0dG9uXCI7XG4gICAgIGJ1dHRvbiMjLmlubmVySFRNTFxuICAgICAgOj0gXCI8Yj4gQ2xlYXIgPC9iPlwiXG4gICAgICAgICB8PiBKcy5zdHJpbmc7XG4gICAgICAgICBsZXQgcHVzaG5vZGUgPSBKcy5VbnNhZmUuZ2V0IERvbV9odG1sLndpbmRvdyAoXCJwdXNobm9kZVwiIHw+IEpzLnN0cmluZykgaW5cbiAgICAgICAgICBKcy5VbnNhZmUuZnVuX2NhbGwgcHVzaG5vZGUgW3wgSnMuVW5zYWZlLmluamVjdCBidXR0b24gfF0gfD4gaWdub3JlO1xuICAgICAgKCksIGJ1dHRvbilcbiAgICAoKVxuOztcblxuXG5cblxubGV0IHZpZXcgXyB+aW5qZWN0Ol8gPVxuICBJbmNyLnJldHVybiAoVmRvbS5Ob2RlLmRpdiBbXSBbdmlld19pbnB1dDsgbm9kZV9zdWJtaXRfYnV0dG9uO2dyYXBoX2NvbnRhaW5lcjsgY2xlYXJfYnV0dG9uXSlcbjs7XG5cbmxldCBjcmVhdGUgbW9kZWwgfm9sZF9tb2RlbDpfIH5pbmplY3QgPVxuICBsZXQgb3BlbiBJbmNyLkxldF9zeW50YXggaW5cbiAgbGV0JW1hcCBhcHBseV9hY3Rpb24gPVxuICAgIGxldCVtYXAgbW9kZWwgPSBtb2RlbCBpblxuICAgIGFwcGx5X2FjdGlvbiBtb2RlbFxuICBhbmQgdmlldyA9IHZpZXcgbW9kZWwgfmluamVjdFxuICBhbmQgbW9kZWwgPSBtb2RlbCBpblxuICBDb21wb25lbnQuY3JlYXRlIH5hcHBseV9hY3Rpb24gbW9kZWwgdmlld1xuOztcbiJdfQ==
