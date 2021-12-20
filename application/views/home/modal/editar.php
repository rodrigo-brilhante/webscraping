<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form role="form" method="post" action="<?= base_url("home/alterar/") ?>">
      <input type="hidden" id="id" name="id">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="autor" class="col-form-label">Nome do Autor</label>
            <input type="text" class="form-control" id="autor" name="autor">
          </div>
          <div class="form-group">
            <label for="texto" class="col-form-label">Texto</label>
            <textarea class="form-control" id="texto" name="texto"></textarea>
          </div>
          <div class="form-group">
            <label for="tags" class="col-form-label">Tags</label>
            <input type="text" class="form-control" id="tags" name="tags">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-outline-primary">Atualizar</button>
        </div>
      </div>
    </form>
  </div>
</div>