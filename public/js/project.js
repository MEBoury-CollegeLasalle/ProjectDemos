
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