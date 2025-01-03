<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Crud data student</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Data Student</h1>
        <div id="flash-messages" class="mb-3">
        </div>

        <!-- Add New Item Button -->
        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Tambah data</button>
        </div>

        <!-- Table -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nisn</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="crud-table-body">
                @foreach ($datastudent as $key => $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->nisn }}</td>
                        <td class="d-flex justify-end">
                            <form action="{{ route('student.destroy',$student->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mr-2" onclick="return confirm('apakah kamu yakin ingin menghapus data ini?')">Delete</button>
                            </form> | 
                            <a href="{{ route('student.edit',$student->id) }}" class="btn btn-success mr-2">Edit</a> | 
                            <a href="{{ route('student.show',$student->id) }}" class="btn btn-warning mr-2">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $datastudent->links() }}
        </div>
    </div>

    <!-- Modal create -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('student.store') }}" method="POST" id="createForm">
                        @csrf
                        <div class="mb-3">
                            <label for="itemName" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="itemName" name="name" required value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="itemName" class="form-label">NISN</label>
                            <input type="text" class="form-control" id="itemName" name="nisn" required value="{{ old('nisn') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <!-- Modal create -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Edit data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="createForm">
                        @csrf
                        <div class="mb-3">
                            <label for="itemName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="itemName" name="name" required value="{{ old('name') }}>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      @if (@session('success'))
      const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
        });
        Toast.fire({
        icon: "success",
        title: "{{ session('success') }}"
        });
      @endif

      @if ($errors->any())
      @foreach ($errors->all() as $item)
          
      
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "{{ $item }}",
        });

        
      @endforeach
      @endif
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>