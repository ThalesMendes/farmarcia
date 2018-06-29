<div id="<?= $modal_id; ?>" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?= $modal_title; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <p><?= $modal_text; ?></p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn-ok btn btn-danger" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>
