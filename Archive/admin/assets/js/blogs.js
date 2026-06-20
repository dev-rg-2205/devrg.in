let blogTable;

$(document).ready(function () {

    // INIT DATATABLE (ONLY ONCE)
    blogTable = $('#tableBlogs').DataTable({
        responsive: true,
        ajax: {
            url: 'blog/listBlogs.php',
            dataSrc: res => res.Status ? res.Data : []
        },
        columns: [
            {
                data: 'createdAt',
                render: d => new Date(d).toLocaleDateString()
            },
            { data: 'title' },
            { data: 'subject' },
            {
                data: 'content',
                render: d => d.substring(0, 50) + '...'
            },
            { data: 'url',
              className: 'text-center',
              render: url =>
                    `<button class="btn btn-success btn-sm"
                        onclick="window.open('${url}', '_blank')">
                        Visit
                    </button>`
             },
            {
                data: 'image',
                className: 'text-center',
                render: img => {
                    return `<button class="btn btn-info btn-sm view-image-btn"
                        data-toggle="modal"
                        data-target="#blogImageViewModel"
                        data-image="../../website/public/uploads/blogs/${img}">
                        View
                    </button>`
                }
            },
            {
                data: null,
                className: 'text-center',
                render: blog => `
                    <button class="btn btn-primary btn-sm edit-btn">
                        Edit
                    </button>

                    <button class="btn btn-danger btn-sm delete-btn"
                        data-id="${blog.id}">
                        Delete
                    </button>`
            }
        ]
    });

    // IMAGE MODAL
    $('#blogImageViewModel').on('show.bs.modal', function (e) {
        const button = e.relatedTarget;
        const image = button.getAttribute('data-image');
        $('#modalBlogImage').attr('src', image);
    });

    // ADD BLOG
    $('#blogForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'blog/createBlog.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: 'json',
            success: res => {
                alert(res.Message);
                if (res.Status) {
                    $('#addBlogModal').modal('hide');
                    this.reset();
                    blogTable.ajax.reload(null, false);
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

        let blog = blogTable.row(tr).data();

        console.log(blog); // 🔍 DEBUG (optional)


        $('#currentBlogId').val(blog.id);
        $('#currentBlogTitle').val(blog.title);
        $('#currentBlogSubject').val(blog.subject);
        $('#currentBlogContent').val(blog.content);
        $('#currentBlogUrl').val(blog.url);

      
          if (blog.image) {
                $('#currentBlogImage')
                    .attr('src', '../../website/public/uploads/blogs/' + blog.image)
                    .show();
            } 

        $('#updateBlogModal').modal('show');
    });


    // UPDATE BLOG
    $('#updateBlogForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'blog/editBlog.php?id=' + $('#currentBlogId').val(),
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: 'json',
            success: res => {
                alert(res.Message);
                if (res.Status) {
                    $('#updateBlogModal').modal('hide');
                    blogTable.ajax.reload(null, false);
                }
            }
        });
    });

    // DELETE BLOG
    $(document).on('click', '.delete-btn', function () {
        if (!confirm('Delete this blog?')) return;
        $.getJSON('blog/deleteBlog.php?id=' + $(this).data('id'), res => {
            alert(res.Message);
            if (res.Status) blogTable.ajax.reload(null, false);
        });
    });

});
