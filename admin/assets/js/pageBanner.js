let pageBannerTable;

$(document).ready(function () {

    // INIT DATATABLE (ONLY ONCE)
    pageBannerTable = $('#tablePageBanners').DataTable({
        responsive: true,
        ajax: {
            url: 'pageBanner/listPageBanners.php',
            dataSrc: res => res.Status ? res.Data : []
        },
        columns: [
            {
                data: 'createdAt',
                render: d => new Date(d).toLocaleDateString()
            },
            { data: 'pageName'},
            { data: 'title'},
            { data: 'subTitle'},
            { data: 'description'},
            {
                data: 'image',
                className: 'text-center',
                render: img =>
                    `<button class="btn btn-info btn-sm view-image-btn"
                        data-toggle="modal"
                        data-target="#pageBannerViewModel"
                        data-image="../../website/public/uploads/pageBanners/${img}">
                        View
                    </button>`
            },
            {
                data: null,
                className: 'text-center',
                render: pageBanner => `
                    <button class="btn btn-primary btn-sm edit-btn">
                        Edit
                    </button>

                    <button class="btn btn-danger btn-sm delete-btn"
                        data-id="${pageBanner.id}">
                        Delete
                    </button>`
            }
        ]   
    });

    // IMAGE MODAL
    $('#pageBannerViewModel').on('show.bs.modal', function (e) {
        const button = e.relatedTarget;
        const image = button.getAttribute('data-image');
        $('#modalViewPageBannerImage').attr('src', image);
     });

    // ADD PAGE BANNER
    $('#pageBannerForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'pageBanner/createPageBanner.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: 'json',
            success: res => {
                alert(res.Message);
                if (res.Status) {
                    $('#addPageBannerModal').modal('hide');
                    this.reset();
                    pageBannerTable.ajax.reload(null, false);
                }
            }
        });
    });

    // OPEN Update MODAL
    $(document).on('click', '.edit-btn', function () {

        let tr = $(this).closest('tr');

        // ✅ Agar responsive child row hai
        if (tr.hasClass('child')) {
        tr = tr.prev(); // parent row
        }

         let pageBanner = pageBannerTable.row(tr).data();

        console.log(pageBanner); // 🔍 DEBUG (optional)


        $('#currentPageBannerId').val(pageBanner.id);
        $('#currentPageBannerPageName').val(pageBanner.pageName);
        $('#currentPageBannerTitle').val(pageBanner.title);
        $('#currentPageBannerSubTitle').val(pageBanner.subTitle);
        $('#currentPageBannerDescription').val(pageBanner.description);

        if (pageBanner.image) {
            $('#currentPageBannerImage')
                .attr('src', '../../website/public/uploads/pageBanners/' + pageBanner.image)
                .show();
        } else {
            $('#currentPageBannerImage').hide();
        }

        $('#updatePageBannerModal').modal('show');
    });


    // UPDATE PAGE BANNER
    $('#updatePageBannerForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'pageBanner/editPageBanner.php?id=' + $('#currentPageBannerId').val(),
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: 'json',
            success: res => {
                alert(res.Message);
                if (res.Status) {
                    $('#updatePageBannerModal').modal('hide');
                    pageBannerTable.ajax.reload(null, false);
                }
            }
        });
    });

    // DELETE PAGE BANNER
    $(document).on('click', '.delete-btn', function () {
        if (!confirm('Delete this page banner?')) return;
        $.getJSON('pageBanner/deletePageBanner.php?id=' + $(this).data('id'), res => {
            alert(res.Message);
            if (res.Status) pageBannerTable.ajax.reload(null, false);
        });
    });

});
