const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const favorite_on_buttons = document.querySelectorAll("#favorite-on");
favorite_on_buttons.forEach(button => {
    button.addEventListener("click",function(){
        const shop_id = button.dataset.id;
        fetch("/" + shop_id + "/favorite-delete",{
            method:"DELETE",
            headers:{
                "X-CSRF-TOKEN":csrfToken
            }
        });
        setTimeout(function(){
            location.reload();
        },1000);
    });

});

const favorite_off_buttons = document.querySelectorAll("#favorite-off");
favorite_off_buttons.forEach(button => {
    button.addEventListener("click",function(){
        const shop_id = button.dataset.id;
        fetch("/" + shop_id + "/favorite-store",{
            method:"POST",
            headers:{
                "X-CSRF-TOKEN":csrfToken
            }
        });
        setTimeout(function(){
            location.reload();
        },1000);

    });

});
