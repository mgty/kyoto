!function i(a,c,u){function d(t,e){if(!c[t]){if(!a[t]){var r="function"==typeof require&&require;if(!e&&r)return r(t,!0);if(p)return p(t,!0);var n=new Error("Cannot find module '"+t+"'");throw n.code="MODULE_NOT_FOUND",n}var o=c[t]={exports:{}};a[t][0].call(o.exports,function(e){return d(a[t][1][e]||e)},o,o.exports,i,a,c,u)}return c[t].exports}for(var p="function"==typeof require&&require,e=0;e<u.length;e++)d(u[e]);return d}({1:[function(e,t,r){"use strict";function n(){return document.getElementById("save_snippet").click()}var o,i;window.code_snippets_editor=(o=window.Code_Snippets_CodeMirror,(i=code_snippets_editor_atts).extraKeys=window.navigator.platform.match("Mac")?{"Cmd-Enter":n,"Cmd-S":n}:{"Ctrl-Enter":n,"Ctrl-S":n},window.navigator.platform.match("Mac")&&(document.querySelector(".editor-help-text").className+=" platform-mac"),o.fromTextArea(document.getElementById("snippet_code"),i))},{}]},{},[1]);
