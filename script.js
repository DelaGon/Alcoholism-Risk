// script.js

// เลือกป๊อปอัปและไอคอน
const alcoholIcon = document.getElementById('alcoholIcon');
const beerIcon = document.getElementById('beerIcon');
const alcoholPopup = document.getElementById('alcoholPopup');
const beerPopup = document.getElementById('beerPopup');
const closeAlcoholPopup = alcoholPopup.querySelector('.close');
const closeBeerPopup = beerPopup.querySelector('.close');

// แสดงป๊อปอัปเมื่อคลิกที่ไอคอนเหล้า
alcoholIcon.onclick = function() {
    alcoholPopup.style.display = 'block';
}

// แสดงป๊อปอัปเมื่อคลิกที่ไอคอนเบียร์
beerIcon.onclick = function() {
    beerPopup.style.display = 'block';
}

// ปิดป๊อปอัปเมื่อคลิกที่ปุ่มปิด
closeAlcoholPopup.onclick = function() {
    alcoholPopup.style.display = 'none';
}

closeBeerPopup.onclick = function() {
    beerPopup.style.display = 'none';
}

// ปิดป๊อปอัปเมื่อคลิกนอกป๊อปอัป
window.onclick = function(event) {
    if (event.target == alcoholPopup) {
        alcoholPopup.style.display = 'none';
    }
    if (event.target == beerPopup) {
        beerPopup.style.display = 'none';
    }
}
