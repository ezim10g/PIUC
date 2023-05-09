let bg = document.getElementById("bg");
let bgfundo = document.getElementById("bgfundo");
let bgwind = document.getElementById("bgwind");

window.addEventListener('scroll', function() {
    var value = window.scrollY;

    bg.style.top = value * 0.5 + 'px';
    bgfundo.style.right = - value * 0.5 + 'px';
    bgwind.style.left = value * 0.15 + 'px';

});

function animateLeft(obj, from, to){
    if(from >= to){         
        /*obj.style.visibility = 'hidden';*/
        return;  
    }
    else {
        var box = obj;
        box.style.marginLeft = from + "px";
        setTimeout(function(){
            animateLeft(obj, from + 1, to);
        }, 25) 
    }
 }
 
 function animateMe() {

 animateLeft(document.getElementById('bgwind'), 100, 900);

 }