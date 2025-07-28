(function ($) {
    $(document).ready(function () {
        $("#training-form").DataTable({
            order: [[1, "asc"]],
            scrollCollapse: true,
            searchable: true,
            pageLength: 10,
            autoWidth: false,
            lengthMenu: [10, 15, 20, 50],
        });

        $("#training-applicant-form").DataTable({
            order: [[1, "asc"]],
            scrollCollapse: true,
            searchable: true,
            pageLength: 10,
            autoWidth: false,
            lengthMenu: [10, 15, 20, 50],
        });
    });
})(jQuery);
