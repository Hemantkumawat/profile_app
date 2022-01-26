@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session()->has('success'))
                    <p class="alert alert-class alert-success">{{ session()->get('success') }}</p>
                @endif
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('User Detail') }}
                    </div>
                    <div class="card-body table-response">
                        <form action="{{ route('user.update') }}" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                               placeholder="Enter First name"
                                               value="{{ $user->first_name??old('first_name') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" id="last_name"
                                               value="{{ $user->last_name??old('last_name') }}"
                                               name="last_name" placeholder="Enter Last Name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" id="last_name"
                                               value="{{ $user->email??old('email') }}"
                                               name="email" placeholder="Enter Email Address">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2 float-end">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Work Experience</div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Company Name</th>
                                <th>Experience</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->workExperiences??[] as $workExperience)
                                <tr>
                                    <td>{{ $workExperience->id }}</td>
                                    <td>{{ $workExperience->company }}</td>
                                    <td>{{ \Carbon\Carbon::parse($workExperience->start_date)->diff($workExperience->end_date??now())->format('%y years, %m months and %d days') }}</td>
                                    <td>{{ $workExperience->description }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create Work Experience') }}
                    </div>
                    <div class="card-body table-response">
                        <form action="{{ route('work-experience.store') }}" method="post">
                            @method('PATCH')
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company">Company</label>
                                        <input type="text" class="form-control" id="company" name="company"
                                               value="{{ old('company') }}"
                                               placeholder="Enter Company Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <input type="text" class="form-control" id="role" name="role"
                                               value="{{ old('role') }}"
                                               placeholder="Title / Role">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="start_date">Start at</label>
                                        <input type="month" class="form-control"
                                               value="{{ old('start_date') }}" id="start_date" name="start_date"
                                               placeholder="eg. MAR 2020">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <input type="month" class="form-control" id="end_date"
                                               value="{{ old('end_date') }}" name="end_date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-check pt-4">
                                        <input type="checkbox" class="form-check-input" id="still_working"
                                               name="still_working" value="1">
                                        <label class="form-check-label" for="still_working">Still working?</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description"
                                          class="form-control">{!! old('description') !!}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2 float-end">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Organization Associations List</div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Organization Name</th>
                                <th>Associated As</th>
                                <th>Experience</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->organizationAssociations??[] as $organizationAssociations)
                                <tr>
                                    <td>{{ $organizationAssociations->id }}</td>
                                    <td>{{ $organizationAssociations->name }}</td>
                                    <td>{{ $organizationAssociations->associated_as }}</td>
                                    <td>{{ \Carbon\Carbon::parse($organizationAssociations->start_date)->diff($organizationAssociations->end_date??now())->format('%y years, %m months and %d days') }}</td>
                                    <td>{{ $organizationAssociations->description }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create Organization Associations') }}
                    </div>
                    <div class="card-body table-response">
                        <form action="{{ route('organization-association.store') }}" method="post">
                            @method('PATCH')
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               value="{{ old('name') }}"
                                               placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="associated_as">Associated as</label>
                                        <input type="text" class="form-control" id="associated_as" name="associated_as"
                                               value="{{ old('associated_as') }}"
                                               placeholder="Eg. Junior Partner">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="start_date">Start at</label>
                                        <input type="month" class="form-control"
                                               value="{{ old('start_date') }}" id="start_date" name="start_date"
                                               placeholder="eg. MAR 2020">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <input type="month" class="form-control" id="end_date"
                                               value="{{ old('end_date') }}" name="end_date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-check pt-4">
                                        <input type="checkbox" class="form-check-input" id="still_working_1"
                                               name="still_working" value="1">
                                        <label class="form-check-label" for="still_working_1">Still working?</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description"
                                          class="form-control">{!! old('description') !!}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2 float-end">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
