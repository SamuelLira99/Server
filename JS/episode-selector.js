$(document).ready(function() {
  var animeName = $('#h1-anime-name').html()

  $('.episode-changer').unbind().click(function() {
    var videoFile = $(this).attr('data-anime-dir') + '/' + $(this).attr('data-file')

    $('#video_player video').remove();
    $("#video_player").prepend('<video id="vd" controls="" width="853" height="480"><source src="'+videoFile+'"></video>');
    console.log(videoFile)

    var matches = videoFile.match(/\d+/g)
    var episodeNumber = matches[0]


    $('#h1-anime-name').html('')
    $('#h1-anime-name').html(animeName+'第'+episodeNumber+'話')

    const vd = $("#vd");

    $("#vd").keydown(function(e) {
        console.log("Keydown from body");
        bindEvents(e);
    });

    bindEvents(e)
  })




})
