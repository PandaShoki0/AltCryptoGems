import{_ as V,s as L,k as f,l as B,r as b,o as i,c as u,a as e,n as C,q as F,t as s,i as t,w as o,F as T,d as D,g as y,f as k,e as M,b as N}from"./bootstrap-9979bcf7.js";import{C as q}from"./flowbite-vue-3e651750.js";import{t as j}from"./toMoney-eef014ed.js";import{t as H}from"./toDate-035af62a.js";import{F as U}from"./Filter-f10b47ed.js";import{C as I}from"./Col-4463c6d7.js";import{u as E}from"./market-4a8d5095.js";import"./_commonjsHelpers-de833af9.js";import"./browser-77dd377d.js";import"./preload-helper-f61836a9.js";import"./axios-4a70c6fc.js";const R={components:{toDate:H,toMoney:j,Filter:U,Col:I,Button:q},props:{orders:{type:Object,required:!0},fetchOrder:{type:Function,required:!0},cancelOrder:{type:Function,required:!0},loading:{type:Boolean,required:!0},refreshing:{type:Boolean,required:!0},auth:{type:Boolean,default:!0}},setup(){const l=E(),d=L(),p=d.params.symbol,r=d.params.currency,x=f("open-orders"),O=f(1),c=f(0),g=f(1),S=f(0),m=B(()=>l.market?_(l.market.precision.amount||1e-6):6),v=B(()=>l.market?_(l.market.precision.price||1e-6):6);function _(n){if(Math.floor(n)===n)return 0;const a=n.toString(),h=/^(\d+\.?\d*|\.\d+)e([\+\-]\d+)$/.exec(a);if(h){const z=(h[1].split(".")[1]||"").length+parseInt(h[2]);return Math.min(z,8)}else{const A=a.split(".")[1]||"";return Math.min(A.length,8)}}function P(n){return x.value===n}function w(n){x.value=n}return{marketStore:l,PrecisionAmount:m,PrecisionPrice:v,currency:p,pair:r,activeItem:x,currentPage:O,totalPages:c,currentPageOpen:g,totalPagesOpen:S,isActive:P,setActive:w}}},G={id:"myTab",class:"nf flex-cols -mb-px flex overflow-x-hidden bg-gray-200 dark:bg-gray-800",role:"tablist"},J={class:"overflow-x-auto"},K={class:"bg-gray-100 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"},Q=e("th",{scope:"col",class:"p-1"},null,-1),W={class:"p-1","data-label":"Date"},X={"data-label":"TxHash",class:"text-uppercase"},Y={"data-label":"Symbol",class:"text-uppercase"},Z={"data-label":"Side",class:"text-uppercase"},$={key:0,class:"badge bg-success"},ee={key:1,class:"badge bg-danger"},te={"data-label":"Price"},ae={"data-label":"Amount"},se={"data-label":"Filled"},re={"data-label":"Status"},oe={key:0,class:"badge bg-primary"},le={key:1,class:"badge bg-warning"},ne={class:"flex space-x-1"},ie={key:0,class:"bi bi-arrow-repeat",style:{"margin-right":"0 !important"}},de={key:0,class:"bi bi-x-lg",style:{"margin-right":"0 !important"}},ce={key:1},ge={colspan:"100%",class:"text-center"},ue=e("div",{class:"flex w-full justify-center"},[e("img",{height:"128",width:"128",src:"https://assets.staticimg.com/pro/2.0.4/images/empty.svg",alt:""})],-1),pe={class:"sr-only"},ye=e("svg",{class:"h-5 w-5","aria-hidden":"true",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),me={class:"sr-only"},be=e("svg",{class:"h-5 w-5","aria-hidden":"true",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z","clip-rule":"evenodd"})],-1),_e={class:"overflow-x-auto"},he={class:"bg-gray-100 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"},fe={class:"p-1","data-label":"Date"},ke={"data-label":"TxHash",class:"text-uppercase"},xe={"data-label":"Symbol",class:"text-uppercase"},ve={"data-label":"Side",class:"text-uppercase"},Pe={key:0,class:"badge bg-success"},Ce={key:1,class:"badge bg-danger"},Se={"data-label":"Price"},we={"data-label":"Amount"},Oe={"data-label":"Filled"},Ae={"data-label":"Status"},Be={key:0,class:"badge bg-success"},Fe={key:1,class:"badge bg-primary"},Te={key:2,class:"badge bg-danger"},De={key:1},Me={colspan:"100%",class:"text-center"},ze=e("div",{class:"flex w-full justify-center"},[e("img",{height:"128",width:"128",src:"https://assets.staticimg.com/pro/2.0.4/images/empty.svg",alt:""})],-1),Ve={class:"sr-only"},Le=e("svg",{class:"h-5 w-5","aria-hidden":"true",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),Ne={class:"sr-only"},qe=e("svg",{class:"h-5 w-5","aria-hidden":"true",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[e("path",{"fill-rule":"evenodd",d:"M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z","clip-rule":"evenodd"})],-1);function je(l,d,p,r,x,O){const c=b("Col"),g=b("VTh"),S=b("toDate"),m=b("to-money"),v=b("Button"),_=b("VTable"),P=b("VTPagination"),w=b("to-date");return i(),u("div",{class:"border border-gray-100 bg-white shadow dark:border-gray-700 dark:bg-gray-900",style:N(p.auth?"margin: 0 -20px;":"")},[e("ul",G,[e("li",null,[e("a",{id:"open-orders-tab",class:C(["inline-block py-2 pl-3 pr-4 text-xs font-medium",r.isActive("open-orders")?"border-gray-300 bg-white text-gray-700 dark:bg-gray-900 dark:text-gray-300":"cursor-pointer border-transparent bg-gray-200 text-gray-400 hover:border-gray-300 hover:bg-gray-300 hover:text-gray-600 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-gray-300"]),type:"button",role:"tab","aria-controls":"open-orders","aria-selected":"false",onClick:d[0]||(d[0]=F(n=>r.setActive("open-orders"),["prevent"]))},s(l.$t("Open Orders")),3)]),e("li",null,[e("a",{id:"closed-orders-tab",class:C(["inline-block py-2 pl-3 pr-4 text-xs font-medium",r.isActive("closed-orders")?"border-gray-300 bg-white text-gray-700 dark:bg-gray-900 dark:text-gray-300":"cursor-pointer border-transparent bg-gray-200 text-gray-400 hover:border-gray-300 hover:bg-gray-300 hover:text-gray-600 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-gray-300"]),type:"button",role:"tab","aria-controls":"closed-orders","aria-selected":"false",onClick:d[1]||(d[1]=F(n=>r.setActive("closed-orders"),["prevent"]))},s(l.$t("Order History")),3)])]),e("div",{id:"open-orders",class:C(["pt-3",r.isActive("open-orders")?"":"hidden"]),role:"tabpanel",style:{"min-height":"300px"}},[e("div",J,[t(_,{"current-page":r.currentPageOpen,"onUpdate:currentPage":d[2]||(d[2]=n=>r.currentPageOpen=n),class:"w-full text-left text-gray-500 dark:text-gray-400",data:p.orders.open,"page-size":10,"hide-sort-icons":!0,onTotalPagesChanged:d[3]||(d[3]=n=>r.totalPagesOpen=n)},{head:o(()=>[e("tr",K,[t(g,{"sort-key":"created_at",scope:"col",class:"p-1"},{default:o(()=>[t(c,{text:"Date"})]),_:1}),t(g,{"sort-key":"symbol",scope:"col",class:"p-1"},{default:o(()=>[t(c,{text:"Symbol"})]),_:1}),t(g,{"sort-key":"order_id",scope:"col",class:"p-1"},{default:o(()=>[t(c,{text:"TxHash"})]),_:1}),t(g,{"sort-key":"side",scope:"col",class:"p-1"},{default:o(()=>[t(c,{text:"Side"})]),_:1}),t(g,{"sort-key":"price",scope:"col",class:"p-1"},{default:o(()=>[t(c,{text:"Price"})]),_:1}),t(g,{"sort-key":"amount",scope:"col",class:"p-1"},{default:o(()=>[t(c,{text:"Amount"})]),_:1}),t(g,{"sort-key":"filled",scope:"col",class:"p-1"},{default:o(()=>[t(c,{text:"Filled"})]),_:1}),t(g,{"sort-key":"status",scope:"col",class:"p-1"},{default:o(()=>[t(c,{text:"Status"})]),_:1}),Q])]),body:o(({rows:n})=>[p.orders.open.length>0?(i(!0),u(T,{key:0},D(n,a=>(i(),u("tr",{key:a.id,class:"border-b bg-white dark:border-gray-700 dark:bg-gray-800"},[e("td",W,[t(S,{time:a.created_at},null,8,["time"])]),e("td",X,s(a.order_id),1),e("td",Y,s(a.symbol),1),e("td",Z,[a.side=="buy"?(i(),u("span",$,s(l.$t("Buy")),1)):(i(),u("span",ee,s(l.$t("Sell")),1))]),e("td",te,[t(m,{num:a.price,decimals:r.PrecisionAmount},null,8,["num","decimals"]),y(" "+s(a.pair),1)]),e("td",ae,[t(m,{num:a.amount,decimals:r.PrecisionPrice},null,8,["num","decimals"]),y(" "+s(r.currency),1)]),e("td",se,[t(m,{num:a.filled,decimals:r.PrecisionPrice},null,8,["num","decimals"]),y(" "+s(r.currency),1)]),e("td",re,[a.status=="open"?(i(),u("span",oe,s(l.$t("Live")),1)):a.status=="filling"?(i(),u("span",le,s(l.$t("Filling")),1)):k("",!0)]),e("td",null,[e("div",ne,[a.status=="open"||a.status=="filling"?(i(),M(v,{key:0,size:"xs",color:"alternative",loading:p.refreshing,disabled:p.refreshing,onClick:h=>p.fetchOrder(a.order_id)},{default:o(()=>[p.refreshing?k("",!0):(i(),u("i",ie))]),_:2},1032,["loading","disabled","onClick"])):k("",!0),a.status=="open"?(i(),M(v,{key:1,size:"xs",color:"red",loading:p.loading,disabled:p.loading,onClick:h=>p.cancelOrder(a.order_id)},{default:o(()=>[p.loading?k("",!0):(i(),u("i",de))]),_:2},1032,["loading","disabled","onClick"])):k("",!0)])])]))),128)):(i(),u("tr",ce,[e("td",ge,[ue,y(" "+s(l.$t("No Data Found")),1)])]))]),_:1},8,["current-page","data"])]),t(P,{currentPage:r.currentPageOpen,"onUpdate:currentPage":d[4]||(d[4]=n=>r.currentPageOpen=n),class:"flex items-center justify-between p-3","aria-label":"Table navigation","total-pages":r.totalPagesOpen,"max-page-links":3,"boundary-links":!0},{firstPage:o(()=>[y(s(l.$t("First")),1)]),lastPage:o(()=>[y(s(l.$t("Last")),1)]),next:o(()=>[e("span",pe,s(l.$t("Next")),1),ye]),previous:o(()=>[e("span",me,s(l.$t("Previous")),1),be]),_:1},8,["currentPage","total-pages"])],2),e("div",{id:"closed-orders",class:C(["pt-3",r.isActive("closed-orders")?"":"hidden"]),role:"tabpanel",style:{"min-height":"300px"}},[e("div",_e,[t(_,{"current-page":r.currentPage,"onUpdate:currentPage":d[5]||(d[5]=n=>r.currentPage=n),class:"w-full text-left text-gray-500 dark:text-gray-400",data:p.orders.closed,"page-size":10,"hide-sort-icons":!0,onTotalPagesChanged:d[6]||(d[6]=n=>r.totalPages=n)},{head:o(()=>[e("tr",he,[t(g,{"sort-key":"created_at",scope:"col",class:"p-1"},{default:o(()=>[t(c,{text:"Date"})]),_:1}),t(g,{"sort-key":"symbol",scope:"col",class:"p-1"},{default:o(()=>[t(c,{text:"Symbol"})]),_:1}),t(g,{"sort-key":"order_id",scope:"col",class:"p-1"},{default:o(()=>[t(c,{text:"TxHash"})]),_:1}),t(g,{"sort-key":"side",scope:"col",class:"p-1"},{default:o(()=>[t(c,{text:"Side"})]),_:1}),t(g,{"sort-key":"price",scope:"col",class:"p-1"},{default:o(()=>[t(c,{text:"Price"})]),_:1}),t(g,{"sort-key":"amount",scope:"col",class:"p-1"},{default:o(()=>[t(c,{text:"Amount"})]),_:1}),t(g,{"sort-key":"filled",scope:"col",class:"p-1"},{default:o(()=>[t(c,{text:"Filled"})]),_:1}),t(g,{"sort-key":"status",scope:"col",class:"p-1"},{default:o(()=>[t(c,{text:"Status"})]),_:1})])]),body:o(({rows:n})=>[p.orders.closed.length>0?(i(!0),u(T,{key:0},D(n,a=>(i(),u("tr",{key:a.id,class:"border-b bg-white dark:border-gray-700 dark:bg-gray-800"},[e("td",fe,[t(w,{time:a.created_at},null,8,["time"])]),e("td",ke,s(a.order_id),1),e("td",xe,s(a.symbol),1),e("td",ve,[a.side=="buy"?(i(),u("span",Pe,s(l.$t("Buy")),1)):(i(),u("span",Ce,s(l.$t("Sell")),1))]),e("td",Se,[t(m,{num:a.price,decimals:r.PrecisionPrice},null,8,["num","decimals"]),y(" "+s(a.pair),1)]),e("td",we,[t(m,{num:a.amount,decimals:r.PrecisionAmount},null,8,["num","decimals"]),y(" "+s(r.currency),1)]),e("td",Oe,[t(m,{num:a.filled,decimals:r.PrecisionAmount},null,8,["num","decimals"]),y(" "+s(r.currency),1)]),e("td",Ae,[a.status=="closed"?(i(),u("span",Be,s(l.$t("Filled")),1)):a.status=="open"?(i(),u("span",Fe,s(l.$t("Live")),1)):(i(),u("span",Te,s(l.$t("Canceled")),1))])]))),128)):(i(),u("tr",De,[e("td",Me,[ze,y(" "+s(l.$t("No Data Found")),1)])]))]),_:1},8,["current-page","data"])]),t(P,{currentPage:r.currentPage,"onUpdate:currentPage":d[7]||(d[7]=n=>r.currentPage=n),class:"flex items-center justify-between p-3","aria-label":"Table navigation","total-pages":r.totalPages,"max-page-links":3,"boundary-links":!0},{firstPage:o(()=>[y(s(l.$t("First")),1)]),lastPage:o(()=>[y(s(l.$t("Last")),1)]),next:o(()=>[e("span",Ve,s(l.$t("Next")),1),Le]),previous:o(()=>[e("span",Ne,s(l.$t("Previous")),1),qe]),_:1},8,["currentPage","total-pages"])],2)],4)}const Ye=V(R,[["render",je]]);export{Ye as default};