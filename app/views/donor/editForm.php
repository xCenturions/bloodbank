<?php $this->start('body') ?>


<!-- MATERIAL DESIGN ICONIC FONT -->
<!-- MATERIAL DESIGN ICONIC FONT -->
<link rel="stylesheet" href="<?= PROOT ?>fonts/material-design-iconic-font/css/material-design-iconic-font.css">

<!-- DATE-PICKER -->
<link rel="stylesheet" href="<?= PROOT ?>vendor/date-picker/css/datepicker.min.css">

<!-- STYLE CSS -->
<link rel="stylesheet" href="<?= PROOT ?>css/form.css">

<div class="wrapper">
	<form action="<?= PROOT ?>donor/editForm/<?= currentUser()->id ?>" method="post" id="wizard">
		<div><?= $this->displayErrors ?></div>
		<!-- Section 01 -->
		<section>
			<h3 style="text-align:center">ශ්‍රි ලංකා ජාතික රුධිර පාරවිලයන සේවය</h3>
			<h1 style="text-align:center">රුධිර දායක උපදෙස්‌ මාලාව</h1>
			<h3 style="text-align:center">පසු පිටෙහි ඇති රුධිර දායක පත්‍රිකාව සම්පූර්ණ කිරීමට පෙර මෙම උපදෙස් මාලාව හොඳින් කියවන්න </h3>
			<hr style="border-top: 4px solid red">

			<div class="row">
				<div class="sec1">
					<h4 style="color:red"><strong>ඔබත් දායකයෙකු වීමට නම්</strong> </h4>
					<ul style="list-style-type: square;">
						<li>වයස අවුරුදු 18ත් 60ත් අතර (පළමු වර අවු 55)</li>
						<li>බර කිලෝ කි.ග්. 50ට වැඩි </li>
						<li>පෙර අවස්ථාවේ රුධිරය ලබාදී මාස 4ක් සම්පූර්ණ වී ඇති </li>
						<li>රුධිරයේ හිමොග්ලොබින් ප්‍රමාණය 12.5 g/dl හෝ ඊට වඩා වැඩි </li>
						<li>ගර්භණීභාවයෙන් හෝ රෝගී තත්ත්වයකින් නො පෙළෙන</li>
						<li>විදෙස්ගත වී යළි මේ රටට පැමිණ අවම මාස 3 කට වඩා වැඩි </li>
						<li>අවදානම් හැසිරීම් වලින් තොර පුද්ගලයෙකු විය යුතුය </li>

					</ul>
				</div>
				<div class="sec1">
					<h4 style="color:red;"><strong>අවදානම් හැසිරීම් </strong> </h4>
					<ul style="list-style-type: square;">
						<li>ලිංගික සම්බන්ධතා එක් අයෙකුට සීමා නොවීම.</li>
						<li>පිරිමියෙකු වෙනත් පිරිමියෙකු සමග ලිංගික සම්බන්ධතා පැවැත්වීම </li>
						<li>කෙදිනක හෝ ගණිකා වෘත්තියේ යෙදී සිටීම</li>
						<li>පසුගිය වසර තුල අවදානම් ලිංගික ඇසුරක් පැවැත්වීම</li>
						<li>කෙදිනක හෝ එන්නත් ආකාරයෙන් මත්ද්‍රව්‍ය ලබා ගෙන තිබීම</li>


					</ul>
				</div>
			</div>
			<!-- 2nd sec -->
			<div class="row" style="padding-top:50px">
				<div class="sec1">

					<h4 style="color:red"><strong>ඔබ ලේ දීමට පෙර </strong> </h4>
					<ul style="list-style-type: square;">
						<li>පැය 4ක් ඇතුලත ප්‍රධාන ආහාර වේලක් ලබාගෙන තිබිය යුතුය </li>
						<li>මත්පැන් නොවන දියරමය පාන වැඩිපුර පානය කරන්න </li>
						<li>පෙර දිනයේ පැය හයක් හෝ ඊට වැඩි නින්දක් ලබා ලබාගෙන තිබිය යුතුය </li>
						<li>පහසු සැහැල්ලු ඇඳුමකින් සැරසී සිටීම වඩාත් යෝග්‍ය වේ</li>


					</ul>
				</div>
				<div class="sec1">
					<h4 style="color:red;"><strong>ලේ දන් දීමෙන් පසුව</strong> </h4>
					<ul style="list-style-type: square;">
						<li>අවම වශයෙන්‌ මිනිත්තු 20ක්‌ පමණ රැධිරය පරිත්‍යාග කළ ස්ථානයේ රැඳි සිටීම වැදගත්‌ වේ.</li>
						<li>සුළු ආහාරයක්‌ හා දියරමය පානයක්‌ ලබා ගත යුතුය.</li>
						<li>ඉදිරි පැය හතර තුළ දී වැඩිපුර දියර පානය කරන්න </li>
						<li>රුධිරය ලබා ලබාගැනීමට එන්නත් කටුව ඇතුළු කළ ස්ථානයේ ඇලවූ ප්ලාස්ටරය පැය 12ක් පමණ නො ගලවා තබාගන්න </li>
						<li>අධික වෙහෙසකර වැඩ කිරීමෙන් හෝ රුධිරය ලබාදුන් අතින් බර එසවීමෙන් වළකින්න </li>


					</ul>
				</div>
			</div>

			<p style="text-align:center;padding-top: 50px">දණ්ඩ නීති සංග්‍රහයේ 262, 263 වගන්ති අනුව දැනුවත්‌ ව රෝගයක්‌ පැතිරවීමට කටයුතූ කිරීම දඬුවමි ලැබිය හැකි වරදක්‌ බව පිළිගනිමි.</p>

			<h6 style="text-align:center;padding-top: 40px">පුද දෙමු ලේ බිඳක්‌ - රැකගමු ජීවිතයක්</h6>
			<h6 style="text-align:center;">රෝගී ජීවිත සුවපත්‌ කරමින් ඔබ සිදුකරන ජාතික මෙහෙවර අපි අගය කරමු.</h6>

			<div class="column3 red" style="margin-top:40px">
				<p style="text-align:center"> <span style="font-size:25px">විමසීම් </span><br>
					<span style="font-size:30px"><strong>ජාතික රැධිර මධ්‍යස්ථානය</strong></span> <br>
					අංක 551, ඇල්විටිගල මාවත, නාරාහේන්පිට, කොළඹ 05 <br>
					දුරකථන 011 23 69 931 - 5 ෆැක්ස්‌ 011 23 69 937/011 23 69 939<br>
					විද්‍යුත් තැපෑල info@nbts.helth.gov.lk <br>
					වෙබ් අඩවිය nbts.helth.gov.lk

				</p>

			</div>


		</section>

		<!-- SECTION 2 -->
		<h4></h4>
		<section>
			<h3 style="text-align:center">ශ්‍රි ලංකා ජාතික රුධිර පාරවිලයන සේවය</h3>
			<h1 style="text-align:center">රුධිර දායක ප්‍රකාශය හා වාර්තාව</h1>
			<hr style="border-top: 4px solid red">

			<p>
				<b>රුධිර පරිත්‍යාගශීලී හිතවත,</b><br>
				ලේ දන් දෙන ඔබේත්, ඔබේ ලේ ලබා ගන්නා රෝගීන් ගේත්, ආරක්ෂාව තහවුරු කිරීම සඳහා කරුණාකර මෙම විස්තර පත්‍රිකාව නිවැරදි ව,
				තනි ව ම පුරවන්න.පත්‍රිකාව පිරවීමට පෙර, මුල් පිටුවේ සඳහන් “රුධිර දායක උපදෙස් මාලාව” හොඳින් කියවා තේරුම් ගන්න.
				ඒ සම්බන්ධයෙන් ගැටළුවක් ඇත්නම් කරුණාකර ජාතික රුධිර පාරවිලයන සේවයේ කාර්ය මණ්ඩලයෙන් විමසන්න.

			</p><br>
			<div class="row">

				<div class="column">

					<label>
						(1) අ) ඔබ මීට පෙර ලේ දන් දී තිබේ ද ?
					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_1_1" id="_1_1" value="Tõ" <?php if ($this->data->_1_1 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_1_1" id="_1_1" value="ke;" <?php if ($this->data->_1_1 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
			</div>
			<div class="row">
				<div class="column">
					<label>
						ආ)එසේනම් කී වරක් ද?
					</label>
				</div>
				<div class="column2">
					<input class="form-input" type="text" name="_1_2" id="_1_2" value="<?= $this->data->_1_2 ?>">

				</div>
			</div>
			<div class="row">
				<div class="column">
					<label>
						ඇ) අවසන් වරට ලේ දුන් දිනය
					</label>
				</div>
				<div class="column2">
					<input type="date" class="form-control" name="_1_3" id="_1_3" value="<?= $this->data->_1_3 ?>">
				</div>
			</div>

			<div class="row">
				<div class="column">
					<label>
						ඈ) කලින් ලේ දුන් දුන් අවස්ථාවල ඔබට යම් අපහසුවක් වී තිබේ ද?
					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_1_4" id="_1_4" value="Tõ" <?php if ($this->data->_1_4 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_1_4" id="_1_4" value="ke;" <?php if ($this->data->_1_4 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
			</div>
			<div class="row">
				<div class="column">
					<label>
						ඉ) අපහසුතාවක් වී නම් එය සඳහන් කරන්න
					</label>
				</div>
				<div class="column2">
					<textarea name="_1_5" id="_1_5" rows="2" cols="20" value="<?= $this->data->_1_5 ?>">

 									 </textarea>
				</div>
			</div>

			<div class="row">
				<div class="column">
					<label>
						ඊ) ලේ නොදෙන ලෙසට කෙදිනක හෝ ඔබට වෛද්‍ය උපදෙස් ලැබී තිබේ ද?
					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_1_6" id="_1_6" value="Tõ" <?php if ($this->data->_1_6 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_1_6" id="_1_6" value="ke;" <?php if ($this->data->_1_6 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
			</div>
			<div class="row">
				<div class="column">
					<label>
						උ) ඔබ අද දින ලැබුණු රුධිර දායක උපදෙස් පත්‍රිකාව කියවා හොඳින් තේරුම් ගත්තෙහි ද?
					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_1_7" id="_1_7" value="Tõ" <?php if ($this->data->_1_7 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_1_7" id="_1_7" value="ke;" <?php if ($this->data->_1_7 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
			</div>
			<hr>

			<!-- ******************************(2)*********************************** -->
			<div class="row">
				<div class="column">
					<label>
						(2) අ) ඔබ දැනට හොඳ සෞඛ්‍ය තත්වයෙන් පසු වන්නේ ද?
					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_2_1" id="_2_1" value=" Tõ " <?php if ($this->data->_2_1 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_2_1" id="_2_1" value="ke;" <?php if ($this->data->_2_1 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
			</div>
			<div class="row">
				<div class="column3">
					<label>
						ආ) ඔබට පහත දැක්වෙන කවර හෝ රෝගී තත්ත්වයක් වැළඳී හෝ ඒ සඳහා ප්‍රතිකාර ගෙන තිබේද එසේ නම් අදාළ රෝගය ඉදිරියෙන් ✓ ලකුණ යොදන්න.
					</label>
				</div>
				<div class="row">

					<div class="column4">

						<input class="form-check-input" type="checkbox" name="_2_2_1" id="_2_2_1" value="✓" <?php if ($this->data->_2_2_1 == "✓") print "checked"; ?>>
						<label value="0" class="form-check-label" for="flexRadioDefault1">
							හෘද රෝග
						</label><br><br>
						<input class="form-check-input" type="checkbox" name="_2_2_2" id="_2_2_2" value="✓" <?php if ($this->data->_2_2_2 == "✓") print "checked"; ?>>
						<label value="0" class="form-check-label" for="flexRadioDefault1">
							දියවැඩියාව
						</label><br><br>
						<input class="form-check-input" type="checkbox" name="_2_2_3" id="_2_2_3" value="✓" <?php if ($this->data->_2_2_3 == "✓") print "checked"; ?>>
						<label value="0" class="form-check-label" for="flexRadioDefault1">
							වලිප්පුව
						</label>
					</div>
					<div class="column4">

						<input class="form-check-input" type="checkbox" name="_2_2_4" id="_2_2_4" value="✓" <?php if ($this->data->_2_2_4 == "✓") print "checked"; ?>>
						<label value="0" class="form-check-label" for="flexRadioDefault1">
							අංශභාගය
						</label><br><br>
						<input class="form-check-input" type="checkbox" name="_2_2_5" id="_2_2_5" value="✓" <?php if ($this->data->_2_2_5 == "✓") print "checked"; ?>>
						<label value="0" class="form-check-label" for="flexRadioDefault1">
							ඇදුම/ පෙනහලු රෝග
						</label><br><br>
						<input class="form-check-input" type="checkbox" name="_2_2_6" id="_2_2_6" value="✓" <?php if ($this->data->_2_2_6 == "✓") print "checked"; ?>>
						<label value="0" class="form-check-label" for="flexRadioDefault1">
							අක්මා රෝග
						</label>
					</div>
					<div class="column4">

						<input class="form-check-input" type="checkbox" name="_2_2_7" id="_2_2_7" value="✓" <?php if ($this->data->_2_2_7 == "✓") print "checked"; ?>>
						<label value="0" class="form-check-label" for="flexRadioDefault1">
							රුධිර රෝග
						</label><br><br>
						<input class="form-check-input" type="checkbox" name="_2_2_8" id="_2_2_8" value="✓" <?php if ($this->data->_2_2_8 == "✓") print "checked"; ?>>
						<label value="0" class="form-check-label" for="flexRadioDefault1">
							පිළිකා
						</label><br><br>
						<input class="form-check-input" type="checkbox" name="_2_2_9" id="_2_2_9" value="✓" <?php if ($this->data->_2_2_9 == "✓") print "checked"; ?>>
						<label value="0" class="form-check-label" for="flexRadioDefault1">
							වකුගඩු රෝගය
						</label>
					</div>

				</div>
			</div>


			<div class="row">
				<div class="column">
					<label>
						ඇ) ඔබ දැනට කවර හෝ ඖෂධයක්/ ප්‍රතිකාරයක් ලබා ගන්නේ ද ?
					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_2_3" id="_2_3" value="Tõ" <?php if ($this->data->_2_3 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_2_3" id="_2_3" value="ke;" <?php if ($this->data->_2_3 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
			</div>
			<div class="row">
				<div class="column">
					<label>
						ඈ) ඔබ ශල්‍යකර්මයකට භාජනය වී තිබේද ?
					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_2_4" id="_2_4" value="Tõ" <?php if ($this->data->_2_4 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_2_4" id="_2_4" value="ke;" <?php if ($this->data->_2_4 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
			</div>
			<div class="row">
				<div class="column">
					<label>
						ඉ) ලේ දන් දීමෙන් පසු අද දින ඔබට බර වැඩවල යෙදීමට හෝ මගී ප්‍රවාහන වාහන පැදවීම, උස් ගොඩනැගිලි මත වැඩ කිරීම, කඳු නැගීම, විශාල යන්ත්‍රෝපකරණ ක්‍රියා කරවීම වැනි දේවල
						යෙදීමට සිදුව තිබේ ද ?
					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_2_5" id="_2_5" value="Tõ" <?php if ($this->data->_2_5 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_2_5" id="_2_5" value="ke;" <?php if ($this->data->_2_5 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
			</div>

			<div class="row">
				<div class="column">
					<label>
						ඊ) ඔබ දැනට ගර්භණීව සිටීද මව්කිරි දීමෙහි යෙදෙන්නේ ද පසුගිය මාස 12 තුළ දරු ප්‍රසූතියකට හෝ ගබ්සා වීමකට ලක් වූයේ ද?
					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_2_6" id="_2_6" value="Tõ" <?php if ($this->data->_2_6 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_2_6" id="_2_6" value="ke;" <?php if ($this->data->_2_6 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
			</div>


		</section>

		<!-- SECTION 2 -->
		<h4></h4>
		<section>
			<div class="row">
				<div class="column">
					<label>
						(3) අ) කෙදිනක හෝ ඔබට කහ උණ/සෙංගමාලය වැලදී තිබේද?
					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_3_1" id="_3_1" value="Tõ" <?php if ($this->data->_3_1 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_3_1" id="_3_1" value="ke;" <?php if ($this->data->_3_1 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
			</div>
			<div class="row">
				<div class="column">
					<label>
						ආ) පසුගිය වසර 2 තුළ ක්ෂය රෝගය වැළදී තිබේද? ඊට ප්‍රතිකාර ගෙන තිබේද?
					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_3_2" id="_3_2" value="Tõ" <?php if ($this->data->_3_2 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_3_2" id="_3_2" value="ke;" <?php if ($this->data->_3_2 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
			</div>

			<hr>

			<div class="row">
				<div class="column3">
					<label>
						4) පසුගිය මාස 12 තුළ,
					</label>
				</div>
				<div class="column">
					<label>
						අ) ඔබ ප්‍රතිශක්තිකරණ හෝ වෙනත් එන්නතක් ලබාගෙන තිබේද?
					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_4_1" id="_4_1" value="Tõ" <?php if ($this->data->_4_1 == "T&otilde;") print "checked"; ?>required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_4_1" id="_4_1" value="ke;" <?php if ($this->data->_4_1 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
				<div class="column">
					<label>
						ආ) කන් විදීමක්,පච්චා කෙටීමක් හෝ කටු චිකිත්සා ප්‍රතිකාරයක් සිදුකර තිබේද?
					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_4_2" id="_4_2" value="Tõ" <?php if ($this->data->_4_2 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_4_2" id="_4_2" value="ke;" <?php if ($this->data->_4_2 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
				<div class="column">
					<label>
						ඇ) බන්ධනාගාරගත වී තිබේද?
					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_4_3" id="_4_3" value="Tõ" <?php if ($this->data->_4_3 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_4_3" id="_4_3" value="ke;" <?php if ($this->data->_4_3 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
				<div class="column">
					<label>
						ඈ) ඔබ හෝ ඔබගේ සහකරු/සහකාරිය විදේශගත වී තිබේද?
					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_4_4" id="_4_4" value="Tõ" <?php if ($this->data->_4_4 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_4_4" id="_4_4" value="ke;" <?php if ($this->data->_4_4 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
				<div class="column">
					<label>
						ඉ)ඔබට හෝ ඔබගේ සහකරු/සහකාරියට රුධිරය හෝ රුධිර කොටස් ලබා දී තිබේද?
					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_4_5" id="_4_5" value="Tõ" <?php if ($this->data->_4_5 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_4_5" id="_4_5" value="ke;" <?php if ($this->data->_4_5 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
				<div class="column">
					<label>
						ඊ) ඔබට මැලේරියාව වැළදී හෝ ඊට ප්‍රතිකාර ගෙන තිබේද?
					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_4_6" id="_4_6" value="Tõ" <?php if ($this->data->_4_6 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_4_6" id="_4_6" value="ke;" <?php if ($this->data->_4_6 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
			</div>
			<hr>

			<div class="row">
				<div class="column">
					<label>
						(5) අ)පසුගිය මාස 6 තුළ ඔබට ඩෙංගු වැළදී හෝ ඊට ප්‍රතිකාර ගෙන තිබේද?
					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_5_1" id="_5_1" value="Tõ" <?php if ($this->data->_5_1 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_5_1" id="_5_1" value="ke;" <?php if ($this->data->_5_1 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
			</div>
			<div class="row">
				<div class="column">
					<label>
						ආ) පසුගිය මාසය තුළ -පැපොල,සරම්ප,කම්මුල්ගාය,රුබෙල්ලා උණ(ජර්මන් සරම්ප)
						පාචනය හෝ වෙනත් කල්පවත්නා(සතියකට වැඩි) උණකින් පෙළුණේද?

					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_5_2" id="_5_2" value="Tõ" <?php if ($this->data->_5_2 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_5_2" id="_5_2" value="ke;" <?php if ($this->data->_5_2 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
			</div>
			<div class="row">
				<div class="column">
					<label>
						ඇ) පසුගිය සතිය තුල-ඔබේ දත් ගැලවීමක් සිදුකර තිබේද?

					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_5_3" id="_5_3" value="Tõ" <?php if ($this->data->_5_3 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_5_3" id="_5_3" value="ke;" <?php if ($this->data->_5_3 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
			</div>
			<div class="row">
				<div class="column">
					<label>
						ඈ) පසුගිය සතිය තුළ-ඔබ ප්‍රතිජීවක( Antibiotics)හෝ ඇස්ප්‍රීන්(Asprin) හෝ(වෙනත්) ඖෂධ කිසිවක් භාවිතා කළේද?

					</label>
				</div>
				<div class="column2">
					<input class="form-check-input" type="radio" name="_5_4" id="_5_4" value="Tõ" <?php if ($this->data->_5_4 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_5_4" id="_5_4" value="ke;" <?php if ($this->data->_5_4 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="column3 red">
					<label>
						(6) අ)පහත දැක්වෙන කවර හෝ කාණ්ඩයකට ඔබ අයත් වේ නම් ලේ දන්දීම සුදුසු නොවන බව දන්නෙහිද?

					</label>
				</div>
				<div class="column5 red">
					<ul style="list-style-type: square;">
						<li>ඔබ ඒඩ්ස්(HIV/AIDS) හෝ සෙංගමාල(Hepatities B/C) ආසාධනයකට ලක් වූවෙකු නම් </li>
						<li>ඔමේ ලිංගික සබඳතා එක් අයෙකුට සීමා වී නොමැතිනම් </li>
						<li>ඔබ වෙනත් පිරිමියෙකු සමග සමලිංගික ඇසුරක යෙදී ඇති පිරිමියෙකු නම් </li>
						<li>ඔබ කෙදිනක හෝ මත් ද්‍රව්‍යයන් ශරීරයට එන්නත් කොට ගෙන තිබේ නම් </li>
						<li>ඔබ කෙදිනක හෝ ගණිකා වෘත්තියෙහි යෙදී තිබේ නම් </li>
						<li>ඔබට පසුගිය මාස 12 තුළ කෙදිනක හෝ ගණිකා ඇසුරක යෙදී තිබේ නම්</li>
						<li>ඔබට හෝ ඔබේ සහකරු/සහකාරියට ඒඩ්ස්(HIV/AIDS) හෝ වෙනත් ලිංගික රෝග ආසාධනයක් තිබේදැයි සැකයක් ඇත්නම්,</li>

					</ul>

				</div>
			</div>

			<div class="row">
				<div class="column red">
					<label>
						ආ) ඔබ හෝ ඔබේ සහකරු/සහකාරිය ඉහත සදහන් කවර හෝ කාණ්ඩයකට අයත් වේද?

					</label>
				</div>
				<div class="column2 red">
					<input class="form-check-input" type="radio" name="_6_1" id="_6_1" value="Tõ" <?php if ($this->data->_6_1 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_6_1" id="_6_1" value="ke;" <?php if ($this->data->_6_1 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
			</div>

			<div class="row">
				<div class="column red">
					<label>
						ඇ) ඔබ,සිරුරේ බර අඩු වීමකින්,කුද්දැටි(වසා ග්‍රන්ථි ),ඉදිමීමකින්,කල් පවත්නා උණකින් හෝ පාචනයෙන් පෙළේද?

					</label>
				</div>
				<div class="column2 red">
					<input class="form-check-input" type="radio" name="_6_2" id="_6_2" value="Tõ" <?php if ($this->data->_6_2 == "T&otilde;") print "checked"; ?> required>
					<label for="flexRadioDefault1">
						ඔව්
					</label>
					</label>
					<input class="form-check-input" type="radio" name="_6_2" id="_6_2" value="ke;" <?php if ($this->data->_6_2 == "ke;") print "checked"; ?>>
					<label value="0" class="form-check-label" for="flexRadioDefault1">
						නැත
					</label>
				</div>
			</div>


		</section>

		<!-- SECTION 3 -->
		<h4></h4>
		<section>
			<h3></h3>
			<div class="form-row">
				<div class="form-holder">
					<i class="zmdi zmdi-account"></i>
					<input type="text" class="form-control" placeholder="සම්පූර්ණ නම (ජාතික හැඳුනුම්පතට අනුව)" name="name" id="name" value="<?= $this->data->name ?>" required>
				</div>
				<div class="form-holder"><i class="bi bi-gender-ambiguous"></i>
					<select class="form-control textbox-n" placeholder="" name="sex" id="sex" value="<?= $this->data->sex ?>" required>
						<option value="" disabled selected> පුරුෂ / ස්ත්‍රී </option>
						<option value="male">පුරුෂ</option>
						<option value="female">ස්ත්‍රී</option>

					</select>
				</div>

			</div>
			<div class="form-row margin " style="">
				<div class="form-holder">
					<i class="bi bi-credit-card-2-front"></i>
					<input type="text" class="form-control" placeholder="ජාතික හැඳුනුම්පත් අංකය" name="nic" id="nic" value="<?= $this->data->nic ?>" required>
				</div>
				<div class="form-holder">
					<i class="bi bi-house-door"></i>
					<input type="text" class="form-control" placeholder="නිවසේ ලිපිනය (ස්ථිර/තාවකාලික)" name="address" id="address" value="<?= $this->data->address ?>" required>
				</div>
			</div>
			<div class="form-row margin">
				<div class="form-holder"><i class="bi bi-droplet-fill"></i>
					<select class="form-control" id="bloodgroup" name="bloodgroup" value="">
						<option value="" selected disabled> <?= $this->data->bloodgroup ?></option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>

					</select>
				</div>
				<div class="form-group">
					<div class="form-holder">
						<i class="bi bi-calendar-event"></i>

						<input type="" id="dob" name="dob" class="form-control textbox-n" placeholder="උපන්දිනය" onfocus="(this.type='date')" value="<?= $this->data->dob ?>" required>
					</div>
					<div class="form-holder">

						<input type="text" class="form-control" placeholder="වයස" name="age" id="age" value="<?= $this->data->age ?>" required>
					</div>
				</div>
			</div>
			<div class="form-row margin">
				<div class="form-holder">
					<i class="zmdi zmdi-smartphone-android"></i>
					<input type="text" class="form-control" placeholder="දුරකථන අංකය" name="mobile" id="mobile" value="<?= $this->data->mobile ?>" required>
				</div>
				<div class="form-holder">
					<i class="bi bi-envelope-fill"></i>
					<input type="text" class="form-control" placeholder="විද්‍යුත් තැපෑල" name="email" id="email" value="<?= $this->data->email ?>">
				</div>

			</div>
			<hr>

			<div class="row">
				<div class="column3 ">
					<label style="font-size:20px;">
						<strong>රුධිර දායකයාගේ ප්‍රකාශය </strong>
					</label>
				</div>
				<div class="column5 ">
					<ul style="list-style-type: square;">
						<li>කිසිදු පුද්ගලික ලාභයක් අපේක්ෂාවෙන් තොරව, ස්වෙච්ඡාවෙන් අද දින මා පරිත්‍යාග කරන රුධිරය අසරණ රෝගීන්ගේ යහපත වෙනුවෙන් ශ්‍රී ලංකා ජාතික
							රුධිර පාරවිලයන සේවයට අවශ්‍ය අයුරින් යොදා ගැනීමට එකඟතාවය පළ කරමි.</li>

						<li>ලේ දන් දීමේ දී මෙන්ම ඉන් පසුවත් ඒ පිළිබඳ ජාතික රුධිර පාරවිලයන සේවය උපදෙස් අනුව ක්‍රියා කරන අතර එසේ නොකීරීමෙන් සිදුවිය හැකි හානි පිළිබඳ වගකීම මම බාර ගනිමි.</li>

						<li>තව ද මා පරිත්‍යාග කරන රුධිරය ඒඩ්ස් (HIV/AIDS), හෙපටයිටීස් බී සහ සී (Hepatitis B & C), උපදංශය(Syphilis), මැලේරියාව(Malaria) යන රෝග ආසාදනයන්
							සඳහා හෝ ජා.රු.පා. සේවයට අවශ්‍ය වෙනත් පරීක්ෂණයන් සඳහා පරීක්ෂාවට ලක් කිරීමට මාගේ එකඟතාවය පළ කරමි.</li>

						<li>එසේම ඉහත පරීක්ෂණවල ප්‍රතිඵල ජාතික රුධිර පාරවිලයන සේවයට අවශ්‍ය අවස්ථාවලදී මා වෙත දන්වනු ලැබීමටත්, එ වන් අවස්ථාවලදී ජාතික රුධිර පාරවිලයන සේවය
							මගින් දෙනු ලබන වැඩි දුර උපදෙස් අනුව ක්‍රියා කිරීමටත් මාගේ කැමැත්ත හා එකඟතාව පළ කරමි. </li>

						<li>මෙම පත්‍රිකාව කියවා හොඳින් වටහා ගත් අතර ඉහත ප්‍රශ්නවලට මා විසින් සපයන ලද පිළිතුරු වල සත්‍යතාවය ගැන අවංක ව සහතික වෙමි. </li>

						<li>දණ්ඩ නිති සංග්‍රහයේ 262, 263 වගන්ති අනුව දැනුවත්ව රෝගයක් පැතිරවීමට කටයුතු කිරීම දඬුවම් ලැබිය හැකි වරදක් බව පිළිගනිමි.</li>



					</ul>

				</div>
				<strong style="font-size:18px; text-align:center">යාවජීව/නිරන්තර රුධිර දායකයෙකු වශයෙන් අසරණ රෝගීන් වෙනුවෙන් ඉදිරියටත් රුධිරය පරිත්‍යාග කිරීමට කැමැත්තෙමි.</strong>
				<div class="row" style="text-align:center">
					<div class="column4">
						<input class="form-check-input" type="radio" name="_7" id="_7" value="udi y;rlg jrla" <?php if ($this->data->_7 == "udi y;rlg jrla") print "checked"; ?> required>
						<label value="0" class="form-check-label" for="flexRadioDefault1">
							මාස හතරකට වරක්
						</label>
					</div>
					<div class="column4">
						<input class="form-check-input" type="radio" name="_7" id="_7" value="udi 6lg jrla" <?php if ($this->data->_7 == "udi 6lg jrla") print "checked"; ?>>
						<label value="0" class="form-check-label" for="flexRadioDefault1">
							මාස 6කට වරක්
						</label>
					</div>
					<div class="column4">
						<input class="form-check-input" type="radio" name="_7" id="_7" value="jirlg jrla" <?php if ($this->data->_7 == "jirlg jrla") print "checked"; ?>>
						<label value="0" class="form-check-label" for="flexRadioDefault1">
							වසරකට වරක්
						</label>
					</div>
				</div>

			</div><br>

			<center><button type="submit" class="btn btn-success btn-lg">Sumbit The Form</button></center>

		</section>

		<!-- SECTION 4 -->
		<h4></h4>

	</form>
</div>

<script src="<?= PROOT ?>vendor/jquery/jquery-3.3.1.min.js"></script>

<!-- JQUERY STEP -->
<script src="<?= PROOT ?>vendor/jquery/jquery.steps.js"></script>

<script src="<?= PROOT ?>js/form.js"></script>

<!-- Template created and distributed by Colorlib -->

<?php $this->end() ?>