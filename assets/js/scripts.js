$('#btn-cek').click(function () {
    var nama = $('input#name').val()
    $('#error').text('Loading...').addClass('text-primary').removeClass('text-danger').removeClass('text-success')
    $.post('/shortlink/check', {
        link: nama
    }, function (data) {
        if (data == 'true') {
            $('#error').text('* Available').addClass('text-success')
        } else {
            $('#error').text('* Not available').addClass('text-danger')
            $('#name').addClass('border-danger')
        }
    })
})

$('#copy-url').click(function () {
    var copyText = document.getElementById("url-short")

    /* Select the text field */
    copyText.select()
    copyText.setSelectionRange(0, 99999) /* For mobile devices */

    /* Copy the text inside the text field */
    document.execCommand("copy")
    $('#error2').text('* Copied').addClass('text-success')
})

