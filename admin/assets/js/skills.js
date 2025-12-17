let projectTable;

$(document).ready(function () {

    // INIT DATATABLE (ONLY ONCE)
  skillTable = $('#tableSkills').DataTable({
    responsive: true,
    ajax: {
        url: 'skill/listSkills.php',
        dataSrc: res => res.Status ? res.Data : []
    },
    columns: [
        {
            data: 'createdAt',
            render: d => new Date(d).toLocaleDateString()
        },
        { data: 'title' },
        { data: 'score' },
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

    // ADD Skill
    $('#skillForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'skill/createSkill.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: 'json',
            success: res => {
                alert(res.Message);
                if (res.Status) {
                    $('#addSkillModal').modal('hide');
                    this.reset();
                    skillTable.ajax.reload(null, false);
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

        let skill = skillTable.row(tr).data();

        console.log(skill); // 🔍 DEBUG (optional)


        $('#currentSkillId').val(skill.id);
        $('#currentSkillTitle').val(skill.title);
        $('#currentSkillScore').val(skill.score);

        $('#updateSkillModal').modal('show');
    });


    // UPDATE SKILL
    $('#updateSkillForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'skill/editSkill.php?id=' + $('#currentSkillId').val(),
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: 'json',
            success: res => {
                alert(res.Message);
                if (res.Status) {
                    $('#updateSkillModal').modal('hide');
                    skillTable.ajax.reload(null, false);
                }
            }
        });
    });

    // DELETE SKILL
    $(document).on('click', '.delete-btn', function () {
        if (!confirm('Delete this skill?')) return;
        $.getJSON('skill/deleteSkill.php?id=' + $(this).data('id'), res => {
            alert(res.Message);
            if (res.Status) skillTable.ajax.reload(null, false);
        });
    });

});
