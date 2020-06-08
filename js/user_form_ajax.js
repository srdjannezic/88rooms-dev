function revoke(url, role_name,updateUrl) {
    var role = "#role-" + role_name;
    $.ajax({
        type: 'get',
        url: url,
        success: function(resp) {
            $('tr').remove(role);
            update_roles(updateUrl);
        },
        error: function() {
            alert('error!');
        }
    });
}
function update_roles(updateUrl) {
    // reload the role select field
    $.ajax({
        type: 'get',
        url: updateUrl,
        data: {
            "ajax" : "1"
        },
        success: function(resp) {
            $("#role_list").replaceWith( resp );
        },
        error: function() {
            alert('Error!');
        }
    });
}
function assign(url, updateUrl) {
    $.ajax({
        type: 'get',
        url: url,
        data: {
            "role" : $("#User_role").val(),
            "ajax" : "1"
        },
        success: function(resp) {            
            $("table.roles").append(resp);
            update_roles(updateUrl);
        },
        error: function() {
            alert('Error!');
        }
    });
}