$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var paginate = 1;
    var vendorID = $("#vendorID").val();
        loadMoreData(paginate,vendorID);

        // $(window).scroll(function() {
        //     if($(window).scrollTop() + $(window).height() >= $(document).height()) {
        //         paginate++;
        //         loadMoreData(paginate);
        //       }
        // });
        // run function when user reaches to end of the page
        // function loadMoreData(paginate) {
        //     $.ajax({
        //         url: '?page=' + paginate,
        //         type: 'get',
        //         datatype: 'html',
        //         beforeSend: function() {
        //             $('.loading').show();
        //         }
        //     })
        //     .done(function(data) {
        //         if(data.length == 0) {
        //             console.log('no more prod')
        //             $('.loading').html('No more posts.');
        //             return;
        //           } else {
        //             $('.loading').hide();
        //             $('.row-product').append(data);
        //           }
        //     })
        //        .fail(function(jqXHR, ajaxOptions, thrownError) {
        //           alert('Something went wrong.');
        //        });
        // }


        ///// Load data by Click...
        $('#load-more').click(function() {
            var page = $(this).data('paginate');
            var vendorID = $("#vendorID").val();
            console.log('vendor ID: ' +vendorID)
            loadMoreData(page,vendorID);
            $(this).data('paginate', page+1);
        });
        // run function when user click load more button
        function loadMoreData(paginate,vendorID) {
            $.ajax({
                url: '?page=' + paginate + "&vendorID=" + vendorID,
                type: 'get',
                datatype: 'html',
                beforeSend: function() {
                    $('#load-more').text('Loading...');
                }
            })
            .done(function(data) {
                if(data.length == 0) {
                    $('.invisible').removeClass('invisible');
                    $('#load-more').hide();
                    return;
                  } else {
                    $('#load-more').text('Load more...');
                    $('.row-product').append(data);
                  }
            })
               .fail(function(jqXHR, ajaxOptions, thrownError) {
                  alert('Something went wrong.');
               });
        }

});
