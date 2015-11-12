<?php

class calendrier extends sql {

	/*
	 * Savoir sur quelle zone on est
	 */
	public function zone() {
		if(empty($_SESSION['zone_vacs']))
		{
			$_SESSION['zone_vacs']=NULL;
		}
			?>
			<form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="POST">
			<select name="vacs">
			<option value='0'>SELECTIONNER ZONE</option>
			<option value='1'>ZONE A</option>
			<option value='2'>ZONE B</option>
			<option value='3'>ZONE C</option>
			</select> 
			<input type="submit" name="zone" value="OK" /> 
			</form>
			<br><br>
		<?php
		if(isset($_POST['zone'])) 
		{
			$_SESSION['zone_vacs']=$_POST['vacs'];
		}
		if(!empty($_SESSION['zone_vacs']))
		{
			if($_SESSION['zone_vacs']==1)
			{
				echo'Zone de vancances selectionnées : A';
			}
			if($_SESSION['zone_vacs']==2)
			{
				echo'Zone de vancances selectionnées : B';
			}
			if($_SESSION['zone_vacs']==3)
			{
				echo'Zone de vancances selectionnées : C';
			}

		}
	}

	/*
	 * Mise en place du calendrier
	 */
	public function get_calendrier() {

		if(!empty($_SESSION['zone_vacs']) && $_SESSION['zone_vacs']!= 0)
		{
		$vacs = $_SESSION['zone_vacs'];
		$req = $this->dbh->query("SELECT * FROM semaine WHERE zone_semaine ='$vacs'");
		$data = $req->fetchall();

			if(!empty($_GET['moisForm']))
			{
				$_SESSION['Mois'] = $_GET['moisForm'];
			}

			else
			{
				$_SESSION['Mois'] = date("n");
			}
			
						$_SESSION['annéeEnCours'] = date("Y");
				$_SESSION['année'] = date("Y");
			
			
			if($_SESSION['Mois']>12)
			{
				$_SESSION['année']++;
			}
			$_SESSION['MoisForm'] = date("n");

		$var3=date("w", mktime(0,0,0,$_SESSION['Mois'],1,$_SESSION['année']));
		$var4=date("t");$var6=date("d");
		$jour = date("j");
		$semaine=date("W", mktime(0,0,0,$_SESSION['Mois'],1,$_SESSION['année']));
		$var7=date("w", mktime(0,0,0,$_SESSION['Mois'],$jour,$_SESSION['année']));
		$mois=array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aout", "Septembre","Octobre","Novembre","Décembre","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aout", "Septembre","Octobre","Novembre","Décembre");
		if ($var3==0) {$var3=7;}
		echo"<table border=0 style='font-size:15pt;font-family:verdana,arial,tahoma'>\n
		<th colspan=7 align=center>".$mois[$_SESSION['Mois']]." ".$_SESSION['année']."</th>
		<tr>\n<td>Lu</td><td>Ma</td><td>Me</td><td>Je</td><td>Ve</td><td>Sa</td><td>Di</td></tr>\n<tr>\n";
		$i=1;
		while ($i<$var3) { echo "<td>&nbsp;</td>";$i++; }
		$i=1;

		while ($i<=$var4){
		$var5=($i+$var3-1)%7;

		if(basename($_SERVER['PHP_SELF']) == 'semaine.php' and empty($data)) {
			$var = '<td onClick="get_date('.date("W", mktime(0,0,0,$_SESSION['Mois'],$i,$_SESSION['année'])).')">';
		}
		elseif(empty($data)) {
			$var = '<td>';
		}
		else {
			unset($var);
			$boucle = false;
			foreach($data as $elem) {
				if($elem['num_semaine'] == date("W", mktime(0,0,0,$_SESSION['Mois'],$i,$_SESSION['année']))) {
					$var = '<td onClick="get_date('.date("W", mktime(0,0,0,$_SESSION['Mois'],$i,$_SESSION['année'])).')" bgcolor="#00FF00">';
					$boucle = true;
				}
				elseif(empty($var) and $boucle == false) {
					$var = '<td>';
					if(basename($_SERVER['PHP_SELF']) == 'semaine.php') {
						$var = '<td onClick="get_date('.date("W", mktime(0,0,0,$_SESSION['Mois'],$i,$_SESSION['année'])).')">';
					}
					$boucle = true;
				}
			}
		}
		
		echo $var;

		if ($i==$var6) { 
			echo"<span style='font-size:15pt;font-family:verdana,arial,tahoma'>$i</span>"; 
		}
		else if ($var5==0) { echo"<span style='font-size:15pt;font-family:verdana,arial,tahoma'>$i</span>"; }
		else { echo "$i"; 
		}
		echo"</td>\n";
		if ($var5==0) { echo "</tr>\n<tr>\n"; }
		$i++;}

		echo"</tr></table>\n";
		?>
		
		
		<center>
		<form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="GET">
		<?php if(!empty($_GET['site'])) { ?>
		<input type="hidden" name="site" value="<?php echo $_GET['site']; ?>"/>
		<?php } ?>
		<p><select name="moisForm">
		<?php
		$_SESSION['année'] = $_SESSION['annéeEnCours'];
		for ($ii = 0; $ii < 13; $ii++) {
		$a = date("n")+$ii;
						
				if($a==13)
				{
							$_SESSION['année']++;
				}
						if($a<12)
						{
							$_SESSION['année'] = $_SESSION['annéeEnCours'];
						}
				
		?>

		<option value="<?php echo $a;?>"><?php echo $mois[$a]." ".$_SESSION['année'];?></option>

		<?php

		}  

		?> 
		</select>
		<input type="submit" value="Choisir le mois" /></p>
		</form>
		</center>

		<script type="text/javascript">
			function get_date(nb) {
				document.getElementById('date').value = nb;
			}
		</script>
		
		
		<?php
		}

	}
}
?>
