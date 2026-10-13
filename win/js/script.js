
var countDownDate = new Date("Sep 23, 2026 00:00:00").getTime();

var x = setInterval(function () {
    var counter = document.querySelector("#countDown");

    var now = new Date().getTime();


    var distance = countDownDate - now;


    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);


    counter.innerHTML = days + "  ايام " + hours + "ساعه"
        + minutes + "دقيقه" + seconds + "ثانية ";


    if (distance < 0) {
        clearInterval(x);
        counter.innerHTML = "فاتك التسجيل معوض خير";
    }
}, 1000);

window.onload = function () {

    const canvas = document.getElementById("fireworks");
    const ctx = canvas.getContext("2d");

    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    resizeCanvas();
    window.addEventListener("resize", resizeCanvas);

    let particles = [];

    function Firework(x, y) {
        this.x = x;
        this.y = y;
        this.radius = Math.random() * 15 + 13;
        this.color = `hsl(${Math.random() * 360}, 100%, 50%)`;
        this.speedX = Math.random() * 4 - 2;
        this.speedY = Math.random() * 4 - 2;
        this.alpha = 1;
    }

    Firework.prototype.update = function () {
        this.x += this.speedX;
        this.y += this.speedY;
        this.alpha -= 0.02;
    };

    Firework.prototype.draw = function () {
        ctx.globalAlpha = this.alpha;
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
        ctx.fillStyle = this.color;
        ctx.fill();
    };

    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        particles.forEach((p, i) => {
            p.update();
            p.draw();
            if (p.alpha <= 0) particles.splice(i, 1);
        });

        requestAnimationFrame(animate);
    }
    animate();

    window.explode = function (x, y) {
        for (let i = 0; i < 40; i++) {
            particles.push(new Firework(x, y));
        }
    };

};




