<?php
    if(isset($_POST["numeroProcesso"])){
        $numeroProcesso = $_POST["numeroProcesso"];
        $queryStatus = "SELECT * FROM historico where numeroProcesso = '$numeroProcesso'";
        $listStatus = mysqli_query($conn, $queryStatus);
    }
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
                if (isset($_POST["numeroProcesso"]) && mysqli_num_rows($listStatus) > 0) {
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

