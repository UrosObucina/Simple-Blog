    $(".deleteBlog").click(function () {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url : $(this).attr('href'),
            success: function(data){
                console.log("Uspelo je");
                location.reload();
            }
        });
    });
