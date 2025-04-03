<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-end mb-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                        </button>
                    </form>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Welcome to Qalam SMS Mini Version</h5>
                    </div>
                    <div class="card-body">
                        <p class="lead">Welcome to the Student & Course Management System. Use the navigation menu or the quick access cards below to manage students and courses.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm hover-card">
                            <div class="card-body text-center">
                                <i class="fas fa-user-graduate fa-3x mb-3 text-primary"></i>
                                <h5 class="card-title">Students</h5>
                                <p class="card-text">Manage student information, enrollments, and course assignments.</p>
                                <a href="{{ route('students.index') }}" class="btn btn-primary">View Students</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm hover-card">
                            <div class="card-body text-center">
                                <i class="fas fa-book fa-3x mb-3 text-primary"></i>
                                <h5 class="card-title">Courses</h5>
                                <p class="card-text">Manage course information and student enrollments.</p>
                                <a href="{{ route('courses.index') }}" class="btn btn-primary">View Courses</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Quick Statistics</h5>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-6 mb-4">
                                <div class="p-3 bg-light rounded">
                                    <i class="fas fa-users fa-2x text-primary mb-2"></i>
                                    <h3 class="text-primary">{{ \App\Models\Student::count() }}</h3>
                                    <p class="text-muted mb-0">Total Students</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="p-3 bg-light rounded">
                                    <i class="fas fa-book-open fa-2x text-primary mb-2"></i>
                                    <h3 class="text-primary">{{ \App\Models\Course::count() }}</h3>
                                    <p class="text-muted mb-0">Total Courses</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <i class="fas fa-user-check fa-2x text-primary mb-2"></i>
                                    <h3 class="text-primary">{{ \App\Models\Student::whereHas('enrolledCourses')->count() }}</h3>
                                    <p class="text-muted mb-0">Enrolled Students</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <i class="fas fa-chalkboard-teacher fa-2x text-primary mb-2"></i>
                                    <h3 class="text-primary">{{ \App\Models\Course::whereHas('enrolledStudents')->count() }}</h3>
                                    <p class="text-muted mb-0">Active Courses</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
