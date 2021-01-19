<?php include("phpclasses/conexao.php")?>
<?php 
    include("phpclasses/header.php");
    $queryProcessos = 'SELECT distinct(numeroProcesso) FROM controle_de_honorarios_csv';
    $listProcessos = mysqli_query($conn, $queryProcessos);
    
    if(isset($_POST["numeroProcesso"])){
        $numeroProcesso = $_POST["numeroProcesso"];
        $queryStatus = "SELECT * FROM historico where numeroProcesso = '$numeroProcesso'";
        $listStatus = mysqli_query($conn, $queryStatus);
    }
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row-mb">
        <div class="col-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item text-info active" aria-current="page"><strong>Histórico Status</strong></li>
              </ol>
            </nav>
        </div>
      </div>
    </div>
</div>
<div class="container-fluid">
    <form class="col-12 form-inline mb-3" method="POST" action="<?php $_PHP_SELF ?>">
            <div class="row">
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Processo</span>
                        <input class="form-control col-8" list="datalistOptions" name="numeroProcesso" id="exampleDataList" placeholder="..." autocomplete="off">
                        <datalist id="datalistOptions">
                        <?php
                            if (mysqli_num_rows($listProcessos) > 0) {
                                while($processo = mysqli_fetch_assoc($listProcessos)) { 
                                    echo "<option value='".$processo["numeroProcesso"]."'>";
                                }
                            }          
                        ?>
                        </datalist>
                        <button type="submit" class="btn btn-secondary ml-1"><i style="margin-right:5px" class="fas fa-search"></i>Buscar</span></button>
                    </div>
                </div>
            </div>
    </form>

    <?php include("pages/tables/tableHistoricoStatus.php");?>
    
</div>

</div>

<?php include("phpclasses/footer.php")?>