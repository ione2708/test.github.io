<?php
session_start();
if (!isset($_SESSION['parolaADMIN']))
{
    header("Location: Login.php");
}
else
{
  if (!isset($_POST['submit_form'])){
    ?>
    <html>
<head>
  <title>Adaugare angajat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="select.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
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
              <a class="nav-link active" href="AdaugareAngajat.php">
                Inregistrare angajat nou
              </a>
              <a class="nav-link" href="ListaAngajati.php">
                Lista angajati
              </a>
              
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Sunteti logat in contul admin:</div>
          <?php echo $_SESSION['userCurent']?>
      </div>
      </nav> 
    </div>
    <div id="layoutSidenav_content">
      <!-- Aici apar datele paginii si actiunile -->
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Inregistrare angajat nou</h1>
            <div class=" alert alert-warning alert-dismissible fade show" role="alert">
              Introduceti cu atentie datele angajatului!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          
          <div class="card mb-4 border border-info">
            <div class="card-body">
              <form method="post"  action="">
                <div class="card-body header">
                <center><b>Date personale</b></center>
                </div>
                <div class="row form-group was-validated">
                    <div class="col md-4 form-group">
                      <label for="nume">Nume</label>
                      <input type="text" class="form-control" placeholder="Nume" name="nume" pattern="^[A-Z][a-zA-Z]*$" required>
                    </div>
                    <div class="col md-4">
                      <label for="prenume">Prenume</label>
                      <input type="text" class="form-control" placeholder="Prenume" name="prenume" pattern="^[A-Z][a-zA-Z]*(-[A-Z][a-zA-Z]*)*$" required>
                    </div>
                </div>
                <div class="row form-group was-validated">
                    <div class="col md-4">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" pattern="^[a-zA-Z0-9._%+-]+@company\.com$" required>
                    </div>
                    <div class="col md-4">
                        <label for="Telefon">Telefon</label>
                        <input type="text" class="form-control" placeholder="Telefon" name="telefon" pattern="^07[0-9]{8}"required>
                    </div>
                </div>
                <div class="row form-group was-validated">
                    <div class="col md-4">
                        <label for="cnp">CNP</label>
                        <input type="text" class="form-control" placeholder="CNP" name="cnp" pattern="^[1-8]\d{2}(0[1-9]|1[0-2])(0[1-9]|[1-2][0-9]|3[0-1])\d{6}$"required>
                    </div>
                    <div class="col md-4">
                        <label for="dataN">Data nasterii</label>
                        <input type="text" class="form-control" placeholder="AAAA-LL-ZZ" name="dataN" required>
                    </div>
                </div>
                <div class="row form-group was-validated">
                    <div class="col md-4">
                        <label for="gen">Gen</label>
                        <select class="custom-select" name="gen" required>
                            <option value="">Alege genul</option>
                            <option value="1">Feminin</option>
                            <option value="2">Masculin</option>
                            <option value="3">Altul</option>
                        </select>
                    </div>
                    <div class="col md-4">
                      <label for="adresa">Adresa</label>
                      <input type="text" class="form-control" placeholder="Adresa" name="adresa" required>
                    </div>
                </div>
                <div class="card-body header">
                <center><b>Informatii tehnice</b></center>
                </div>
                    <div class="row form-group was-validated">
                        <div class="col md-4">
                          <label for="cod_A">Cod angajat</label>
                          <input type="text" class="form-control" placeholder="Cod angajat" name="cod_A" pattern="^A[0-9]{5}" required>
                        </div>
                        <div class="col md-4">
                        <label for="gen">Post</label>
                            <select class="custom-select" name="post" required>
                            <option value="">Alege post</option>
                              <?php
                              $con=mysqli_connect("localhost","root","","aplicatie") or die ("Nu se poate conecta la serverul MySQL");
                              $query_a=mysqli_query($con,"select cod_P, descriere from posturi where cod_P NOT IN('1')");
                              while ($row = mysqli_fetch_assoc($query_a)) {
                                echo '<option value="' . $row['cod_P'] . '">' . $row['descriere'] . '</option>';
                              }
                              mysqli_close($con);
                              ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group was-validated">
                        <div class="col md-4">
                          <label for="departament">Departament</label>
                          <select class="custom-select" name="departament" required>
                          <option value="">Alege departament</option>
                          <?php
                              $con=mysqli_connect("localhost","root","","aplicatie") or die ("Nu se poate conecta la serverul MySQL");
                              $query_a=mysqli_query($con,"select cod_D, denumire from departamente where cod_D NOT IN('0')");
                              while ($row = mysqli_fetch_assoc($query_a)) {
                                echo '<option value="' . $row['cod_D'] . '">' . $row['denumire'] . '</option>';
                              }
                              mysqli_close($con);
                              ?>
                            </select>
                        </div>
                        <div class="col md-4">
                          <label for="nivel">Nivel</label>
                          <select class="custom-select" name="nivel" required>
                                <option value="">Alege nivel</option>
                                <?php
                              $con=mysqli_connect("localhost","root","","aplicatie") or die ("Nu se poate conecta la serverul MySQL");
                              $query_a=mysqli_query($con,"select cod_N, denumire from nivele");
                              while ($row = mysqli_fetch_assoc($query_a)) {
                                echo '<option value="' . $row['cod_N'] . '">' . $row['denumire'] . '</option>';
                              }
                              mysqli_close($con);
                              ?>
                          </select>
                        </div>
                    </div>
                
                <center><input class="btn btn-outline-primary w-25 mt-2" type="submit" name="submit_form" value="Inregistrare"></center>
              </form>
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

<?php

}
else {
//conexiune baza de date
$con=mysqli_connect("localhost","root","","aplicatie") or die ("Nu se poate conecta la serverul MySQL");
//preluare date personale din form
$nume=$_POST['nume'];
$prenume=$_POST['prenume'];
$email=$_POST['email'];
$telefon=$_POST['telefon'];
$cnp=$_POST['cnp'];
$dataN=$_POST['dataN'];
$gen=$_POST['gen'];
$adresa=$_POST['adresa'];
//preluare date tehnice din form
$cod_A=$_POST['cod_A'];
$post=$_POST['post'];
$departament=$_POST['departament'];
$nivel=$_POST['nivel'];
// $manager=$_POST['manager'];
$sql1=mysqli_query($con,"select manager from departamente where cod_D=$departament");
$rezultat=mysqli_fetch_array($sql1);
$manager=$rezultat['manager'];
//verificam daca cnp-ul angajatului exista in baza de date
$query=mysqli_query($con, "select count(*) from angajati_date_p where cnp=$cnp");
$verificare=mysqli_query($con, "select count(*) from angajati_date_p where cod_A='$cod_A'");
$row2=mysqli_fetch_row($verificare);
$row=mysqli_fetch_row($query);
$nr=$row[0];
$nr1=$row2[0];
//daca nu exista adaugam
if ($nr==0 && $nr1==0){
//adăugare cu parametri
$query1=mysqli_query($con,"INSERT INTO angajati_date_p (nume,prenume,email,telefon,cnp,data_nastere,gen,adresa,cod_A,post,departament,manager,nivel) VALUES ('$nume','$prenume','$email','$telefon','$cnp','$dataN',$gen,'$adresa','$cod_A',$post,$departament,$manager,$nivel)") or die ("Inserarea nu a putut avea loc!". mysqli_error($con));
header('Location:http://localhost/aplicatie/PaginaAdmin/GenerareParola.php');
$_SESSION['cod_A']=$cod_A;
}
else{
?>
<html>
<head>
  <title>Adaugare angajat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="navbar.css"> -->
    <link rel="stylesheet" href="select.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
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
              <a class="nav-link active" href="AdaugareAngajat.php">
                Inregistrare angajat nou
              </a>
              <a class="nav-link" href="ListaAngajati.php">
                Lista angajati
              </a>
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Sunteti logat in contul admin:</div>
          <?php echo $_SESSION['userCurent']?>
      </div>
      </nav> 
    </div>
    <div id="layoutSidenav_content">
      <!-- Aici apar datele paginii si actiunile -->
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Inregistrare angajat nou</h1>
            <div class=" alert alert-danger alert-dismissible fade show" role="alert">
              Ati completat gresit formularul sau angajatul exista deja in sistem. Completati din nou!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          
          <div class="card mb-4 border border-info">
            <div class="card-body">
              <form method="post"  action="">
                <div class="card-body header">
                <b>Date personale</b>
                </div>
                <div class="row form-group was-validated">
                    <div class="col md-4 form-group">
                      <label for="nume">Nume</label>
                      <input type="text" class="form-control" placeholder="Nume" name="nume" pattern="^[A-Z][a-zA-Z]*$" required>
                    </div>
                    <div class="col md-4">
                      <label for="prenume">Prenume</label>
                      <input type="text" class="form-control" placeholder="Prenume" name="prenume" pattern="^[A-Z][a-zA-Z]*(-[A-Z][a-zA-Z]*)*$" required>
                    </div>
                </div>
                <div class="row form-group was-validated">
                    <div class="col md-4">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" pattern="^[a-zA-Z0-9._%+-]+@company\.com$" required>
                    </div>
                    <div class="col md-4">
                        <label for="Telefon">Telefon</label>
                        <input type="text" class="form-control" placeholder="Telefon" name="telefon" pattern="^07[0-9]{8}"required>
                    </div>
                </div>
                <div class="row form-group was-validated">
                    <div class="col md-4">
                        <label for="cnp">CNP</label>
                        <input type="text" class="form-control" placeholder="CNP" name="cnp" pattern="^[1-8]\d{2}(0[1-9]|1[0-2])(0[1-9]|[1-2][0-9]|3[0-1])\d{6}$"required>
                    </div>
                    <div class="col md-4">
                        <label for="dataN">Data nasterii</label>
                        <input type="text" class="form-control" placeholder="AAAA-LL-ZZ" name="dataN" required>
                    </div>
                </div>
                <div class="row form-group was-validated">
                    <div class="col md-4">
                        <label for="gen">Gen</label>
                        <select class="custom-select" name="gen" required>
                            <option value="">Alege genul</option>
                            <option value="1">Feminin</option>
                            <option value="2">Masculin</option>
                            <option value="3">Altul</option>
                        </select>
                    </div>
                    <div class="col md-4">
                      <label for="adresa">Adresa</label>
                      <input type="text" class="form-control" placeholder="Adresa" name="adresa" required>
                    </div>
                </div>
                <div class="card-body header">
                <b>Informatii tehnice</b>
                </div>
                <div class="row form-group was-validated">
                        <div class="col md-4">
                          <label for="cod_A">Cod angajat</label>
                          <input type="text" class="form-control" placeholder="Cod angajat" name="cod_A" pattern="^A[0-9]{5}" required>
                        </div>
                        <div class="col md-4">
                        <label for="gen">Post</label>
                            <select class="custom-select" name="post" required>
                            <option value="">Alege post</option>
                              <?php
                              $con=mysqli_connect("localhost","root","","aplicatie") or die ("Nu se poate conecta la serverul MySQL");
                              $query_a=mysqli_query($con,"select cod_P, descriere from posturi where cod_P NOT IN('1')");
                              while ($row = mysqli_fetch_assoc($query_a)) {
                                echo '<option value="' . $row['cod_P'] . '">' . $row['descriere'] . '</option>';
                              }
                              mysqli_close($con);
                              ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group was-validated">
                        <div class="col md-4">
                          <label for="departament">Departament</label>
                          <select class="custom-select" name="departament" required>
                          <option value="">Alege departament</option>
                          <?php
                              $con=mysqli_connect("localhost","root","","aplicatie") or die ("Nu se poate conecta la serverul MySQL");
                              $query_a=mysqli_query($con,"select cod_D, denumire from departamente where cod_D NOT IN('0')");
                              while ($row = mysqli_fetch_assoc($query_a)) {
                                echo '<option value="' . $row['cod_D'] . '">' . $row['denumire'] . '</option>';
                              }
                              mysqli_close($con);
                              ?>
                            </select>
                        </div>
                        <div class="col md-4">
                          <label for="nivel">Nivel</label>
                          <select class="custom-select" name="nivel" required>
                                <option value="">Alege nivel</option>
                                <?php
                              $con=mysqli_connect("localhost","root","","aplicatie") or die ("Nu se poate conecta la serverul MySQL");
                              $query_a=mysqli_query($con,"select cod_N, denumire from nivele");
                              while ($row = mysqli_fetch_assoc($query_a)) {
                                echo '<option value="' . $row['cod_N'] . '">' . $row['denumire'] . '</option>';
                              }
                              mysqli_close($con);
                              ?>
                          </select>
                        </div>
                    </div>
                <center><input class="btn btn-outline-primary w-25 mt-2" type="submit" name="submit_form" value="Inregistrare"></center>
              </form>
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
<?php
}
// mysqli_close($con);
}
}
?>