function CountDown(settings) {
    var glob = settings;
    function deg(deg) {
        return (Math.PI / 180) * deg - (Math.PI / 180) * 90
    }

    glob.total = Math.floor(settings.seconds);
    glob.current = Math.floor(0);
    var clock = {
        set: {
            seconds: function() {
                var cSec = $(settings.clockobj).get(0);
                var ctx = cSec.getContext("2d");
                ctx.clearRect(0, 0, cSec.width, cSec.height);
                ctx.beginPath();
                ctx.strokeStyle = glob.secondsColor;
                ctx.shadowBlur = 10;
                ctx.shadowOffsetX = 0;
                ctx.shadowOffsetY = 0;
                ctx.shadowColor = glob.secondsGlow;
//deg((360 / glob.total) * (glob.total - glob.days)
                ctx.arc(94, 94, 85, deg(0), deg((360 / glob.total) * (glob.current - glob.total)));
                ctx.lineWidth = 17;
                ctx.stroke();
                $(settings.clocktextobj).text(glob.total - glob.current);
            }, maketext: function() {
                var v = glob.total - glob.current;
            }
        },
        start: function() {
            /* Seconds */
            var cdown = setInterval(function() {
                if (glob.total - glob.current == 1) {
                    clearInterval(cdown);

//                        /* Countdown is complete */
                    glob.current++;
                    clock.set.seconds();
                    alert('asdasd');
                    return;
                }

                glob.current++;
                clock.set.seconds();
            }, 1000);
        }
    }
    clock.set.seconds();
    clock.start();
}