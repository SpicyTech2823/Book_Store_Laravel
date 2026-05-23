@extends('admin.layout')

@section('page-title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-number">{{ $total_books }}</div>
                <div class="stat-label">Total Books</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-number">{{ $total_categories }}</div>
                <div class="stat-label">Categories</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-number">{{ $total_users }}</div>
                <div class="stat-label">Total Users</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-number">{{ $total_admins }}</div>
                <div class="stat-label">Admins</div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.books') }}" class="btn btn-info w-100">
                                <i class="fas fa-book-open"></i> Manage Books
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.categories') }}" class="btn btn-info w-100">
                                <i class="fas fa-list"></i> Manage Categories
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.users') }}" class="btn btn-info w-100">
                                <i class="fas fa-users"></i> Manage Users
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.team-members') }}" class="btn btn-info w-100">
                                <i class="fas fa-users-gear"></i> Manage Team
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{ route('admin.books.create') }}" class="btn btn-success w-100">
                                <i class="fas fa-plus"></i> Add Book
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-success w-100">
                                <i class="fas fa-plus"></i> Add Category
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-success w-100">
                                <i class="fas fa-plus"></i> Add User
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.team-members.create') }}" class="btn btn-success w-100">
                                <i class="fas fa-plus"></i> Add Team Member
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
