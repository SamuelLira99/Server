var fromTime;
var toTime;
var videoSource;
var customFilename;

$(document).ready(function() {
    $("#btn-extract-audio").unbind().click(extractAudio);
    $("#ffmpeg-custom-filename").keyup(function(e) {
        // alert(e.keyCode+' pressed');
        customFilename = $("#ffmpeg-custom-filename").val()+'.mp3';
        $("#link-download-audio").attr('download', customFilename);
    });
});

function extractAudio() {
    $("#btn-extract-audio").prop('disabled', true).html('お待ちください');
    $("#btn-download-audio").prop('disabled', true);

    fromTime = $("#ffmpeg-string-from").val();
    toTime = $("#ffmpeg-string-to").val();

    videoSource = $("#vd source").attr("src");


    // var command = '/usr/bin/ffmpeg -y -i "/home/samuel/Vídeos/アニメ/'+videoSource+'" -ss '+fromTime+' -to '+toTime+' "/home/samuel/tmp/文.ogg" 2>&1';
    // command = 'ffmpeg -y -i "/home/samuel/Vídeos/アニメ/ワンピース/ワンピース第001話.mkv" -ss 10 -to 15 "/home/samuel/tmp/文.mp3"';

    // console.log('command => \''+command+'\'');

    $.ajax({
        url: '/ajax/aj-extract-audio.php',
        method: 'post',
        data: {
            videoSource: videoSource,
            fromTime: fromTime,
            toTime: toTime
        },
        success: function(res) {
            res = JSON.parse(res);
            console.log('file => ' + res.file);
            // console.log('output => '+res.output);

            $("#ffmpeg audio").remove();
            $("#ffmpeg").prepend("<audio controls>\n<source src='/tmp/" + res.file + "'>\n</audio>");
            $("#btn-extract-audio").prop('disabled', false).html('オーディオをextractする');
            $("#btn-download-audio").prop('disabled', false);

            $("#link-download-audio").attr('href', '/tmp/' + res.file);

        }
    });
}
