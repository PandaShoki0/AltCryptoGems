import{U as r}from"./bootstrap-2a895a5a.js";const o=r("wallet",{state:()=>({wallets:[],currencies:[],futureCurrencies:[],main_wallets:[],main_currencies:[],SelectedWallet:null,trading_wallet:0,loading:!1,isShowModal:{newWallet:!1,newMainWallet:!1,deposit:!1,withdraw:!1,transfer:!1},timer:[],mianLogs:[],depositStatus:"unpaid",interval:null,timeCountdown:30*60,tab:{deposit:null,withdraw:null},wallet:[],wallet_trx:[],addresses:{},currency:[],curr:[],dp:null,withdrawfee:null,network:null,missing:[]}),actions:{async fetch(){await axios.post("/user/fetch/wallets").then(t=>{this.wallets=t.wallets,this.currencies=t.currencies,this.futureCurrencies=t.futureCurrencies})},async fetchWallet(t,e,s){await axios.post("/user/fetch/wallet/"+t+"/"+e+"/"+s).then(a=>{this.wallet=a.wal,this.wallet_trx=a.wal_trx,this.addresses=a.addresses,this.curr=a.curr,this.currency=a.currency,this.dp=a.dp})},async fetchFutureWallet(t){await axios.get("/user/futures/wallet/"+t).then(e=>{this.wallet=e.wallet,this.wallet_trx=e.transactions})},async withdraw(t,e,s,a,l){t=="TRX"?this.network="TRC20":t=="ETH"?this.network="ERC20":t=="BSC"?this.network="BEP20":this.network=t,(provider=="binance"||provider=="binanceus")&&(this.withdrawfee=this.addresses[t].chain.withdrawFee),this.loading=!0,await axios.post("/user/wallet/withdraw",{symbol:s,recieving_address:a,memo:e,amount:l,chain:this.network,fee:this.withdrawfee}).then(i=>{$toast[i.type](i.message),this.wallet_trx=i.wallet_trx,this.fetch()}).catch(i=>{$toast.error("Something went wrong. Please try again later."),console.log(i)}).finally(()=>{this.loading=!1,this.closeModal("withdraw")})},closeModal(t){t=="newWallet"?this.isShowModal.newWallet=!1:t=="newMainWallet"?this.isShowModal.newMainWallet=!1:t=="deposit"?this.depositStatus=="pending"?$toast.error("You can't close this modal while your deposit is pending."):(this.isShowModal.deposit=!1,this.depositStatus="unpaid"):t=="withdraw"?this.isShowModal.withdraw=!1:t=="transfer"&&(this.isShowModal.transfer=!1)},showModal(t){t=="newWallet"?this.isShowModal.newWallet=!0:t=="newMainWallet"?this.isShowModal.newMainWallet=!0:t=="deposit"?this.isShowModal.deposit=!0:t=="withdraw"?this.isShowModal.withdraw=!0:t=="transfer"&&(this.isShowModal.transfer=!0)},async create(t,e=null){this.loading=!0;let s=e=="futures"?"/user/futures/wallet/store":"/user/wallet/store";axios.post(s,{type:e??this.type,symbol:t}).then(a=>{this.fetch(),$toast[a.type](a.message)}).catch(a=>{$toast.error(a.response.data.message)}).finally(()=>{this.loading=!1})},async make_default(t,e=null){this.loading=!0;let s=e=="futures"?"/user/futures/wallet/make-dafault":"/user/wallet/make-dafault";axios.post(s,{type:e??this.type,symbol:t}).then(a=>{this.fetch(),$toast.success("Made default successfully")}).catch(a=>{$toast.error(a.message)}).finally(()=>{this.loading=!1})},async fetch_main(){await axios.get("/user/eco/wallets").then(t=>{this.main_currencies=t.currencies})},async create_main(t){this.loading=!0,axios.post("/user/eco/wallet/store",{chain:t.chain,symbol:t.symbol,postfix:t.postfix,network:t.network}).then(e=>{Array.isArray(e)?e.forEach(s=>{$toast[s.type](s.message)}):$toast[e.type](e.message),this.fetch_main()}).catch(e=>{$toast.error(e.response.data.message)}).finally(()=>{this.loading=!1,this.closeModal("newMainWallet")})},async fetchMainWalletLogs(t,e){await axios.get("/user/eco/wallet/logs/"+t+"/"+e).then(s=>{s.logs.length>this.mianLogs.length&&this.fetchMainWallet(t,e),this.mianLogs=s.logs})},async fetchMainWallet(t,e){await axios.get("/user/eco/wallet/"+t+"/"+e).then(s=>{this.wallet=s.wal,this.mianLogs=s.logs,this.addresses=s.addresses,this.missing=s.missing})},async transfer(t,e,s){s>0?(this.loading=!0,await axios.post("/user/wallet/transfer",{symbol:e,amount:s,type:t}).then(a=>{$toast[a.type](a.message),this.wallet=a.wal,this.wallet_trx=a.wal_trx,this.fetch()}).catch(a=>{$toast.error(a.response.data.message)}).finally(()=>{this.loading=!1,this.closeModal("transfer")})):$toast.error("Amount should be higher than 0")},async deposit(t,e,s,a,l){this.loading=!0,await axios.post("/user/wallet/deposit",{symbol:a,recieving_address:t.address,address:e,chain:t.network}).then(i=>{this.depositStatus=i.deposit_status,$toast[i.type](i.message),i.deposit_status=="pending"&&(this.fetch(),this.startTimer(e,s,a,l))}).catch(i=>{$toast.error(i.response.data.message)}).finally(()=>{this.loading=!1})},startTimer(t,e,s,a){this.interval=setInterval(()=>{axios.get(`/user/wallet/deposit/verify/${t}`).then(l=>{l.deposit_status&&(clearInterval(this.interval),clearInterval(this.timerInterval),this.depositStatus=l.deposit_status,$toast[l.type](l.message),l.deposit_status==="completed"&&this.fetchWallet(e,s,a))})},3e4),this.timerInterval=setInterval(()=>{this.timeCountdown--,this.timeCountdown<=0&&(this.loading=!1,this.depositStatus="expired",clearInterval(this.interval),clearInterval(this.timerInterval))},1e3)},async cancelDeposit(t){await axios.get("/user/wallet/deposit/cancel/"+t).then(e=>{$toast[e.type](e.message),this.fetch()}).catch(e=>{$toast.error(e.response.data.message)}).finally(()=>{this.loading=!1,this.depositStatus="canceled",clearInterval(this.interval),clearInterval(this.timerInterval)})}},persist:!0});export{o as u};