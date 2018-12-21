'use strict';
var items = [
  'INTERPRETER'
];
var app = document.getElementById('app');
var count = 0;
var index = 0;
var typingEffect = function typingEffect() {
    var text = items[index];
    if (count < text.length) {
        setTimeout(function () {
            app.innerHTML += text[count];
            count++;
            typingEffect();
        }, Math.floor(Math.random(10) * 500));
    } else {
        count = 0;
        index = index + 1 < items.length ? index + 1 : 0;
        setTimeout(function () {
            app.innerHTML = '';
            typingEffect();
        }, 1500);  //텍스트 체인지 시간
    }
};
typingEffect();
