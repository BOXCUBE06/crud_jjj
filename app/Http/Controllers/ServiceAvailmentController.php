<?php
namespace App\Http\Controllers;

use App\Models\ServiceAvailment;
use Illuminate\Http\Request;

class ServiceAvailmentController extends Controller
{
    public function index(Request $request)
    {
        $services = ServiceAvailment::all();
        if ($request->wantsJson()) {
            return response()->json($services);
        }
        return view('services.index', compact('services'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'requester_name' => 'required|string',
            'contact_number' => 'required|string',
            'service_type' => 'required|string',
            'incident_location' => 'required|string',
        ]);

        $service = ServiceAvailment::create($data);

        if ($request->wantsJson()) {
            return response()->json($service, 201);
        }
        return redirect()->route('services.index');
    }

    public function show(Request $request, $id)
    {
        $service = ServiceAvailment::findOrFail($id);
        return $request->wantsJson() ? response()->json($service) : view('services.show', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = ServiceAvailment::findOrFail($id);
        $service->update($request->all());

        if ($request->wantsJson()) {
            return response()->json($service);
        }
        return redirect()->route('services.index');
    }

    public function destroy(Request $request, $id)
    {
        ServiceAvailment::destroy($id);
        if ($request->wantsJson()) {
            return response()->json(null, 204);
        }
        return redirect()->route('services.index');
    }

    public function create()
    {
        return view('services.form');
    }

    public function edit($id)
    {
        $service = ServiceAvailment::findOrFail($id);
        return view('services.form', compact('service'));
    }
}