$(function() {
    var geo = {};
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success, error);
    }
    else {
        $("#temp").html("<strong>Your browser doesn't have HTML5 support! :(</strong> " + e.message)
    }
    function error(e) {
        // TODO: Friendly error message
    }

    function success(position) {
        geo.lat = position.coords.latitude;
        geo.lng = position.coords.longitude;
        var weather = "http://api.openweathermap.org/data/2.5/weather?lat=" + geo.lat + "&lon=" + geo.lng + "&appid=050682ce75e55e9727deeeac96fca361";
        var city, temp, cond, ctry;
        var $wrongLoc = $('#wrongloc');
        $wrongLoc.html("Not Your Location?");
        $wrongLoc.hover(function() {
            $wrongLoc.css({"text-decoration": "underline"})
        },
        function() {
            $wrongLoc.css({"text-decoration": "none"})
        });
        var f = function (result) {
            city = result.name;
            temp = result.main.temp - 273.15;
            cond = result.weather[0].description;
            ctry = result.sys.country;
            printWeather(city, cond, temp);
        };
        $.getJSON(weather, f);

        $wrongLoc.click(function() {
            var newCity = prompt("Please enter your city:", city);
            if (newCity != null)
            {
                weather = "http://api.openweathermap.org/data/2.5/weather?q=" + newCity + "," + ctry +
                        "&appid=050682ce75e55e9727deeeac96fca361";
                $.getJSON(weather, f);
            }
        });

    }

    function printWeather(city, cond, temp)
    {
        var msg = "(Data from OpenWeatherMap API)";
        $('#temp').html("<br><strong>Current Weather: </strong>The weather right now in " + city + " is " + cond +
                " with a temp of " + temp.toFixed(1) + "\xB0C.<br><h5>" + msg + "</h5>");
    }
});