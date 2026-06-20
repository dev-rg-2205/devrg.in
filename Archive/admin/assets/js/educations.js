let projectTable;

$(document).ready(function () {

    // INIT DATATABLE (ONLY ONCE)
  educationTable = $('#tableEducations').DataTable({
    responsive: true,
    ajax: {
        url: 'education/listEducations.php',
        dataSrc: res => res.Status ? res.Data : []
    },
    columns: [
        {
            data: 'createdAt',
            render: d => new Date(d).toLocaleDateString()
        },
        { data: 'course' },
        { data: 'university' },

        {
            data: 'startYear',
            render: d => d ? new Date(d + '-01').toLocaleString('en-US', {
                month: 'long',
                year: 'numeric'
            }) : ''
        },
        {
            data: 'endYear',
            render: d => d ? new Date(d + '-01').toLocaleString('en-US', {
                month: 'long',
                year: 'numeric'
            }) : 'Present'
        },

        { data: 'detail' },

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

    // ADD Education
    $('#educationForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'education/createEducation.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: 'json',
            success: res => {
                alert(res.Message);
                if (res.Status) {
                    $('#addEducationModal').modal('hide');
                    this.reset();
                    educationTable.ajax.reload(null, false);
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

        let education = educationTable.row(tr).data();

        console.log(education); // 🔍 DEBUG (optional)


        $('#currentEducationId').val(education.id);
        $('#currentEducationCourse').val(education.course);
        $('#currentEducationUniversity').val(education.university);
        $('#currentEducationStartYear').val(education.startYear);
        $('#currentEducationEndYear').val(education.endYear);
        $('#currentEducationDetail').val(education.detail);
        
        $('#updateEducationModal').modal('show');
    });


    // UPDATE EDUCATION
    $('#updateEducationForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'education/editEducation.php?id=' + $('#currentEducationId').val(),
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: 'json',
            success: res => {
                alert(res.Message);
                if (res.Status) {
                    $('#updateEducationModal').modal('hide');
                    educationTable.ajax.reload(null, false);
                }
            }
        });
    });

    // DELETE EDUCATION
    $(document).on('click', '.delete-btn', function () {
        if (!confirm('Delete this education?')) return;
        $.getJSON('education/deleteEducation.php?id=' + $(this).data('id'), res => {
            alert(res.Message);
            if (res.Status) educationTable.ajax.reload(null, false);
        });
    });

});
