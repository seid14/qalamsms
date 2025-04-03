<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Edit Student</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('students.update', $student) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="studentName" class="form-label">Student Name</label>
                    <input type="text" class="form-control @error('studentName') is-invalid @enderror" 
                           id="studentName" name="studentName" 
                           value="{{ old('studentName', $student->studentName) }}" required>
                    @error('studentName')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="studentEmail" class="form-label">Email</label>
                    <input type="email" class="form-control @error('studentEmail') is-invalid @enderror" 
                           id="studentEmail" name="studentEmail" 
                           value="{{ old('studentEmail', $student->studentEmail) }}" required>
                    @error('studentEmail')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="selectedCourses" class="form-label">Select Courses</label>
                    <select multiple class="form-control @error('selectedCourses') is-invalid @enderror" 
                            id="selectedCourses" name="selectedCourses[]">
                        @foreach($courseList as $course)
                            <option value="{{ $course->id }}" 
                                {{ in_array($course->id, old('selectedCourses', $student->enrolledCourses->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $course->courseTitle }}
                            </option>
                        @endforeach
                    </select>
                    @error('selectedCourses')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Hold Ctrl/Cmd to select multiple courses</div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update Student</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
 