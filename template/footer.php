<footer class="container-fluid bg-dark fixed-bottom">
        <div class="row">
            <div class="col-md text-light text-center py-3">
                Desarrollado por Grupo 2 Ingenieria de Software UMG Portales &copy; <?=date('Y')?>
            </div>
        </div>
    </footer>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
     <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(document).ready(function () {
        $('#moneda').on('change', function () {
            const selectData = $(this).val(); 
            $.ajax({
                type: "POST",
                url: "activos.php",
                data: {'selectData': selectData },
            }).done(function (json) {
                // console.log(json);
                $("#main").html(json);
            });
        });

        $('#departamento').on('change', function() {
          const selectDep = $(this).val();
          $.ajax({
            type: "POST",
            url: "asignaractivos.php",
            data: {'iddep': selectDep},
          }).done(function(e) {
            $("#main").html(e);
          });
        });
      });
    </script>
  </body>
</html>