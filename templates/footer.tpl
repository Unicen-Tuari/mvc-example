
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
  $(".botonAgregarImagenes").on("click", function(event){
    event.preventDefault();

    var archivos = $("#imagesToUpload").prop('files');

    if(typeof(archivos) == 'undefined'){
      mostrarMensaje("No pusiste imagenes");
      return;
    }

    var datos = new FormData();

    $.each(archivos, function(key,value){
      datos.append(key,value);
    });

    $.ajax({
      type: "POST",
      dataType: "json",
      url: event.target.href,
      data: datos,
      success: function(data){
        alert(data.result);
      },
      error: function(){
        alert("No anduvo la llamada AJAX");
      },
      contentType : false,
      processData : false
    });

  });
</script>
</body>
</html>
