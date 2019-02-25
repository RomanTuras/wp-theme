$(document).ready(function () {
    $("#submit").click(function() {
        var selectedValues = getValueUsingClass();
        $.ajax({
            type: "GET",
            url: 'http://www.wp.org/wp-admin/admin-ajax.php',
            data: 'action=taxonomy&param=' + selectedValues,
            success: function(products){
                var html = renderFilterResult(products)
                $('div#showcase').html(html);
            }
        });
    });
});

/**
 * Getting checkboxes values by class name
 * return array of values or 'all' label if selected nothing
 */
function getValueUsingClass(){
    var chkArray = [];
    
    $(".filterCheckbox:checked").each(function() {
        chkArray.push($(this).val());
    });
    
    var selectedValues;
    
    if(chkArray.length > 0){
        selectedValues = chkArray.join(',');
    }else {
        selectedValues = 'all';
    }
    return selectedValues;
}

function renderFilterResult(products){
    var html = '';
    var obj = JSON.parse(products);
    console.log(obj);
    for(var i=0; i<obj.length; i++){
        console.log(obj[i].title)
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