<div id="pretraga" class="element">
	<h1>Pretraga korisnika</h1>
	<p>Morate samo odabrati državu, spol i odabrati godine, a možete ali i ne morate.</p>
	<form action="../php/proces/trazilica.php" method="post">
		<table id="upitnik">
			<tr>
				<td>Tražim:</td>
				<td>Orijentacije:</td>
				<td>Između:</td>
			</tr>
			<tr>
				<td>
					<select name="trazim">
						<option value="z">Ženu</option>
						<option value="m">Muškarca</option>
						<option value="n">Spol nije važan</option>
					</select>
				</td>
				<td>
					<select name="orijentacija">
					<option>Nije važno</option>
						<option value="Heteroseksualac">Heteroseksualac</option>
						<option value="Homoseksualac">Homoseksualac</option>
						<option value="Biseksualac">Biseksualac</option>
					</select>
				</td>
				<td>
					<input id="godine" type="number" min="18" max="90" name="minimalno" placeholder="18">
					i
					<input id="godine" type="number" min="18" max="90" name="maksimalno" placeholder="90">
				</td>
			</tr>
			<tr>
				<td>Iz države:</td>
				<td>Iz županije:</td>
				<td>Iz grada:</td>
			</tr>
			<tr>
				<td>
					<select name="drzava">
						<option value="b">BiH</option>
						<option value="h">Hrvatska</option>
						<option value="s">Srbija</option>
					</select>
				</td>
				<td>
					<select name="zupanija" id="zupanija">
						<option>Nije bitno</option>
						<option value="bb">Bjelovarsko-bilogorske</option>
						<option value="bp">Brodsko-posavske</option>
						<option value="dn">Dubrovačko-neretvanske</option>
						<option value="i">Istarske</option>
						<option value="k">Karlovačke</option>
						<option value="kk">Koprivničko-križevačke</option>
						<option value="kz">Krapinsko-zagorske</option>
						<option value="ls">Ličko-senjske</option>
						<option value="m">Međimurske</option>
						<option value="ob">Osječko-baranjske</option>
						<option value="ps">Požeško-slavonske</option>
						<option value="pg">Primorsko-goranske</option>
						<option value="sm">Sisačko-moslavačka</option>
						<option value="sd">Splitsko-dalmatinske</option>
						<option value="sk">Šibensko-kninske</option>
						<option value="v">Varaždinske</option>
						<option value="vp">Virovitičko-podravske</option>
						<option value="vs">Vukovarsko-srijemske</option>
						<option value="za">Zadarske</option>
						<option value="z">Zagrebačke</option>				
					</select>
				</td>
				<td>
					<input type="text" name="grad" placeholder="Koristite š, đ, č, ć, i ž">
				</td>
			</tr>
			<tr>
				<td>Pušač ili ne:</td>
				<td>Traži osobu:</td>
				<td>Da želi:</td>
			</tr>
			<tr>
				<td>
					<select name="pusac">
						<option>Nije bitno</option>
						<option value="Nepušač">Nepušač</option>
						<option value="Pušač">Pušač</option>
					</select>
				</td>
				<td>
					<select name="trazi">
						<option>Nije bitno</option>
						<option value="Svojeg godišta">Svojeg godišta</option>
						<option value="Mlađu od sebe">Mlađu od sebe</option>
						<option value="Stariju od sebe">Stariju od sebe</option>
					</select>
				</td>
				<td>
					<select name="za">
						<option>Nije bitno</option>
						<option value="Druženje">Druženje</option>
						<option value="Dopisivanje">Dopisivanje</option>
						<option value="Ozbiljnu vezu">Ozbiljnu vezu</option>
						<option value="Nova prijateljstva">Nova prijateljstva</option>
						<option value="Avanturu">Avanturu</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Boja očiju:</td>
				<td>Boja kose:</td>
				<td>Horoskopski znak:</td>
			</tr>
			<tr>
				<td>
					<select name="oci">
						<option>Nije bitno</option>
						<option value="Crna">Crna</option>
						<option value="Smeđa">Smeđa</option>
						<option value="Plava">Plava</option>
						<option value="Zelena">Zelena</option>
						<option value="Siva">Siva</option>
					</select>
				</td>
				<td>
					<select name="kosa">
						<option>Nije bitno</option>
						<option value="Crna">Crna</option>
						<option value="Smeđa">Smeđa</option>
						<option value="Plava">Plava</option>
						<option value="Smeđa">Crvena</option>
						<option value="Sijeda">Sijeda</option>
					</select>
				</td>
				<td>
					<select name="znak">
						<option>Nije bitno</option>
						<option value="Jarac">Jarac</option>
						<option value="Ovan">Ovan</option>
						<option value="Bik">Bik</option>
						<option value="Vaga">Vaga</option>
						<option value="Riba">Riba</option>
						<option value="Djevica">Djevica</option>
						<option value="Strijelac">Strijelac</option>
						<option value="Škoripion">Škoripion</option>
						<option value="Lav">Lav</option>
						<option value="Blizanac">Blizanac</option>
						<option value="Rak">Rak</option>
						<option value="Vodenjak">Vodenjak</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Visine:</td>
				<td>Težine:</td>
			</tr>
			<tr>
				<td>
					<select name="visina">
						<option>Nije bitno</option>
						<option value="150-160">oko 150-160</option>
						<option value="160-170">oko 160-170</option>
						<option value="170-180">oko 170-180</option>
						<option value="180-190">oko 180-190</option>
						<option value="190-200">oko 190-200</option>
						<option value="200+">više od 2 metra</option>
					</select>
				</td>
				<td>
					<select name="tezina">
						<option>Nije bitno</option>
						<option value="40-50">oko 40-50</option>
						<option value="50-60">oko 50-60</option>
						<option value="60-70">oko 60-70</option>
						<option value="70-80">oko 70-80</option>
						<option value="80-90">oko 80-90</option>
						<option value="90-100">oko 90-100</option>
						<option value="100+">više od 100kg</option>
					</select>
				</td>
			</tr>
		</table>
			<input type="submit" value="Pretraži">
		</p>
	</form>
</div>