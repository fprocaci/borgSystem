<?php
mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, 'SET character_set_connection=utf8');
mysqli_query($conn, 'SET character_set_client=utf8');
mysqli_query($conn, 'SET character_set_results=utf8');

if (isset($_POST['numeroProcesso']))
  $numeroProcesso = $_POST['numeroProcesso'];
$queryGetRegistros = "select * from controle_de_honorarios_csv ";
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
    <button type="submit" class="btn btn-secondary ml-1"><i style="margin-right:5px" class="fas fa-search"></i>Buscar</span></button>
    <!--<div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="telaInclusao.php" class="btn btn-success ml-2" role="button" >
                    <i class="fas fa-plus-circle"></i>
                    Novo Registro
                </a>
                
              </div> -->
  </div>
</form>

<table class="table  table-hover table-bordered">
  <thead>
    <tr class="bg-info">
      <!--  <th scope="col">#</th> -->
      <th scope="col">Numero do Processo</th>
      <!--  <th scope="col">Autor</th> -->
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
      //     echo "<td>".$row["autor"]."</td>";
      echo "<td>" . $row["reu"] . "</td>";
      $campoValor;
      $campoValor = (strlen($row["valor"]) > 3) ?
        "<td>R$" . substr($row["valor"], 0, 1) . "." . substr($row["valor"], 1, 10) . "</td>" :
        "<td>R$" . $row["valor"] . "</td>";
      echo $campoValor;
      if ($row["situacao"] <> "")
        echo '<td>' . $row["situacao"] . '<br><br>
                  <a href="telaHistoricoStatus.php?id=' . $row["numeroProcesso"] . '">
                    <button type="button" class="btn btn-primary">Historico</button>
                  </td>
                </a>';
      else
        echo '<td>' . $row["situacao"] . '</td>';
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
      echo '<td>
                      <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <a href="phpclasses/encerraHonorario.php?id=' . $row["numeroProcesso"] . '&&id2=500">
                          <button type="button" class="btn btn-primary">Sim</button>
                        </a>
                        <a href="phpclasses/encerraHonorario.php?id=' . $row["numeroProcesso"] . '&&id2=' . $row["valor"] . '">
                          <button type="button" class="btn btn-danger">Não</button>
                        </a>
                      </div>
                    </td>';
      echo "<td><a href='telaAlteracao.php?id=" . $row["numeroProcesso"] . "'><button type='button' class='btn btn-sm btn-primary mr-1' data-toggle='modal' data-target='#modalAlteracao'><i class='fas fa-pencil-alt'></i> Editar</button></a>";
      echo "<a href='telaExclusao.php?id=" . $row["numeroProcesso"] . "'><button type='button' class='btn btn-sm btn-danger mr-1'><i class='far fa-trash-alt'></i> Excluir</button></a>";
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

<ul class="pagination">
  <?php
  if ($page_no > 1) echo "<li class ='page-item'><a href='?page_no=1' class='page-link'>Inicio</a></li>"
  ?>
  <li class="page-item <?php if ($page_no <= 1) echo "disabled"; ?>">
    <a class="page-link" <?php if ($page_no > 1) echo " href='?page_no = $previous_page'"; ?>>Anterior</a>
  </li>

  <?php
  if ($total_no_of_pages <= 10) {
    for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
      if ($counter == $page_no)
        echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";
      else
        echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
    }
  }
  ?>

  <li class="page-item <?php if ($page_no >= $total_no_of_pages) {
                          echo "disabled";
                        } ?>">
    <a class="page-link" <?php if ($page_no < $total_no_of_pages) {
                            echo "href='?page_no=$next_page'";
                          } ?>>Próximo</a>
  </li>
  <?php
  if ($page_no < $total_no_of_pages)
    echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>Ultima &rsaquo;&rsaquo;</a></li>";
  ?>
</ul>