<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Student Manager</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h2>Danh sách sinh viên</h2>
  <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">➕ Thêm sinh viên</a>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th><th>Họ tên</th><th>Email</th><th>Điện thoại</th><th>Địa chỉ</th><th>Hành động</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($students as $s)
      <tr>
        <td>{{ $s->id }}</td>
        <td>{{ $s->fullname }}</td>
        <td>{{ $s->email }}</td>
        <td>{{ $s->phone }}</td>
        <td>{{ $s->address }}</td>
        <td>
          <a href="{{ route('students.edit', $s->id) }}" class="btn btn-warning btn-sm">Sửa</a>
          <form action="{{ route('students.destroy', $s->id) }}" method="POST" style="display:inline-block">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xóa sinh viên này?')">Xóa</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
