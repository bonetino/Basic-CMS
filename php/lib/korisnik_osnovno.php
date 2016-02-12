<div id="osnovno">
	<div id="strana">
		<h1><?php echo $this->korisnik;?></h1>
		<div id="profilna">
			<img src="../<?php echo $this->row->profilna;?>">
		</div>
	</div>
	<h2>SPOL</h2>
	<p><?php echo $this->row->spol;?></p>
	<h2>GODINE</h2>
	<p><?php echo $this->row->godine;?></p>
	<h2>ZEMLJA</h2>
	<p><?php $this->zamjeniDrzave($this->row->drzava);?></p>
	<h2>ŽUPANIJA</h2>
	<p><?php $this->provjeriZupaniju($this->row->zupanija);?></p>
	<h2>GRAD</h2>
	<p><?php echo $this->row->grad;?></p>
	<h2>ORIJENTACIJA</h2>
	<p><?php echo $this->row->orijentacija;?></p>
	<h2>BOJA OČIJU</h2>
	<p><?php echo $this->row->oci;?></p>
	<h2>BOJA KOSE</h2>
	<p><?php echo $this->row->kosa;?></p>
	<h2>VISINA</h2>
	<p>oko <?php echo $this->row->visina;?> cm</p>
	<h2>TEŽINA</h2>
	<p>oko <?php echo $this->row->tezina;?> kg</p>
	<h2>HOROSKOPSKI ZNAK</h2>
	<p><?php echo $this->row->znak;?></p>
	<h2>TRAŽIM OSOBU</h2>
	<p><?php echo $this->row->trazim;?></p>
	<h2>ŽELIM</h2>
	<p><?php echo $this->row->za;?></p>
	<h2>PUŠIŠ ILI NE</h2>
	<p>Ne pušim i ne smeta mi pušenje</p>
</div>