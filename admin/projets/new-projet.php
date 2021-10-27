<?php

require_once '../admin_header.php';

$title = 'Personal portfolio by CwBertrand';

?>

<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProjets" aria-expanded="false" aria-controls="collapseProjets">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Projets
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProjets" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="new-projet.php">Nouveux Projets</a>
                                    <a class="nav-link" href="list-projets.php">Liste de Projet</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../layout-static.php">Static Navigation</a>
                                    <a class="nav-link" href="../layout-sidenav-light.php">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="../logout.php">Log out</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="../401.php">401 Page</a>
                                            <a class="nav-link" href="../404.php">404 Page</a>
                                            <a class="nav-link" href="../500.php">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="../charts.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                       
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">

            <div class="container pt-3">
  <nav class="" aria-label="breadcrumb">
    <ol class="breadcrumb card-header py-4 ps-4 change-border ">
      <li class="breadcrumb-item pl-3"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="#">Projets</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ajouter</li>
    </ol>
  </nav>


  <table class="table table-bordered shadow">
    <thead class="table">
        <tr class="">
            <th class="py-4 bg-color shadow" scope="col"><span class="mx-3 "><i class="fas fa-clipboard"></i></span> Data table projets</th>
        </tr>
    </thead>

    <tbody>
    
      <tr>
        <td colspan="4" class="p-5">
          <div class="d-flex justify-content-between my-4">
            <p>nom </p>
            <input type="text" class="form-control" id="formGroupExampleInput">
          </div>
          <div class="d-flex justify-content-between my-4">
            <p>url</p>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
          </div>
          <div class="d-flex justify-content-between my-4">
            <p>slug</p>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
          </div>
          <div class="d-flex justify-content-between my-4">
            <p>image </p>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
          </div>
          <div class="d-flex justify-content-between my-4">
            <p>description </p>
            <textarea class="form-control" id="exampleFormControlTextarea1" style="resize: none !important;"></textarea>
          </div>
          <div class="d-flex justify-content-between my-4">
            <p>activé </p>
            <div class="input-group mb-3">
              <select class="form-select" id="inputGroupSelect02">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
              </select>
            </div>
          </div>
          <div class="d-flex justify-content-between my-4">
            <p>ficfit </p>
            <div class="input-group mb-3">
              <select class="form-select" id="inputGroupSelect02">
                <option selected>Choose...</option>
                <option value="1">Oui</option>
                <option value="2">Non</option>
              </select>
            </div>
          </div>
          <div class="d-flex justify-content-between my-4">
            <p>detail</p>
            <textarea class="form-control" id="exampleFormControlTextarea2"></textarea>
          </div>
          <div class="d-flex justify-content-between my-4">
            <p>poste</p>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
          </div>
          
          <div class="position-absolute end-0 start-0 ps-5 ms-5 pb-5 btn-padding">
            <button type="button" class="btn btn-primary">Ajouter</button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>
                <main>
                    <div class="container-fluid px-4">
                       
                        <div style="height: 100vh"></div>
                    </div>
                </main>

<?php
require_once '../admin_footer.php';

?>








