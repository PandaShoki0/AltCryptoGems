import{_,r as g,o as a,c as r,a as e,i as n,w as l,t as c,F as p,d as u,f as h,A as m,B as y}from"./bootstrap-2a895a5a.js";import"./_commonjsHelpers-de833af9.js";import"./browser-77dd377d.js";import"./preload-helper-f61836a9.js";import"./axios-4a70c6fc.js";const b={components:{},props:[],data(){return{articles:[],category:[]}},watch:{async $route(t){t.params.slug!=null&&this.fetchCategories()}},mounted(){this.fetchCategories()},methods:{fetchCategories(){axios.get("/user/knowledge/categories/"+(this.$route.params.slug?this.$route.params.slug+"/":"")+this.$route.params.id).then(t=>{this.articles=t.articles,this.category=t.category}).catch(t=>{})}}},k=t=>(m("data-v-e347502a"),t=t(),y(),t),x={id:"knowledge-base-search"},f={class:"card knowledge-base-bg",style:{"background-image":"url('/assets/images/banner/banner.png')"}},v={class:"pt-5 pl-5 absolute top-0 left-0",style:{position:"absolute",top:"15px",left:"15px"}},w=k(()=>e("i",{class:"bi bi-chevron-left"},null,-1)),C={class:"card-body text-center"},S={class:"text-primary text-2xl"},B={id:"knowledge-base-content",class:"mt-5"},I={class:"grid gap-5 xs:grid-cols-1 md:grid-cols-3"},$={class:"card"},N=["src"],V={class:"card-body text-center"},F={class:"text-body mt-1 mb-0"},A={key:1,class:"col-12 no-result no-items text-center"},D={class:"mt-4"};function E(t,L,j,q,o,z){const i=g("router-link");return a(),r("div",null,[e("section",x,[e("div",f,[e("div",v,[n(i,{class:"text-dark mr-5 rounded-full border px-1 py-0.5 hover:bg-gray-300 dark:hover:bg-gray-600",to:"/knowledge"},{default:l(()=>[w]),_:1})]),e("div",C,[e("h2",S,c(o.category.name?o.category.name:"...")+" ("+c(o.category.articles_count)+") ",1)])])]),e("section",B,[e("div",I,[o.articles.data!=null?(a(!0),r(p,{key:0},u(o.articles.data,(s,d)=>(a(),r("div",{key:d},[e("div",$,[n(i,{class:"text-dark",to:"/knowledge/articles/"+s.slug+"/"+s.id},{default:l(()=>[s.img!=null?(a(),r("img",{key:0,src:"/assets/images/article/"+s.img,class:"card-img-top",alt:"knowledge-base-image"},null,8,N)):h("",!0),e("div",V,[e("h4",null,c(s.title),1),e("p",F,c(s.short_text),1)])]),_:2},1032,["to"])])]))),128)):(a(),r("div",A,[e("h4",D,c(t.$t("Search result not found!")),1)]))])])])}const O=_(b,[["render",E],["__scopeId","data-v-e347502a"]]);export{O as default};