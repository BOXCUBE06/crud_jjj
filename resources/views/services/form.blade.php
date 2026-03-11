@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="mb-0">{{ isset($service) ? 'Edit Request' : 'New Service Request' }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ isset($service) ? route('services.update', $service->id) : route('services.store') }}" method="POST">
                    @csrf
                    @if(isset($service)) @method('PUT') @endif

                    <div class="mb-3">
                        <label class="form-label">Requester Name</label>
                        <input type="text" name="requester_name" class="form-control" value="{{ $service->requester_name ?? '' }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contact Number</label>
                        <input type="text" name="contact_number" class="form-control" value="{{ $service->contact_number ?? '' }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Service Type</label>
                        <select name="service_type" class="form-select">
                            <option value="Ambulance" {{ (isset($service) && $service->service_type == 'Ambulance') ? 'selected' : '' }}>Ambulance</option>
                            <option value="Rescue" {{ (isset($service) && $service->service_type == 'Rescue') ? 'selected' : '' }}>Rescue</option>
                            <option value="Fire" {{ (isset($service) && $service->service_type == 'Fire') ? 'selected' : '' }}>Fire</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <textarea name="incident_location" class="form-control" rows="2" required>{{ $service->incident_location ?? '' }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-danger w-100">Save Record</button>
                    <a href="{{ route('services.index') }}" class="btn btn-link w-100 mt-2 text-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection