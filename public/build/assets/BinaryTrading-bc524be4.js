import{_ as z}from"./preload-helper-f61836a9.js";import{_ as R,o,c as l,a as r,g as _,t as i,f as D,n as v,F as I,r as g,q as O,h as B,U,i as c,d as H,j as q,V as J,k as T,u as Q,y as X,x as Z,e as S,w as b,b as ee}from"./bootstrap-249b0f62.js";import{u as Y}from"./user-5d70a0d6.js";import{u as K}from"./market-8356724b.js";import{t as te}from"./toMoney-88a56e62.js";import{t as re}from"./toDate-734c7690.js";import{F as ae}from"./Filter-3bb21f90.js";import{C as se}from"./Col-3a6cbfed.js";import oe from"./Marketinfo-a554d273.js";import ie from"./Orderbook-63471ec8.js";import{M as ne}from"./Markets-264389a6.js";import{l as le}from"./index-dc8c00ce.js";import de from"./Trades-1cab0ff9.js";import"./_commonjsHelpers-de833af9.js";import"./dijkstra-f906a09e.js";import"./axios-7a713374.js";import"./LoadingCircles-d67a70a4.js";/* empty css                                                                       */import"./ListItem-a6b6e883.js";const ce={name:"TimeDropdown",props:{limit:{type:Object,required:!0}},data(){return{OrderTimeUnit:"Sec",dropdownVisible:!1}},emits:["SetOrderTime"],methods:{toggleDropdown(){this.dropdownVisible=!this.dropdownVisible},SetOrderTime(e,t,s){this.OrderTimeUnit=e,this.$emit("SetOrderTime",e,t,s),this.toggleDropdown()}}},ue=["aria-expanded"];function ge(e,t,s,a,n,u){return o(),l(I,null,[r("button",{class:"inline-flex flex-shrink-0 items-center rounded-r-md border border-gray-300 bg-gray-100 p-2 text-center text-xs text-gray-500 hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700",type:"button","aria-expanded":n.dropdownVisible,onClick:t[0]||(t[0]=(...f)=>u.toggleDropdown&&u.toggleDropdown(...f))},[_(i(n.OrderTimeUnit)+" ",1),t[4]||(t[4]=r("svg",{class:"ml-2 h-4 w-4","aria-hidden":"true",fill:"none",stroke:"currentColor",viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg"},[r("path",{"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M19 9l-7 7-7-7"})],-1))],8,ue),r("div",{class:v([n.dropdownVisible?"block":"hidden","absolute z-10 left-0 mt-1 w-44 divide-y divide-gray-100 rounded bg-white shadow dark:bg-gray-700"])},[s.limit!=null?(o(),l("ul",{key:s.limit.max_time_hour,class:"py-1 text-xs text-gray-700 dark:text-gray-200","aria-labelledby":"dropdownDefaultButton"},[r("li",null,[r("a",{class:"block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white",onClick:t[1]||(t[1]=f=>u.SetOrderTime("Sec",s.limit.min_time_sec,s.limit.max_time_sec))},i(e.$t("Sec")),1)]),r("li",null,[r("a",{value:"min",class:"block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white",onClick:t[2]||(t[2]=f=>u.SetOrderTime("Min",s.limit.min_time_min,s.limit.max_time_min))},i(e.$t("Min")),1)]),r("li",null,[r("a",{value:"hour",class:"block px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white",onClick:t[3]||(t[3]=f=>u.SetOrderTime("Hour",s.limit.min_time_hour,s.limit.max_time_hour))},i(e.$t("Hour")),1)])])):D("",!0)],2)],64)}const me=R(ce,[["render",ge]]),be={components:{TimeDropdown:me},props:{type:{type:String,default:"practice"},limit:{type:Object,required:!0}},setup(){const e=Y();return{marketStore:K(),userStore:e}},data(){return{symbol:this.$route.params.symbol,currency:this.$route.params.currency,activeItem:"riseFall",loading:!1,gnl,time:null,amount:null,wallet:null,obj:[],min_time:null,max_time:null,tradeLogId:null,second:null,OrderTimeUnit:"Sec",OrderType:null,message:[],dataframe:{},timeCount:null,timeLeft:null,startCount:!1,areaSeries:!1,chart:null,btnWidth:{rise:0,fall:0}}},computed:{profitComputed(){return this.priceFormatter(gnl.profit,2)}},emits:["update"],created(){this.type=="trade"&&this.fetchData(),le("https://unpkg.com/lightweight-charts/dist/lightweight-charts.standalone.production.js").then(()=>{this.createChart()}).catch(()=>{})},mounted(){this.limit!=null&&(this.min_time=this.limit.min_time_sec,this.max_time=this.limit.max_time_sec)},methods:{priceFormatter(e,t=8,s=2,a=","){return e?(e=parseInt(e)!==0?parseFloat(e).toFixed(s):parseFloat(e).toFixed(t),e=parseInt(e)!==0?e.toString().replace(/\B(?=(\d{3})+(?!\d))/g,a):e,e):0},Order(){this.timeCount=this.secondCount(),this.type=="practice"&&this.userStore.user.practice_balance-this.amount<0?this.$toast.error("Your Practice Balance Not Enough! Please Add Practice Amount"):this.type=="trade"&&this.wallet-this.amount<0?this.$toast.error("Your Balance Not Enough! Please Add Balance First"):this.placeOrder()},placeOrder(){this.loading=!0,axios.post("/user/binary/"+this.type+"/store",{amount:this.amount,symbol:this.symbol,OrderType:this.OrderType,duration:this.time,currency:this.currency,unit:this.OrderTimeUnit}).then(e=>{e.value==1?(this.tradeLogId=e.tradeLogId,this.countDown(this.timeCount),this.OrderType==1?($(".tradeType").text("Rise"),$(".tradePrice").text(e.trade+" "+this.currency),this.$toast.success("Trade: Rise")):($(".tradeType").text("Fall"),$(".tradePrice").text(e.trade+" "+this.currency),this.$toast.success("Trade: Fall"))):e.value==2?this.$toast.error(e.message):$.each(e,function(t,s){this.$toast.error(s)})}).catch(e=>{})},countDown(e){let t=[];var s;this.timeLeft=e,this.btnWidth.rise=0,this.btnWidth.fall=0,s=setInterval(()=>{if(this.timeLeft==0)this.timeLeft=null,this.btnWidth.rise=0,this.btnWidth.fall=0,this.obj=t,this.gameResult(),clearInterval(s);else{let a=Number(Date.now()/1e3),n=Number(this.marketStore.bestAsk);t.push({time:a,value:n}),this.areaSeries.update({time:a,value:n}),this.OrderType==1?this.btnWidth.rise=(Number(this.btnWidth.rise)+100/e).toFixed(2):this.btnWidth.fall=(Number(this.btnWidth.fall)+100/e).toFixed(2),this.timeLeft=this.timeLeft-1}},1e3)},gameResult(){axios.post("/user/binary/"+this.type+"/result",{tradeLogId:this.tradeLogId,currency:this.currency,obj:this.obj}).then(e=>{e.result==1?this.$toast.success("Trade Win"):e.result==2?this.$toast.error("Trade Lose"):e.result==3?this.$toast.error("Trade Draw"):$.each(e.data,function(t,s){this.$toast.error(s)}),this.type=="practice"?this.userStore.user.practice_balance=e.balance:this.type=="trade"&&(this.wallet=e.balance)}).catch(e=>{}).finally(()=>{this.areaSeries.setData([]),this.loading=!1,this.$emit("update")})},cleanChart(){this.chart.removeSeries(this.areaSeries),this.chart=null,this.createChart()},SetOrderType(e){this.OrderType=e},SetOrderTime(e,t,s){this.OrderTimeUnit=e,this.min_time=t,this.max_time=s},secondCount(){if(this.OrderTimeUnit=="Sec")return this.time;if(this.OrderTimeUnit=="Min")return this.time*60;if(this.OrderTimeUnit=="Hour")return this.time*60*60},fetchData(){axios.post("/user/fetch/binary/trade/wallet",{currency:this.currency}).then(e=>{this.wallet=e.wallet})},createWallet(e){axios.post("/user/wallet/store",{type:"funding",symbol:e}).then(t=>{this.fetchData(e),this.$toast[t.type](t.message)}).catch(t=>{this.$toast.error(t.response.data)}).finally(()=>{})},isActive(e){return this.activeItem===e},setActive(e){this.activeItem=e},createChart(){var e=document.getElementById("charta");this.chart=LightweightCharts.createChart(e,{width:600,height:300,layout:{textColor:"#d1d4dc",background:{color:"#111827"}},grid:{vertLines:{color:"rgba(42, 46, 57, 0)"},horzLines:{color:"rgba(42, 46, 57, 0)"}},rightPriceScale:{scaleMargins:{top:.3,bottom:.25}},crosshair:{vertLine:{width:5,color:"rgba(224, 227, 235, 0.1)",style:0},horzLine:{visible:!1,labelVisible:!1}},timeScale:{timeVisible:!0,secondsVisible:!0,tickMarkFormatter:t=>{const s=LightweightCharts.isBusinessDay(t)?t.minute:new Date(t*1e3).getUTCMinutes();return String(s)}}}),this.chart.applyOptions({layout:{backgroundColor:"#111827"}}),new ResizeObserver(t=>{if(t[0].target!==e)return;const s=t[0].contentRect;this.chart.applyOptions({width:s.width})}).observe(e),this.chart.timeScale().fitContent(),this.areaSeries=this.chart.addAreaSeries({topColor:"rgba(38, 198, 218, 0.56)",bottomColor:"rgba(38, 198, 218, 0.04)",lineColor:"rgba(38, 198, 218, 1)",lineWidth:2,crossHairMarkerVisible:!0,lastPriceAnimation:1}),this.areaSeries.setData([])}}},ye={class:"Order border border-gray-100 bg-white shadow dark:border-gray-700 dark:bg-gray-900"},he={class:"w-full bg-gray-200 dark:bg-gray-800"},pe={id:"myTab",class:"nf flex-cols -mb-px flex overflow-x-hidden text-center",role:"tablist"},fe={id:"orderContent",class:"px-3 py-5"},ke={class:"grid grid-cols-2 gap-5"},ve={for:"duration",class:"order-label"},_e={class:"flex"},xe=["min","max"],we={class:"relative"},Te={for:"duration",class:"order-label"},Se={class:"flex"},Oe=["min","max","step"],Ce={class:"inline-flex flex-shrink-0 items-center rounded-r-md border border-gray-300 bg-gray-100 p-2 text-center text-xs text-gray-500 hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700"},Ae={class:"order-label"},Pe={key:0,class:""},De={key:1,class:""},Fe={key:0,class:"mb-1 flex"},Le=["value"],Me={class:"opacity-75 inline-flex flex-shrink-0 items-center rounded-r-md border border-gray-300 bg-gray-100 p-2 text-center text-xs text-gray-500 hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700"},Ve={key:1,class:"mb-1 flex"},$e={key:0},We=["value"],Ie={class:"inline-flex flex-shrink-0 items-center rounded-r-md border border-gray-300 bg-gray-100 p-2 text-center text-xs text-gray-500 hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700"},Be={type:"submit",class:"btn btn-success btn-sm"},Ue={class:"order-label"},Re={class:""},Ee={class:"mb-1 flex"},je=["value"],Ne=["disabled"],ze={key:0},He={key:1,class:"w-full rounded-sm bg-gray-200 dark:bg-gray-700"},qe=["disabled"],Ye={key:0},Ke={key:1,class:"w-full rounded-sm bg-gray-200 dark:bg-gray-700"};function Ge(e,t,s,a,n,u){const f=g("time-dropdown");return o(),l("div",ye,[r("div",he,[r("ul",pe,[r("li",null,[r("a",{id:"riseFall-tab",class:v(["inline-block py-2 pl-3 pr-4 text-xs font-medium",u.isActive("riseFall")?"border-gray-300 bg-white text-gray-700 dark:bg-gray-900 dark:text-gray-300":"cursor-pointer border-transparent bg-gray-200 text-gray-400 hover:border-gray-300 hover:bg-gray-300 hover:text-gray-600 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-gray-300"]),type:"button",role:"tab","aria-controls":"riseFall","aria-selected":"false",onClick:t[0]||(t[0]=O(h=>u.setActive("riseFall"),["prevent"]))},i(e.$t("Rise/Fall")),3)])])]),r("div",fe,[r("div",{id:"riseFall",class:v(u.isActive("riseFall")?"":"hidden")},[r("form",{id:"Order",onSubmit:t[6]||(t[6]=O(h=>u.Order(),["prevent"]))},[r("div",ke,[r("div",null,[r("label",ve,i(e.$t("Duration")),1),r("div",_e,[B(r("input",{"onUpdate:modelValue":t[1]||(t[1]=h=>n.time=h),type:"number",class:"block w-full rounded-l-md border border-gray-300 bg-gray-50 p-2 text-xs text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500",min:n.min_time,max:n.max_time,required:"",id:"duration",placeholder:"Time"},null,8,xe),[[U,n.time]]),r("div",we,[c(f,{limit:s.limit,onSetOrderTime:u.SetOrderTime},null,8,["limit","onSetOrderTime"])])])]),r("div",null,[r("label",Te,i(e.$t("Amount")),1),r("div",Se,[B((o(),l("input",{key:s.limit,"onUpdate:modelValue":t[2]||(t[2]=h=>n.amount=h),type:"number",class:"block w-full rounded-l-md border border-gray-300 bg-gray-50 p-2 text-xs text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500",min:s.limit&&s.limit.min_amount?s.limit.min_amount:"0.00000001",max:s.limit&&s.limit.max_amount?s.limit.max_amount:"1000000",step:s.limit&&s.limit.min_amount?s.limit.min_amount:"0.00000001",required:"",placeholder:"Amount","aria-label":"Amount (to the nearest dollar)"},null,8,Oe)),[[U,n.amount]]),r("span",Ce,i(n.currency),1)])]),r("div",null,[r("label",Ae,[s.type=="practice"?(o(),l("a",Pe,i(e.$t("Practice Wallet")),1)):(o(),l("a",De,i(e.$t("Wallet")),1))]),s.type=="practice"?(o(),l("div",Fe,[(o(),l("input",{key:a.userStore.user,type:"number",class:"opacity-75 block w-full rounded-l-md border border-gray-300 bg-gray-50 p-2 text-xs text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500",value:a.userStore.user?a.userStore.user.practice_balance:0,readonly:"","aria-label":"Amount (to the nearest dollar)"},null,8,Le)),r("span",Me,i(n.currency),1)])):(o(),l("div",Ve,[n.wallet!==null?(o(),l("div",$e,[(o(),l("input",{key:n.wallet,type:"number",class:"opacity-75 block w-full rounded-l-md border border-gray-300 bg-gray-50 p-2 text-xs text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500",value:n.wallet,readonly:"","aria-label":"Amount (to the nearest dollar)"},null,8,We)),r("span",Ie,i(n.currency),1)])):(o(),l("form",{key:1,onSubmit:t[3]||(t[3]=O(h=>u.createWallet(n.currency),["prevent"]))},[r("button",Be,i(e.$t("Create Wallet")),1)],32))]))]),r("div",null,[r("label",Ue,[r("a",Re,i(e.$t("Profit")),1)]),r("div",Ee,[r("input",{type:"number",class:"opacity-75 block w-full rounded-l-md border border-gray-300 bg-gray-50 p-2 text-xs text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500",value:u.profitComputed,readonly:""},null,8,je),t[7]||(t[7]=r("span",{class:"opacity-75 inline-flex flex-shrink-0 items-center rounded-r-md border border-gray-300 bg-gray-100 p-2 text-center text-xs text-gray-500 hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700"},"%",-1))])]),(o(),l("button",{key:a.marketStore.bestAsk+n.btnWidth.rise,class:v(["btn flex items-center justify-center",a.marketStore.bestAsk==null||n.loading?"rounded-md border border-gray-700 focus:outline-none disabled:opacity-75":"btn-outline-success"]),type:"submit",disabled:a.marketStore.bestAsk==null||n.loading,onClick:t[4]||(t[4]=h=>u.SetOrderType(1))},[t[8]||(t[8]=r("i",{class:"bi bi-graph-up mr-2"},null,-1)),n.btnWidth.rise==0?(o(),l("span",ze,i(e.$t("Rise")),1)):(o(),l("div",He,[r("div",{class:"rounded-sm bg-green-600 p-0.5 text-center text-xs font-medium leading-none text-blue-100",style:H("width:"+n.btnWidth.rise+"%")},i(n.btnWidth.rise)+"% ",5)]))],10,Ne)),(o(),l("button",{key:a.marketStore.bestAsk+n.btnWidth.fall,class:v(["btn flex items-center justify-center",a.marketStore.bestAsk==null||n.loading?"rounded-md border border-gray-700 focus:outline-none disabled:opacity-75":"btn-outline-danger"]),type:"submit",disabled:a.marketStore.bestAsk==null||n.loading,onClick:t[5]||(t[5]=h=>u.SetOrderType(2))},[t[9]||(t[9]=r("i",{class:"bi bi-graph-down mr-2"},null,-1)),n.btnWidth.fall==0?(o(),l("span",Ye,i(e.$t("Fall")),1)):(o(),l("div",Ke,[r("div",{class:"rounded-sm bg-red-600 p-0.5 text-center text-xs font-medium leading-none text-blue-100",style:H("width:"+n.btnWidth.fall+"%")},i(n.btnWidth.fall)+"% ",5)]))],10,qe))])],32)],2)])])}const Je=R(be,[["render",Ge]]);const Qe={components:{Marketinfo:oe,Tradingview:q(()=>z(()=>import("./Tradingview-9b250f56.js"),["assets/Tradingview-9b250f56.js","assets/bootstrap-249b0f62.js","assets/_commonjsHelpers-de833af9.js","assets/dijkstra-f906a09e.js","assets/preload-helper-f61836a9.js","assets/axios-7a713374.js","assets/bootstrap-5bde2cbd.css"])),EcoTradingview:q(()=>z(()=>import("./Tradingview-425a70f8.js"),["assets/Tradingview-425a70f8.js","assets/datafeed-d62ae98f.js","assets/_commonjsHelpers-de833af9.js","assets/market-8356724b.js","assets/bootstrap-249b0f62.js","assets/dijkstra-f906a09e.js","assets/preload-helper-f61836a9.js","assets/axios-7a713374.js","assets/bootstrap-5bde2cbd.css"])),Order:Je,Orderbook:ie,Markets:ne,Trades:de,toDate:re,toMoney:te,Filter:ae,Col:se},setup(){const e=Y(),t=K(),s=J(),a=T(null),n=T([]),u=T([]),f=window.gnl,h=window.ext,C=window.provider,x=s.params.type,A=T("open-orders"),F=T(1),L=T(1),M={proxy:f.cors,options:{tradesLimit:10},newUpdates:!0,timeout:2e4};t.exchange=new ccxt.pro[C](M);const p=s.params.symbol,y=s.params.currency,V=async()=>{t.markets.length===0&&await t.fetch_markets(),t.market=t.markets[y][p+"/"+y]};t.market||V(),Q(()=>({type:x,symbol:p,currency:y}),async(k,Vt)=>{await t.exchange.close(),document.getElementById("favicon").href="/assets/images/logoIcon/favicon.ico";const E=document.getElementById("asks"),j=document.getElementById("bids"),N=document.getElementById("tradeTable");E!==null&&(E.innerHTML=""),j!==null&&(j.innerHTML=""),N!==null&&(N.innerHTML="")},{deep:!0});const w=()=>{axios.post("/user/fetch/binary/"+x+"/"+p+"/"+y).then(k=>{a.value=k.provide,n.value=k.limit})},P=()=>{axios.post("/user/fetch/binary/"+x+"/orders").then(k=>{u.value=k.orders})},W=k=>A.value===k,m=k=>{A.value=k},d=X();async function G(){plat.kyc.kyc_status==1&&Number(plat.kyc.binary_trading_restriction)===1&&s.params.type!=="practice"&&(e.user||await e.fetch(),e.user.kyc_application||d.push("/identity"),e.user.kyc_application&&e.user.kyc_application.level<2&&e.user.kyc_application.status!=="approved"&&d.push("/identity"))}return Z(()=>{G(),w(),P()}),{userStore:e,marketStore:t,type:x,currency:p,pair:y,activeItem:"open-orders",orders:u,provide:a,limit:n,currentPage:F,totalPages:L,filters:{symbol:{value:"",keys:["symbol"]}},fetchOrders:P,isActive:W,setActive:m,fetchData:w,gnl:f,ext:h,provider:C}}},Xe={style:{"font-family":"BinancePlex, Arial, sans-serif !important"}},Ze={class:"containered",style:{margin:"-18px -20px 3px -20px"}},et={id:"creatable",class:"Chart border border-gray-100 bg-white shadow dark:border-gray-700 dark:bg-gray-800"},tt={class:"border border-gray-100 bg-white shadow dark:border-gray-700 dark:bg-gray-900",style:{margin:"0 -20px"}},rt={class:"h-full w-full bg-gray-200 dark:bg-gray-800"},at={class:"nf flex-cols -mb-px flex overflow-x-hidden text-center",role:"tablist"},st={id:"ordersContent"},ot={class:"mb-4 flex items-center justify-between px-3 text-right"},it={class:"font-medium text-start"},nt={class:"flex items-center justify-end space-x-2 w-48"},lt={class:"overflow-x-auto"},dt={class:"bg-gray-100 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"},ct={"data-label":"Date",class:"pl-2"},ut={"data-label":"Symbol"},gt={"data-label":"Amount"},mt={"data-label":"Profit"},bt={key:0,class:"badge bg-success"},yt={key:1,class:"badge bg-danger"},ht={key:2,class:"badge bg-warning"},pt={key:3,class:"badge bg-warning"},ft={"data-label":"High/Low"},kt={key:0,class:"badge bg-success"},vt={key:1,class:"badge bg-danger"},_t={"data-label":"Result"},xt={key:0,class:"badge bg-success"},wt={key:1,class:"badge bg-danger"},Tt={key:2,class:"badge bg-warning"},St={key:3,class:"badge bg-warning"},Ot={"data-label":"Status"},Ct={key:0,class:"badge bg-primary"},At={key:1,class:"badge bg-success"},Pt={key:1,class:"border-b bg-white dark:border-gray-700 dark:bg-gray-800"},Dt={colspan:"100%",class:"py-4 px-6"},Ft={class:"sr-only"},Lt={class:"sr-only"};function Mt(e,t,s,a,n,u){const f=g("Marketinfo"),h=g("Orderbook"),C=g("Markets"),x=g("Trades"),A=g("EcoTradingview"),F=g("Tradingview"),L=g("Order"),M=g("Filter"),p=g("Col"),y=g("VTh"),V=g("toDate"),w=g("toMoney"),P=g("VTable"),W=g("VTPagination");return o(),l("div",Xe,[r("div",Ze,[(o(),S(f,{key:e.$route.params.symbol+e.$route.params.currency+"marketinfo"})),(o(),S(h,{key:e.$route.params.symbol+e.$route.params.currency+"orderbook"})),c(C,{style:{"overflow-y":"auto","overflow-x":"hidden"},type:"binary",subtype:a.type},null,8,["subtype"]),(o(),S(x,{key:e.$route.params.symbol+e.$route.params.currency+"trades",style:{"overflow-y":"auto","overflow-x":"hidden"}})),r("div",et,[a.ext.eco==1&&a.provider!="coinbasepro"?(o(),S(A,{key:e.$route.params.symbol+e.$route.params.currency+"eco"})):(o(),l(I,{key:1},[a.provide!=null?(o(),S(F,{key:e.$route.params.symbol+e.$route.params.currency+"tradingview",provide:a.provide},null,8,["provide"])):D("",!0)],64))]),(o(),S(L,{key:e.$route.params.symbol+e.$route.params.currency+"order",limit:a.limit,user:a.userStore.user,gnl:a.gnl,type:a.type,onUpdate:t[0]||(t[0]=m=>a.fetchOrders())},null,8,["limit","user","gnl","type"]))]),r("div",tt,[r("div",rt,[r("ul",at,[r("li",null,[r("a",{id:"open-orders-tab",class:v(["inline-block py-2 pl-3 pr-4 text-xs font-medium",a.isActive("open-orders")?"border-gray-300 bg-white text-gray-600 dark:bg-gray-900 dark:text-gray-300":"cursor-pointer border-transparent bg-gray-200 hover:border-gray-300 hover:bg-gray-300 hover:text-gray-600 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-gray-300"]),type:"button",role:"tab","aria-controls":"open-orders","aria-selected":"false",onClick:t[1]||(t[1]=O(m=>a.setActive("open-orders"),["prevent"]))},i(e.$t("Open Orders")),3)]),r("li",null,[r("a",{id:"closed-orders-tab",class:v(["inline-block py-2 pl-3 pr-4 text-xs font-medium",a.isActive("closed-orders")?"border-gray-300 bg-white text-gray-600 dark:bg-gray-900 dark:text-gray-300":"cursor-pointer border-transparent bg-gray-200 hover:border-gray-300 hover:bg-gray-300 hover:text-gray-600 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-gray-300"]),type:"button",role:"tab","aria-controls":"closed-orders","aria-selected":"false",onClick:t[2]||(t[2]=O(m=>a.setActive("closed-orders"),["prevent"]))},i(e.$t("Order History")),3)])])]),r("div",st,[r("div",{id:"open-orders",class:v(["px-3 pt-3",a.isActive("open-orders")?"":"hidden"]),role:"tabpanel"},t[7]||(t[7]=[r("div",{class:"flex"},[r("div",{id:"charta",class:"w-full"})],-1)]),2),r("div",{id:"closed-orders",class:v(["pt-3",a.isActive("closed-orders")?"":"hidden"]),role:"tabpanel"},[r("div",ot,[r("div",it,i(e.$t("Binary Contracts")),1),r("div",nt,[c(M,null,{default:b(()=>[B(r("input",{"onUpdate:modelValue":t[3]||(t[3]=m=>a.filters.symbol.value=m),type:"text",class:"filter-input",placeholder:"Transaction ID"},null,512),[[U,a.filters.symbol.value]])]),_:1})])]),r("div",lt,[c(P,{"current-page":a.currentPage,"onUpdate:currentPage":t[4]||(t[4]=m=>a.currentPage=m),class:"w-full text-left text-sm text-gray-500 dark:text-gray-400",data:a.orders,filters:a.filters,"page-size":10,"hide-sort-icons":!0,onTotalPagesChanged:t[5]||(t[5]=m=>a.totalPages=m)},{head:b(()=>[r("tr",dt,[c(y,{"sort-key":"created_at",class:"pl-2",scope:"col"},{default:b(()=>[c(p,{text:"Date"})]),_:1}),c(y,{"sort-key":"symbol",scope:"col"},{default:b(()=>[c(p,{text:"Symbol"})]),_:1}),c(y,{"sort-key":"hilow",scope:"col"},{default:b(()=>[c(p,{text:"Rise/Fall"})]),_:1}),c(y,{"sort-key":"amount",scope:"col"},{default:b(()=>[c(p,{text:"Amount"})]),_:1}),c(y,{"sort-key":"margin",scope:"col"},{default:b(()=>[c(p,{text:"Profit"})]),_:1}),c(y,{"sort-key":"result",scope:"col"},{default:b(()=>[c(p,{text:"Result"})]),_:1}),c(y,{"sort-key":"status",scope:"col"},{default:b(()=>[c(p,{text:"Status"})]),_:1})])]),body:b(({rows:m})=>[a.orders.length>0?(o(!0),l(I,{key:0},ee(m,d=>(o(),l("tr",{key:d.id,class:"border-b bg-white dark:border-gray-700 dark:bg-gray-800"},[r("td",ct,[c(V,{time:d.created_at},null,8,["time"])]),r("td",ut,i(d.symbol)+"/"+i(d.pair),1),r("td",gt,[c(w,{num:d.amount,decimals:"2"},null,8,["num"]),_(" "+i(d.pair),1)]),r("td",mt,[d.result==1?(o(),l("span",bt,[c(w,{num:d.margin,decimals:"2"},null,8,["num"]),_(" "+i(d.pair),1)])):d.result==2?(o(),l("span",yt,[t[8]||(t[8]=_("- ")),c(w,{num:d.amount,decimals:"2"},null,8,["num"]),_(" "+i(d.pair),1)])):d.result==3?(o(),l("span",ht,"0")):(o(),l("span",pt,i(e.$t("Pending")),1))]),r("td",ft,[d.hilow==1?(o(),l("span",kt,i(e.$t("Rise")),1)):d.hilow==2?(o(),l("span",vt,i(e.$t("Fall")),1)):D("",!0)]),r("td",_t,[d.result==1?(o(),l("span",xt,i(e.$t("Win")),1)):d.result==2?(o(),l("span",wt,i(e.$t("Lose")),1)):d.result==3?(o(),l("span",Tt,i(e.$t("Draw")),1)):(o(),l("span",St,i(e.$t("Pending")),1))]),r("td",Ot,[d.status==0?(o(),l("span",Ct,i(e.$t("Running")),1)):d.status==1?(o(),l("span",At,i(e.$t("Complete")),1)):D("",!0)])]))),128)):(o(),l("tr",Pt,[r("td",Dt,i(e.$t("No results found!")),1)]))]),_:1},8,["current-page","data","filters"])]),c(W,{currentPage:a.currentPage,"onUpdate:currentPage":t[6]||(t[6]=m=>a.currentPage=m),class:"flex items-center justify-between p-3","aria-label":"Table navigation","total-pages":a.totalPages,"max-page-links":3,"boundary-links":!0},{firstPage:b(()=>[_(i(e.$t("First")),1)]),lastPage:b(()=>[_(i(e.$t("Last")),1)]),next:b(()=>[r("span",Ft,i(e.$t("Next")),1),t[9]||(t[9]=r("svg",{class:"h-5 w-5","aria-hidden":"true",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[r("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1))]),previous:b(()=>[r("span",Lt,i(e.$t("Previous")),1),t[10]||(t[10]=r("svg",{class:"h-5 w-5","aria-hidden":"true",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[r("path",{"fill-rule":"evenodd",d:"M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z","clip-rule":"evenodd"})],-1))]),_:1},8,["currentPage","total-pages"])],2)])])])}const er=R(Qe,[["render",Mt]]);export{er as default};