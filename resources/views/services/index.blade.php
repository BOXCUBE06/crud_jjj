<!DOCTYPE html>
<html>
<head>
    <title>MDRRMO Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>MDRRMO Service Requests</h2>
            <a href="{{ route('services.create') }}" class="btn btn-danger">+ Log Emergency</a>
        </div>

        <table class="table table-dark table-striped border">
            <thead>
                <tr>
                    <th>Requester</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td>{{ $service->requester_name }}</td>
                    <td>{{ $service->service_type }}</td>
                    <td>{{ $service->incident_location }}</td>
                    <td><span class="badge bg-primary">{{ $service->status }}</span></td>
                    <td>
                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-info">Update</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>