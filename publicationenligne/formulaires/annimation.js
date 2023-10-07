const titrespans =document.querySelectorAll('h1 span');
const btn1 =document.querySelectorAll('btn1');
const logo =document.querySelectorAll('logo');
const images=document.querySelectorAll('images');
const l1=document.querySelectorAll('l1');
const l2=document.querySelectorAll('l2');

window.addEventListener('load',()=>{

const TL =gsap.timeline({paused:true});
TL.staggerForm(titrespans, 1, {top: -50, opacity:0, ease: "power2.out"}, 0.3)
TL.play();

})
