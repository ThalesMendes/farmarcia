var lockPopstate = false;

$(".modal").on("shown.bs.modal", function() {
  var urlReplace = "#" + $(this).attr('id');
  history.pushState(null, null, urlReplace);
});

$(".modal").on("hidden.bs.modal", function() {
  lockPopstate = true;
  history.back();
  lockPopstate = false;
});

$(window).on('popstate', function() {
  if (!lockPopstate) {
    lockPopstate = true;
    history.forward();
    lockPopstate = false;
    $(".modal").modal('hide');
  }
});
