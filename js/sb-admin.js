const MIN_CAMERA_ID = 0
const MAX_CAMERA_ID = 1
const VIDEO_FEED_DELAY = 3000;
const VIDEO_FEED_SRC_URL = "get_current_view.php?camera="

const SENSOR_READINGS_COUNT = 7;
const SENSOR_READINGS_DELAY = 2000;

var current_camera = 0;
var video_feed_handler;
var sensor_readings_handler;

$(function() {
    $("#pause-sensors-menu-item")
        .data("state", "paused")
        .click(function() {
            if($(this).data("state") == "play") {
                $(this).data("state", "paused").children("i").removeClass("fa-pause").addClass("fa-play");
                $("[id$=-progress]").removeClass("progress-striped active");
                window.clearInterval(sensor_readings_handler);
            } else {
                $(this).data("state", "play").children("i").removeClass("fa-play").addClass("fa-pause");
                $("[id$=-progress]").addClass("progress-striped active");
                update_sensor_readings();
                sensor_readings_handler = window.setInterval(update_sensor_readings, SENSOR_READINGS_DELAY);
            }
        })
        .trigger("click");

    $("#pause-video-menu-item")
        .data("state", "paused")
        .click(function() {
            if($(this).data("state") == "play") {
                $(this).data("state", "paused").children("i").removeClass("fa-pause").addClass("fa-play");
                window.clearInterval(video_feed_handler);
            } else {
                $(this).data("state", "play").children("i").removeClass("fa-play").addClass("fa-pause");
                update_video_feed();
                video_feed_handler = window.setInterval(update_video_feed, VIDEO_FEED_DELAY);
            }
        })
        .trigger("click");

    $("#capture-video-menu-item").click(function() {window.location.href = VIDEO_FEED_SRC_URL + current_camera;});

    $("#next-camera-menu-item").click(function() {
        if($(this).parent().hasClass("disabled")) return;

        if(current_camera < MAX_CAMERA_ID) {
            ++current_camera;
            update_video_feed();
            $("#prev-camera-menu-item").parent().removeClass("disabled");
            if(current_camera == MAX_CAMERA_ID) $(this).parent().addClass("disabled");
            else                                $(this).parent().removeClass("disabled");
        } else $(this).parent().addClass("disabled");
    });

    $("#prev-camera-menu-item")
        .click(function() {
            if($(this).parent().hasClass("disabled")) return;

            if(current_camera > MIN_CAMERA_ID) {
                --current_camera;
                update_video_feed();
                $("#next-camera-menu-item").parent().removeClass("disabled");
                if(current_camera == MIN_CAMERA_ID) $(this).parent().addClass("disabled");
                else                                $(this).parent().removeClass("disabled");
            } else $(this).parent().addClass("disabled");
        })
        .parent().addClass("disabled");

    $("#camera-grid-menu-item").click(function() {window.location.href = "view_camera_grid.php"});
});

function update_video_feed() {
    $("#video-feed-area").attr("src", VIDEO_FEED_SRC_URL + current_camera);
}

function update_sensor_readings() {
    $.getJSON("get_last_readings.php?limit=" + SENSOR_READINGS_COUNT, function(data) {
        $("#sensor-readings-table > tbody").empty();
        $.map(data, function(reading) {$("#sensor-readings-table > tbody").prepend(
            "<tr><td>" + reading.T
            + "</td><td>" + reading.t0 + "</td><td>" + reading.l0 + "</td><td>" + reading.h0 
            + "</td><td>" + reading.t1 + "</td><td>" + reading.l1 + "</td><td>" + reading.h1
            + "</td></tr>"
        );});
 
       var last = data.pop();
       update_progress_bar($("#current-t0-progress .progress-bar"), last.t0, " \xB0C");
       update_progress_bar($("#current-l0-progress .progress-bar"), last.l0, "");
       update_progress_bar($("#current-h0-progress .progress-bar"), last.h0, "");
       update_progress_bar($("#current-t1-progress .progress-bar"), last.t1, " \xB0C");
       update_progress_bar($("#current-l1-progress .progress-bar"), last.l1, "");
       update_progress_bar($("#current-h1-progress .progress-bar"), last.h1, "");
    });
}

function update_progress_bar(pgb, val, suffix) {
    $(pgb).css("width", ((100.0 * (val - $(pgb).attr("aria-valuemin"))) / ($(pgb).attr("aria-valuemax") - $(pgb).attr("aria-valuemin"))) + "%")
          .attr("aria-valuenow", val)
          .children("span").text(val + suffix);
}
