

<?php $this->start('body'); ?>

				<!-- <form action="<?=PROOT?>/staff/addStock/<?= $this->donor->id?>" method="post">
					<?= FH::csrfInput() ?> -->
				
					
							<!-- <input type="date" id="date" name="date" class="form-control" value="<?= $this->post['date'] ?>"> -->
<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="<?=PROOT?>css/bd_style.css">
<body>
	<div class="container1">
		<form action="" method="post">
			<div class="top">
				<p style="font-size: 20px;">Donation Record </p>
			</div>
			<div class="bg-white"><?= $this->displayErrors ?></div>

			<div  class="menu" >
				<h6>REGISTRATION</h6>
				<p> &nbsp;&nbsp;&nbsp;Above Donor name and ID card number verified?
					Yes<input type="radio"  id="verified" name="verified" value="1" required>&nbsp;
					No<input type="radio" id="verified" name="verified" value="0">
				</p>
				<p> &nbsp;&nbsp;&nbsp;DIN issuing officer's Signature: <input class="din" type="text" name="din_name" size="10" value="<?= $this->staff->staff_name?>"></p>
			</div>

			<div class="box">
				<h6>QR Code</h6>
				<img id="img1" style="width:100px" src="data:image/png;base64, <?= $this->qr_image; ?>" alt="">
				
			</div>
			

			<div class="medical">
				<h6>MEDICAL ASSESSMENT</h6>
			</div>

		<div class="mosignature">
			<p>(Medical Officer's Signature<input type="text" id="mo_name" name="mo_name" size="40"placeholder=".............................................................................................................................................">)</p>
		</div>
		<div class="box1">
			<label><b>Weight(kg):</b></label>
			<input type="text" id="weight" name="weight"  placeholder="" maxlength="" size="5">
		</div>

		<div class="donor">
			<table>
				<tr>
					<td width="150"><h6> &nbsp;&nbsp;&nbsp;Donor's Name</h6></td> 
					<td>
						<input style="width:600px" class="name" type="text" id="donor_name" name="donor_name" size="120" placeholder=".........................................................................................................................................................">
					</td>
				</tr>
				<tr>
					<td><h6> &nbsp;&nbsp;&nbsp;History</h6></td>
					<td>
						<p>&nbsp;&nbsp;&nbsp;Feeling well?/Adequate overnight sleep(>6hrs)?/ Last meal<4hrs? Ever hospitalised?<br>
						&nbsp;&nbsp;&nbsp;Any allergies,illnesses or medications?/ High risk behaviours? (Q6 review)</p>
					</td>
				</tr>
				<tr>
					<td><h6> &nbsp;&nbsp;&nbsp;Examination</h6></td>
					<td>
						<p>&nbsp;&nbsp;&nbsp;iii Looking or Pallor?/Icterus? Alcohol smell / Infected wounds / Venepuncture site lesions</p>
						<div class="new1">
								<label>CVS status pulse:</label>
						</div>
						<div class="new2">
								<input class="pls" type="text" id="cvs" name="cvs">/min &nbsp;&nbsp;&nbsp;
						</div>
						&nbsp;&nbsp;&nbsp; 
						<div class="new3">
								<label>&nbsp;&nbsp;&nbsp;BP:</label>
						</div>

						<div class="new4" >
								<input class="pls" type="text" id="bp" name="bp">/mmHg &nbsp;&nbsp;&nbsp;
						</div>
						
						<label style="font-size:14px">Remarks</label>  <input class="name" type="text" id="remarks" name="remarks" placeholder="..............................................">
					</td>
				</tr>
				<tr >
					<td><h6> &nbsp;&nbsp;&nbsp;Counselling </h6></td>
					<td style="font-size:14px">
						<label>Option for CUE if applicable </label><input type="checkbox" id="cue" name="cue">&nbsp;&nbsp;&nbsp;
						<label>Inform possible PD call-up </label><input type="checkbox" id="pd" name="pd"> 
					</td>
				</tr>
				<tr>
					<td><h6> &nbsp;&nbsp;&nbsp;Outcome :</h6></td>
					<td style="font-size:14px">
						<label>Donor to be accepted if Hd >12.5g/dl </label><input type="checkbox" id="hd" name="hd">&nbsp;&nbsp;&nbsp;
						<label>Temporary deferral </label><input type="checkbox" id="temporary_deferral" name="temporary_deferral"> &nbsp;&nbsp;&nbsp;
						<label>Permanent deferral </label><input type="checkbox" id="permanent_deferral" name="permanent_deferral">
					</td>
				</tr>
			</table>
			<label style="font-size:14px"> &nbsp;&nbsp;&nbsp; Remarks/Reasons for Deferral</label> <input class="remark"type="text" id="reasons_deferral" name="reason_deferral" size="100"placeholder="..........................................................................................................................................................................">
		</div>
		<hr width="100%" size="5" > 

		
		<div class="medical">
			<h6>Hb TEST & BAG ISSUE</h6>
		</div>
		<div class="osignature">
			<p>(Officer's Signature <input type="text" id="of_name" name="of_name" size="85" placeholder="......................................................................................................................................................................................">)</p>
		</div>
		<div class="test" style="margin-left:20px">
			<p>Check Donor Name and ID Card No for correctness,before registration</p>
			<p>Hb level :>12.5g/dl <input type="checkbox" id="hb_lvl1" name="hb_lvl1"> &nbsp;&nbsp;&nbsp; 
				<12.5g/dl <input type="checkbox" name="hb_lvl2"> &nbsp;&nbsp;&nbsp; 
				Blood bag type: &nbsp;&nbsp; 
				Q<input type="checkbox" id="Q" name="Q"> &nbsp;&nbsp;&nbsp; 
				T<input type="checkbox" id="T" name="T"> &nbsp;&nbsp;&nbsp; 
				D<input type="checkbox" id="D" name="D"> &nbsp;&nbsp;&nbsp; 
				S<input type="checkbox" id="s" name="s"> 
			</p>
		</div>
		<hr width="100%" size="5" > 

		<div class="medical">
			<h6>BLOOD COLLECTION</h6>
		</div>
		<div class="osignature">
			<p>(Phlebotomist's Signature <input type="text" id="ph_name" name="ph_name" size="80"placeholder=".....................................................................................................................................................................................">)</p>
		</div>
		<div class="blood">
			<p><b>දායකයාගේ නම හා පැකට්ටු අංකය නිවැරදිදැයි පරීක්ෂා කරන්න.</b></p>
			<p>
				<label style="margin-left:20px"><b>ලේ ගැනීම ඇරඹු වේලාව:</b></label>
				<input style="width:100px;margin-left:20px" class="sinhala" type="text" id="st_time" name="st_time" placeholder="....................">
				<label><b>අවසාන්  වූ වේලාව:</b></label>
				<input style="width:100px" class="sinhala" type="text" id="et_time" name="et_time" placeholder="...................."> 
				<label><b>ලේ ප්‍රමාණය:</b></label>
				<input style="width:100px" class="sinhala" type="text" id="amount" name="amount" placeholder="....................">
				
			</p>
			
			<div class="delta1">
			<p>
				<b style="margin-left:20px">ලේ ලබා ගැනීම සිදු කළ අයගේ අත්සන:</b>
				<input class="sinhala" type="text" id="name" name="name" size="'100" placeholder="........................................................................................................................................................................................................"> &nbsp;&nbsp;&nbsp;<br>
			<button style="margin: 20px 400px ; " type="submit" class="btn btn-danger"> Submit</button>
			</p>
			</div>
			<div class="box2">
				<label style="font-size:14px"><b>C.M.No.:</b></label>
				<input type="text" name="cm_no">
			</div>
	
		</div>
		
	</form>
	</div>

		<script src="<?=PROOT?>vendor/jquery/jquery-3.3.1.min.js"></script>
		<script src="<?=PROOT?>js/stockform_main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->


				
<?php $this->end(); ?>
