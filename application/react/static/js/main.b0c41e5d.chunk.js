(window.webpackJsonp=window.webpackJsonp||[]).push([[0],{13:function(e,t,a){e.exports=a.p+"static/media/arrow-up.6062b828.svg"},14:function(e,t,a){e.exports=a.p+"static/media/iphone-profile.b04cbed1.jpg"},15:function(e,t,a){e.exports=a(23)},20:function(e,t,a){},23:function(e,t,a){"use strict";a.r(t);var n=a(0),r=a.n(n),l=a(11),c=a.n(l),o=a(1),s=a(2),i=a(4),m=a(3),u=a(5),d=a(8),p=a.n(d),b=(a(20),function(e){function t(){return Object(o.a)(this,t),Object(i.a)(this,Object(m.a)(t).apply(this,arguments))}return Object(u.a)(t,e),Object(s.a)(t,[{key:"render",value:function(){return r.a.createElement("nav",{className:"navbar sticky-top navbar-dark bg-dark navbar-expand-sm py-1",role:"navigation"},this.props.children)}}]),t}(n.Component)),h=function(e){function t(){return Object(o.a)(this,t),Object(i.a)(this,Object(m.a)(t).apply(this,arguments))}return Object(u.a)(t,e),Object(s.a)(t,[{key:"render",value:function(){return r.a.createElement("div",{className:"navbar-brand"},this.props.name)}}]),t}(n.Component),f=function(e){function t(){return Object(o.a)(this,t),Object(i.a)(this,Object(m.a)(t).apply(this,arguments))}return Object(u.a)(t,e),Object(s.a)(t,[{key:"render",value:function(){return r.a.createElement("button",{className:"navbar-toggler",type:"button","data-toggle":"collapse","data-target":"#"+this.props.target,"aria-controls":this.props.target,"aria-expanded":"false","aria-label":"Toggle navigation"},r.a.createElement("span",{className:"navbar-toggler-icon"}))}}]),t}(n.Component),v=function(e){function t(){return Object(o.a)(this,t),Object(i.a)(this,Object(m.a)(t).apply(this,arguments))}return Object(u.a)(t,e),Object(s.a)(t,[{key:"render",value:function(){return r.a.createElement("div",{className:"collapse navbar-collapse",id:this.props.id},r.a.createElement("ul",{className:"navbar-nav mr-auto"},this.props.children))}}]),t}(n.Component),E=function(e){function t(){return Object(o.a)(this,t),Object(i.a)(this,Object(m.a)(t).apply(this,arguments))}return Object(u.a)(t,e),Object(s.a)(t,[{key:"render",value:function(){var e=this,t="";return"yes"===this.props.verified&&(t=r.a.createElement("li",{className:"nav-item"},r.a.createElement("div",{className:"nav-link pointer",onClick:function(){e.props.contactRef.current.scrollIntoView({behavior:"smooth",block:"start",inline:"nearest"})}},"contact"))),r.a.createElement(b,null,r.a.createElement(h,{name:"Brayworth Web Design"}),r.a.createElement(f,{target:"NavCollapsed"}),r.a.createElement(v,{id:"NavCollapsed"},r.a.createElement("li",{className:"nav-item"},r.a.createElement("a",{className:"nav-link",href:"https://mail.brayworth.com.au/webmail/",target:"_blank",rel:"noopener noreferrer"},"webmail")),r.a.createElement("li",{className:"nav-item"},r.a.createElement("div",{className:"nav-link pointer",onClick:function(){e.props.aboutRef.current.scrollIntoView({behavior:"smooth",block:"start",inline:"nearest"})}},"about")),t))}}]),t}(n.Component),g=a(12),N=a(7),y=a(6),w=a.n(y),k=a(13),j=a.n(k),O=function(e){function t(){return Object(o.a)(this,t),Object(i.a)(this,Object(m.a)(t).apply(this,arguments))}return Object(u.a)(t,e),Object(s.a)(t,[{key:"render",value:function(){return r.a.createElement("div",null,r.a.createElement("img",{src:j.a,className:"float-right up-icon pointer",onClick:function(e){e.preventDefault(),window.scrollTo({left:0,top:0,behavior:"smooth"}),window.scrollTo({left:0,top:130,behavior:"smooth"})},alt:"up arrow",title:"top of page"}))}}]),t}(n.Component),x=function(e){function t(e){var a;return Object(o.a)(this,t),(a=Object(i.a)(this,Object(m.a)(t).call(this,e))).state={soz:a.props.soz,contactName:"",email:"",comments:"",sendCopy:!1},a.buttonRef=r.a.createRef(),a.formRef=r.a.createRef(),a.handleChange=a.handleChange.bind(Object(N.a)(a)),a.handleSubmit=a.handleSubmit.bind(Object(N.a)(a)),a}return Object(u.a)(t,e),Object(s.a)(t,[{key:"handleChange",value:function(e){var t=e.target,a=t.name,n="checkbox"===t.type?t.checked:t.value;this.setState(Object(g.a)({},a,n))}},{key:"handleSubmit",value:function(e){e.preventDefault();var t=this.state,a={url:"/",type:"POST",data:{action:"send-message",soz:t.soz,contactName:t.contactName,email:t.email,comments:t.comments,sendCopy:t.sendCopy?"yes":"no"}},n=w()(this.buttonRef.current);w()("input, textarea",this.formRef.current).prop("disabled",!0),w.a.ajax(a).then(function(e){"ack"===e.response&&(n.parent().append("<span>sent ..</span>"),n.remove())}),n.prepend('<div class="spinner-border spinner-border-sm mr-1" />').prop("disabled",!0)}},{key:"render",value:function(){return r.a.createElement("div",null,r.a.createElement("div",{className:"row"},r.a.createElement("div",{className:"offset-sm-3 col-sm-9"},r.a.createElement("h1",null,"Contact"),r.a.createElement(O,null),r.a.createElement("strong",null,"Gold Coast, Q. Australia"),r.a.createElement("br",null),"PO Box 292 Tugun, Q 4224",r.a.createElement("br",null),"t. 0418 745334")),r.a.createElement("form",{onSubmit:this.handleSubmit,ref:this.formRef},r.a.createElement("div",{className:"form-group row"},r.a.createElement("label",{className:"control-label col-sm-3",htmlFor:"contactName"},"Name"),r.a.createElement("div",{className:"col-sm-9"},r.a.createElement("input",{className:"form-control ",type:"text",name:"contactName",id:"contactName",value:this.state.contactName,onChange:this.handleChange,required:!0}))),r.a.createElement("div",{className:"form-group row"},r.a.createElement("label",{className:"control-label col-sm-3",htmlFor:"email"},"Email"),r.a.createElement("div",{className:"col-sm-9"},r.a.createElement("input",{className:"form-control",type:"email",name:"email",id:"email",value:this.state.email,onChange:this.handleChange,required:!0}))),r.a.createElement("div",{className:"form-group row"},r.a.createElement("label",{className:"control-label col-sm-3",htmlFor:"commentsText"},"Message"),r.a.createElement("div",{className:"col-sm-9"},r.a.createElement("textarea",{className:"form-control",rows:"7",name:"comments",id:"commentsText",value:this.state.comments,onChange:this.handleChange}))),r.a.createElement("div",{className:"form-group row"},r.a.createElement("div",{className:"offset-sm-3 col-sm-9"},r.a.createElement("div",{className:"form-check"},r.a.createElement("input",{className:"form-check-input",type:"checkbox",name:"sendCopy",id:"sendCopy",value:this.state.comments,onChange:this.handleChange}),r.a.createElement("label",{className:"form-check-label",htmlFor:"sendCopy"},"Send a copy of this email to yourself")))),r.a.createElement("div",{className:"form-group row"},r.a.createElement("div",{className:"offset-sm-3 col-sm-9"},r.a.createElement("button",{className:"btn btn-outline-primary",ref:this.buttonRef},"Submit")))))}}]),t}(n.Component),C=a(14),R=a.n(C),S=function(e){function t(){return Object(o.a)(this,t),Object(i.a)(this,Object(m.a)(t).apply(this,arguments))}return Object(u.a)(t,e),Object(s.a)(t,[{key:"render",value:function(){return r.a.createElement("div",null,r.a.createElement("h1",{className:"text-center"},"Web Developer",r.a.createElement("br",{className:"d-block d-sm-none"}),r.a.createElement("span",{className:"d-none d-sm-inline-block px-2"}," - "),r.a.createElement("small",{className:"subtitle"},"Full Stack")),r.a.createElement(O,null),r.a.createElement("div",{className:"row"},r.a.createElement("div",{className:"col-8 col-md-6"},r.a.createElement("p",null,"BrayWorth is a Full Stack Web Development Company."),r.a.createElement("p",null,"Full Stack Web Development works with back end server-side languages like PHP to find, save, or change data for front-end code.",r.a.createElement("br",null),"We use Linux, PHP and SQL."),r.a.createElement("p",null,"Full Stack Developers use front-end browser languages that control how content looks on a site\u2019s user-face side like - HTML, CSS, and JavaScript.",r.a.createElement("br",null),"We use Bootstrap and libraries like jQuery"),r.a.createElement("p",null,"BrayWorth's Full Stack Developers speak database and browser languages",r.a.createElement("br",null),"but importantly they speak your language.",r.a.createElement("br",null),"Discuss your project with us today.")),r.a.createElement("div",{className:"d-none d-md-block col-md-3"},r.a.createElement("img",{className:"img img-responsive img-thumbnail",alt:"...",src:R.a})),r.a.createElement("div",{className:"col-4 col-md-3"},r.a.createElement("div",{className:"alert about-button-a text-center text-white"},"HTML/CSS"),r.a.createElement("div",{className:"alert about-button-b text-center text-white"},"Bootstrap"),r.a.createElement("div",{className:"alert about-button-c text-center text-white"},"JavaScript"),r.a.createElement("div",{className:"alert about-button-d text-center text-white"},"PHP"),r.a.createElement("div",{className:"alert about-button-e text-center text-white"},"REST"),r.a.createElement("div",{className:"alert about-button-a text-center text-white"},"DataBase"))),r.a.createElement("div",{className:"row py-1"},r.a.createElement("div",{className:"col"},r.a.createElement("p",null,"Find our source code on ",r.a.createElement("a",{href:"https://github.com/bravedave/",target:"_blank",rel:"noopener noreferrer"},r.a.createElement("i",{className:"fa fa-github"})," GitHub")),r.a.createElement("p",null,"Find the source code for this web site at ",r.a.createElement("a",{href:"https://github.com/bravedave/brayworth-www/",target:"_blank",rel:"noopener noreferrer"},r.a.createElement("i",{className:"fa fa-github"})," https://github.com/bravedave/brayworth-www/")),r.a.createElement("p",null,"Find documentation of the MVC Web Application Architecture ",r.a.createElement("a",{href:"/docs/"},r.a.createElement("i",{className:"fa fa-sticky-note-o"})," here")),r.a.createElement("p",null,"Find .NET work at ",r.a.createElement("a",{href:"https://easydose.net.au",target:"_blank",rel:"noopener noreferrer"}," easydose.net.au")),r.a.createElement("p",null,"Find some recent work at these websites:"))),r.a.createElement("div",{className:"row py-1"},r.a.createElement("div",{className:"col-sm-6 col-md-3 col-xl-2 offset-xl-2"},r.a.createElement("a",{className:"btn btn-block btn-outline-secondary",href:"https://www.darcy.com.au",target:"_blank",rel:"noopener noreferrer"},"D'Arcy Estate Agents")),r.a.createElement("div",{className:"col-sm-6 col-md-3 col-xl-2 mt-2 mt-sm-0"},r.a.createElement("a",{className:"btn btn-block btn-outline-secondary",href:"https://www.maricourt.com.au",target:"_blank",rel:"noopener noreferrer"},"Mari Court")),r.a.createElement("div",{className:"col-sm-6 col-md-3 col-xl-2 mt-2 mt-md-0"},r.a.createElement("a",{className:"btn btn-block btn-outline-secondary",href:"https://friendsofcurrumbin.com/",target:"_blank",rel:"noopener noreferrer"},"FOC")),r.a.createElement("div",{className:"col-sm-6 col-md-3 col-xl-2 mt-2 mt-md-0"},r.a.createElement("a",{className:"btn btn-block btn-outline-secondary",href:"https://www.bilingaslsc.com",target:"_blank",rel:"noopener noreferrer"},"Bilinga SLSC"))))}}]),t}(n.Component),F=(a(21),a(22),function(){function e(){Object(o.a)(this,e)}return Object(s.a)(e,[{key:"require",value:function(e,t){this.loadCount=0,this.totalRequired=e.length,this.callback=t;for(var a=0;a<e.length;a++)this.writeScript(e[a])}},{key:"loaded",value:function(e){this.loadCount++,this.loadCount===this.totalRequired&&"function"===typeof this.callback&&this.callback.call()}},{key:"writeScript",value:function(e){var t=this,a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=e,a.addEventListener("load",function(e){t.loaded(e)},!1),document.getElementsByTagName("head")[0].appendChild(a)}}]),e}()),T=function(e){function t(e){var a;return Object(o.a)(this,t),(a=Object(i.a)(this,Object(m.a)(t).call(this,e))).aboutRef=r.a.createRef(),a.contactRef=r.a.createRef(),a.catchaVerified="no",a.soz="",a}return Object(u.a)(t,e),Object(s.a)(t,[{key:"componentDidMount",value:function(){var e=this;window.scrollTo({left:0,top:130,behavior:"smooth"});var t="6Le2OXgUAAAAAJlZnzozDmuZeI2B-mbmJKqABvq3";(new F).require(["https://www.google.com/recaptcha/api.js?render="+t],function(){window.grecaptcha.ready(function(){window.grecaptcha.execute(t,{action:"homepage"}).then(function(t){var a={url:"/",type:"POST",data:{action:"verify-captcha",token:t}};w.a.ajax(a).then(function(t){"ack"===t.response&&t.data.success&&(e.soz=t.soz,e.catchaVerified="yes",e.forceUpdate())})})})})}},{key:"render",value:function(){return"yes"===this.catchaVerified?r.a.createElement("div",{className:"App"},r.a.createElement(E,{aboutRef:this.aboutRef,contactRef:this.contactRef,verified:this.catchaVerified}),r.a.createElement("div",{id:"parallax"},r.a.createElement("img",{src:p.a,alt:"..."})),r.a.createElement("div",{className:"parallax"}),r.a.createElement("div",{className:"container-fluid py-4 bg-white",ref:this.aboutRef},r.a.createElement(S,null)),r.a.createElement("div",{className:"parallax"}),r.a.createElement("div",{className:"container-fluid py-4 bg-white",ref:this.contactRef},r.a.createElement(x,{soz:this.soz})),r.a.createElement("div",{className:"parallax"})):r.a.createElement("div",{className:"App"},r.a.createElement(E,{aboutRef:this.aboutRef,contactRef:this.contactRef,verified:this.catchaVerified}),r.a.createElement("div",{id:"parallax"},r.a.createElement("img",{src:p.a,alt:"..."})),r.a.createElement("div",{className:"parallax"}),r.a.createElement("div",{className:"container-fluid py-4 bg-white",ref:this.aboutRef},r.a.createElement(S,null)),r.a.createElement("div",{className:"parallax"}))}}]),t}(n.Component);c.a.render(r.a.createElement(T,null),document.getElementById("root"))},8:function(e,t,a){e.exports=a.p+"static/media/bg-1600.cdee0cb3.jpg"}},[[15,1,2]]]);
//# sourceMappingURL=main.b0c41e5d.chunk.js.map