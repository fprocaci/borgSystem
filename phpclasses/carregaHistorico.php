<?php 
    if(isset($_POST["numeroProcesso"])){
      include_once "conexao.php";

      $query_historico = "SELECT * FROM HISTORICO WHERE NUMEROPROCESSO = '".$_POST["numeroProcesso"]."'";
      $resultHistorico = mysqli_query($conn,$query_historico);
      //$rowHistorico = mysqli_fetch_assoc($resultHistorico);
      

      while($row = $resultHistorico -> fetch_assoc()){
        if(isset($valores))
          $valores = $valores ."<tr>
                                  <td>".$row["situacao"]."</td>  
                                </tr>";
        else
          $valores = '<table class="table">
                        <thead>
                          <tr>
                            <th>Situacao</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>'.$row["situacao"].'</td>
                          </tr>';
      }

      if(isset($valores))
      echo $valores."</tbody>
                  </table>";
    }
?>