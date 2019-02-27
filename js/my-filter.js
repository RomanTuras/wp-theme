$(document).ready(function () {

    var href = window.location.href;
    var origin = window.location.origin + '/';
    if(href != origin){
        getCheckBoxesState(".manufacturerCheckbox");
        getCheckBoxesState(".reliableCheckbox");
    }

    /**
     * Restoring checkboxes state
     * @param className
     */
    function getCheckBoxesState(className) {
        if (typeof(Storage) !== "undefined") {
            $(className).each(function() {
                var name = $(this).val().toString();
                var val = localStorage.getItem(name);
                $(this).prop("checked", ( val == 'true' ));
            });
        } else {
            console.log('Sorry! No Web Storage support..');
        }
    }

    /**
     * Saving checkboxes state
     * @param className
     */
    function saveCheckBoxesState(className) {
        if (typeof(Storage) !== "undefined") {
            $(className).each(function() {
                var name = $(this).val();
                localStorage.setItem(name.toString(), $(this).prop('checked'));
            });
        } else {
            console.log('Sorry! No Web Storage support..');
        }
    }



    $("#submit").click(function() {
        saveCheckBoxesState(".manufacturerCheckbox");
        saveCheckBoxesState(".reliableCheckbox");
        var selectedValues = getValueUsingClass();
        window.location = '/filter/?manufacturers=' +
            selectedValues['manufacturers'] + '&reliables=' + selectedValues['reliables'];

        // $.ajax({
        //     type: "GET",
        //     url: 'http://www.wp.org/wp-admin/admin-ajax.php',
        //     data: 'action=taxonomy&manufacturers=' +
        //     selectedValues['manufacturers'] + '&reliables=' + selectedValues['reliables'],
        //     success: function(products){
        //         console.log(products);
        //         window.location = '/filter/?manufacturers=' +
        //             selectedValues['manufacturers'] + '&reliables=' + selectedValues['reliables'];
        //         // return 0;
        //         var html = renderFilterResult(products);
        //         $('#showcase').html(html);
        //     }
        // });
    });
});

/**
 * Getting checkboxes values by class name
 * return array of values or 'all' label if selected nothing
 */
function getValueUsingClass(){
    var chkArray = [];
    
    $(".manufacturerCheckbox:checked").each(function() {
        chkArray.push($(this).val());
    });
    
    var selectedValues = [];
    
    if(chkArray.length > 0){
        var selectedManufacturers = chkArray.join(',');
    }else {
        selectedManufacturers = 'all';
    }

    chkArray = [];
    $(".reliableCheckbox:checked").each(function() {
        chkArray.push($(this).val());
    });
    
    if(chkArray.length > 0){
        var selectedReliables = chkArray.join(',');
    }else {
        selectedReliables = 'all';
    }

    selectedValues['manufacturers'] = selectedManufacturers; 
    selectedValues['reliables'] = selectedReliables;
    return selectedValues;
}

function renderFilterResult(products){
    var html = '';
    var obj = JSON.parse(products);
    console.log(products);
    for(var i=0; i<obj.length; i++){
        // console.log(obj[i].title)
        html += '<div class="showcase col-md-4">';
        html += '<h2>' + obj[i].title + '</h2>';
        html += '<span class="post-img"><img src="' + obj[i].thumbnail + '"></img></span>';
        html += '<span class="post-img"></span>';
        html += '<p>' + obj[i].excerpt + '</p>';
        html += '<p><a class="btn btn-secondary" href="/product/' + obj[i].post_name + '" role="button">View details &raquo;</a></p>';
        html += '</div>';
    }
    return html;
}