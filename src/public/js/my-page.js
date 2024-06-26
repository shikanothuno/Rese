const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const reservations = document.querySelectorAll(".close-button");
reservations.forEach(reservation => {
    reservation.addEventListener("click",function(){
        const reservation_id = reservation.dataset.id;
        axios.delete("/" + reservation_id + "/delete",{},{
            headers:{
                "X-CSRF-TOKEN":csrfToken
            }
        });

    });
});
const favorites = document.querySelectorAll(".favorite-button");
favorites.forEach(favorite => {
    favorite.addEventListener("click",function(){
        const shop_id =favorite.dataset.id;
        axios.delete("/"+ shop_id + "/delete",{},{
            headers:{
                "X-CSRF-TOKEN":csrfToken
            }
        });
    });
});

