<div class="container">
  <div class="row my-3">
    <a href="<?= base_url('home/buscar') ?>" class="btn btn-outline-primary">Buscar</a>
  </div>
  <?php if (!empty($frases)) { ?>
    <?php foreach ($frases as $frase) { ?>
      <div class="row align-items-center">
        <div class="col-6"> <?= $frase->texto ?> </div>
        <div class="col"> <?= $frase->autor ?> </div>
        <div class="col"> <?= $frase->tags ?> </div>
        <div class="col-1">
          <button type="button" class="btn btn-outline-warning btn-block btn-sm mb-1" 
            data-toggle="modal" 
            data-target="#modalEditar" 
            data-id="<?= $frase->id ?>" 
            data-autor="<?= $frase->autor ?>"
            data-texto="<?= $frase->texto ?>"
            data-tags="<?= $frase->tags ?>">Editar</button>
          <button type="button" class="btn btn-outline-danger btn-block btn-sm"
            data-toggle="modal" 
            data-target="#modalExcluir" 
            data-id="<?= $frase->id ?>" >Excluir</button>
        </div>
      </div>
      <hr>
    <?php } ?>

  <?php } else { ?>
    <div class="alert alert-warning mt-5" role="alert">
      Não possui registros no banco de dados!
    </div>
  <?php } ?>
</div>