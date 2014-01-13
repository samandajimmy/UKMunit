<div class="row">

				<div class="span12">
					<div class="register">

						<div class="titleHeader clearfix">
							<h3>Pengaduan Pelanggan</h3>
						</div><!--end titleHeader-->
						
						<div class="pengaduan">
							<h1>Keluhan Anda</h1>
							<p>Sampaikan masalah Anda yang berhubungan dengan pelayanan UKM kami. UKMunity akan berusaha menjawab semua keluhan Anda dan memberikan layanan yang terbaik kepada pelanggannya.</p>
						</div>

						<form method="POST" action="<?php echo site_url('user/savePengaduan'); ?>" class="form-horizontal">

							<legend>&nbsp;&nbsp;&nbsp;&nbsp;1. Data Diri</legend>

							<div class="control-group">
							    <label class="control-label" for="inputFirstName">Nama: <span class="text-error">*</span></label>
							    <div class="controls">
							      <input type="text" id="inputFirstName" name="nama" required />
							    </div>
							</div><!--end control-group-->

							<div class="control-group">
							    <label class="control-label" for="inputEMAdd">E-Mail Address: <span class="text-error">*</span></label>
							    <div class="controls">
							      <input type="email" id="inputEMAdd" name="email" required />
							    </div>
							</div><!--end control-group-->

							<div class="control-group">
							    <label class="control-label" for="inputTele">Telephone: <span class="text-error">*</span></label>
							    <div class="controls">
							      <input type="text" id="inputTele" name="telepon" required />
							    </div>
							</div><!--end control-group-->

							<legend>&nbsp;&nbsp;&nbsp;&nbsp;2. Pesan</legend>

							<div class="control-group">
							    <label class="control-label" for="inputCompany">Subjek: <span class="text-error">*</span></label>
							    <div class="controls">
							      <input type="text" id="inputCompany" name="subjek" required />
							    </div>
							</div><!--end control-group-->

							<div class="control-group">
							    <label class="control-label" for="inputCompanyID">Pesan: <span class="text-error">*</span></label>
							    <div class="controls">
									<textarea name="pesan" required></textarea>
							    </div>
							</div><!--end control-group-->


							<div class="control-group">
							    <div class="controls">
								    <br>
								    <button type="submit" class="btn btn-primary">Submit</button>
							    </div>
							</div><!--end control-group-->

						</form><!--end form-->

					</div><!--end register-->
				</div><!--end span9-->



			</div><!--end row-->
