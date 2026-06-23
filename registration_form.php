
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registration Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css"/>
  <link rel="stylesheet" type="text/css" href="Form.CSS">
    
</head>
<body>
<form action="connection.php" method="POST">
  <div class="wrap">
  <div class="card">

    <div class="header">
      <h1>NSU-UENR Registration Form</h1>
      <p>Please fill in all required fields to complete your registration.</p>
    </div>

    <!-- Personal Information -->
    <p class="section-title">Personal Information</p>

    <div class="field">
      <label for="fullname">Full name <span class="req">*</span></label>
      <input type="text" id="fullname"  name="FullName" placeholder="e.g. Leron Zibo" autocomplete="name" / required>
      <span class="errmsg" id="fullname-err">
        <i class="ti ti-alert-circle"></i> Please enter your full name (first and last)
      </span>
    </div>

    <div class="grid-2">
      <div class="field">
        <label>Gender <span class="req">*</span></label>
        <div class="radio-group" id="Gender-group">
          <label class="radio-opt" id="opt-male">
            <input type="radio" name="Gender" value="Male" / >
            <span class="dot"></span> Male
          </label>
          <label class="radio-opt" id="opt-female">
            <input type="radio" name="Gender" value="Female" />
            <span class="dot"></span> Female
          </label>
          
        </div>
        <span class="errmsg" id="Gender-err">
          <i class="ti ti-alert-circle"></i> Please select a gender
        </span>
      </div>

      <div class="field">
        <label for="level">Level <span class="req">*</span></label>
        <select id="level" name="Level">
          <option value="">Select level…</option>
          <option value="100">Level 100</option>
          <option value="200">Level 200</option>
          <option value="300">Level 300</option>
          <option value="400">Level 400</option>
          <option value="postgrad">Postgraduate</option>
        </select>
        <span class="errmsg" id="level-err">
          <i class="ti ti-alert-circle"></i> Please select a level
        </span>
      </div>
    </div>

    <div class="divider"></div>

    <!-- Contact Details -->
    <p class="section-title">Contact Details</p>

    <div class="grid-2">
      <div class="field">
        <label for="cell">Cell number <span class="req">*</span></label>
        <input type="text" id="cell" name="Cell" placeholder="e.g. 0241234567" autocomplete="tel" / required>
        <span class="errmsg" id="cell-err">
          <i class="ti ti-alert-circle"></i> Enter a valid phone number
        </span>
      </div>

      <div class="field">
        <label for="email">Email address <span class="req">*</span></label>
        <input type="email" id="email" name="Email" placeholder="e.g. Zibo@email.com" autocomplete="email" / required>
        <span class="errmsg" id="email-err">
          <i class="ti ti-alert-circle"></i> Enter a valid email address
        </span>
      </div>
    </div>

    <div class="divider"></div>

    <!-- Academic Details -->
    <p class="section-title">Academic Details</p>

    <div class="grid-2">
      <div class="field">
        <label for="department">Department <span class="req">*</span></label>
        <select id="department" name="Department">
          <option value="">Select department…</option>
          <option value="Computer Science &amp; Informatics">Computer Science &amp; Informatics</option>
          <option value="Information Technology">Information Technology</option>
          <option value="Nursing">Nursing</option>
          <option value="Mathematics &amp; Statistics">Mathematics &amp; Statistics</option>
          <option value="Biological Sciences">Biological Sciences</option>
          <option value="Medical Laboratory &amp; Health Sciences">Medical Laboratory &amp; Health Sciences</option>
          <option value="Mechanical &amp; Manufacturing Engineering">Mechanical &amp; Manufacturing Engineering</option>
          <option value="Electrical &amp; Computer Engineering ">Electrical &amp; Computer Engineering </option>
          <option value="Civil &amp; Enviromental Engineering">Civil &amp; Enviromental Engineering</option>
          <option value="Agricultural Engineering">Agricultural Engineering</option>
          <option value="Renewable Energy Engineering">Renewable Energy Engineering</option>
          <option value="Petroleum Natural Gas Engineering">Petroleum Natural Gas Engineering</option>
          <option value="Forest Science">Forest Science</option>
          <option value="Fisheries &amp; Aquatic Science">Fisheries &amp; Aquatic Science</option>
          <option value="Enviromental Management">Enviromental Management</option>
          <option value="Ecotourism, Recreation &amp; Hospitality">Ecotourism, Recreation &amp; Hospitality</option>
          <option value="Land Management">Land Management</option>
          <option value="Sustainable Mineral Resource Development">Sustainable Mineral Resource Development</option>
          <option value="Economics">Economics</option>
          <option value="Business &amp; Accounting">Business &amp; Accounting </option>
          <option value="other">Others</option>

        </select>
        <span class="errmsg" id="department-err">
          <i class="ti ti-alert-circle"></i> Please select a department
        </span>
      </div>

      <div class="field">
        <label for="completion">Date of completion <span class="req">*</span></label>
        <input type="date" id="completion" name="Date_of_com" / required>
        <span class="errmsg" id="completion-err">
          <i class="ti ti-alert-circle"></i> Please select a completion date
        </span>
      </div>
    </div> 

    <button class="submit-btn" id="submit-btn" onclick="submitForm()">Submit Registration</button>

    <div class="success-banner" id="success">
      <i class="ti ti-circle-check"></i>
      <span>Registration submitted successfully! We'll be in touch soon.</span>
    </div>

  </div>
</div>

</form>

<script>
  const rules = {
    fullname:   v => v.trim().split(/\s+/).length >= 2 && v.trim().length >= 3,
    email:      v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim()),
    cell:       v => /^[0-9+\s\-]{7,15}$/.test(v.trim()),
    level:      v => v !== '',
    department: v => v !== '',
    completion: v => v !== ''
  };

  function setField(id, valid) {
    const el  = document.getElementById(id);
    const err = document.getElementById(id + '-err');
    if (!el) return;
    el.classList.toggle('err', !valid);
    el.classList.toggle('ok', valid);
    if (err) err.classList.toggle('show', !valid);
  }

  function validateGender() {
    const sel  = document.querySelector('input[name=Gender]:checked');
    const err  = document.getElementById('Gender-err');
    const opts = document.querySelectorAll('.radio-opt');
    const valid = !!sel;
    opts.forEach(o => o.classList.toggle('radio-err', !valid));
    err.classList.toggle('show', !valid);
    return valid;
  }

  // Live validation on blur/input
  ['fullname', 'email', 'cell', 'level', 'department', 'completion'].forEach(id => {
    const el = document.getElementById(id);
    if (!el) return;
    el.addEventListener('blur', () => {
      if (el.value !== '') setField(id, rules[id](el.value));
    });
    el.addEventListener('input', () => {
      if (el.classList.contains('err') || el.classList.contains('ok')) {
        setField(id, rules[id](el.value));
      }
    });
  });

  // Radio button interactions
  document.querySelectorAll('input[name=Gender]').forEach(r => {
    r.addEventListener('change', () => {
      document.querySelectorAll('.radio-opt').forEach(o => o.classList.remove('selected', 'radio-err'));
      r.closest('.radio-opt').classList.add('selected');
      document.getElementById('Gender-err').classList.remove('show');
    });
  });

  function submitForm() {
    let allValid = true;

    ['fullname', 'email', 'cell', 'level', 'department', 'completion'].forEach(id => {
      const el = document.getElementById(id);
      const valid = el && rules[id](el.value);
      setField(id, valid);
      if (!valid) allValid = false;
    });

    if (!validateGender()) allValid = false;

    if (allValid) {
      document.getElementByid('reg-form').submit();
    }
  }
</script>

</body>
</html>
