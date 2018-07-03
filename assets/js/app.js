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
    initPeriod();

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

        if ($('#profile').length) {
            $.get('/ajax/skills/profile/' + $('#profile').val(), function (res) {
                setSkills(data, res);
            });
        } else if ($('#offer').length) {
            $.get('/ajax/skills/offer/' + $('#offer').val(), function (res) {
                setSkills(data, res);
            });
        }
        
        setSkills(data);
    }

    function setSkills(data, skills = null)
    {        
        for (var i = 0; i < data.length; i++) {
            $('#skills').append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
        }

        if (skills !== null) {
            for (var k = 0; k < skills.length; k++) {
                $('#skills').append('<option value="' + skills[k].id + '" selected>' + skills[k].name + '</option>');
            }            
        }

        $('#skills option').each(function() {
            $(this).prevAll('option[value="' + this.value + '"]').remove();
        });

        $('#skills').multiSelect('refresh'); 
    }

    function getSkills(id)
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

        if ($('#map').length) {
            var latitude = parseFloat($('#lat').text());
            var longitude = parseFloat($('#lng').text());
    
            var coor = {
                lat: latitude, 
                lng: longitude
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
        } else {
            var lat = $('#lat');
            var lng = $('#lng');

            
        }
    }
    
    function initPeriod()
    {
        var employments = $('#employments');
        var option = $('#employments > option');

        setPeriod(option.data('period'));

        employments.on('change', function() {
            setPeriod($(this).find(':selected').data('period'));
        });
    }

    function setPeriod(period)
    {
        var field = $('#period-field');
        var input = $('#period-input');

        if (period === 1) {
            field.removeClass('hidden');
        } else {
            field.addClass('hidden');
            input.val('0');
        }
    }
});
