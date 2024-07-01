const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const reservations = document.querySelectorAll(".delete-button");
reservations.forEach(reservation => {
    reservation.addEventListener("click",function(){
        const reservation_id = reservation.dataset.id;
        axios.delete("/" + reservation_id + "/delete",{},{
            headers:{
                "X-CSRF-TOKEN":csrfToken
            }
        });
        setTimeout(function(){
            location.reload();
        },1000);
    });
});
const favorites = document.querySelectorAll(".favorite-button");
favorites.forEach(favorite => {
    favorite.addEventListener("click",function(){
        const shop_id =favorite.dataset.id;
        axios.delete("/"+ shop_id + "/favorite-delete",{},{
            headers:{
                "X-CSRF-TOKEN":csrfToken
            }
        });
        setTimeout(function(){
            location.reload();
        },1000);
    });
});

