import{t as v}from"./toMoney-eef014ed.js";import{t as P}from"./toDate-035af62a.js";import{F as T}from"./Filter-f10b47ed.js";import{C}from"./Col-4463c6d7.js";import{u as D}from"./log-1285ac33.js";import{_ as V,r as i,o as u,c as _,a as e,t as r,i as a,w as o,h as F,X as S,e as x,F as B,d as L,n as M,g as p}from"./bootstrap-9979bcf7.js";import"./_commonjsHelpers-de833af9.js";import"./browser-77dd377d.js";import"./preload-helper-f61836a9.js";import"./axios-4a70c6fc.js";const N={components:{toDate:P,toMoney:v,Filter:T,Col:C},setup(){return{logStore:D()}},data(){return{cur_rate,cur_symbol,filters:{trx:{value:"",keys:["trx"]}},currentPage:1,totalPages:0}},created(){this.logStore.logs.transaction.length==0&&this.logStore.fetch("transaction")}},z={class:"mb-4 items-center justify-between xs:block xs:space-y-5 sm:flex sm:space-y-0"},A={class:"font-medium"},U={class:"card relative overflow-x-auto"},j={class:"bg-gray-100 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"},I={"data-label":"Date",class:"py-4 px-6"},w={key:1},E={"data-label":"trx",class:"py-4 px-6"},X={"data-label":"Fees",class:"py-4 px-6"},q={"data-label":"After Charge",class:"py-4 px-6"},G={key:1,scope:"row",class:"border-b bg-white dark:border-gray-700 dark:bg-gray-800"},H={colspan:"100%",class:"py-4 px-6"},J={class:"sr-only"},K=e("svg",{class:"h-5 w-5","aria-hidden":"true",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),O={class:"sr-only"},Q=e("svg",{class:"h-5 w-5","aria-hidden":"true",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z","clip-rule":"evenodd"})],-1);function R(n,c,W,m,s,Y){const f=i("Filter"),d=i("Col"),g=i("VTh"),h=i("toDate"),y=i("toMoney"),b=i("VTable"),k=i("VTPagination");return u(),_("div",null,[e("div",z,[e("div",A,r(n.$t("Transactions Log")),1),a(f,null,{default:o(()=>[F(e("input",{"onUpdate:modelValue":c[0]||(c[0]=l=>s.filters.trx.value=l),type:"text",class:"filter-input",placeholder:"Transaction ID"},null,512),[[S,s.filters.trx.value]])]),_:1})]),e("div",U,[(u(),x(b,{key:m.logStore.logs.transaction.length,"current-page":s.currentPage,"onUpdate:currentPage":c[1]||(c[1]=l=>s.currentPage=l),class:"w-full text-left text-sm text-gray-500 dark:text-gray-400",data:m.logStore.logs.transaction,filters:s.filters,"page-size":10,"hide-sort-icons":!0,onTotalPagesChanged:c[2]||(c[2]=l=>s.totalPages=l)},{head:o(()=>[e("tr",j,[a(g,{"sort-key":"created_at",scope:"col",class:"py-3 px-6"},{default:o(()=>[a(d,{text:"Date"})]),_:1}),a(g,{"sort-key":"trx",scope:"col",class:"py-3 px-6"},{default:o(()=>[a(d,{text:"Transaction ID"})]),_:1}),a(g,{"sort-key":"amount",scope:"col",class:"py-3 px-6"},{default:o(()=>[a(d,{text:"Amount"})]),_:1}),a(g,{"sort-key":"charge",scope:"col",class:"py-3 px-6"},{default:o(()=>[a(d,{text:"Fees"})]),_:1}),a(g,{"sort-key":"post_balance",scope:"col",class:"py-3 px-6"},{default:o(()=>[a(d,{text:"Post Balance"})]),_:1}),e("th",null,r(n.$t("Details")),1)])]),body:o(({rows:l})=>[m.logStore.logs.transaction.length>0?(u(!0),_(B,{key:0},L(l,t=>(u(),_("tr",{key:t.id,class:"border-b bg-white dark:border-gray-700 dark:bg-gray-800"},[e("td",I,[t.created_at?(u(),x(h,{key:0,time:t.created_at},null,8,["time"])):(u(),_("span",w,"N/A"))]),e("td",E,r(t.trx),1),e("td",{"data-label":"Amount",class:M(["py-4 px-6","budget "+(t.trx_type=="+"?"text-success":"text-danger")])},[p(r(t.trx_type=="+"?"+":"-")+" ",1),a(y,{num:t.currency?t.amount:t.amount*s.cur_rate,decimals:"2"},null,8,["num"]),p(" "+r(t.currency?t.currency:s.cur_symbol),1)],2),e("td",X,[a(y,{num:t.currency?t.charge:t.charge*s.cur_rate,decimals:"2"},null,8,["num"]),p(" "+r(t.currency?t.currency:s.cur_symbol),1)]),e("td",q,[a(y,{num:t.currency?t.post_balance:t.post_balance*s.cur_rate,decimals:"2"},null,8,["num"]),p(" "+r(t.currency?t.currency:s.cur_symbol),1)]),e("td",null,r(t.details),1)]))),128)):(u(),_("tr",G,[e("td",H,r(n.$t("No results found!")),1)]))]),_:1},8,["current-page","data","filters"]))]),a(k,{currentPage:s.currentPage,"onUpdate:currentPage":c[3]||(c[3]=l=>s.currentPage=l),class:"float-right flex items-center justify-between pt-4","total-pages":s.totalPages,"boundary-links":!0,"hide-single-page":!0,"max-page-links":3},{firstPage:o(()=>[p(r(n.$t("First")),1)]),lastPage:o(()=>[p(r(n.$t("Last")),1)]),next:o(()=>[e("span",J,r(n.$t("Next")),1),K]),previous:o(()=>[e("span",O,r(n.$t("Previous")),1),Q]),_:1},8,["currentPage","total-pages"])])}const ct=V(N,[["render",R]]);export{ct as default};