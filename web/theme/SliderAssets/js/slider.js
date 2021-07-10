function changeStatus(id, url) {
    $.ajax({
        url: url,
        type: 'post',
        data: {
            id: id
        },
        success: function (data) {
            if(data.status != 1) {
                alert('Status Changes Failed !');
            }
        }
    });
}