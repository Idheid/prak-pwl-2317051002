<nav style="background:rgba(255,255,255,0.7);padding:16px 0;box-shadow:0 2px 8px rgba(0,0,0,0.04);margin-bottom:24px;">
    <div style="display:flex;align-items:center;justify-content:space-between;width:100%;padding:0 40px;">
        <span style="font-weight:600;font-size:20px;color:#222;">Aplikasi Pengguna</span>
        <div>
            <a href="/user"
               style="color:{{ request()->is('user') ? '#1976d2' : '#222' }};text-decoration:none;margin-right:24px;font-weight:600;">
                List User
            </a>
            <a href="/user/create"
               style="color:{{ request()->is('user/create') ? '#1976d2' : '#222' }};text-decoration:none;font-weight:600;">
                Tambah Pengguna
            </a>
        </div>
    </div>
</nav>