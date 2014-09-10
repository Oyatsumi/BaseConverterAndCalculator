<?php

global $vetorbase;
$vetorbase['A'] = 10;
$vetorbase['B'] = 11;
$vetorbase['C'] = 12;
$vetorbase['D'] = 13;
$vetorbase['E'] = 14;
$vetorbase['F'] = 15;
$vetorbase['G'] = 16;
$vetorbase['H'] = 17;
$vetorbase['I'] = 18;
$vetorbase['J'] = 19;
$vetorbase['K'] = 20;
$vetorbase['L'] = 21;
$vetorbase['M'] = 22;
$vetorbase['N'] = 23;
$vetorbase['O'] = 24;
$vetorbase['P'] = 25;
$vetorbase['Q'] = 26;
$vetorbase['R'] = 27;
$vetorbase['S'] = 28;
$vetorbase['T'] = 29;
$vetorbase['U'] = 30;
$vetorbase['V'] = 31;
$vetorbase['W'] = 32;
$vetorbase['X'] = 33;
$vetorbase['Y'] = 34;
$vetorbase['Z'] = 35;

$vetorbase2[10] = 'A';
$vetorbase2[11] = 'B';
$vetorbase2[12] = 'C';
$vetorbase2[13] = 'D';
$vetorbase2[14] = 'E';
$vetorbase2[15] = 'F';
$vetorbase2[16] = 'G';
$vetorbase2[17] = 'H';
$vetorbase2[18] = 'I';
$vetorbase2[19] = 'J';
$vetorbase2[20] = 'K';
$vetorbase2[21] = 'L';
$vetorbase2[22] = 'M';
$vetorbase2[23] = 'N';
$vetorbase2[24] = 'O';
$vetorbase2[25] = 'P';
$vetorbase2[26] = 'Q';
$vetorbase2[27] = 'R';
$vetorbase2[28] = 'S';
$vetorbase2[29] = 'T';
$vetorbase2[30] = 'U';
$vetorbase2[31] = 'V';
$vetorbase2[32] = 'W';
$vetorbase2[33] = 'X';
$vetorbase2[34] = 'Y';
$vetorbase2[35] = 'Z';

if (isset($_POST["submit"])) {
		extract($_POST);	
}else{
	//operação
	$contac1 = $_GET['op1'];
	$contac2 = $_GET['op2'];
	$sinal = $_GET['sinal'];
	$contab1 = $_GET['op1base'];
	$contab2 = $_GET['op2base'];
	$resultadobase = $_GET['op3base'];
	
	//conversao
	$conteudo1 = $_GET['cop1'];
	$base1 = $_GET['cop1base'];
	$base2 = $_GET['cop2base'];
}

function converterpdezfloat($num, $base){
	global $vetorbase;
	$virgula = explode(",", $num);
	for ($i = 1; $i <= strlen($virgula[0]); $i++){
		$aux = strtoupper(substr($virgula[0], -$i, 1));
		if (is_numeric($aux) && ($aux >= $base)){die('Houve um erro ao tentar calcular, <br>número que não pertence a base.');}
		if (is_numeric($aux)){
		$soma += $aux * pow($base, $i - 1);
		}else{
			if (($vetorbase[$aux] == '') && ($vetorbase[$aux] != ',')){die('Houve um erro ao tentar calcular, <br>algum caractere que não pode ser reconhecido.');}
		$soma += $vetorbase[$aux] * pow($base, $i - 1);	
		}
	}	
	for ($i = 1; $i <= strlen($virgula[1]); $i++){
		$aux = strtoupper(substr($virgula[1], -$i, 1));
		if (is_numeric($aux) && ($aux >= $base)){die('Houve um erro ao tentar calcular, <br>número que não pertence a base.');}
		if (is_numeric($aux)){
		$soma += $aux * 1/pow($base, strlen($virgula[1]) + 1 - $i);
		}else{
			if (($vetorbase[$aux] == '') && ($vetorbase[$aux] != ',')){die('Houve um erro ao tentar calcular, <br>algum caractere que não pode ser reconhecido.');}
		$soma += $vetorbase[$aux] * 1/pow($base, strlen($virgula[1])+ 1 - $i);	
		}
	}
	$soma = str_replace(".", ",", $soma);
	return $soma;
}


function converterdedezfloat($num, $base){
	
	global $vetorbase2;
	
	$virgula = explode(",", $num);
	$num = $virgula[0];
	$div = 1;
	while($div != 0){
		$div = floor($num / $base);
		$mod2 = (intval($num) % intval($base));
		$num = $div;
		if ($mod2 > 9){$mod2 = $vetorbase2[$mod2];}
		$resultado = $mod2.$resultado;
	}

	$virgula[1] = "0.".$virgula[1];
	while($virgula[1] != 0){
		$virgula[1] = $virgula[1] * $base; 
		if (intval($virgula[1]) > 9){$addvar = $vetorbase2[intval($virgula[1])];}else{$addvar = intval($virgula[1]);}
		$resultado2 .= $addvar;
		$virgula[1] -= intval($virgula[1]);
		$rodar += 1;
		if ($rodar >= 25){$virgula[1] = 0;}
		$ativar = true;
	}
	
	if ($resultado2 != ''){
		$resultado = $resultado.",".$resultado2;
	}
	return $resultado;
}


function converterpdez($num, $base){
	global $vetorbase;
	for ($i = 1; $i <= strlen($num); $i++){
		$aux = strtoupper(substr($num, -$i, 1));
		if (is_numeric($aux) && ($aux >= $base)){die('Houve um erro ao tentar calcular, <br>número que não pertence a base.');}
		if (is_numeric($aux)){
		$soma += $aux * pow($base, $i - 1);
		}else{
			if ($vetorbase[$aux] == ''){die('Houve um erro ao tentar calcular, <br>algum caractere que não pôde ser reconhecido.');}
		$soma += $vetorbase[$aux] * pow($base, $i - 1);	
		}
	}	
	return $soma;
}

function converterdedez($num, $base){
	global $vetorbase2;
	$div = 1;
	while($div != 0){
		$div = floor($num / $base);
		$mod2 = (intval($num) % intval($base));
		$num = $div;
		if ($mod2 > 9){$mod2 = $vetorbase2[$mod2];}
		$resultado = $mod2.$resultado;
	}
	return $resultado;
}


if ($sinal != ""){
	$contac1a = converterpdezfloat($contac1, $contab1);
	$contac2a = converterpdezfloat($contac2, $contab2);

	
	$contac1a = str_replace(",", ".", $contac1a);
	$contac2a = str_replace(",", ".", $contac2a);
	

	$ativ = false;
	if ($sinal == "/"){$selected[5] = "selected";$resultado = $contac1a / $contac2a; }
	elseif ($sinal == "+"){$selected[4] = "selected";$resultado = $contac1a + $contac2a;}
	elseif($sinal == "-"){$selected[3] = "selected";$resultado = $contac1a - $contac2a; if ($contac2a > $contac1a){$ativ = true;$resultado *= - 1;}}
	elseif($sinal == "x"){$selected[2] = "selected";$resultado = $contac1a * $contac2a;}
	elseif($sinal == "raiz"){$selected[7] = "selected";$resultado = pow($contac2a, 1/$contac1a);}
	elseif($sinal == "exp"){$selected[6] = "selected";$resultado = pow($contac1a, $contac2a);}
	
	$add = 0;
	for ($h = 2; $h <= 7; $h++){
		if ($selected[$h] != "selected"){$add += 1;}
		}
	if ($add == 6){$selected[1] = "selected";}
	
	$resultado = str_replace(".", ",", $resultado);	
	
	$resultadoconta = converterdedezfloat($resultado, $resultadobase);
	if ($ativ == true){$resultadoconta = "-".$resultadoconta;}
}

if ($conteudo1 != ""){
	$resultadopassar = converterpdezfloat($conteudo1, $base1);
	$resultadopassar = converterdedezfloat($resultadopassar, $base2);
}



?>

<html>
<head>
<title>Conversor e Calculadora de Bases</title>
	  <meta name="author" content="Érick Oliveira">

	  <meta name="description" content="Conversor e Calculadora de Bases Online">

	  <meta name="keywords" content="calcular, base, converter, conversão, binário, decimal, hexadecimal">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<script language="javascript">
document.getElementById('carregando').style.visibility = 'hidden';

function ValidarForm(esseform){
	document.getElementById('carregando').style.visibility = 'visible';
	
	if (esseform.conteudo1.value == ""){
		alert('Primeiro preencha o número que você quer converter.');
		esseform.conteudo1.focus();
		document.getElementById('carregando').style.visibility = 'hidden';
	return false;}
	
	if (esseform.base1.value == ""){
		alert('Primeiro preencha a base do número de origem para conversão.');
		esseform.base1.focus();
		document.getElementById('carregando').style.visibility = 'hidden';
	return false;}
	
	if (esseform.base2.value == ""){
		alert('Primeiro preencha a base do número de destino da conversão.');
		esseform.base2.focus();
		document.getElementById('carregando').style.visibility = 'hidden';
	return false;}
	
	if ((esseform.base2.value < 2) || (esseform.base2.value > 36) || (esseform.base1.value < 2) || (esseform.base1.value > 36)){
		alert('Os números das bases devem ser maiores ou igual a 2 e menores ou igual a 36.');
		document.getElementById('carregando').style.visibility = 'hidden';
	return false;}
	
	return true;
}

function ValidarFormd(esseform){
	document.getElementById('carregando2').style.visibility = 'visible';
	
	if (esseform.contac1.value == ""){
		alert('Primeiro preencha o primeiro número da conta.');
		esseform.contac1.focus();
		document.getElementById('carregando2').style.visibility = 'hidden';
	return false;}
	
	if (esseform.contab1.value == ""){
		alert('Primeiro preencha a base do primeiro número da conta.');
		esseform.contab1.focus();
		document.getElementById('carregando2').style.visibility = 'hidden';
	return false;}
	
	if (esseform.sinal.value == ""){
		alert('Primeiro escolha um sinal para essa operação.');
		esseform.sinal.focus();
		document.getElementById('carregando2').style.visibility = 'hidden';
	return false;}
	
	if (esseform.contac2.value == ""){
		alert('Primeiro preencha o segundo número da conta.');
		esseform.contac2.focus();
		document.getElementById('carregando2').style.visibility = 'hidden';
	return false;}
	
	if (esseform.contab2.value == ""){
		alert('Primeiro preencha a base do segundo número da conta.');
		esseform.contab2.focus();
		document.getElementById('carregando2').style.visibility = 'hidden';
	return false;}
	
	if (esseform.resultadobase.value == ""){
		alert('Primeiro preencha a base do resultado.');
		esseform.resultadobase.focus();
		document.getElementById('carregando2').style.visibility = 'hidden';
	return false;}
	
	if ((esseform.contab1.value < 2) || (esseform.contab1.value > 36) || (esseform.contab2.value < 2) || (esseform.contab2.value > 36) || (esseform.resultadobase.value < 2) || (esseform.resultadobase.value > 36)){
		alert('Os números das bases devem ser maiores ou igual a 2 e menores ou igual a 36.');
		document.getElementById('carregando').style.visibility = 'hidden';
	return false;}
	
	return true;
}

</script>

<div style="width: 300px" id="conteudo">
<div style="z-index:3; position:absolute; top:9px; left:150px">
<img src="loading.gif" id="carregando" width="18" height="18" style="visibility:hidden"></div>
<div style="z-index:3; position:absolute; top:155px; left:175px">
<img src="loading.gif" id="carregando2" width="18" height="18" style="visibility:hidden"></div>

<div style="z-index:2;">

<div style="font-family:Tahoma, Geneva, sans-serif; font-size: 24px">
<form onSubmit="return ValidarForm(this)" method="post" action="index.php" name="qualquer" id="qualquer">
<div style=" border: solid black 1px;font-size: 16px; width: 300px">&nbsp;Convers&atilde;o de Base</div>
<center>(<input id="conteudo1" name="conteudo1" style="border:none; border-bottom: solid black 1px; font-size:24px; width: 80px;" type="text" value="<?php echo $conteudo1 ?>">)<input style="border:none; font-size:9px; border-bottom: solid black 1px; width: 20px" id="base1" type="text" name="base1" value="<?php echo $base1 ?>">
=&nbsp;
(<input id="conteudo2" readonly="readonly" style="border:none; border-bottom: solid black 1px; font-size:24px; width: 80px;" type="text" value="<?php echo $resultadopassar ?>">)<input style="border:none; border-bottom: solid black 1px; font-size:9px; width: 20px" id="base2" type="text" value="<?php echo $base2 ?>" name="base2"></center>
<br>
<center><input style="border: solid black 1px; width:200px; background-color:white" type="submit" name="submit" value="Converter" /></center>
</form>


<div style="padding-top: 20px">
<div style=" border: solid black 1px;font-size: 16px; width: 300px">&nbsp;Opera&ccedil;&otilde;es entre Bases</div>
<form onSubmit="return ValidarFormd(this)" method="post" action="index.php">
(<input id="contac1" style="border:none; font-size:24px; width: 80px;border-bottom: solid black 1px;" type="text" value="<?php echo $contac1 ?>" name="contac1">)<input id="contab1" style="border:none; font-size:9px;border-bottom: solid black 1px; width: 20px" type="text" value="<?php echo $contab1 ?>" name="contab1">
<select style="border:none; font-family:Tahoma, Geneva, sans-serif; font-size: 24px; width:40px" id="sinal" name="sinal">
<option <?php echo $selected[1] ?> value=""></option>
<option <?php echo $selected[2] ?> value="x">x</option>
<option <?php echo $selected[3] ?> value="-">-</option>
<option <?php echo $selected[4] ?> value="+">+</option>
<option <?php echo $selected[5] ?> value="/">/</option>
<option <?php echo $selected[6] ?> value="exp">^</option>
<option <?php echo $selected[7] ?> value="raiz">√</option>
</select>  
(<input id="contac2" name="contac2" style="border:none;border-bottom: solid black 1px; font-size:24px; width: 80px;" type="text" value="<?php echo $contac2 ?>">)<input name="contab2" style="border:none; border-bottom: solid black 1px;font-size:9px; width: 20px" id="contab2" type="text" value="<?php echo $contab2 ?>"><br><center> <div style="position:relative;left:-1px">=</div> 
</center>

<center>
(<input id="resultadoconta" readonly="readonly" style="border:none;border-bottom: solid black 1px; font-size:24px; width: 80px;" type="text" value="<?php echo $resultadoconta ?>">)<input style="border:none; font-size:9px;border-bottom: solid black 1px; width: 20px" id="resultadobase" name="resultadobase" type="text" value="<?php echo $resultadobase ?>">
</center><br>
<center><input style="border: solid black 1px; width:200px; background-color:white" type="submit" name="submit" value="Calcular" />
<br><br><div style="font-size:16px">
  <p>Esse conversor agora suporta números fracionários(,). Algumas conversões fracionárias são aproximadas.<br><br>A operação de raiz funciona da seguinte forma: o expoente da raiz é o primeiro campo, e o segundo campo é o número que está dentro da raiz.</p>
  <p>&nbsp;</p>
  <p>Estarei disponibilizando o código fonte aqui pra quem quiser, por favor mantenham os créditos:</p>
  <p><a href="calc.zip">baixar</a></p>
  <p>&nbsp;</p>
  <p>Feito por Érick Oliveira.</p>
</div>
</center>
</form>



</div>
</div>

</div>

</div>
</html>