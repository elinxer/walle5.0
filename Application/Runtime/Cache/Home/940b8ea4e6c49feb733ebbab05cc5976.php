<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>4 0 4 错误页面</title>
  <style>
/*! normalize.css v2.1.2 | MIT License | git.io/normalize */

/* ==========================================================================
   HTML5 display definitions
   ========================================================================== */

/**
 * Correct `block` display not defined in IE 8/9.
 */
article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
main,
nav,
section,
summary {
    display: block;
}

/**
 * Correct `inline-block` display not defined in IE 8/9.
 */

audio,
canvas,
video {
    display: inline-block;
}
audio:not([controls]) {
    display: none;
    height: 0;
}
[hidden] {
    display: none;
}
html {
    font-family: sans-serif; /* 1 */
    -ms-text-size-adjust: 100%; /* 2 */
    -webkit-text-size-adjust: 100%; /* 2 */
}
body {
    margin: 0;
}
a:focus {
    outline: thin dotted;
}
a {
	text-decoration: none;
}
a:active,a:hover {
    outline: 0;
}
h1 {
    font-size: 2em;
    margin: 0.67em 0;
}
abbr[title] {
    border-bottom: 1px dotted;
}
b,strong {
    font-weight: bold;
}

/**
 * Address styling not present in Safari 5 and Chrome.
 */

dfn {
    font-style: italic;
}

/**
 * Address differences between Firefox and other browsers.
 */

hr {
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    height: 0;
}

/**
 * Address styling not present in IE 8/9.
 */

mark {
    background: #ff0;
    color: #000;
}

/**
 * Correct font family set oddly in Safari 5 and Chrome.
 */

code,
kbd,
pre,
samp {
    font-family: monospace, serif;
    font-size: 1em;
}

/**
 * Improve readability of pre-formatted text in all browsers.
 */

pre {
    white-space: pre-wrap;
}

/**
 * Set consistent quote types.
 */

q {
    quotes: "\201C" "\201D" "\2018" "\2019";
}

/**
 * Address inconsistent and variable font size in all browsers.
 */

small {
    font-size: 80%;
}

/**
 * Prevent `sub` and `sup` affecting `line-height` in all browsers.
 */

sub,
sup {
    font-size: 75%;
    line-height: 0;
    position: relative;
    vertical-align: baseline;
}

sup {
    top: -0.5em;
}

sub {
    bottom: -0.25em;
}

/* ==========================================================================
   Embedded content
   ========================================================================== */

/**
 * Remove border when inside `a` element in IE 8/9.
 */

img {
    border: 0;
}

/**
 * Correct overflow displayed oddly in IE 9.
 */

svg:not(:root) {
    overflow: hidden;
}

/* ==========================================================================
   Figures
   ========================================================================== */

/**
 * Address margin not present in IE 8/9 and Safari 5.
 */

figure {
    margin: 0;
}

/* ==========================================================================
   Forms
   ========================================================================== */

/**
 * Define consistent border, margin, and padding.
 */

fieldset {
    border: 1px solid #c0c0c0;
    margin: 0 2px;
    padding: 0.35em 0.625em 0.75em;
}

/**
 * 1. Correct `color` not being inherited in IE 8/9.
 * 2. Remove padding so people aren't caught out if they zero out fieldsets.
 */

legend {
    border: 0; /* 1 */
    padding: 0; /* 2 */
}

/**
 * 1. Correct font family not being inherited in all browsers.
 * 2. Correct font size not being inherited in all browsers.
 * 3. Address margins set differently in Firefox 4+, Safari 5, and Chrome.
 */

button,
input,
select,
textarea {
    font-family: inherit; /* 1 */
    font-size: 100%; /* 2 */
    margin: 0; /* 3 */
}

/**
 * Address Firefox 4+ setting `line-height` on `input` using `!important` in
 * the UA stylesheet.
 */

button,
input {
    line-height: normal;
}

/**
 * Address inconsistent `text-transform` inheritance for `button` and `select`.
 * All other form control elements do not inherit `text-transform` values.
 * Correct `button` style inheritance in Chrome, Safari 5+, and IE 8+.
 * Correct `select` style inheritance in Firefox 4+ and Opera.
 */

button,
select {
    text-transform: none;
}

/**
 * 1. Avoid the WebKit bug in Android 4.0.* where (2) destroys native `audio`
 *    and `video` controls.
 * 2. Correct inability to style clickable `input` types in iOS.
 * 3. Improve usability and consistency of cursor style between image-type
 *    `input` and others.
 */

button,
html input[type="button"], /* 1 */
input[type="reset"],
input[type="submit"] {
    -webkit-appearance: button; /* 2 */
    cursor: pointer; /* 3 */
}

/**
 * Re-set default cursor for disabled elements.
 */

button[disabled],
html input[disabled] {
    cursor: default;
}

/**
 * 1. Address box sizing set to `content-box` in IE 8/9.
 * 2. Remove excess padding in IE 8/9.
 */

input[type="checkbox"],
input[type="radio"] {
    box-sizing: border-box; /* 1 */
    padding: 0; /* 2 */
}

/**
 * 1. Address `appearance` set to `searchfield` in Safari 5 and Chrome.
 * 2. Address `box-sizing` set to `border-box` in Safari 5 and Chrome
 *    (include `-moz` to future-proof).
 */

input[type="search"] {
    -webkit-appearance: textfield; /* 1 */
    -moz-box-sizing: content-box;
    -webkit-box-sizing: content-box; /* 2 */
    box-sizing: content-box;
}

/**
 * Remove inner padding and search cancel button in Safari 5 and Chrome
 * on OS X.
 */

input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-decoration {
    -webkit-appearance: none;
}

/**
 * Remove inner padding and border in Firefox 4+.
 */

button::-moz-focus-inner,
input::-moz-focus-inner {
    border: 0;
    padding: 0;
}

/**
 * 1. Remove default vertical scrollbar in IE 8/9.
 * 2. Improve readability and alignment in all browsers.
 */

textarea {
    overflow: auto; /* 1 */
    vertical-align: top; /* 2 */
}

/* ==========================================================================
   Tables
   ========================================================================== */

/**
 * Remove most spacing between table cells.
 */

table {
    border-collapse: collapse;
    border-spacing: 0;
}
</style>

<style>
/*@import url(http://fonts.googleapis.com/css?family=Lato:400,900|Montez);
*/
.sparkley {
  background: #3e5771;
  color: white;
  border: none;
  padding: 16px 36px;
  font-weight: normal;
  border-radius: 3px;
  transition: all 0.25s ease;
  box-shadow: 0 38px 32px -23px black;
  margin: 0 1em 1em;
}
.sparkley:hover {
  background: #2c3e50;
  color: rgba(255, 255, 255, 0.2);
}

html {
  font-family: Lato;
  font-weight: 200;
  font-size: 1em;
  text-align: center;
  color: #ddd;
  min-height: 100%;
  background: #092756;
  background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(35, 24, 82, 0.22) 10%, rgba(138, 114, 76, 0) 40%), -moz-linear-gradient(top, rgba(57, 173, 219, 0.25) 0%, rgba(42, 60, 87, 0.4) 100%), -moz-linear-gradient(-45deg, #670d10 0%, #092756 100%);
  background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(35, 24, 82, 0.22) 10%, rgba(138, 114, 76, 0) 40%), -webkit-linear-gradient(top, rgba(57, 173, 219, 0.25) 0%, rgba(42, 60, 87, 0.4) 100%), -webkit-linear-gradient(-45deg, #670d10 0%, #092756 100%);
  background: -o-radial-gradient(0% 100%, ellipse cover, rgba(35, 24, 82, 0.22) 10%, rgba(138, 114, 76, 0) 40%), -o-linear-gradient(top, rgba(57, 173, 219, 0.25) 0%, rgba(42, 60, 87, 0.4) 100%), -o-linear-gradient(-45deg, #670d10 0%, #092756 100%);
  background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(35, 24, 82, 0.22) 10%, rgba(138, 114, 76, 0) 40%), -ms-linear-gradient(top, rgba(57, 173, 219, 0.25) 0%, rgba(42, 60, 87, 0.4) 100%), -ms-linear-gradient(-45deg, #670d10 0%, #092756 100%);
  background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(35, 24, 82, 0.22) 10%, rgba(138, 114, 76, 0) 40%), linear-gradient(to bottom, rgba(57, 173, 219, 0.25) 0%, rgba(42, 60, 87, 0.4) 100%), linear-gradient(135deg, #670d10 0%, #092756 100%);
}
html body {
  padding: 50px;
}

h1 span, h2 span, h3 span {
  font-family: Montez;
  font-size: 1.9em;
  font-weight: 300;
  margin: 0 0.3em;
  color: #ff0080;
}

h1 {
  font-size: 1.9em;
  width: 900px;
  margin: 0 auto 1em;
  text-shadow: 0 2px 1px black;
}

.img {
  margin: 40px auto 0;
  width: 600px;
  display: block;
}
.img img {
  width: 100%;
  border-radius: 5px;
}

p {
  padding: 5px 10px;
  display: inline-block;
  margin: 10px auto;
}

</style>

  <script src="/Public/Plugin/html5-canvas-magic-effect/js/prefixfree.min.js"></script>
  <script src="/Public/Plugin/html5-canvas-magic-effect/js/modernizr.js"></script>

</head>

<body>

<h1>这个页面出现错误<span>未知</span> 页面</h1>

<button class="sparkley">Everything's better with sparkles!</button>
<a class="sparkley last" href="<?php echo U('Index/index');?>">I eat rainbows and poop butterflies!!</a>



<div class="img">
  <img id="image" src="/Public/Plugin/html5-canvas-magic-effect/Rain-l.jpg">
</div>
  <br>
  <p>遇见，是一种缘分，也许是我们前世的那一次擦肩而过或是那一次回眸一笑。<br>既然这缘分如此珍贵，那就让我们彼此珍惜遇见的这一刻，永存心里，创造属于我们的故事。</p>

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
  <script src='/Public/Plugin/html5-canvas-magic-effect/js/rbeix.js'></script>

  <script src="/Public/Plugin/html5-canvas-magic-effect/js/index.js"></script>

</body>

</html>