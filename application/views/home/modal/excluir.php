<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form role="form" method="post" action="<?= base_url("home/excluir/") ?>">
      <input type="hidden" id="id" name="id">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Excluir</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="txt-confirmar" class="col-form-label">Digite <b>sim</b> para confirmar exclusão</label>
            <input type="text" class="form-control" id="txt-confirmar" name="txt-confirmar">
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-outline-primary" id="btn-exluir" disabled>Excluir</button>
        </div>
      </div>
    </form>
  </div>
</div>