this.kubio=this.kubio||{},this.kubio.log=function(o){var r={};function e(n){if(r[n])return r[n].exports;var t=r[n]={i:n,l:!1,exports:{}};return o[n].call(t.exports,t,t.exports,e),t.l=!0,t.exports}return e.m=o,e.c=r,e.d=function(o,r,n){e.o(o,r)||Object.defineProperty(o,r,{enumerable:!0,get:n})},e.r=function(o){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(o,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(o,"__esModule",{value:!0})},e.t=function(o,r){if(1&r&&(o=e(o)),8&r)return o;if(4&r&&"object"==typeof o&&o&&o.__esModule)return o;var n=Object.create(null);if(e.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:o}),2&r&&"string"!=typeof o)for(var t in o)e.d(n,t,function(r){return o[r]}.bind(null,t));return n},e.n=function(o){var r=o&&o.__esModule?function(){return o.default}:function(){return o};return e.d(r,"a",r),r},e.o=function(o,r){return Object.prototype.hasOwnProperty.call(o,r)},e.p="",e(e.s=510)}({2:function(o,r){!function(){o.exports=this.lodash}()},510:function(o,r,e){"use strict";e.r(r),e.d(r,"Log",(function(){return i}));var n=e(2);const t="info",c="warn",u="error",l="success",f={[t]:{"background-color":"#666",color:"#fff"},[c]:{"background-color":"yellow",color:"black"},[u]:{"background-color":"red",color:"#fff"},[l]:{"background-color":"green",color:"#fff"}},i={log:(o,r)=>{const e={...f[o],padding:"2px"},t=Object.keys(e).map((o=>`${o}:${e[o]}`)).join(";"),c=Object(n.isString)(r[0])?r[0]:"";console.groupCollapsed(`%c Kubio - ${o.toUpperCase()} `,t,c),console.log("DATA",r),console.trace(),console.groupEnd()},error:function(){for(var o=arguments.length,r=new Array(o),e=0;e<o;e++)r[e]=arguments[e];i.log(u,r)},warn:function(){for(var o=arguments.length,r=new Array(o),e=0;e<o;e++)r[e]=arguments[e];i.log(c,r)},info:function(){for(var o=arguments.length,r=new Array(o),e=0;e<o;e++)r[e]=arguments[e];i.log(t,r)},success:function(){for(var o=arguments.length,r=new Array(o),e=0;e<o;e++)r[e]=arguments[e];i.log(l,r)}}}});
