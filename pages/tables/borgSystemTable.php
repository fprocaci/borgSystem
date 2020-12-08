          <?php 
            $queryGetRegistros = "select * from registro";
            //$queryGetRegistros = "select * from historico";
            $resultCount = mysqli_query($conn,"select count(*) as total_records from registro");
            $total_records = mysqli_fetch_array($resultCount);
            $total_records_per_page = 10;
            $total_records = $total_records['total_records'];
            $page_no = (isset($_GET['page_no']) && $_GET['page_no']!="")?
            $page_no = $_GET['page_no']: $page_no = 1;

            $offset = ($page_no - 1) * $total_records_per_page;
            $total_no_of_pages = ceil($total_records / $total_records_per_page);

            $resultGetRegistros = mysqli_query($conn,"select * from registro LIMIT $offset,$total_records_per_page");
            //$resultGetHistorico = mysqli_query($conn,$queryGetRegistros); 
            $resultGetHistorico = mysqli_query($conn,"select * from historico");
            

            $previous_page = $page_no - 1;
            $next_page = $page_no + 1;
            $adjacents = "2";
            
            $second_last = $total_no_of_pages - 1;
          ?>
          <form class="form-inline" action="telaInclusao.php">
            <div class="input-group">
              <span class="input-group-text" id="filtro">Número do Processo</span>
              <input type="text"  aria-label="numeroProcesso" aria-describedby="filtro">
              <span class="input-group-text" id="filtro"><i class="fas fa-search"></i></span>
              <div style="float:right">
                <a href="telaInclusao.php">
                  <button type="submit" style="float:right" class="btn btn-success" >
                    <i class="far fa-share-square"></i>
                      Incluir Registro
                  </button>
                </a>
              </div>
              
            </div>
          </form>
          <table class="table  table-hover table-bordered">
            <thead>
              <tr class="bg-info">
              <!--  <th scope="col">#</th> -->
                <th scope="col">Numero do Processo</th>
                <th scope="col">Autor</th>
                <th scope="col">Réu</th>
                <th scope="col">Valor</th>
                <th scope="col">Situação</th>
                <th scope="col">Colaborador</th>
                <th scope="col">Ação</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              while($row = $resultGetRegistros -> fetch_assoc()) {
              echo "<tr>";
         /*     echo "<th scope='row'>".$row["indice"]."</th>"; */
              echo "<td scope='row'>".$row["numeroProcesso"]."</td>";
              echo "<td>".$row["autor"]."</td>";
              echo "<td>".$row["reu"]."</td>";
              $campoValor;
              $campoValor = (strlen($row["valor"]) > 3)?
              "<td>R$".substr($row["valor"],0,1).".".substr($row["valor"],1,10)."</td>":
              "<td>R$".$row["valor"]."</td>";
              echo $campoValor;
              echo "<td>";
              echo "<a class='btn btn-xs btn-secondary' data-toggle='collapse' href='#collapseButton' role='button' aria-expanded='false' aria-controls='collapseButton'>";
              echo " Histórico";
              echo "<div class='collapse' id='collapseButton'>";
              echo    "<ul class='list-group list-group-item-action'>";
              
              while($rowHistorico = $resultGetHistorico -> fetch_assoc()){
                if($row["numeroProcesso"] == $rowHistorico["numeroProcesso"])
                  echo "<li class='list-group-item'>".$rowHistorico["situacao"]." - ".$rowHistorico["perito"]."</li>";
              }

              echo "  </ul>";
              echo "</div>";
              echo "</a></td>";
              echo "<td>".$row["perito"]."</td>";
              echo "<td><a href='telaAlteracao.php?id=".$row["numeroProcesso"]."'><button type='button' class='btn btn-sm btn-outline-primary col-12' data-toggle='modal' data-target='#modalAlteracao'><i class='fas fa-pencil-alt'></i>Editar</button></a>";
              echo "<a href='telaExclusao.php?id=".$row["numeroProcesso"]."'><button type='button' class='btn btn-sm col-12 btn-outline-danger'><i class='far fa-trash-alt'></i>Excluir</button></a>";
              echo"</td>";
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
              if($page_no > 1) echo "<li class ='page-item'><a href='?page_no=1' class='page-link'>Inicio</a></li>"
            ?>
            <li class ="page-item <?php if($page_no <= 1) echo "disabled";?>">
              <a class="page-link"<?php if($page_no > 1) echo " href='?page_no = $previous_page'";?>>Anterior</a>
            </li>

            <?php
            if ($total_no_of_pages <= 10){   
              for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                if ($counter == $page_no) 
                  echo "<li class='active page-item'><a class='page-link'>$counter</a></li>"; 
                else
                  echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
              
              }
            }  
            ?>

            <li class="page-item <?php if($page_no >= $total_no_of_pages){
              echo "disabled";
              } ?>">
              <a class="page-link"<?php if($page_no < $total_no_of_pages) {
              echo "href='?page_no=$next_page'";
              } ?>>Próximo</a>
            </li>
            <?php 
              if($page_no < $total_no_of_pages)
                echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>Ultima &rsaquo;&rsaquo;</a></li>";
             ?>
        </ul>

        
