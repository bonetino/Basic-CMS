<?php
	class Navigacija{

		public function __construct($broj){
			if($broj === 1)
				$put = '../';
			else if($broj === 2)
				$put = '../../';
			else if($broj === 3)
				$put = '../../../';
			else
				$put = '';
			$this->prikaz($put);
		}

		private function prikaz($p){?>
			<nav>
				<div id="navigacija">
					<a href="http://www.poveznica.net"><img id="logo" src="<?php echo $p;?>stil/zadano/img/vezica_logo_bijela.png" alt="Vezica"></a>
					<?php if(isset($_SESSION['id'], $_SESSION['browser']) && !empty($_SESSION['id']) && !empty($_SESSION['browser'])){ ?>
					<ul>
						<li><a href="<?php echo $p;?>pocetna/">Početna</a></li>
						<li><a href="<?php echo $p;?>korisnik/<?php echo $_SESSION['id'];?>">Moj profil</a></li>
						<li><a href="<?php echo $p;?>poruke/">Poruke</a></li>
						<li><a href="<?php echo $p;?>bockanja/">Bockanja</a></li>
						<li><a href="<?php echo $p;?>trazilica/">Tražilica</a></li>
						<li><a href="<?php echo $p;?>odjava/">Odjava</a></li>
					</ul>
				</div>
				<?php
				} else { ?>
					<ul>
						<li><a href="<?php echo $p;?>">Početna</a></li>
						<li><a href="<?php echo $p;?>trazilica/">Tražilica</a></li>
						<li><a href="<?php echo $p;?>registracija/">Registracija</a></li>
					</ul>
				<?php
				}
				?>
			</nav>
			<?php
		}
	}
?>