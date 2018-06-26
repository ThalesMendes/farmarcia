$('#modal-produto').on('show.bs.modal', function (e) {
  $(this).find('.modal-content').load(e.relatedTarget.getAttribute('dialogo-src'));
});

$(".modal").on("shown.bs.modal", function() {
  var urlReplace = "#" + $(this).attr('id');
  history.pushState(null, null, urlReplace);
});

$(window).on('popstate', function() {
  $(".modal").modal('hide');
});
