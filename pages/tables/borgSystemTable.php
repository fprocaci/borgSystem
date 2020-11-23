          <?php 
            $queryGetRegistros = "select * from registro";
            $resultCount = mysqli_query($conn,"select count(*) as total_records from registro");
            $total_records = mysqli_fetch_array($resultCount);
            $total_records_per_page = 10;
            $total_records = $total_records['total_records'];
            $page_no = (isset($_GET['page_no']) && $_GET['page_no']!="")?
            $page_no = $_GET['page_no']: $page_no = 1;

            $offset = ($page_no - 1) * $total_records_per_page;
            $total_no_of_pages = ceil($total_records / $total_records_per_page);

            $resultGetRegistros = mysqli_query($conn,"select * from registro LIMIT $offset,$total_records_per_page");
                        
            $previous_page = $page_no - 1;
            $next_page = $page_no + 1;
            $adjacents = "2";
            
            $second_last = $total_no_of_pages - 1;
          ?>
          
          <table class="table table-hover table-bordered">
            <thead>
              <tr class="bg-info">
              <!--  <th scope="col">#</th> -->
                <th scope="col">Numero do Processo</th>
                <th scope="col">Autor</th>
                <th scope="col">Réu</th>
                <th scope="col">Valor</th>
                <th scope="col">Situação</th>
                <th scope="col">Perito</th>
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
              echo "<td>".$row["valor"]."</td>";
              echo "<td>".$row["situacao"]."</td>";
              echo "<td>".$row["perito"]."</td>";
              echo "<td><a href='telaAlteracao.php?id=".$row["numeroProcesso"]."'><button type='button' class='btn btn-sm btn-primary col-12' data-toggle='modal' data-target='#modalAlteracao'>Editar</button></a>";
              echo "<a href='telaExclusao.php?id=".$row["numeroProcesso"]."'><button type='button' class='btn btn-sm col-12 btn-danger'>Excluir</button></a>";
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

        
