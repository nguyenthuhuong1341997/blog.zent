!function(e){e.fn.extend({slimScroll:function(i){var o={width:"auto",height:"250px",size:"7px",color:"#000",position:"right",distance:"1px",start:"top",opacity:.4,alwaysVisible:!1,disableFadeOut:!1,railVisible:!1,railColor:"#333",railOpacity:.2,railDraggable:!0,railClass:"slimScrollRail",barClass:"slimScrollBar",wrapperClass:"slimScrollDiv",allowPageScroll:!1,wheelStep:20,touchScrollStep:200,borderRadius:"7px",railBorderRadius:"7px"},a=e.extend(o,i);return this.each(function(){function o(t){if(c){var t=t||window.event,i=0;t.wheelDelta&&(i=-t.wheelDelta/120),t.detail&&(i=t.detail/3);var o=t.target||t.srcTarget||t.srcElement;e(o).closest("."+a.wrapperClass).is(y.parent())&&r(i,!0),t.preventDefault&&!m&&t.preventDefault(),m||(t.returnValue=!1)}}function r(e,t,i){m=!1;var o=e,r=y.outerHeight()-H.outerHeight();if(t&&(o=parseInt(H.css("top"))+e*parseInt(a.wheelStep)/100*H.outerHeight(),o=Math.min(Math.max(o,0),r),o=e>0?Math.ceil(o):Math.floor(o),H.css({top:o+"px"})),f=parseInt(H.css("top"))/(y.outerHeight()-H.outerHeight()),o=f*(y[0].scrollHeight-y.outerHeight()),i){o=e;var s=o/y[0].scrollHeight*y.outerHeight();s=Math.min(Math.max(s,0),r),H.css({top:s+"px"})}y.scrollTop(o),y.trigger("slimscrolling",~~o),n(),l()}function s(){g=Math.max(y.outerHeight()/y[0].scrollHeight*y.outerHeight(),w),H.css({height:g+"px"});var e=g==y.outerHeight()?"none":"block";H.css({display:e})}function n(){if(s(),clearTimeout(p),f==~~f){if(m=a.allowPageScroll,v!=f){var e=0==~~f?"top":"bottom";y.trigger("slimscroll",e)}}else m=!1;if(v=f,g>=y.outerHeight())return void(m=!0);H.stop(!0,!0).fadeIn("fast"),a.railVisible&&C.stop(!0,!0).fadeIn("fast")}function l(){a.alwaysVisible||(p=setTimeout(function(){a.disableFadeOut&&c||h||u||(H.fadeOut("slow"),C.fadeOut("slow"))},1e3))}var c,h,u,p,d,g,f,v,b="<div></div>",w=30,m=!1,y=e(this);if(y.parent().hasClass(a.wrapperClass)){var E=y.scrollTop();if(H=y.parent().find("."+a.barClass),C=y.parent().find("."+a.railClass),s(),e.isPlainObject(i)){if("height"in i&&"auto"==i.height){y.parent().css("height","auto"),y.css("height","auto");var S=y.parent().parent().height();y.parent().css("height",S),y.css("height",S)}if("scrollTo"in i)E=parseInt(a.scrollTo);else if("scrollBy"in i)E+=parseInt(a.scrollBy);else if("destroy"in i)return H.remove(),C.remove(),void y.unwrap();r(E,!1,!0)}}else if(!(e.isPlainObject(i)&&"destroy"in i)){a.height="auto"==a.height?y.parent().height():a.height;var x=e(b).addClass(a.wrapperClass).css({position:"relative",overflow:"hidden",width:a.width,height:a.height});y.css({overflow:"hidden",width:a.width,height:a.height,"-ms-touch-action":"none"});var C=e(b).addClass(a.railClass).css({width:a.size,height:"100%",position:"absolute",top:0,display:a.alwaysVisible&&a.railVisible?"block":"none","border-radius":a.railBorderRadius,background:a.railColor,opacity:a.railOpacity,zIndex:90}),H=e(b).addClass(a.barClass).css({background:a.color,width:a.size,position:"absolute",top:0,opacity:a.opacity,display:a.alwaysVisible?"block":"none","border-radius":a.borderRadius,BorderRadius:a.borderRadius,MozBorderRadius:a.borderRadius,WebkitBorderRadius:a.borderRadius,zIndex:99}),T="right"==a.position?{right:a.distance}:{left:a.distance};C.css(T),H.css(T),y.wrap(x),y.parent().append(H),y.parent().append(C),a.railDraggable&&H.bind("mousedown",function(i){var o=e(document);return u=!0,t=parseFloat(H.css("top")),pageY=i.pageY,o.bind("mousemove.slimscroll",function(e){currTop=t+e.pageY-pageY,H.css("top",currTop),r(0,H.position().top,!1)}),o.bind("mouseup.slimscroll",function(e){u=!1,l(),o.unbind(".slimscroll")}),!1}).bind("selectstart.slimscroll",function(e){return e.stopPropagation(),e.preventDefault(),!1}),C.hover(function(){n()},function(){l()}),H.hover(function(){h=!0},function(){h=!1}),y.hover(function(){c=!0,n(),l()},function(){c=!1,l()}),window.navigator.msPointerEnabled?(y.bind("MSPointerDown",function(e,t){e.originalEvent.targetTouches.length&&(d=e.originalEvent.targetTouches[0].pageY)}),y.bind("MSPointerMove",function(e){if(e.originalEvent.preventDefault(),e.originalEvent.targetTouches.length){r((d-e.originalEvent.targetTouches[0].pageY)/a.touchScrollStep,!0),d=e.originalEvent.targetTouches[0].pageY}})):(y.bind("touchstart",function(e,t){e.originalEvent.touches.length&&(d=e.originalEvent.touches[0].pageY)}),y.bind("touchmove",function(e){if(m||e.originalEvent.preventDefault(),e.originalEvent.touches.length){r((d-e.originalEvent.touches[0].pageY)/a.touchScrollStep,!0),d=e.originalEvent.touches[0].pageY}})),s(),"bottom"===a.start?(H.css({top:y.outerHeight()-H.outerHeight()}),r(0,!0)):"top"!==a.start&&(r(e(a.start).position().top,null,!0),a.alwaysVisible||H.hide()),function(){window.addEventListener?(this.addEventListener("DOMMouseScroll",o,!1),this.addEventListener("mousewheel",o,!1)):document.attachEvent("onmousewheel",o)}()}}),this}}),e.fn.extend({slimscroll:e.fn.slimScroll})}(jQuery);