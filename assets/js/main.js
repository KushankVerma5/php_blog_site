$(document).ready(function(){

$(".delete-post").click(function(){

    if(!confirm("Delete this post?")) return;

    let post_id = $(this).data("id");

    $.ajax({
        url: "posts/delete.php",
        method: "POST",
        data: {id: post_id},
        success:function(){
            location.reload();
        }
    });

});

});