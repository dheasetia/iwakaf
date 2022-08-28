<?php

namespace App\Http\Controllers;

use App\Helper\OnaizaDuitku;
use App\Http\Resources\PaymentMethodResource;
use App\Http\Resources\PaymentMethodTypeResource;
use App\Http\Resources\ProjectDetailResource;
use App\Http\Resources\ProjectResource;
use App\Models\PaymentMethod;
use App\Models\PaymentMethodType;
use App\Models\Project;
use Illuminate\Http\Request;

class BladeProjectController extends Controller
{
    public function index()
    {
        $shown_projects = Project::where('is_shown', '=', 1)->get();
        $projects = ProjectResource::collection($shown_projects);
        return view('projects.project_index', compact('projects'));
    }

    public function show($id)
    {
        $project =  new ProjectResource(Project::findOrFail($id));
        return view('projects.show', compact('project'));
    }

    public function donate_now($id)
    {
        $temp_project = Project::find($id);
        if ($temp_project == null) return abort(404);

        $response = OnaizaDuitku::get_payment_method(1000);
        $duitku_payment_methods = $response['paymentFee'];
        $server_payment_methods = PaymentMethod::all();

        $payment_methods = array();
        $payment_types = PaymentMethodType::all();
        foreach ($payment_types as $type) {
            $payment_methods[$type->type] = array();
        }

        foreach ($duitku_payment_methods as $dpm) {
            foreach ($server_payment_methods as $spm) {
                if (($dpm['paymentMethod'] === $spm->code ) && $spm->is_shown == 1) {
                    $spm['fee'] = $dpm['totalFee'];
                    array_push($payment_methods[$spm->payment_method_type->type], new PaymentMethodResource($spm));
                }
            }
        }

//        return $payment_methods;
        $project = new ProjectDetailResource($temp_project);
        return view('projects.donate_now', compact('project', 'payment_methods'));
    }
}
