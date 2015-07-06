<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ejemplo Model View Controller</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">
      <div class="page-header">
        <h1>Lista de Tareas</h1>
      </div>
      <div class="row">
  <div class="col-md-6">
      <label class="control-label" for="nombre">Tarea</label>
      <form class="" action="index.html" method="post">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Agregar una tarea">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Agregar</button>
          </span>
        </div><!-- /input-group -->
      </form>
      <ul class="list-group">
        {foreach $tareas as $tarea}
          <li class="list-group-item">
            {$tarea}
            <button type="button" class="btn btn-danger btn-xs pull-right" aria-label="Borrar">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </li>
		    {/foreach}
      </ul>
    </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
