<?php
	class Navigacija{

		public function __construct($broj){
			if(!empty($_SESSION['id'])){
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
			
		}

		private function prikaz($p){?>
			<nav>
				<div id="navigacija">
					<ul>
						<li><a href="<?php echo $p;?>">Početna</a></li>
						<li><a href="<?php echo $p;?>trazilica/">Tražilica</a></li>
						<li><a href="<?php echo $p;?>registracija/">Registracija</a></li>
					</ul>
				</div>
			</nav>
			<?php
		}
	}
?>