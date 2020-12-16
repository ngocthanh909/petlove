$(document).ready(function() {
        $("#edit-btn").click(function() {
            var data = $('#edit-form').serialize();
            console.log(data);
            $.ajax({
                type: "get"
                , url: "{{route('suadanhmuc')}}"
                , cache: false
                , data: data
                , dataType: "json"
                , success: function(response) {
                    alert(response.msg);
                }
                , error: function() {
                    alert("Error");
                }
            });
        })
    })