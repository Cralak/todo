$(document).ready(function(){
    $('#upcoming').click(function() {
        //gets all div children of the main div, this returns a jQuery array with the elements
          var divs = $('#alltasks > div');;
        //sorts the divs based on most recent one
        var ordered = divs.sort(function(a, b) {
            return(
            ($(b.children[1].children[0]).attr('title')) ?
            ($(a.children[1].children[0]).attr('title')) ?
            ($(a.children[1].children[0]).attr('title')) > ($(b.children[1].children[0]).attr('title')) :
            1 : -1
        )});
        //empty the main div and re-append the ordered divs
        $('#alltasks').empty().append(ordered);
    });

    //same thing here

    $('#oldest').click(function(){
        var divs = $('#alltasks > div');;
        var ordered = divs.sort(function(a,b) {
            return $(a.children[1].children[1].children[1]).attr('title') > $(b.children[1].children[1].children[1]).attr('title');
        });
        $('#alltasks').empty().append(ordered);
    });

    $('#newest').click(function(){
        var divs = $('#alltasks > div');;
        var ordered = divs.sort(function(a,b) {
            return $(a.children[1].children[1].children[1]).attr('title') < $(b.children[1].children[1].children[1]).attr('title');
        });
        $('#alltasks').empty().append(ordered);
    });
});