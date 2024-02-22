
function update_movie() {
    document.getElementById("actionField").setAttribute("value", "update_movie");
    document.getElementById("movieManagement").submit();
}

function delete_movie() {
    document.getElementById("actionField").setAttribute("value", "delete_movie");
    document.getElementById("movieManagement").submit();
}

function create_movie() {
    document.getElementById("actionField").setAttribute("value", "create_movie");
    document.getElementById("movieManagement").submit();
}


function display_movie_ajax() {
    
    const formData = $("#movieNavigationAjax").serialize();
    $.ajax("/ProjectDemos/public/api.php", {
        method: "post",
        dataType: "json",
        data: formData
    }).done(function(data, textStatus, jqXHR) {
        console.warn(data);
        $("#movieIdField2").val(data.id);
        $("#movieTitleField2").val(data.title);
        $("#movieYearField2").val(data.year);
        $("#movieHoursField2").val(data.duration_hours);
        $("#movieMinutesField2").val(data.duration_minutes);
        $("#movieBudgetField2").val(data.budget);
    }).fail(function(jqXHR, textStatus, code) {
        console.warn(jqXHR);
        console.warn(textStatus);
        console.warn(code);
    });
    
}

function update_movie_ajax() {
    
    document.getElementById("actionField").setAttribute("value", "update_movie_async");
    const formData = $("#movieManagementAjax").serialize();
    $.ajax("/ProjectDemos/public/api.php", {
        method: "post",
        dataType: "json",
        data: formData
    }).done(function(data, textStatus, jqXHR) {
        console.warn(data);
        $("#movieIdField").val(data.id);
        $("#movieTitleField").val(data.title);
        $("#movieYearField").val(data.year);
        $("#movieHoursField").val(data.duration_hours);
        $("#movieMinutesField").val(data.duration_minutes);
        $("#movieBudgetField").val(data.budget);
    });
    
}