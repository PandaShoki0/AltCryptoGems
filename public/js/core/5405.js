"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[5405],{5405:(t,a,s)=>{s.r(a),s.d(a,{default:()=>c});const n={name:"Stake",props:["coin","wallet"],components:{},data:function(){return{amount:0,loading:!1}},methods:{Stake:function(){var t=this;this.loading=!0,this.$http.post("/user/staking/store",{symbol:this.coin.symbol,coin_id:this.coin.id,amount:this.amount}).then((function(a){t.$toast[a.data.type](a.data.message),t.$emit("Staked")})).catch((function(a){t.$toast.error(a.response.data)})).finally((function(){t.loading=!1,$("#subscribeModal").modal("hide")}))}},created:function(){},mounted:function(){},destroyed:function(){}};var i=s(1900);const o={name:"StakeCanel",props:["coin"],components:{},data:function(){return{loading:!1}},methods:{CancelStake:function(){var t=this;this.loading=!0,this.$http.post("/user/staking/cancel",{symbol:this.coin.symbol,coin_id:this.coin.id}).then((function(a){t.$toast[a.data.type](a.data.message),t.$emit("Staked")})).catch((function(a){t.$toast.error(a.response.data)})).finally((function(){t.loading=!1,$("#cancelModal").modal("hide")}))}},created:function(){},mounted:function(){},destroyed:function(){}};const e={name:"StakeClaim",props:["coin"],components:{},data:function(){return{loading:!1}},methods:{ClaimStake:function(){var t=this;this.loading=!0,this.$http.post("/user/staking/claim",{symbol:this.coin.symbol,coin_id:this.coin.id}).then((function(a){t.$toast[a.data.type](a.data.message),t.$emit("Staked")})).catch((function(a){t.$toast.error(a.response.data)})).finally((function(){t.loading=!1,$("#claimModal").modal("hide")}))}},created:function(){},mounted:function(){},destroyed:function(){}};const l={props:["user"],components:{Stake:(0,i.Z)(n,(function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"modal modal-slide-in fade",attrs:{id:"subscribeModal"}},[s("div",{staticClass:"modal-dialog sidebar-sm"},[s("form",{staticClass:"add-new-record modal-content pt-0",on:{submit:function(a){return a.preventDefault(),t.Stake()}}},[s("button",{staticClass:"btn-close",attrs:{type:"button","data-bs-dismiss":"modal","aria-label":"Close"}},[t._v("\n                ×\n            ")]),t._v(" "),s("div",{staticClass:"modal-header mb-1"},[s("h5",{staticClass:"modal-title",attrs:{id:"exampleModalLabel"}},[t._v("\n                    Staking "),s("span",[t._v(t._s(t.coin.symbol))])])]),t._v(" "),s("div",{staticClass:"modal-body flex-grow-1"},[s("div",{staticClass:"d-flex justify-content-between"},[s("label",{attrs:{for:"amount"}},[t._v("Stake Amount")]),t._v(" "),s("span",{staticClass:"text-light"},[t._v(t._s(t.wallet.balance)+" USDT")])]),t._v(" "),s("div",{staticClass:"input-group w-auto mb-1"},[s("input",{directives:[{name:"model",rawName:"v-model",value:t.amount,expression:"amount"}],staticClass:"form-control",attrs:{type:"number",step:"0.00000001",required:"",placeholder:"Amount"},domProps:{value:t.amount},on:{input:function(a){a.target.composing||(t.amount=a.target.value)}}}),t._v(" "),s("span",{staticClass:"input-group-text text-light"},[t._v(t._s(t.coin.symbol))])]),t._v(" "),s("div",{staticClass:"card bg-black"},[s("div",{staticClass:"card-body"},[s("div",{staticClass:"d-flex justify-content-between mb-1"},[s("span",[t._v("Est. apr")]),t._v(" "),s("span",{staticClass:"text-success"},[t._v(t._s(t.coin.apr)+"%")])]),t._v(" "),s("div",{staticClass:"d-flex justify-content-between mb-1"},[s("span",[t._v("staked Amount")]),t._v(" "),s("span",[t._v(t._s(t.coin.staked))])]),t._v(" "),s("div",{staticClass:"d-flex justify-content-between mb-1"},[s("span",[t._v("max Available")]),t._v(" "),s("span",[t._v(t._s(t.coin.max_stake))])]),t._v(" "),s("div",{staticClass:"d-flex justify-content-between mb-1"},[s("span",[t._v("Staking period")]),t._v(" "),s("span",[t._v(t._s(t.coin.period))]),s("span",[t._v(" Days")])]),t._v(" "),s("div",{staticClass:"d-flex justify-content-between mb-1"},[s("span",[t._v("Staking method")]),t._v(" "),s("span",[t._v(t._s(t.coin.method))])]),t._v(" "),s("div",{staticClass:"d-flex justify-content-between mb-1"},[s("span",[t._v("Coin network")]),t._v(" "),s("span",[t._v(t._s(t.coin.network))])]),t._v(" "),s("div",{staticClass:"d-flex justify-content-between mb-1"},[s("span",[t._v("Profit Distribution")]),t._v(" "),s("span",[t._v(t._s(t.coin.profit_unit))])]),t._v(" "),s("div",{staticClass:"d-flex justify-content-between"},[s("span",[t._v("Est. Daily Profits")]),t._v(" "),s("span",[t._v(t._s(t.coin.daily_profit))])])])]),t._v(" "),s("button",{staticClass:"btn btn-dark",attrs:{type:"button","data-bs-dismiss":"modal"}},[t._v("\n                    Close\n                ")]),t._v(" "),s("button",{staticClass:"btn btn-primary ms-1",attrs:{type:"submit",disabled:t.loading}},[t._v("\n                    Stake\n                ")])])])])])}),[],!1,null,null,null).exports,StakeCancel:(0,i.Z)(o,(function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"modal fade text-start",attrs:{id:"cancelModal",tabindex:"-1","aria-hidden":"true",role:"dialog"}},[s("div",{staticClass:"modal-dialog",attrs:{role:"document"}},[s("div",{staticClass:"modal-content"},[s("div",{staticClass:"modal-header"},[s("h5",{staticClass:"modal-title"},[t._v("Staking "+t._s(t.coin.symbol))]),t._v(" "),s("button",{staticClass:"btn-close",attrs:{type:"button","data-bs-dismiss":"modal","aria-label":"Close"}})]),t._v(" "),s("form",{on:{submit:function(a){return a.preventDefault(),t.CancelStake()}}},[s("div",{staticClass:"modal-body"},[s("p",[t._v("\n                        Are you sure to cancel\n                        "),s("span",{staticClass:"fw-bold"},[t._v(t._s(t.coin.symbol))]),t._v("\n                        Stake?\n                    ")])]),t._v(" "),s("div",{staticClass:"modal-footer"},[s("button",{staticClass:"btn btn-dark",attrs:{type:"button","data-bs-dismiss":"modal"}},[t._v("\n                        Close\n                    ")]),t._v(" "),s("button",{staticClass:"btn btn-danger",attrs:{type:"submit",disabled:t.loading}},[t._v("\n                        Cancel\n                    ")])])])])])])}),[],!1,null,null,null).exports,StakeClaim:(0,i.Z)(e,(function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"modal fade text-start",attrs:{id:"claimModal",tabindex:"-1","aria-hidden":"true",role:"dialog"}},[s("div",{staticClass:"modal-dialog",attrs:{role:"document"}},[s("div",{staticClass:"modal-content"},[s("div",{staticClass:"modal-header"},[s("h5",{staticClass:"modal-title"},[t._v("Staking "+t._s(t.coin.symbol))]),t._v(" "),s("button",{staticClass:"btn-close",attrs:{type:"button","data-bs-dismiss":"modal","aria-label":"Close"}})]),t._v(" "),s("form",{on:{submit:function(a){return a.preventDefault(),t.ClaimStake()}}},[s("div",{staticClass:"modal-body"},[s("p",[t._v("\n                        Are you sure to claim\n                        "),s("span",{staticClass:"fw-bold"},[t._v(t._s(t.coin.symbol))]),t._v("\n                        Stake?\n                    ")])]),t._v(" "),s("div",{staticClass:"modal-footer"},[s("button",{staticClass:"btn btn-dark",attrs:{type:"button","data-bs-dismiss":"modal"}},[t._v("\n                        Close\n                    ")]),t._v(" "),s("button",{staticClass:"btn btn-success",attrs:{type:"submit",disabled:t.loading}},[t._v("\n                        Claim\n                    ")])])])])])])}),[],!1,null,null,null).exports},data:function(){return{coins:[],stake_coin:[],coinlogs:null,assets:[],last_profit:[],total_profit:[],wallet:[],currency:[]}},methods:{goBack:function(){window.history.length>1?this.$router.go(-1):this.$router.push("/")},fetchData:function(){var t=this;this.$http.post("/user/fetch/staking").then((function(a){t.coins=a.data.coins,t.coinlogs=a.data.coinlogs,t.assets=a.data.assets,t.last_profit=a.data.last_profit,t.total_profit=a.data.total_profit,t.wallet=a.data.wallet,t.currency=a.data.currency})).catch((function(t){"nokyc"==t.response.data.message&&(window.location.href="/user/kyc")}))}},created:function(){this.fetchData()},mounted:function(){},destroyed:function(){}};const c=(0,i.Z)(l,(function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",[s("div",{staticClass:"card bg-black",staticStyle:{"background-image":"url('/assets/images/staking/bg/banner.gif'"}},[s("div",{staticClass:"card-body"},[s("div",{staticClass:"row"},[t._m(0),t._v(" "),s("div",{staticClass:"col-lg-3 col-md-4 col-sm-12 col-12"},[s("div",{staticClass:"card shadow",staticStyle:{"border-top":"6px solid #2dbd96","background-color":"#000000db !important","border-bottom-right-radius":"10px","border-bottom-left-radius":"10px"}},[s("div",{staticClass:"card-body"},[s("div",{staticClass:"row"},[s("div",{staticClass:"col"},[s("div",[t._v("Assets (USDT)")]),t._v(" "),s("div",[t._v(t._s(t.assets))])])]),t._v(" "),s("div",{staticClass:"row mt-1"},[s("div",{staticClass:"col"},[s("div",[t._v("Yesterday Profit (USDT)")]),t._v(" "),s("div",[t._v(t._s(t.last_profit))])]),t._v(" "),s("div",{staticClass:"col"},[s("div",[t._v("Total Profit (USDT)")]),t._v(" "),s("div",[t._v(t._s(t.total_profit))])])])]),t._v(" "),s("router-link",{staticClass:"card-footer btn",attrs:{to:"/staking/logs"}},[s("span",[t._v("View More ")]),s("i",{staticClass:"bi bi-chevron-right"})])],1)])])])]),t._v(" "),s("div",{staticClass:"row"},[s("div",{staticClass:"table-responsive"},[s("table",{staticClass:"table"},[t._m(1),t._v(" "),s("tbody",[null!=t.coins?t._l(t.coins,(function(a,n){return s("tr",{key:n},[s("td",{attrs:{"data-label":"Coin"}},[s("div",{staticClass:"d-flex align-items-center"},[s("v-lazy-image",{staticClass:"avatar-content me-1",attrs:{width:32,src:a.icon?"/assets/images/staking/"+a.icon:"/assets/images/cryptoCurrency/"+a.symbol+".png"}}),t._v(" "),s("span",{staticClass:"fw-bold me-1 fs-3"},[t._v(t._s(a.symbol))]),t._v(" "),s("span",{staticClass:"text-mute fs-5"},[t._v(t._s(a.title))])],1)]),t._v(" "),s("td",{attrs:{"data-label":"APR"}},[s("span",{staticClass:"text-success fw-bold fs-4"},[t._v(t._s(a.profit)+"%")])]),t._v(" "),s("td",{attrs:{"data-label":"Duration (Days)"}},[s("span",{staticClass:"text-warning fw-bold fs-4"},[t._v(t._s(a.period))])]),t._v(" "),s("td",{attrs:{"data-label":"Minimum Stake Amount"}},[s("span",{staticClass:"fs-4"},[t._v(t._s(t._f("toMoney")(a.min_stake,4))+"\n                                    "+t._s(a.symbol))])]),t._v(" "),s("td",{attrs:{"data-label":"Action"}},[null!=t.coinlogs?s("div",[null!=t.coinlogs[a.id]?s("div",{key:t.coinlogs[a.id].status},[null!=t.coinlogs[a.id].status?[2!=t.coinlogs[a.id].status?[s("button",{staticClass:"btn btn-warning",attrs:{type:"button","data-bs-toggle":"modal","data-bs-target":"#subscribeModal"},on:{click:function(s){t.stake_coin=a}}},[t._v("\n                                                    Stake\n                                                ")])]:t._e(),t._v(" "),1==t.coinlogs[a.id].status?s("button",{staticClass:"btn btn-danger",attrs:{type:"button","data-bs-toggle":"modal","data-bs-target":"#cancelModal"},on:{click:function(s){t.stake_coin=a}}},[t._v("\n                                                Cancel\n                                            ")]):2==t.coinlogs[a.id].status?s("button",{staticClass:"btn btn-success",attrs:{type:"button","data-bs-toggle":"modal","data-bs-target":"#claimModal"},on:{click:function(s){t.stake_coin=a}}},[t._v("\n                                                Claim Profit\n                                            ")]):t._e()]:t._e()],2):s("button",{staticClass:"btn btn-warning",attrs:{type:"button","data-bs-toggle":"modal","data-bs-target":"#subscribeModal"},on:{click:function(s){t.stake_coin=a}}},[t._v("\n                                        Stake\n                                    ")])]):s("button",{staticClass:"btn btn-warning",attrs:{type:"button","data-bs-toggle":"modal","data-bs-target":"#subscribeModal"},on:{click:function(s){t.stake_coin=a}}},[t._v("\n                                    Stake\n                                ")])])])})):[t._m(2)]],2)])])]),t._v(" "),null!=t.wallet?s("Stake",{key:t.wallet.balance,attrs:{coin:t.stake_coin,wallet:t.wallet},on:{Staked:function(a){return t.fetchData()}}}):t._e(),t._v(" "),s("StakeCancel",{attrs:{coin:t.stake_coin},on:{Staked:function(a){return t.fetchData()}}}),t._v(" "),s("StakeClaim",{attrs:{coin:t.stake_coin},on:{Staked:function(a){return t.fetchData()}}})],1)}),[function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"col-lg-9 col-md-8 col-sm-12 col-12"},[s("div",{staticClass:"card",staticStyle:{"background-color":"#000000db !important"}},[s("div",{staticClass:"card-body"},[s("h1",[t._v("Staking")]),t._v(" "),s("h3",[t._v("\n                                Earn stable profits with professional asset\n                                management\n                            ")])])])])},function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("thead",{staticClass:"table-dark"},[s("tr",[s("th",{attrs:{scope:"col"}},[t._v("Coin")]),t._v(" "),s("th",{attrs:{scope:"col"}},[t._v("APR")]),t._v(" "),s("th",{attrs:{scope:"col"}},[t._v("Duration (Days)")]),t._v(" "),s("th",{attrs:{scope:"col"}},[t._v("Minimum Stake Amount")]),t._v(" "),s("th",{attrs:{scope:"col"}},[t._v("Action")])])])},function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("tr",[s("td",{staticClass:"text-muted text-center",attrs:{colspan:"100%"}},[t._v("\n                                No Staking Coin Found\n                            ")])])}],!1,null,null,null).exports}}]);