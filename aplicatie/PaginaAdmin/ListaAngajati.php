<?php
session_start();
if (!isset($_SESSION['parolaADMIN']))
{
    header("Location: Login.php");
}
else
{
  
    ?>
    <html>
<head>
  <title>Lista angajati</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="select.css">
    <link rel="stylesheet" href="table.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
   
      
</head>

<body class="sb-nav-fixed">
  <!-- Bara de navigare -->
  <nav class="sb-topnav navbar navbar-expand">
    <a class="navbar-brand ps-3" href="#">Administrator</a>
    <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" color="white"><i class="fas fa-user fa-fw "></i></a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#!">Profilul meu</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li><a class="dropdown-item" href="Logout.php">Logout</a></li>
          </ul>
      </li>
    </ul>
  </nav>
  <!-- Meniu stanga -->
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav ">
            <div class="sb-sidenav-menu-heading">Principal</div>
            <a class="nav-link border-right border-success" href="Admin.php">
              Pagina principala
            </a>
            <div class="sb-sidenav-menu-heading">Departamente</div>
            <a class="nav-link" href="#">
              Vizualizare departamente
            </a>
            <div class="sb-sidenav-menu-heading">Angajati</div>
              <a class="nav-link" href="AdaugareAngajat.php">
                Inregistrare angajat nou
              </a>
              <a class="nav-link active" href="ListaAngajati.php">
                Lista angajati
              </a>
          </div>
        </div>
        <div class="sb-sidenav-footer position">
          <div class="small">Sunteti logat in contul admin:</div>
          <?php echo $_SESSION['userCurent']?>
      </div>
      </nav> 
    </div>
    <div id="layoutSidenav_content">
      <!-- Aici apar datele paginii si actiunile -->
      <main>
        <div class="container-fluid px-4">
        <h1 class="mt-4">Lista angajatilor</h1>
        
        <div class="card mb-4 border border-info">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
         Lista tuturor angajatilor
        </div>
        <div class="card-body">
        <!-- <div class="card-body header">
                <b><center>Total angajati:</center></b>
                </div> -->
        <?php
        //conexiune baza de date
        $con=mysqli_connect("localhost","root","","aplicatie") or die ("Nu se poate conecta la serverul MySQL");
        $query=mysqli_query($con,"select a.nume, a.prenume, a.email, a.cod_A, CONCAT (b.nume, ' ', b.prenume) from angajati_date_p as a, manageri as b WHERE cod_A NOT IN ('A12345') AND a.manager=b.cod_M ORDER BY a.nume");
        //calculam numarul inregistrarilor din tabela
        $nr=@mysqli_num_rows($query);
        // echo "<center>$nr</center>";
        if($nr>0)
        {
          //capul de tabel
          // 
          ?>
          <html> 
            <table class="table" text-align=center>
            <caption>Total angajati: <?php echo $nr; ?></caption>
              <thead class="table-dark">
                <tr>
                <th scope="col">Nume</th>
                <th scope="col">Preume</th>
                <th scope="col">Email</th>
                <th scope="col">Cod angajat</th>
                <th scope="col">Manager</th>
                <th scope="col">Actiuni</th>
                </tr>
              </thead>
              <?php
          while ($row = mysqli_fetch_row($query))
          {
            $contor=0;
            echo " <tr>";
            foreach ($row as $value)
            {
              echo "<td>$value</td>";
              $sir[$contor]=$value;
              $contor++;
            }
            //preluare parametri pentru modificare/stergere
            $nume=$sir[0];
            $prenume=$sir[1];
            $email=$sir[2];
            $cod_A=$sir[3];
            $manager=$sir[4];
             echo "<td><a href='ModificareDate.php?nume=$nume&prenume=$prenume&email=$email&cod_A=$cod_A&manager=$manager'>Modifica</a> 
             <a href='StergereAngajat.php?nume=$nume&prenume=$prenume&email=$email&cod_A=$cod_A' onclick = 'return askme();'>Stergere</a></td>";
             echo "</tr>";
          }
        }
        ?>

            </table>
        </div>
        </div>
      </div>
      </main>
      <footer class="py-4 mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Stefanescu Ionela 2023</div>
          </div>
        </div>
      </footer>
    </div>
  </div>
</body>
</html>
<script language="javascript">
function askme(){
var r=confirm ('Sunteti sigur ca doriti sa stergeti inregistrarea selectata?');
if(r==true){
return href;
}
return false;
}
</script>
<?php
mysqli_close($con); 
}
?>