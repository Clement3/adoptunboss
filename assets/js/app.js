// AIzaSyDDCe2tIZ-OaMK4YAb2N9GxV-wycx0pmp4
$(document).ready(function() {

    $('#skills').multiSelect({ 
        keepOrder: true,
        selectableHeader: "<p>Compétences disponibles</p>",
        selectionHeader: "<p>Compétences sélectionnés</p>",
    });

    initSkills();
    deleteNotification();
    tabsRegister();
    loadGeo();
    initMap();

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

    function initSkills() 
    {
        var activitie = $('#activitie');

        getSkills(activitie.val());

        activitie.on('change', function() {
            getSkills(this.value);
        });    
    }

    function loadSkills(data) 
    {
        $('#skills').multiSelect('deselect_all');
        $('#skills > option').remove();
        $('#skills').multiSelect('refresh');

        for (var i = 0; i < data.length; i++) {
            $('#skills').multiSelect('addOption', { value: data[i].id, text: data[i].name, index: i });
        }
    }

    function getSkills (id)
    {
        $.get('/ajax/skills/' + id, function (data) {
            loadSkills(data);
        });        
    }

    function loadGeo() {
        $("#place").geocomplete({
            country: 'fr',
            details: "form"
        });
    }

    function initMap() {
        var coor = {
            lat: parseFloat($('#lat').text()), 
            lng: parseFloat($('#lng').text())
        };
        var map = new google.maps.Map(
            document.getElementById('map'), {
                zoom: 13, 
                center: coor
        });
        var marker = new google.maps.Marker({
            position: coor,
            map: map
        });
    }          
});
