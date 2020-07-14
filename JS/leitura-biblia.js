$(document).ready(function() {
    // alert('bora ler');

    $.ajax({
        url: '../ajax/aj-bible-books.php',
        method: 'post',
        data: {
            action: 'populate'
        },
        success: function(res) {
            res = JSON.parse(res);

            console.log(res);

            $("#title-last-read").html(res.last_read_book);

            $("#tbl-bible-read").html(res.table);

            $("input").unbind().click(function() {
                var pkId = $(this).prop("id");
                var alreadyRead = $(this).prop('checked');

                // console.log('id[' + pkId + ']: ' + alreadyRead);
                // console.log('numOnly => "' + pkId.match(/\d+/) + '"');
                pkId = pkId.match(/\d+/);
                // pkId = pkId[0];

                if (alreadyRead) {
                    var book = $("#book-id-" + pkId).html();
                    var chapter = $("#chapter-id-" + pkId).html();
                    updateData(pkId[0], alreadyRead, book, chapter);
                } else {
                    updateData(pkId[0], alreadyRead);
                }

                // console.log('pkId[0] => "' + pkId[0] + '"');
                // console.log('alreadyRead => ' + alreadyRead);
                console.log('book => ' + book);
                console.log('chapter => ' + chapter);



            });
        },
        error: function(jqXHR, exception) {
            alert('erro no ajax (from JS)\n Error code: ' + jqXHR.status);
        }
    });

    // updateData(pkId, alreadyRead, book);



    // alert('vai entender, ne');
});

function updateData(pkId, alreadyRead, book = null, chapter = null) {
    // console.log('last book => ' + book + ' ' + chapter);
    $.ajax({
        url: '../ajax/aj-bible-read.php',
        method: 'post',
        data: {
            id: pkId,
            alreadyRead: alreadyRead,
            book: book,
            chapter: chapter
        },
        success: function(res) {
            res = JSON.parse(res);
            console.log(res);

            if (book != null && chapter != null) {
                $("#title-last-read").html(res.last_read_book);
            }
        },
        error: function(jqXHR, exception) {
            alert('erro no ajax (from JS)\n Error code: ' + jqXHR.status);
        },
        complete: function(xhr, textStatus) {
            console.log(xhr.status);
        }
    });
}