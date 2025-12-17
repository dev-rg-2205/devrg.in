let projectTable;

$(document).ready(function () {

    // INIT DATATABLE (ONLY ONCE)
  experienceTable = $('#tableExperiences').DataTable({
    responsive: true,
    ajax: {
        url: 'experience/listExperiences.php',
        dataSrc: res => res.Status ? res.Data : []
    },
    columns: [
        {
            data: 'createdAt',
            render: d => new Date(d).toLocaleDateString()
        },
        { data: 'designation' },
        { data: 'companyName' },
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
            render: exp => `
                <button class="btn btn-primary btn-sm edit-btn">
                    Edit
                </button>
                <button class="btn btn-danger btn-sm delete-btn"
                    data-id="${exp.id}">
                    Delete
                </button>
            `
        }
    ]
});

    // ADD Experience
    $('#experienceForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'experience/createExperience.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: 'json',
            success: res => {
                alert(res.Message);
                if (res.Status) {
                    $('#addExperienceModal').modal('hide');
                    this.reset();
                    experienceTable.ajax.reload(null, false);
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

            let experience = experienceTable.row(tr).data();

            console.log(experience); // 🔍 DEBUG (optional)


            $('#currentExperienceId').val(experience.id);
            $('#currentExperienceDesignation').val(experience.designation);
            $('#currentExperienceCompanyName').val(experience.companyName);
            $('#currentExperienceStartYear').val(experience.startYear);
            $('#currentExperienceEndYear').val(experience.endYear);
            $('#currentExperienceDetail').val(experience.detail);

            $('#updateExperienceModal').modal('show');
    });


    // UPDATE EXPERIENCE
    $('#updateExperienceForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'experience/editExperience.php?id=' + $('#currentExperienceId').val(),
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: 'json',
            success: res => {
                alert(res.Message);
                if (res.Status) {
                    $('#updateExperienceModal').modal('hide');
                    experienceTable.ajax.reload(null, false);
                }
            }
        });
    });

    // DELETE EDUCATION
    $(document).on('click', '.delete-btn', function () {
        if (!confirm('Delete this experience?')) return;
        $.getJSON('experience/deleteExperience.php?id=' + $(this).data('id'), res => {
            alert(res.Message);
            if (res.Status) experienceTable.ajax.reload(null, false);
        });
    });

});
