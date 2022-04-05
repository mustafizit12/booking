$("#login").on('show.bs.modal', function (e) {
    $("#registration").modal("hide");
});
$("#registration").on('show.bs.modal', function (e) {
    $("#login").modal("hide");
});
