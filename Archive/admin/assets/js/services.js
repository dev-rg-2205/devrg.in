let projectTable;

$(document).ready(function () {

    // INIT DATATABLE (ONLY ONCE)
  serviceTable = $('#tableServices').DataTable({
    responsive: true,
    ajax: {
        url: 'service/listServices.php',
        dataSrc: res => res.Status ? res.Data : []
    },
    columns: [
        {
            data: 'createdAt',
            render: d => new Date(d).toLocaleDateString()
        },
        { data: 'title' },
        { data: 'description' },
        { data: 'icon' },
        {
            data: null,
            className: 'text-center',
            render: edu => `
                <button class="btn btn-primary btn-sm edit-btn">
                    Edit
                </button>
                <button class="btn btn-danger btn-sm delete-btn"
                    data-id="${edu.id}">
                    Delete
                </button>
            `
        }
    ]
});

    // ADD Service
    $('#serviceForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'service/createService.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: 'json',
            success: res => {
                alert(res.Message);
                if (res.Status) {
                    $('#addServiceModal').modal('hide');
                    this.reset();
                    serviceTable.ajax.reload(null, false);
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

        let service = serviceTable.row(tr).data();

        console.log(service); // 🔍 DEBUG (optional)


        $('#currentServiceId').val(service.id);
        $('#currentServiceTitle').val(service.title);
        $('#currentServiceDescription').val(service.description);
        $('#currentServiceIcon').val(service.icon);

        $('#updateServiceModal').modal('show');
    });


    // UPDATE SERVICE
    $('#updateServiceForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'service/editService.php?id=' + $('#currentServiceId').val(),
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: 'json',
            success: res => {
                alert(res.Message);
                if (res.Status) {
                    $('#updateServiceModal').modal('hide');
                    serviceTable.ajax.reload(null, false);
                }
            }
        });
    });

    // DELETE SERVICE
    $(document).on('click', '.delete-btn', function () {
        if (!confirm('Delete this service?')) return;
        $.getJSON('service/deleteService.php?id=' + $(this).data('id'), res => {
            alert(res.Message);
            if (res.Status) serviceTable.ajax.reload(null, false);
        });
    });

});
