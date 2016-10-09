<section id="indeks_mobile">
	<div class="indeks_date">
		<form name="sortdate" method="get" action="cari">
			<div class="select">
				<select name="tgl" id="tgl">
				<?php foreach($dataTanggal['tanggal'] as $key => $rows): ?>
					<option value="<?php echo $rows; ?>" <?php if(date('d' , time()) == $rows || $this->input->get('tgl') == $rows): echo "selected"; endif; ?>><?php echo $rows ?></option>
				<?php endforeach; ?>
				</select>
				<select name="bln" id="bln" >
				<?php
				foreach($dataTanggal['bulan'] as $key => $rows):
				$hitung = strlen($key);
				if($hitung < 2 && $key != 9):
					$tmp = $key+1;
					$tampil = '0'.$tmp;
				else:
					$tampil = $key+1;
				endif;
				?>
					<option value="<?php echo $tampil ?>" <?php if(date('m' , time()) == $key+1 || $this->input->get('bln') == $key+1): echo "selected"; endif; ?> ><?php echo $rows ?></option>
				<?php endforeach; ?>
				</select>
				<select name="thn" id="tgl">
				<?php foreach($dataTanggal['tahun'] as $key => $rows): ?>
					<option value="<?php echo $rows; ?>"><?php echo $rows ?></option>
				<?php endforeach; ?>
				</select>
				<input type="submit" value="GO" class="btn">
			</div>
			
		</form>
		<div class="clearfix"></div>
	</div>
	<div class="gap"></div>
	<?php if(!empty($dataNews)): ?>
	<?php foreach($dataNews as $key => $rows): ?>
	<div class="m_fedd_isi">
		<div class="row">
			<div class="col-xs-4">
				<div class="img-feed" style="background-image: url('<?php echo base_url($rows->news_thumb); ?>'); "></div>
			</div>
			<div class="col-xs-8" style="padding-left: 20px;">
				<span class="m_fedd_title"><a href="<?php echo base_url($rows->news_url) ?>"><?php echo $rows->news_title ?></a></span>
				<div class="gap">
				</div>
				<p>
				<?php echo $this->format->date_indonesia($rows->news_timestamp); ?>
				</p>
				</div>
			</div>
	</div>
<?php endforeach; ?>
<?php else: ?>
	<h3 class="text-center">Maaf, tidak ada indeks berita pada tanggal ini</h3>
<?php endif; ?>
	</section>