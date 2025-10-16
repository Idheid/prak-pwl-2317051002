<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Kelas</th>
            <th style="text-align:center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->nim }}</td>
                <td>{{ $user->nama_kelas }}</td>
                <td style="text-align:center;">
                    <a href="{{ route('user.edit', $user->id) }}" 
                       style="background:linear-gradient(135deg,#4f9cff,#6ed1ff);
                              color:white;padding:6px 12px;
                              border-radius:8px;
                              text-decoration:none;
                              font-weight:500;
                              transition:0.2s;">
                        ✏️ Edit
                    </a>

                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            onclick="return confirm('Yakin ingin menghapus data ini?')"
                            style="background:linear-gradient(135deg,#ff6b6b,#ff8787);
                                   color:white;
                                   border:none;
                                   padding:6px 12px;
                                   border-radius:8px;
                                   font-weight:500;
                                   cursor:pointer;
                                   transition:0.2s;">
                            🗑️ Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
