<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Sửa sinh viên</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h2>Sửa sinh viên</h2>

  <form method="POST" action="{{ route('students.update', $student->id) }}">
    @csrf @method('PUT')
    <div class="mb-3">
      <label>Họ tên</label>
      <input type="text" name="fullname" class="form-control" value="{{ $student->fullname }}" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
    </div>
    <div class="mb-3">
      <label>Điện thoại</label>
      <input type="text" name="phone" class="form-control" value="{{ $student->phone }}">
    </div>
    <div class="mb-3">
      <label>Địa chỉ</label>
      <input type="text" name="address" class="form-control" value="{{ $student->address }}">
    </div>
    <button type="submit" class="btn btn-success">Cập nhật</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Hủy</a>
  </form>
</body>
</html>
