var deleted = $(".delete ");
deleted .on("click", function (event) {

    var answer= confirm("Voulez-vous supprimez?");
    if (!answer){
        event.preventDefault();
    }


});

/*var messageAlert = $("#alert-message");
console.log(messageAlert);
messageAlert.hide().delay(8000);*/