<?php
mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, 'SET character_set_connection=utf8');
mysqli_query($conn, 'SET character_set_client=utf8');
mysqli_query($conn, 'SET character_set_results=utf8');

if (isset($_POST['numeroProcesso']))
  $numeroProcesso = $_POST['numeroProcesso'];
$queryGetRegistros = "select * from controle_de_honorarios_csv";
//$queryGetRegistros = "select * from historico";
$resultCount = mysqli_query($conn, "select count(*) as total_records from controle_de_honorarios_csv");
$total_records = mysqli_fetch_array($resultCount);
$total_records_per_page = 10;
$total_records = $total_records['total_records'];
$page_no = (isset($_GET['page_no']) && $_GET['page_no'] != "") ?
  $page_no = $_GET['page_no'] : $page_no = 1;

$offset = ($page_no - 1) * $total_records_per_page;
$total_no_of_pages = ceil($total_records / $total_records_per_page);

if (isset($_POST['tipoFiltro'])) $tipoFiltro = $_POST['tipoFiltro'];
if (isset($_POST['valorFiltro'])) $valorFiltro = $_POST['valorFiltro'];

//Ternário para filtro
$resultGetRegistros =
  ((isset($tipoFiltro) && isset($valorFiltro))) ?
  mysqli_query($conn, "select * from controle_de_honorarios_csv where $tipoFiltro 
            like '%$valorFiltro%' LIMIT $offset,$total_records_per_page") :
  //Query para caso não for preenchido filtro
  mysqli_query($conn, "select * from controle_de_honorarios_csv LIMIT $offset,
            $total_records_per_page");



//$resultGetHistorico = mysqli_query($conn,$queryGetRegistros); 
$resultGetHistorico = mysqli_query($conn, "select * from historico");


$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";

$second_last = $total_no_of_pages - 1;
?>

<div class="row">
  <div class="col-6">
    <form method="POST" class="form-inline" action="#">
      <div class="input-group mb-2">

        <div class="input-group-prepend">
          <!-- <div class="input-group-text" id="filtro">Pesquisa</div> -->
          <select class="custom-select input-group-text" name="tipoFiltro" id="inlineFormCustomSelect">
            <!--  <option class="input-group-text" id="filtro" selected>Filtro...</option> -->
            <option class="input-group-text" value="numeroProcesso" id="#">Processo</option>
            <option class="input-group-text" value="autor" id="#">Autor</option>
            <option class="input-group-text" value="reu" id="#">Réu</option>
            <option class="input-group-text" value="perito" id="#">Colaborador</option>
          </select>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" name="valorFiltro" aria-label="numeroProcesso" aria-describedby="filtro" autocomplete="off" placeholder=". . .">



        <!-- <span class="input-group-text " id="filtro">Número do Processo</span>
                  <input type="text" name="numeroProcesso" aria-label="numeroProcesso" aria-describedby="filtro"> -->
        <button type="submit" class="btn btn-primary ml-1"><i style="margin-right:5px" class="fas fa-search"></i>Buscar</span></button>
        <!--<div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="telaInclusao.php" class="btn btn-success ml-2" role="button" >
                        <i class="fas fa-plus-circle"></i>
                        Novo Registro
                    </a>
                    
                  </div> -->
      </div>
    </form>
  </div>
  <div class="col d-grid  d-md-flex mb-2 justify-content-md-end">
    <button type="button" 
            data-bs-toggle="modal"
            class="btn bt-sm btn-success"
            data-bs-target="#incluiRegistro">
            Incluir Registro
    </button>
    <div class="modal fade" id="incluiRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3>
              <i style="margin-right:10px" 
                 class="fas fa-user-plus"></i>
                 Incluir Registro</h3>
            <button type="button" 
                    class="btn-close" 
                    data-bs-dismiss="modal" 
                    aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form method="POST" action="phpclasses/incluirRegistro.php">
                <div class="form-group">
                    <label for="numeroProcesso" class="form-label">Número do Processo</label>
                    <input
                        class="form-control form-control-sm col-6"
                        type="text"
                        name="numeroProcesso"
                        autocomplete="off"
                        required="required">
                </div>
                <div class="form-group">
                    <label for="autor" class="form-label">Autor</label>
                    <input
                        class="form-control form-control-sm col-6"
                        type="text"
                        name="autor"
                        autocomplete="off"
                        required="required">
                </div>
                <!-- -- Input text <div class="form-group"> <label for="reu">Réu</label> <input
                class="form-control form-control-sm col-6" type="text" name="reu"
                autocomplete="off" required> </div> -->

                <!-- Datalist Réu -->
                <label for="exampleDataList" class="form-label">Réu</label>
                <input
                    class="form-control mb-3 col-6"
                    list="datalistOptions"
                    autocomplete="off"
                    name="reu"
                    id="exampleDataList">
                <datalist id="datalistOptions">
                    
                </datalist>
                <div class="form-group">
                    <label for="valor">Valor</label>
                    <div class="input-group mb-3">
                        <input
                            class="form-control col-6"
                            type="number"
                            name="valor"
                            required="required"
                            autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label for="situacao" class="form-label">Situação</label>
                    <input
                        class="form-control form-control-sm col-6"
                        type="text"
                        name="situacao"
                        autocomplete="off"
                        required="required">
                </div>
                <div class="form-group">
                    <label for="perito" class="form-label">Colaborador</label>
                    <input
                        class="form-control form-control-sm col-6"
                        type="text"
                        name="perito"
                        autocomplete="off">
                </div>

                <!-- <div class="form-group"> <div class="row"> <label for="option1">Ajuda de
                Custo</label> </div> <div class="form-check form-check-inline"> <input
                class="form-check-input" type="radio" name="flagCusto" id="inlineRadio1"
                value="S"> <label class="form-check-label" for="inlineRadio1">Sim</label> </div>
                <div class="form-check form-check-inline"> <input class="form-check-input"
                type="radio" name="flagCusto" id="inlineRadio2" value="N"> <label
                class="form-check-label" for="inlineRadio2">Não</label> </div> </div> -->
              </div>
              <div class="modal-footer">
                <a href="starter.php">
                    <button type="button" class="btn btn-secondary">
                        <!--<i class="fas fa-times" style="margin-right:10px;"></i> -->
                        Cancelar
                    </button>
                </a>
                <button type="submit" class="btn btn-primary">
                    <!--<i class="fas fa-plus" style="margin-right:10px;"></i>-->
                    Incluir
                </button>
              </div>  
                
            </form>    
        </div>
      </div>
    </div>
  </div>

</div>

<table class="table  table-hover table-bordered">
  <thead>
    <tr class="">
      <!--  <th scope="col">#</th> -->
      <th scope="col">Numero do Processo</th>
      <th scope="col">Autor</th> 
      <th scope="col">Réu</th>
      <th scope="col">Valor</th>
      <th scope="col">Situação</th>
      <th scope="col">Colaborador</th>
      <th scope="col">Ajuda de Custo?</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($row = $resultGetRegistros->fetch_assoc()) {
      echo "<tr>";
      /*     echo "<th scope='row'>".$row["indice"]."</th>"; */
      echo "<td scope='row'>" . $row["numeroProcesso"] . "</td>";
      echo "<td scope='row'>" . $row["autor"] . "</td>";
      //     echo "<td>".$row["autor"]."</td>";
      echo "<td>" . $row["reu"] . "</td>";
      $campoValor = $row["valor"];
      //$campoValor = (strlen($row["valor"]) > 3) ?
      //  "<td>R$" . substr($row["valor"], 0, 1) . "." . substr($row["valor"], 1, 10) . "</td>" :
      //  "<td>R$" . $row["valor"] . "</td>";
      echo '<td>R$'.number_format($campoValor,2,'.','').'</td>';
      echo '<td>
              <button type="button"  
                      class="btn btn-sm btn-success" 
                      data-bs-toggle="modal" 
                      numeroProcesso="'.$row["numeroProcesso"].'" 
                      colaborador="'.$row["perito"].'"
                      valorAtualizado="'.$row["valorAtualizado"].'"
                      data-bs-target="#incluindoSituacao">
                <i class="far fa-plus-square"></i>
              </button>
              ';
      require("pages/modalSituacao.php");
      
      //$queryGetHistorico = "select * from historico where numeroProcesso = ".$row["numeroProcesso"]."";
      if($row["situacao"] == "")
        echo  ' <br><br>
              <button type="button"  
              class="btn-secondary btn btn-sm" 
              data-bs-toggle="modal" 
              disabled
              situacao="'.$row["situacao"].'"
              data-bs-target="#historicoSituacao">
              <i class="far fa-eye"></i></button>
        ';
      else
        echo ' 
              <br><br>
              <button class="btn-outline-dark btn btn-sm view-data"
                 data-bs-toggle="modal"
                 numeroProcesso="'.$row["numeroProcesso"].'" 
                 situacao="'.$row["situacao"].'">
              <i class="far fa-eye"></i></button>

              ';
      
      //require("pages/modalHistoricoSituacao.php");

            
      echo      '</td>';
      //echo "<a class='btn btn-xs btn-secondary' data-toggle='collapse' href='#collapseButton' role='button' aria-expanded='false' aria-controls='collapseButton'>";
      //echo " Histórico";
      //echo "<div class='collapse' id='collapseButton'>";
      //echo    "<ul class='list-group list-group-item-action'>";

      /*while($rowHistorico = $resultGetHistorico -> fetch_assoc()){
                if($row["numeroProcesso"] == $rowHistorico["numeroProcesso"])
                  echo "<li class='list-group-item'>".$rowHistorico["situacao"]." - ".$rowHistorico["perito"]."</li>";
              }
              */

      //echo "  </ul>";
      //echo "</div>";
      //echo "</a></td>";
      echo "<td>" . $row["perito"] . "</td>";

      //Ajuda de Custo?
      echo '<td>
                      <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <a href="phpclasses/encerraHonorario.php?id=' . $row["numeroProcesso"] . '&&id2=500">
                          <button type="button" class="btn btn-sm btn-outline-primary">Sim</button>
                        </a>
                        <a href="phpclasses/encerraHonorario.php?id=' . $row["numeroProcesso"] . '&&id2=' . $row["valor"] . '">
                          <button type="button" class="btn btn-sm btn-outline-primary">Não</button>
                        </a>
                      </div>
                    </td>';
      
      //Ações
      echo '<td>
              <button type="button" 
                      class="btn btn-sm btn-primary mr-1"
                      data-bs-toggle="modal"
                      numeroProcesso="'.$row["numeroProcesso"].'"
                      autor="'.$row["autor"].'"
                      reu="'.$row["reu"].'"
                      valor="'.number_format($row["valor"],2,'.','').'"
                      colaborador="'.$row["perito"].'" 
                      data-bs-target="#alteraRegistro">
                      <i class="fas fa-pencil-alt"></i>
              </button>
              
              <div class="modal fade" id="alteraRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3><i style="margin-right:10px;" class="fas fa-user-edit"></i>Alterar Registro</h3>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="phpclasses/alterarRegistro.php">
                        <div class="form-group">
                            <label for="numeroProcesso" hidden>Número do Processo</label>
                            <input class="form-control form-control-sm col-6" 
                                   type="text" 
                                   name="numeroProcesso" 
                                   placeholder="" 
                                   required 
                                   hidden 
                                   autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="autor">Autor</label>
                            <input class="form-control form-control-sm col-6" 
                                   type="text" 
                                   name="autor" 
                                   placeholder="" 
                                   required 
                                   autocomplete="off">
                        </div>
                        
                        <label for="exampleDataList" class="form-label">Réu</label>
                        <input class="form-control mb-3 col-6" 
                               autocomplete="off" 
                               list="datalistOptions" 
                               name="reu" 
                               id="exampleDataList">
                        <datalist id="datalistOptions">
                        </datalist>
                      
                          <div class="form-group">
                              <label for="valor">Valor</label>
                              <input class="form-control form-control-sm col-6"
                                     type="text" 
                                     name="valor" 
                                     placeholder="" 
                                     required 
                                     autocomplete="off">
                          </div>
                        
                        <div class="form-group">
                          <label for="perito">Colaborador</label>
                          <input class="form-control form-control-sm col-6" 
                                 type="text" 
                                 name="perito" 
                                 placeholder="" 
                                 autocomplete="off">
                        </div>
                        <div class="modal-footer">
                        <a href="starter.php">
                          <button type="button" class="btn btn-secondary">
                            Cancelar
                          </button>
                        </a>
                          <button type="submit" class="btn btn-primary">
                            Salvar
                          </button>
                        </div>                      
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            ';           
         
      //echo "<td><a href='telaAlteracao.php?id=" . $row["numeroProcesso"] . "'><button type='button' class='btn btn-sm btn-primary mr-1' data-toggle='modal' data-target='#modalAlteracao'><i class='fas fa-pencil-alt'></i></button></a>";
      echo '<br><br>
            <button type="button" 
                    data-bs-toggle="modal"
                    numeroProcesso="'.$row["numeroProcesso"].'"
                    autor="'.$row["autor"].'"
                    reu="'.$row["reu"].'"
                    valor="'.number_format($row["valor"],2,'.','').'"
                    colaborador="'.$row["perito"].'"
                    class="btn btn-sm btn-danger mr-1"
                    data-bs-target="#excluiRegistro">
                    <i class="far fa-trash-alt"></i>
            </button>
            
            <div class="modal fade" id="excluiRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3><i class="fas fa-user-times" style="margin-right:10px;"></i>Excluir Registro</h3>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="phpclasses/excluirRegistro.php">
                        <div class="form-group">
                            <label for="numeroProcesso" hidden>Número do Processo</label>
                            <input class="form-control form-control-sm col-6" 
                                   type="text" 
                                   name="numeroProcesso" 
                                   placeholder="" 
                                   required 
                                   hidden 
                                   autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="autor">Autor</label>
                            <input class="form-control form-control-sm col-6" 
                                   type="text" 
                                   name="autor" 
                                   placeholder="" 
                                   required 
                                   autocomplete="off"
                                   disabled>
                        </div>
                        
                        <label for="exampleDataList" class="form-label">Réu</label>
                        <input class="form-control mb-3 col-6" 
                               autocomplete="off" 
                               list="datalistOptions" 
                               name="reu" 
                               id="exampleDataList"
                               disabled>
                        <datalist id="datalistOptions">
                        </datalist>
                      
                          <div class="form-group">
                              <label for="valor">Valor</label>
                              <input class="form-control form-control-sm col-6"
                                     type="text" 
                                     name="valor" 
                                     placeholder="" 
                                     required 
                                     autocomplete="off"
                                     disabled>
                          </div>
                        
                        <div class="form-group">
                          <label for="perito">Colaborador</label>
                          <input class="form-control form-control-sm col-6" 
                                 type="text" 
                                 name="perito" 
                                 placeholder="" 
                                 autocomplete="off"
                                 disabled>
                        </div>
                        <div class="modal-footer">
                        <a href="starter.php">
                          <button type="button" class="btn btn-secondary">
                            Cancelar
                          </button>
                        </a>
                          <button type="submit" class="btn btn-primary">
                            Excluir
                          </button>
                        </div>                      
                      </form>
                    </div>
                  </div>
                </div>
              </div>';
      //echo "<br><br><a href='telaExclusao.php?id=" . $row["numeroProcesso"] . "'><button type='button' class='btn btn-sm btn-secondary mr-1'><i class='far fa-trash-alt'></i></button></a>";
      //echo "<a href='telaExclusao.php?id=".$row["numeroProcesso"]."'><button type='button' class='btn btn-sm btn-success'><i class='far fa-trash-alt'></i> Modal</button></a>";
      echo "</td>";
      echo "</tr>";
    }

    mysqli_close($conn)
    ?>


  </tbody>
</table>
<!--<div>
              <strong>Página:<?php /* echo $page_no." de ".$total_no_of_pages; */ ?> </strong>
        </div>-->
<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group me-2" role="group" aria-label="First group">
      <?php
        switch ($total_no_of_pages) {
          case $total_no_of_pages <= 10:
            for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
              if ($counter == $page_no)
                echo '<a class=" active btn btn-outline-secondary">'.$counter.'</a>';
              else
                echo '<a class="btn btn-outline-secondary" 
                         href="?page_no='.$counter.'">'.$counter.'</a>';
            }
            break;
          
          case $total_no_of_pages > 10 && $page_no <= 4:
            			
              for ($counter = 1; $counter < 8; $counter++){		 
              if ($counter == $page_no) {
                  echo '<a class="active btn btn-outline-secondary">'.$counter.'</a>';	
              }else{
                  echo '<a class=" btn btn-outline-secondary"
                           href="?page_no='.$counter.'">'.$counter.'</a>';
                }
              }
            echo '<a class="btn btn-outline-secondary">...</a>';
            echo '<a class="btn btn-outline-secondary" href="?page_no='.$second_last.'">'.$second_last.'</a>';
            echo '<a class="btn btn-outline-secondary" href="?page_no='.$total_no_of_pages.'">'.$total_no_of_pages.'</a>';
            
            break;

          case $total_no_of_pages > 10 && $page_no > 4 && $page_no < $total_no_of_pages - 4:
            echo '<a class="btn btn-outline-secondary" href="?page_no=1">1</a>';
            echo '<a class="btn btn-outline-secondary" href="?page_no=2">2</a>';
            echo '<a class="btn btn-outline-secondary">...</a>';
            for (
                $counter = $page_no - $adjacents;
                $counter <= $page_no + $adjacents;
                $counter++
                ) { 
                if ($counter == $page_no) {
                  echo '<a class="active btn btn-outline-secondary">'.$counter.'</a>'; 
                }else{
                    echo '<a class="btn btn-outline-secondary" href="?page_no='.$counter.'">'.$counter.'</a>';
                      }                  
                  }
            echo '<a class="btn btn-outline-secondary">...</a>';
            echo '<a class="btn btn-outline-secondary" href="?page_no='.$second_last.'">'.$second_last.'</a>';
            echo '<a class="btn btn-outline-secondary" href="?page_no='.$total_no_of_pages.'">'.$total_no_of_pages.'</a>';
            break;

          default:
            echo '<a class="btn btn-outline-secondary" href="?page_no=1">1</a>';
            echo '<a class="btn btn-outline-secondary" href="?page_no=2">2</a>';
            echo '<a class="btn btn-outline-secondary">...</a>';
            for (
                $counter = $total_no_of_pages - 6;
                $counter <= $total_no_of_pages;
                $counter++
                ) {
                if ($counter == $page_no) {
                  echo '<a class="active btn btn-outline-secondary">'.$counter.'</a>'; 
                  }else{
                    echo '<a class="btn btn-outline-secondary" href="?page_no='.$counter.'">'.$counter.'</a>';
                  }                   
            }
            break;
        }
        
      ?>

    
  </div>
</div>
<div class="modal fade" id="historicoSituacao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Visualizar Situação</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3" id="registroHistorico">
          
        </div>
      </div>
    </div>
  </div>
</div>

