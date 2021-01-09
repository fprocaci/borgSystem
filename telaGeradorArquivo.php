<?php
    header("Content-Type: application/vnd.msword");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("content-disposition: attachment;filename=sampleword.doc");         
  
	$conteudo = '<html>
					<head>
						<meta charset="UTF-8">
						<meta name="viewport" content="width=device-width, initial-scale=1.0">
					</head>
					<body>
						<h3 class="text-blue">Conteúdo do Documento</h3>
					</body>
				 </html>';

	echo $conteudo;
?> 