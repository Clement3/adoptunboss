$(document).ready(function() {

    deleteNotification();
    tabsRegister();

    function tabsRegister() {
        var candidate = $('#tabs-candidate');
        var recruiter = $('#tabs-recruiter');
        var radioCandidate = $('#radio-candidate');
        var radioRecruiter = $('#radio-recruiter');

        candidate.click(function() {
            recruiter.removeClass('is-active');
            candidate.addClass('is-active');
            radioCandidate.prop('checked', true)
        });

        recruiter.click(function() {
            candidate.removeClass('is-active');
            recruiter.addClass('is-active');
            radioRecruiter.prop('checked', true)
        });
    }

    function deleteNotification() {
        var deleteButton = $('#notification-delete');

        deleteButton.click(function(e) {
            e.preventDefault();
            $(this).parent().remove();
        });
    }

    function pagination() {
        
    }
});