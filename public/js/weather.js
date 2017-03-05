$(function() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success, error);
    }
    else {
        $("#temp").html("<strong>Your browser doesn't have HTML5 support! :(</strong>")
    }
    function error(e) {
        $("#temp").html("<strong>No HTTPS yet, so geolocation won't work in Chrome :(" +
            " </strong>")
        setUpManualEntry("Enter your city and country manually")
    }

    function success(position) {
        var geo = {}
        geo.lat = position.coords.latitude;
        geo.lng = position.coords.longitude;
        getWeatherByLatLong(geo);       
        setUpManualEntry();
    }

    /* Sets the div with the ID `temp` to a user-friendly message displaying the given
    weather conditions. */
    var printWeather = function (city, cond, temp)
    {
        var msg = "(Data from Yahoo! Weather API)";
        $('#temp').html("<br><strong>Current Weather: </strong>The weather right now in " + city + " is " + cond +
                " with a temp of " + temp.toFixed(1) + "\xB0C.<br><h5>" + msg + "</h5>");
    }

    var promptCityAndGetWeather = function() 
    {
        var newCity = prompt("Please enter your city and country:", '');
        getWeatherByCity(city);
    }

    var getWeatherByCity = function(city, url) 
    {
        if (city == null) return;
        url = url || "http://api.openweathermap.org/data/2.5/weather?q=" + city +
                    "&appid=050682ce75e55e9727deeeac96fca361";
		url = url || "https://query.yahooapis.com/v1/public/yql?q=select * from weather.forecast where woeid in (select woeid from geo.places(1) where text='(" + city + ")')&format=json"

        $.getJSON(url, function (result) {
            var city = result.name;
            var temp = result.main.temp - 273.15;
            var cond = result.weather[0].description;
            var ctry = result.sys.country;
            printWeather(city, cond, temp);
        });
    }

    var getWeatherByLatLong = function(geo) 
    {
        var url = "https://query.yahooapis.com/v1/public/yql?q=select * from weather.forecast where woeid in (select woeid from geo.places(1) where text='(" + geo.lat + ","+geo.lng + ")')&format=json"
		getWeatherByCity('', url);
    }

    var setUpManualEntry = function(text)
    {
        text = text || "Not Your Location?";
        var $wrongLoc = $('#wrongloc');
        $wrongLoc.html("Not Your Location?");
        $wrongLoc.hover(function() {
            $wrongLoc.css({"text-decoration": "underline"})
        },
        function() {
            $wrongLoc.css({"text-decoration": "none"})
        });
        $wrongLoc.click(promptCityAndGetWeather);
    }
});
