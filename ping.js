var oids = 'oid=',
    pingInterval = 5000;

// Get all object-IDs
$('#object-container').each(function() {
    oids += $(this).attr('data-oid') + ',';
});

var pinger = window.setInterval(function() {
    $.ajax({
        method: 'POST',
        url: '/ajax/ping', // Set via static route in pimcore
        data: oids
    }).done(function(returnData) {
        if (returnData.success === true) {
            $.each(returnData.data, function(oid, timestamp) {
                if ($('.object[data-oid="' + oid + '"]').attr('data-latest-version') < timestamp) {
                    console.log('Object with ID ' + oid + ' has changed!');
                }
            });
        }
        else {
            console.log(returnData.data);
        }
    });
}, pingInterval);
