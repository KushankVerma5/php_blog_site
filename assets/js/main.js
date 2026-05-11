$(document).ready(function(){

    // DELETE POST

    $(document).on("click", ".delete-post", function(){

        if(!confirm("Delete this post?")){
            return;
        }

        let post_id = $(this).data("id");

        $.ajax({

            url: "posts/delete.php",

            method: "POST",

            data: {
                id: post_id
            },

            success:function(){

                location.reload();
            }

        });

    });


    // FILTER BLOGS

    function fetchPosts(){

        let search = $("#search").val();

        let category = $("#category").val();

        let date = $("#date").val();

        $.ajax({

            url: "ajax/filter_posts.php",

            method: "POST",

            data: {

                search: search,
                category: category,
                date: date

            },

            beforeSend:function(){

                $("#post-container").html(`
                    <div class="text-center p-5">
                        <div class="spinner-border text-dark"></div>
                    </div>
                `);

            },

            success:function(response){

                $("#post-container").html(response);

            }

        });

    }

    $("#search").keyup(fetchPosts);

    $("#category").change(fetchPosts);

    $("#date").change(fetchPosts);

    $("#imageInput").change(function(e){

    const reader = new FileReader();

    reader.onload = function(event){

        $("#previewImage").attr(
            "src",
            event.target.result
        );

        $("#previewImage").show();

    }

    reader.readAsDataURL(
        e.target.files[0]
    );

});

});