
var swiper = new Swiper(".home-slider", {
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    loop: true,
});
let countDate = new Date('November 18,2023 00:00:00').getTime();

function countDown(){
    let now = new Date().getTime();

    gap = countDate - now;


    let second = 1000;
    let minute = second * 60;
    let hour = minute * 60;
    let day = hour * 24;

    let d = Math.floor(gap /(day));
    let h = Math.floor((gap %(day))/(hour));
    let m = Math.floor((gap %(hour))/(minute));
    let s = Math.floor((gap %(minute))/(second));

    document.getElementById('day').innerText = d;
    document.getElementById('hour').innerText = h;
    document.getElementById('minute').innerText = m;
    document.getElementById('second').innerText = s;

}
setInterval(function(){
     countDown();
},1000)


