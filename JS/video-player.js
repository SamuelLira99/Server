$(document).ready(function() {
    const vd = $("#vd");

    $("#vd").keydown(function(e) {
        console.log("Keydown from body");
        bindEvents(e);
    });

});

/* KEYMAP
left --> 37
right -> 39
F -----> 70
J -----> 74
L -----> 76

*/




//###############> Atalhos VLC-like <###############\\

//play-pause


function unbindEvents() {
    $("body").unbind();
}

function bindEvents(e) {
    if (e.keyCode == 32) {
        // console.log('paused => ' + vd.paused)
        if (vd.paused) {
            e.preventDefault();
            vd.play();
        } else {
            e.preventDefault();
            vd.pause();
        }
    }

    //3s
    if (e.shiftKey && e.keyCode == 37) {
        vd.currentTime -= 3; // -= 3; += 11;
        e.preventDefault();
    } else if (e.shiftKey && e.keyCode == 39) {
        vd.currentTime += 3; // -= 3; += 11;
        e.preventDefault();
    }

    //10s
    if (e.keyCode == 37 && !e.ctrlKey && !e.shiftKey) {
        vd.currentTime -= 10;
        e.preventDefault();
    } else if (e.keyCode == 39 && !e.ctrlKey && !e.shiftKey) {
        vd.currentTime += 10;
        e.preventDefault();
    }

    //60s
    if (e.ctrlKey && e.keyCode == 37) {
        vd.currentTime -= 60;
        e.preventDefault();
    } else if (e.ctrlKey && e.keyCode == 39) {
        vd.currentTime += 60;
        e.preventDefault();
    }

    //fullscreen
    if (e.keyCode == 70) {
        console.log("window.fullScreen => " + window.fullScreen);
        if (window.fullScreen) {
            document.exitFullscreen();
        } else {
            vd.requestFullscreen();
        }
    }
}

//  (valores adaptados para compensar os 14 segundos padrão do player de video com o attr 'controls')

//3s



// vd.addEventListener('keydown', function(e) {
//     if(e.shiftKey && e.keyCode == 39) {
//         vd.currentTime -= 11;// += 3;
//         e.preventDefault();
//         logActive();
//     }
// });

// //10s
// vd.addEventListener('keydown', function(e) {
//     if(e.keyCode == 37 && !e.ctrlKey && !e.shiftKey) {
//            vd.currentTime += 4;//-= 10;
//            e.preventDefault();
//            logActive();
//     }
// });


// vd.addEventListener('keydown', function(e) {
//     if(e.keyCode == 39 && !e.ctrlKey && !e.shiftKey) {
//         // if(currentTime += 14) {
//         vd.currentTime -= 4;// += 10
//         e.preventDefault();
//         logActive();
//     // }
//     }
// });

// //60s
// vd.addEventListener('keydown', function(e) {
//     if(e.ctrlKey && e.keyCode == 37) {
//         vd.currentTime -= 46;
//         e.preventDefault();
//         logActive();
//     }
// });


// vd.addEventListener('keydown', function(e) {
//     if(e.ctrlKey && e.keyCode == 39) {
//         vd.currentTime += 46;
//         e.preventDefault();
//         logActive();
//     }
// });

// //Play/Pause
// vd.addEventListener('keydown', function(e) {
//     if(e.spaceKey) {
//         //e.preventDefault();
//        if(vd.paused) {
//            vd.play();
//        } else {
//            vd.pause();
//        }
//        logActive();
//     }

// });

// function logActive() {
//     console.log('activeElement -> ' + document.activeElement);
// }

//document.getElementById('vd').play();