$(function() {
    $('.weatherbtn').click(function() {
        var geo = {};
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, error);
        } else {
            $("#temp").html("<strong>Your browser doesn't have HTML5 support! :(</strong> " + e.message)
        }

        function error(e) {
            // TODO: Friendly error message
        }

        function success(position) {
            geo.lat = position.coords.latitude;
            geo.lng = position.coords.longitude;
            var city, temp, cond, ctry;
            var weather = "https://query.yahooapis.com/v1/public/yql?q=select * from weather.forecast where woeid in (select woeid from geo.places(1) where text='(" + geo.lat + "," + geo.lng + ")')&format=json";
            var $wrongLoc = $('#wrongloc');
            $wrongLoc.html("Not Your Location?");
            $wrongLoc.hover(function() {
                    $wrongLoc.css({ "text-decoration": "underline" })
                },
                function() {
                    $wrongLoc.css({ "text-decoration": "none" })
                });
            var f = function(result) {
                city = result.query.results.channel.location.city;
                temp = (+result.query.results.channel.item.condition.temp - 32) / 1.8;
                cond = result.query.results.channel.item.condition.text;
                ctry = result.query.results.channel.location.country;
                printWeather(city, cond, temp);
            };
            $.getJSON(weather, f);

            $wrongLoc.click(function() {
                var newCity = prompt("Please enter your city:", city);
                if (newCity != null) {
                    weather = "https://query.yahooapis.com/v1/public/yql?q=select * from weather.forecast where woeid in (select woeid from geo.places(1) where text='" + newCity + "," + ctry + "')&format=json";
                    "&appid=050682ce75e55e9727deeeac96fca361";
                    $.getJSON(weather, f);
                }
            });

        }

        function printWeather(city, cond, temp) {
            var msg = "(Data from Yahoo Weather API)";
            $('#temp').html("<br><strong>Current Weather: </strong>The weather right now in " + city + " is " + cond +
                " with a temp of " + temp.toFixed(1) + "\xB0C.<br><h5>" + msg + "</h5>");
        }
    });
});