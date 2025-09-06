<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kerala PSC - Step Registration</title>
	<style>
		:root { --primary:#0052cc; --bg:#f6f7fb; --border:#e5e7eb; --text:#111827; --muted:#6b7280; }
		* { box-sizing:border-box; }
		body { margin:0; font-family:Arial, sans-serif; background:linear-gradient(135deg,#667eea 0%, #764ba2 100%); padding:20px; }
		.wrapper { max-width: 820px; margin: 0 auto; background:#fff; border:1px solid var(--border); border-radius:12px; overflow:hidden; box-shadow:0 10px 30px rgba(0,0,0,0.08); }
		.header { background: var(--primary); color:#fff; padding:22px; }
		.header h1 { margin:0; font-size:22px; }
		.progress { background:#f8fafc; border-top:1px solid var(--border); border-bottom:1px solid var(--border); padding:16px; }
		.track { position:relative; display:flex; justify-content:space-between; align-items:center; }
		.track::before { content:""; position:absolute; left:0; right:0; top:20px; height:2px; background:#e5e7eb; }
		.step { position:relative; z-index:1; display:flex; flex-direction:column; align-items:center; gap:6px; }
		.step .dot { width:36px; height:36px; border-radius:50%; background:#e5e7eb; color:#6b7280; display:flex; align-items:center; justify-content:center; font-weight:700; }
		.step.active .dot { background:var(--primary); color:#fff; }
		.step.done .dot { background:#10b981; color:#fff; }
		.step span { font-size:12px; color:#6b7280; white-space:nowrap; }
		.content { padding:20px; }
		fieldset { border:0; margin:0; padding:0; display:none; }
		fieldset.active { display:block; }
		.grid { display:grid; grid-template-columns:1fr 1fr; gap:14px; }
		label { font-size:13px; font-weight:600; color:#374151; display:block; margin:6px 0; }
		input, select { width:100%; padding:10px; border:1px solid #d1d5db; border-radius:8px; font-size:14px; background:#fff; }
		.small { color:#6b7280; font-size:12px; }
		.actions { display:flex; justify-content:space-between; gap:10px; margin-top:16px; border-top:1px solid var(--border); padding-top:14px; }
		button { background:var(--primary); color:#fff; border:none; padding:10px 16px; border-radius:8px; font-weight:700; cursor:pointer; }
		button.secondary { background:#6b7280; }
		@media (max-width: 720px) { .grid { grid-template-columns:1fr; } .track::before{display:none;} }
	</style>
</head>
<body>
	<div class="wrapper">
		<div class="header">
			<h1>Kerala PSC — Registration</h1>
		</div>

		<div class="progress">
			<div class="track">
				<div class="step active" data-step="1"><div class="dot">1</div><span>Personal</span></div>
				<div class="step" data-step="2"><div class="dot">2</div><span>Contact</span></div>
				<div class="step" data-step="3"><div class="dot">3</div><span>Documents</span></div>
				<div class="step" data-step="4"><div class="dot">4</div><span>Account</span></div>
			</div>
		</div>

		<form id="regForm" class="content" action="process_registration.php" method="POST" enctype="multipart/form-data">
			<!-- Step 1 -->
			<fieldset class="active" data-step="1">
				<div class="grid">
					<div>
						<label for="full_name">Full Name *</label>
						<input id="full_name" name="full_name" type="text" required>
					</div>
					<div>
						<label for="date_of_birth">Date of Birth *</label>
						<input id="date_of_birth" name="date_of_birth" type="date" required>
					</div>
					<div>
						<label for="gender">Gender *</label>
						<select id="gender" name="gender" required>
							<option value="">Select</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="other">Other</option>
						</select>
					</div>
					<div>
						<label for="religion">Religion *</label>
						<select id="religion" name="religion" required>
							<option value="">Select</option>
							<option value="hindu">Hindu</option>
							<option value="muslim">Muslim</option>
							<option value="christian">Christian</option>
							<option value="sikh">Sikh</option>
							<option value="buddhist">Buddhist</option>
							<option value="jain">Jain</option>
							<option value="other">Other</option>
						</select>
					</div>
					<div>
						<label for="father_name">Father's Name *</label>
						<input id="father_name" name="father_name" type="text" required>
					</div>
					<div>
						<label for="mother_name">Mother's Name *</label>
						<input id="mother_name" name="mother_name" type="text" required>
					</div>
					<div>
						<label for="caste">Caste *</label>
						<select id="caste" name="caste" required>
							<option value="">Select</option>
							<option value="general">General</option>
							<option value="obc">OBC</option>
							<option value="sc">SC</option>
							<option value="st">ST</option>
							<option value="other">Other</option>
						</select>
					</div>
					<div>
						<label for="reservation_group">Reservation Group (optional)</label>
						<select id="reservation_group" name="reservation_group">
							<option value="">Select</option>
							<option value="general">General</option>
							<option value="obc">OBC</option>
							<option value="sc">SC</option>
							<option value="st">ST</option>
							<option value="ews">EWS</option>
						</select>
					</div>
				</div>
				<div class="actions">
					<div></div>
					<button type="button" onclick="next()">Next</button>
				</div>
			</fieldset>

			<!-- Step 2 -->
			<fieldset data-step="2">
				<div class="grid">
					<div>
						<label for="email">Email *</label>
						<input id="email" name="email" type="email" required>
					</div>
					<div>
						<label for="mobile">Mobile (10 digits) *</label>
						<input id="mobile" name="mobile" type="tel" pattern="[0-9]{10}" required>
					</div>
					<div>
						<label for="id_proof_type">ID Proof Type *</label>
						<select id="id_proof_type" name="id_proof_type" required>
							<option value="">Select</option>
							<option value="aadhaar">Aadhaar</option>
							<option value="pan">PAN</option>
							<option value="voter">Voter ID</option>
							<option value="driving">Driving License</option>
							<option value="passport">Passport</option>
						</select>
					</div>
					<div>
						<label for="id_proof_number">ID Proof Number *</label>
						<input id="id_proof_number" name="id_proof_number" type="text" required>
					</div>
					<div class="grid" style="grid-template-columns:1fr; gap:6px;">
						<label for="aadhaar_number">Aadhaar (optional)</label>
						<input id="aadhaar_number" name="aadhaar_number" type="text" pattern="[0-9]{12}" placeholder="12 digits">
						<span class="small">Leave blank if not available</span>
					</div>
				</div>
				<div class="actions">
					<button type="button" class="secondary" onclick="back()">Back</button>
					<button type="button" onclick="next()">Next</button>
				</div>
			</fieldset>

			<!-- Step 3 -->
			<fieldset data-step="3">
				<div class="grid" style="grid-template-columns:1fr;">
					<div>
						<label for="photo">Photograph (JPG, ≤30KB, 150×200) *</label>
						<input id="photo" name="photo" type="file" accept="image/jpeg" required>
						<span class="small">Ensure size/dimensions meet requirements.</span>
					</div>
					<div>
						<label for="signature">Signature (JPG, ≤30KB, 150×100) *</label>
						<input id="signature" name="signature" type="file" accept="image/jpeg" required>
					</div>
				</div>
				<div class="actions">
					<button type="button" class="secondary" onclick="back()">Back</button>
					<button type="button" onclick="next()">Next</button>
				</div>
			</fieldset>

			<!-- Step 4 -->
			<fieldset data-step="4">
				<div class="grid">
					<div>
						<label for="username">Username *</label>
						<input id="username" name="username" type="text" required>
					</div>
					<div>
						<label for="password">Password (min 8 chars) *</label>
						<input id="password" name="password" type="password" minlength="8" required>
					</div>
					<div>
						<label for="confirm_password">Confirm Password *</label>
						<input id="confirm_password" name="confirm_password" type="password" minlength="8" required>
					</div>
					<div style="grid-column:1/-1; display:flex; align-items:center; gap:8px; margin-top:6px;">
						<input type="checkbox" id="terms" name="terms" required style="width:auto;">
						<label for="terms" class="small">I agree to the Terms & Privacy Policy</label>
					</div>
				</div>
				<div class="actions">
					<button type="button" class="secondary" onclick="back()">Back</button>
					<button type="submit">Complete Registration</button>
				</div>
			</fieldset>
		</form>
	</div>

	<script>
		let current = 1;
		const total = 4;
		const steps = Array.from(document.querySelectorAll('.step'));
		const panels = Array.from(document.querySelectorAll('fieldset'));

		function show(step){
			panels.forEach(p=>p.classList.remove('active'));
			document.querySelector(`fieldset[data-step="${step}"]`).classList.add('active');
			steps.forEach((s,i)=>{
				const idx=i+1; s.classList.remove('active','done');
				if(idx<step) s.classList.add('done');
				if(idx===step) s.classList.add('active');
			});
		}

		function validate(step){
			const fs = document.querySelector(`fieldset[data-step="${step}"]`);
			const required = fs.querySelectorAll('[required]');
			for (const el of required){
				if (el.type==='file'){ if(!el.files || !el.files.length) return false; }
				else if (!el.value) return false;
			}
			if(step===4){
				const p=document.getElementById('password').value;
				const c=document.getElementById('confirm_password').value;
				if(p!==c || p.length<8) return false;
			}
			return true;
		}

		function next(){
			if(!validate(current)) { alert('Please complete required fields.'); return; }
			if(current<total){ current++; show(current); }
		}
		function back(){ if(current>1){ current--; show(current);} }

		show(current);
	</script>
</body>
</html> 