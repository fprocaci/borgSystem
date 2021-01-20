<?php
   $queryProcessos = 'SELECT distinct(numeroProcesso) FROM controle_de_honorarios_csv';
   $listProcessos = mysqli_query($conn, $queryProcessos);
   
   $numeroProcesso = $_REQUEST['id'];
   
   $queryStatus = "SELECT * FROM historico where numeroProcesso = '$numeroProcesso'";
   $listStatus = mysqli_query($conn, $queryStatus);
?>
    <div class="table-responsive">
        <table class="table table-secondary col-8">
            <thead>
                <tr class="table-secondary">
                    <th class="table-secondary">#</th>
                    <th class="table-secondary">Status</th>
                    <th class="table-secondary">Perito</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if (mysqli_num_rows($listStatus) > 0) {
                    while($obj = mysqli_fetch_assoc($listStatus)) { 
                        echo '<tr class="table-secondary">
                                <td class="table-secondary">'.$obj["numeroProcesso"].'</td>
                                <td class="table-secondary">'.$obj["situacao"].'</td>
                                <td class="table-secondary">'.$obj["perito"].'</td>
                              </tr>';
                    }
                }
            ?>
            </tbody>
        </table>
    </div>

    <a href="starter.php"><button type="button" class="btn btn-outline-secondary rounded-pill">Voltar</button></a>

