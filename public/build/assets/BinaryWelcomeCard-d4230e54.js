import{t as i}from"./toMoney-eef014ed.js";import{_ as c,r as a,o as d,c as m,a as t,t as o,i as n,w as u,g as _}from"./bootstrap-9979bcf7.js";import"./_commonjsHelpers-de833af9.js";import"./browser-77dd377d.js";import"./preload-helper-f61836a9.js";import"./axios-4a70c6fc.js";const p={name:"BinaryWelcomeCard",components:{toMoney:i},props:{firstname:{type:String,default:""},amount:{type:Number,default:0},symbol:{type:String,default:""},title:{type:String,default:""},route:{type:String,default:""}}},f={class:"card"},y={class:"card-body"},g={class:"flex justify-between"},h={class:"text-lg font-medium text-gray-900 dark:text-white"},x={class:"font-small text-sm text-gray-900 dark:text-white"},b={class:"mb-2 mt-5 text-2xl text-blue-600"},k={href:"#",class:"text-dark mr-2"},v=t("img",{src:"/assets/images/illustration/badge.svg",class:"congratulation-medal",alt:"Medal Pic"},null,-1);function w(s,B,e,S,C,M){const r=a("toMoney"),l=a("router-link");return d(),m("div",f,[t("div",y,[t("div",g,[t("div",null,[t("p",h,o(s.$t("Welcome"))+" 🎉 "+o(e.firstname),1),t("p",x,o(s.$t("You have earned")),1),t("p",b,[t("a",k,[n(r,{num:e.amount,decimals:"2"},null,8,["num"]),t("span",null,o(e.symbol),1)])]),n(l,{to:e.route,type:"button",class:"btn btn-primary"},{default:u(()=>[_(o(e.title),1)]),_:1},8,["to"])]),v])])])}const P=c(p,[["render",w]]);export{P as default};