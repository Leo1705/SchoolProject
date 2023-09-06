<?php

namespace App\Http\Controllers;
use App\Models\Ucenici;
use App\Models\Domasno;
use Carbon\Carbon; 
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    $uceniciData = [];

    // Retrieve all 'ucenici' records
    $ucenici = Ucenici::all();

    // Retrieve all 'domasno' records
    $domasnoRecords = Domasno::all();

    foreach ($ucenici as $uceniciItem) {
        $uceniciData[] = [
            'ucenici' => $uceniciItem,
            'domasno' => $domasnoRecords->where('users_id', $uceniciItem->id)->first(), // Match by 'users_id'
        ];
    }

    $data['uceniciWithDomasno'] = $uceniciData;

    return view('home', $data);
}

public function store(Request $request)
    {
        $domasnoStatus = $request->input('domasno_status');
        $istrazuvanjeStatus = $request->input('istrazuvanje_status');
        $userIds = $request->input('user_id');

        $currentDate = Carbon::now(); // Get the current date and time

        foreach ($domasnoStatus as $key => $domasno) {
            $istrazuvanje = $istrazuvanjeStatus[$key] ?? 'нема дадено';
            $userId = $userIds[$key] ?? null;

            // Check if the option was selected (has 'selected' class)
            $domasnoSelected = strpos($domasno, 'selected') !== false;
            $istrazuvanjeSelected = strpos($istrazuvanje, 'selected') !== false;

            // Process the form data based on selection
            if ($domasnoSelected) {
                // Handle domasno option
                // Your logic here...
            }

            if ($istrazuvanjeSelected) {
                // Handle istrazuvanje option
                // Your logic here...
            }

            // Save the Domasno record with today's date
            $newDomasno = new Domasno();
            $newDomasno->domasno = $domasno;
            $newDomasno->istrazuvanje = $istrazuvanje;
            $newDomasno->ucenici_iducenici = $userId; // Replace with the actual field name
            $newDomasno->date = $currentDate->toDateString(); // Set the date field to today's date
            $newDomasno->save();
        }

        return redirect()->back()->with('success', 'Data successfully saved.');
    }
}
