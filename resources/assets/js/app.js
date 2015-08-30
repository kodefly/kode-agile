
/* -----------------------------------------------------------
 * Plugin setup boot
 * -----------------------------------------------------------
 */
$(function() {
    // jqery ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // jquery-knob
    $('.knob').each(function() {
        var options = { min: 0, max: 100, readOnly: true };

        if ($(this).val() > 90 && $(this).hasClass('deadline')) {
        options.fgColor = "#b20000";
        }

        $(this).knob(options);
        $(this).removeClass('hide');
    });

    // Bootstrap tooltip
    $('[data-toggle="tooltip"]').tooltip()
});


/* -----------------------------------------------------------
 * User Interections
 * -----------------------------------------------------------
 */

var thisForm;

$(function() {
    // projects.index
    $('.project-list-item').find('.widget-body').click(function() {
        window.location.href = '/projects/' + $(this).data('projectId') + '/backlogs';
    });

    // projects.backlogs
    $('.backlogsAddBtn').click(function() {
        $('.backlogsAddForm').slideToggle();
    })

    $('.icon-add, .icon-minus').click(function(e) {
        e.preventDefault();
        $('.icon-add, .icon-minus').toggle();
    })

    $('.backlogsAddForm').on('submit', function(e) {
        e.preventDefault();

        var thisWidget = $(this).parents('.widget');
        var thisForm = $(this).find('form');

        thisWidget.find('.backlogsAddForm').slideUp();
        changeIconTo('progress', thisWidget);

        $.ajax({
            method : 'POST',
            url    : thisForm.attr('action'),
            data   : thisForm.serialize()
        }).done(function(backlog) {
            var row = createBacklogRow(backlog)
            $('.backlogsList .row:last').after(row);
            row.slideDown();
            thisForm.get(0).reset();
        }).fail(function(data) {

        }).always(function() {
            changeIconTo('add', thisWidget);
        });

        return false;

    });

});

/**
 * Creates a backlog data row
 *
 * @param backlog JSON result set 
 * @returns row JQuery object
 */
function createBacklogRow(backlog) {
    console.log(backlog);
    var row = $('<div>').addClass('row no-show');
    row.append($('<div>').addClass('col-md-1').html(backlog.id));
    row.append($('<div>').addClass('col-md-8').html(backlog.title));
    row.append($('<div>').addClass('col-md-2').html(backlog.user.name));
    row.append($('<div>').addClass('col-md-1').html(
        '<a class="btn btn-success btn-xs" href="/backlogs/'+ backlog.id +'/sprints/create">' +
        'new sprint</a>'
    ));

    return row;
}


/**
 * Changes the widget header icon
 *
 * @param icon to activate
 * @param widget JQuery widget div
 * @returns void
 */
function changeIconTo(icon, widget) {
    console.log(widget.find('span.icon-' + icon));
    widget.find('span.icon').hide();
    widget.find('span.icon-' + icon).show();
}
