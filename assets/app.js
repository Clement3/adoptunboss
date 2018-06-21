$(document).ready(function() {

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
});