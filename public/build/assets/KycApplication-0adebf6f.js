import{_ as M,V as O,y as Z,k as d,x as H,o as a,c as l,a as e,t,q as R,g as v,n as c,f as n,F as p,b as K,d as y,p as U}from"./bootstrap-249b0f62.js";import{a as W}from"./axios-7a713374.js";import{u as J}from"./kyc-0376438b.js";import{u as Q}from"./user-5d70a0d6.js";import"./_commonjsHelpers-de833af9.js";import"./dijkstra-f906a09e.js";import"./preload-helper-f61836a9.js";const X={setup(){const o=J();Q();const i=O(),E=Z(),s=d(Number(i.query.level)),h=d(null),f=d(!1),r=d(!1),u=d(!1),k=d(!1),b=d(!1),q=d(!1),S=d(!1),w=d(!1),T=d(!1),x=d(!1),C=d(!1),D=d(!1),P=d(!1),I=d(!1),A=d(!1),N=d(!1),z=d(!1),_=d(!1),g=d(!1),V=d(null),F=d(null),j=d(null),Y=async()=>{const L=document.getElementById("kyc_submit"),B=new FormData(L);B.append("level",s.value),_.value&&B.append("documentType",h.value),await W.post("/user/kyc/submit",B).then(m=>{$toast[m.type](m.message),m.type==="success"&&(console.log("settinggg"),setTimeout(()=>{E.push("/identity")},1e3))}).catch(m=>{console.error("Error:",m.response.data.message)})},G=async()=>{o.options===null&&await o.fetch(),u.value=o.options.kyc_firstname.show===1&&o.options.kyc_firstname.level===s.value,k.value=o.options.kyc_lastname.show===1&&o.options.kyc_lastname.level===s.value,b.value=o.options.kyc_email.show===1&&o.options.kyc_email.level===s.value,q.value=o.options.kyc_phone.show===1&&o.options.kyc_phone.level===s.value,S.value=o.options.kyc_dob.show===1&&o.options.kyc_dob.level===s.value,w.value=o.options.kyc_gender.show===1&&o.options.kyc_gender.level===s.value,f.value=u.value||k.value||b.value||q.value||S.value||w.value,T.value=o.options.kyc_country.show===1&&o.options.kyc_country.level===s.value,x.value=o.options.kyc_state.show===1&&o.options.kyc_state.level===s.value,C.value=o.options.kyc_city.show===1&&o.options.kyc_city.level===s.value,D.value=o.options.kyc_zip.show===1&&o.options.kyc_zip.level===s.value,P.value=o.options.kyc_address1.show===1&&o.options.kyc_address1.level===s.value,I.value=o.options.kyc_address2.show===1&&o.options.kyc_address2.level===s.value,r.value=T.value||x.value||C.value||D.value||P.value||I.value,V.value=f.value||r.value?"01":null,A.value=o.options.kyc_document.passport.status===1&&o.options.kyc_document.passport.level===s.value,N.value=o.options.kyc_document.nidcard.status===1&&o.options.kyc_document.nidcard.level===s.value,z.value=o.options.kyc_document.driving.status===1&&o.options.kyc_document.driving.level===s.value,_.value=A.value||N.value||z.value,h.value=_.value?Object.keys(o.options.kyc_document)[0]:null,F.value=_.value?"02":null,g.value=o.options&&o.options.extra_field&&Object.values(o.options.extra_field).some(L=>L.level==s.value),console.log(g.value),j.value=g.value?F!==null?"03":"02":null};return H(()=>{G()}),{kycStore:o,submitKyc:Y,step_01:V,step_02:F,step_03:j,docType:h,level:s,hasInfo:f,hasAddress:r,hasFirstname:u,hasLastname:k,hasEmail:b,hasPhone:q,hasDob:S,hasGender:w,hasCountry:T,hasState:x,hasCity:C,hasZip:D,hasAddress1:P,hasAddress2:I,hasPassport:A,hasNationalId:N,hasDrivingLicense:z,hasDocument:_,hasExtraField:g}}},$={class:"page-header page-header-kyc"},ee={class:"row justify-center"},se={class:"lg:col-span-8 col-xl-7 text-center"},oe={class:"page-title"},te={class:"large"},ie={class:"flex justify-center"},ae={class:"kyc-form-steps card max-w-3xl pt-2"},le={class:"space-y-5"},ne={key:0,class:"form-step form-step1"},re={class:"form-step-head card-innr"},de={class:"step-head"},ce={class:"step-head-text"},ue={class:"px-5 pt-5"},pe={class:"alert alert-warning"},ye={key:0,class:"grid gap-5 grid-cols-2 p-5 mb-5"},_e={key:0},me=["required"],ve={key:1},he=["required"],fe={key:2},ke=["required"],ge={key:3},be=["required"],qe={key:4},Se=["required"],we={key:5},Te=["required"],xe={value:""},Ce={value:"male"},De={value:"female"},Pe={value:"other"},Ie={key:1},Ae={class:"text-dark px-5"},Ne={class:"grid gap-5 grid-cols-2 p-5 mb-5"},ze={key:0},Fe=["required"],Le={value:""},Be=["value"],Ee={key:1},Ve=["required"],je={key:2},Ke=["required"],Ue={key:3},Ye=["required"],Ge={key:4},Me=["required"],Oe={key:5},Ze=["required"],He={class:"form-step-head card-innr"},Re={class:"step-head"},We={class:"step-number"},Je={class:"step-head-text"},Qe={class:"text-warning"},Xe={class:"form-step-fields card-innr"},$e={class:"alert alert-warning"},es={class:"document-list grid gap-3 xs:grid-cols-1 md:grid-cols-2 px-2"},ss=["checked"],os=["checked"],ts=["checked"],is={key:0,class:"doc-upload-area"},as={class:"text-dark font-bold"},ls={class:"list-disc mb-5"},ns={class:"doc-upload doc-upload-d1 border-b border-gray-300 dark:border-gray-600 pb-5"},rs={class:"font-mid doc-type-title text-dark"},ds={class:"flex justify-between items-center"},cs={class:"xs:hidden sm:block"},us={class:"mx-md-4"},ps=["src"],ys={class:"font-mid text-dark"},_s={class:"doc-upload doc-upload-d3"},ms={class:"font-mid text-dark"},vs={class:"form-step-head card-innr"},hs={class:"step-head"},fs={class:"step-head-text"},ks={class:"text-dark"},gs={class:"form-step-fields card-innr addedField grid xs:grid-cols-1 md:grid-cols-2 gap-3 mb-5"},bs={key:0},qs={class:"label mt-1"},Ss={key:0,class:"text-danger"},ws=["name","placeholder"],Ts={key:1},xs={class:"label mt-1"},Cs={key:0,class:"text-danger"},Ds=["name","placeholder"],Ps={key:2},Is={key:0,class:"text-danger"},As=["name"],Ns={class:"form-step form-step-final"},zs={class:"form-step-fields"},Fs={class:"flex space-x-2"},Ls={for:"term-condition"},Bs={class:"flex space-x-2"},Es={for:"info-correct"},Vs={class:"flex space-x-2"},js={for:"certification"},Ks={class:"btn btn-primary",type:"submit"};function Us(o,i,E,s,h,f){return a(),l("div",null,[e("div",$,[e("div",ee,[e("div",se,[e("h2",oe,t(o.$t("Begin your ID-Verification")),1),e("p",te,t(o.$t("Verify your identity to start using your trade wallet.")),1)])])]),e("div",ie,[e("div",ae,[s.kycStore.options!==null?(a(),l("form",{key:0,class:"validate-modern",method:"POST",id:"kyc_submit",enctype:"multipart/form-data",onSubmit:i[3]||(i[3]=R((...r)=>s.submitKyc&&s.submitKyc(...r),["prevent"]))},[e("div",le,[s.step_01!==null?(a(),l("div",ne,[e("div",re,[e("div",de,[i[5]||(i[5]=e("div",{class:"step-number"},"01",-1)),e("div",ce,[i[4]||(i[4]=e("h4",{class:"text-warning"},t("Personal Details"),-1)),e("p",null,t(o.$t("Your basic personal information is required for identification purposes.")),1)])])]),e("div",ue,[e("div",pe,[i[6]||(i[6]=e("i",{class:"bi bi-info-circle"},null,-1)),v(" "+t(o.$t("Please type carefully and fill out the form with your personal details. You are not allowed to edit the details once you have submitted the application.")),1)])]),s.hasInfo?(a(),l("div",ye,[s.hasFirstname?(a(),l("div",_e,[e("label",{for:"first-name",class:c({required:s.kycStore.options.kyc_firstname.req===1})},t(o.$t("First Name")),3),e("input",{required:s.kycStore.options.kyc_firstname.req===1,class:"form-control",type:"text",id:"first-name",name:"first_name"},null,8,me)])):n("",!0),s.hasLastname?(a(),l("div",ve,[e("label",{for:"last-name",class:c({required:s.kycStore.options.kyc_lastname.req===1})},t(o.$t("Last Name")),3),e("input",{required:s.kycStore.options.kyc_lastname.req===1,class:"form-control",type:"text",id:"last-name",name:"last_name"},null,8,he)])):n("",!0),s.hasEmail?(a(),l("div",fe,[e("label",{for:"email",class:c({required:s.kycStore.options.kyc_email.req===1})},t(o.$t("Email Address")),3),e("input",{required:s.kycStore.options.kyc_email.req===1,class:"form-control",type:"email",id:"email",name:"email"},null,8,ke)])):n("",!0),s.hasPhone?(a(),l("div",ge,[e("label",{for:"phone-number",class:c({required:s.kycStore.options.kyc_phone.req===1})},t(o.$t("Phone Number")),3),e("input",{required:s.kycStore.options.kyc_phone.req===1,class:"form-control",type:"text",id:"phone-number",name:"phone"},null,8,be)])):n("",!0),s.hasDob?(a(),l("div",qe,[e("label",{for:"date-of-birth",class:c({required:s.kycStore.options.kyc_dob.req===1})},t(o.$t("Date of Birth")),3),e("input",{required:s.kycStore.options.kyc_dob.req===1,class:"form-control datepicker",type:"date",id:"date-of-birth",name:"dob"},null,8,Se)])):n("",!0),s.hasGender?(a(),l("div",we,[e("label",{for:"gender",class:c({required:s.kycStore.options.kyc_gender.req===1})},t(o.$t("Gender")),3),e("select",{required:s.kycStore.options.kyc_gender.req===1,class:"form-select",name:"gender",id:"gender"},[e("option",xe,t(o.$t("Select Gender")),1),e("option",Ce,t(o.$t("Male")),1),e("option",De,t(o.$t("Female")),1),e("option",Pe,t(o.$t("Other")),1)],8,Te)])):n("",!0)])):n("",!0),s.hasAddress?(a(),l("div",Ie,[e("h4",Ae,t(o.$t("Your Address")),1),e("div",Ne,[s.hasCountry?(a(),l("div",ze,[e("label",{for:"country",class:c({required:s.kycStore.options.kyc_country.req===1})},t(o.$t("Country")),3),e("select",{required:s.kycStore.options.kyc_country.req===1,class:"form-select",name:"country",id:"country","data-dd-class":"search-on"},[e("option",Le,t(o.$t("Select Country")),1),(a(!0),l(p,null,K(s.kycStore.countries,r=>(a(),l("option",{key:r,value:r},t(r),9,Be))),128))],8,Fe)])):n("",!0),s.hasState?(a(),l("div",Ee,[e("label",{for:"state",class:c({required:s.kycStore.options.kyc_state.req===1})},t(o.$t("State")),3),e("input",{required:s.kycStore.options.kyc_state.req===1,class:"form-control",type:"text",id:"state",name:"state"},null,8,Ve)])):n("",!0),s.hasCity?(a(),l("div",je,[e("label",{for:"city",class:c({required:s.kycStore.options.kyc_city.req===1})},t(o.$t("City")),3),e("input",{required:s.kycStore.options.kyc_city.req===1,class:"form-control",type:"text",id:"city",name:"city"},null,8,Ke)])):n("",!0),s.hasZip?(a(),l("div",Ue,[e("label",{for:"zip",class:c({required:s.kycStore.options.kyc_zip.req===1})},t(o.$t("Zip / Postal Code")),3),e("input",{required:s.kycStore.options.kyc_zip.req===1,class:"form-control",type:"text",id:"zip",name:"zip"},null,8,Ye)])):n("",!0),s.hasAddress1?(a(),l("div",Ge,[e("label",{for:"address_1",class:c({required:s.kycStore.options.kyc_address1.req===1})},t(o.$t("Address Line 1")),3),e("input",{required:s.kycStore.options.kyc_address1.req===1,class:"form-control",type:"text",id:"address_1",name:"address_1"},null,8,Me)])):n("",!0),s.hasAddress2?(a(),l("div",Oe,[e("label",{for:"address_2",class:c({required:s.kycStore.options.kyc_address2.req===1})},t(o.$t("Address Line 2")),3),e("input",{required:s.kycStore.options.kyc_address2.req===1,class:"form-control",type:"text",id:"address_2",name:"address_2"},null,8,Ze)])):n("",!0)])])):n("",!0)])):n("",!0),s.step_02!==null?(a(),l("div",{key:s.step_02,class:"form-step form-step2"},[e("div",He,[e("div",Re,[e("div",We,t(s.step_02),1),e("div",Je,[e("h4",Qe,t(o.$t("Document Upload")),1),e("p",null,t(o.$t("To verify your identity, we ask you to upload high-quality scans or photos of your official identification documents issued by the government.")),1)])])]),e("div",Xe,[e("div",$e,[i[7]||(i[7]=e("i",{class:"bi bi-info-circle"},null,-1)),v(" "+t(o.$t("In order to complete, please upload any of the following personal documents.")),1)]),e("ul",es,[s.hasPassport?(a(),l(p,{key:0},[e("input",{class:"document-type",type:"radio",name:"documentType",id:"docType-passport","data-title":"Passport","data-img":"`/assets/images/vector-passport.png`",checked:s.docType==="passport",onClick:i[0]||(i[0]=r=>s.docType="passport")},null,8,ss),e("label",{for:"docType-passport",style:y({borderColor:s.docType==="passport"?"#7668fe":"#e6effb"})},[i[8]||(i[8]=e("img",{style:{height:"36px"},src:"/assets/images/icon-passport.png",alt:""},null,-1)),e("span",{style:y({color:s.docType==="passport"?"#495463":"#758698"})},t(o.$t("Passport")),5)],4)],64)):n("",!0),s.hasNationalId?(a(),l(p,{key:1},[e("input",{class:"document-type",type:"radio",name:"documentType",id:"docType-nidcard","data-title":"National ID","data-img":"/assets/images/vector-nidcard.png",checked:s.docType==="nidcard",onClick:i[1]||(i[1]=r=>s.docType="nidcard")},null,8,os),e("label",{for:"docType-nidcard",style:y({borderColor:s.docType==="nidcard"?"#7668fe":"#e6effb"})},[i[9]||(i[9]=e("img",{style:{height:"36px"},src:"/assets/images/icon-national-id.png",alt:""},null,-1)),e("span",{style:y({color:s.docType==="nidcard"?"#495463":"#758698"})},t(o.$t("National ID")),5)],4)],64)):n("",!0),s.hasDrivingLicense?(a(),l(p,{key:2},[e("input",{class:"document-type",type:"radio",name:"documentType",id:"docType-driving","data-title":"Driving License","data-img":"/assets/images/vector-driving.png",checked:s.docType==="driving",onClick:i[2]||(i[2]=r=>s.docType="driving")},null,8,ts),e("label",{for:"docType-driving",style:y({borderColor:s.docType==="driving"?"#7668fe":"#e6effb"})},[i[10]||(i[10]=e("img",{style:{height:"36px"},src:"/assets/images/icon-license.png",alt:""},null,-1)),e("span",{style:y({color:s.docType==="driving"?"#495463":"#758698"})},t(o.$t("Driving License")),5)],4)],64)):n("",!0)]),s.docType!==null?(a(),l("div",is,[e("p",as,t(o.$t("To avoid delays with verification process, please double-check to ensure the below requirements are fully met:")),1),e("ul",ls,[e("li",null,t(o.$t("Chosen credential must not be expired.")),1),e("li",null,t(o.$t("Document should be in good condition and clearly visible.")),1),e("li",null,t(o.$t("There is no light glare or reflections on the card.")),1),e("li",null,t(o.$t("File is at least 1 MB in size and has at least 300 dpi resolution.")),1)]),e("div",ns,[e("h6",rs,t(o.$t("Upload Here Your"))+" "+t(s.docType)+" "+t(o.$t("Copy")),1),e("div",ds,[i[11]||(i[11]=e("div",{class:"col-sm-8"},[e("input",{class:"upload",type:"file",id:"document_one",name:"document_one",required:""})],-1)),e("div",cs,[e("div",us,[e("img",{width:"160",class:"_image",src:`/assets/images/vector-${s.docType}.png`,alt:""},null,8,ps)])])])]),e("div",{class:c(["doc-upload doc-upload-d2 border-b border-gray-300 dark:border-gray-600 pb-5",s.docType==="nidcard"?"":" hidden"])},[e("h6",ys,t(o.$t("Upload Here Your National ID Back Side")),1),i[12]||(i[12]=U('<div class="flex justify-between items-center"><div class="col-sm-8"><input class="upload" type="file" id="document_two" name="document_two"></div><div class="xs:hidden sm:block"><div class="mx-md-4"><img width="160" src="/assets/images/vector-id-back.png" alt=""></div></div></div>',1))],2),e("div",_s,[e("h6",ms,t(o.$t("Upload a selfie as a Photo Proof while holding document in your hand")),1),i[13]||(i[13]=U('<div class="flex justify-between items-center"><div class="col-sm-8"><input class="upload" type="file" id="document_image_hand" name="document_image_hand" required></div><div class="xs:hidden sm:block"><div class="mx-md-4"><img width="160" src="/assets/images/vector-hand.png" alt=""></div></div></div>',1))])])):n("",!0)])])):n("",!0),s.step_03!==null?(a(),l("div",{key:s.step_03,class:"form-step form-step3"},[e("div",vs,[e("div",hs,[i[14]||(i[14]=e("div",{class:"step-number"},"03",-1)),e("div",fs,[e("h4",ks,t(o.$t("Extra Informations")),1),e("p",null,t(o.$t("We require extra essential information to get to know you better")),1)])])]),e("div",gs,[(a(!0),l(p,null,K(s.kycStore.options.extra_field,(r,u,k)=>(a(),l(p,null,[r.level==s.level?(a(),l(p,{key:0},[r.type=="text"?(a(),l("div",bs,[e("label",qs,[e("strong",null,[v(t(r.field_level)+" ",1),r.validation=="required"?(a(),l("span",Ss,"*")):n("",!0)])]),e("input",{type:"text",class:"form-control",name:`extra_field[${u}]`,placeholder:r.field_level},null,8,ws)])):r.type=="textarea"?(a(),l("div",Ts,[e("label",xs,[e("strong",null,[v(t(r.field_level)+" ",1),r.validation=="required"?(a(),l("span",Cs,"*")):n("",!0)])]),e("textarea",{name:`extra_field[${u}]`,class:"form-control",placeholder:r.field_level,rows:"3"},t(r.field_level),9,Ds)])):r.type=="file"?(a(),l("div",Ps,[e("label",null,[e("strong",null,[v(t(r.field_level)+" ",1),r.validation=="required"?(a(),l("span",Is,"*")):n("",!0)])]),i[15]||(i[15]=e("br",null,null,-1)),e("input",{type:"file",class:"upload",name:`extra_field[${u}]`,accept:"image/*"},null,8,As)])):n("",!0)],64)):n("",!0)],64))),256))])])):n("",!0),e("div",Ns,[e("div",zs,[e("div",Fs,[i[16]||(i[16]=e("input",{type:"checkbox",id:"term-condition",name:"condition",required:""},null,-1)),e("label",Ls,t(o.$t("I agree to the Terms of Service and Privacy Policy")),1)]),e("div",Bs,[i[17]||(i[17]=e("input",{id:"info-correct",name:"correct",type:"checkbox",required:""},null,-1)),e("label",Es,t(o.$t("All the personal information I have entered is correct.")),1)]),e("div",Vs,[i[18]||(i[18]=e("input",{id:"certification",name:"certification",type:"checkbox",required:""},null,-1)),e("label",js,t(o.$t("I certify that, I am registering to participate in the trading platform in the capacity of an individual (and beneficial owner) and not as an agent or representative of a third party corporate entity.")),1)]),i[19]||(i[19]=e("div",{class:"gaps-1x"},null,-1)),e("button",Ks,t(o.$t("Proceed to Verify")),1)])])])],32)):n("",!0)])])])}const Ws=M(X,[["render",Us]]);export{Ws as default};