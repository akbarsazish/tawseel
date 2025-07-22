$(document).on('submit', '#myForm', function(e) 
{
    e.preventDefault();

    // Show loading indicator
    $('#content').html("<div class='w3-display-middle loader-wrapper'><div class='loader'><div class='circle-one'></div><div class='circle-two'></div></div></div>");
    
    // Get URL from data attribute
    var formUrl = $(this).data('url'); 
    // Get form data
    var formData = new FormData(this);
    
    $.ajax({
        url: formUrl,
        type: 'POST',
        data: formData,
        processData: false,  // Required for FormData
        contentType: false,  // Required for FormData
        success: function(response) 
        {
            $('#content').html(response);
        },
        error: function(xhr) {
            $('#content').html(`
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    Failed to post data. ${xhr.responseText || 'Please try again later.'}
                </div>
            `);
        }
    });
});

function clearSearch() {
    $('#search').val('');
    $('#myForm').submit(); // Optionally submit after clearing
}

function loadMe(myurl,there) 
{
    if(!there)
    {
        there = '#content';
    }
    $(there).html("<div class='w3-display-middle loader-wrapper'><div class='loader'><div class='circle-one'></div><div class='circle-two'></div></div></div>");
    $.ajax({
        url: myurl,
        type: 'GET',
        dataType: 'html',
        success: function(html) 
        {
            $(there).html(html);
        },
        error: function(xhr) {
            $(there).html(`
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    Failed to load data. ${xhr.responseText || 'Please try again later.'}
                </div>
            `);
        },
    });
}