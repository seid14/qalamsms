<x-app-layout>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
        </a>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Course List</h5>
            <a href="{{ route('courses.create') }}" class="btn btn-primary">Add New Course</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Course Title</th>
                            <th>Description</th>
                            <th>Enrolled Students</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($courseList as $course)
                            <tr>
                                <td>{{ $course->courseTitle }}</td>
                                <td>{{ $course->courseDescription }}</td>
                                <td>
                                    {{ $course->enrolledStudents->pluck('studentName')->join(', ') }}
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-primary me-2">
                                            Edit
                                        </a>
                                        <form action="{{ route('courses.destroy', $course) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this course?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No courses found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout> 