import{V as h,_ as u,o as a,c as i,a as t,n as c,F as g,d as f,b,t as l,B as p,C as _}from"./bootstrap-9979bcf7.js";import"./_commonjsHelpers-de833af9.js";import"./browser-77dd377d.js";import"./preload-helper-f61836a9.js";import"./axios-4a70c6fc.js";const m=h("news",{state:()=>({news:[]}),actions:{async fetch(){let e=await fetch("https://min-api.cryptocompare.com/data/v2/news/?lang=EN");if(e.ok){let s=await e.json();this.news=s.Data}else console.log("Fetch Error :-S",e.status)}},persist:!0});const w=function(e){e=0|(Date.now()-new Date(e*1e3))/1e3;var s,r={sec:60,min:60,hr:24,day:7,week:4.35,month:12,year:1e4},o;for(s in r)if(o=e%r[s],!(e=0|e/r[s]))return o+" "+(o-1?s+"s":s)+" ago"},x={filters:{tags:function(e){return e?e.split("|").join(", "):""}},props:["rightbarCollapsed"],setup(){return{newsStore:m()}},data(){return{interval:null}},watch:{rightbarCollapsed(e,s){!e&&s?(this.getNewsIfEmpty(),this.setupInterval()):clearInterval(this.interval)}},created(){this.rightbarCollapsed||(this.getNewsIfEmpty(),this.setupInterval())},beforeUnmount(){clearInterval(this.interval)},methods:{getNewsIfEmpty(){this.newsStore.news.length||this.getNews()},setupInterval(){this.interval||(this.interval=setInterval((function(){this.getNewsIfEmpty()}).bind(this),3e5))},truncateText(e){if(e.length>135){const s=e.substring(0,135);return s.substring(0,s.lastIndexOf(" "))+" ..."}else return e},async getNews(){this.newsStore.fetch()},time_since(e){return e?w(e):""}}},v=e=>(p("data-v-84b4a45a"),e=e(),_(),e),y={class:"supports-backdrop-blur:bg-white/60 flex h-full min-h-0 flex-1 flex-col border-l border-gray-200 bg-white bg-white/95 pt-0 backdrop-blur transition-colors duration-500 dark:border-slate-50/[0.06] dark:bg-transparent lg:border-slate-900/10"},k={class:"flex flex-1 flex-col overflow-x-hidden overflow-y-hidden py-3 pl-4"},I={class:"blog body-font overflow-y-auto overflow-x-hidden text-gray-700"},S={class:"mx-auto space-y-5 px-3"},C={class:"overflow-hidden rounded-lg bg-white shadow-lg"},N={class:"p-4"},E={class:"header-content inline-flex"},j=v(()=>t("div",{class:"category-badge m-1 h-4 flex-1 rounded-full bg-purple-100",style:{"max-width":"1rem"}},[t("div",{class:"m-1 h-2 w-2 rounded-full bg-purple-500"})],-1)),z={class:"category-title flex-1 flex-col text-sm"},B=["href"],D={class:"summary-post text-justify text-xs"},T=["innerHTML"],F={class:"mt-4 block rounded bg-blue-100 p-2 text-sm text-blue-500"},L={class:"text-xs"};function H(e,s,r,o,M,d){return a(),i("div",{id:"rightbar",class:c(["fixed right-0 z-40 h-full w-4 flex-shrink-0 flex-col transition-width duration-300",{"rightbar-menu-expanded":!r.rightbarCollapsed}]),style:{"z-index":"100"},"aria-label":"rightbar"},[t("div",y,[t("div",{class:"align-left fixed z-40 grid h-screen w-4 place-items-center border-r border-gray-200 shadow transition-width duration-300 hover:bg-gray-200 dark:border-slate-50/[0.06] dark:hover:bg-gray-600 lg:border-slate-900/10",onClick:s[0]||(s[0]=n=>r.rightbarCollapsed=!r.rightbarCollapsed)},[t("i",{class:c(["bi",{"bi-chevron-left":r.rightbarCollapsed,"bi-chevron-right":!r.rightbarCollapsed}])},null,2)]),t("div",k,[t("section",I,[t("div",S,[(a(!0),i(g,null,f(o.newsStore.news,n=>(a(),i("div",{key:n.id,class:"flex flex-col items-center justify-center pb-5 md:mb-0 md:w-1/3"},[t("div",C,[t("div",{class:"rounded-lg-t h-44 w-full bg-gray-300 bg-cover bg-center shadow-md",style:b("background-image: url("+n.imageurl+");")},null,4),t("div",N,[t("div",E,[j,t("div",z,l(n.source_info.name),1)]),t("div",null,[t("a",{href:n.url,target:"_blank",class:"title-post text-sm font-medium text-gray-900"},l(n.title),9,B)]),t("div",D,[t("p",{innerHTML:d.truncateText(n.body)},null,8,T),t("button",F,[t("span",L,l(d.time_since(n.published_on)),1)])])])])]))),128))])])])])],2)}const G=u(x,[["render",H],["__scopeId","data-v-84b4a45a"]]);export{G as default};