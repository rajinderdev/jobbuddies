<?php

namespace App\Http\Controllers\superAdmin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Stripe\Plan as StripePlan;
use Stripe\Product;
use Stripe\Stripe;
use Yajra\DataTables\Facades\DataTables;

class PlanController extends Controller
{

    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Plan::with('features')->orderBy('id', 'DESC');
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('duration', function ($data) {
                    return $data->duration . '/' . ucfirst($data->plan_type);
                })
                // ->editColumn('features', function ($data) {
                //     if (count($data->features) > 0) {
                //         $featuresHtml = '';
                //         foreach ($data->features as $feature) {
                //             $featuresHtml .= '<span class="badge badge-info mr-1">' . $feature->feature . '</span>';
                //         }
                //         return $featuresHtml;
                //     } else {
                //         return '0';
                //     }
                // })
                ->addColumn('action', function ($data) {
                    $btn = '<div class="d-flex">
                            <button type="button" class="btn btn-sm btn-light border" onclick="editSkill(' . $data->id . ')">
                            <i class="fa fa-solid fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-light border ml-2" data-bs-toggle="modal" data-bs-target="#deleteSkillData" onclick="deleteSkill(' . $data->id . ')"><i class="fa fa-trash"></i></button>
                            </div>';
                    return $btn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        $pageTitle = "Plans";
        return view('superadmin.plans.index', compact('pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
            'plan_type' => 'required|string|in:day,month,year',
            'interviews' => 'nullable|integer',
            'features' => 'required_with:features',
        ]);

        // Create a product in Stripe
        $stripeProduct = Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'] ?? 'test',
        ]);

        // Create a plan in Stripe
        $stripePlan = StripePlan::create([
            'amount' => $validatedData['price'] * 100, // Stripe expects the amount in cents
            'currency' => 'usd',
            'interval' => $validatedData['plan_type'], // Interval based on the selected duration type
            'product' => $stripeProduct->id,
        ]);

        // Save the plan in the database
        $plan = Plan::create(array_merge($validatedData, ['stripe_plan_id' => $stripePlan->id]));

        // Save the plan features in the database
        if (isset($validatedData['features'])) {
            foreach ($validatedData['features'] as $feature) {
                $plan->features()->create(['name' => $feature]);
            }
        }

        return response()->json([
            'success' => true,
            'response' => $plan,
            'message' =>  'Plan added successfully.'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Plan::with('features')->whereId($id)->first();
        return response()->json([
            'success' => true,
            'response' => $data,
            'message' =>  'Plan details.'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $planData = Plan::where('id', $request->id)
            ->update([
                "name" => $request->name ? $request->name : '',
            ]);

        return response()->json([
            'success' => true,
            'response' => $planData,
            'message' =>  'Plan updated successfully.'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePlan(Request $request)
    {
        $plan =  Plan::where('id', $request->id)->delete();
        return response()->json([
            'success' => true,
            'response' => $plan,
            'message' =>  'Plan deleted successfully.'
        ], 200);
    }
}
