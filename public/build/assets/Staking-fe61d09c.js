import{t as W}from"./toMoney-156545ac.js";import{t as B}from"./toDate-e910adc1.js";import{F as N}from"./Filter-555cb1ad.js";import{C as F}from"./Col-7414d455.js";import{u as z}from"./staking-7813d75f.js";import{u as L}from"./user-d2ff915e.js";import{K as E}from"./flowbite-vue-19d13a06.js";import{B as K}from"./ButtonLoading-c7c15f4d.js";import{_ as R,r as k,m as q,o as i,c as d,a as t,t as e,i as g,w as l,h as _,W as P,e as p,F as x,d as M,g as u,f as b,V as Y,T as C,q as w}from"./bootstrap-2a895a5a.js";import"./_commonjsHelpers-de833af9.js";import"./browser-77dd377d.js";import"./preload-helper-f61836a9.js";import"./axios-4a70c6fc.js";const G={components:{toDate:B,toMoney:W,Filter:N,Col:F,Modal:E,ButtonLoading:K},setup(){const o=L(),n=z();return{userStore:o,stakingStore:n}},data(){return{plat,filters:{symbol:{value:"",keys:["symbol"]}},currentPage:1,totalPages:0,amount:0,selectedWallet:null,imageLoading:!0}},async created(){this.fetchData(),this.selectedWallet=this.stakingStore.wallets.find(o=>o.symbol==="USDT")||this.stakingStore.wallets[0],this.updateSelectedWallet()},methods:{async fetchData(){await this.stakingStore.fetchPublic(),await this.stakingStore.fetch()},async Stake(){await this.stakingStore.StakeNew(this.amount,this.wal)},async CancelStake(){await this.stakingStore.CancelStake()},async ClaimStake(){await this.stakingStore.ClaimStake()},updateSelectedWallet(){this.stakingStore.wallet=this.selectedWallet},async stackCall(o){if(!this.userStore.user)return window.location.href="/login";this.stakingStore.setCoin(o,"stake")}}},H={class:"card mb-5 bg-black",style:{"background-image":"url('/assets/images/staking/bg/banner.gif')"}},J={class:"card-body"},O={class:"grid gap-5 xs:grid-cols-1 md:grid-cols-3"},Q={class:"col-span-2 xs:col-span-3 md:col-span-2"},X={class:"px-2 py-2 text-center text-gray-200 dark:text-gray-200",style:{"background-color":"#000000db !important"}},Z={class:"dark:text-gray-20 tracking-widest text-gray-200 md:text-lg"},I={class:"col-span-1 sm:col-span-3 md:col-span-1"},$={class:"card shadow",style:{"border-top":"6px solid #2dbd96","background-color":"#000000db !important","border-bottom-right-radius":"10px","border-bottom-left-radius":"10px"}},tt={class:"card-body"},et={class:"px-2 py-2 text-center text-gray-500 dark:text-gray-400"},st={class:"text-gray-200 dark:text-gray-200"},ot={class:"flex justify-between"},nt={class:"text-center text-gray-200 dark:text-gray-200"},at={class:"text-center text-gray-200 dark:text-gray-200"},lt={class:"card-footer w-full text-center"},it=t("i",{class:"bi bi-chevron-right mr-2"},null,-1),rt={class:"my-5"},dt={class:"mb-4 items-center justify-between xs:block xs:space-y-5 sm:flex sm:space-y-0"},ct={class:"font-medium"},gt={class:"card relative overflow-x-auto"},mt={class:"bg-gray-100 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"},kt={sortKey:"min_stake",scope:"col",class:"py-3 px-6"},ut=t("th",{scope:"col",class:"py-3 px-6"},null,-1),bt={class:"py-3 px-6","data-label":"Coin"},yt={class:"flex items-center"},_t={class:"mr-2 rounded-full",width:32},pt={class:"fw-bold mr-1"},ft={class:"text-mute"},St={class:"py-3 px-6","data-label":"APR"},ht={class:"text-success fw-bold"},vt={class:"py-3 px-6","data-label":"Duration (Days)"},xt={class:"text-warning fw-bold"},Ct={class:"py-3 px-6","data-label":"Minimum Stake Amount"},wt={class:""},Pt={class:"py-3 px-6","data-label":"Action"},Mt={key:0},Dt=["onClick"],Tt=["onClick"],jt=["onClick"],Vt=["onClick"],At=["onClick"],Ut={key:1,scope:"row",class:"whitespace-nowrap py-4 px-6 font-medium text-gray-900 dark:text-white"},Wt={colspan:"100%",class:"py-4 px-6"},Bt={class:"sr-only"},Nt=t("svg",{class:"h-5 w-5","aria-hidden":"true",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[t("path",{"fill-rule":"evenodd",d:"M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z","clip-rule":"evenodd"})],-1),Ft={class:"sr-only"},zt=t("svg",{class:"h-5 w-5","aria-hidden":"true",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},[t("path",{"fill-rule":"evenodd",d:"M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z","clip-rule":"evenodd"})],-1),Lt={class:"flex items-center text-lg"},Et={class:"mr-1"},Kt={class:"mb-3"},Rt={for:"walletSelect"},qt=["value"],Yt={class:"flex justify-between"},Gt={for:"amount"},Ht={key:0,class:"text-light"},Jt={class:"input-group mb-1 w-auto"},Ot={class:"card bg-black pb-3 mt-5"},Qt={class:"card-body"},Xt={class:"mb-1 flex justify-between"},Zt={class:"text-success"},It={class:"mb-1 flex justify-between"},$t={class:"text-success"},te={class:"mb-1 flex justify-between"},ee={class:"mb-1 flex justify-between"},se={class:"mb-1 flex justify-between"},oe={class:"mb-1 flex justify-between"},ne={class:"mb-1 flex justify-between"},ae={class:"mb-1 flex justify-between"},le={class:"flex justify-between"},ie={class:"flex justify-end"},re=["disabled"],de={class:"flex items-center text-lg"},ce={class:"mr-1"},ge={class:"ml-1"},me={class:"fw-bold"},ke={class:"flex justify-end"},ue=["disabled"],be={class:"flex items-center text-lg"},ye={class:"mr-1"},_e={class:"ml-1"},pe={class:"fw-bold"},fe={class:"flex justify-end"},Se=["disabled"];function he(o,n,ve,s,m,y){const D=k("router-link"),T=k("Filter"),f=k("Col"),S=k("VTh"),j=k("toMoney"),V=k("VTable"),A=k("VTPagination"),h=k("ButtonLoading"),v=k("Modal"),U=q("lazy");return i(),d("div",null,[t("div",H,[t("div",J,[t("div",O,[t("div",Q,[t("div",X,[t("h1",null,e(o.$t("Staking")),1),t("p",Z,e(o.$t("Earn stable profits with professional asset management")),1)])]),t("div",I,[t("div",$,[t("div",tt,[t("div",et,[t("div",st,[t("div",null,e(o.$t("Assets"))+" (USDT)",1),(i(),d("div",{key:s.stakingStore.assets},e(s.stakingStore.assets),1))])]),t("div",ot,[t("div",nt,[t("div",null,e(o.$t("Yesterday Profit"))+" (USDT)",1),(i(),d("div",{key:s.stakingStore.last_profit},e(s.stakingStore.last_profit),1))]),t("div",at,[t("div",null,e(o.$t("Total Profit"))+" (USDT)",1),(i(),d("div",{key:s.stakingStore.total_profit},e(s.stakingStore.total_profit),1))])])]),t("div",lt,[g(D,{to:"/staking/logs"},{default:l(()=>[it,t("span",null,e(o.$t("View More")),1)]),_:1})])])])])])]),t("div",rt,[t("div",dt,[t("div",ct,e(o.$t("Running Contracts")),1),g(T,null,{default:l(()=>[_(t("input",{"onUpdate:modelValue":n[0]||(n[0]=r=>m.filters.symbol.value=r),type:"text",class:"filter-input",placeholder:"Symbol"},null,512),[[P,m.filters.symbol.value]])]),_:1})]),t("div",gt,[(i(),p(V,{key:s.stakingStore.coins.length,"current-page":m.currentPage,"onUpdate:currentPage":n[1]||(n[1]=r=>m.currentPage=r),class:"w-full text-left text-sm text-gray-500 dark:text-gray-400",data:s.stakingStore.coins,filters:m.filters,"page-size":10,"hide-sort-icons":!0,onTotalPagesChanged:n[2]||(n[2]=r=>m.totalPages=r)},{head:l(()=>[t("tr",mt,[g(S,{"sort-key":"symbol",scope:"col",class:"py-3 px-6"},{default:l(()=>[g(f,{text:"Coin"})]),_:1}),g(S,{"sort-key":"profit",scope:"col",class:"py-3 px-6"},{default:l(()=>[g(f,{text:"Staking Profit"})]),_:1}),g(S,{"sort-key":"duration",scope:"col",class:"py-3 px-6"},{default:l(()=>[g(f,{text:"Duration (Days)"})]),_:1}),t("th",kt,e(o.$t("Minimum Stake Amount")),1),ut])]),body:l(({rows:r})=>[s.stakingStore.coins.length>0?(i(!0),d(x,{key:0},M(r,a=>(i(),d("tr",{key:a.id,class:"border-b bg-white dark:border-gray-700 dark:bg-gray-800"},[t("td",bt,[t("div",yt,[_(t("img",_t,null,512),[[U,a.icon?"/assets/images/staking/"+a.icon:"/assets/images/cryptoCurrency/"+a.symbol+".png"]]),t("span",pt,e(a.symbol),1),t("span",ft,"("+e(a.title)+")",1)])]),t("td",St,[t("span",ht,e(a.profit)+"%",1)]),t("td",vt,[t("span",xt,e(a.period),1)]),t("td",Ct,[t("span",wt,[g(j,{num:a.min_stake,decimals:"4"},null,8,["num"]),u(" "+e(a.symbol),1)])]),t("td",Pt,[s.stakingStore.coinlogs!=null?(i(),d("div",Mt,[s.stakingStore.coinlogs[a.id]!=null?(i(),d("div",{key:s.stakingStore.coinlogs[a.id].status,class:"space-x-2 space-y-2"},[s.stakingStore.coinlogs[a.id].status!=null?(i(),d(x,{key:0},[s.stakingStore.coinlogs[a.id].status!=2?(i(),d("button",{key:0,type:"button",class:"btn btn-warning btn-sm",onClick:c=>s.stakingStore.setCoin(a,"stake")},e(o.$t("Stake")),9,Dt)):b("",!0),m.plat.staking.cancel_stake==1&&s.stakingStore.coinlogs[a.id].status==1?(i(),d("button",{key:1,type:"button",class:"btn btn-danger btn-sm",onClick:c=>s.stakingStore.setCoin(a,"cancel")},e(o.$t("Cancel")),9,Tt)):s.stakingStore.coinlogs[a.id].status==2?(i(),d("button",{key:2,type:"button",class:"btn btn-success btn-sm",onClick:c=>s.stakingStore.setCoin(a,"claim")},e(o.$t("Claim Profit")),9,jt)):b("",!0)],64)):b("",!0)])):(i(),d("button",{key:1,type:"button",class:"btn btn-warning btn-sm",onClick:c=>y.stackCall(a)},e(o.$t("Stake")),9,Vt))])):(i(),d("button",{key:1,type:"button",class:"btn btn-warning btn-sm",onClick:c=>s.stakingStore.setCoin(a,"stake")},e(o.$t("Stake")),9,At))])]))),128)):(i(),d("tr",Ut,[t("td",Wt,e(o.$t("No results found!")),1)]))]),_:1},8,["current-page","data","filters"]))]),g(A,{currentPage:m.currentPage,"onUpdate:currentPage":n[3]||(n[3]=r=>m.currentPage=r),class:"float-right flex items-center justify-between pt-4","aria-label":"Table navigation","total-pages":m.totalPages,"max-page-links":3,"boundary-links":!0},{firstPage:l(()=>[u(e(o.$t("First")),1)]),lastPage:l(()=>[u(e(o.$t("Last")),1)]),next:l(()=>[t("span",Bt,e(o.$t("Next")),1),Nt]),previous:l(()=>[t("span",Ft,e(o.$t("Previous")),1),zt]),_:1},8,["currentPage","total-pages"])]),t("form",{onSubmit:n[9]||(n[9]=w(r=>y.Stake(),["prevent"]))},[g(C,{name:"modal",mode:"out-in","enter-active-class":"modal-enter-active","leave-active-class":"modal-leave-active"},{default:l(()=>[s.stakingStore.isShowModal.stake?(i(),p(v,{key:s.stakingStore.coin.length,size:"lg",onClose:n[8]||(n[8]=r=>s.stakingStore.closeModal("stake"))},{header:l(()=>[t("div",Lt,[t("span",Et,e(o.$t("Staking")),1),t("span",null,e(s.stakingStore.coin.symbol),1)])]),body:l(()=>{var r,a;return[t("div",Kt,[t("label",Rt,e(o.$t("Select Wallet")),1),_(t("select",{id:"walletSelect","onUpdate:modelValue":n[4]||(n[4]=c=>m.selectedWallet=c),onChange:n[5]||(n[5]=(...c)=>y.updateSelectedWallet&&y.updateSelectedWallet(...c)),class:"form-select"},[(i(!0),d(x,null,M(s.stakingStore.wallets,c=>(i(),d("option",{key:c.id,value:c},e(c.symbol)+" - "+e(c.type)+" ("+e(Number(c.balance).toFixed(2))+" "+e(c.symbol)+") ",9,qt))),128))],544),[[Y,m.selectedWallet]])]),t("div",Yt,[t("label",Gt,e(o.$t("Stake Amount")),1),s.stakingStore.wallet!=null?(i(),d("span",Ht,e(Number((a=(r=s.stakingStore)==null?void 0:r.wallet)==null?void 0:a.balance).toFixed(2))+" "+e(s.stakingStore.wallet.symbol),1)):b("",!0)]),t("div",Jt,[_(t("input",{"onUpdate:modelValue":n[6]||(n[6]=c=>m.amount=c),type:"number",step:"0.00000001",required:"",min:"0",placeholder:"Amount"},null,512),[[P,m.amount]]),t("span",null,e(s.stakingStore.coin.symbol),1)]),t("div",Ot,[t("div",Qt,[t("div",Xt,[t("span",null,e(o.$t("Price")),1),t("span",Zt,e(s.stakingStore.coin.price)+" USDT",1)]),t("div",It,[t("span",null,e(o.$t("Est. Annual Profit Rate")),1),t("span",$t,e(s.stakingStore.coin.apr)+"%",1)]),t("div",te,[t("span",null,e(o.$t("Staked Amount")),1),t("span",null,e(s.stakingStore.coin.staked),1)]),t("div",ee,[t("span",null,e(o.$t("Max Available")),1),t("span",null,e(s.stakingStore.coin.max_stake),1)]),t("div",se,[t("span",null,e(o.$t("Staking period")),1),t("span",null,e(s.stakingStore.coin.period)+" "+e(o.$t("Days")),1)]),t("div",oe,[t("span",null,e(o.$t("Staking Method")),1),t("span",null,e(s.stakingStore.coin.method),1)]),t("div",ne,[t("span",null,e(o.$t("Coin Network")),1),t("span",null,e(s.stakingStore.coin.network),1)]),t("div",ae,[t("span",null,e(o.$t("Profit Distribution")),1),t("span",null,e(s.stakingStore.coin.profit_unit),1)]),t("div",le,[t("span",null,e(o.$t("Est. Daily Profits")),1),t("span",null,e(s.stakingStore.coin.daily_profit),1)])])])]}),footer:l(()=>[t("div",ie,[t("button",{type:"submit",disabled:s.stakingStore.loading,class:"btn btn-outline-primary mr-3"},[g(h,{loading:s.stakingStore.loading,text:"Stake"},null,8,["loading"])],8,re),t("button",{type:"button",class:"btn btn-outline-secondary",onClick:n[7]||(n[7]=r=>s.stakingStore.closeModal("stake"))},e(o.$t("Close")),1)])]),_:1})):b("",!0)]),_:1})],32),t("form",{onSubmit:n[12]||(n[12]=w(r=>y.CancelStake(),["prevent"]))},[g(C,{name:"modal",mode:"out-in","enter-active-class":"modal-enter-active","leave-active-class":"modal-leave-active"},{default:l(()=>[s.stakingStore.isShowModal.cancel?(i(),p(v,{key:s.stakingStore.coin.length,size:"lg",onClose:n[11]||(n[11]=r=>s.stakingStore.closeModal("cancel"))},{header:l(()=>[t("div",de,[t("span",ce,e(o.$t("Cancel")),1),t("span",null,e(s.stakingStore.coin.symbol),1),t("span",ge,e(o.$t("Staking")),1)])]),body:l(()=>[t("p",null,[u(e(o.$t("Are you sure to cancel"))+" ",1),t("span",me,e(s.stakingStore.coin.symbol),1),u(" "+e(o.$t("Stake"))+"? ",1)])]),footer:l(()=>[t("div",ke,[t("button",{type:"submit",disabled:s.stakingStore.loading,class:"btn btn-outline-danger mr-3"},[g(h,{loading:s.stakingStore.loading,text:"Cancel Stake"},null,8,["loading"])],8,ue),t("button",{type:"button",class:"btn btn-outline-secondary",onClick:n[10]||(n[10]=r=>s.stakingStore.closeModal("cancel"))},e(o.$t("Close")),1)])]),_:1})):b("",!0)]),_:1})],32),t("form",{onSubmit:n[15]||(n[15]=w(r=>y.ClaimStake(),["prevent"]))},[g(C,{name:"modal",mode:"out-in","enter-active-class":"modal-enter-active","leave-active-class":"modal-leave-active"},{default:l(()=>[s.stakingStore.isShowModal.claim?(i(),p(v,{key:s.stakingStore.coin.length,size:"lg",onClose:n[14]||(n[14]=r=>s.stakingStore.closeModal("claim"))},{header:l(()=>[t("div",be,[t("span",ye,e(o.$t("Cancel")),1),t("span",null,e(s.stakingStore.coin.symbol),1),t("span",_e,e(o.$t("Staking")),1)])]),body:l(()=>[t("p",null,[u(e(o.$t("Are you sure to claim"))+" ",1),t("span",pe,e(s.stakingStore.coin.symbol),1),u(" "+e(o.$t("Stake"))+"? ",1)])]),footer:l(()=>[t("div",fe,[t("button",{type:"submit",disabled:s.stakingStore.loading,class:"btn btn-outline-success mr-3"},[g(h,{loading:s.stakingStore.loading,text:"Claim Stake"},null,8,["loading"])],8,Se),t("button",{type:"button",class:"btn btn-outline-secondary",onClick:n[13]||(n[13]=r=>s.stakingStore.closeModal("claim"))},e(o.$t("Close")),1)])]),_:1})):b("",!0)]),_:1})],32)])}const Ne=R(G,[["render",he]]);export{Ne as default};