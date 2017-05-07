'use strict';

$(document).ready(function () {

    $('.data-table').dataTable({
        pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        oLanguage: {
            "sSearch": "Keyword filter:",
            "sLengthMenu": "Show _MENU_ records",
            "sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
            "sZeroRecords": "No records to display",
            oPaginate: {
                "sNext": "Previous",
                "sPrevious": "Next"
            }
        },
        columnDefs: [{
            targets: $('.data-table').data('nonorderablecols'),
            orderable: false
        }],
        buttons: [
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},

            {
                extend: 'print',
                customize: function (win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ]
    });

});