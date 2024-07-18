let theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';

var id = document.getElementById('log_value').value;
var url = document.getElementById('url').value;

loadAudio()


function loadAudio(id = null) {

    var block = [];
    var newurl = id != null ? url + '/' + id : url
    console.log('url: ', newurl);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "GET",
        url: newurl,
        async: false,
        success: function (response) {
            block = response
        }
    });
    console.log('block: ', block);

    if (block.length == 0) {
        $('.call_player').hide();
        $('.error_page').show();
    }
    Amplitude.init({
        "bindings": {
            37: 'prev',
            39: 'continue_next',
            32: 'play_pause'
        },
        "callbacks": {
            timeupdate: function () {
                let percentage = Amplitude.getSongPlayedPercentage();

                if (isNaN(percentage)) {
                    percentage = 0;
                }

                /**
                 * Massive Help from: https://nikitahl.com/style-range-input-css
                 */
                let slider = document.getElementById('song-percentage-played');
                slider.style.backgroundSize = percentage + '% 100%';
            }
        },
        "songs": block // static example at the end in comments
    });
}

function Playme(id) {
    loadAudio(id)
}


window.onkeydown = function (e) {
    return !(e.keyCode == 32);
};






