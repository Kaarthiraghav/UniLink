@extends('layouts.app')
@section('title', 'Edit Group')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h3 class="mb-0"><i class="bi bi-people-fill me-2"></i>Edit Group: {{ $group->name }}</h3>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('groups.update', $group->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="group_name" class="form-label">Group Name</label>
                            <input type="text" class="form-control form-control-lg" id="group_name" name="group_name" value="{{ old('group_name', $group->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="lecturers" class="form-label">Lecturers</label>
                            <select class="form-select form-select-lg" id="lecturers" name="lecturers[]" multiple>
                                @foreach($lecturers as $lecturer)
                                    <option value="{{ $lecturer->id }}" {{ in_array($lecturer->id, $groupLecturerIds) ? 'selected' : '' }}>{{ $lecturer->name }} ({{ $lecturer->student_staff_id }})</option>
                                @endforeach
                            </select>
                            <small class="text-muted">Hold Ctrl (Windows) or Command (Mac) to select multiple lecturers.</small>
                        </div>

                        <div class="mb-3">
                            <label for="students" class="form-label">Students</label>
                            <select class="form-select form-select-lg" id="students" name="students[]" multiple>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}" {{ in_array($student->id, $groupStudentIds) ? 'selected' : '' }}>{{ $student->name }} ({{ $student->student_staff_id }})</option>
                                @endforeach
                            </select>
                            <small class="text-muted">Hold Ctrl (Windows) or Command (Mac) to select multiple students.</small>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-success btn-lg shadow-sm">
                                <i class="bi bi-save me-2"></i>Update Group
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection