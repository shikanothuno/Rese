document.getElementById("date").addEventListener("input",function(){
    document.getElementById("date-preview").textContent = this.value;
});

document.getElementById("time").addEventListener("input",function(){
    document.getElementById("time-preview").textContent = this.value;
});

document.getElementById("people").addEventListener("input",function(){
    document.getElementById("people-preview").textContent = this.value;
});
