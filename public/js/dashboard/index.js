$(document).ready(function(){$(".cell").click(function(){window.location.href=$(this).data("href")}),$.contextMenu({selector:".cell",callback:function(e,t){switch(e){case"edit":window.location.href="dashboard/edit/"+$(this).data("id");break;case"delete":var a=$("#resetForm");a.attr("action","dashboard/delete/"+$(this).data("id")),a.submit()}},items:{edit:{name:"Edit"},delete:{name:"Reset"},quit:{name:"Quit"}}})});