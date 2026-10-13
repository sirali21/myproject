var ctx = document.getElementById('circularLoader').getContext('2d');
var al = 0;
var start = 4.72; 
var cw = ctx.canvas.width;
var ch = ctx.canvas.height;
var diff;
var sim ;

function progressSim() {
    diff = ((al / 100) * Math.PI * 2 * 10).toFixed(2);
    ctx.clearRect(0, 0, cw, ch);

    ctx.lineWidth = 17;
    ctx.fillStyle = "#165d31";
    ctx.strokeStyle = "#165d31";
    ctx.textAlign = "center";
    ctx.font = "28px monospace";

    ctx.fillText(al + '%', cw * 0.52, ch * 0.5 + 5, cw + 12);

    ctx.beginPath();
    ctx.arc(100, 100, 75, start, diff / 10 + start, false);
    ctx.stroke();

    if (al >= 100) {
        clearTimeout(sim);
        loader.style.display = 'none'; 
      myModal.show();
      explode(window.innerWidth / 2, window.innerHeight / 2);
    }

    al++;
}

//var sim = setInterval(progressSim, 20);


const win = document.querySelector("#winner");
const loader = document.querySelector(".loader-con");

var myModal = new bootstrap.Modal(document.getElementById('modal'),
 {keyboard: false

})


win.addEventListener('click', function(){
loader.style.display = 'block';
   
 sim = setInterval(progressSim, 80);
});
