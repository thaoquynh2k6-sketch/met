<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Đăng nhập – 8 a.m</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Paytone+One&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      min-height: 100vh;
      background: #e8ddd4;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Montserrat', sans-serif;
    }

    .card {
      background: #f5ede6;
      border: 1.5px solid #d9c4b5;
      border-radius: 20px;
      padding: 36px 40px 40px;
      width: 420px;
      max-width: 95vw;
      box-shadow: 0 10px 40px rgba(80, 40, 10, 0.10);
      position: relative;
    }

    /* ── Header ── */
    .card-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 18px;
    }
    .card-header span {
      font-family: 'Paytone One', sans-serif;
      font-weight: 400;
      font-size: 15px;
      color: #3b2210;
    }
    .btn-close {
      background: none;
      border: none;
      font-size: 22px;
      color: #999;
      cursor: pointer;
      line-height: 1;
      padding: 0 2px;
      transition: color 0.15s;
    }
    .btn-close:hover { color: #5c3317; }

    /* ── Title ── */
    .card-title {
      font-size: 26px;
      font-weight: 800;
      color: #2b1a0e;
      margin-bottom: 6px;
      line-height: 1.25;
    }
    .card-sub {
      font-size: 13.5px;
      color: #a07060;
      margin-bottom: 28px;
    }
    .card-sub a {
      color: #7a4a1e;
      text-decoration: underline;
      font-weight: 600;
      cursor: pointer;
    }
    .card-sub a:hover { color: #5c3317; }

    /* ── Input group ── */
    .input-group {
      display: flex;
      align-items: center;
      gap: 10px;
      border-bottom: 1.5px solid #c8b09a;
      padding-bottom: 10px;
      margin-bottom: 20px;
      transition: border-color 0.2s;
    }
    .input-group:focus-within { border-color: #7a4a1e; }

    .input-group svg { flex-shrink: 0; }

    .input-group input {
      flex: 1;
      border: none;
      outline: none;
      font-size: 14.5px;
      color: #2b1a0e;
      background: transparent;
      font-family: inherit;
    }
    .input-group input::placeholder { color: #b09080; }

    .btn-eye {
      background: none;
      border: none;
      cursor: pointer;
      padding: 0;
      display: flex;
      align-items: center;
      color: #b09080;
      transition: color 0.15s;
    }
    .btn-eye:hover { color: #7a4a1e; }

    /* ── Forgot ── */
    .forgot {
      text-align: right;
      margin-top: -8px;
      margin-bottom: 22px;
    }
    .forgot a {
      font-size: 12.5px;
      color: #a07060;
      text-decoration: none;
      cursor: pointer;
      transition: color 0.15s;
    }
    .forgot a:hover { color: #5c3317; text-decoration: underline; }

    /* ── Checkbox ── */
    .remember {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 28px;
      cursor: pointer;
      user-select: none;
    }
    .remember input[type="checkbox"] { display: none; }
    .custom-checkbox {
      width: 18px;
      height: 18px;
      border: 1.5px solid #c8b09a;
      border-radius: 4px;
      background: white;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      transition: background 0.15s, border-color 0.15s;
    }
    .custom-checkbox svg { display: none; }
    .remember input:checked ~ .custom-checkbox {
      background: #5c3317;
      border-color: #5c3317;
    }
    .remember input:checked ~ .custom-checkbox svg { display: block; }
    .remember span { font-size: 13.5px; color: #5a3a28; }

    /* ── Button ── */
    .btn-login {
      width: 100%;
      padding: 16px;
      background: #6b3a1f;
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 14.5px;
      font-weight: 800;
      letter-spacing: 2.5px;
      cursor: pointer;
      transition: background 0.18s, transform 0.1s;
      font-family: 'Paytone One', sans-serif;
    }
    .btn-login:hover { background: #7a4520; }
    .btn-login:active { transform: scale(0.98); }
    .btn-login:disabled {
      background: #c0a090;
      cursor: not-allowed;
      transform: none;
    }

    /* ── Error message ── */
    .error-msg {
      display: none;
      font-size: 12px;
      color: #c0392b;
      margin-top: -14px;
      margin-bottom: 14px;
      padding-left: 28px;
    }
    .error-msg.show { display: block; }

    /* ── Toast ── */
    .toast {
      position: fixed;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%) translateY(20px);
      background: #3b2210;
      color: white;
      padding: 12px 24px;
      border-radius: 10px;
      font-size: 14px;
      opacity: 0;
      transition: opacity 0.3s, transform 0.3s;
      pointer-events: none;
      white-space: nowrap;
      z-index: 999;
    }
    .toast.show {
      opacity: 1;
      transform: translateX(-50%) translateY(0);
    }

    /* ── Loading spinner ── */
    .spinner {
      display: inline-block;
      width: 16px;
      height: 16px;
      border: 2px solid rgba(255,255,255,0.4);
      border-top-color: white;
      border-radius: 50%;
      animation: spin 0.7s linear infinite;
      vertical-align: middle;
      margin-right: 8px;
    }
    @keyframes spin { to { transform: rotate(360deg); } }
  </style>
</head>
<body>

<div class="card">
  <!-- Header -->
  <div class="card-header">
    <span>Đăng nhập</span>
    <button class="btn-close" id="btnClose" title="Đóng">×</button>
  </div>

  <!-- Title -->
  <div class="card-title">8 a.m chào bạn trở lại.</div>
  <div class="card-sub">
    Bạn chưa có tài khoản? <a id="linkRegister">Tạo tài khoản</a>
  </div>

  <!-- Form -->
  <div id="loginForm">

    <!-- Phone -->
    <form action="dangnhap.php" method="post">
    <div class="input-group" id="phoneGroup">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
        stroke="#7a4a1e" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
        <path d="M22 16.92v3a2 2 0 01-2.18 2
          19.79 19.79 0 01-8.63-3.07
          A19.5 19.5 0 015.13 12.7
          19.79 19.79 0 012.12 4.18
          2 2 0 014.11 2h3a2 2 0 012 1.72
          c.127.96.361 1.903.7 2.81
          a2 2 0 01-.45 2.11L8.09 9.91
          a16 16 0 006 6l1.27-1.27
          a2 2 0 012.11-.45
          c.907.339 1.85.573 2.81.7
          A2 2 0 0122 16.92z"/>
      </svg>
      <input type="tel" id="phone" placeholder="Nhập số điện thoại"
        maxlength="15" autocomplete="tel" inputmode="numeric"/>
    </div>
    <div class="error-msg" id="phoneError">Vui lòng nhập số điện thoại hợp lệ (9–11 chữ số).</div>

    <!-- Password -->
    <div class="input-group" id="passGroup">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
        stroke="#7a4a1e" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
        <rect x="3" y="11" width="18" height="11" rx="2"/>
        <path d="M7 11V7a5 5 0 0110 0v4"/>
      </svg>
      <input type="password" id="password" placeholder="Nhập mật khẩu"
        maxlength="64" autocomplete="current-password"/>
      <button class="btn-eye" id="btnEye" type="button" title="Hiện/Ẩn mật khẩu">
        <!-- Eye icon -->
        <svg id="iconEyeOpen" width="19" height="19" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
          <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
          <circle cx="12" cy="12" r="3"/>
        </svg>
        <!-- Eye-off icon (hidden by default) -->
        <svg id="iconEyeOff" width="19" height="19" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
          style="display:none">
          <path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8
            a18.45 18.45 0 015.06-5.94
            M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8
            a18.5 18.5 0 01-2.16 3.19
            m-6.72-1.07a3 3 0 11-4.24-4.24"/>
          <line x1="1" y1="1" x2="23" y2="23"/>
        </svg>
      </button>
    </div>
    <div class="error-msg" id="passError">Vui lòng nhập mật khẩu (ít nhất 6 ký tự).</div>

    <!-- Forgot -->
    <div class="forgot">
      <a id="linkForgot">Quên mật khẩu?</a>
    </div>

    <!-- Remember -->
    <label class="remember">
      <input type="checkbox" id="remember"/>
      <div class="custom-checkbox">
        <svg width="10" height="10" viewBox="0 0 12 12" fill="none">
          <path d="M2 6l3 3 5-5" stroke="white" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <span>Ghi nhớ mật khẩu cho lần sau</span>
    </label>

    <!-- Login button -->
    <button class="btn-login" id="btnLogin" type="button">ĐĂNG NHẬP</button>
  </div>
</div>

<!-- Toast notification -->
<div class="toast" id="toast"></div>

<script>
  /* ─── Utilities ─── */
  const $ = id => document.getElementById(id);

  function showToast(msg, duration = 3000) {
    const t = $('toast');
    t.textContent = msg;
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), duration);
  }

  function setError(fieldId, errorId, show) {
    const group = $(fieldId);
    const err   = $(errorId);
    if (show) {
      group.style.borderBottomColor = '#c0392b';
      err.classList.add('show');
    } else {
      group.style.borderBottomColor = '';
      err.classList.remove('show');
    }
  }

  /* ─── Validation ─── */
  function validatePhone(val) {
    return /^(0[3-9]\d{8}|0[1-9]\d{8,9})$/.test(val.trim());
  }
  function validatePassword(val) {
    return val.length >= 6;
  }

  /* ─── Toggle password visibility ─── */
  $('btnEye').addEventListener('click', () => {
    const inp = $('password');
    const isText = inp.type === 'text';
    inp.type = isText ? 'password' : 'text';
    $('iconEyeOpen').style.display = isText ? 'block' : 'none';
    $('iconEyeOff').style.display  = isText ? 'none'  : 'block';
  });

  /* ─── Live validation on blur ─── */
  $('phone').addEventListener('blur', () => {
    setError('phoneGroup', 'phoneError', !validatePhone($('phone').value));
  });
  $('phone').addEventListener('input', () => {
    // only digits
    $('phone').value = $('phone').value.replace(/\D/g, '');
    if ($('phoneError').classList.contains('show'))
      setError('phoneGroup', 'phoneError', !validatePhone($('phone').value));
  });

  $('password').addEventListener('blur', () => {
    setError('passGroup', 'passError', !validatePassword($('password').value));
  });
  $('password').addEventListener('input', () => {
    if ($('passError').classList.contains('show'))
      setError('passGroup', 'passError', !validatePassword($('password').value));
  });

  /* ─── Submit ─── */
  $('btnLogin').addEventListener('click', async () => {
    const phone    = $('phone').value.trim();
    const password = $('password').value;

    const phoneOk = validatePhone(phone);
    const passOk  = validatePassword(password);

    setError('phoneGroup', 'phoneError', !phoneOk);
    setError('passGroup',  'passError',  !passOk);

    if (!phoneOk || !passOk) return;

    // --- Loading state ---
    const btn = $('btnLogin');
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner"></span>Đang đăng nhập...';

    try {
      // Simulate API call (replace with your real fetch below)
      await new Promise(r => setTimeout(r, 1500));

      /*
      // ── Real API example ──
      const res = await fetch('/api/login', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ phone, password,
          remember: $('remember').checked })
      });
      if (!res.ok) throw new Error((await res.json()).message || 'Lỗi đăng nhập');
      const data = await res.json();
      localStorage.setItem('token', data.token);
      window.location.href = '/dashboard';
      */

      // Lưu số điện thoại nếu chọn ghi nhớ
      if ($('remember').checked) {
        localStorage.setItem('savedPhone', phone);
      } else {
        localStorage.removeItem('savedPhone');
      }

      showToast('✓ Đăng nhập thành công!');
      btn.innerHTML = '✓ THÀNH CÔNG';
      btn.style.background = '#2e7d32';

    } catch (err) {
      showToast('✗ ' + (err.message || 'Đăng nhập thất bại, thử lại.'));
      btn.disabled = false;
      btn.innerHTML = 'ĐĂNG NHẬP';
    }
  });

  /* ─── Enter key support ─── */
  [$('phone'), $('password')].forEach(el => {
    el.addEventListener('keydown', e => {
      if (e.key === 'Enter') $('btnLogin').click();
    });
  });

  /* ─── Close button ─── */
  $('btnClose').addEventListener('click', () => {
    showToast('Đã đóng form đăng nhập.');
  });

  /* ─── Forgot password ─── */
  $('linkForgot').addEventListener('click', () => {
    showToast('Chức năng quên mật khẩu sẽ sớm được hỗ trợ.');
  });

  /* ─── Register link ─── */
  $('linkRegister').addEventListener('click', () => {
    showToast('Chuyển đến trang tạo tài khoản...');
  });

  /* ─── Restore saved phone ─── */
  window.addEventListener('DOMContentLoaded', () => {
    const saved = localStorage.getItem('savedPhone');
    if (saved) {
      $('phone').value = saved;
      $('remember').checked = true;
    }
  });
</script>
</body>
</html>