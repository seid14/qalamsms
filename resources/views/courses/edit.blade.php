<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Edit Course</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('courses.update', $course) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="courseTitle" class="form-label">Course Title</label>
                    <input type="text" class="form-control @error('courseTitle') is-invalid @enderror" 
                           id="courseTitle" name="courseTitle" 
                           value="{{ old('courseTitle', $course->courseTitle) }}" required>
                    @error('courseTitle')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="courseDescription" class="form-label">Description</label>
                    <textarea class="form-control @error('courseDescription') is-invalid @enderror" 
                              id="courseDescription" name="courseDescription" 
                              rows="3">{{ old('courseDescription', $course->courseDescription) }}</textarea>
                    @error('courseDescription')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update Course</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout> 