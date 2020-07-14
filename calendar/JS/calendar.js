var isBissexto = true

$(document).ready(function() {


    getCalendar();

})

function getCurrentDay(calendar, id) {
    var occurrencesRed = $('#tr-red').html()
    var occurrencesOrange = $('#tr-orange').html()
    var occurrencesYellow = $('#tr-yellow').html()
    var color = '#ccc'
    var success = false

    console.log('Id: ' + id)

    $('#day_info').html(
        calendar[id].id + '<br>' +
        calendar[id].day + '<br>'
    )
    $('#calendar_info').css('background-color', calendar[id].bg_color)

    $('#calendar_info table tbody tr').html(
        '<td></td>' +
        '<td id="tr-yellow">' + calendar[id].occurrences_yellow + '</td>' +
        '<td id="tr-orange">' + calendar[id].occurrences_orange + '</td>' +
        '<td id="tr-red">' + calendar[id].occurrences_red + '</td>'
    )

    $('#btn-update').remove()

    if (calendar[id].bg_color == '#ccc') {
        $('#calendar_info').append(
            '<button id="btn-update" class="btn btn-primary">更新</button>'
        )

        $('#add_red').unbind().click(function() {
            occurrencesRed++
            $('#tr-red').html(occurrencesRed)
            $('#calendar_info').css('background-color', 'red')
        })

        $('#add_orange').unbind().click(function() {
            occurrencesOrange++
            $('#tr-orange').html(occurrencesOrange)
            $('#calendar_info').css('background-color', 'orange')
        })

        $('#add_yellow').unbind().click(function() {
            occurrencesYellow++
            $('#tr-yellow').html(occurrencesYellow)
            $('#calendar_info').css('background-color', '#fff000')
        })

        $('#add_green').unbind().click(function() {
            occurrencesRed = 0
            occurrencesOrange = 0
            occurrencesYellow = 0

            success = true

            $('#tr-red').html(occurrencesRed)
            $('#tr-red').html(occurrencesOrange)
            $('#tr-red').html(occurrencesYellow)

            $('#tr-red').html(occurrencesRed)
            $('#tr-orange').html(occurrencesOrange)
            $('#tr-yellow').html(occurrencesYellow)

            $('#calendar_info').css('background-color', '#43fa40')

        })

        $('#btn-update').unbind().click(function() {
            //alert('{Y:' + $("#tr-yellow").html() + ', O:' + $("#tr-orange").html() + ', R:' + $("#tr-red").html() + '}')

            if (occurrencesRed > 0) {
                color = 'red'
            } else {
                if (occurrencesOrange > 0) {
                    color = 'orange'
                } else {
                    if (occurrencesYellow > 0) {
                        color = '#fff000'
                    } else {
                        if (occurrencesRed < 1 && occurrencesOrange < 1 && occurrencesYellow < 1 && success) {
                            color = '#43fa40'
                        }
                    }
                }
            }

            $.ajax({
                url: '/ajax/aj-update-calendar.php',
                method: 'post',
                data: {
                    id: (parseInt(id) + 1),
                    red_occurrences: $("#tr-red").html(),
                    orange_occurrences: $("#tr-orange").html(),
                    yellow_occurrences: $("#tr-yellow").html(),
                    color: color
                },
                success: function(res) {
                    console.log(res)
                    getCalendar();
                },
                error: function(a, b, c) {
                    console.log(c)
                }
            })
        })

    }
}

function getCalendar() {
    $.ajax({
        url: '/ajax/aj-get-calendar.php',
        data: { is_bissexto: isBissexto },
        method: 'post',
        success: function(res) {
            res = JSON.parse(res)
            console.log(res)

            // $('#day-2').css("background-color", res.jan[1].bg_color)

            // TRYING FOR SINGLE-CODE

            for (var month in res.tbody) {
                //console.log('month: ' + month)

                $('#tbl-' + month + ' tbody').html(res.tbody[month])

                //console.log($('#tbl-' + month + ' tr td').length);

                for (var i = 0; i < $('#tbl-' + month + ' tr td').length; i++) {
                    // console.log(i)
                    var tdId = $('#tbl-' + month + ' td').eq(i).prop("id").slice(3)

                    if (tdId != null && tdId.length > 0) {
                        //console.log('id => ' + tdId)

                        $('#td-' + tdId).css("background-color", res.calendar[tdId - 1].bg_color)
                    }
                }
            }


            // TRYING FOR SINGLE-CODE END

            getCurrentDay(res.calendar, res.doy) // doy = DayOfYear

            $('table.month tbody td').unbind().click(function() {
                //console.log('clicked td')
                var tmpId = $(this).prop('id').slice(3)
                console.log('tmpId: ' + tmpId)
                getCurrentDay(res.calendar, (tmpId - 1))

                //var html = $('#calendar_info').html()

                //$('#day_info').html(
                //$(this).prop('id') + '<br>' +
                //$(this).html() + '<br>'
                //)
                //$('#calendar_info').css('background-color', $(this).css('background-color'))

            })

        }
    })
}