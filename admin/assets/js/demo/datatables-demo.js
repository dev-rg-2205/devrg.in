// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable(
    {
       "pageLength": 10, // Show only 10 entries per page
        "lengthChange": false, // Hide the "Show X entries" dropdown (optional)
        "ordering": true, // Enable column sorting
        "searching": true, // Enable search
    }
  );
});
