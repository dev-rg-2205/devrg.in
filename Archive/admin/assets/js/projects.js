let projectTable;

$(document).ready(function () {

    // INIT DATATABLE (ONLY ONCE)
    projectTable = $('#tableProjects').DataTable({
        responsive: true,
        ajax: {
            url: 'project/listProjects.php',
            dataSrc: res => res.Status ? res.Data : []
        },
        columns: [
            {
                data: 'createdAt',
                render: d => new Date(d).toLocaleDateString()
            },
            { data: 'name'},
            { data: 'url',
              className: 'text-center',
              render: url =>
                    `<button class="btn btn-success btn-sm"
                        onclick="window.open('${url}', '_blank')">
                        Visit
                    </button>`
            },
            { data: 'type'},
            {
                data: 'image',
                className: 'text-center',
                render: img =>
                    `<button class="btn btn-info btn-sm view-image-btn"
                        data-toggle="modal"
                        data-target="#projectLogoViewModel"
                        data-image="../../website/public/uploads/projects/${img}">
                        View
                    </button>`
            },
            {
                data: null,
                className: 'text-center',
                render: project => `
                    <button class="btn btn-primary btn-sm edit-btn">
                        Edit
                    </button>

                    <button class="btn btn-danger btn-sm delete-btn"
                        data-id="${project.id}">
                        Delete
                    </button>`
            }
        ]   
    });

    // IMAGE MODAL
    $('#projectLogoViewModel').on('show.bs.modal', function (e) {
        const button = e.relatedTarget;
        const image = button.getAttribute('data-image');
        $('#modalViewProjetLogoImage').attr('src', image);
     });

    // ADD PROJECT
    $('#projectForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'project/createProject.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: 'json',
            success: res => {
                alert(res.Message);
                if (res.Status) {
                    $('#addProjectModal').modal('hide');
                    this.reset();
                    projectTable.ajax.reload(null, false);
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

         let project = projectTable.row(tr).data();

        console.log(project); // 🔍 DEBUG (optional)


        $('#currentProjectId').val(project.id);
        $('#currentProjectName').val(project.name);
        $('#currentProjectUrl').val(project.url);
        $('#currentProjectType').val(project.type);

        if (project.image) {
            $('#currentProjectImage')
                .attr('src', '../../website/public/uploads/projects/' + project.image)
                .show();
        } else {
            $('#currentProjectImage').hide();
        }

        $('#updateProjectModal').modal('show');
    });


    // UPDATE PROJECT
    $('#updateProjectForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'project/editProject.php?id=' + $('#currentProjectId').val(),
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: 'json',
            success: res => {
                alert(res.Message);
                if (res.Status) {
                    $('#updateProjectModal').modal('hide');
                    projectTable.ajax.reload(null, false);
                }
            }
        });
    });

    // DELETE PROJECT
    $(document).on('click', '.delete-btn', function () {
        if (!confirm('Delete this project?')) return;
        $.getJSON('project/deleteProject.php?id=' + $(this).data('id'), res => {
            alert(res.Message);
            if (res.Status) projectTable.ajax.reload(null, false);
        });
    });

});
