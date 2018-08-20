/**
 * Created by SoulEvans on 20-Aug-18.
 */


$(function() {
    var path = '/wingwahmens-counting/';

    $("#input").on('click', function () {
        var id = $("#id").text();
        var text = $("#input").text();

        $.ajax({
            url: path + 'Controller.php',
            dataType: 'json',
            type: 'POST',
            contentType: "application/json;charset=utf-8",
            data: JSON.stringify({data1: id, data2: text}),
            success: function (data, textStatus, jQxhr) {
                $("#input").text(data[0]);
                if (data.length > 1) {
                    $("#id").text(data[1]);
                } else {
                    ajaxCallGetTime();
                }
            }
        });
    });

    function ajaxCallGetTime() {
        $.ajax({
            url: path + 'Controller.php',
            dataType: 'json',
            type: 'POST',
            contentType: "application/json;charset=utf-8",
            data: JSON.stringify({data1: 'TIME', data2: ''}),
            success: function (data, textStatus, jQxhr) {
                config.countdown.year = data[2];
                config.countdown.month = data[1];
                config.countdown.day = data[0];
                config.countdown.hour = data[3];
                config.countdown.minute = data[4];
                config.countdown.second = data[5];
                countup();

            }

        });
    }

    ajaxCallGetTime();

    $("#history").on('click', function () {
        $.ajax({
            url: path + 'Controller.php',
            dataType: 'json',
            type: 'POST',
            contentType: "application/json;charset=utf-8",
            data: JSON.stringify({data1: 'history', data2: ''}),
            success: function (data, textStatus, jQxhr) {
                $("#entries").append(data[0]);
            }
        });
    });

});