import{t as V}from"./toMoney-eef014ed.js";import{F as T}from"./Filter-f10b47ed.js";import{C as D}from"./Col-4463c6d7.js";import{u as F}from"./bot-b5d6ef8b.js";import{u as L}from"./user-4c9e2e6d.js";import{u as M}from"./user-2b8fcc93.js";import{_ as N,r as _,o,c as r,a as t,t as e,i as l,w as c,g as b,h as x,X as S,e as w,F as P,d as U,f}from"./bootstrap-9979bcf7.js";import"./preload-helper-f61836a9.js";import"./flowbite-vue-3e651750.js";import"./_commonjsHelpers-de833af9.js";import"./axios-4a70c6fc.js";import"./browser-77dd377d.js";const R={components:{toMoney:V,Filter:T,Col:D},setup(){const a=L(),d=F(),{showAllAlertsSequentially:k,hasLicensePrompt:s,hasLimitExceeded:i,hasPend:v}=M();return{userStore:a,botStore:d,handleBotClick:async g=>{(i()||v()||s())&&(g.preventDefault(),await k())}}},data(){return{gnl,filters:{symbol:{value:"",keys:["symbol"]},pair:{value:"",keys:["pair"]}},currentPage:1,totalPages:0}},created(){this.fetchData()},methods:{async fetchData(){this.botStore.logs.length==0&&await this.botStore.fetch()}}},j={class:"mb-5 grid gap-5 xs:grid-cols-1 md:grid-cols-2"},z={class:"card relative"},A={class:"card-body flex justify-between"},E=t("img",{src:"/assets/images/illustrations/bot.svg",class:"w-48",alt:"Medal Pic"},null,-1),q={class:"grid gap-5 xs:grid-cols-1 md:grid-cols-2 lg:grid-cols-4"},I={class:"card text-center"},W={class:"p-5"},X=t("div",{class:"my-3"},[t("span",{class:"icon-bg rounded-full bg-gray-100 p-2 shadow dark:border dark:bg-gray-700 dark:shadow-lg"},[t("i",{class:"bi bi-robot text-xl font-medium"})])],-1),G={key:1,class:"font-medium"},H={class:"card-text"},J={class:"card text-center"},K={class:"p-5"},O=t("div",{class:"my-3"},[t("span",{class:"icon-bg rounded-full bg-gray-100 p-2 shadow dark:border dark:bg-gray-700 dark:shadow-lg"},[t("i",{class:"bi bi-check-lg text-xl font-medium"})])],-1),Q={key:1,class:"font-medium"},Y={class:"card-text"},Z={class:"card text-center"},$={class:"p-5"},tt=t("div",{class:"my-3"},[t("span",{class:"icon-bg rounded-full bg-gray-100 p-2 shadow dark:border dark:bg-gray-700 dark:shadow-lg"},[t("i",{class:"bi bi-book text-xl font-medium"})])],-1),st={key:1,class:"font-medium"},et={class:"card-text"},ot={class:"card text-center"},at={class:"p-5"},rt=t("div",{class:"my-3"},[t("span",{class:"icon-bg rounded-full bg-gray-100 p-2 shadow dark:border dark:bg-gray-700 dark:shadow-lg"},[t("i",{class:"bi bi-arrows-expand text-xl font-medium"})])],-1),nt={key:0,class:"text-success"},lt={key:1,class:"text-danger font-medium"},ct={key:2,class:"font-medium"},it={class:"card-text"},dt={class:"mt-10"},ut={class:"mb-4 items-center justify-between xs:block xs:space-y-5 sm:flex sm:space-y-0"},_t={class:"font-medium"},bt={class:"grid grid-cols-2 gap-5"},gt={class:"card relative overflow-x-auto"},mt={class:"bg-gray-100 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"},pt={scope:"col"},yt={class:"py-3 px-6","data-label":"Bot"},ht={class:"fw-bold fs-4"},ft={class:"text-warning",style:{"margin-top":"4px"}},kt={class:"hidden py-3 px-6 md:block","data-label":"Duration"},vt={class:"fw-bold"},xt={class:"fw-bold"},St={class:"py-3 px-6","data-label":"Status"},wt={key:0,class:"badge bg-warning"},Pt={key:0,class:"badge bg-success"},Ct={key:1,class:"badge bg-danger"},Bt={key:2,class:"badge bg-secondary"},Vt={class:"py-3 px-6","data-label":"Status"},Tt={key:0,class:"badge bg-warning"},Dt={key:1,class:"badge bg-success"},Ft={class:"py-3 px-6","data-label":"View"},Lt=t("i",{class:"bi bi-display"},null,-1),Mt={key:1,scope:"row",class:"border-b bg-white dark:border-gray-700 dark:bg-gray-800"},Nt={colspan:"100%",class:"py-4 px-6"},Ut={class:"sr-only"},Rt=t("svg",{class:"h-5 w-5","aria-hidden":"true",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[t("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),jt={class:"sr-only"},zt=t("svg",{class:"h-5 w-5","aria-hidden":"true",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[t("path",{"fill-rule":"evenodd",d:"M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z","clip-rule":"evenodd"})],-1);function At(a,d,k,s,i,v){const y=_("router-link"),g=_("Filter"),m=_("Col"),p=_("VTh"),h=_("toMoney"),C=_("VTable"),B=_("VTPagination");return o(),r("div",null,[t("div",j,[t("div",z,[t("div",A,[t("div",null,[t("h5",null,e(a.$t("Welcome"))+" 🎉 "+e(s.userStore.user?s.userStore.user.firstname:""),1),l(y,{to:"/bot/BTC/USDT",type:"button",onClick:s.handleBotClick,class:"btn btn-primary my-3"},{default:c(()=>[b(e(a.$t("New Bot")),1)]),_:1},8,["onClick"])]),E])]),t("div",q,[t("div",I,[t("div",W,[X,s.botStore.bot_contracts_count_running!=null?(o(),r("h2",{key:s.botStore.bot_contracts_count_running,class:"font-medium"},e(s.botStore.bot_contracts_count_running),1)):(o(),r("h2",G,"0")),t("p",H,e(a.$t("Running Bots")),1)])]),t("div",J,[t("div",K,[O,s.botStore.bot_contracts_count_completed!=null?(o(),r("h2",{key:s.botStore.bot_contracts_count_completed,class:"font-medium"},e(s.botStore.bot_contracts_count_completed),1)):(o(),r("h2",Q,"0")),t("p",Y,e(a.$t("Completed Bots")),1)])]),t("div",Z,[t("div",$,[tt,s.botStore.bot_contracts_count_amount!=null&&s.userStore.currency!=null?(o(),r("h2",{key:s.botStore.bot_contracts_count_amount,class:"font-medium"},e(s.botStore.bot_contracts_count_amount*s.userStore.currency.rate)+" "+e(s.userStore.currency.symbol),1)):(o(),r("h2",st,"0")),t("p",et,e(a.$t("Total Investment")),1)])]),t("div",ot,[t("div",at,[rt,t("span",null,[s.botStore.profit>0?(o(),r("h2",nt,e(s.botStore.profit*(s.userStore.currency?s.userStore.currency.rate:1))+" "+e(s.userStore.currency?s.userStore.currency.symbol:"$"),1)):s.botStore.profit<0?(o(),r("h2",lt,e(s.botStore.profit*(s.userStore.currency?s.userStore.currency.rate:1))+" "+e(s.userStore.currency?s.userStore.currency.symbol:"$"),1)):(o(),r("h2",ct,e(s.botStore.profit*(s.userStore.currency?s.userStore.currency.rate:1))+" "+e(s.userStore.currency?s.userStore.currency.symbol:"$"),1)),t("p",it,e(a.$t("Total Profit/Loss")),1)])])])])]),t("div",dt,[t("div",ut,[t("div",_t,e(a.$t("Running Contracts")),1),t("div",bt,[l(g,null,{default:c(()=>[x(t("input",{"onUpdate:modelValue":d[0]||(d[0]=u=>i.filters.symbol.value=u),type:"text",class:"filter-input",placeholder:"Symbol"},null,512),[[S,i.filters.symbol.value]])]),_:1}),l(g,{class:"if-sm"},{default:c(()=>[x(t("input",{"onUpdate:modelValue":d[1]||(d[1]=u=>i.filters.pair.value=u),type:"text",class:"filter-input",placeholder:"Pair"},null,512),[[S,i.filters.pair.value]])]),_:1})])]),t("div",gt,[(o(),w(C,{key:s.botStore.logs.length,"current-page":i.currentPage,"onUpdate:currentPage":d[2]||(d[2]=u=>i.currentPage=u),class:"w-full text-left text-sm text-gray-500 dark:text-gray-400",data:s.botStore.logs,filters:i.filters,"page-size":10,"hide-sort-icons":!0,onTotalPagesChanged:d[3]||(d[3]=u=>i.totalPages=u)},{head:c(()=>[t("tr",mt,[l(p,{"sort-key":"symbol",scope:"col",class:"py-3 px-6"},{default:c(()=>[l(m,{text:"Bot"})]),_:1}),l(p,{"sort-key":"duration",scope:"col",class:"hidden py-3 px-6 md:flex"},{default:c(()=>[l(m,{text:"Duration"})]),_:1}),l(p,{"sort-key":"profit",scope:"col",class:"py-3 px-6"},{default:c(()=>[l(m,{text:"Profit"})]),_:1}),l(p,{"sort-key":"status",scope:"col",class:"py-3 px-6"},{default:c(()=>[l(m,{text:"Status"})]),_:1}),t("th",pt,e(a.$t("View")),1)])]),body:c(({rows:u})=>[s.botStore.logs.length>0?(o(!0),r(P,{key:0},U(u,n=>(o(),r("tr",{key:n.id,class:"border-b bg-white dark:border-gray-700 dark:bg-gray-800"},[t("td",yt,[t("div",ht,e(n.bot_name),1),t("div",ft," ("+e(n.symbol)+"/"+e(n.pair)+") ",1)]),t("td",kt,[t("div",null,[b(e(a.$t("Start"))+": ",1),t("span",vt,e(n.start_date),1)]),t("div",null,[b(e(a.$t("End"))+": ",1),t("span",xt,e(n.end_date),1)])]),t("td",St,[n.status!=1?(o(),r("span",wt,e(a.$t("Running")),1)):(o(),r(P,{key:1},[n.result==1?(o(),r("span",Pt,[b("+ "),l(h,{num:n.profit,decimals:"4"},null,8,["num"])])):n.result==2?(o(),r("span",Ct,[b("- "),l(h,{num:n.profit,decimals:"4"},null,8,["num"])])):n.result==3?(o(),r("span",Bt,[l(h,{num:n.profit,decimals:"4"},null,8,["num"])])):f("",!0)],64))]),t("td",Vt,[n.status!=1?(o(),r("span",Tt,e(a.$t("Running")),1)):n.status==1?(o(),r("span",Dt,e(a.$t("Completed")),1)):f("",!0)]),t("td",Ft,[n.status!=1?(o(),w(y,{key:0,to:"/bot/"+n.symbol+"/"+n.pair,class:"btn btn-icon btn-info btn-sm","data-bs-toggle":"tooltip","data-bs-placement":"top",title:"View"},{default:c(()=>[Lt]),_:2},1032,["to"])):f("",!0)])]))),128)):(o(),r("tr",Mt,[t("td",Nt,e(a.$t("No results found!")),1)]))]),_:1},8,["current-page","data","filters"]))]),l(B,{currentPage:i.currentPage,"onUpdate:currentPage":d[4]||(d[4]=u=>i.currentPage=u),"aria-label":"Table navigation","total-pages":i.totalPages,"boundary-links":!0,"max-page-links":3,class:"float-right flex items-center justify-between pt-4"},{firstPage:c(()=>[b(e(a.$t("First")),1)]),lastPage:c(()=>[b(e(a.$t("Last")),1)]),next:c(()=>[t("span",Ut,e(a.$t("Next")),1),Rt]),previous:c(()=>[t("span",jt,e(a.$t("Previous")),1),zt]),_:1},8,["currentPage","total-pages"])])])}const Zt=N(R,[["render",At]]);export{Zt as default};