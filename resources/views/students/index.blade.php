<x-app-layout>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
        </a>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Student List</h5>
            <a href="{{ route('students.create') }}" class="btn btn-primary">Add New Student</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Enrolled Courses</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($studentList as $student)
                            <tr>
                                <td>{{ $student->studentName }}</td>
                                <td>{{ $student->studentEmail }}</td>
                                <td>
                                    {{ $student->enrolledCourses->pluck('courseTitle')->join(', ') }}
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-primary me-2">
                                            Edit
                                        </a>
                                        <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No students found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout> 