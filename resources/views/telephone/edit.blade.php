<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Data</h1>
        <form action="{{ route('student.update', $datastudent->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_hobi" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama_hobi" name="name" value="{{ $datastudent->name }}" required>
            </div>
            <div class="mb-3">
                <label for="nama_hobi" class="form-label">Nisn</label>
                <input type="text" class="form-control" id="nama_hobi" name="nisn" value="{{ $datastudent->nisn }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('student.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>